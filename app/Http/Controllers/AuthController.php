<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\applicantsModel;
use App\parentsModel;
use Carbon\Carbon;
use App\Mail\SendMailable;
use App\Mail\PasswordMailable;
use Mail;

class AuthController extends Controller
{

    public function register(Request $request)
    {
        $applicants = new applicantsModel;
        $user = new User;

        //Check if applicant is already in the system.
        $result = $applicants::where('lname', strtoupper($request->lastName))
                            ->where('fname', strtoupper($request->firstName))
                            ->where('mname', strtoupper($request->middleName))
                            ->first();

        $email = $user::where('email', $request->emailAddress)->first();

        if($result) {
            return response()->json(0); // Already in the system.
        }

        if($email) {
            return response()->json(2); // Email already in used.
        }

        //Confirmation Code
        $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
        $shuffle =  substr(str_shuffle($data),0,7);
  
       
        $user->name = $request->userName;
        $user->email = $request->emailAddress;
        $user->applicant_hei_id = $request->schoolPreferred;
        $user->confirmation_code = $shuffle;
        $user->password = bcrypt($request->password);
        $user->save();
        //Date
        $dt = Carbon::now();


        $applicants->fname = strtoupper($request->firstName);
        $applicants->mname = strtoupper($request->middleName);
        $applicants->lname = strtoupper($request->lastName);
        $applicants->xname = strtoupper($request->extensionName);
        $applicants->birthdate = $request->dateOfBirth;
        $applicants->place_of_birth = $request->placeOfBirth;
        $applicants->gender = $request->sex;
        $applicants->civil_status = $request->civilStatus;
        $applicants->citizenship = $request->citizenship;
        $applicants->contact = $request->mobileNumber;
        $applicants->present_address = $request->presentAddress;
        $applicants->town_city = $request->city;
        $applicants->brgy = $request->barangay;
        $applicants->province = $request->province;
        $applicants->zipcode = $request->zipcode;
        $applicants->name_of_school_last_attended = $request->schoolLastAttended;
        $applicants->hei = $request->schoolPreferred;
        $applicants->course = $request->degreeProgram;
        $applicants->applicant_type = $request->applicant_type;
        $applicants->ips = $request->ips;
        $applicants->pwd = $request->pwd;
        $applicants->forps = $request->for_4ps;
        $applicants->senior_citizen = $request->senior_citizen;
        $applicants->applicant_solo_parent = $request->a_solo_parent;
        $applicants->supported_by_solo_parent = $request->solo_parent;
        $applicants->user_id = $user->id;
        $applicants->app_created_at = date("F d, Y h:i:s A", time());
        $applicants->reference_no =  $dt->toDateString().$user->id;  
        $applicants->save();

        $parents = new parentsModel;
        $parents->father_lname = $request->fatherLastName;
        $parents->father_fname = $request->fatherFirstName;
        $parents->father_mname = $request->fatherMiddleName;
        $parents->father_xname = $request->fatherExtensionName;
        $parents->mother_lname = $request->motherLastName;
        $parents->mother_fname = $request->motherFirstName;
        $parents->mother_mname = $request->motherMiddleName;
        $parents->mother_xname = $request->motherExtensionName;
        $parents->mother_occupation = $request->motherOccupation;
        $parents->father_occupation = $request->fatherOccupation;
        $parents->mother_employer = $request->motherEmployer;
        $parents->father_employer = $request->fatherEmployer;
        $parents->number_of_siblings = $request->sibblings;
        $parents->mother_contact_number = $request->motherContact;
        $parents->father_contact_number = $request->fatherContact;
        $parents->user_id = $user->id;
        $parents->save();


        $username = $request->userName;
        $email = $request->emailAddress;
        $code = $shuffle;

        $objDemo = new \stdClass();

        $objDemo->code =  $code;
        $objDemo->username = $username;

        Mail::to($email)->send(new SendMailable($objDemo));

        return response()->json(['success'=>true, 'reference_no'=>$applicants->reference_no, 'username'=>$username, 'email'=>$email, 'code'=>$code]);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if ($token = $this->guard()->attempt($credentials)) {

            return response()->json(['status' => 'success'], 200)->header('Authorization', $token);

        }

        return response()->json(['error' => 'login_error'], 401);


    }

        public function reset(Request $request)
    {
        $model = new applicantsModel();
        //Check if birthdate and phone number are correct.
        $result = $model::where('birthdate', $request->birthdate)
                            ->where('contact', $request->phone_number)
                            ->first();
        //return correct                    
        if($result) {

            $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
            $shuffle =  substr(str_shuffle($data),0,7);

            $user_id = $result['user_id'];
            $model2 = new User();

            $user = $model2::where('id', $user_id)->first(); 
            $user->password = bcrypt($shuffle);
            $user->save();

            //Sent new pass word to email
            $username = $user->name;
            $email = $user->email;
            $new_password = $shuffle;

            $objDemo = new \stdClass();

            $objDemo->new_password =  $new_password;
            $objDemo->username = $username;

            Mail::to($email)->send(new PasswordMailable($objDemo));

            return response()->json(['username'=>$username, 'email'=>$email, 'new_password'=>$new_password]); // True
        }                    



            return response()->json(0);
    }

    public function logout()
    {
        $this->guard()->logout();

        return response()->json([
            'status' => 'success',
            'msg' => 'Logged out Successfully.'
        ], 200);
    }

    public function user(Request $request)
    {
        $user = User::find(Auth::user()->id);

        return response()->json([
            'status' => 'success',
            'data' => $user
        ]);
    }

    public function refresh()
    {
        if ($token = $this->guard()->refresh()) {
            return response()
                ->json(['status' => 'successs'], 200)
                ->header('Authorization', $token);
        }

        return response()->json(['error' => 'refresh_token_error'], 401);
    }

    private function guard()
    {
        return Auth::guard();
    }
}

