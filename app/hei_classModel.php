<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hei_classModel extends Model
{
    protected $fillable = [
        'class_name',  'class_abb', 'created_by', 'updated_by','created_at','updated_at'
    ];

    protected $primaryKey = 'hei_class_id';
}
