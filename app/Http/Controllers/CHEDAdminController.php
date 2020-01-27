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

class CHEDAdminController extends Controller
{
	//Fetch all list of Applicant
    public function fetch_applicant() {

		$users = DB::table('users')
		            ->leftJoin('applicants', 'users.id', '=', 'applicants.user_id')
		            ->leftJoin('parents', 'users.id', '=', 'parents.user_id')
		            ->where('role',1)
		            ->get();

        return response()->json($users);
    }
    //Fetch Enrolled Applicant
    public function fetch_enrolled_applicant() {

		$users = DB::table('users')
		            ->leftJoin('applicants', 'users.id', '=', 'applicants.user_id')
		            ->leftJoin('parents', 'users.id', '=', 'parents.user_id')
		            ->where('verified_hei', 1)
		            ->get();

        return response()->json($users);
    }
    //Fetch Not Enrolled Applicant
    public function fetch_not_enrolled_applicant() {

		$users = DB::table('users')
		            ->leftJoin('applicants', 'users.id', '=', 'applicants.user_id')
		            ->leftJoin('parents', 'users.id', '=', 'parents.user_id')
		            ->where('verified_hei', 2)
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
    //Fetch USER name
    public function fetch_user_name() {

    	$name = Auth::user()->name;

        return response()->json($name);

    }
    //Update applicant
    public function update_applicant(Request $request, $id) {
       
    	$model = new applicantsModel();

    	$applicants = $model::where('user_id', $id)->first();


        $applicants->fname = $request->fname;
        $applicants->mname = $request->mname;
        $applicants->lname = $request->lname;
        $applicants->xname = $request->xname;
        $applicants->birthdate = $request->birthdate;
        $applicants->place_of_birth = $request->place_of_birth;
        $applicants->gender = $request->gender;
        $applicants->civil_status = $request->civil_status;
        $applicants->citizenship = $request->citizenship;
        $applicants->contact = $request->contact;
        $applicants->email = $request->email;
        $applicants->present_address = $request->present_address;
        $applicants->town_city = $request->town_city_id;
        $applicants->brgy = $request->brgy_id;
        $applicants->province = $request->province;
        $applicants->zipcode = $request->zipcode;
        $applicants->name_of_school_last_attended = $request->name_of_school_last_attended;
        $applicants->hei = $request->hei_id;
        $applicants->course = $request->course_id;
        $applicants->applicant_type = $request->applicant_type;
        $applicants->pwd = $request->pwd_id;
        $applicants->type_of_disability = $request->type_of_disability;
        $applicants->ips = $request->ips_id;
        $applicants->forps = $request->forps_id;
        $applicants->parent_income = $request->parent_income;
        $applicants->supported_by_solo_parent = $request->supported_by_solo_parent;
        $applicants->status = $request->status;
        $applicants->verified_admin = $request->verified_admin_id;
        $applicants->admin_remarks = $request->admin_remarks;
        $applicants->ranking_status = $request->ranking_status_id;
        $applicants->ranking_remarks = $request->ranking_remarks;
        $applicants->applicant_solo_parent = $request->applicant_solo_parent;
        $applicants->gwa = $request->gwa;
        $applicants->ay = $request->ay;
        $applicants->validatedByCHED =  Auth::user()->name;
        $applicants->save();


        return response()->json(['status' => 'success'], 200);

    }
    //Admin change password
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
