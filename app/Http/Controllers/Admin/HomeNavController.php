<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ORM\HomeNav;
use App\Models\M3Result;

class HomeNavController extends Controller {

    public function index($value = '') {
        $homeNav = HomeNav::all();
        return view('admin.homeNav')->with('homeNav', $homeNav);
    }

    public function viewAdd() {
        return view('admin.homeNavAdd');
    }

    public function viewEdit($nav_id) {
        $nav = HomeNav::find($nav_id);
        return view('admin.homeNavEdit')->with('nav', $nav);
    }

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

    public function editHomeNav(Request $request) {
        $id = $request->input('id', '');
        $nav = HomeNav::find($id);

        $title = $request->input('title', '');
        $compositor = $request->input('compositor', '');
        $url = $request->input('url', '');

        $nav->title = $title;
        $nav->compositor = $compositor;
        $nav->url = $url;
        $nav->save();

        $m3_result = new M3Result;
        $m3_result->status = 0;
        $m3_result->message = '修改成功';

        return $m3_result->toJson();
    }
    
    public function delHomeNav(Request $request) {
        $id = $request->input('id', '');
        HomeNav::find($id)->delete();

        $m3_result = new M3Result;
        $m3_result->status = 0;
        $m3_result->message = '成功删除';

        return $m3_result->toJson();
    }
}
