<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\ORM\HomeNav;
use App\ORM\HomeContent;

use App\Models\M3Result;

class HomeController extends Controller
{
    public function homeContent(){
        return '首页内容';
    }
    
    /*************  后台功能  ***********/
    public function addHomeNav(Request $request) {
        $title = $request->input('title', '');
        $compositor = $request->input('compositor', '');
        $url = $request->input('url', '');

        $nav = new HomeNav;
        $nav->title = $title;
        $nav->compositor = $compositor;
        $nav->url = $url;
        $nav->save();

        $m3_result = new M3Result;
        $m3_result->status = 0;
        $m3_result->message = '添加成功';

        return $m3_result->toJson();
    }
}
