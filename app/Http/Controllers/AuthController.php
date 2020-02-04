<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\applicantsModel;
use App\parentsModel;
use Carbon\Carbon;
use Mail;

class AuthController extends Controller
{

    public function register(Request $request)
    {
        $applicants = new applicantsModel;

        //Check if applicant is already in the system.
        $result = $applicants::where('lname', strtoupper($request->lastname))
                            ->where('fname', strtoupper($request->firstname))
                            ->where('mname', strtoupper($request->middlename))
                            ->first();

        if($result) {
            return response()->json(0); // Already in the system.
        }

        $user = new User;
       
        $user->name = $request->username;
        $user->email = $request->email;
        $user->applicant_hei_id = $request->schoolpreferred;
        $user->password = bcrypt($request->password);
        $user->save();

        $dt = Carbon::now();

        $applicants->fname = strtoupper($request->firstname);
        $applicants->mname = strtoupper($request->middlename);
        $applicants->lname = strtoupper($request->lastname);
        $applicants->xname = strtoupper($request->extensionname);
        $applicants->birthdate = $request->dateofbirth;
        $applicants->place_of_birth = $request->placeofbirth;
        $applicants->gender = $request->sex;
        $applicants->civil_status = $request->civilstatus;
        $applicants->citizenship = $request->citizenship;
        $applicants->contact = $request->mobilenumber;
        $applicants->email = $request->emailaddress;
        $applicants->present_address = $request->presentaddress;
        $applicants->town_city = $request->city;
        $applicants->brgy = $request->barangay;
        $applicants->province = $request->province;
        $applicants->zipcode = $request->zipcode;
        $applicants->name_of_school_last_attended = $request->schoollastattended;
        $applicants->hei = $request->schoolpreferred;
        $applicants->course = $request->degreeprogram;
        $applicants->applicant_type = $request->applicanttype;
        $applicants->user_id = $user->id;
        $applicants->reference_no =  $dt->toDateString().$user->id;  
        $applicants->save();

        $parents = new parentsModel;
        $parents->father_lname = $request->fatherlastname;
        $parents->father_fname = $request->fatherfirstname;
        $parents->father_mname = $request->fathermiddlename;
        $parents->father_xname = $request->fatherextensionname;
        $parents->mother_lname = $request->motherlastname;
        $parents->mother_fname = $request->motherfirstname;
        $parents->mother_mname = $request->mothermiddlename;
        $parents->mother_xname = $request->motherextensionname;
        $parents->mother_occupation = $request->motheroccupation;
        $parents->father_occupation = $request->fatheroccupation;
        $parents->mother_employer = $request->motheremployer;
        $parents->father_employer = $request->fatheremployer;
        $parents->number_of_siblings = $request->sibblings;
        $parents->mother_contact_number = $request->mothercontact;
        $parents->father_contact_number = $request->fathercontact;
        $parents->user_id = $user->id;
        $parents->save();


        return response()->json($applicants->reference_no);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if ($token = $this->guard()->attempt($credentials)) {
            return response()->json(['status' => 'success'], 200)->header('Authorization', $token);
        }

        return response()->json(['error' => 'login_error'], 401);

        // Mail::send('welcome', array('key' => 'value'), function($message)
        // {
        //     $message->to('ronanotaza@gmail.com', 'Sender Name')->subject('Welcome!');
        // });

        // return response()->json(1);

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

            //return not
            return response()->json($shuffle);
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

