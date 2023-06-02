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
                    Messages
                </h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="messages">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div id="messageModal" class="modal" tabindex="-1">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header" style="border-bottom: solid 1px lightgrey; padding-bottom: 10px;">
          <h5 class="modal-title">Message</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <iframe style="width: 100%; height: 80vh; padding: 10px;" src="" frameborder="0"></iframe>
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
    loadMessages();
    function loadMessages(){
        $('#messages').DataTable().destroy();
        $('#messages').DataTable({
            ajax: '{{route("contact.messages.listing")}}',
            deferRender: true,
            order: [[0, 'desc']],
        });
    }
    function deleteMessage(id){
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this message!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: "post",
                    url: "{{url('destroy-contact-message')}}",
                    data: {
                        id : id,
                        _token : "{{csrf_token()}}"
                    },
                    success: function (response) {
                        swal("Deleted!", "Message has been deleted successfully.", "success").then((value) => {
                            loadMessages();
                        });
                    }
                });
            }
        });
    }
    function openMessage(id){
        $("#messageModal").find("iframe").attr("src","{{url('view-contact-message')}}/"+id);
        $("#messageModal").modal("show");
    }
</script>
@endsection
