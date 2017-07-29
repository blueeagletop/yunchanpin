@extends('admin.master')

@section('title','云产品——咨询管理')

@section('content')
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 管理员后台 <span class="c-gray en">&gt;</span> 首页管理 <span class="c-gray en">&gt;</span> 头部导航栏 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i>刷新</a></nav>
<div class="pd-30">
    <div class="cl pd-5 bg-1 bk-gray"> <span class="l">
            <a href="javascript:;" onclick="addAdvise('添加留言', 'addAdvise', '800', '500')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加留言</a> </span> 
            <span class="r">共有数据：<strong>{{count($advises)}}</strong> 条</span> 
    </div>
    <table class="table table-bapply table-bapplyed table-bg">
        <thead>
            <tr>
                <th scope="col" colspan="12">资讯列表</th>
            </tr>
            <tr class="text-c">
                <th width="25"><input type="checkbox" name="" value=""></th>
                <th width="150">留言标题</th>
                <th width="200">用户名称</th>
                <th width="100">留言内容</th>
                <th width="50">留言状态</th>
                <th width="80">创建时间</th>
                <th width="50">更新时间</th>
            </tr>
        </thead>
        <tbody>
            @foreach($advises as $ad)
            <tr class="text-c">
                <td><input type="checkbox" value="{{$ad->id}}" name=""></td>
                <td>{{$ad->title}}</td>
                <td>{{$ad->username}}</td>
                <td>{{$ad->content}}</td>
                <td class="td-status"><span class="label label-success radius">
                        @if($ad->status ==0)
                        未处理
                        @elesif($ad->status ==1)
                        已处理
                        @elesif($ad->status ==2)
                        已删除
                        @else
                        状态异常
                        @endif
                    </span></td>
                <td>{{$ad->created_at}}</td>
                <td>{{$ad->updated_at}}</td>
                <td class="td-manage">
                    <a title="编辑" href="javascript:;" onclick="apply_edit('编辑订单', 'editAdvise={{$ad->id}}', '1', '800', '500')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i>编辑</a><br>
                    <a title="删除" href="javascript:;" onclick='apply_del("{{$ad->title}}","{{$ad->id}}")' class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i>删除</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection

@section('my-js')
<script type="text/javascript">
    function addAdvise(title, url) {
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
                url: 'service/delAdvise', // 需要提交的 url
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
