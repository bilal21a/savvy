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
                    Users
                    <a class="btn btn-sm btn-primary" style="float: right;" href="{{url("users/create")}}">Add new User</a>
                </h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="users">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
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
    loadUsers();
    function loadUsers(){
        $('#users').DataTable().destroy();
        $('#users').DataTable({
            ajax: '{{route("users.listing")}}',
            deferRender: true,
            order: [[0, 'desc']],
        });
    }
    function updateUserStatus(id,status){
        if(status=="enabled"){
            status = "disabled";
        }else{
            status = "enabled";
        }
        swal({
            title: "Are you sure?",
            text: "If you change the status, it will affect the user login!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: "post",
                    url: "{{route('users.update.status')}}",
                    data: {
                        id : id,
                        status : status,
                        _token : "{{csrf_token()}}"
                    },
                    success: function (response) {
                        swal("Status Updated!", "User status has been changed to "+status+".", "success").then((value) => {
                            loadUsers();
                        });
                    }
                });
            }
        });
    }
    function deleteUser(id){
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this user!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: "delete",
                    url: "{{url('users')}}/"+id,
                    data: {
                        _token : "{{csrf_token()}}"
                    },
                    success: function (response) {
                        swal("Status Updated!", "User has been deleted successfully.", "success").then((value) => {
                            loadUsers();
                        });
                    }
                });
            }
        });
    }
</script>
@endsection
