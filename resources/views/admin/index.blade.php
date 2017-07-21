@extends('admin.master')

@section('title','云产品——管理员后台')

@section('content')
<header class="Hui-header cl"><a class="Hui-logo l" title="云产品" href="index">云产品</a><span class="Hui-subtitle l">管理员后台</span>
	<ul class="Hui-userbar">
		<li><a href="exit">退出</a></li>
		<li id="Hui-msg"> <a href="#" title="消息"><span class="badge badge-danger">1</span><i class="Hui-iconfont" style="font-size:18px">&#xe68a;</i></a> </li>
	</ul>
	<a href="javascript:;" class="Hui-nav-toggle Hui-iconfont" aria-hidden="false">&#xe667;</a>
</header>
<aside class="Hui-aside">
    <div class="menu_dropdown bk_2">
        <dl id="menu-article">
            <dt><i class="Hui-iconfont">&#xe72b;</i> 首页管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd>
                <ul>
                    <li><a _href="homeNav" data-title="头部导航栏" href="javascript:void(0)">头部导航栏</a></li>
                    <li><a _href="homeContent" data-title="首页详细内容" href="javascript:void(0)">首页详细内容</a></li>
                </ul>
            </dd>
        </dl>
        <dl id="menu-picture">
            <dt><i class="Hui-iconfont">&#xe616;</i> 资讯管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd>
                <ul>
                    <li><a _href="article-list.html" data-title="资讯管理" href="javascript:void(0)">新增新闻</a></li>
                    <li><a _href="article-list.html" data-title="资讯管理" href="javascript:void(0)">新增公告</a></li>
                    <li><a _href="article-list.html" data-title="资讯管理" href="javascript:void(0)">新闻列表</a></li>
                    <li><a _href="article-list.html" data-title="资讯管理" href="javascript:void(0)">公告列表</a></li>
                </ul>
            </dd>
        </dl>
        <dl id="menu-product">
            <dt><i class="Hui-iconfont">&#xe620;</i> 产品管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd>
                <ul>
                    <li><a _href="product-brand.html" data-title="品牌管理" href="javascript:void(0)">新增产品</a></li>
                    <li><a _href="product-category.html" data-title="分类管理" href="javascript:void(0)">产品分类</a></li>
                    <li><a _href="product-list.html" data-title="产品管理" href="javascript:void(0)">产品列表</a></li>
                </ul>
            </dd>
        </dl>
        <dl id="menu-product">
            <dt><i class="Hui-iconfont">&#xe6b6;</i> 订单管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd>
                <ul>
                    <li><a _href="product-brand.html" data-title="品牌管理" href="javascript:void(0)">新增订单</a></li>
                    <li><a _href="product-category.html" data-title="分类管理" href="javascript:void(0)">订单分类</a></li>
                    <li><a _href="product-list.html" data-title="产品管理" href="javascript:void(0)">订单列表</a></li>
                </ul>
            </dd>
        </dl>
                <dl id="menu-product">
            <dt><i class="Hui-iconfont">&#xe669;</i> 售后管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd>
                <ul>
                    <li><a _href="product-brand.html" data-title="品牌管理" href="javascript:void(0)">未处理信息</a></li>
                    <li><a _href="product-category.html" data-title="分类管理" href="javascript:void(0)">已处理信息</a></li>
                    <li><a _href="product-list.html" data-title="产品管理" href="javascript:void(0)">被删的信息</a></li>
                </ul>
            </dd>
        </dl>
        <dl id="menu-comments">
            <dt><i class="Hui-iconfont">&#xe622;</i> 留言管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd>
                <ul>
                    <li><a _href="http://h-ui.duoshuo.com/admin/" data-title="评论列表" href="javascript:;">未处理的留言</a></li>
                    <li><a _href="http://h-ui.duoshuo.com/admin/" data-title="评论列表" href="javascript:;">全部留言</a></li>
                    <li><a _href="feedback-list.html" data-title="意见反馈" href="javascript:void(0)">被删的留言</a></li>
                </ul>
            </dd>
        </dl>
        <dl id="menu-member">
            <dt><i class="Hui-iconfont">&#xe60d;</i> 用户管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd>
                <ul>
                    <li><a _href="member-list.html" data-title="会员列表" href="javascript:;">新增用户</a></li>
                    <li><a _href="member-del.html" data-title="删除的会员" href="javascript:;">用户列表</a></li>
                    <li><a _href="member-scoreoperation.html" data-title="积分管理" href="javascript:;">被删的用户</a></li>
                </ul>
            </dd>
        </dl>
        <dl id="menu-admin">
            <dt><i class="Hui-iconfont">&#xe62d;</i> 管理员<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd>
                <ul>
                    <li><a _href="admin-role.html" data-title="角色管理" href="javascript:void(0)">新增管理员</a></li>
                    <li><a _href="admin-list.html" data-title="管理员列表" href="javascript:void(0)">管理员列表</a></li>
                </ul>
            </dd>
        </dl>
    </div>
</aside>
<div class="dislpayArrow hidden-xs"><a class="pngfix" href="javascript:void(0);" onClick="displaynavbar(this)"></a></div>
<section class="Hui-article-box">
    <div id="Hui-tabNav" class="Hui-tabNav hidden-xs">
        <div class="Hui-tabNav-wp">
            <ul id="min_title_list" class="acrossTab cl">
                <li class="active">
                    <span title="我的桌面" _href="welcome.html">我的桌面</span>
                    <em></em></li>
            </ul>
        </div>
        <div class="Hui-tabNav-more btn-group"><a id="js-tabNav-prev" class="btn radius btn-default size-S" href="javascript:;"><i class="Hui-iconfont">&#xe6d4;</i></a><a id="js-tabNav-next" class="btn radius btn-default size-S" href="javascript:;"><i class="Hui-iconfont">&#xe6d7;</i></a></div>
    </div>
    <div id="iframe_box" class="Hui-article">
        <div class="show_iframe">
            <div style="display:none" class="loading"></div>
            <iframe scrolling="yes" frameborder="0" src="welcome"></iframe>
        </div>
    </div>
</section>

<div class="contextMenu" id="Huiadminmenu">
    <ul>
        <li id="closethis">关闭当前 </li>
        <li id="closeall">关闭全部 </li>
    </ul>
</div>

@endsection

@section('my-js')
<!--请在下方写此页面业务相关的脚本-->


@endsection