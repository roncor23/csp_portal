<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class brgyModel extends Model
{
    protected $fillable = [
        'name', 'created_by', 'updated_by','created_at','updated_at'
    ];

    protected $table = 'brgys';

    protected $primaryKey = 'brgy_id';

}
