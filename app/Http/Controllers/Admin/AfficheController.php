<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\M3Result;
use App\ORM\Affiche;
use App\ORM\AfficheDetail;

class AfficheController extends Controller
{
    public function affiche() {
        $affiches= Affiche::all();
        return view('admin.affiche')->with('affiches',$affiches);
    }
    public function addAffiche() {
        return view('admin.afficheAdd');
    }
    public function editAffiche($affiche_id) {
        $affiche= Affiche::find($affiche_id);
        $affiche_detail= AfficheDetail::where('affiche_id',$affiche_id)->first();
        return view('admin.afficheEdit')->with('affiche',$affiche)
                ->with('affiche_detail',$affiche_detail);
    }
    public function afficheDetail($affiche_id){
        $affiche= Affiche::find($affiche_id);
        
        $affiche_detail= AfficheDetail::where('Affiche_id',$affiche_id)->first();
        
        return view('admin.AfficheDetail')->with('affiche',$affiche)
                ->with('affiche_detail',$affiche_detail);
    }


    /********************* 操作数据库 *********************/
    public function doAddAffiche(Request $request) {
        $title = $request->input('title', '');
        $top = $request->input('top', '');
        $comment = $request->input('comment', '');
        $detail = $request->input('detail', '');
        
        $affiche = new Affiche;
        $affiche->title = $title;
        if($top != null){
            $affiche->top = $top;
        }else{
            $affiche->top = null;
        }
        $affiche->comment = $comment;
        $affiche->save();
        
        $affiche_detail=new AfficheDetail;
        $affiche_detail->affiche_id = $affiche->id;
        $affiche_detail->detail = $detail;
        $affiche_detail->save();

        $m3_result = new M3Result;
        $m3_result->status = 0;
        $m3_result->message = '添加成功';

        return $m3_result->toJson();
    }
    
    public function doEditAffiche(Request $request) {
        $id=$request->input('id', '');
        $title = $request->input('title', '');
        $top = $request->input('top', '');
        $comment = $request->input('comment', '');
        $detail = $request->input('detail', '');
        
        $affiche = Affiche::finde($id);
        $affiche->title = $title;
        if($top != null){
            $affiche->top = $top;
        }else{
            $affiche->top = null;
        }
        $affiche->comment = $comment;
        $affiche->save();
        
        $affiche_detail=AfficheDetail::where('affiche_id',$id)->first();
        $affiche_detail->affiche_id = $affiche->id;
        $affiche_detail->detail = $detail;
        $affiche_detail->save();

        $m3_result = new M3Result;
        $m3_result->status = 0;
        $m3_result->message = '添加成功';

        return $m3_result->toJson();
    }
    
    public function doDelAffiche(Request $request){
        $id= $request->input('id','');
        $affiche=Affiche::find($id);
        $affiche_detail= AfficheDetail::where('affiche_id',$affiche->id)->first();
        
        $affiche->delete();
        $affiche_detail->delete();

        $m3_result = new M3Result;
        $m3_result->status = 0;
        $m3_result->message = '成功删除';

        return $m3_result->toJson();
        
    }
}
