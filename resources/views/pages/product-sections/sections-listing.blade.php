@extends("master")
@section("css")
<link rel="stylesheet" href="{{asset("/")}}public/assets/css/dataTables.bootstrap5.min.css" />
<link rel="stylesheet" href="{{asset("/")}}public/assets/css/responsive.bootstrap.min.css" />
<link rel="stylesheet" href="{{asset("/")}}public/assets/css/buttons.dataTables.min.css">
@endsection
@section("content")
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">
                    Sections
                    <a class="btn btn-sm btn-primary" style="float: right;" href="{{url("product-sections/create")}}">Add new Section</a>
                </h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="sections">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section("js")
<script src="{{asset("/")}}public/assets/js/jquery.dataTables.min.js"></script>
<script src="{{asset("/")}}public/assets/js/dataTables.bootstrap5.min.js"></script>
<script src="{{asset("/")}}public/assets/js/dataTables.responsive.min.js"></script>
<script src="{{asset("/")}}public/assets/js/dataTables.buttons.min.js"></script>
<script src="{{asset("/")}}public/assets/js/pages/datatables.init.js"></script>
<script src="{{asset("/")}}public/assets/js/sweetalert.min.js"></script>
<script>
    loadSections();
    function loadSections(){
        $('#sections').DataTable().destroy();
        $('#sections').DataTable({
            ajax: '{{route("product.sections.listing")}}',
            deferRender: true,
            order: [[0, 'desc']],
        });
    }
    function deleteSection(id){
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this section!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: "delete",
                    url: "{{url('product-sections')}}/"+id,
                    data: {
                        _token : "{{csrf_token()}}"
                    },
                    success: function (response) {
                        swal("Deleted!", "Section has been deleted successfully.", "success").then((value) => {
                            loadSections();
                        });
                    }
                });
            }
        });
    }
</script>
@endsection
