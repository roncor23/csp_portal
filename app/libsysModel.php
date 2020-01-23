<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class libsysModel extends Model
{
    protected $fillable = [
        'sy_name', 'created_by', 'updated_by','created_at','updated_at'
    ];

    protected $table = 'libsys';

    protected $primaryKey = 'libsy_id';
}
