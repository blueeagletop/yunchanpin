@extends('admin.master')

@section('title','添加首页导航')

@section('content')

    <form action="" method="post" class="form form-horizontal" id="form-webTemplet-add">
        {{ csrf_field() }}
        <div class="row cl">
            <label class="form-label col-2"><span class="c-red">*</span>模板名字：</label>
            <div class="formControls col-5">
                <input type="text" class="input-text" value="{{$webTemplet->name}}" placeholder="" id="title" name="name">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-2"><span class="c-red">*</span>预览图：</label>
            <div class="formControls col-5">
                <input type="text" class="input-text" value="{{$webTemplet->img}}" placeholder="" id="url" name="img">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-2"><span class="c-red">*</span>简介：</label>
            <div class="formControls col-5">
                <input type="text" class="input-text" value="{{$webTemplet->summary}}" placeholder="" id="title" name="summary">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-2"><span class="c-red">*</span>编号：</label>
            <div class="formControls col-5">
                <input type="text" class="input-text" value="{{$webTemplet->number}}" placeholder="" id="title" name="number">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-2"><span class="c-red">*</span>现价：</label>
            <div class="formControls col-5">
                <input type="text" class="input-text" value="{{$webTemplet->price}}" placeholder="" id="title" name="price">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-2"><span class="c-red">*</span>原价：</label>
            <div class="formControls col-5">
                <input type="text" class="input-text" value="{{$webTemplet->worth}}" placeholder="" id="title" name="worth">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-2"><span class="c-red">*</span>预览链接：</label>
            <div class="formControls col-5">
                <input type="text" class="input-text" value="{{$webTemplet->url}}" placeholder="" id="title" name="url">
            </div>
        </div>

<!--        <div class="row cl">
            <label class="form-label col-2"><span class="c-red">*</span>是否发布：</label>
            <div class="formControls col-5 skin-minimal">
                <div class="radio-box">
                    <input name="status" type="radio" id="1" checked>
                    <label for="1">发布</label>
                </div>
                <div class="radio-box">
                    <input type="radio" id="0" name="status">
                    <label for="0">储存至草稿，暂不发布</label>
                </div>
            </div>
        </div>-->

        <div class="row cl">
            <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
                <input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
            </div>
        </div>
    </form>

@endsection

@section('my-js')
<script type="text/javascript">

    $("#form-webTemplet-add").Validform({
        tiptype: 2,
        callback: function (form) {
            // form[0].submit();
            // var index = parent.layer.getFrameIndex(window.name);
            // parent.$('.btn-refresh').click();
            // parent.layer.close(index);
            $('#form-webTemplet-add').ajaxSubmit({
                type: 'post', // 提交方式 get/post
                url: 'service/editWebTemplet', // 需要提交的 url
                dataType: 'json',
                data: {
                    id: "{{$webTemplet->id}}",
                    name: $('input[name=name]').val(),
                    img: $('input[name=img]').val(),
                    number: $('input[name=number]').val(),
                    summary: $('input[name=summary]').val(),
                    pricce: $('input[name=price]').val(),
                    worth: $('input[name=worth]').val(),
                    url: $('input[name=url]').val(),
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

                    layer.msg(data.message, {icon: 1, time: 3000});
                    parent.location.reload();
                },
                error: function (xhr, status, error) {
                    console.log(xhr);
                    console.log(status);
                    console.log(error);
                    layer.msg('ajax error', {icon: 2, time: 2000});
                },
                beforeSend: function (xhr) {
                    layer.load(0, {shade: false});
                },
            });

            return false;
        }
    });
</script>
@endsection