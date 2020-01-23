<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pwdModel extends Model
{
    protected $fillable = [
        'pwd', 'created_by', 'updated_by','created_at','updated_at'
    ];

    protected $table = 'pwds';

    protected $primaryKey = 'pwd_id';
}
