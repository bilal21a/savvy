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
                    Subscribers
                </h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="subscribers">
                    <thead>
                        <tr>
                            <th style="max-width: 5%;">Id</th>
                            <th style="max-width: 95%;">Email</th>
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
    loadSubscribers();
    function loadSubscribers(){
        $('#subscribers').DataTable().destroy();
        $('#subscribers').DataTable({
            ajax: '{{route("subscribers.listing")}}',
            deferRender: true,
            order: [[0, 'desc']],
        });
    }
</script>
@endsection
