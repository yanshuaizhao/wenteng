@extends('admin.layouts.base')
@section('title', '后台管理-广告添加')

@section('content')
    <div class="main animsition">
        <div class="container-fluid">

            <div class="row">
                <div class="">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">添加操作</h3>
                        </div>
                        <div class="panel-body">

                            @include('admin.partials.errors')
                            @include('admin.partials.success')
                            <form class="form-horizontal" role="form" enctype="multipart/form-data" method="POST" action="/admin/ads">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="cove_image"/>
                                @include('admin.article.form')
                                <div class="form-group">
                                    <div class="col-md-7 col-md-offset-3">
                                        <button type="submit" class="btn btn-primary btn-md">
                                            <i class="fa fa-plus-circle"></i>
                                            添加
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
                    alert("广告标题不能为空");
                    return false;
                }
            })
        })
    </script>
@endsection