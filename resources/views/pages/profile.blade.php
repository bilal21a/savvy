@extends("master")
@section("css")
@endsection
@section("content")
<div class="row">
    <div class="col-md-6 offset-md-3">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">User Information</h4>
            </div>
            <div class="card-body">
                <form action="{{url("update-user-request")}}" method="post">
                    @csrf
                    <div class="row gy-4">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basiInput" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" value="{{auth()->user()->name}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basiInput" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" disabled value="{{auth()->user()->email}}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="d-flex align-items-start gap-3 mt-4">
                                <button type="submit" class="btn btn-success btn-label right ms-auto nexttab nexttab" data-nexttab="pills-info-desc-tab"><i class="ri-arrow-right-line label-icon align-middle fs-16 ms-2"></i>Update Information</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-6 offset-md-3">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">User Credentials</h4>
            </div>
            <div class="card-body">
                <form action="{{url("update-user-password-request")}}" method="post">
                    @csrf
                    <div class="row gy-4">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="basiInput" class="form-label">Current Password</label>
                                <input type="password" class="form-control" name="current_password" value="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basiInput" class="form-label">New Password</label>
                                <input type="password" class="form-control" name="new_password" value="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basiInput" class="form-label">Retype Password</label>
                                <input type="password" class="form-control" name="new_password_confirmation" value="">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="d-flex align-items-start gap-3 mt-4">
                                <button type="submit" class="btn btn-success btn-label right ms-auto nexttab nexttab" data-nexttab="pills-info-desc-tab"><i class="ri-arrow-right-line label-icon align-middle fs-16 ms-2"></i>Update Password</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section("js")
@endsection
