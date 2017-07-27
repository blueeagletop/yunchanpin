@extends('admin.master')

@section('title','添加分类')

@section('content')

<article class="page-container">
	<form action="" method="post"  class="form form-horizontal" id="form-category-add">
            {{ csrf_field() }}
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>订单标题</label>
		<div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" style="width: 50%" value="" placeholder="" name="title">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>订单分类</label>
		<div class="formControls col-xs-8 col-sm-9"> <span class="select-box" style="width:150px;">
			<select class="select" name="category_id" size="1">
                                @foreach($categories as $cate)
                                <option value="{{$cate->id}}" >{{$cate->name}}</option>
                                @endforeach
			</select>
			</span> 
                </div>
	</div>
        <div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>订单用户名</label>
		<div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" style="width: 50%" value="" placeholder="" name="username">
		</div>
	</div>
            <div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>对应的淘宝编号</label>
		<div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" style="width: 50%" value="" placeholder="" name="order_number">
		</div>
	</div>
            <div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>订单状态</label>
		<div class="formControls col-xs-8 col-sm-9"> <span class="select-box" style="width:150px;">
			<select class="select" name="status" size="1">
				<option value="0">开发中</option>
                                <option value="1" >上线</option>
                                <option value="2" >下架</option>
			</select>
			</span> 
                </div>
	</div>
            <div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>订单开始时间</label>
		<div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" style="width: 50%" value="" placeholder="" name="star_time">
		</div>
	</div>
            <div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>订单结束时间</label>
		<div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" style="width: 50%" value="" placeholder="" name="end_time">
		</div>
	</div>
            <div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>订单验证码</label>
		<div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" style="width: 50%" value="" placeholder="" name="code">
		</div>
	</div>
	<div class="row cl">
		<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
			<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
		</div>
	</div>
	</form>
</article>

@endsection

@section('my-js')
<script type="text/javascript">
  $("#form-category-add").Validform({
    tiptype:2,
    callback:function(form){
      // form[0].submit();
      // var index = parent.layer.getFrameIndex(window.name);
      // parent.$('.btn-refresh').click();
      // parent.layer.close(index);
      $('#form-category-add').ajaxSubmit({
          type: 'post', // 提交方式 get/post
          url: 'service/addOrder', // 需要提交的 url
          dataType: 'json',
          data: {
            title: $('input[name=title]').val(),
            username:$('input[name=usename]').val(),
            category_id: $('select[name=category_id] option:selected').val(),
            order_number: $('input[name=order_number]').val(),
            status:$('select[name=status] option:selected').val(),
            start_time: $('input[name=start_time]').val(),
            end_time: $('input[name=end_time]').val(),
            code:$('input[name=code]').val(),
//            preview: ($('#preview_id').attr('src')!='images/icon-add.png'?$('#preview_id').attr('src'):''),
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