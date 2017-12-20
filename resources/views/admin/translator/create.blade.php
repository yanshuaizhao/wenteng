@extends('admin.layouts.base')
@section('title', '后台管理添加译者')

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
                            <form class="form-horizontal" role="form" enctype="multipart/form-data" method="POST" action="/admin/translator">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="cove_image"/>
                                @include('admin.translator.form')
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
                if($("#name").val().length<1){
                    alert("请填写译者姓名");
                    return false;
                }
                if(!$("#sex").val().length){
                    alert("请选择性别");
                    return false;
                }
                if(!$("#zone_id").val().length){
                    alert("请选择服务地区");
                    return false;
                }
                if(!$("#marriage").val().length){
                    alert("请选择性别");
                    return false;
                }
                if(!$("#present_address").val().length){
                    alert("请填写现住地址");
                    return false;
                }
                if(!$("#work_time").val().length){
                    alert("请填写工作时间");
                    return false;
                }

            })
        })
    </script>
@endsection