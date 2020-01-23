<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class provincesModel extends Model
{
    protected $fillable = [
        'prov_name', 'created_by', 'updated_by','created_at','updated_at'
    ];

    protected $table = 'provinces';

    protected $primaryKey = 'province_id';
}
