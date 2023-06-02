@extends("master")
@section("css")
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
<style>
    .ck-editor__editable { min-height: 300px; }
    .upload-image-button { width: 100px; height: 100px; display: flex; border: solid 1px lightgrey; align-items: center; justify-content: center; }
    .upload-image-button:hover { cursor: pointer; background-color: #d3d3d375; }
</style>
@endsection
@section("content")
<form action="{{route("products.update",$product->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex align-items-start gap-3 mb-3">
                <button type="submit" class="btn btn-success btn-label right ms-auto nexttab nexttab" data-nexttab="pills-info-desc-tab"><i class="ri-arrow-right-line label-icon align-middle fs-16 ms-2"></i>Update Product</button>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Edit Product</h4>
                </div>
                <div class="card-body">
                    <input type="hidden" name="id" value="{{$product->id}}">
                    <div class="row gy-4">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basiInput" class="form-label">Title</label>
                                <input type="text" class="form-control" name="title" value="{{$product->title}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basiInput" class="form-label">Slug</label>
                                <input type="text" class="form-control" name="slug" value="{{$product->slug}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basiInput" class="form-label">Category</label>
                                <select name="sub_category_id" class="form-select">
                                    @foreach ($sub_categories as $category)
                                        <option {{($product->sub_category_id == $category->id)?"selected":""}} value="{{$category->id}}">{{$category->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basiInput" class="form-label">Section <small>(Optional)</small></label>
                                <select name="section_id" class="form-select">
                                    <option value="">Select Section</option>
                                    @foreach ($sections as $section)
                                        <option {{($product->section_id == $section->id)?"selected":""}} value="{{$section->id}}">{{$section->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="basiInput" class="form-label">Amount</label>
                                <input type="text" class="form-control" name="amount" value="{{$product->amount}}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="basiInput" class="form-label">Discount</label>
                                <input type="text" class="form-control" name="discount" value="{{$product->discount}}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="basiInput" class="form-label">Type</label>
                                <select name="type" class="form-select">
                                    <option {{($product->type=="")?"selected":""}} value="">Simple</option>
                                    <option {{($product->type=="top")?"selected":""}} value="top">Top</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="basiInput" class="form-label">Color <small>(Optional)</small></label>
                                @php
                                    $selectedColors = !empty($product->colors)?explode(",",$product->colors):[];
                                @endphp
                                <div style="display: flex; flex-wrap: wrap; gap: 0;">
                                    @if (count($colors) < 1)
                                        No color added yet!
                                    @endif
                                    @foreach ($colors as $key => $color)
                                        <div class="form-check">
                                            <input name="colors[]" id="color{{$key}}" type="checkbox" {{(in_array($color->color,$selectedColors))?"checked":""}} value="{{$color->color}}">
                                            <label style="background-color: {{$color->color}}; padding: 0 5px; color: white; border: solid 1px lightgrey; text-shadow: 0 0 20px black;" for="color{{$key}}">{{$color->name}}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea id="description" name="description" class="form-control" rows="10">{{$product->description}}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check form-switch form-switch-lg" style="padding-left: 15px;" dir="ltr">
                                <input type="checkbox" class="form-check-input" id="customSwitchsizelg" {{($product->status=="published")?"checked":""}} style="margin-left: 0;" name="status" value="published">
                                <label class="form-check-label" for="customSwitchsizelg">Publish/ Draft Product</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Links (to scrap)</h4>
                </div>
                <div class="card-body">
                    <div class="row gy-4">
                        @foreach ($product->links as $key => $link)
                            <div class="col-md-12 d-flex btn-group links-box {{($key>0)?"mt-1":""}}">
                                <input name="links[]" type="text" class="form-control" placeholder="Enter external link of product like amazon" value="{{$link->links}}">
                                <button type="button" class="btn btn-sm btn-primary add-link"><i class="las la-plus"></i></button>
                                @if ($key > 0)
                                    <button type="button" class="btn btn-sm btn-danger remove-link"><i class="las la-minus"></i></button>
                                @endif
                            </div>
                        @endforeach
                        @if (count($product->links) < 1)
                            <div class="col-md-12 d-flex btn-group links-box">
                                <input name="links[]" type="text" class="form-control" placeholder="Enter external link of product like amazon">
                                <button type="button" class="btn btn-sm btn-primary add-link"><i class="las la-plus"></i></button>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Images</h4>
                </div>
                <div class="card-body">
                    <div class="row gy-4">
                        <div class="col-md-12 d-flex flex-wrap gap-2">
                            @foreach ($product->images as $file)
                                <div style="position: relative;">
                                    <a onclick="deleteImage(this,{{$file->id}})" style="position: absolute; right: 0; top: 0; line-height: 1;" href="javascript:void(0)"><i style="font-size: 30px; text-shadow: 0 0 10px white; color: black;" class="ri-close-line"></i></a>
                                    <label class="upload-image-button p-0 m-0">
                                        <img style="width: 100%; height: 100%;" src="{{url("storage/".$file->image)}}" alt="">
                                    </label>
                                </div>
                            @endforeach
                            <label class="upload-image-button p-0 m-0 add-upload-image-option">
                                <i style="font-size: 40px;" class="las la-plus"></i>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="d-flex align-items-start gap-3 mb-3">
                <button type="submit" class="btn btn-success btn-label right ms-auto nexttab nexttab" data-nexttab="pills-info-desc-tab"><i class="ri-arrow-right-line label-icon align-middle fs-16 ms-2"></i>Update Product</button>
            </div>
        </div>
    </div>
</form>
@endsection
@section("js")
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
<script src="{{asset("/")}}public/assets/js/sweetalert.min.js"></script>
<script>
    $(".select2").select2();
    ClassicEditor.create( document.querySelector( '#description' ) ).catch( error => {
        console.error( error );
    });
    $(document).on("click",".add-link", function () {
        $(this).parent().after(`
            <div class="col-md-12 d-flex btn-group links-box mt-1">
                <input name="links[]" type="text" class="form-control" placeholder="Enter external link of product like amazon">
                <button type="button" class="btn btn-sm btn-primary add-link"><i class="las la-plus"></i></button>
                <button type="button" class="btn btn-sm btn-danger remove-link"><i class="las la-minus"></i></button>
            </div>
        `);
    });
    $(document).on("click",".remove-link,.remove-upload-image-option", function () {
        $(this).parent().remove();
    });
    $(document).on("click",".add-upload-image-option", function () {
        $(this).before(`
            <div style="position: relative;">
                <a class="remove-upload-image-option" style="position: absolute; right: 0; top: 0; line-height: 1;" href="javascript:void(0)"><i style="font-size: 30px; text-shadow: 0 0 10px white; color: black;" class="ri-close-line"></i></a>
                <label class="upload-image-button p-0 m-0">
                    <input onchange="loadFile(this,event)" type="file" style="display: none;" name="images[]">
                    <i style="font-size: 40px;" class="las la-cloud-upload-alt text-primary"></i>
                </label>
            </div>
        `);
    });
    var loadFile = function(me,event) {
        let myElement = $(me);
        var reader = new FileReader();
        reader.onload = function(){
            myElement.parent().after(`
                <label class="upload-image-button p-0 m-0">
                    <img style="width: 100%; height: 100%;" src="`+reader.result+`" alt="">
                </label>
            `);
            myElement.parent().css("display","none");
        };
        reader.readAsDataURL(event.target.files[0]);
    };
    function deleteImage(me,id){
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this image!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $(me).parent().remove();
                $.ajax({
                    type: "post",
                    url: "{{route('product.delete.image')}}",
                    data: {
                        id : id,
                        _token : "{{csrf_token()}}"
                    },
                    success: function (response) {
                        swal("Deleted","Image has been successfully deleted!","success");
                    }
                });
            }
        });
    }
</script>
@endsection
