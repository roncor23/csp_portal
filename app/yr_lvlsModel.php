<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class yr_lvlsModel extends Model
{
    protected $fillable = [
        'yr_name', 'created_by', 'updated_by','created_at','updated_at'
    ];

    protected $table = 'yr_lvls';

    protected $primaryKey  = 'yr_lvl_id';
}
