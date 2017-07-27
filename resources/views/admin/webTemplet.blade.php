@extends('admin.master')

@section('title','云产品——咨询管理')

@section('content')
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 管理员后台 <span class="c-gray en">&gt;</span> 首页管理 <span class="c-gray en">&gt;</span> 头部导航栏 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i>刷新</a></nav>
<div class="pd-30">
    <div class="cl pd-5 bg-1 bk-gray"> <span class="l">
            <a href="javascript:;" onclick="addWebTemplet('添加资讯', 'addWebTemplet', '800', '500')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加资讯</a> </span> 
            <span class="r">共有数据：<strong>{{count($webTemplets)}}</strong> 条</span> 
    </div>
    <table class="table table-border table-bordered table-bg">
        <thead>
            <tr>
                <th scope="col" colspan="12">资讯列表</th>
            </tr>
            <tr class="text-c">
                <th width="25"><input type="checkbox" name="" value=""></th>
                <th width="150">模板名字</th>
                <th width="100">预览图</th>
                <th width="200">简介</th>
                <th width="100">编号</th>
                <th width="50">价格</th>
                <th width="50">原价</th>
                <th width="50">预览模板</th>
                <th width="80">发布时间</th>
                <th width="80">更新时间</th>
                <th width="50">操作</th>
            </tr>
        </thead>
        <tbody>
            @foreach($webTemplets as $web)
            <tr class="text-c">
                <td><input type="checkbox" value="{{$web->id}}" name=""></td>
                <td>{{$web->name}}</td>
                <td><img src="http://localhost/yunchanpin/htdocs/public/webTemplet/{!! $web->img !!}" style="width: 150px;height: 100px"></td>
                <td>{{$web->summary}}</td>
                <td>{{$web->number}}</td>
                <td>{{$web->price}}</td>
                <td>{{$web->worth}}</td>
                <td class="td-status"><span class="label label-success radius"><a href="http://localhost/yunchanpin/htdocs/public/webTemplet/{{$web->url}}" target="_black">点击预览</a></span></td>
                <td>{{$web->created_at}}</td>
                <td>{{$web->updated_at}}</td>
                <td class="td-manage">
                    <a title="编辑" href="javascript:;" onclick="webTemplet_edit('管理员编辑', 'editWebTemplet={{$web->id}}', '1', '800', '500')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i>编辑</a><br>
                    <a title="删除" href="javascript:;" onclick='webTemplet_del("{{$web->name}}","{{$web->id}}")' class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i>删除</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection

@section('my-js')
<script type="text/javascript">
    function addWebTemplet(title, url) {
        var index = layer.open({
            type: 2,
            title: title,
            content: url
        });
        layer.full(index);
    }
    
    function webTemplet_edit(title, url) {
        var index = layer.open({
            type: 2,
            title: title,
            content: url
        });
        layer.full(index);
    }
    
    function webTemplet_del(name, id) {
        layer.confirm('确认要删除模板【' + name + '】吗？', function (index) {
            //此处请求后台程序，下方是成功后的前台处理……
            $.ajax({
                type: 'post', // 提交方式 get/post
                url: 'service/delWebTemplet', // 需要提交的 url
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
