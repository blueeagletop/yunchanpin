<?php

namespace App\Http\Controllers\Service;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\M3Result;

class UserController extends Controller
{
    public function register(Request $request){
        $email = $request->input('email','');
        $password=$request->input('password','');
        $confirm=$request->input('confirm','');
        $validate_code=$request->input('validate_code','');
        
        
    }
}
