<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\LeaveModel;

class LeaveController extends Controller
{
    public function applyleave(Request $resquest){
        $fromdata = $resquest->all();
        // dd($fromdata);
        $user_id = $resquest->userid;
        $reason = $resquest->reason;
        $fromdate = $resquest->fromdate;
        $todate = $resquest->todate;
        DB::insert('insert into leaveapply (user_id,reason,from_date,to_date) values(?,?,?,?)',[$user_id,$reason,$fromdate,$todate]);
        return back()->with('success','successfully Applied Leave!');
    }

    public function StoreStatus(Request $req){
        $userid = $req->user_id;
        $status = $req->status;
        $rowid = $req->row_id;
        $to_email = $req->toemail;
        // dd( $updateDataSet);
        DB::update('update leaveapply set approvel_status = ? where id = ? and user_id = ? ',[$status,$rowid,$userid]);
        $LeaveModel = new LeaveModel();
        $mailresponse = $LeaveModel->TriggerMail($to_email,$status);
        return back()->with('success','successfully '.$status.' Leave!');
    }
}