@extends('admin.master')

@section('title','云产品——咨询管理')

@section('content')
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 管理员后台 <span class="c-gray en">&gt;</span> 首页管理 <span class="c-gray en">&gt;</span> 头部导航栏 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i>刷新</a></nav>

<input type="text" class="input-text Wdate" id="d122" onclick="WdatePicker()" value="" style="width:120px;"/>

<div class="pd-30">
    <div class="cl pd-5 bg-1 bk-gray"> <span class="l">

            <div class="text-c"> 日期范围：
                <input type="text" onfocus="WdatePicker({maxDate: '#F{$dp.$D(\'datemax\')||\'%y-%M-%d\'}'})" id="datemin" class="input-text Wdate" style="width:120px;">
                -
                <input type="text" onfocus="WdatePicker({minDate: '#F{$dp.$D(\'datemin\')}', maxDate: '%y-%M-%d'})" id="datemax" class="input-text Wdate" style="width:120px;">
                <input type="text" class="input-text" style="width:250px" placeholder="输入会员名称、电话、邮箱" id="" name="">
                <button type="submit" class="btn btn-success radius" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 按标题搜索</button>
            </div>
            <br>

            <a href="javascript:;" onclick="addNews('添加新闻', 'addNews', '800', '500')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加新闻</a> </span> 
        <span class="r">共有数据：<strong>{{count($news)}}</strong> 条</span> 
    </div>
    <table class="table table-border table-bordered table-bg">
        <thead>
            <tr>
                <th scope="col" colspan="12">资讯列表</th>
            </tr>
            <tr class="text-c">
                <th width="25"><input type="checkbox" name="" value=""></th>
                <th width="40">ID</th>
                <th width="150">资讯标题</th>
                <th width="100">管理员</th>
                <th width="100">资讯分类</th>
                <th width="50">置顶顺序</th>
                <th width="150">注释</th>
                <th width="50">状态</th>
                <th width="80">发布时间</th>
                <th width="80">更新时间</th>
                <th width="50">操作</th>
            </tr>
        </thead>
        <tbody>
            @foreach($news as $ne)
            <tr class="text-c">
                <td><input type="checkbox" value="{{$ne->id}}" name=""></td>
                <td>{{$ne->id}}</td>
                <td>{{$ne->title}}</td>
                <td>{{$ne->admin_id}}</td>
                <td>{{$ne->category}}</td>
                <td class="td-status"><span class="label label-success radius">{{$ne->top}}</span></td>
                <td>{{$ne->comment}}</td>
                <td>
                    <!--                    待完善功能，目前不可使用草稿功能-->
                    @if($ne->status == 0)
                    草稿
                    @else
                    已发布
                    @endif
                </td>
                <td>{{$ne->created_at}}</td>
                <td>{{$ne->updated_at}}</td>
                <td class="td-manage">
                    <a title="详情" href="javascript:;" onclick="news_detail('资讯详情', 'newsDetail={{$ne->id}}', '1', '800', '500')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe695;</i>详情</a><br>
                    <a title="编辑" href="javascript:;" onclick="news_edit('管理员编辑', 'editNews={{$ne->id}}', '1', '800', '500')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i>编辑</a><br>
                    <a title="删除" href="javascript:;" onclick='news_del("{{$ne->title}}", "{{$ne->id}}")' class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i>删除</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection

@section('my-js')

<script type="text/javascript" src="../public/admin/lib/My97DatePicker/WdatePicker.js"></script> 

<script type="text/javascript">
    function addNews(title, url) {
        var index = layer.open({
            type: 2,
            title: title,
            content: url
        });
        layer.full(index);
    }

    function news_detail(title, url) {
        var index = layer.open({
            type: 2,
            title: title,
            content: url
        });
        layer.full(index);
    }

    function news_edit(title, url) {
        var index = layer.open({
            type: 2,
            title: title,
            content: url
        });
        layer.full(index);
    }

    function news_del(name, id) {
        layer.confirm('确认要删除【' + name + '】吗？', function (index) {
            //此处请求后台程序，下方是成功后的前台处理……
            $.ajax({
                type: 'post', // 提交方式 get/post
                url: 'service/delNews', // 需要提交的 url
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
