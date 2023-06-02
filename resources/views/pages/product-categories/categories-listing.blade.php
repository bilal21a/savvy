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
                    Parent Categories
                    <a class="btn btn-sm btn-primary" style="float: right;" href="{{url("product-categories/create")}}">Add new Category</a>
                </h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="categories">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Slug</th>
                            <th>Type</th>
                            <th>Status</th>
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
    loadCategories();
    function loadCategories(){
        $('#categories').DataTable().destroy();
        $('#categories').DataTable({
            ajax: '{{route("product.categories.listing")}}',
            deferRender: true,
            order: [[0, 'desc']],
        });
    }
    function updateCategoryStatus(id,status){
        if(status=="published"){
            status = "draft";
        }else{
            status = "published";
        }
        swal({
            title: "Are you sure?",
            text: "If you change the status, it will update website!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: "post",
                    url: "{{route('product.categories.update.status')}}",
                    data: {
                        id : id,
                        status : status,
                        _token : "{{csrf_token()}}"
                    },
                    success: function (response) {
                        swal("Status Updated!", "Category is "+status+" now.", "success").then((value) => {
                            loadCategories();
                        });
                    }
                });
            }
        });
    }
    function deleteCategory(id){
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this category!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: "delete",
                    url: "{{url('product-categories')}}/"+id,
                    data: {
                        _token : "{{csrf_token()}}"
                    },
                    success: function (response) {
                        swal("Deleted!", "Category has been deleted successfully.", "success").then((value) => {
                            loadCategories();
                        });
                    }
                });
            }
        });
    }
</script>
@endsection
