@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="center-block">
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('searched.create') }}"> Tạo Blog</a>
                </div>
                <div class="panel panel-primary" style="margin-left: 150px">
                    <div class="panel-heading">
                        <h3 class="panel-title">Tìm kiếm Blog</h3>
                    </div>
                    <div class="panel-body p-none">
                        <table class="table data-table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th class="no-sort" style="width: 5%;">#</th>
                                    <th style="width: 75%;">Tiêu đề</th>
                                    <th style="width: 20%%;">Ngày tạo</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        var oTable = $('.data-table').DataTable({
            "oLanguage": {
                "sLengthMenu": "Hiện _MENU_ Dòng",
                "sSearch": "",
                "sEmptyTable": "Không có dữ liệu",
                "sProcessing": '',
                "sZeroRecords": "Không tìm thấy dòng nào phù hợp",
                "sInfo": "Đang xem _START_ đến _END_ trong tổng số _TOTAL_ mục",
                "sInfoEmpty": "Đang xem 0 đến 0 trong tổng số 0 mục",
                "sInfoFiltered": "(được lọc từ _MAX_ mục)",
                "sInfoPostFix": "",
                "sUrl": ""
            },
            "processing": true,
            "serverSide": true,
            "bAutoWidth": false,
            "order": [
                [1, "desc"]
            ],
            "ajax": {
                "url": "{{ url('paging') }}",
                "dataType": "json",
                "type": "POST",
                data: function(d) {
                    d._token = "{{ csrf_token() }}";
                }
            },
            "columns": [{
                "data": "stt",
                "bSortable": false
            }, {
                "data": "title"
            }, {
                "data": "created_at"
            }]
        });
        oTable.on('draw.dt', function() {
            var info = oTable.page.info();
            oTable.column(0, {
                search: 'applied',
                order: 'applied',
                page: 'applied'
            }).nodes().each(function(cell, i) {
                cell.innerHTML = i + 1 + info.start;
            });
        });
    </script>
@endsection
