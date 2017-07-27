@extends('admin.master')

@section('title','添加首页导航')

@section('content')

    <form action="" method="post" class="form form-horizontal" id="form-affiche-edit">
        {{ csrf_field() }}
        <div class="row cl">
            <label class="form-label col-2"><span class="c-red">*</span>标题：</label>
            <div class="formControls col-5">
                <input type="text" class="input-text" value="{{$affiche->title}}" placeholder="" id="title" name="title">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-2">置顶顺序：(从小到大)</label>
            <div class="formControls col-5">
                <input type="number" class="input-text" value="{{$affiche->top}}" placeholder="" id="url" name="top">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-2"><span class="c-red">*</span>注释：(只在后台显示)</label>
            <div class="formControls col-5">
                <input type="text" class="input-text" value="{{$affiche->comment}}" placeholder="" id="title" name="comment">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-2">详细内容：</label>
            <div class="formControls col-8">
                <script name="editor" id="editor" type="text/plain" style="width:100%; height:500px;">{!! $affiche_detail->detail !!}</script>
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
                <input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;修改&nbsp;&nbsp;">
            </div>
        </div>
    </form>

@endsection

@section('my-js')
<script type="text/javascript">
    var ue = UE.getEditor('editor');
    ue.execCommand("getlocaldata");

    $("#form-affiche-edit").Validform({
        tiptype: 2,
        callback: function (form) {
            // form[0].submit();
            // var index = parent.layer.getFrameIndex(window.name);
            // parent.$('.btn-refresh').click();
            // parent.layer.close(index);
            $('#form-affiche-edit').ajaxSubmit({
                type: 'post', // 提交方式 get/post
                url: 'service/editAffiche', // 需要提交的 url
                dataType: 'json',
                data: {
                    id:"{{$affiche->id}}",
                    title: $('input[name=title]').val(),
                    top: $('input[name=top]').val(),
                    comment: $('input[name=comment]').val(),
//                    status: $('input[name=status]').val(),
                    detail: ue.getContent(),
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