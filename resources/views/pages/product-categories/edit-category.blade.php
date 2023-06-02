@extends("master")
@section("css")
@endsection
@section("content")
<div class="row">
    <div class="col-md-6 offset-md-3">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Edit Category</h4>
            </div>
            <div class="card-body">
                <form action="{{route("product-categories.update",$category->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <input type="hidden" name="id" value="{{$category->id}}">
                    <div class="row gy-4">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basiInput" class="form-label">Title</label>
                                <input type="text" class="form-control" name="title" value="{{$category->title}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basiInput" class="form-label">Slug</label>
                                <input type="text" class="form-control" name="slug" value="{{$category->slug}}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group text-center">
                                @if (!empty($category->category_image))
                                    <img onerror="this.onerror=null;this.src='{{asset('public/assets/images/empty.jpg')}}';" style="max-height: 200px; width: auto; margin: auto;" src="{{asset("storage/".$category->category_image)}}" alt="{{$category->title}}"/>
                                @endif
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
                                    <option {{($category->type=="")?"selected":""}} value="">Simple</option>
                                    <option {{($category->type=="top")?"selected":""}} value="top">Top</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-check form-switch form-switch-lg" style="padding-left: 15px;" dir="ltr">
                                <input type="checkbox" class="form-check-input" id="customSwitchsizelg" {{($category->status=="published")?"checked":""}} style="margin-left: 0;" name="status" value="published">
                                <label class="form-check-label" for="customSwitchsizelg">Publish/ Draft Category</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="d-flex align-items-start gap-3 mt-4">
                                <button type="submit" class="btn btn-success btn-label right ms-auto nexttab nexttab" data-nexttab="pills-info-desc-tab"><i class="ri-arrow-right-line label-icon align-middle fs-16 ms-2"></i>Update Category</button>
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
