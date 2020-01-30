<?php

namespace App\Http\Controllers;
use App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\applicantsModel;
use App\parentsModel;
use App\brgyModel;
use App\provincesModel;
use App\mun_citysModel;
use App\heisModel;
use App\coursesModel;
use DB;

class HEICoordinatorController extends Controller
{
        // Fetch all applicants
        public function fetch_applicant() {

        $model = new User();
        $user = $model::find(Auth::id());
        $hei_id = $user['hei_hei_id'];
		$users = DB::table('users')
		            ->leftJoin('applicants', 'users.id', '=', 'applicants.user_id')
		            ->leftJoin('parents', 'users.id', '=', 'parents.user_id')
		            ->where('applicant_hei_id',$hei_id)
                    ->orderBy('lname', 'asc')
		            ->get();

        return response()->json($users);
    }
    //Fetch all barangay
    public function fetch_brgy() {

    	$brgy = brgyModel::orderBy('name', 'asc')->get();

        return response()->json($brgy);

    }
    	//Fetch all province
    public function fetch_province() {

    	$province = provincesModel::orderBy('prov_name', 'asc')->get();

        return response()->json($province);

    }
    //Fetch all city
    public function fetch_city() {

    	$city = mun_citysModel::orderBy('mun_city_name', 'asc')->get();

        return response()->json($city);

    }
    //Fetch all hei
    public function fetch_hei() {

    	$hei = heisModel::orderBy('hei_name', 'asc')->get();

        return response()->json($hei);

    }
    //Fetch all program
    public function fetch_program() {

    	$course = coursesModel::orderBy('course_name', 'asc')->get();

        return response()->json($course);

    }
    //Fetch HEI name
    public function fetch_hei_name() {

    	$hei_id = Auth::user()->hei_hei_id;

        $model = new heisModel();

        $hei = $model::where('hei_id', $hei_id)->first();

    	$hei_name = $hei['hei_name'];

        return response()->json($hei_name);

    }
    //Fetch USER name
    public function fetch_user_name() {

    	$name = Auth::user()->name;

        return response()->json($name);

    }
        //Update applicant
    public function update_applicant(Request $request, $id) {
       
        $model = new applicantsModel();

        $applicants = $model::where('user_id', $id)->first();

        $applicants->yr_lvl = $request->yr_lvl;
        $applicants->verified_hei = $request->verified_hei_id;
        $applicants->hei_remarks = $request->hei_remarks;
        $applicants->validatedByHEI =  Auth::user()->name;
        $applicants->save();


        return response()->json(['status' => 'success'], 200);

    }

    //HEI change password
    public function change_password(Request $request) {

        $model = new User();

        $user = $model::where('id', Auth::id())->first();

        $verify = password_verify($request['current'], $user['password']);//verify current password


        if($verify) {

                $hash = bcrypt($request['new_password']);//hash password

                $update_password = $model::where('id', Auth::id())
                        ->update(['password' => $hash]);

                $msg = "Password changed successfully!";   
                     
                return response()->json(1);//return true

         
        } else {
                     
                return response()->json(0);//return false
        }


    }

}
