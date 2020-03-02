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
                    ->where('confirm', 1)
		            ->orderBy('lname', 'asc')
		            ->get();

        return response()->json($users);
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
    //Fetch applicant by HEI
    public function fetch_applicant_by_hei($id) {

		$users = DB::table('users')
		            ->leftJoin('applicants', 'users.id', '=', 'applicants.user_id')
		            ->leftJoin('parents', 'users.id', '=', 'parents.user_id')
		            ->where('role',1)
		            ->where('applicant_hei_id', $id)
                    ->where('confirm', 1)
		            ->orderBy('lname', 'asc')
		            ->get();

        return response()->json($users);
    }
    //Fetch applicant by CSP Rank
    public function fetch_applicant_by_csp_rank() {

		$users = DB::table('users')
		            ->leftJoin('applicants', 'users.id', '=', 'applicants.user_id')
		            ->leftJoin('parents', 'users.id', '=', 'parents.user_id')
		            ->where('role',1)
                    ->where('confirm', 1)
		            ->where('verified_hei', 1)
		            ->where('verified_admin', 1)
		            ->where('yr_lvl', 1)
		            ->whereIn('course', [30,32,33,34,36,37,38,39,41,46,47,48,51,52,54,60,61,62,73,74,77,78,79,80,84,87,88,89,91,93,94,95,96,97,98,100,102,106,109,134,143,144,145,157,189,190,191,195,202,218,220])
		            ->orderBy('rank_points', 'desc')
		            ->get();

        return response()->json($users);
    }
    //Fetch applicant by TDP Rank
    public function fetch_applicant_by_tdp_rank() {

		$users = DB::table('users')
		            ->leftJoin('applicants', 'users.id', '=', 'applicants.user_id')
		            ->leftJoin('parents', 'users.id', '=', 'parents.user_id')
		            ->where('role',1)
                    ->where('confirm', 5)
		            ->where('verified_hei', 1)
		            ->where('verified_admin', 1)
		            ->where('yr_lvl', 1)
		            ->whereIn('course', [30,32,33,34,36,37,38,39,41,46,47,48,51,52,54,60,61,62,73,74,77,78,79,80,84,87,88,89,91,93,94,95,96,97,98,100,102,106,109,134,143,144,145,157,189,190,191,195,202,218,220])
		            ->orderBy('rank_points', 'desc')
		            ->get();

        return response()->json($users);
    }
    //Fetch Enrolled Applicant
    public function fetch_enrolled_applicant() {

		$users = DB::table('users')
		            ->leftJoin('applicants', 'users.id', '=', 'applicants.user_id')
		            ->leftJoin('parents', 'users.id', '=', 'parents.user_id')
                    ->where('confirm', 1)
		            ->where('verified_hei', 1)
		            ->orderBy('lname', 'asc')
		            ->get();

        return response()->json($users);
    }
    //Fetch Not Enrolled Applicant
    public function fetch_not_enrolled_applicant() {

		$users = DB::table('users')
		            ->leftJoin('applicants', 'users.id', '=', 'applicants.user_id')
		            ->leftJoin('parents', 'users.id', '=', 'parents.user_id')
                    ->where('confirm', 1)
		            ->where('verified_hei', 2)
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
    //Fetch USER name
    public function fetch_user_name() {

    	$name = Auth::user()->name;

        return response()->json($name);

    }
    //Rank Points Computation
    public function ranking_points_computation($_dependent_solo_parent, $_applicant_solo_parent, $_senior_citizen, $_pwd, $_forps, $_ips, $gwa, $parent_income, $id) {

    	if($gwa >= 99 && $gwa <= 100) {

    	   	$grade_points = 100;

    	    if($parent_income >= 0 && $parent_income <=70000) {
    			$income_points = 100;

    			$grade_computed = $grade_points * 0.70;
    			$income_computed = $income_points * 0.30;

    			$rank_points = $grade_computed + $income_computed;

    			if($_dependent_solo_parent == 1 || $_applicant_solo_parent == 1 || $_ips == 1 || $_pwd == 1 || $_forps == 1 || $_senior_citizen == 1) {
    				$plus_points = 5;
    			}else { $plus_points = 0; }
    			
    			$total_rank_points = $rank_points + $plus_points;

    			return $total_rank_points;
    		}	
    	    if($parent_income >= 70001 && $parent_income <=136000) {
    			$income_points = 95;

    			$grade_computed = $grade_points * 0.70;
    			$income_computed = $income_points * 0.30;

    			$rank_points = $grade_computed + $income_computed;

    			if($_dependent_solo_parent == 1 || $_applicant_solo_parent == 1 || $_ips == 1 || $_pwd == 1 || $_forps == 1 || $_senior_citizen == 1) {
    				$plus_points = 5;
    			}else { $plus_points = 0; }
    			
    			$total_rank_points = $rank_points + $plus_points;

    			return $total_rank_points;
    		}	
    	    if($parent_income >= 136001 && $parent_income <=202000) {
    			$income_points = 90;

    			$grade_computed = $grade_points * 0.70;
    			$income_computed = $income_points * 0.30;

    			$rank_points = $grade_computed + $income_computed;

    			if($_dependent_solo_parent == 1 || $_applicant_solo_parent == 1 || $_ips == 1 || $_pwd == 1 || $_forps == 1 || $_senior_citizen == 1) {
    				$plus_points = 5;
    			}else { $plus_points = 0; }
    			
    			$total_rank_points = $rank_points + $plus_points;

    			return $total_rank_points;
    		}	
    		if($parent_income >= 202001 && $parent_income <=268000) {
    			$income_points = 85;

    			$grade_computed = $grade_points * 0.70;
    			$income_computed = $income_points * 0.30;

    			$rank_points = $grade_computed + $income_computed;

    			if($_dependent_solo_parent == 1 || $_applicant_solo_parent == 1 || $_ips == 1 || $_pwd == 1 || $_forps == 1 || $_senior_citizen == 1) {
    				$plus_points = 5;
    			}else { $plus_points = 0; }
    			
    			$total_rank_points = $rank_points + $plus_points;

    			return $total_rank_points;
    		}
    		if($parent_income >= 268001 && $parent_income <=334000) {
    			$income_points = 80;

    			$grade_computed = $grade_points * 0.70;
    			$income_computed = $income_points * 0.30;

    			$rank_points = $grade_computed + $income_computed;

    			if($_dependent_solo_parent == 1 || $_applicant_solo_parent == 1 || $_ips == 1 || $_pwd == 1 || $_forps == 1 || $_senior_citizen == 1) {
    				$plus_points = 5;
    			}else { $plus_points = 0; }
    			
    			$total_rank_points = $rank_points + $plus_points;

    			return $total_rank_points;
    		}
    		if($parent_income >= 334001 && $parent_income <=400000) {
    			$income_points = 75;

    			$grade_computed = $grade_points * 0.70;
    			$income_computed = $income_points * 0.30;

    			$rank_points = $grade_computed + $income_computed;

    			if($_dependent_solo_parent == 1 || $_applicant_solo_parent == 1 || $_ips == 1 || $_pwd == 1 || $_forps == 1 || $_senior_citizen == 1) {
    				$plus_points = 5;
    			}else { $plus_points = 0; }
    			
    			$total_rank_points = $rank_points + $plus_points;

    			return $total_rank_points;
    		}
    		if($parent_income >= 400001 && $parent_income <=900000) {
    			$income_points = 50;

    			$grade_computed = $grade_points * 0.70;
    			$income_computed = $income_points * 0.30;

    			$rank_points = $grade_computed + $income_computed;

    			if($_dependent_solo_parent == 1 || $_applicant_solo_parent == 1 || $_ips == 1 || $_pwd == 1 || $_forps == 1 || $_senior_citizen == 1) {
    				$plus_points = 5;
    			}else { $plus_points = 0; }
    			
    			$total_rank_points = $rank_points + $plus_points;

    			return $total_rank_points;
    		}				  
    	
    	}

    	if($gwa >= 97 && $gwa <= 98) {

    	   	$grade_points = 95;

    	    if($parent_income >= 0 && $parent_income <=70000) {
    			$income_points = 100;

    			$grade_computed = $grade_points * 0.70;
    			$income_computed = $income_points * 0.30;

    			$rank_points = $grade_computed + $income_computed;

    			if($_dependent_solo_parent == 1 || $_applicant_solo_parent == 1 || $_ips == 1 || $_pwd == 1 || $_forps == 1 || $_senior_citizen == 1) {
    				$plus_points = 5;
    			}else { $plus_points = 0; }
    			
    			$total_rank_points = $rank_points + $plus_points;

    			return $total_rank_points;
    		}	
    	    if($parent_income >= 70001 && $parent_income <=136000) {
    			$income_points = 95;

    			$grade_computed = $grade_points * 0.70;
    			$income_computed = $income_points * 0.30;

    			$rank_points = $grade_computed + $income_computed;

    			if($_dependent_solo_parent == 1 || $_applicant_solo_parent == 1 || $_ips == 1 || $_pwd == 1 || $_forps == 1 || $_senior_citizen == 1) {
    				$plus_points = 5;
    			}else { $plus_points = 0; }
    			
    			$total_rank_points = $rank_points + $plus_points;

    			return $total_rank_points;
    		}	
    	    if($parent_income >= 136001 && $parent_income <=202000) {
    			$income_points = 90;

    			$grade_computed = $grade_points * 0.70;
    			$income_computed = $income_points * 0.30;

    			$rank_points = $grade_computed + $income_computed;

    			if($_dependent_solo_parent == 1 || $_applicant_solo_parent == 1 || $_ips == 1 || $_pwd == 1 || $_forps == 1 || $_senior_citizen == 1) {
    				$plus_points = 5;
    			}else { $plus_points = 0; }
    			
    			$total_rank_points = $rank_points + $plus_points;

    			return $total_rank_points;
    		}	
    		if($parent_income >= 202001 && $parent_income <=268000) {
    			$income_points = 85;

    			$grade_computed = $grade_points * 0.70;
    			$income_computed = $income_points * 0.30;

    			$rank_points = $grade_computed + $income_computed;

    			if($_dependent_solo_parent == 1 || $_applicant_solo_parent == 1 || $_ips == 1 || $_pwd == 1 || $_forps == 1 || $_senior_citizen == 1) {
    				$plus_points = 5;
    			}else { $plus_points = 0; }
    			
    			$total_rank_points = $rank_points + $plus_points;

    			return $total_rank_points;
    		}
    		if($parent_income >= 268001 && $parent_income <=334000) {
    			$income_points = 80;

    			$grade_computed = $grade_points * 0.70;
    			$income_computed = $income_points * 0.30;

    			$rank_points = $grade_computed + $income_computed;

    			if($_dependent_solo_parent == 1 || $_applicant_solo_parent == 1 || $_ips == 1 || $_pwd == 1 || $_forps == 1 || $_senior_citizen == 1) {
    				$plus_points = 5;
    			}else { $plus_points = 0; }
    			
    			$total_rank_points = $rank_points + $plus_points;

    			return $total_rank_points;
    		}
    		if($parent_income >= 334001 && $parent_income <=400000) {
    			$income_points = 75;

    			$grade_computed = $grade_points * 0.70;
    			$income_computed = $income_points * 0.30;

    			$rank_points = $grade_computed + $income_computed;

    			if($_dependent_solo_parent == 1 || $_applicant_solo_parent == 1 || $_ips == 1 || $_pwd == 1 || $_forps == 1 || $_senior_citizen == 1) {
    				$plus_points = 5;
    			}else { $plus_points = 0; }
    			
    			$total_rank_points = $rank_points + $plus_points;

    			return $total_rank_points;
    		}
    		if($parent_income >= 400001 && $parent_income <=900000) {
    			$income_points = 50;

    			$grade_computed = $grade_points * 0.70;
    			$income_computed = $income_points * 0.30;

    			$rank_points = $grade_computed + $income_computed;

    			if($_dependent_solo_parent == 1 || $_applicant_solo_parent == 1 || $_ips == 1 || $_pwd == 1 || $_forps == 1 || $_senior_citizen == 1) {
    				$plus_points = 5;
    			}else { $plus_points = 0; }
    			
    			$total_rank_points = $rank_points + $plus_points;

    			return $total_rank_points;
    		}				  
    	
    	}

 
    	if($gwa >= 95 && $gwa <= 96) {

    	   	$grade_points = 90;

    	    if($parent_income >= 0 && $parent_income <=70000) {
    			$income_points = 100;

    			$grade_computed = $grade_points * 0.70;
    			$income_computed = $income_points * 0.30;

    			$rank_points = $grade_computed + $income_computed;

    			if($_dependent_solo_parent == 1 || $_applicant_solo_parent == 1 || $_ips == 1 || $_pwd == 1 || $_forps == 1 || $_senior_citizen == 1) {
    				$plus_points = 5;
    			}else { $plus_points = 0; }
    			
    			$total_rank_points = $rank_points + $plus_points;

    			return $total_rank_points;
    		}	
    	    if($parent_income >= 70001 && $parent_income <=136000) {
    			$income_points = 95;

    			$grade_computed = $grade_points * 0.70;
    			$income_computed = $income_points * 0.30;

    			$rank_points = $grade_computed + $income_computed;

    			if($_dependent_solo_parent == 1 || $_applicant_solo_parent == 1 || $_ips == 1 || $_pwd == 1 || $_forps == 1 || $_senior_citizen == 1) {
    				$plus_points = 5;
    			}else { $plus_points = 0; }
    			
    			$total_rank_points = $rank_points + $plus_points;

    			return $total_rank_points;
    		}	
    	    if($parent_income >= 136001 && $parent_income <=202000) {
    			$income_points = 90;

    			$grade_computed = $grade_points * 0.70;
    			$income_computed = $income_points * 0.30;

    			$rank_points = $grade_computed + $income_computed;

    			if($_dependent_solo_parent == 1 || $_applicant_solo_parent == 1 || $_ips == 1 || $_pwd == 1 || $_forps == 1 || $_senior_citizen == 1) {
    				$plus_points = 5;
    			}else { $plus_points = 0; }
    			
    			$total_rank_points = $rank_points + $plus_points;

    			return $total_rank_points;
    		}	
    		if($parent_income >= 202001 && $parent_income <=268000) {
    			$income_points = 85;

    			$grade_computed = $grade_points * 0.70;
    			$income_computed = $income_points * 0.30;

    			$rank_points = $grade_computed + $income_computed;

    			if($_dependent_solo_parent == 1 || $_applicant_solo_parent == 1 || $_ips == 1 || $_pwd == 1 || $_forps == 1 || $_senior_citizen == 1) {
    				$plus_points = 5;
    			}else { $plus_points = 0; }
    			
    			$total_rank_points = $rank_points + $plus_points;

    			return $total_rank_points;
    		}
    		if($parent_income >= 268001 && $parent_income <=334000) {
    			$income_points = 80;

    			$grade_computed = $grade_points * 0.70;
    			$income_computed = $income_points * 0.30;

    			$rank_points = $grade_computed + $income_computed;

    			if($_dependent_solo_parent == 1 || $_applicant_solo_parent == 1 || $_ips == 1 || $_pwd == 1 || $_forps == 1 || $_senior_citizen == 1) {
    				$plus_points = 5;
    			}else { $plus_points = 0; }
    			
    			$total_rank_points = $rank_points + $plus_points;

    			return $total_rank_points;
    		}
    		if($parent_income >= 334001 && $parent_income <=400000) {
    			$income_points = 75;

    			$grade_computed = $grade_points * 0.70;
    			$income_computed = $income_points * 0.30;

    			$rank_points = $grade_computed + $income_computed;

    			if($_dependent_solo_parent == 1 || $_applicant_solo_parent == 1 || $_ips == 1 || $_pwd == 1 || $_forps == 1 || $_senior_citizen == 1) {
    				$plus_points = 5;
    			}else { $plus_points = 0; }
    			
    			$total_rank_points = $rank_points + $plus_points;

    			return $total_rank_points;
    		}
    		if($parent_income >= 400001 && $parent_income <=900000) {
    			$income_points = 50;

    			$grade_computed = $grade_points * 0.70;
    			$income_computed = $income_points * 0.30;

    			$rank_points = $grade_computed + $income_computed;

    			if($_dependent_solo_parent == 1 || $_applicant_solo_parent == 1 || $_ips == 1 || $_pwd == 1 || $_forps == 1 || $_senior_citizen == 1) {
    				$plus_points = 5;
    			}else { $plus_points = 0; }
    			
    			$total_rank_points = $rank_points + $plus_points;

    			return $total_rank_points;
    		}				  
    	
    	}
    	if($gwa >= 93 && $gwa <= 94) {

    	   	$grade_points = 85;

    	    if($parent_income >= 0 && $parent_income <=70000) {
    			$income_points = 100;

    			$grade_computed = $grade_points * 0.70;
    			$income_computed = $income_points * 0.30;

    			$rank_points = $grade_computed + $income_computed;

    			if($_dependent_solo_parent == 1 || $_applicant_solo_parent == 1 || $_ips == 1 || $_pwd == 1 || $_forps == 1 || $_senior_citizen == 1) {
    				$plus_points = 5;
    			}else { $plus_points = 0; }
    			
    			$total_rank_points = $rank_points + $plus_points;

    			return $total_rank_points;
    		}	
    	    if($parent_income >= 70001 && $parent_income <=136000) {
    			$income_points = 95;

    			$grade_computed = $grade_points * 0.70;
    			$income_computed = $income_points * 0.30;

    			$rank_points = $grade_computed + $income_computed;

    			if($_dependent_solo_parent == 1 || $_applicant_solo_parent == 1 || $_ips == 1 || $_pwd == 1 || $_forps == 1 || $_senior_citizen == 1) {
    				$plus_points = 5;
    			}else { $plus_points = 0; }
    			
    			$total_rank_points = $rank_points + $plus_points;

    			return $total_rank_points;
    		}	
    	    if($parent_income >= 136001 && $parent_income <=202000) {
    			$income_points = 90;

    			$grade_computed = $grade_points * 0.70;
    			$income_computed = $income_points * 0.30;

    			$rank_points = $grade_computed + $income_computed;

    			if($_dependent_solo_parent == 1 || $_applicant_solo_parent == 1 || $_ips == 1 || $_pwd == 1 || $_forps == 1 || $_senior_citizen == 1) {
    				$plus_points = 5;
    			}else { $plus_points = 0; }
    			
    			$total_rank_points = $rank_points + $plus_points;

    			return $total_rank_points;
    		}	
    		if($parent_income >= 202001 && $parent_income <=268000) {
    			$income_points = 85;

    			$grade_computed = $grade_points * 0.70;
    			$income_computed = $income_points * 0.30;

    			$rank_points = $grade_computed + $income_computed;

    			if($_dependent_solo_parent == 1 || $_applicant_solo_parent == 1 || $_ips == 1 || $_pwd == 1 || $_forps == 1 || $_senior_citizen == 1) {
    				$plus_points = 5;
    			}else { $plus_points = 0; }
    			
    			$total_rank_points = $rank_points + $plus_points;

    			return $total_rank_points;
    		}
    		if($parent_income >= 268001 && $parent_income <=334000) {
    			$income_points = 80;

    			$grade_computed = $grade_points * 0.70;
    			$income_computed = $income_points * 0.30;

    			$rank_points = $grade_computed + $income_computed;

    			if($_dependent_solo_parent == 1 || $_applicant_solo_parent == 1 || $_ips == 1 || $_pwd == 1 || $_forps == 1 || $_senior_citizen == 1) {
    				$plus_points = 5;
    			}else { $plus_points = 0; }
    			
    			$total_rank_points = $rank_points + $plus_points;

    			return $total_rank_points;
    		}
    		if($parent_income >= 334001 && $parent_income <=400000) {
    			$income_points = 75;

    			$grade_computed = $grade_points * 0.70;
    			$income_computed = $income_points * 0.30;

    			$rank_points = $grade_computed + $income_computed;

    			if($_dependent_solo_parent == 1 || $_applicant_solo_parent == 1 || $_ips == 1 || $_pwd == 1 || $_forps == 1 || $_senior_citizen == 1) {
    				$plus_points = 5;
    			}else { $plus_points = 0; }
    			
    			$total_rank_points = $rank_points + $plus_points;

    			return $total_rank_points;
    		}
    		if($parent_income >= 400001 && $parent_income <=900000) {
    			$income_points = 50;

    			$grade_computed = $grade_points * 0.70;
    			$income_computed = $income_points * 0.30;

    			$rank_points = $grade_computed + $income_computed;

    			if($_dependent_solo_parent == 1 || $_applicant_solo_parent == 1 || $_ips == 1 || $_pwd == 1 || $_forps == 1 || $_senior_citizen == 1) {
    				$plus_points = 5;
    			}else { $plus_points = 0; }
    			
    			$total_rank_points = $rank_points + $plus_points;

    			return $total_rank_points;
    		}				  
    	
    	}

    	if($gwa >= 91 && $gwa <= 92) {

    	   	$grade_points = 80;

    	    if($parent_income >= 0 && $parent_income <=70000) {
    			$income_points = 100;

    			$grade_computed = $grade_points * 0.70;
    			$income_computed = $income_points * 0.30;

    			$rank_points = $grade_computed + $income_computed;

    			if($_dependent_solo_parent == 1 || $_applicant_solo_parent == 1 || $_ips == 1 || $_pwd == 1 || $_forps == 1 || $_senior_citizen == 1) {
    				$plus_points = 5;
    			}else { $plus_points = 0; }
    			
    			$total_rank_points = $rank_points + $plus_points;

    			return $total_rank_points;
    		}	
    	    if($parent_income >= 70001 && $parent_income <=136000) {
    			$income_points = 95;

    			$grade_computed = $grade_points * 0.70;
    			$income_computed = $income_points * 0.30;

    			$rank_points = $grade_computed + $income_computed;

    			if($_dependent_solo_parent == 1 || $_applicant_solo_parent == 1 || $_ips == 1 || $_pwd == 1 || $_forps == 1 || $_senior_citizen == 1) {
    				$plus_points = 5;
    			}else { $plus_points = 0; }
    			
    			$total_rank_points = $rank_points + $plus_points;

    			return $total_rank_points;
    		}	
    	    if($parent_income >= 136001 && $parent_income <=202000) {
    			$income_points = 90;

    			$grade_computed = $grade_points * 0.70;
    			$income_computed = $income_points * 0.30;

    			$rank_points = $grade_computed + $income_computed;

    			if($_dependent_solo_parent == 1 || $_applicant_solo_parent == 1 || $_ips == 1 || $_pwd == 1 || $_forps == 1 || $_senior_citizen == 1) {
    				$plus_points = 5;
    			}else { $plus_points = 0; }
    			
    			$total_rank_points = $rank_points + $plus_points;

    			return $total_rank_points;
    		}	
    		if($parent_income >= 202001 && $parent_income <=268000) {
    			$income_points = 85;

    			$grade_computed = $grade_points * 0.70;
    			$income_computed = $income_points * 0.30;

    			$rank_points = $grade_computed + $income_computed;

    			if($_dependent_solo_parent == 1 || $_applicant_solo_parent == 1 || $_ips == 1 || $_pwd == 1 || $_forps == 1 || $_senior_citizen == 1) {
    				$plus_points = 5;
    			}else { $plus_points = 0; }
    			
    			$total_rank_points = $rank_points + $plus_points;

    			return $total_rank_points;
    		}
    		if($parent_income >= 268001 && $parent_income <=334000) {
    			$income_points = 80;

    			$grade_computed = $grade_points * 0.70;
    			$income_computed = $income_points * 0.30;

    			$rank_points = $grade_computed + $income_computed;

    			if($_dependent_solo_parent == 1 || $_applicant_solo_parent == 1 || $_ips == 1 || $_pwd == 1 || $_forps == 1 || $_senior_citizen == 1) {
    				$plus_points = 5;
    			}else { $plus_points = 0; }
    			
    			$total_rank_points = $rank_points + $plus_points;

    			return $total_rank_points;
    		}
    		if($parent_income >= 334001 && $parent_income <=400000) {
    			$income_points = 75;

    			$grade_computed = $grade_points * 0.70;
    			$income_computed = $income_points * 0.30;

    			$rank_points = $grade_computed + $income_computed;

    			if($_dependent_solo_parent == 1 || $_applicant_solo_parent == 1 || $_ips == 1 || $_pwd == 1 || $_forps == 1 || $_senior_citizen == 1) {
    				$plus_points = 5;
    			}else { $plus_points = 0; }
    			
    			$total_rank_points = $rank_points + $plus_points;

    			return $total_rank_points;
    		}
    		if($parent_income >= 400001 && $parent_income <=900000) {
    			$income_points = 50;

    			$grade_computed = $grade_points * 0.70;
    			$income_computed = $income_points * 0.30;

    			$rank_points = $grade_computed + $income_computed;

    			if($_dependent_solo_parent == 1 || $_applicant_solo_parent == 1 || $_ips == 1 || $_pwd == 1 || $_forps == 1 || $_senior_citizen == 1) {
    				$plus_points = 5;
    			}else { $plus_points = 0; }
    			
    			$total_rank_points = $rank_points + $plus_points;

    			return $total_rank_points;
    		}				  
    	
    	}

    	if($gwa >= 89 && $gwa <= 90) {

    	   	$grade_points = 75;

    	    if($parent_income >= 0 && $parent_income <=70000) {
    			$income_points = 100;

    			$grade_computed = $grade_points * 0.70;
    			$income_computed = $income_points * 0.30;

    			$rank_points = $grade_computed + $income_computed;

    			if($_dependent_solo_parent == 1 || $_applicant_solo_parent == 1 || $_ips == 1 || $_pwd == 1 || $_forps == 1 || $_senior_citizen == 1) {
    				$plus_points = 5;
    			}else { $plus_points = 0; }
    			
    			$total_rank_points = $rank_points + $plus_points;

    			return $total_rank_points;
    		}	
    	    if($parent_income >= 70001 && $parent_income <=136000) {
    			$income_points = 95;

    			$grade_computed = $grade_points * 0.70;
    			$income_computed = $income_points * 0.30;

    			$rank_points = $grade_computed + $income_computed;

    			if($_dependent_solo_parent == 1 || $_applicant_solo_parent == 1 || $_ips == 1 || $_pwd == 1 || $_forps == 1 || $_senior_citizen == 1) {
    				$plus_points = 5;
    			}else { $plus_points = 0; }
    			
    			$total_rank_points = $rank_points + $plus_points;

    			return $total_rank_points;
    		}	
    	    if($parent_income >= 136001 && $parent_income <=202000) {
    			$income_points = 90;

    			$grade_computed = $grade_points * 0.70;
    			$income_computed = $income_points * 0.30;

    			$rank_points = $grade_computed + $income_computed;

    			if($_dependent_solo_parent == 1 || $_applicant_solo_parent == 1 || $_ips == 1 || $_pwd == 1 || $_forps == 1 || $_senior_citizen == 1) {
    				$plus_points = 5;
    			}else { $plus_points = 0; }
    			
    			$total_rank_points = $rank_points + $plus_points;

    			return $total_rank_points;
    		}	
    		if($parent_income >= 202001 && $parent_income <=268000) {
    			$income_points = 85;

    			$grade_computed = $grade_points * 0.70;
    			$income_computed = $income_points * 0.30;

    			$rank_points = $grade_computed + $income_computed;

    			if($_dependent_solo_parent == 1 || $_applicant_solo_parent == 1 || $_ips == 1 || $_pwd == 1 || $_forps == 1 || $_senior_citizen == 1) {
    				$plus_points = 5;
    			}else { $plus_points = 0; }
    			
    			$total_rank_points = $rank_points + $plus_points;

    			return $total_rank_points;
    		}
    		if($parent_income >= 268001 && $parent_income <=334000) {
    			$income_points = 80;

    			$grade_computed = $grade_points * 0.70;
    			$income_computed = $income_points * 0.30;

    			$rank_points = $grade_computed + $income_computed;

    			if($_dependent_solo_parent == 1 || $_applicant_solo_parent == 1 || $_ips == 1 || $_pwd == 1 || $_forps == 1 || $_senior_citizen == 1) {
    				$plus_points = 5;
    			}else { $plus_points = 0; }
    			
    			$total_rank_points = $rank_points + $plus_points;

    			return $total_rank_points;
    		}
    		if($parent_income >= 334001 && $parent_income <=400000) {
    			$income_points = 75;

    			$grade_computed = $grade_points * 0.70;
    			$income_computed = $income_points * 0.30;

    			$rank_points = $grade_computed + $income_computed;

    			if($_dependent_solo_parent == 1 || $_applicant_solo_parent == 1 || $_ips == 1 || $_pwd == 1 || $_forps == 1 || $_senior_citizen == 1) {
    				$plus_points = 5;
    			}else { $plus_points = 0; }
    			
    			$total_rank_points = $rank_points + $plus_points;

    			return $total_rank_points;
    		}
    		if($parent_income >= 400001 && $parent_income <=900000) {
    			$income_points = 50;

    			$grade_computed = $grade_points * 0.70;
    			$income_computed = $income_points * 0.30;

    			$rank_points = $grade_computed + $income_computed;

    			if($_dependent_solo_parent == 1 || $_applicant_solo_parent == 1 || $_ips == 1 || $_pwd == 1 || $_forps == 1 || $_senior_citizen == 1) {
    				$plus_points = 5;
    			}else { $plus_points = 0; }
    			
    			$total_rank_points = $rank_points + $plus_points;

    			return $total_rank_points;
    		}				  
    	
    	}

    	if($gwa >= 87 && $gwa <= 88) {

    	   	$grade_points = 70;

    	    if($parent_income >= 0 && $parent_income <=70000) {
    			$income_points = 100;

    			$grade_computed = $grade_points * 0.70;
    			$income_computed = $income_points * 0.30;

    			$rank_points = $grade_computed + $income_computed;

    			if($_dependent_solo_parent == 1 || $_applicant_solo_parent == 1 || $_ips == 1 || $_pwd == 1 || $_forps == 1 || $_senior_citizen == 1) {
    				$plus_points = 5;
    			}else { $plus_points = 0; }
    			
    			$total_rank_points = $rank_points + $plus_points;

    			return $total_rank_points;
    		}	
    	    if($parent_income >= 70001 && $parent_income <=136000) {
    			$income_points = 95;

    			$grade_computed = $grade_points * 0.70;
    			$income_computed = $income_points * 0.30;

    			$rank_points = $grade_computed + $income_computed;

    			if($_dependent_solo_parent == 1 || $_applicant_solo_parent == 1 || $_ips == 1 || $_pwd == 1 || $_forps == 1 || $_senior_citizen == 1) {
    				$plus_points = 5;
    			}else { $plus_points = 0; }
    			
    			$total_rank_points = $rank_points + $plus_points;

    			return $total_rank_points;
    		}	
    	    if($parent_income >= 136001 && $parent_income <=202000) {
    			$income_points = 90;

    			$grade_computed = $grade_points * 0.70;
    			$income_computed = $income_points * 0.30;

    			$rank_points = $grade_computed + $income_computed;

    			if($_dependent_solo_parent == 1 || $_applicant_solo_parent == 1 || $_ips == 1 || $_pwd == 1 || $_forps == 1 || $_senior_citizen == 1) {
    				$plus_points = 5;
    			}else { $plus_points = 0; }
    			
    			$total_rank_points = $rank_points + $plus_points;

    			return $total_rank_points;
    		}	
    		if($parent_income >= 202001 && $parent_income <=268000) {
    			$income_points = 85;

    			$grade_computed = $grade_points * 0.70;
    			$income_computed = $income_points * 0.30;

    			$rank_points = $grade_computed + $income_computed;

    			if($_dependent_solo_parent == 1 || $_applicant_solo_parent == 1 || $_ips == 1 || $_pwd == 1 || $_forps == 1 || $_senior_citizen == 1) {
    				$plus_points = 5;
    			}else { $plus_points = 0; }
    			
    			$total_rank_points = $rank_points + $plus_points;

    			return $total_rank_points;
    		}
    		if($parent_income >= 268001 && $parent_income <=334000) {
    			$income_points = 80;

    			$grade_computed = $grade_points * 0.70;
    			$income_computed = $income_points * 0.30;

    			$rank_points = $grade_computed + $income_computed;

    			if($_dependent_solo_parent == 1 || $_applicant_solo_parent == 1 || $_ips == 1 || $_pwd == 1 || $_forps == 1 || $_senior_citizen == 1) {
    				$plus_points = 5;
    			}else { $plus_points = 0; }
    			
    			$total_rank_points = $rank_points + $plus_points;

    			return $total_rank_points;
    		}
    		if($parent_income >= 334001 && $parent_income <=400000) {
    			$income_points = 75;

    			$grade_computed = $grade_points * 0.70;
    			$income_computed = $income_points * 0.30;

    			$rank_points = $grade_computed + $income_computed;

    			if($_dependent_solo_parent == 1 || $_applicant_solo_parent == 1 || $_ips == 1 || $_pwd == 1 || $_forps == 1 || $_senior_citizen == 1) {
    				$plus_points = 5;
    			}else { $plus_points = 0; }
    			
    			$total_rank_points = $rank_points + $plus_points;

    			return $total_rank_points;
    		}
    		if($parent_income >= 400001 && $parent_income <=900000) {
    			$income_points = 50;

    			$grade_computed = $grade_points * 0.70;
    			$income_computed = $income_points * 0.30;

    			$rank_points = $grade_computed + $income_computed;

    			if($_dependent_solo_parent == 1 || $_applicant_solo_parent == 1 || $_ips == 1 || $_pwd == 1 || $_forps == 1 || $_senior_citizen == 1) {
    				$plus_points = 5;
    			}else { $plus_points = 0; }
    			
    			$total_rank_points = $rank_points + $plus_points;

    			return $total_rank_points;
    		}				  
    	
    	}

    	if($gwa >= 85 && $gwa <= 86) {

    	   	$grade_points = 65;

    	    if($parent_income >= 0 && $parent_income <=70000) {
    			$income_points = 100;

    			$grade_computed = $grade_points * 0.70;
    			$income_computed = $income_points * 0.30;

    			$rank_points = $grade_computed + $income_computed;

    			if($_dependent_solo_parent == 1 || $_applicant_solo_parent == 1 || $_ips == 1 || $_pwd == 1 || $_forps == 1 || $_senior_citizen == 1) {
    				$plus_points = 5;
    			}else { $plus_points = 0; }
    			
    			$total_rank_points = $rank_points + $plus_points;

    			return $total_rank_points;
    		}	
    	    if($parent_income >= 70001 && $parent_income <=136000) {
    			$income_points = 95;

    			$grade_computed = $grade_points * 0.70;
    			$income_computed = $income_points * 0.30;

    			$rank_points = $grade_computed + $income_computed;

    			if($_dependent_solo_parent == 1 || $_applicant_solo_parent == 1 || $_ips == 1 || $_pwd == 1 || $_forps == 1 || $_senior_citizen == 1) {
    				$plus_points = 5;
    			}else { $plus_points = 0; }
    			
    			$total_rank_points = $rank_points + $plus_points;

    			return $total_rank_points;
    		}	
    	    if($parent_income >= 136001 && $parent_income <=202000) {
    			$income_points = 90;

    			$grade_computed = $grade_points * 0.70;
    			$income_computed = $income_points * 0.30;

    			$rank_points = $grade_computed + $income_computed;

    			if($_dependent_solo_parent == 1 || $_applicant_solo_parent == 1 || $_ips == 1 || $_pwd == 1 || $_forps == 1 || $_senior_citizen == 1) {
    				$plus_points = 5;
    			}else { $plus_points = 0; }
    			
    			$total_rank_points = $rank_points + $plus_points;

    			return $total_rank_points;
    		}	
    		if($parent_income >= 202001 && $parent_income <=268000) {
    			$income_points = 85;

    			$grade_computed = $grade_points * 0.70;
    			$income_computed = $income_points * 0.30;

    			$rank_points = $grade_computed + $income_computed;

    			if($_dependent_solo_parent == 1 || $_applicant_solo_parent == 1 || $_ips == 1 || $_pwd == 1 || $_forps == 1 || $_senior_citizen == 1) {
    				$plus_points = 5;
    			}else { $plus_points = 0; }
    			
    			$total_rank_points = $rank_points + $plus_points;

    			return $total_rank_points;
    		}
    		if($parent_income >= 268001 && $parent_income <=334000) {
    			$income_points = 80;

    			$grade_computed = $grade_points * 0.70;
    			$income_computed = $income_points * 0.30;

    			$rank_points = $grade_computed + $income_computed;

    			if($_dependent_solo_parent == 1 || $_applicant_solo_parent == 1 || $_ips == 1 || $_pwd == 1 || $_forps == 1 || $_senior_citizen == 1) {
    				$plus_points = 5;
    			}else { $plus_points = 0; }
    			
    			$total_rank_points = $rank_points + $plus_points;

    			return $total_rank_points;
    		}
    		if($parent_income >= 334001 && $parent_income <=400000) {
    			$income_points = 75;

    			$grade_computed = $grade_points * 0.70;
    			$income_computed = $income_points * 0.30;

    			$rank_points = $grade_computed + $income_computed;

    			if($_dependent_solo_parent == 1 || $_applicant_solo_parent == 1 || $_ips == 1 || $_pwd == 1 || $_forps == 1 || $_senior_citizen == 1) {
    				$plus_points = 5;
    			}else { $plus_points = 0; }
    			
    			$total_rank_points = $rank_points + $plus_points;

    			return $total_rank_points;
    		}
    		if($parent_income >= 400001 && $parent_income <=900000) {
    			$income_points = 50;

    			$grade_computed = $grade_points * 0.70;
    			$income_computed = $income_points * 0.30;

    			$rank_points = $grade_computed + $income_computed;

    			if($_dependent_solo_parent == 1 || $_applicant_solo_parent == 1 || $_ips == 1 || $_pwd == 1 || $_forps == 1 || $_senior_citizen == 1) {
    				$plus_points = 5;
    			}else { $plus_points = 0; }
    			
    			$total_rank_points = $rank_points + $plus_points;

    			return $total_rank_points;
    		}				  
    	
    	}

    	if($gwa >= 83 && $gwa <= 84) {

    	   	$grade_points = 60;

    	    if($parent_income >= 0 && $parent_income <=70000) {
    			$income_points = 100;

    			$grade_computed = $grade_points * 0.70;
    			$income_computed = $income_points * 0.30;

    			$rank_points = $grade_computed + $income_computed;

    			if($_dependent_solo_parent == 1 || $_applicant_solo_parent == 1 || $_ips == 1 || $_pwd == 1 || $_forps == 1 || $_senior_citizen == 1) {
    				$plus_points = 5;
    			}else { $plus_points = 0; }
    			
    			$total_rank_points = $rank_points + $plus_points;

    			return $total_rank_points;
    		}	
    	    if($parent_income >= 70001 && $parent_income <=136000) {
    			$income_points = 95;

    			$grade_computed = $grade_points * 0.70;
    			$income_computed = $income_points * 0.30;

    			$rank_points = $grade_computed + $income_computed;

    			if($_dependent_solo_parent == 1 || $_applicant_solo_parent == 1 || $_ips == 1 || $_pwd == 1 || $_forps == 1 || $_senior_citizen == 1) {
    				$plus_points = 5;
    			}else { $plus_points = 0; }
    			
    			$total_rank_points = $rank_points + $plus_points;

    			return $total_rank_points;
    		}	
    	    if($parent_income >= 136001 && $parent_income <=202000) {
    			$income_points = 90;

    			$grade_computed = $grade_points * 0.70;
    			$income_computed = $income_points * 0.30;

    			$rank_points = $grade_computed + $income_computed;

    			if($_dependent_solo_parent == 1 || $_applicant_solo_parent == 1 || $_ips == 1 || $_pwd == 1 || $_forps == 1 || $_senior_citizen == 1) {
    				$plus_points = 5;
    			}else { $plus_points = 0; }
    			
    			$total_rank_points = $rank_points + $plus_points;

    			return $total_rank_points;
    		}	
    		if($parent_income >= 202001 && $parent_income <=268000) {
    			$income_points = 85;

    			$grade_computed = $grade_points * 0.70;
    			$income_computed = $income_points * 0.30;

    			$rank_points = $grade_computed + $income_computed;

    			if($_dependent_solo_parent == 1 || $_applicant_solo_parent == 1 || $_ips == 1 || $_pwd == 1 || $_forps == 1 || $_senior_citizen == 1) {
    				$plus_points = 5;
    			}else { $plus_points = 0; }
    			
    			$total_rank_points = $rank_points + $plus_points;

    			return $total_rank_points;
    		}
    		if($parent_income >= 268001 && $parent_income <=334000) {
    			$income_points = 80;

    			$grade_computed = $grade_points * 0.70;
    			$income_computed = $income_points * 0.30;

    			$rank_points = $grade_computed + $income_computed;

    			if($_dependent_solo_parent == 1 || $_applicant_solo_parent == 1 || $_ips == 1 || $_pwd == 1 || $_forps == 1 || $_senior_citizen == 1) {
    				$plus_points = 5;
    			}else { $plus_points = 0; }
    			
    			$total_rank_points = $rank_points + $plus_points;

    			return $total_rank_points;
    		}
    		if($parent_income >= 334001 && $parent_income <=400000) {
    			$income_points = 75;

    			$grade_computed = $grade_points * 0.70;
    			$income_computed = $income_points * 0.30;

    			$rank_points = $grade_computed + $income_computed;

    			if($_dependent_solo_parent == 1 || $_applicant_solo_parent == 1 || $_ips == 1 || $_pwd == 1 || $_forps == 1 || $_senior_citizen == 1) {
    				$plus_points = 5;
    			}else { $plus_points = 0; }
    			
    			$total_rank_points = $rank_points + $plus_points;

    			return $total_rank_points;
    		}
    		if($parent_income >= 400001 && $parent_income <=900000) {
    			$income_points = 50;

    			$grade_computed = $grade_points * 0.70;
    			$income_computed = $income_points * 0.30;

    			$rank_points = $grade_computed + $income_computed;

    			if($_dependent_solo_parent == 1 || $_applicant_solo_parent == 1 || $_ips == 1 || $_pwd == 1 || $_forps == 1 || $_senior_citizen == 1) {
    				$plus_points = 5;
    			}else { $plus_points = 0; }
    			
    			$total_rank_points = $rank_points + $plus_points;

    			return $total_rank_points;
    		}				  
    	
    	}

    	if($gwa >= 81 && $gwa <= 82) {

    	   	$grade_points = 55;

    	    if($parent_income >= 0 && $parent_income <=70000) {
    			$income_points = 100;

    			$grade_computed = $grade_points * 0.70;
    			$income_computed = $income_points * 0.30;

    			$rank_points = $grade_computed + $income_computed;

    			if($_dependent_solo_parent == 1 || $_applicant_solo_parent == 1 || $_ips == 1 || $_pwd == 1 || $_forps == 1 || $_senior_citizen == 1) {
    				$plus_points = 5;
    			}else { $plus_points = 0; }
    			
    			$total_rank_points = $rank_points + $plus_points;

    			return $total_rank_points;
    		}	
    	    if($parent_income >= 70001 && $parent_income <=136000) {
    			$income_points = 95;

    			$grade_computed = $grade_points * 0.70;
    			$income_computed = $income_points * 0.30;

    			$rank_points = $grade_computed + $income_computed;

    			if($_dependent_solo_parent == 1 || $_applicant_solo_parent == 1 || $_ips == 1 || $_pwd == 1 || $_forps == 1 || $_senior_citizen == 1) {
    				$plus_points = 5;
    			}else { $plus_points = 0; }
    			
    			$total_rank_points = $rank_points + $plus_points;

    			return $total_rank_points;
    		}	
    	    if($parent_income >= 136001 && $parent_income <=202000) {
    			$income_points = 90;

    			$grade_computed = $grade_points * 0.70;
    			$income_computed = $income_points * 0.30;

    			$rank_points = $grade_computed + $income_computed;

    			if($_dependent_solo_parent == 1 || $_applicant_solo_parent == 1 || $_ips == 1 || $_pwd == 1 || $_forps == 1 || $_senior_citizen == 1) {
    				$plus_points = 5;
    			}else { $plus_points = 0; }
    			
    			$total_rank_points = $rank_points + $plus_points;

    			return $total_rank_points;
    		}	
    		if($parent_income >= 202001 && $parent_income <=268000) {
    			$income_points = 85;

    			$grade_computed = $grade_points * 0.70;
    			$income_computed = $income_points * 0.30;

    			$rank_points = $grade_computed + $income_computed;

    			if($_dependent_solo_parent == 1 || $_applicant_solo_parent == 1 || $_ips == 1 || $_pwd == 1 || $_forps == 1 || $_senior_citizen == 1) {
    				$plus_points = 5;
    			}else { $plus_points = 0; }
    			
    			$total_rank_points = $rank_points + $plus_points;

    			return $total_rank_points;
    		}
    		if($parent_income >= 268001 && $parent_income <=334000) {
    			$income_points = 80;

    			$grade_computed = $grade_points * 0.70;
    			$income_computed = $income_points * 0.30;

    			$rank_points = $grade_computed + $income_computed;

    			if($_dependent_solo_parent == 1 || $_applicant_solo_parent == 1 || $_ips == 1 || $_pwd == 1 || $_forps == 1 || $_senior_citizen == 1) {
    				$plus_points = 5;
    			}else { $plus_points = 0; }
    			
    			$total_rank_points = $rank_points + $plus_points;

    			return $total_rank_points;
    		}
    		if($parent_income >= 334001 && $parent_income <=400000) {
    			$income_points = 75;

    			$grade_computed = $grade_points * 0.70;
    			$income_computed = $income_points * 0.30;

    			$rank_points = $grade_computed + $income_computed;

    			if($_dependent_solo_parent == 1 || $_applicant_solo_parent == 1 || $_ips == 1 || $_pwd == 1 || $_forps == 1 || $_senior_citizen == 1) {
    				$plus_points = 5;
    			}else { $plus_points = 0; }
    			
    			$total_rank_points = $rank_points + $plus_points;

    			return $total_rank_points;
    		}
    		if($parent_income >= 400001 && $parent_income <=900000) {
    			$income_points = 50;

    			$grade_computed = $grade_points * 0.70;
    			$income_computed = $income_points * 0.30;

    			$rank_points = $grade_computed + $income_computed;

    			if($_dependent_solo_parent == 1 || $_applicant_solo_parent == 1 || $_ips == 1 || $_pwd == 1 || $_forps == 1 || $_senior_citizen == 1) {
    				$plus_points = 5;
    			}else { $plus_points = 0; }
    			
    			$total_rank_points = $rank_points + $plus_points;

    			return $total_rank_points;
    		}				  
    	
    	}

    	if($gwa >= 79 && $gwa <= 80) {

    	   	$grade_points = 50;

    	    if($parent_income >= 0 && $parent_income <=70000) {
    			$income_points = 100;

    			$grade_computed = $grade_points * 0.70;
    			$income_computed = $income_points * 0.30;

    			$rank_points = $grade_computed + $income_computed;

    			if($_dependent_solo_parent == 1 || $_applicant_solo_parent == 1 || $_ips == 1 || $_pwd == 1 || $_forps == 1 || $_senior_citizen == 1) {
    				$plus_points = 5;
    			}else { $plus_points = 0; }
    			
    			$total_rank_points = $rank_points + $plus_points;

    			return $total_rank_points;
    		}	
    	    if($parent_income >= 70001 && $parent_income <=136000) {
    			$income_points = 95;

    			$grade_computed = $grade_points * 0.70;
    			$income_computed = $income_points * 0.30;

    			$rank_points = $grade_computed + $income_computed;

    			if($_dependent_solo_parent == 1 || $_applicant_solo_parent == 1 || $_ips == 1 || $_pwd == 1 || $_forps == 1 || $_senior_citizen == 1) {
    				$plus_points = 5;
    			}else { $plus_points = 0; }
    			
    			$total_rank_points = $rank_points + $plus_points;

    			return $total_rank_points;
    		}	
    	    if($parent_income >= 136001 && $parent_income <=202000) {
    			$income_points = 90;

    			$grade_computed = $grade_points * 0.70;
    			$income_computed = $income_points * 0.30;

    			$rank_points = $grade_computed + $income_computed;

    			if($_dependent_solo_parent == 1 || $_applicant_solo_parent == 1 || $_ips == 1 || $_pwd == 1 || $_forps == 1 || $_senior_citizen == 1) {
    				$plus_points = 5;
    			}else { $plus_points = 0; }
    			
    			$total_rank_points = $rank_points + $plus_points;

    			return $total_rank_points;
    		}	
    		if($parent_income >= 202001 && $parent_income <=268000) {
    			$income_points = 85;

    			$grade_computed = $grade_points * 0.70;
    			$income_computed = $income_points * 0.30;

    			$rank_points = $grade_computed + $income_computed;

    			if($_dependent_solo_parent == 1 || $_applicant_solo_parent == 1 || $_ips == 1 || $_pwd == 1 || $_forps == 1 || $_senior_citizen == 1) {
    				$plus_points = 5;
    			}else { $plus_points = 0; }
    			
    			$total_rank_points = $rank_points + $plus_points;

    			return $total_rank_points;
    		}
    		if($parent_income >= 268001 && $parent_income <=334000) {
    			$income_points = 80;

    			$grade_computed = $grade_points * 0.70;
    			$income_computed = $income_points * 0.30;

    			$rank_points = $grade_computed + $income_computed;

    			if($_dependent_solo_parent == 1 || $_applicant_solo_parent == 1 || $_ips == 1 || $_pwd == 1 || $_forps == 1 || $_senior_citizen == 1) {
    				$plus_points = 5;
    			}else { $plus_points = 0; }
    			
    			$total_rank_points = $rank_points + $plus_points;

    			return $total_rank_points;
    		}
    		if($parent_income >= 334001 && $parent_income <=400000) {
    			$income_points = 75;

    			$grade_computed = $grade_points * 0.70;
    			$income_computed = $income_points * 0.30;

    			$rank_points = $grade_computed + $income_computed;

    			if($_dependent_solo_parent == 1 || $_applicant_solo_parent == 1 || $_ips == 1 || $_pwd == 1 || $_forps == 1 || $_senior_citizen == 1) {
    				$plus_points = 5;
    			}else { $plus_points = 0; }
    			
    			$total_rank_points = $rank_points + $plus_points;

    			return $total_rank_points;
    		}
    		if($parent_income >= 400001 && $parent_income <=900000) {
    			$income_points = 50;

    			$grade_computed = $grade_points * 0.70;
    			$income_computed = $income_points * 0.30;

    			$rank_points = $grade_computed + $income_computed;

    			if($_dependent_solo_parent == 1 || $_applicant_solo_parent == 1 || $_ips == 1 || $_pwd == 1 || $_forps == 1 || $_senior_citizen == 1) {
    				$plus_points = 5;
    			}else { $plus_points = 0; }
    			
    			$total_rank_points = $rank_points + $plus_points;

    			return $total_rank_points;
    		}				  
    	
    	}

    	if($gwa >= 77 && $gwa <= 78) {

    	   	$grade_points = 45;

    	    if($parent_income >= 0 && $parent_income <=70000) {
    			$income_points = 100;

    			$grade_computed = $grade_points * 0.70;
    			$income_computed = $income_points * 0.30;

    			$rank_points = $grade_computed + $income_computed;

    			if($_dependent_solo_parent == 1 || $_applicant_solo_parent == 1 || $_ips == 1 || $_pwd == 1 || $_forps == 1 || $_senior_citizen == 1) {
    				$plus_points = 5;
    			}else { $plus_points = 0; }
    			
    			$total_rank_points = $rank_points + $plus_points;

    			return $total_rank_points;
    		}	
    	    if($parent_income >= 70001 && $parent_income <=136000) {
    			$income_points = 95;

    			$grade_computed = $grade_points * 0.70;
    			$income_computed = $income_points * 0.30;

    			$rank_points = $grade_computed + $income_computed;

    			if($_dependent_solo_parent == 1 || $_applicant_solo_parent == 1 || $_ips == 1 || $_pwd == 1 || $_forps == 1 || $_senior_citizen == 1) {
    				$plus_points = 5;
    			}else { $plus_points = 0; }
    			
    			$total_rank_points = $rank_points + $plus_points;

    			return $total_rank_points;
    		}	
    	    if($parent_income >= 136001 && $parent_income <=202000) {
    			$income_points = 90;

    			$grade_computed = $grade_points * 0.70;
    			$income_computed = $income_points * 0.30;

    			$rank_points = $grade_computed + $income_computed;

    			if($_dependent_solo_parent == 1 || $_applicant_solo_parent == 1 || $_ips == 1 || $_pwd == 1 || $_forps == 1 || $_senior_citizen == 1) {
    				$plus_points = 5;
    			}else { $plus_points = 0; }
    			
    			$total_rank_points = $rank_points + $plus_points;

    			return $total_rank_points;
    		}	
    		if($parent_income >= 202001 && $parent_income <=268000) {
    			$income_points = 85;

    			$grade_computed = $grade_points * 0.70;
    			$income_computed = $income_points * 0.30;

    			$rank_points = $grade_computed + $income_computed;

    			if($_dependent_solo_parent == 1 || $_applicant_solo_parent == 1 || $_ips == 1 || $_pwd == 1 || $_forps == 1 || $_senior_citizen == 1) {
    				$plus_points = 5;
    			}else { $plus_points = 0; }
    			
    			$total_rank_points = $rank_points + $plus_points;

    			return $total_rank_points;
    		}
    		if($parent_income >= 268001 && $parent_income <=334000) {
    			$income_points = 80;

    			$grade_computed = $grade_points * 0.70;
    			$income_computed = $income_points * 0.30;

    			$rank_points = $grade_computed + $income_computed;

    			if($_dependent_solo_parent == 1 || $_applicant_solo_parent == 1 || $_ips == 1 || $_pwd == 1 || $_forps == 1 || $_senior_citizen == 1) {
    				$plus_points = 5;
    			}else { $plus_points = 0; }
    			
    			$total_rank_points = $rank_points + $plus_points;

    			return $total_rank_points;
    		}
    		if($parent_income >= 334001 && $parent_income <=400000) {
    			$income_points = 75;

    			$grade_computed = $grade_points * 0.70;
    			$income_computed = $income_points * 0.30;

    			$rank_points = $grade_computed + $income_computed;

    			if($_dependent_solo_parent == 1 || $_applicant_solo_parent == 1 || $_ips == 1 || $_pwd == 1 || $_forps == 1 || $_senior_citizen == 1) {
    				$plus_points = 5;
    			}else { $plus_points = 0; }
    			
    			$total_rank_points = $rank_points + $plus_points;

    			return $total_rank_points;
    		}
    		if($parent_income >= 400001 && $parent_income <=900000) {
    			$income_points = 50;

    			$grade_computed = $grade_points * 0.70;
    			$income_computed = $income_points * 0.30;

    			$rank_points = $grade_computed + $income_computed;

    			if($_dependent_solo_parent == 1 || $_applicant_solo_parent == 1 || $_ips == 1 || $_pwd == 1 || $_forps == 1 || $_senior_citizen == 1) {
    				$plus_points = 5;
    			}else { $plus_points = 0; }
    			
    			$total_rank_points = $rank_points + $plus_points;

    			return $total_rank_points;
    		}				  
    	
    	}

    	if($gwa >= 75 && $gwa <= 76) {

    	   	$grade_points = 40;

    	    if($parent_income >= 0 && $parent_income <=70000) {
    			$income_points = 100;

    			$grade_computed = $grade_points * 0.70;
    			$income_computed = $income_points * 0.30;

    			$rank_points = $grade_computed + $income_computed;

    			if($_dependent_solo_parent == 1 || $_applicant_solo_parent == 1 || $_ips == 1 || $_pwd == 1 || $_forps == 1 || $_senior_citizen == 1) {
    				$plus_points = 5;
    			}else { $plus_points = 0; }
    			
    			$total_rank_points = $rank_points + $plus_points;

    			return $total_rank_points;
    		}	
    	    if($parent_income >= 70001 && $parent_income <=136000) {
    			$income_points = 95;

    			$grade_computed = $grade_points * 0.70;
    			$income_computed = $income_points * 0.30;

    			$rank_points = $grade_computed + $income_computed;

    			if($_dependent_solo_parent == 1 || $_applicant_solo_parent == 1 || $_ips == 1 || $_pwd == 1 || $_forps == 1 || $_senior_citizen == 1) {
    				$plus_points = 5;
    			}else { $plus_points = 0; }
    			
    			$total_rank_points = $rank_points + $plus_points;

    			return $total_rank_points;
    		}	
    	    if($parent_income >= 136001 && $parent_income <=202000) {
    			$income_points = 90;

    			$grade_computed = $grade_points * 0.70;
    			$income_computed = $income_points * 0.30;

    			$rank_points = $grade_computed + $income_computed;

    			if($_dependent_solo_parent == 1 || $_applicant_solo_parent == 1 || $_ips == 1 || $_pwd == 1 || $_forps == 1 || $_senior_citizen == 1) {
    				$plus_points = 5;
    			}else { $plus_points = 0; }
    			
    			$total_rank_points = $rank_points + $plus_points;

    			return $total_rank_points;
    		}	
    		if($parent_income >= 202001 && $parent_income <=268000) {
    			$income_points = 85;

    			$grade_computed = $grade_points * 0.70;
    			$income_computed = $income_points * 0.30;

    			$rank_points = $grade_computed + $income_computed;

    			if($_dependent_solo_parent == 1 || $_applicant_solo_parent == 1 || $_ips == 1 || $_pwd == 1 || $_forps == 1 || $_senior_citizen == 1) {
    				$plus_points = 5;
    			}else { $plus_points = 0; }
    			
    			$total_rank_points = $rank_points + $plus_points;

    			return $total_rank_points;
    		}
    		if($parent_income >= 268001 && $parent_income <=334000) {
    			$income_points = 80;

    			$grade_computed = $grade_points * 0.70;
    			$income_computed = $income_points * 0.30;

    			$rank_points = $grade_computed + $income_computed;

    			if($_dependent_solo_parent == 1 || $_applicant_solo_parent == 1 || $_ips == 1 || $_pwd == 1 || $_forps == 1 || $_senior_citizen == 1) {
    				$plus_points = 5;
    			}else { $plus_points = 0; }
    			
    			$total_rank_points = $rank_points + $plus_points;

    			return $total_rank_points;
    		}
    		if($parent_income >= 334001 && $parent_income <=400000) {
    			$income_points = 75;

    			$grade_computed = $grade_points * 0.70;
    			$income_computed = $income_points * 0.30;

    			$rank_points = $grade_computed + $income_computed;

    			if($_dependent_solo_parent == 1 || $_applicant_solo_parent == 1 || $_ips == 1 || $_pwd == 1 || $_forps == 1 || $_senior_citizen == 1) {
    				$plus_points = 5;
    			}else { $plus_points = 0; }
    			
    			$total_rank_points = $rank_points + $plus_points;

    			return $total_rank_points;
    		}
    		if($parent_income >= 400001 && $parent_income <=900000) {
    			$income_points = 50;

    			$grade_computed = $grade_points * 0.70;
    			$income_computed = $income_points * 0.30;

    			$rank_points = $grade_computed + $income_computed;

    			if($_dependent_solo_parent == 1 || $_applicant_solo_parent == 1 || $_ips == 1 || $_pwd == 1 || $_forps == 1 || $_senior_citizen == 1) {
    				$plus_points = 5;
    			}else { $plus_points = 0; }
    			
    			$total_rank_points = $rank_points + $plus_points;

    			return $total_rank_points;
    		}				  
    	
    	}

    	if($gwa >= 0 && $gwa <= 74) {

    		$total_rank_points = 50;

    		return $total_rank_points;
    	}
    }
    //Update applicant
    public function update_applicant(Request $request, $id) {

    	$model = new applicantsModel();
        $model1 = new User();
    	$applicants = $model::where('user_id', $id)->first();
        $users = $model1::where('id', $id)->first();

    	$_dependent_solo_parent = $request->supported_by_solo_parent;
    	$_applicant_solo_parent = $request->applicant_solo_parent;
    	$_senior_citizen = $request->senior_citizen;
    	$_pwd = $request->pwd_id;
    	$_forps = $request->forps_id;
    	$_ips = $request->ips_id;

    	//General Weight Average of Student
    	$gwa = $request->gwa;
    	//Gross Income of the Family
    	$parent_income = $request->parent_income;
    	
    	$total_rank_points = $this->ranking_points_computation($_dependent_solo_parent, $_applicant_solo_parent, $_senior_citizen, $_pwd, $_forps, $_ips, $gwa, $parent_income, $id);

    	if($total_rank_points === 50) {

    		return response()->json(0);
    	}

        $users->email = $request->email;
        $users->save();

        $applicants->fname = strtoupper($request->fname);
        $applicants->mname = strtoupper($request->mname);
        $applicants->lname = strtoupper($request->lname);
        $applicants->xname = strtoupper($request->xname);
        $applicants->birthdate = $request->birthdate;
        $applicants->place_of_birth = $request->place_of_birth;
        $applicants->gender = $request->gender;
        $applicants->civil_status = $request->civil_status;
        $applicants->citizenship = $request->citizenship;
        $applicants->contact = $request->contact;
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
        $applicants->senior_citizen = $request->senior_citizen;
        $applicants->rank_points = $total_rank_points;
        $applicants->fb_url = $request->fb_url;
        $applicants->update_date = date("F d, Y h:i:s A", time());
        $applicants->validatedByCHED =  Auth::user()->name;
        $applicants->save();


        return response()->json(['status' => 'success'], 200);

    }
    //Admin change password
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
    //Fetch HEI Coordinator
    public function fetch_HEI_coordinator() {

    	$model = new User();

    	$all_HEI_coordinator = $model::where('role',3)
    								->orderBy('hei_hei_id', 'asc')->get();

    	return response()->json($all_HEI_coordinator);
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
}
