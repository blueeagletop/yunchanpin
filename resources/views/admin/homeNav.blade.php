@extends('admin.master')

@section('title','云产品——首页导航')

@section('content')
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 管理员后台 <span class="c-gray en">&gt;</span> 首页管理 <span class="c-gray en">&gt;</span> 头部导航栏 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i>刷新</a></nav>
<div class="pd-30">
	<div class="cl pd-5 bg-1 bk-gray"> <span class="l"><a href="javascript:;" onclick="home_nav('添加导航','homeNavAdd','800','500')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加导航</a> <a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> </span> <span class="r">共有数据：<strong>{{count($homeNav)}}</strong> 条</span> </div>
	<table class="table table-border table-bordered table-bg">
		<thead>
			<tr>
				<th scope="col" colspan="9">导航列表</th>
			</tr>
			<tr class="text-c">
				<th width="25"><input type="checkbox" name="" value=""></th>
				<th width="40">ID</th>
				<th width="150">导航标题</th>
				<th width="190">导航链接</th>
				<th width="50">导航排序</th>
				<th width="100">操作</th>
			</tr>
		</thead>
		<tbody>
                    @foreach($homeNav as $nav)
			<tr class="text-c">
				<td><input type="checkbox" value="{{$nav->id}}" name=""></td>
				<td>{{$nav->id}}</td>
				<td>{{$nav->title}}</td>
				<td>{{$nav->url}}</td>
				<td class="td-status"><span class="label label-success radius">{{$nav->compositor}}</span></td>
				<td class="td-manage"> <a title="编辑" href="javascript:;" onclick="admin_edit('管理员编辑','admin-add.html','1','800','500')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i>编辑</a> <a title="删除" href="javascript:;" onclick="admin_del(this,'1')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i>删除</a></td>
			</tr>
                    @endforeach
		</tbody>
	</table>
</div>

@endsection

@section('my-js')
<script type="text/javascript">
	function home_nav(title, url) {
		var index = layer.open({
			type: 2,
			title: title,
			content: url
		});
		layer.full(index);
	}
        
</script>
@endsection
