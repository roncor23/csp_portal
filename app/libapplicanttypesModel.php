<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class libapplicanttypesModel extends Model
{
    protected $fillable = [
        'type_name', 'created_by', 'updated_by','created_at','updated_at'
    ];

    protected $table = 'libapplicanttypes';

    protected $primaryKey = 'applicant_type_id';
}
