<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class applicantsModel extends Model
{
    protected $fillable = [
        'fname', 'mname', 'lname', 'xname', 'contact', 'email', 'birthdate', 'civil_status', 'brgy', 'town_city', 'cong_dist','course','yr_lvl','rank_points','status','gender','parent_income','applicant_type','supported_by_solo_parent','hei','hei_remarks','admin_remarks','billing_remarks','ranking_remarks','ranking_status','citizenship','province','ay','ips','pwd','seniorcitizen','verified_hei','verified_admin','reference_no','created_at','updated_at', 'gwa', 'user_id','validatedByHEI','validatedByCHED'
    ];

    protected $table = 'applicants';

    protected $primaryKey = 'applicant_id';
   
 	public function user()
 	{
        return $this->belongsTo('App\User'); 
    }
}
