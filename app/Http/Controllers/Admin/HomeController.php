<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function homeNav(){
        return view('admin.homeNav');
    }
    public function homeContent(){
        return '首页内容';
    }
}
