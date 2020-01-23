<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class parentsModel extends Model
{
    protected $fillable = [
        'father_fname', 'father_mname', 'father_lname', 'father_xname','mother_fname', 'mother_mname', 'mother_lname', 'mother_xname', 'mother_occupation', 'father_occupation', 'number_of_siblings', 'mother_employer', 'mother_contact_number', 'father_contact_number', 'father_employer', 'user_id', 'updated_by','created_at','updated_at'
    ];

    protected $table = 'parents';

    protected $primaryKey = 'parent_id';

    public function user(){
        return $this->belongsTo('App\User'); 
    }
}
