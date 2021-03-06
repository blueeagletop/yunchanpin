@extends('admin.master')

@section('title','添加首页导航')

@section('content')

<article class="page-container">
    <form action="" method="post" class="form form-horizontal" id="form-nav-edit">
        {{ csrf_field() }}
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>导航标题：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="{{$nav->title}}" placeholder="" id="title" name="title">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>导航排序：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="{{$nav->compositor}}" placeholder="" id="compositor" name="compositor">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3">导航url：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="{{$nav->url}}" placeholder="" id="url" name="url">
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
    $("#form-nav-edit").Validform({
        tiptype: 2,
        callback: function (form) {
            // form[0].submit();
            // var index = parent.layer.getFrameIndex(window.name);
            // parent.$('.btn-refresh').click();
            // parent.layer.close(index);
            $('#form-nav-edit').ajaxSubmit({
                type: 'post', // 提交方式 get/post
                url: 'service/editHomeNav', // 需要提交的 url
                dataType: 'json',
                data: {
                    id: "{{$nav->id}}",
                    title: $('input[name=title]').val(),
                    compositor: $('input[name=compositor]').val(),
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

                    layer.msg(data.message, {icon: 1, time: 2000});
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