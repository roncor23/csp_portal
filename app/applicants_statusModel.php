<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class applicants_statusModel extends Model
{
    protected $fillable = [
        'status_name',  'created_by', 'updated_by', 'created_at', 'updated_at'
    ];

    protected $table = 'applicant_status';

    protected $primaryKey  = 'applicant_status_id';
}
