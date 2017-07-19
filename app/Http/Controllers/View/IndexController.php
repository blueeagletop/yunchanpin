<?php

namespace App\Http\Controllers\View;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\ORM\HomeNav;
use App\ORM\HomeContent;

class IndexController extends Controller
{
    public function index($value=''){
        $homeNav = HomeNav::all();
        $homeContent = HomeContent::all()->first();
        return view('index')->with('homeNav',$homeNav)
                ->with('homeContent',$homeContent);
    }
}
