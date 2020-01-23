<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App;
use App\mun_citysModel;
use App\brgyModel;
use App\provincesModel;
use App\heisModel;
use App\coursesModel;
use DB;

class applicantController extends Controller
{
    // Fetch applicant
    public function fetch_applicant() {

        $users = DB::table('users')
                    ->leftJoin('applicants', 'users.id', '=', 'applicants.user_id')
                    ->leftJoin('parents', 'users.id', '=', 'parents.user_id')
                    ->where('applicant_id',Auth::id())
                    ->get();

        return response()->json($users);
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
    //Fetch all barangay
    public function fetch_brgy() {

    	$brgy = brgyModel::orderBy('name', 'asc')->get();

        return response()->json($brgy);

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
}
