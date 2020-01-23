<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class coursesModel extends Model
{
    protected $fillable = [
        'course_code',  'course_name', 'course_abb', 'course_field', 'program_level_code', 'program_major', 'program_level', '6_digit_psced_code', 'psced_program_name', '2_digit_disc_code', 'discipline_cluster_name', 'created_by','updated_by','created_at','updated_at'
    ];

    protected $table = 'courses';

    protected $primaryKey = 'course_id';
}
