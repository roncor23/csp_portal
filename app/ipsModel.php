<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ipsModel extends Model
{
    protected $fillable = [
        'ips', 'created_by', 'updated_by','created_at','updated_at'
    ];

    protected $table = 'ips';

    protected $primaryKey = 'ips_id';
}
