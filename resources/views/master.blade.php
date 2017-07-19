<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
  <title>@yield('title')</title>
  
  <link rel="stylesheet" type="text/css" href="public/css/templatemo_style.css">
  <link rel="stylesheet" href="public/css/yunchanpin.css">
        
</head>
<body>


    
<div class="page">
  @yield('content')
</div>

<!-- tooltips -->
<div id="templatemo_footer_wrapper">
    <div id="templatemo_footer">
        <div class="content_col_w420 fl">
            <div class="header_01">“云产品”信息科技有限公司</div>
          <p>	
          </p>
            <div class="margin_bottom_20"></div>
            Copyright © 2017 <a href="#">“云产品”信息科技有限公司</a> <!-- Credit: www.templatemo.com -->
            <div class="cleaner"></div>
        </div>
        <div class="content_col_w420 fr">
            <div class="section_w220 fl">
                <div class="header_01">产品与服务</div>
                <ul class="normal_list">
                    <li><a href="#">一键建站</a></li>
                    <li><a href="#">售后服务</a></li>
                    <li><a href="#">资料下载</a></li>
                </ul>
            </div>
            <div class="section_w220 fr text_rl">
                <div class="header_01">联系我们</div>
                <ul class="contact">
                    <li>Email: yunchanpin@163.com</li>
                </ul>
                <div class="margin_bottom_10"></div>
            </div>
        </div>
        <div class="cleaner"></div>
    </div><!-- end of footer wrapper -->
</div> 

</body>
<script type="text/javascript"></script>
@yield('my-js')
</html>
