<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class districtsModel extends Model
{
    protected $fillable = [
        'district_name',  'district_no', 'dist_order', 'created_by', 'updated_by','created_at','updated_at'
    ];

    protected $primaryKey = 'district_id';
}
