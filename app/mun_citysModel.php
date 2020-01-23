<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mun_citysModel extends Model
{
    protected $fillable = [
        'mun_city_name', 'province_id', 'district_id', 'created_by', 'updated_by','created_at','updated_at'
    ];

    protected $table = 'mun_citys';

    protected $primaryKey = 'city_id';
}
