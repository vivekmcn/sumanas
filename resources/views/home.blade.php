@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Products') }}</div>

                <div class="card-body">
                    <table class="table table-striped" id="products">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var slno= 0;
    var view = "{{ route('product.view',['id'=>'__id']) }}";
    var bannersdatatable = $("#products").DataTable({
    "pageLength": 25,
    "responsive": true,
    "serverSide": true,
    "ordering": true,
    "aaSorting": [],
    "processing": true,
    "order": [[0, "desc"]],
    "columnDefs": [
        { orderable: false, targets: [0] },
        { "width": "5%", "targets": 0, className: "text-center" },
    ],
    "language": {
        "searchPlaceholder": 'Search...',
        "sSearch": '',
        "infoFiltered": " ",
        'loadingRecords': '&nbsp;',
        'processing': ''
    },
    "ajax": {
        "url": "{{ route('products.paginate') }}",
        "type": "post",
        "data": function (data) {
            data._token = "{{ csrf_token() }}";
            return data;
        }
    },
    "AutoWidth": false,
    "columns": [
        { "data": "slno", name: "slno", 'render': function(data, type, row){
                return ++slno;
            } 
        },
        { "data": "name"},
        {
            "data": "status", "name": "status", "render": function (data, type, row) {
                if(row.status==1)
                {
                    return "Active";
                }else{
                    return "Inactive";
                }
            }
        },
        {
            "data": "action", "name": "action", "render": function (data, type, row) {
                var action = "";
                action = "<a class='btn btn-primary' href='"+view.replace("__id",row.id)+"'><i class='fa fa-eye'></i> View</a>";
                return action;
            }
        }
    ],
    "fnCreatedRow": function (nRow, aData, iDataIndex) {
        //loadingShow();
        var info = this.dataTable().api().page.info();
        var page = info.page;
        var length = info.length;
        var index = (page * length + (iDataIndex + 1));
        $('td:eq(0)', nRow).html(index).addClass('text-center');
    },
    "fnDrawCallback": function (oSettings) {
        var info = this.dataTable().api().page.info();
        var totalRecords = info.recordsDisplay;
    }
});
</script>
@endsection
