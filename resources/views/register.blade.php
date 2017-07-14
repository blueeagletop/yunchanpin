<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>云产品——顶级的云服务提供商</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="public/css/templatemo_style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="templatemo_header_wrapper">
<!-- Free Web Templates from TemplateMo.com -->
    <div id="templatemo_header">
      <div id="logo"></div>
        <div id="templatemo_menu">
            <ul>
                <li><a href="index.html"><span></span>登录</a></li>
                <li><a href="index.html" class="current"><span></span>注册</a></li>
            </ul>  
            <h1 style="color: #FFF;">真诚对待每一个用户</h1> 
            <div class="cleaner"></div>   
        </div> <!-- end of menu -->
        <div class="cleaner"></div>
    </div> <!-- end of header -->
</div>

<div class="weui_cells weui_cells_form">
  <div class="weui_cell">
      <div class="weui_cell_hd"><label class="weui_label">邮箱</label></div>
      <div class="weui_cell_bd">
          <input class="weui_input" type="text" placeholder="" name='email'/>
      </div>
  </div>
  <div class="weui_cell">
      <div class="weui_cell_hd"><label class="weui_label">密码</label></div>
      <div class="weui_cell_bd">
          <input class="weui_input" type="password" placeholder="不少于6位" name='passwd_email'>
      </div>
  </div>
  <div class="weui_cell">
      <div class="weui_cell_hd"><label class="weui_label">确认密码</label></div>
      <div class="weui_cell_bd">
          <input class="weui_input" type="password" placeholder="不少于6位" name='passwd_email_cfm'/>
      </div>
  </div>
  <div class="weui_cell">
      <div class="weui_cell_hd"><label class="weui_label">验证码</label></div>
      <div class="weui_cell_bd">
          <input class="weui_input" type="text" placeholder="请输入验证码" name='validate_code'/>
      </div>
      <div class="weui_cell_ft">
          <img src="/service/validate_code/create" class="bk_validate_code"/>
      </div>
  </div>
</div>
<div class="weui_cells_tips"></div>
<div class="weui_btn_area">
  <a class="weui_btn" href="javascript:" onclick="onRegisterClick();">注册</a>
</div>
<a href="/login" class="bk_bottom_tips">已有帐号? 去登录</a>
</body>

<script type="text/javascript">
  function onRegisterClick() {
    $('input:radio[name=register_type]').each(function(index, el) {
      if($(this).attr('checked') == 'checked') {
        var email = '';
        var password = '';
        var confirm = '';
        var validate_code = '';
        var id = $(this).attr('id');
        if(id == 'x12') {
          email = $('input[name=email]').val();
          password = $('input[name=passwd_email]').val();
          confirm = $('input[name=passwd_email_cfm]').val();
          validate_code = $('input[name=validate_code]').val();
          if(verifyEmail(email, password, confirm, validate_code) == false) {
            return;
          }
        }
        $.ajax({
          type: "POST",
          url: '/service/register',
          dataType: 'json',
          cache: false,
          data: {phone: phone, email: email, password: password, confirm: confirm,
            phone_code: phone_code, validate_code: validate_code, _token: "{{csrf_token()}}"},
          success: function(data) {
            if(data == null) {
              $('.bk_toptips').show();
              $('.bk_toptips span').html('服务端错误');
              setTimeout(function() {$('.bk_toptips').hide();}, 2000);
              return;
            }
            if(data.status != 0) {
              $('.bk_toptips').show();
              $('.bk_toptips span').html(data.message);
              setTimeout(function() {$('.bk_toptips').hide();}, 2000);
              return;
            }
            $('.bk_toptips').show();
            $('.bk_toptips span').html('注册成功');
            setTimeout(function() {$('.bk_toptips').hide();}, 2000);
          },
          error: function(xhr, status, error) {
            console.log(xhr);
            console.log(status);
            console.log(error);
          }
        });
      }
    });
  }
  function verifyEmail(email, password, confirm, validate_code) {
    // 邮箱不为空
    if(email == '') {
      $('.bk_toptips').show();
      $('.bk_toptips span').html('请输入邮箱');
      setTimeout(function() {$('.bk_toptips').hide();}, 2000);
      return false;
    }
    // 邮箱格式
    if(email.indexOf('@') == -1 || email.indexOf('.') == -1) {
      $('.bk_toptips').show();
      $('.bk_toptips span').html('邮箱格式不正确');
      setTimeout(function() {$('.bk_toptips').hide();}, 2000);
      return false;
    }
    if(password == '' || confirm == '') {
      $('.bk_toptips').show();
      $('.bk_toptips span').html('密码不能为空');
      setTimeout(function() {$('.bk_toptips').hide();}, 2000);
      return false;
    }
    if(password.length < 6 || confirm.length < 6) {
      $('.bk_toptips').show();
      $('.bk_toptips span').html('密码不能少于6位');
      setTimeout(function() {$('.bk_toptips').hide();}, 2000);
      return false;
    }
    if(password != confirm) {
      $('.bk_toptips').show();
      $('.bk_toptips span').html('两次密码不相同!');
      setTimeout(function() {$('.bk_toptips').hide();}, 2000);
      return false;
    }
    if(validate_code == '') {
      $('.bk_toptips').show();
      $('.bk_toptips span').html('验证码不能为空!');
      setTimeout(function() {$('.bk_toptips').hide();}, 2000);
      return false;
    }
    if(validate_code.length != 4) {
      $('.bk_toptips').show();
      $('.bk_toptips span').html('验证码为4位!');
      setTimeout(function() {$('.bk_toptips').hide();}, 2000);
      return false;
    }
    return true;
  }
</script>
</html>