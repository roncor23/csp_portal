<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App;
use App\mun_citysModel;
use App\brgyModel;
use App\provincesModel;
use App\heisModel;
use App\coursesModel;
use App\applicantsModel;
use App\parentsModel;
use App\User;
use App\Mail\SendMailable;
use DB;
use Mail;

class applicantController extends Controller
{
    // Fetch applicant
    public function fetch_applicant() {

        $users = DB::table('users')
                    ->leftJoin('applicants', 'users.id', '=', 'applicants.user_id')
                    ->leftJoin('parents', 'users.id', '=', 'parents.user_id')
                    ->where('id', Auth::id())
                    ->get();

        return response()->json($users);
    }
    
    //Fetch number of applicants
    public function number_of_applicants() {

        $users = DB::table('users')
                    ->leftJoin('applicants', 'users.id', '=', 'applicants.user_id')
                    ->leftJoin('parents', 'users.id', '=', 'parents.user_id')
                    ->where('role',1)
                    ->where('confirm', 1)
                    ->count();

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
    //Update applicant
    public function update_applicant(Request $request, $id) {
       
      
        $model = new User();
        $model2 = new applicantsModel();

        $users = $model::where('id', $id)->first();
        $applicants = $model2::where('user_id', $id)->first();   

        //Check applicant if they have award or not
        if($applicants->status === 2) {

            return response()->json(0); // Applicant has award.
            
        }

        //Check current HEI and compare to request HEI
        if($applicants['hei'] != $request->hei_id) {

            $users->applicant_hei_id = $request->hei_id; 
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
            $applicants->fb_url = $request->fb_url;
            $applicants->verified_hei = 3;
            $applicants->validatedByHEI = "";
            $applicants->hei_remarks = "";
            $applicants->save();

            $model3 = new parentsModel();
            $parents = $model3::where('user_id', $id)->first();
            $parents->father_lname = $request->father_lname;
            $parents->father_fname = $request->father_fname;
            $parents->father_mname = $request->father_mname;
            $parents->father_xname = $request->father_xname;
            $parents->mother_lname = $request->mother_lname;
            $parents->mother_fname = $request->mother_fname;
            $parents->mother_mname = $request->mother_mname;
            $parents->mother_xname = $request->mother_xname;
            $parents->mother_occupation = $request->mother_occupation;
            $parents->father_occupation = $request->father_occupation;
            $parents->mother_employer = $request->mother_employer;
            $parents->father_employer = $request->father_employer;
            $parents->mother_contact_number = $request->mother_contact_number;
            $parents->father_contact_number = $request->father_contact_number;
            $parents->number_of_siblings = $request->number_of_siblings;
            $parents->save();


            return response()->json(['status' => 'success'], 200);
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
        $applicants->fb_url = $request->fb_url;
        $applicants->name_of_school_last_attended = $request->name_of_school_last_attended;
        $applicants->hei = $request->hei_id;
        $applicants->course = $request->course_id;
        $applicants->applicant_type = $request->applicant_type;
        $applicants->save();

        $model3 = new parentsModel();
        $parents = $model3::where('user_id', $id)->first();
        $parents->father_lname = $request->father_lname;
        $parents->father_fname = $request->father_fname;
        $parents->father_mname = $request->father_mname;
        $parents->father_xname = $request->father_xname;
        $parents->mother_lname = $request->mother_lname;
        $parents->mother_fname = $request->mother_fname;
        $parents->mother_mname = $request->mother_mname;
        $parents->mother_xname = $request->mother_xname;
        $parents->mother_occupation = $request->mother_occupation;
        $parents->father_occupation = $request->father_occupation;
        $parents->mother_employer = $request->mother_employer;
        $parents->father_employer = $request->father_employer;
        $parents->mother_contact_number = $request->mother_contact_number;
        $parents->father_contact_number = $request->father_contact_number;
        $parents->number_of_siblings = $request->number_of_siblings;
        $parents->save();


        return response()->json(['status' => 'success'], 200);

    }
     //Applicant change password
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

    //Applicant resend code
    public function resendcode() {

        //Confirmation Code
        $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
        $shuffle =  substr(str_shuffle($data),0,7);

        $model = new User();

        $user = $model::where('id', Auth::id())->first();
        $user->confirmation_code = $shuffle;
        $user->save();


        $username = $user['name'];
        $email = $user['email'];
        $code = $shuffle;

        $objDemo = new \stdClass();

        $objDemo->code =  $code;
        $objDemo->username = $username;

        Mail::to($email)->send(new SendMailable($objDemo));

        return response()->json($email);


    }

    //Applicant new email
    public function new_email(Request $request) {

        $model = new User();

        $email = $model::where('email', $request->n_email)->first();

        if($email) {
            return response()->json(2); // Email already in used.
        }

        $user = $model::where('id', Auth::id())->first();
        $user->email = $request->n_email;
        $user->save();

        return response()->json(1);
    }

    //Applicant verify code
    public function verify_code(Request $request) {

        $model = new User();

        $user = $model::where('id', Auth::id())->first();

        if($user->confirmation_code === $request->v_code) { // Check if verified or not
            $user->confirm = 1; // Verified
            $user->save();

            return response()->json(1); //True
        }


            return response()->json(0); //False
    }

    public function upload_documents(Request $request) {

        $income_requirements = "income_requirements";
        $grade_requirements = "grade_requirements";
        $birth_certificate = "birth_certificate";
        $grade_11 = "grade_11";
        $grade_12 = "grade_12";
        $high_school = "high_school";
        $als_grade = "als_grade";

        $sea_farers = "sea_farers";
        $case_study = "case_study";
        $certificate_indigence = "certificate_indigence";
        $certificate_tax_excemption = "certificate_tax_excemption";
        $certificate_itr = "certificate_itr";
        $scan_documents = "scan_documents";

        $file_grade11 = $request->file('file_grade11');
        $file_grade12 = $request->file('file_grade12');
        $file_als = $request->file('file_als');
        $file_highschool = $request->file('file_highschool');

        $file_seafarers = $request->file('file_seafarers');
        $file_case_study = $request->file('file_case_study');
        $file_certificate_of_indigence = $request->file('file_certificate_of_indigence');
        $file_certificate_of_tax_exemption = $request->file('file_certificate_of_tax_exemption');
        $file_itr = $request->file('file_itr');

        $file_birth_certificate = $request->file('file_birth_certificate');

        $ext = "pdf";

        if($request->hasFile('file_grade11')) {

            $file_grade11->storeAs('/public/' . $scan_documents . '/' . $this->getUserDir() . '/' . $grade_requirements . '/' . $grade_11 . '/', $this->getUserDir()  . '.' . $ext);
        }
        if($request->hasFile('file_grade12')) {

            $file_grade12->storeAs('/public/' . $scan_documents . '/' . $this->getUserDir() . '/' . $grade_requirements . '/' . $grade_12 . '/', $this->getUserDir()  . '.' . $ext); 
        }
        if($request->hasFile('file_highschool')) {

            $file_highschool->storeAs('/public/' . $scan_documents . '/' . $this->getUserDir() . '/' . $grade_requirements . '/' . $high_school . '/', $this->getUserDir()  . '.' . $ext);
        }
        if($request->hasFile('file_als')) {

            $file_als->storeAs('/public/' . $scan_documents . '/' . $this->getUserDir() . '/' . $grade_requirements . '/' . $als_grade . '/', $this->getUserDir()  . '.' . $ext);  
        }
        if($request->hasFile('file_birth_certificate')) {

            $file_birth_certificate->storeAs('/public/' . $scan_documents . '/' . $this->getUserDir() . '/' . $birth_certificate .  '/', $this->getUserDir()  . '.' . $ext);
        } 
        if($request->hasFile('file_seafarers')) {

            $file_seafarers->storeAs('/public/' . $scan_documents . '/' . $this->getUserDir() . '/' . $income_requirements . '/' . $sea_farers . '/', $this->getUserDir()  . '.' . $ext);  
        } 
        if($request->hasFile('file_case_study')) {

            $file_case_study->storeAs('/public/' . $scan_documents . '/' . $this->getUserDir() . '/' . $income_requirements . '/' . $case_study . '/', $this->getUserDir()  . '.' . $ext);
        }
        if($request->hasFile('file_certificate_of_indigence')) {

            $file_certificate_of_indigence->storeAs('/public/' . $scan_documents . '/' . $this->getUserDir() . '/' . $income_requirements . '/' . $certificate_indigence . '/', $this->getUserDir()  . '.' . $ext);
        }
        if($request->hasFile('file_certificate_of_tax_exemption')) {

            $file_certificate_of_tax_exemption->storeAs('/public/' . $scan_documents . '/' . $this->getUserDir() . '/' . $income_requirements . '/' . $certificate_tax_excemption . '/', $this->getUserDir()  . '.' . $ext); 
        }
        if($request->hasFile('file_itr')) {

            $file_itr->storeAs('/public/' . $scan_documents . '/' . $this->getUserDir() . '/' . $income_requirements . '/' . $certificate_itr . '/', $this->getUserDir()  . '.' . $ext); 
        }

        return response()->json(1); //True

    }
            /**
     * Get directory for the specific user
     * @return string Specific user directory
     */
    private function getUserDir()
    {
        return Auth::user()->name . '_' . Auth::id();
    }
}
