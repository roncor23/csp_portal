<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class schoolsectorsModel extends Model
{
    protected $fillable = [
        'school_sector', 'created_by', 'updated_by','created_at','updated_at'
    ];

    protected $table = 'school_sectors';

    protected $primaryKey = 'school_sector_id';
}
