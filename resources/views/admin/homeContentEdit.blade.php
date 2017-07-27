@extends('admin.master')

@section('title','添加首页导航')

@section('content')

<form action="" method="post" class="form form-horizontal" id="form-content-edit">
    {{ csrf_field() }}
    <div class="row cl">
        <label class="form-label col-2"><span class="c-red">*</span>标题</label>
        <div class="formControls col-5">
            <input type="text" class="input-text" value="{{$content->summary_title}}" placeholder="" name="summary_title" datatype="*" nullmsg="名称不能为空">
        </div>
        <div class="col-4"> </div>
    </div>
    <div class="row cl">
        <label class="form-label col-2">简介：</label>
        <div class="formControls col-8">
            <script name="editor" id="editor" type="text/plain" style="width:100%; height:200px;">{!! $content->summary_content !!}</script>
        </div>
    </div>
    <div class="row cl">
        <label class="form-label col-2"><span class="c-red">*</span>欢迎标题</label>
        <div class="formControls col-5">
            <input type="text" class="input-text" value="{{$content->welcome_title}}" placeholder="" name="welcome_title" datatype="*" nullmsg="名称不能为空">
        </div>
        <div class="col-4"> </div>
    </div>
    <div class="row cl">
        <label class="form-label col-2">欢迎内容：</label>
        <div class="formControls col-8">
            <script name="editor2" id="editor2" type="text/plain" style="width:100%; height:200px;">{!! $content->welcome_content !!}</script>
        </div>
    </div>
    <div class="row cl">
        <label class="form-label col-2"><span class="c-red">*</span>欢迎按钮名</label>
        <div class="formControls col-5">
            <input type="text" class="input-text" value="{{$content->welcome_button}}" placeholder="" name="welcome_button" datatype="*" nullmsg="名称不能为空">
        </div>
        <div class="col-4"> </div>
    </div>

    <div class="row cl">
        <label class="form-label col-2"><span class="c-red">*</span>我们的服务</label>
        <div class="formControls col-5">
            <input type="text" class="input-text" value="{{$content->service_title}}" placeholder="" name="service_title" datatype="*" nullmsg="名称不能为空">
        </div>
        <div class="col-4"> </div>
    </div>
    <div class="row cl">
        <label class="form-label col-2"><span class="c-red">*</span>资讯题目</label>
        <div class="formControls col-5">
            <input type="text" class="input-text" value="{{$content->news_title}}" placeholder="" name="news_title" datatype="*" nullmsg="名称不能为空">
        </div>
        <div class="col-4"> </div>
    </div>
    <div class="row cl">
        <label class="form-label col-2"><span class="c-red">*</span>商店标题</label>
        <div class="formControls col-5">
            <input type="text" class="input-text" value="{{$content->shop_title}}" placeholder="" name="shop_title" datatype="*" nullmsg="名称不能为空">
        </div>
        <div class="col-4"> </div>
    </div>
    <div class="row cl">
        <label class="form-label col-2"><span class="c-red">*</span>商店小标题</label>
        <div class="formControls col-5">
            <input type="text" class="input-text" value="{{$content->shop_title2}}" placeholder="" name="shop_title2" datatype="*" nullmsg="名称不能为空">
        </div>
        <div class="col-4"> </div>
    </div>
    <div class="row cl">
        <label class="form-label col-2"><span class="c-red">*</span>商店简介</label>
        <div class="formControls col-5">
            <input type="text" class="input-text" value="{{$content->shop_content}}" placeholder="" name="shop_content" datatype="*" nullmsg="名称不能为空">
        </div>
        <div class="col-4"> </div>
    </div>
    <div class="row cl">
        <label class="form-label col-2"><span class="c-red">*</span>商店按钮名</label>
        <div class="formControls col-5">
            <input type="text" class="input-text" value="{{$content->shop_button}}" placeholder="" name="shop_button" datatype="*" nullmsg="名称不能为空">
        </div>
        <div class="col-4"> </div>
    </div>
    <div class="row cl">
        <label class="form-label col-2"><span class="c-red">*</span>商店链接地址</label>
        <div class="formControls col-5">
            <input type="text" class="input-text" value="{{$content->shop_url}}" placeholder="" name="shop_url" datatype="*" nullmsg="名称不能为空">
        </div>
        <div class="col-4"> </div>
    </div>
    <div class="row cl">
        <div class="col-8 col-offset-2">
            <input style="margin: 20px 0; width: 200px;" class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
        </div>
    </div>
</form>

@endsection

@section('my-js')

<script type="text/javascript">
    var ue = UE.getEditor('editor');
    ue.execCommand("getlocaldata");

    var ue2 = UE.getEditor('editor2');
    ue2.execCommand("getlocaldata");

  $("#form-content-edit").Validform({
    tiptype:2,
    callback:function(form){
      $('#form-content-edit').ajaxSubmit({
          type: 'post', // 提交方式 get/post
          url: 'service/editHomeContent', // 需要提交的 url
          dataType: 'json',
          data: {
            id: "{{$content->id}}",
            summary_title: $('input[name=summary_title]').val(),
            welcome_title: $('input[name=welcome_title]').val(),
            summary_content: ue.getContent(),
            welcome_content: ue2.getContent(),
            welcome_button: $('input[name=welcome_button]').val(),
            service_title: $('input[name=service_title]').val(),
            news_title: $('input[name=news_title]').val(),
            shop_title: $('input[name=shop_title]').val(),
            shop_title2: $('input[name=shop_title2]').val(),
            shop_content: $('input[name=shop_content]').val(),
            shop_button: $('input[name=shop_button]').val(),
            shop_url: $('input[name=shop_url]').val(),
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

            layer.msg(data.message, {icon:1, time:2000});
  					parent.location.reload();
          },
          error: function(xhr, status, error) {
            console.log(xhr);
            console.log(status);
            console.log(error);
            layer.msg('ajax error', {icon:2, time:2000});
          },
          beforeSend: function(xhr){
            layer.load(0, {shade: false});
          },
        });

        return false;
    }
  });

</script>
@endsection