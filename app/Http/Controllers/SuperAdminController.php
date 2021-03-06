<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\heisModel;
use App\User;

class SuperAdminController extends Controller
{
     public function  add_account(Request $request) {

     	$new_account = new User;
       

        $new_account->name = $request->userName;
        $new_account->email = $request->email;
        $new_account->hei_hei_id = $request->selectHEI;
        $new_account->role = $request->selectAccount;
        $new_account->password = bcrypt(123456);
        $new_account->save();

        return response()->json(['status' => 'success'], 200);
    }

    public function fetch_hei() {

    	$hei = heisModel::orderBy('hei_name', 'asc')->get();

        return response()->json($hei);
    }

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
}
