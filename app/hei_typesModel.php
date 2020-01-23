<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hei_typesModel extends Model
{
    protected $fillable = [
        'type_name',  'type_abb', 'created_by', 'updated_by','created_at','updated_at'
    ];

    protected $primaryKey = 'hei_type_id';
}
