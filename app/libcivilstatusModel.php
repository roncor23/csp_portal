<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class libcivilstatusModel extends Model
{
    protected $fillable = [
        'civilstatus_name', 'created_by', 'updated_by','created_at','updated_at'
    ];

    protected $table = 'libcivilstatus';

    protected $primaryKey = 'civil_status_id';
}
