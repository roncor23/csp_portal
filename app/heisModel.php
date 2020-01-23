<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class heisModel extends Model
{
    protected $fillable = [
        'hei_code',  'hei_name', 'hei_abb', 'brgy_street','town_city','province','zipcode','tel_no','fax_no','email','website','est_year','head_name','head_tel','head_gender','head_desig','former_name','bank_acct_name','bank_acct_no','hei_type','hei_class','region_id','district_id','created_by', 'updated_by','created_at','updated_at'
    ];

    protected $table = 'heis';

    protected $primaryKey = 'hei_id';
}
