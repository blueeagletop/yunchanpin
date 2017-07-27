<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\ORM\HomeContent;

use App\Models\M3Result;

class HomeContentController extends Controller
{
    public function homeContent(){
        $content= HomeContent::all()->first();
        return view('admin.homeContent')->with('content',$content);
    }
    public function editHomeContent($content_id) {
        $content= HomeContent::find($content_id);
        return view('admin.homeContentEdit')->with('content',$content);
    }
    
    /******************* 数据库操作 *******************/
    public function doEditHomeContent(Request $request) {
        $id = $request->input('id', '');
        $content = HomeContent::find($id);

        $summary_title = $request->input('summary_title', '');
        $summary_content = $request->input('summary_content', '');
        $welcome_title = $request->input('welcome_title', '');
        $welcome_content = $request->input('welcome_content', '');
        $welcome_button = $request->input('welcome_button', '');
        $service_title = $request->input('service_title', '');
        $news_title = $request->input('news_title', '');
        $shop_title = $request->input('shop_title', '');
        $shop_title2 = $request->input('shop_title2', '');
        $shop_content = $request->input('shop_content', '');
        $shop_button = $request->input('shop_button', '');
        $shop_url = $request->input('shop_url', '');

        $content->summary_title = $summary_title;
        $content->summary_content = $summary_content;
        $content->welcome_title = $welcome_title;
        $content->welcome_content = $welcome_content;
        $content->welcome_button = $welcome_button;
        $content->service_title = $service_title;
        $content->news_title = $news_title;
        $content->shop_title = $shop_title;
        $content->shop_title2 = $shop_title2;
        $content->shop_content = $shop_content;
        $content->shop_button = $shop_button;
        $content->shop_url = $shop_url;
        $content->save();

        $m3_result = new M3Result;
        $m3_result->status = 0;
        $m3_result->message = '修改成功';

        return $m3_result->toJson();
    }
}
