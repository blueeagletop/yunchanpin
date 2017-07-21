<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;

use App\ORM\HomeNav;

class HomeNavController extends Controller
{
    public function index($value=''){
        $homeNav = HomeNav::all();
        return view('admin.homeNav')->with('homeNav',$homeNav);
    }
    public function viewAdd(){
        return view('admin.homeNavAdd');
    }
    
}
