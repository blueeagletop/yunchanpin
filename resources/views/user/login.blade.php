@extends('admin.master')

@section('title','云产品——管理员登录')

@section('content')
  <link href="../public/admin/css/H-ui.login.css" rel="stylesheet" type="text/css" />

<input type="hidden" id="TenantId" name="TenantId" value="" />
<div class=""></div>
<div class="loginWraper">
  <div id="loginform" class="loginBox">
    <form class="form form-horizontal" action="service/login" method="post">
        {{ csrf_field() }}
      <div class="row cl">
        <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60d;</i></label>
        <div class="formControls col-xs-8">
          <input id="" name="" type="text" placeholder="账户" class="input-text size-L">
        </div>
      </div>
      <div class="row cl">
        <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60e;</i></label>
        <div class="formControls col-xs-8">
          <input id="" name="" type="password" placeholder="密码" class="input-text size-L">
        </div>
      </div>
      <div class="row cl">
        <div class="formControls col-xs-8 col-xs-offset-3">
          <input class="input-text size-L" type="text" placeholder="验证码" onblur="if(this.value==''){this.value='验证码:'}" onclick="if(this.value=='验证码:'){this.value='';}" value="验证码:" style="width:150px;">
          <img src="../service/validate_code/create"> <a id="kanbuq" href="javascript:;">看不清，换一张</a> </div>
      </div>
      <div class="row cl">
        <div class="formControls col-xs-8 col-xs-offset-3">
          <label for="online">
            <input type="checkbox" name="online" id="online" value="">
            使我保持登录状态</label>
        </div>
      </div>
      <div class="row cl">
        <div class="formControls col-xs-8 col-xs-offset-3">
          <input name="" type="submit" class="btn btn-success radius size-L" value="&nbsp;登&nbsp;&nbsp;&nbsp;&nbsp;录&nbsp;">
          <input name="" type="reset" class="btn btn-default radius size-L" value="&nbsp;取&nbsp;&nbsp;&nbsp;&nbsp;消&nbsp;">
        </div>
      </div>
    </form>
  </div>
</div>
<div class="footer">Copyright 你的公司名称 by H-ui.admin v3.1</div>

@endsection

@section('my-js')
<script type="text/javascript">

  function onLogin() {

    var username = $('input[name=username]').val();
    var password = $('input[name=password]').val();

    $.ajax({
        type: 'post', // 提交方式 get/post
        url: 'service/login', // 需要提交的 url
        dataType: 'json',
        data: {
          username: username,
          password: password,
          _token: "{{csrf_token()}}"
        },
        success: function(data) {
          if(data == null) {
            layer.msg('服务端错误', {icon:2, time:2000});
            return;
          }
          if(data.status != 0) {
            layer.msg(data.message, {icon:2, time:2000});
            return;
          }

          location.href = 'index';
        },
        error: function(xhr, status, error) {
          console.log(xhr);
          console.log(status);
          console.log(error);
          layer.msg('ajax error', {icon:2, time:2000});
        },
        beforeSend: function(xhr){
          layer.load(0, {shade: false});
        }
    });
  }

</script>
@endsection