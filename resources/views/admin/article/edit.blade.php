@extends('admin.layouts.base')
@section('title', '后台管理文章修改')

@section('content')
    <div class="main animsition">
        <div class="container-fluid">

            <div class="row">
                <div class="">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">编辑操作</h3>
                        </div>
                        <div class="panel-body">
                            @include('admin.partials.errors')
                            @include('admin.partials.success')
                            <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="/admin/article/{{ $editData['id'] }}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="_method" value="PUT">
                                <input type="hidden" name="id" value="{{ $editData['id'] }}">
                                @include('admin.article.form')
                                <div class="form-group">
                                    <div class="col-md-7 col-md-offset-3">
                                        <button type="submit" class="btn btn-primary btn-md">
                                            <i class="fa fa-plus-circle"></i>
                                            保存
                                        </button>
                                    </div>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(function () {
            $(":submit").click(function () {
                if(!$("#type").val()){
                    alert("请选择类型");
                    return false;
                }
                if(!$("#title").val()){
                    alert("文章标题不能为空");
                    return false;
                }
                /*var options = {
                    url: "indexAjax.aspx",
                    target: "#div2",
                    success: function () {
                        alert("ajax请求成功");
                    }
                };*/
                //$("#form1").ajaxForm(options);
            })
        })
    </script>
@endsection