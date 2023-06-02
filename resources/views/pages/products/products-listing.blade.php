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
                    Products
                    <a class="btn btn-sm btn-primary" style="float: right;" href="{{url("products/create")}}">Add new Product</a>
                </h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="productsTable">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Slug</th>
                            <th>Type</th>
                            <th>Category</th>
                            <th>Section</th>
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
    loadProducts();
    function loadProducts(){
        $('#productsTable').DataTable().destroy();
        $('#productsTable').DataTable({
            ajax: '{{route("products.listing")}}',
            deferRender: true,
            order: [[0, 'desc']],
        });
    }
    function updateProductStatus(id,status){
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
                    url: "{{route('product.update.status')}}",
                    data: {
                        id : id,
                        status : status,
                        _token : "{{csrf_token()}}"
                    },
                    success: function (response) {
                        swal("Status Updated!", "Product is "+status+" now.", "success").then((value) => {
                            loadProducts();
                        });
                    }
                });
            }
        });
    }
    function deleteProduct(id){
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this product!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: "delete",
                    url: "{{url('products')}}/"+id,
                    data: {
                        _token : "{{csrf_token()}}"
                    },
                    success: function (response) {
                        swal("Deleted!", "Product has been deleted successfully.", "success").then((value) => {
                            loadProducts();
                        });
                    }
                });
            }
        });
    }
</script>
@endsection
