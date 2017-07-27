<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\M3Result;
use App\ORM\Order;
use App\ORM\OrderCategory;
use App\ORM\User;

class OrderController extends Controller
{
    public function order() {
        $orders= Order::all();
        foreach ($orders as $order){
            $order->category= OrderCategory::find($order->category_id)->name;
            if(User::find($order->user_id)){
                $order->username= User::find($order->user_id)->username;
            }else if($order->user_id == null){
                $order->username = '未关联用户';
            }else{
                $order->username = '订单的用户不存在';
            }
        }
        return view('admin.order')->with('orders',$orders);
    }
    public function addOrder() {
        $categories= OrderCategory::all();
        return view('admin.orderAdd')->with('categories',$categories);
    }
    public function editOrder($order_id) {
        $categories= OrderCategory::all();
        $order = Order::find($order_id);
        $order->category= OrderCategory::find($order->category_id)->name;
            if(User::find($order->user_id)){
                $order->username= User::find($order->user_id)->username;
            }else if($order->user_id == null){
                $order->username = '';//未关联用户
            }else{
                $order->username = '0';//订单的用户不存在
            }
        return view('admin.orderEdit')->with('categories',$categories)
                ->with('order',$order);
    }
    
    /********* 操作数据库 *********/
    public function doAddOrder(Request $request) {
        $title=$request->input('title','');
        $username=$request->input('username','');
        $category_id=$request->input('category_id','');
        $order_number=$request->input('order_number','');
        $status=$request->input('status','');
        $start_time=$request->input('start_time','');
        $end_time=$request->input('end_time','');
        $code=$request->input('code','');
        
        $order=new Order;
        $order->title=$title;
        
        if($username != null){
            $order->user_id = User::where('username',$username)->first()->id;
        }else{
            $order->user_id = null;
        }
        $order->category_id=$category_id;
        
        $order->order_number=$order_number;
        $order->status=$status;
        $order->start_time=$start_time;
        $order->end_time=$end_time;
        $order->code=$code;
        $order->save();
        
        $m3_result = new M3Result;
        $m3_result->status = 0;
        $m3_result->message = '添加成功';

        return $m3_result->toJson();
    }
    public function doEditOrder(Request $request) {
        $id=$request->input('id','');
        $title=$request->input('title','');
        $username=$request->input('username','');
        $category_id=$request->input('category_id','');
        $order_number=$request->input('order_number','');
        $status=$request->input('status','');
        $start_time=$request->input('start_time','');
        $end_time=$request->input('end_time','');
        $code=$request->input('code','');
        
        $order=Order::find($id);
        $order->title=$title;
        
        if($username != null){
            $order->user_id = User::where('username',$username)->first()->id;
        }else{
            $order->user_id = null;
        }
        $order->category_id=$category_id;
        
        $order->order_number=$order_number;
        $order->status=$status;
        $order->start_time=$start_time;
        $order->end_time=$end_time;
        $order->code=$code;
        $order->save();
        
        $m3_result = new M3Result;
        $m3_result->status = 0;
        $m3_result->message = '添加成功';

        return $m3_result->toJson();
    }
    public function doDelOrder(Request $request) {
        $id=$request->input('id','');
        
        $order= Order::find($id);
        $order->delete();
        
        $m3_result = new M3Result;
        $m3_result->status = 0;
        $m3_result->message = '成功删除';

        return $m3_result->toJson();
    }
}
