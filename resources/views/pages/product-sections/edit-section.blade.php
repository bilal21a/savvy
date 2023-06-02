@extends("master")
@section("css")
@endsection
@section("content")
<div class="row">
    <div class="col-md-6 offset-md-3">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Edit Section</h4>
            </div>
            <div class="card-body">
                <form action="{{route("product-sections.update",$section->id)}}" method="post">
                    @csrf
                    @method('put')
                    <input type="hidden" name="id" value="{{$section->id}}">
                    <div class="row gy-4">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basiInput" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" value="{{$section->name}}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="d-flex align-items-start gap-3 mt-4">
                                <button type="submit" class="btn btn-success btn-label right ms-auto nexttab nexttab" data-nexttab="pills-info-desc-tab"><i class="ri-arrow-right-line label-icon align-middle fs-16 ms-2"></i>Update Section</button>
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
