<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\M3Result;
use App\ORM\UserAdvise;
use App\ORM\User;

class UserAdviseController extends Controller
{
    public function untreatedAdvise(){
        $advises= UserAdvise::where('status',0)->get();
        
        foreach ($advises as $advise){
                $advise->username= User::find($advise->user_id)->username;
        }
        
        return view('admin.userAdvise')->with('advises',$advises);
    }
    public function finishAdvise(){
        $advises= UserAdvise::where('status',2)->get();
        
        foreach ($advises as $advise){
                $advise->username= User::find($advise->user_id)->username;
        }
        
        return view('admin.userAdvise')->with('advises',$advises);
    }
    public function cutOutAdvise(){
        $advises= UserAdvise::where('status',3)->get();
        
        foreach ($advises as $advise){
                $advise->username= User::find($advise->user_id)->username;
        }
        
        return view('admin.userAdvise')->with('advises',$advises);
    }
}
