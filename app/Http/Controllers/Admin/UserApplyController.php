<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\M3Result;
use App\ORM\UserApply;
use App\ORM\User;

class UserApplyController extends Controller
{
    public function untreatedApply(){
        $applies= UserApply::where('status',0)->get();
        
        foreach ($applies as $apply){
                $apply->username= User::find($apply->user_id)->username;
        }
        
        return view('admin.userApply')->with('applies',$applies);
    }
    public function finishApply(){
        $applies= UserApply::where('status',2)->get();
        
        foreach ($applies as $apply){
                $apply->username= User::find($apply->user_id)->username;
        }
        
        return view('admin.userApply')->with('applies',$applies);
    }
    public function cutOutApply(){
        $applies= UserApply::where('status',3)->get();
        
        foreach ($applies as $apply){
                $apply->username= User::find($apply->user_id)->username;
        }
        
        return view('admin.userApply')->with('applies',$applies);
    }
}
