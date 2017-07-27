<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\M3Result;
use App\ORM\News;
use App\ORM\NewsDetail;
use App\ORM\NewsCategory;

class NewsController extends Controller
{
    public function news() {
        $news=News::all();
        foreach ($news as $new){
            $new->category = NewsCategory::find($new->category_id)->name;
        }
        return view('admin.news')->with('news',$news);
    }
    public function addNews(){
        $categorys= NewsCategory::all();
        
        return view('admin.newsAdd')->with('categorys',$categorys);
    }
    public function editNews($news_id) {
        $news= News::find($news_id);
        $news->category = NewsCategory::find($news->category_id)->name;
        $news->detail= NewsDetail::where('news_id',$news->id)->first()->detail;
        
        $categorys= NewsCategory::all();
        
        return view('admin.newsEdit')->with('categorys',$categorys)
                ->with('news',$news);
    }
    public function newsDetail($news_id){
        $news= News::find($news_id);
        $news->category = NewsCategory::find($news->category_id)->name;
        
        $news_detail= NewsDetail::where('news_id',$news_id)->first();
        
        return view('admin.newsDetail')->with('news',$news)
                ->with('news_detail',$news_detail);
    }
    
    /*************************** 操作数据库 **************************/
    public function doAddNews(Request $request){
        $title = $request->input('title', '');
        $category_id = $request->input('category_id', '');
        $top = $request->input('top', '');
        $comment = $request->input('comment', '');
        $status = $request->input('status', '');
        $detail = $request->input('detail', '');

        $news = new News;
        $news->title = $title;
        $news->category_id = $category_id;
        if($top != null){
            $news->top = $top;
        }else{
            $news->top = null;
        }
        $news->comment = $comment;
        $news->status = 1; //待完善功能
        $news->save();
        
        $news_detail=new NewsDetail;
        $news_detail->news_id = $news->id;
        $news_detail->detail = $detail;
        $news_detail->save();

        $m3_result = new M3Result;
        $m3_result->status = 0;
        $m3_result->message = '添加成功';

        return $m3_result->toJson();
    }
    public function doEditNews(Request $request){
        $id = $request->input('id', '');
        $title = $request->input('title', '');
        $category_id = $request->input('category_id', '');
        $top = $request->input('top', '');
        $comment = $request->input('comment', '');
        $status = $request->input('status', '');
        $detail = $request->input('detail', '');

        $news = News::find($id);
        $news->title = $title;
        $news->category_id = $category_id;
        if($top != null){
            $news->top = $top;
        }else{
            $news->top = null;
        }
        $news->comment = $comment;
        $news->status = 1; //待完善功能
        $news->save();
        
        $news_detail=NewsDetail::where('news_id',$id)->first();
        $news_detail->news_id = $news->id;
        $news_detail->detail = $detail;
        $news_detail->save();

        $m3_result = new M3Result;
        $m3_result->status = 0;
        $m3_result->message = '添加成功';

        return $m3_result->toJson();
    }
    
    public function doDelNews(Request $request){
        $id = $request->input('id', '');
        $news=News::find($id);
        $news_detail= NewsDetail::where('news_id',$news->id)->first();
        
        $news->delete();
        $news_detail->delete();

        $m3_result = new M3Result;
        $m3_result->status = 0;
        $m3_result->message = '成功删除';

        return $m3_result->toJson();
    }
}
