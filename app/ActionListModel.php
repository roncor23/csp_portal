<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActionListModel extends Model
{
    protected $fillable = [
        'in_out',  'csp_kto12', 'subject', 'concern', 'from', 'action_required', 'support_needed', 'responsible_person', 'status', 'remarks', 'addedBy','updatedBy','user_id'
    ];

}
