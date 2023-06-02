@extends("master")
@section("css")
@endsection
@section("content")
<div class="row">
    <div class="col-md-6 offset-md-3">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Add Category</h4>
            </div>
            <div class="card-body">
                <form action="{{route("product-categories.store")}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row gy-4">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basiInput" class="form-label">Title</label>
                                <input type="text" class="form-control" name="title" value="{{old("title")}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basiInput" class="form-label">Slug</label>
                                <input type="text" class="form-control" name="slug" value="{{old("slug")}}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="basiInput" class="form-label">Image</label>
                                <input type="file" class="form-control" name="category_image" value="">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="basiInput" class="form-label">Type</label>
                                <select name="type" class="form-select">
                                    <option value="">Simple</option>
                                    <option value="top">Top</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-check form-switch form-switch-lg" style="padding-left: 15px;" dir="ltr">
                                <input type="checkbox" class="form-check-input" id="customSwitchsizelg" style="margin-left: 0;" name="status" value="published">
                                <label class="form-check-label" for="customSwitchsizelg">Publish/ Draft Category</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="d-flex align-items-start gap-3 mt-4">
                                <button type="submit" class="btn btn-success btn-label right ms-auto nexttab nexttab" data-nexttab="pills-info-desc-tab"><i class="ri-arrow-right-line label-icon align-middle fs-16 ms-2"></i>Add Category</button>
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
