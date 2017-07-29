<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index(){
        return view('user.index');
    }
    public function welcome(){
        return view('user.welcome');
    }
}
