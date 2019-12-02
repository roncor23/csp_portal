<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App;
use App\ActionListModel;

class AdminController extends Controller
{
    public function save_actionList(Request $request) {

    	$model = new ActionListModel();

	        $model::create([
                'in_out' => $request['in_out'],
                'csp_kto12' => $request['csp_kto12'],
                'subject' => $request['subject'],
                'concern' => $request['concern'],
                'from' => $request['from'],
                'action_required' => $request['action_required'],
                'support_needed' => $request['support_needed'],
                'responsible_person' => $request['responsible_person'],
                'status' => $request['status'],
                'remarks' => $request['remarks'],
                'addedBy' => Auth::user()->name,
                'updatedBy' => "",
                'user_id' => Auth::id()
            ]);

        $msg = "Action list saved sucessfully!";

        return response()->json($msg);

    }

    public function fetch_actionList() {

    	$action_list = ActionListModel::all();


        return response()->json(['response' => 'success', 'action_list' => $action_list]);

    }

    public function update_actionList(Request $request, $id) {

    	$action_list_byData = ActionListModel::find($id);

    	$action_list_byData->in_out = $request['in_out'];
        $action_list_byData->csp_kto12 = $request['csp_kto12'];
        $action_list_byData->subject = $request['subject'];
        $action_list_byData->concern = $request['concern'];
        $action_list_byData->from = $request['from'];
        $action_list_byData->action_required = $request['action_required'];
        $action_list_byData->support_needed = $request['support_needed'];
        $action_list_byData->responsible_person = $request['responsible_person'];
        $action_list_byData->status = $request['status'];
        $action_list_byData->remarks = $request['remarks'];
        $action_list_byData->updatedBy = Auth::user()->name;
        $action_list_byData->save();

    	
    }

    public function remove_actionList($id) {

    	$action_list_byData = ActionListModel::find($id);


        $action_list_byData->delete();

    	
    }
}


   
