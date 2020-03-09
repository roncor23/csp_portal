<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use DB;

class ojtController extends Controller
{
    //Fetch USER name
    public function fetch_user_name() {

    	$name = Auth::user()->name;

        return response()->json($name);

    }
    //OJT change password
    public function change_password(Request $request) {

        $model = new User();

        $user = $model::where('id', Auth::id())->first();

        $verify = password_verify($request['current'], $user['password']);//verify current password


        if($verify) {//Check if match the password to current

                $hash = bcrypt($request['new_password']);//hash password

                $update_password = $model::where('id', Auth::id())
                        ->update(['password' => $hash]);

                $msg = "Password changed successfully!";   
                     
                return response()->json(1);//return true

         
        } else { // If not match return false
                     
                return response()->json(0);//return false
        }


    }
    //Fetch all list of unverified Applicant
    public function fetch_unverified_applicant() {

        $users = DB::table('users')
                    ->leftJoin('applicants', 'users.id', '=', 'applicants.user_id')
                    ->leftJoin('parents', 'users.id', '=', 'parents.user_id')
                    ->where('role',1)
                    ->where('confirm', 0)
                    ->orderBy('lname', 'asc')
                    ->get();

        return response()->json($users);
    }
    //Fetch all list of verified Applicant
    public function fetch_verified_applicant() {

        $users = DB::table('users')
                    ->leftJoin('applicants', 'users.id', '=', 'applicants.user_id')
                    ->leftJoin('parents', 'users.id', '=', 'parents.user_id')
                    ->where('role',1)
                    ->where('confirm', 1)
                    ->orderBy('lname', 'asc')
                    ->get();

        return response()->json($users);
    }

        //RESET PASSWORD
    public function reset_password(Request $request) {

        $model = new User();
        //Check if email exist!.
        $result = $model::where('email', $request->email)
                            ->first();
        //return correct                    
        if($result) {


            $default = 123456;
            $result->password = bcrypt($default);
            $result->save();

            return response()->json(1); // True
        }
            return response()->json(0); // False

    }
    //FORCE VERIFIED
    public function force_verified(Request $request) {

        $model = new User();
        //Check if email exist!.
        $result = $model::where('email', $request->email)
                            ->first();
        //return correct                    
        if($result) {

            $result->confirm = 1;
            $result->save();

            return response()->json(1); // True
        }
            return response()->json(0); // False

    }
}
