<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddProductCategoryRequest;
use App\Http\Requests\UpdateProductCategoryRequest;
use App\Models\ProductCategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use Intervention\Image\Facades\Image;

class ProductCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data["page_name"] = "Parent Categories";
        $data["breadcrumb"] = '<li class="breadcrumb-item active">Parent Categories</li>';
        return View::make("pages.product-categories.categories-listing",$data);
    }

    public function listing(){
        $categories = ProductCategories::get();
        $listing = [];
        foreach ($categories as $key => $category) {
            $statusButton = "btn-danger";
            if($category->status == "published"){
                $statusButton = "btn-primary";
            }
            $editCategoryUrl = route("product-categories.edit",$category->id);
            $listing[] = [
                $category->id,
                $category->title,
                $category->slug,
                ucwords($category->type??"simple"),
                '<button class="btn btn-sm '.$statusButton.'" onclick="updateCategoryStatus('.$category->id.','."'".$category->status."'".')">'.ucwords($category->status).'</button>',
                '<div class="btn-group"><a href="'.$editCategoryUrl.'" class="btn btn-sm btn-secondary">Edit</a><a onclick="deleteCategory('.$category->id.')" class="btn btn-sm btn-danger">Delete</a></div>'
            ];
        }
        return response()->json([
            "data" => $listing
        ]);
    }

    public function updateStatus(Request $request){
        $category = ProductCategories::find($request->id);
        $category->status = $request->status;
        $category->save();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data["page_name"] = "Add Category";
        $data["breadcrumb"] = '<li class="breadcrumb-item"><a href="'.url("product-categories").'">Parent Categories</a></li><li class="breadcrumb-item active">Add Category</li>';
        return View::make("pages.product-categories.add-category",$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddProductCategoryRequest $request)
    {
        $categories = new ProductCategories();
        $categories->title = $request->title;
        $categories->slug = $this->slugify($request->slug);
        $categories->status = $request->status??"draft";
        $categories->type = $request->type;
        $path = storage_path('app/category_image');
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        if ($request->hasFile('category_image')) {
            if ($categories->category_image && Storage::exists($categories->category_image)) {
                Storage::delete($categories->category_image);
            }
            $file = $request->file('category_image');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $image = Image::make($file->getRealPath())->orientate();
            $image->encode($file->getClientOriginalExtension(), 50);
            $image->save(storage_path('app/category_image/'.$filename));
            $categories->category_image = 'app/category_image/'.$filename;
        }
        $categories->save();
        return Redirect::to("product-categories")->with("success","Category has been added successfully.");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $category = ProductCategories::find($id);
        $data["page_name"] = "Edit Category";
        $data["breadcrumb"] = '<li class="breadcrumb-item"><a href="'.url("product-categories").'">Parent Categories</a></li><li class="breadcrumb-item active">Edit Category</li>';
        $data["category"] = $category;
        return View::make("pages.product-categories.edit-category",$data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = ProductCategories::find($id);
        $data["page_name"] = "Edit Category";
        $data["breadcrumb"] = '<li class="breadcrumb-item"><a href="'.url("product-categories").'">Parent Categories</a></li><li class="breadcrumb-item active">Edit Category</li>';
        $data["category"] = $category;
        return View::make("pages.product-categories.edit-category",$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, (new UpdateProductCategoryRequest($id))->rules());
        $categories = ProductCategories::find($id);
        $categories->title = $request->title;
        $categories->slug = $this->slugify($request->slug);
        $categories->status = $request->status??"draft";
        $categories->type = $request->type;
        $path = storage_path('app/category_image');
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        if ($request->hasFile('category_image')) {
            if ($categories->category_image && Storage::exists($categories->category_image)) {
                Storage::delete($categories->category_image);
            }
            $file = $request->file('category_image');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $image = Image::make($file->getRealPath())->orientate();
            $image->encode($file->getClientOriginalExtension(), 50);
            $image->save(storage_path('app/category_image/'.$filename));
            $categories->category_image = 'app/category_image/'.$filename;
        }
        $categories->save();
        return Redirect::to("product-categories")->with("success","Category has been updated successfully.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        ProductCategories::where("id",$id)->delete();
    }
    private function slugify($string) {
        $string = preg_replace('/[^\p{L}\p{N}\s-]/u', '', $string);
        $string = preg_replace('/[\s-]+/', '-', $string);
        $string = strtolower($string);
        return $string;
    }
}
