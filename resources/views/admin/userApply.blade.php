@extends('admin.master')

@section('title','云产品——咨询管理')

@section('content')
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 管理员后台 <span class="c-gray en">&gt;</span> 首页管理 <span class="c-gray en">&gt;</span> 头部导航栏 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i>刷新</a></nav>
<div class="pd-30">
    <div class="cl pd-5 bg-1 bk-gray"> <span class="l">
            <a href="javascript:;" onclick="addApply('添加售后申请', 'addApply', '800', '500')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加售后申请</a> </span> 
            <span class="r">共有数据：<strong>{{count($applies)}}</strong> 条</span> 
    </div>
    <table class="table table-bapply table-bapplyed table-bg">
        <thead>
            <tr>
                <th scope="col" colspan="12">资讯列表</th>
            </tr>
            <tr class="text-c">
                <th width="25"><input type="checkbox" name="" value=""></th>
                <th width="150">工单编号</th>
                <th width="100">工单标题</th>
                <th width="200">用户名称</th>
                <th width="100">问题描述</th>
                <th width="50">联系电话</th>
                <th width="50">工单状态</th>
                <th width="80">创建时间</th>
                <th width="50">更新时间</th>
            </tr>
        </thead>
        <tbody>
            @foreach($applies as $app)
            <tr class="text-c">
                <td><input type="checkbox" value="{{$app->id}}" name=""></td>
                <td>{{$app->apply_number}}</td>
                <td>{{$app->title}}</td>
                <td>{{$app->username}}</td>
                <td>{{$app->content}}</td>
                <td>{{$app->phone}}</td>
                <td class="td-status"><span class="label label-success radius">
                        @if($app->status ==0)
                        未处理
                        @elesif($app->status ==1)
                        正在受理中
                        @elesif($app->status ==2)
                        已完成
                        @elseif($app->status ==3)
                        已被删除
                        @else
                        状态异常
                        @endif
                    </span></td>
                <td>{{$app->created_at}}</td>
                <td>{{$app->updated_at}}</td>
                <td class="td-manage">
                    <a title="编辑" href="javascript:;" onclick="apply_edit('编辑订单', 'editApply={{$app->id}}', '1', '800', '500')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i>编辑</a><br>
                    <a title="删除" href="javascript:;" onclick='apply_del("{{$app->title}}","{{$app->id}}")' class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i>删除</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection

@section('my-js')
<script type="text/javascript">
    function addApply(title, url) {
        var index = layer.open({
            type: 2,
            title: title,
            content: url
        });
        layer.full(index);
    }
    
    function apply_edit(title, url) {
        var index = layer.open({
            type: 2,
            title: title,
            content: url
        });
        layer.full(index);
    }
    
    function apply_del(name, id) {
        layer.confirm('确认要删除订单【' + name + '】吗？', function (index) {
            //此处请求后台程序，下方是成功后的前台处理……
            $.ajax({
                type: 'post', // 提交方式 get/post
                url: 'service/delApply', // 需要提交的 url
                dataType: 'json',
                data: {
                    id: id,
                    _token: "{{csrf_token()}}"
                },
                success: function (data) {
                    if (data == null) {
                        layer.msg('服务端错误', {icon: 2, time: 2000});
                        return;
                    }
                    if (data.status != 0) {
                        layer.msg(data.message, {icon: 2, time: 2000});
                        return;
                    }

                    layer.msg(data.message, {icon: 1, time: 2000});
                    location.replace(location.href);
                },
                error: function (xhr, status, error) {
                    console.log(xhr);
                    console.log(status);
                    console.log(error);
                    layer.msg('ajax error', {icon: 2, time: 2000});
                },
                beforeSend: function (xhr) {
                    layer.load(0, {shade: false});
                }
            });
        });
    }
</script>
@endsection
