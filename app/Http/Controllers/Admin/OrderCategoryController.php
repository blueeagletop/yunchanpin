<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\M3Result;
use App\ORM\Order;
use App\ORM\OrderCategory;

class OrderCategoryController extends Controller
{
    public function orderCategory() {
        $categories= OrderCategory::all();
        foreach ($categories as $category) {
            if ($category->parent_id != null && $category != '') {
                $category->parent = OrderCategory::find($category->parent_id);
            }
        }
        return view('admin.orderCategory')->with('categories',$categories);
    }
    public function addOrderCategory() {
        $categories= OrderCategory::whereNull('parent_id')->get();
        return view('admin.orderCategoryAdd')->with('categories',$categories);
    }
    public function editOrderCategory($category_id) {
        $category= OrderCategory::find($category_id);
            if ($category->parent_id != null && $category != '') {
                $category->parent = OrderCategory::find($category->parent_id)->name;
            }
        $categories= OrderCategory::whereNull('parent_id')->get();
        return view('admin.orderCategoryEdit')->with('category',$category)
                ->with('categories',$categories);
    }
    
    /************ 操作数据库 ************/
    public function doAddOrderCategory(Request $request) {
        $name=$request->input('name','');
        $parent_id=$request->input('parent_id','');
        
        $category = new OrderCategory;
        $category->name=$name;
        
        if ($parent_id == null) {
            $category->parent_id = null;
        } else {
            $category->parent_id = $parent_id;
        }
        
        $category->save();
        
        $m3_result = new M3Result;
        $m3_result->status = 0;
        $m3_result->message = '添加成功';

        return $m3_result->toJson();
    }
    public function doEditOrderCategory(Request $request) {
        $id=$request->input('id','');
        $name=$request->input('name','');
        $parent_id=$request->input('parent_id','');
        
        $category = OrderCategory::find($id);
        $category->name=$name;
        
        if ($parent_id == null) {
            $category->parent_id = null;
        } else {
            $category->parent_id = $parent_id;
        }
        
        $category->save();
        
        $m3_result = new M3Result;
        $m3_result->status = 0;
        $m3_result->message = '添加成功';

        return $m3_result->toJson();
    }
    public function doDelOrderCategory(Request $request) {
        $id=$request->input('id','');
        
        $orderCategory= OrderCategory::find($id);
        $orderCategory->delete();
        
        $m3_result = new M3Result;
        $m3_result->status = 0;
        $m3_result->message = '添加成功';

        return $m3_result->toJson();
    }
}
