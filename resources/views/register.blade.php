<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>云产品——用户中心</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="public/css/templatemo_style.css" rel="stylesheet" type="text/css" />
<link href="public/css/yunchanpin.css" rel="stylesheet" type="text/css" />
<link href="public/css/register.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="header">
<!-- Free Web Templates from TemplateMo.com -->
    <div id="register_header">
      <div id="header_logo"></div>
      <div id="header_menu"><h2><a href="index.html">建站服务</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.html">首页</a></h2>
        </div> <!-- end of menu -->
    </div> <!-- end of header -->
</div>

    <div class="register_page">
        <div class="register_window">
            <br><br>
            <h1 style="text-align: center">欢迎注册 [云产品]</h1><br><br>
            <form class="form">
                <samp>用户名：</samp><input class="input" type="text" placeholder="设置您的用户名，设置成功后无法修改" name="username"></input><br>
                <samp>设置邮箱：</samp><input class="input" type="text" placeholder="设置邮箱，可用于找回密码" name="email"></input><br>
                <samp>设置密码：</samp><input class="input" type="password" placeholder="不少于6位" name='password'></input><br>
                <samp>确认密码：</samp><input class="input" type="password" placeholder="请再次输入您的密码" name='confirm'></input><br>
                <samp>验证码：</samp><input class="input" type="text" placeholder="请输入验证码" name='validate_code'></input><br>
                <img src="service/validate_code/create" class="bk_validate_code" style="left: 100px;"/>
                <sumbit name="register">注   册</sumbit><button name="chongzhi">重   置</button>
            </form>
<!--            <a href="login" class="bk_bottom_tips bk_important">已有帐号? 去登录</a>-->
        </div>
        <div style="position:absolute;bottom:4px;margin: auto;left: 50%;transform: translate(-50%)">关于我们&nbsp;|&nbsp;E-mail:yunchanpin@163.com&nbsp;|&nbsp;商务合作</div>
    </div>

</body>

    
<script type="text/javascript">
function hideActionSheet(weuiActionsheet, mask) {
    weuiActionsheet.removeClass('weui_actionsheet_toggle');
    mask.removeClass('weui_fade_toggle');
    weuiActionsheet.on('transitionend', function () {
        mask.hide();
    }).on('webkitTransitionEnd', function () {
        mask.hide();
    })
}

function onMenuClick () {
    var mask = $('#mask');
    var weuiActionsheet = $('#weui_actionsheet');
    weuiActionsheet.addClass('weui_actionsheet_toggle');
    mask.show().addClass('weui_fade_toggle').click(function () {
        hideActionSheet(weuiActionsheet, mask);
    });
    $('#actionsheet_cancel').click(function () {
        hideActionSheet(weuiActionsheet, mask);
    });
    weuiActionsheet.unbind('transitionend').unbind('webkitTransitionEnd');
}

function onMenuItemClick(index) {
  var mask = $('#mask');
  var weuiActionsheet = $('#weui_actionsheet');
  hideActionSheet(weuiActionsheet, mask);
  if(index == 1) {
//    $('.bk_toptips').show();
//    $('.bk_toptips span').html("敬请期待!");
//    setTimeout(function() {$('.bk_toptips').hide();}, 2000);
    location.href='http://localhost/laravel52/public';
  } else if(index == 2) {
      location.href='http://localhost/laravel52/public/category';
  } else if(index == 3){
      location.href='http://localhost/laravel52/public/cart';
  } else if(index == 4){
      location.href='http://localhost/laravel52/public/order_list';
  }
}

