<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class senior_citizensModel extends Model
{
    protected $fillable = [
        'senior', 'created_by', 'updated_by','created_at','updated_at'
    ];

    protected $table = 'senior_citizens';

    protected $primaryKey = 'senior_citizen_id';
}
