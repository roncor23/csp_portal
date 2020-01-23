<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class 4psModel extends Model
{
    protected $fillable = [
        '4ps', 'created_by', 'updated_by','created_at','updated_at'
    ];
    
    protected $table = '4ps';

    protected $primaryKey  = '4ps_id';
}
