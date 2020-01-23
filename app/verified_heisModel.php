<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class verified_heisModel extends Model
{
    protected $fillable = [
        'verified', 'created_by', 'updated_by','created_at','updated_at'
    ];

    protected $table = 'verified_heis';

    protected $primaryKey  = 'verified_hei_id';
}
