<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gendersModel extends Model
{
    protected $fillable = [
        'gender_name',  'gender_abb', 'created_by', 'updated_by','created_at','updated_at'
    ];

    protected $primaryKey = 'gender_id';
}
