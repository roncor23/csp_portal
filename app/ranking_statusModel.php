<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ranking_statusModel extends Model
{
    protected $fillable = [
        'ranking', 'created_by', 'updated_by','created_at','updated_at'
    ];

    protected $table = 'ranking_status';

    protected $primaryKey = 'ranking_status_id';
}
