@extends('master')

@section('title', '云产品——顶级的云服务提供商')

<link href="public/css/templatemo_style.css" rel="stylesheet" type="text/css" />

@section('content')

<div id="templatemo_header_wrapper">
<!-- Free Web Templates from TemplateMo.com -->
    <div id="templatemo_header">
    	<div id="logo"></div>
        <div id="templatemo_menu">
            <ul>
                @foreach($homeNav as $nav)
                <li><a href="{{$nav->url}}" 
                       class="current"
                       ><span></span>{{$nav->title}}</a></li>
                @endforeach
            </ul>   
            <div class="cleaner"></div> 	
        </div> <!-- end of menu -->
        <div class="cleaner"></div>
    </div> <!-- end of header -->
</div> <!-- end of header wrapper -->

<div id="templatemo_banner_wrapper">
	<div id="templatemo_banner">
        <div id="banner_content">
            <div id="banner_title">{{ $homeContent->summary_title }}</div>
            <div id="banner_text">
                {{ $homeContent->summary_content }}
            </div>
          <div class="cleaner"></div>
        </div> <!-- end of banner content -->
        <div class="cleaner"></div>   
    </div> <!-- end of banner -->
</div> <!-- end of banner wrapper -->

<div id="templatemo_content_top_wrapper">
    <div id="templatemo_content_top">
        <div class="header_01">{{ $homeContent->welcome_title }}</div>
{{ $homeContent->welcome_content }}
      <div class="margin_bottom_10"></div>
        <div class="rc_btn_01"><a href="#">{{ $homeContent->welcome_button }}</a></div>
      <div class="cleaner"></div>
    </div> <!-- end of content top -->
</div> <!-- end of content top wrapper -->

<div id="templatemo_content_wrapper">
    <div id="templatemo_content">
        <div class="content_col_w420 fl">
            <div class="header_02">{{ $homeContent->service_title }}</div>
            <div class="service_box fl margin_right_10">
           		<a href="#"><img src="http://localhost/yunchanpin/htdocs/{{$homeContent->service_image1}}" alt="service" /></a>
            </div>     
            <div class="service_box fl margin_right_10">
            	<a href="#"><img src="http://localhost/yunchanpin/htdocs/{{$homeContent->service_image2}}" alt="service" /></a>
            </div> 
            <div class="service_box fl">
	            <a href="#"><img src="http://localhost/yunchanpin/htdocs/{{$homeContent->service_image3}}" alt="service" /></a>
            </div>
            <div class="margin_bottom_10 border_bottom"></div>
            <div class="margin_bottom_30"></div>
            <div class="header_02">{{$homeContent->new_title}}</div>
            <div class="testimonial_box_wrapper">
                <div class="testimonial_box">
                    <div class="header_03"><a href="#">七月大促销</a></div>
                    <p>
					为回馈广大客户，七月份将有三款公司主页模板优惠打折，点击查看详情。
                    </p>
                </div>
	        </div>
            <div class="testimonial_box_wrapper">
                <div class="testimonial_box">
                	<div class="header_03"><a href="#">售后服务说明</a></div>
               	  <p>
					售后服务仅支持在本公司购买的产品，其他服务商的产品一概不提供售后服务哟
               	  </p>
                </div>
            </div>
            <div class="testimonial_box_wrapper">
                <div class="testimonial_box">
                    <div class="header_03"><a href="#">客户产品管理</a></div>
                  <p>
					即日起，客户可通过本网站的客户中心查看产品订单详情，所有的售后服务均可在本网站提交申请。
                  </p>
                </div>
            </div>
        	<div class="margin_bottom_20"></div>
        </div>        <!-- end of a section -->
        <div class="content_col_w420 fr">
            <div class="header_02">{{$homeContent->shop_title}}</div>
            <div class="image_wrapper_01"><img src="public/images/templatemo_image_01.jpg" alt="image" /></div>
            <div class="section_w280 fl">
                <ul class="future_project">
                    <li>{{$homeContent->shop_title2}}</li>
                    <li>{{$homeContent->shop_content}}</li>
                </ul>
                <div class="cleaner"></div>
            </div>
            <div class="section_w140 fr">
                <div class="rc_btn_02"><a href="#">{{$homeContent->shop_button}}</a></div>
                <div class="cleaner"></div>            
            </div>
            <div class="margin_bottom_20 border_bottom"></div>
            <div class="margin_bottom_30"></div>
            <div class="header_02">{{$homeContent->other_title}}</div>
            <div class="section_w280 fl">
                <ul class="other_project_list">
                    <li><a href="#">{{$homeContent->other_title1}}</a></li>
                    <li><a href="#">{{$homeContent->other_title2}}</a></li>
                    <li><a href="#">{{$homeContent->other_title3}}</a></li>
                    @if($homeContent->other_title4 != null)
                    <li><a href="#">{{$homeContent->other_title4}}</a></li>
                    @elseif($homeContent->other_title5 != null)
                    <li><a href="#">{{$homeContent->other_title5}}</a></li> 
                    @else
                    @endif
              </ul>
            </div>
            <div class="section_w140 fr">
                <div class="project_icon"></div>
            </div>
        </div>  
    </div>  <!-- end of content -->
</div> <!-- end of content wrapper -->
      
@endsection

@section('my-js')

@endsection