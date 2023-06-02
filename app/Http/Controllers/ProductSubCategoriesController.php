<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddSubProductCategoryRequest;
use App\Http\Requests\UpdateProductSubCategoryRequest;
use App\Models\ProductCategories;
use App\Models\ProductSubCategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class ProductSubCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data["page_name"] = "Categories";
        $data["breadcrumb"] = '<li class="breadcrumb-item active">Categories</li>';
        return View::make("pages.product-sub-categories.sub-categories-listing",$data);
    }

    public function listing(){
        $categories = ProductSubCategories::get();
        $listing = [];
        foreach ($categories as $key => $category) {
            $statusButton = "btn-danger";
            if($category->status == "published"){
                $statusButton = "btn-primary";
            }
            $editCategoryUrl = route("product-sub-categories.edit",$category->id);
            $listing[] = [
                $category->id,
                $category->title,
                $category->slug,
                (isset($category->parent->title))?$category->parent->title:"N/A",
                '<button class="btn btn-sm '.$statusButton.'" onclick="updateCategoryStatus('.$category->id.','."'".$category->status."'".')">'.ucwords($category->status).'</button>',
                '<div class="btn-group"><a href="'.$editCategoryUrl.'" class="btn btn-sm btn-secondary">Edit</a><a onclick="deleteCategory('.$category->id.')" class="btn btn-sm btn-danger">Delete</a></div>'
            ];
        }
        return response()->json([
            "data" => $listing
        ]);
    }

    public function updateStatus(Request $request){
        $category = ProductSubCategories::find($request->id);
        $category->status = $request->status;
        $category->save();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data["page_name"] = "Add Category";
        $data["breadcrumb"] = '<li class="breadcrumb-item"><a href="'.url("product-sub-categories").'">Categories</a></li><li class="breadcrumb-item active">Add Category</li>';
        $data["categories"] = ProductCategories::where("status","published")->get();
        return View::make("pages.product-sub-categories.add-sub-category",$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddSubProductCategoryRequest $request)
    {
        $categories = new ProductSubCategories();
        $categories->category_id = $request->category_id;
        $categories->title = $request->title;
        $categories->slug = $this->slugify($request->slug);
        $categories->status = $request->status??"draft";
        $categories->save();
        return Redirect::to("product-sub-categories")->with("success","Category has been added successfully.");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $category = ProductSubCategories::find($id);
        $data["page_name"] = "Edit Category";
        $data["breadcrumb"] = '<li class="breadcrumb-item"><a href="'.url("product-sub-categories").'">Categories</a></li><li class="breadcrumb-item active">Edit Category</li>';
        $data["category"] = $category;
        $data["categories"] = ProductCategories::where("status","published")->get();
        return View::make("pages.product-sub-categories.edit-sub-category",$data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = ProductSubCategories::find($id);
        $data["page_name"] = "Edit Category";
        $data["breadcrumb"] = '<li class="breadcrumb-item"><a href="'.url("product-sub-categories").'">Categories</a></li><li class="breadcrumb-item active">Edit Category</li>';
        $data["category"] = $category;
        $data["categories"] = ProductCategories::where("status","published")->get();
        return View::make("pages.product-sub-categories.edit-sub-category",$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, (new UpdateProductSubCategoryRequest($id))->rules());
        $categories = ProductSubCategories::find($id);
        $categories->category_id = $request->category_id;
        $categories->title = $request->title;
        $categories->slug = $this->slugify($request->slug);
        $categories->status = $request->status??"draft";
        $categories->save();
        return Redirect::to("product-sub-categories")->with("success","Category has been updated successfully.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        ProductSubCategories::where("id",$id)->delete();
    }
    private function slugify($string) {
        $string = preg_replace('/[^\p{L}\p{N}\s-]/u', '', $string);
        $string = preg_replace('/[\s-]+/', '-', $string);
        $string = strtolower($string);
        return $string;
    }
}
