<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class libcitizenshipsModel extends Model
{
    protected $fillable = [
        'citizenship_name', 'created_by', 'updated_by','created_at','updated_at'
    ];

    protected $table = 'libcitizenships';

    protected $primaryKey = 'citizenship_id';
}
