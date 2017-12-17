@extends('admin.layouts.base')
@section('title', '后台管理账号列表')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">

                    {{--<h3 class="box-title">Hover Data Table</h3>--}}
                    <div class="col-md-10"></div>
                    <div class="col-md-2 text-right">
                        <a href="/admin/article/create" class="btn btn-success btn-md">
                            <i class="fa fa-plus-circle"></i> 添加文章
                        </a>
                    </div>

                </div>

                <!-- /.box-header -->
                <div class="box-body">
                    <table id="admin-users-list" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>类别</th>
                            <th>标题</th>
                            <th data-sortable="false">简介</th>
                            <th data-sortable="false">图片地址</th>
                            <th>状态</th>
                            <th>创建日期</th>
                            <th>修改日期</th>
                            <th data-sortable="false">操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </div>
        <!-- /.col -->
    </div>
    <div class="modal fade" id="modal-delete" tabIndex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        ×
                    </button>
                    <h4 class="modal-title">提示</h4>
                </div>
                <div class="modal-body">
                    <p class="lead">
                        <i class="fa fa-question-circle fa-lg"></i>
                        确认要删除这个用户吗?
                    </p>
                </div>
                <div class="modal-footer">
                    <form class="deleteForm" method="POST" action="">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                        <button type="submit" class="btn btn-danger">
                            <i class="fa fa-times-circle"></i>确认
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(function () {
            var table = $("#admin-users-list").DataTable({
                language: {
                    "sProcessing": "处理中...",
                    "sLengthMenu": "显示 _MENU_ 项结果",
                    "sZeroRecords": "没有匹配结果",
                    "sInfo": "显示第 _START_ 至 _END_ 项结果，共 _TOTAL_ 项",
                    "sInfoEmpty": "显示第 0 至 0 项结果，共 0 项",
                    "sInfoFiltered": "(由 _MAX_ 项结果过滤)",
                    "sInfoPostFix": "",
                    "sSearch": "搜索:",
                    "sUrl": "",
                    "sEmptyTable": "表中数据为空",
                    "sLoadingRecords": "载入中...",
                    "sInfoThousands": ",",
                    "oPaginate": {
                        "sFirst": "首页",
                        "sPrevious": "上页",
                        "sNext": "下页",
                        "sLast": "末页"
                    },
                    "oAria": {
                        "sSortAscending": ": 以升序排列此列",
                        "sSortDescending": ": 以降序排列此列"
                    }
                },
                order: [[1, "desc"]],
                serverSide: true,
                ajax: {
                    url: '/admin/article/index',
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                },
                "columns": [
                    {"data": "id"},
                    {
                        "data":"type",
                        render: function(data, type, row, meta) {
                            //type 的值  dispaly sort filter
                            //代表，是显示类型的时候判断值的长度是否超过8，如果是则截取
                            //这里只处理了类型是显示的，过滤和排序返回原始数据
                            if (type === 'display') {
                                data = row['type_name'];
                            }
                            return data;
                        }
                    },
                    {"data": "title"},
                    {"data": "desc"},
                    {"data": "img"},
                    {"data": "status"},
                    {
                        "data": "ctime",
                        render: function(data, type, row, meta) {
                            if (type === 'display') {
                                data = row['ctime_date'];
                            }
                            return data;
                        }
                    },
                    {
                        "data": "utime",
                        render: function(data, type, row, meta) {
                            if (type === 'display') {
                                data = row['utime_date'];
                            }
                            return data;
                        }
                    },
                    {"data": "action"}
                ],
                columnDefs: [
                    {
                        'targets': -1,
                        "render": function (data, type, row) {
                            var row_edit = 1;
                            var row_delete = row['type']>0 ? 1 : 0;
                            var str = '';

                            //编辑
                            if (row_edit) {
                                str += '<a style="margin:3px;" href="/admin/article/' + row['id'] +'/edit" class="X-Small btn-xs text-success "><i class="fa fa-edit"></i> 编辑</a>';
                            }

                            //删除
                            if (row_delete) {
                                str += '<a style="margin:3px;" href="#" attr="' + row['id'] + '" class="del_item X-Small btn-xs text-danger"><i class="fa fa-times-circle"></i> 删除</a>';
                            }

                            return str;
                        }
                    }
                ]
            });

            table.on('preXhr.dt', function () {
                loadShow();
            });

            table.on('draw.dt', function () {
                loadFadeOut();
            });

            /*table.on('order.dt search.dt', function () {
                table.column(0, {search: 'applied', order: 'applied'}).nodes().each(function (cell, i) {
                    cell.innerHTML = i + 1;
                });
            }).draw();*/

            $("table").delegate('.del_item', 'click', function () {
                var id = $(this).attr('attr');
                $('.deleteForm').attr('action', '/admin/article/' + id);
                $("#modal-delete").modal();
            });

        });
    </script>
@endsection