<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\M3Result;
use App\ORM\WebTemplet;

class WebTempletController extends Controller
{
    public function webTemplet() {
        $webTemplets= WebTemplet::all();
        return view('admin.webTemplet')->with('webTemplets',$webTemplets);
    }
    public function addWebTemplet() {
        return view('admin.webTempletAdd');
    }
    public function editWebTemplet($webTemplet_id) {
        $webTemplet= WebTemplet::find($webTemplet_id);
        return view('admin.webTempletEdit')->with('webTemplet',$webTemplet);
    }
    
    /*************** 操作数据库 ****************/
    public function doAddWebTemplet(Request $request) {
        $name = $request->input('name', '');
        $img = $request->input('img', '');
        $number = $request->input('number', '');
        $price = $request->input('price', '');
        $worth = $request->input('worth', '');
        $url = $request->input('url', '');
        $summary = $request->input('summary', '');
        
        $webTemplet = new WebTemplet;
        $webTemplet->name = $name;
        $webTemplet->img = $img;
        $webTemplet->number = $number;
        $webTemplet->price = $price;
        $webTemplet->worth = $worth;
        $webTemplet->url = $url;
        $webTemplet->summary = $summary;
        $webTemplet->save();
        
        $m3_result = new M3Result;
        $m3_result->status = 0;
        $m3_result->message = '添加成功';

        return $m3_result->toJson();
    }
    public function doEditWebTemplet(Request $request) {
        $id=$request->input('id', '');
        $name = $request->input('name', '');
        $img = $request->input('img', '');
        $number = $request->input('number', '');
        $price = $request->input('price', '');
        $worth = $request->input('worth', '');
        $url = $request->input('url', '');
        $summary = $request->input('summary', '');
        
        $webTemplet = WebTemplet::find($id);
        $webTemplet->name = $name;
        $webTemplet->img = $img;
        $webTemplet->number = $number;
        $webTemplet->price = $price;
        $webTemplet->worth = $worth;
        $webTemplet->url = $url;
        $webTemplet->summary = $summary;
        $webTemplet->save();
        
        $m3_result = new M3Result;
        $m3_result->status = 0;
        $m3_result->message = '添加成功';

        return $m3_result->toJson();
    }
    
    public function doDelWebTemplet(Request $request) {
        $id=$request->input('id', '');
        
        $webTemplet= WebTemplet::find($id);
        
        $webTemplet->delete();
        
        $m3_result = new M3Result;
        $m3_result->status = 0;
        $m3_result->message = '成功删除';

        return $m3_result->toJson();
    }
}
