<?php

namespace App\Http\Controllers;
use DB;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   $userinfo = array('id'=>auth()->user()->id,'name'=>auth()->user()->name);
        return view('home')->with('userinfo',$userinfo);
    }
    public function adminAccess(Request $request)
    {
    //    $userinfo = array('id'=>auth()->user()->id,'name'=>auth()->user()->name);
        $leaveinfo = DB::select("select a.id,a.name,a.email,b.id as rowid,b.reason,b.from_date,b.to_date,b.approvel_status from users a INNER JOIN leaveapply b ON a.id=b.user_id WHERE b.approvel_status='Draft'");
        return view('adminLayout')->with('leaveinfo',$leaveinfo);
    }
}
