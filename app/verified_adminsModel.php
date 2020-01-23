<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class verified_adminsModel extends Model
{
    protected $fillable = [
        'verified', 'created_by', 'updated_by','created_at','updated_at'
    ];

    protected $table = 'verified_admins';

    protected $primaryKey  = 'verified_admin_id';
}
