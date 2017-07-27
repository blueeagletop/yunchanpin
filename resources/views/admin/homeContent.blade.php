@extends('admin.master')

@section('title','云产品——首页导航')

@section('content')
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 管理员后台 <span class="c-gray en">&gt;</span> 首页管理 <span class="c-gray en">&gt;</span> 头部导航栏 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i>刷新</a></nav>
<div class="pd-30">
    <div class="cl pd-5 bg-1 bk-gray"> <span class="l">
            <a href="javascript:;" onclick="editContent('修改内容', 'editHomeContent={{$content->id}}', '800', '500')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 修改内容</a>
        </span> <span class="r">共有数据：<strong>{{count($content)}}</strong> 条</span> 
    </div>
    <table class="table table-border table-bordered table-bg">
        <thead>
            <tr>
                <th scope="col" colspan="9">导航列表</th>
            </tr>
            <tr class="text-c">
                <th width="25"><input type="checkbox" name="" value=""></th>
                <th width="100">操作</th>
                <th width="150">名称</th>
                <th width="400">内容</th>

            </tr>
        </thead>
        <tbody>

            <tr class="text-c">
                <td><input type="checkbox" value="{{$content->id}}" name=""></td>
                <td class="td-manage">
                    <a title="编辑" href="javascript:;" onclick="editContent('管理员编辑', 'editHomeContent={{$content->id}}', '1', '800', '500')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i>编辑</a> 
                    <a title="删除" href="javascript:;" onclick='nav_del("不能删除哟", "999999")' class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i>删除</a>
                </td>
                <td>summary_title</td>
                <td>{{$content->summary_title}}</td>
            </tr>
            
            <tr class="text-c">
                <td><input type="checkbox" value="{{$content->id}}" name=""></td>
                <td class="td-manage">
                    <a title="编辑" href="javascript:;" onclick="editContent('管理员编辑', 'editHomeContent={{$content->id}}', '1', '800', '500')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i>编辑</a> 
                    <a title="删除" href="javascript:;" onclick='nav_del("不能删除哟", "999999")' class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i>删除</a>
                </td>
                <td>summary_content</td>
                <td>{!! $content->summary_content !!}</td>
            </tr>
            
            <tr class="text-c">
                <td><input type="checkbox" value="{{$content->id}}" name=""></td>
                <td class="td-manage">
                    <a title="编辑" href="javascript:;" onclick="editContent('管理员编辑', 'editHomeContent={{$content->id}}', '1', '800', '500')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i>编辑</a> 
                    <a title="删除" href="javascript:;" onclick='nav_del("不能删除哟", "999999")' class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i>删除</a>
                </td>
                <td>welcome_title</td>
                <td>{{$content->welcome_title}}</td>
            </tr>
            
            <tr class="text-c">
                <td><input type="checkbox" value="{{$content->id}}" name=""></td>
                <td class="td-manage">
                    <a title="编辑" href="javascript:;" onclick="editContent('管理员编辑', 'editHomeContent={{$content->id}}', '1', '800', '500')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i>编辑</a> 
                    <a title="删除" href="javascript:;" onclick='nav_del("不能删除哟", "999999")' class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i>删除</a>
                </td>
                <td>welcome_content</td>
                <td>{!! $content->welcome_content !!}</td>
            </tr>
            
            <tr class="text-c">
                <td><input type="checkbox" value="{{$content->id}}" name=""></td>
                <td class="td-manage">
                    <a title="编辑" href="javascript:;" onclick="editContent('管理员编辑', 'editHomeContent={{$content->id}}', '1', '800', '500')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i>编辑</a> 
                    <a title="删除" href="javascript:;" onclick='nav_del("不能删除哟", "999999")' class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i>删除</a>
                </td>
                <td>welcome_button</td>
                <td>{{$content->welcome_button}}</td>
            </tr>
            
            <tr class="text-c">
                <td><input type="checkbox" value="{{$content->id}}" name=""></td>
                <td class="td-manage">
                    <a title="编辑" href="javascript:;" onclick="editContent('管理员编辑', 'editHomeContent={{$content->id}}', '1', '800', '500')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i>编辑</a> 
                    <a title="删除" href="javascript:;" onclick='nav_del("不能删除哟", "999999")' class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i>删除</a>
                </td>
                <td>service_title</td>
                <td>{{$content->service_title}}</td>
            </tr>
            
            <tr class="text-c">
                <td><input type="checkbox" value="{{$content->id}}" name=""></td>
                <td class="td-manage">
                    <a title="编辑" href="javascript:;" onclick="editContent('管理员编辑', 'editHomeContent={{$content->id}}', '1', '800', '500')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i>编辑</a> 
                    <a title="删除" href="javascript:;" onclick='nav_del("不能删除哟", "999999")' class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i>删除</a>
                </td>
                <td>news_title</td>
                <td>{{$content->news_title}}</td>
            </tr>
            
            <tr class="text-c">
                <td><input type="checkbox" value="{{$content->id}}" name=""></td>
                <td class="td-manage">
                    <a title="编辑" href="javascript:;" onclick="editContent('管理员编辑', 'editHomeContent={{$content->id}}', '1', '800', '500')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i>编辑</a> 
                    <a title="删除" href="javascript:;" onclick='nav_del("不能删除哟", "999999")' class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i>删除</a>
                </td>
                <td>shop_title</td>
                <td>{{$content->shop_title}}</td>
            </tr>
            
            <tr class="text-c">
                <td><input type="checkbox" value="{{$content->id}}" name=""></td>
                <td class="td-manage">
                    <a title="编辑" href="javascript:;" onclick="editContent('管理员编辑', 'editHomeContent={{$content->id}}', '1', '800', '500')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i>编辑</a> 
                    <a title="删除" href="javascript:;" onclick='nav_del("不能删除哟", "999999")' class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i>删除</a>
                </td>
                <td>shop_title2</td>
                <td>{{$content->shop_title2}}</td>
            </tr>
            
            <tr class="text-c">
                <td><input type="checkbox" value="{{$content->id}}" name=""></td>
                <td class="td-manage">
                    <a title="编辑" href="javascript:;" onclick="editContent('管理员编辑', 'editHomeContent={{$content->id}}', '1', '800', '500')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i>编辑</a> 
                    <a title="删除" href="javascript:;" onclick='nav_del("不能删除哟", "999999")' class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i>删除</a>
                </td>
                <td>shop_content</td>
                <td>{{$content->shop_content}}</td>
            </tr>
            
            <tr class="text-c">
                <td><input type="checkbox" value="{{$content->id}}" name=""></td>
                <td class="td-manage">
                    <a title="编辑" href="javascript:;" onclick="editContent('管理员编辑', 'editHomeContent={{$content->id}}', '1', '800', '500')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i>编辑</a> 
                    <a title="删除" href="javascript:;" onclick='nav_del("不能删除哟", "999999")' class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i>删除</a>
                </td>
                <td>shop_button</td>
                <td>{{$content->shop_button}}</td>
            </tr>
            
            <tr class="text-c">
                <td><input type="checkbox" value="{{$content->id}}" name=""></td>
                <td class="td-manage">
                    <a title="编辑" href="javascript:;" onclick="editContent('管理员编辑', 'editHomeContent={{$content->id}}', '1', '800', '500')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i>编辑</a> 
                    <a title="删除" href="javascript:;" onclick='nav_del("不能删除哟", "999999")' class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i>删除</a>
                </td>
                <td>shop_url</td>
                <td>{{$content->shop_url}}</td>
            </tr>
            
        </tbody>
    </table>
</div>

@endsection

@section('my-js')
<script type="text/javascript">
    function editContent(title, url) {
        var index = layer.open({
            type: 2,
            title: title,
            content: url
        });
        layer.full(index);
    }
    function nav_del(name, id) {
        layer.confirm('确认要删除【' + name + '】吗？', function (index) {
            //此处请求后台程序，下方是成功后的前台处理……
            $.ajax({
                type: 'post', // 提交方式 get/post
                url: 'service/delHomeNav', // 需要提交的 url
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
