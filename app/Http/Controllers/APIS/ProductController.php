<?php

namespace App\Http\Controllers\APIS;

use App\Http\Controllers\Controller;
use App\Models\ProductCategories;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function failedResponse($message, $errorCode = 500)
    {
        return response()->json([
            "response" => "error",
            "message" => $message
        ], $errorCode);
    }
    public function productSearch(Request $request){
        try {
            $search = $request->search;
            $products = Products::where(function($q) use($search){
                $q->orWhere("title","LIKE","%".$search."%");
                $q->orWhereHas("category",function($q) use($search){
                    $q->where(function($q) use($search){
                        $q->orWhere("title","LIKE","%".$search."%");
                        $q->orWhereHas("parent",function($q) use($search){
                            $q->where("title","LIKE","%".$search."%");
                        });
                    });
                });
                $q->orWhereHas("section",function($q) use($search){
                    $q->where("name","LIKE","%".$search."%");
                });
            })
            ->get();
            return response()->json([
                "response" => "success",
                "products" => $products,
                "product_image_base_path" => url("storage")
            ], 200);
        } catch (\Throwable $th) {
            return $this->failedResponse($th->getMessage());
        }
    }
    public function parentCategories(Request $request){
        try {
            $categories = ProductCategories::where("status","published");
            if($request->type == "with-sub"){
                $categories = $categories->with(["categories" => function($q) use($request){
                    $q->orderby($request->order_sub_cats??"title",$request->sub_cate_dir??"asc");
                }]);
            }
            if(empty($request->type) || $request->type == "with-sub-and-products"){
                $categories = $categories->with(["categories" => function($q) use($request){
                    $q->with(["products" => function($q) use($request){
                        $q->with("links","images");
                        $q->orderby($request->order_products??"title",$request->products_dir??"asc");
                    }]);
                    $q->orderby($request->order_sub_cats??"title",$request->sub_cate_dir??"asc");
                }]);
            }
            if($request->take){
                $categories = $categories->take($request->take);
            }
            $categories = $categories->orderby($request->order??"title",$request->dir??"asc")->get();
            return response()->json([
                "response" => "success",
                "parent_categories" => $categories,
                "product_image_base_path" => url("storage")
            ], 200);
        } catch (\Throwable $th) {
            return $this->failedResponse($th->getMessage());
        }
    }
    public function sectionWiseProducts(Request $request){
        try {
            $products = Products::where("status","published")
            ->whereHas("section",function($q) use($request){
                $q->where("name",$request->section_name);
            })
            ->with("links","images");
            if($request->take){
                $products = $products->take($request->take);
            }
            $products = $products->orderby($request->order_products??"id",$request->products_dir??"DESC")->get();
            return response()->json([
                "response" => "success",
                "products" => $products,
                "product_image_base_path" => url("storage")
            ], 200);
        } catch (\Throwable $th) {
            return $this->failedResponse($th->getMessage());
        }
    }
    public function parentCategoryWiseProducts(Request $request){
        try {
            $products = Products::where("status","published")
            ->whereHas("category",function($q) use($request){
                $q->whereHas("parent",function($q) use($request){
                    $q->where("slug",$request->slug);
                });
            })
            ->with("links","images");
            if($request->take){
                $products = $products->take($request->take);
            }
            $products = $products->orderby($request->order_products??"id",$request->products_dir,"DESC")->get();
            return response()->json([
                "response" => "success",
                "products" => $products,
                "product_image_base_path" => url("storage")
            ], 200);
        } catch (\Throwable $th) {
            return $this->failedResponse($th->getMessage());
        }
    }
    public function categoryWiseProducts(Request $request){
        try {
            $products = Products::where("status","published")
            ->whereHas("category",function($q) use($request){
                $q->where("slug",$request->slug);
            })
            ->with("links","images");
            if($request->take){
                $products = $products->take($request->take);
            }
            $products = $products->orderby($request->order_products??"id",$request->products_dir??"DESC")->get();
            return response()->json([
                "response" => "success",
                "products" => $products,
                "product_image_base_path" => url("storage")
            ], 200);
        } catch (\Throwable $th) {
            return $this->failedResponse($th->getMessage());
        }
    }
    public function productDetails(Request $request){
        try {
            $product = Products::where("status","published")
            ->where("slug",$request->slug)
            ->with("links","images")
            ->orderby("id","DESC")->first();
            return response()->json([
                "response" => "success",
                "product" => $product,
                "product_image_base_path" => url("storage")
            ], 200);
        } catch (\Throwable $th) {
            return $this->failedResponse($th->getMessage());
        }
    }
    public function parentCategoriesByType(Request $request){
        try {
            $type = ($request->type=="simple")?"":$request->type;
            $categories = ProductCategories::where("status","published")
            ->where("type",$type);
            if($request->take){
                $categories = $categories->take($request->take);
            }
            $categories = $categories->orderby($request->order??"title",$request->dir??"asc")->get();
            return response()->json([
                "response" => "success",
                "categories" => $categories,
                "product_image_base_path" => url("storage")
            ], 200);
        } catch (\Throwable $th) {
            return $this->failedResponse($th->getMessage());
        }
    }
    public function productsByType(Request $request){
        try {
            $type = ($request->type=="simple")?"":$request->type;
            $products = Products::where("status","published")
            ->where("type",$type)
            ->with("links","images");
            if($request->take){
                $products = $products->take($request->take);
            }
            $products = $products->orderby($request->order??"title",$request->dir??"asc")->get();
            return response()->json([
                "response" => "success",
                "products" => $products,
                "product_image_base_path" => url("storage")
            ], 200);
        } catch (\Throwable $th) {
            return $this->failedResponse($th->getMessage());
        }
    }
    public function parentCategoriesWithProducts(Request $request){
        try {
            $categories = ProductCategories::where("status","published");
            if($request->take){
                $categories = $categories->take($request->take);
            }
            $categories = $categories->orderby($request->order??"title",$request->dir??"asc")->get();
            $categories_with_products = $categories->toArray();
            foreach ($categories as $key => $category) {
                $products = Products::whereHas("category",function($q) use($category){
                    $q->whereHas("parent",function($q) use($category){
                        $q->where("id",$category->id);
                    });
                })->with("links","images")->get()->toArray();
                $categories_with_products[$key]["products"] = $products;
            }
            return response()->json([
                "response" => "success",
                "parent_categories" => $categories_with_products,
                "product_image_base_path" => url("storage")
            ], 200);
        } catch (\Throwable $th) {
            return $this->failedResponse($th->getMessage());
        }
    }
    public function relatedProducts(Request $request){
        try {
            $related_products = Products::whereHas("category",function($q) use($request){
                $q->whereHas("parent",function($q) use($request){
                    $q->whereHas("categories",function($q) use($request){
                        $q->whereHas("products",function($q) use($request){
                            $q->where("id",$request->id);
                        });
                    });
                });
            });
            if($request->take){
                $related_products = $related_products->take($request->take);
            }
            $related_products = $related_products->with("links","images")->orderby($request->order??"title",$request->dir??"asc")->get();
            return response()->json([
                "response" => "success",
                "related_products" => $related_products,
                "product_image_base_path" => url("storage")
            ], 200);
        } catch (\Throwable $th) {
            // If an error occurs, return a failed response with the error message
            return $this->failedResponse($th->getMessage());
        }
    }
}
