<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class regionsModel extends Model
{
    protected $fillable = [
        'region_name', 'created_by', 'updated_by','created_at','updated_at'
    ];

    protected $table = 'regions';

    protected $primaryKey = 'region_id';
}