////将标题栏和标题保持一致
//$('.bk_title_content').html(document.title);
</script>
<script type="text/javascript">
    
    
    
  $('#x12').next().hide();
  $('input:radio[name=register_type]').click(function(event) {
    $('input:radio[name=register_type]').attr('checked', false);
    $(this).attr('checked', true);
    if($(this).attr('id') == 'x11') {
      $('#x11').next().show();
      $('#x12').next().hide();
      $('.weui_cells_form').eq(0).show();
      $('.weui_cells_form').eq(1).hide();
    } else if($(this).attr('id') == 'x12') {
      $('#x12').next().show();
      $('#x11').next().hide();
      $('.weui_cells_form').eq(1).show();
      $('.weui_cells_form').eq(0).hide();
    }
  });

  $('.bk_validate_code').click(function () {
    $(this).attr('src', 'service/validate_code/create?random=' + Math.random());
  });

</script>
<script type="text/javascript">
  var enable = true;
  $('.bk_phone_code_send').click(function(event) {
    if(enable == false) {
      return;
    }

    var phone = $('input[name=phone]').val();
    // 手机号不为空
    if(phone == '') {
      $('.bk_toptips').show();
      $('.bk_toptips span').html('请输入手机号');
      setTimeout(function() {$('.bk_toptips').hide();}, 2000);
      return;
    }
    // 手机号格式
    if(phone.length != 11 || phone[0] != '1') {
      $('.bk_toptips').show();
      $('.bk_toptips span').html('手机格式不正确');
      setTimeout(function() {$('.bk_toptips').hide();}, 2000);
      return;
    }

    $(this).removeClass('bk_important');
    $(this).addClass('bk_summary');
    enable = false;
    var num = 60;
    var interval = window.setInterval(function() {
      $('.bk_phone_code_send').html(--num + 's 重新发送');
      if(num == 0) {
        $('.bk_phone_code_send').removeClass('bk_summary');
        $('.bk_phone_code_send').addClass('bk_important');
        enable = true;
        window.clearInterval(interval);
        $('.bk_phone_code_send').html('重新发送');
      }
    }, 1000);

    $.ajax({
      url: 'service/validate_phone/send',
      type:'POST',
      dataType: 'json',
      cache: false,
      data: {phone: phone,_token: "{{csrf_token()}}"},
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
        $('.bk_toptips span').html('发送成功');
        setTimeout(function() {$('.bk_toptips').hide();}, 2000);
      },
      error: function(xhr, status, error) {
        console.log(xhr);
        console.log(status);
        console.log(error);
      }
    });
  });
</script>
<script type="text/javascript">

  function onRegisterClick() {

    $('input:radio[name=register_type]').each(function(index, el) {
      if($(this).attr('checked') == 'checked') {
        var email = '';
        var phone = '';
        var password = '';
        var confirm = '';
        var phone_code = '';
        var validate_code = '';

        var id = $(this).attr('id');
        if(id == 'x11') {
          phone = $('input[name=phone]').val();
          password = $('input[name=passwd_phone]').val();
          confirm = $('input[name=passwd_phone_cfm]').val();
          phone_code = $('input[name=phone_code]').val();
          if(verifyPhone(phone, password, confirm, phone_code) == false) {
            return;
          }
        } else if(id == 'x12') {
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
          url: 'service/register',
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

  function verifyPhone(phone, password, confirm, phone_code) {
    // 手机号不为空
    if(phone == '') {
      $('.bk_toptips').show();
      $('.bk_toptips span').html('请输入手机号');
      setTimeout(function() {$('.bk_toptips').hide();}, 2000);
      return false;
    }
    // 手机号格式
    if(phone.length != 11 || phone[0] != '1') {
      $('.bk_toptips').show();
      $('.bk_toptips span').html('手机格式不正确');
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
    if(phone_code == '') {
      $('.bk_toptips').show();
      $('.bk_toptips span').html('手机验证码不能为空!');
      setTimeout(function() {$('.bk_toptips').hide();}, 2000);
      return false;
    }
    if(phone_code.length != 6) {
      $('.bk_toptips').show();
      $('.bk_toptips span').html('手机验证码为6位!');
      setTimeout(function() {$('.bk_toptips').hide();}, 2000);
      return false;
    }
    return true;
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