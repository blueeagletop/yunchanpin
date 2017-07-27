@extends('admin.master')

@section('content')


<div class="pd-30">
<table class="table table-border table-bordered table-bg">
    <thead>
        <tr>
            <th scope="col" colspan="9">资讯详情</th>
        </tr>
        <tr class="text-c">
            <th width="50">名称</th>
            <th width="500">内容</th>
        </tr>
    </thead>
    <tbody>
<form class="form form-horizontal" action="" method="post">
    <div class="row cl">
        <tr class="text-c">
            <td><label class="form-label"><span class="c-red"></span>资讯标题：</label>
            </td>
        <td>
            <div class="formControls">
            {{$affiche->title}}
        </div>
        </td>
        <div class="col-4"> </div>
        </tr>
    </div>
    <div class="row cl">
        <tr class="text-c">
        <td><label class="form-label"><span class="c-red"></span>编辑员：</label></td>
        <td>
            <div class="formControls">
            {{$affiche->admin_id}}
            </div>
        </td>
        </tr>
    </div>
    <div class="row cl">
        <tr class="text-c">
        <td><label class="form-label"><span class="c-red"></span>资讯注释(仅后台显示)：</label></td>
        <td>
            <div class="formControls">
            {{$affiche->comment}}
            </div>
        </td>
        <div class="col-4"> </div>
    </tr>
    </div>

    <div class="row cl">
        <tr class="text-c">
        <td><label class="form-label">详细内容：</label></td>
        <td><div class="formControls">
            {!! $affiche_detail->detail !!}
        </div></td>
        </tr>
    </div>
    </tbody>
    
    </div>
    @endsection
