<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Mail;



class LeaveModel extends Model
{
    // use HasFactory;

    public function TriggerMail($tomail,$status){
        Mail::send(['text'=>'mail'], $data, function($message) {
            $message->to($tomail, 'E Learings')->subject
               ('Your Leave approval is'.$status);
            $message->from('test@gmail.com','HR');
         });
         return true;
    }
}
