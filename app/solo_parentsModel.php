<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class solo_parentsModel extends Model
{
    protected $fillable = [
        'solo', 'created_by', 'updated_by','created_at','updated_at'
    ];

    protected $table = 'solo_parents';

    protected $primaryKey = 'solo_parent_id';
}
