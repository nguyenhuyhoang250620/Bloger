@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Xin chào</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('searched.create') }}"> tạo mới product</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

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
