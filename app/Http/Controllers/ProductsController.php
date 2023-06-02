<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\ProductColors;
use App\Models\ProductImages;
use App\Models\ProductLinks;
use App\Models\Products;
use App\Models\ProductSections;
use App\Models\ProductSubCategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Intervention\Image\Facades\Image;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data["page_name"] = "Products";
        $data["breadcrumb"] = '<li class="breadcrumb-item active">Products</li>';
        return View::make("pages.products.products-listing",$data);
    }

    public function listing(){
        $products = Products::get();
        $listing = [];
        foreach ($products as $key => $product) {
            $statusButton = "btn-danger";
            if($product->status == "published"){
                $statusButton = "btn-primary";
            }
            $editProductUrl = route("products.edit",$product->id);
            $listing[] = [
                $product->id,
                $product->title,
                $product->slug,
                ucwords($product->type??"simple"),
                (isset($product->category->title))?$product->category->title:"N/A",
                (isset($product->section->name))?$product->section->name:"N/A",
                '<button class="btn btn-sm '.$statusButton.'" onclick="updateProductStatus('.$product->id.','."'".$product->status."'".')">'.ucwords($product->status).'</button>',
                '<div class="btn-group"><a href="'.$editProductUrl.'" class="btn btn-sm btn-secondary">Edit</a><a onclick="deleteProduct('.$product->id.')" class="btn btn-sm btn-danger">Delete</a></div>'
            ];
        }
        return response()->json([
            "data" => $listing
        ]);
    }

    public function updateStatus(Request $request){
        $product = Products::find($request->id);
        $product->status = $request->status;
        $product->save();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data["page_name"] = "Add Product";
        $data["breadcrumb"] = '<li class="breadcrumb-item"><a href="'.url("products").'">Products</a></li><li class="breadcrumb-item active">Add Product</li>';
        $data["sub_categories"] = ProductSubCategories::where("status","published")->get();
        $data["sections"] = ProductSections::get();
        $data["colors"] = ProductColors::get();
        return View::make("pages.products.add-product",$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddProductRequest $request)
    {
        $products = new Products();
        $products->sub_category_id = $request->sub_category_id;
        if(!empty($request->section_id)){
            $products->section_id = $request->section_id;
        }
        $products->title = $request->title;
        $products->slug = $this->slugify($request->slug);
        $products->amount = $request->amount;
        if(!empty($request->discount)){
            $products->discount = $request->discount;
        }
        $products->description = $request->description;
        $products->colors = implode(",",$request->colors??[]);
        $products->status = $request->status??"draft";
        $products->type = $request->type;
        $products->save();
        $product_id = $products->id;
        $links = [];
        foreach ($request->links as $key => $link) {
            if (filter_var($link, FILTER_VALIDATE_URL)) {
                $links[] = [
                    "product_id" => $product_id,
                    "links" => $link,
                    "created_at" => date("Y-m-d H:i:s")
                ];
            }
        }
        ProductLinks::insert($links);
        $path = storage_path('app/product_images');
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        if ($request->hasFile('images')) {
            $files = $request->file('images');
            $uploaded = [];
            foreach ($files as $file) {
                if ($file->isValid()) {
                    $filename = uniqid() . '.' . $file->getClientOriginalExtension();
                    $image = Image::make($file->getRealPath())->orientate();
                    $image->encode($file->getClientOriginalExtension(), 50);
                    $image->save(storage_path('app/product_images/'.$filename));
                    $uploaded[] = [
                        "product_id" => $product_id,
                        "name" => $file->getClientOriginalName(),
                        "image" => 'app/product_images/'.$filename,
                    ];
                }
            }
            ProductImages::insert($uploaded);
        }
        return Redirect::to("products")->with("success","Product has been added successfully.");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Products::find($id);
        $data["page_name"] = "Edit Product";
        $data["breadcrumb"] = '<li class="breadcrumb-item"><a href="'.url("products").'">Products</a></li><li class="breadcrumb-item active">Edit Product</li>';
        $data["product"] = $product;
        $data["sub_categories"] = ProductSubCategories::where("status","published")->get();
        $data["sections"] = ProductSections::get();
        $data["colors"] = ProductColors::get();
        return View::make("pages.products.edit-product",$data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Products::find($id);
        $data["page_name"] = "Edit Product";
        $data["breadcrumb"] = '<li class="breadcrumb-item"><a href="'.url("products").'">Products</a></li><li class="breadcrumb-item active">Edit Product</li>';
        $data["product"] = $product;
        $data["sub_categories"] = ProductSubCategories::where("status","published")->get();
        $data["sections"] = ProductSections::get();
        $data["colors"] = ProductColors::get();
        return View::make("pages.products.edit-product",$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, (new UpdateProductRequest($id))->rules());
        $products = Products::find($id);
        $products->sub_category_id = $request->sub_category_id;
        if(!empty($request->section_id)){
            $products->section_id = $request->section_id;
        }
        $products->title = $request->title;
        $products->slug = $this->slugify($request->slug);
        $products->amount = $request->amount;
        if(!empty($request->discount)){
            $products->discount = $request->discount;
        }
        $products->description = $request->description;
        $products->colors = implode(",",$request->colors??[]);
        $products->status = $request->status??"draft";
        $products->type = $request->type;
        $products->save();
        ProductLinks::where("product_id",$id)->delete();
        $links = [];
        foreach ($request->links as $key => $link) {
            if (filter_var($link, FILTER_VALIDATE_URL)) {
                $links[] = [
                    "product_id" => $id,
                    "links" => $link,
                    "updated_at" => date("Y-m-d H:i:s")
                ];
            }
        }
        ProductLinks::insert($links);
        $path = storage_path('app/product_images');
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        if ($request->hasFile('images')) {
            $files = $request->file('images');
            $uploaded = [];
            foreach ($files as $file) {
                if ($file->isValid()) {
                    $filename = uniqid() . '.' . $file->getClientOriginalExtension();
                    $image = Image::make($file->getRealPath())->orientate();
                    $image->encode($file->getClientOriginalExtension(), 50);
                    $image->save(storage_path('app/product_images/'.$filename));
                    $uploaded[] = [
                        "product_id" => $id,
                        "name" => $file->getClientOriginalName(),
                        "image" => 'app/product_images/'.$filename,
                    ];
                }
            }
            ProductImages::insert($uploaded);
        }
        return Redirect::to("products")->with("success","Product has been updated successfully.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Products::where("id",$id)->delete();
        ProductLinks::where("product_id",$id)->delete();
        $images = ProductImages::where("product_id",$id)->get();
        foreach ($images as $key => $file) {
            $path = public_path('app/product_images/' . $file->image);
            if (file_exists($path)) {
                File::delete($path);
                ProductImages::where("id",$file->id)->delete();
            }
        }
    }
    private function slugify($string) {
        $string = preg_replace('/[^\p{L}\p{N}\s-]/u', '', $string);
        $string = preg_replace('/[\s-]+/', '-', $string);
        $string = strtolower($string);
        return $string;
    }
    public function productDeleteImage(Request $request){
        $file = ProductImages::where("id",$request->id)->first();
        $path = storage_path($file->image);
        if (file_exists($path)) {
            File::delete($path);
        }
        ProductImages::where("id",$file->id)->delete();
    }
    public function productsApis(){
        $data["page_name"] = "Products APIs";
        $data["breadcrumb"] = '<li class="breadcrumb-item active">Products APIs</li>';
        return View::make("pages.products.products-apis",$data);
    }
}
