<?php

namespace App\Http\Controllers\APIS;

use App\Http\Controllers\Controller;
use App\Models\PriceAlert;
use App\Models\ProductWishList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;


class WishListController extends Controller
{
    public function add_to_wishlist(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product' => [
                'required',
                'numeric',
                'exists:products,id',
                Rule::unique('product_wish_lists', 'product_id')->where(function ($query) {
                    return $query->where('user_id', auth('sanctum')->id());
                }),
            ],
        ]);

        if ($validator->fails()) {
            return $this->failedResponse($validator->errors()->first());
        }
        $wishlist = new ProductWishList();
        $wishlist->product_id = $request->product;
        $wishlist->user_id = auth('sanctum')->id();
        $wishlist->save();

        return response()->json([
            "response" => "success",
            "message" => "Product Added successfully",
            "data" => $wishlist,
        ], 200);
    }

    public function remove_from_wishlist(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'wishlist_id' => 'required|numeric|exists:product_wish_lists,id',
        ]);

        if ($validator->fails()) {
            return $this->failedResponse($validator->errors()->first());
        }

        $wishlist =ProductWishList::find($request->wishlist_id);
        $wishlist->delete();

        return response()->json([
            "response" => "success",
            "message" => "Product Removed successfully",
        ], 200);
    }

    public function get_wishlist()
    {
        $wishlist =ProductWishList::with('product')->where('user_id', auth('sanctum')->id())->select('id','product_id')->get();

        return response()->json([
            "response" => "success",
            "message" => "WishList Products",
            "data" => $wishlist,
        ], 200);
    }

    public function add_price_alerts(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product' => [
                'required',
                'numeric',
                'exists:products,id',
                Rule::unique('price_alerts', 'product_id')->where(function ($query) {
                    return $query->where('user_id', auth('sanctum')->id());
                }),
            ],
            'price'=>['required','numeric']
        ]);

        if ($validator->fails()) {
            return $this->failedResponse($validator->errors()->first());
        }

        $price_alert = new PriceAlert();
        $price_alert->product_id = $request->product;
        $price_alert->price_alert = $request->price;
        $price_alert->user_id = auth('sanctum')->id();
        $price_alert->save();

        return response()->json([
            "response" => "success",
            "message" => "Price Alert Set Successfully",
            "data" => $price_alert,
        ], 200);

    }

    public function get_price_alerts(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product' => 'required|numeric|exists:products,id',
        ]);

        if ($validator->fails()) {
            return $this->failedResponse($validator->errors()->first());
        }

        $price_alert =PriceAlert::with('product')->where('product_id', $request->product)->where('user_id', auth('sanctum')->id())->select('id','product_id','price_alert')->first();

        return response()->json([
            "response" => "success",
            "message" => "Price Alert of Product",
            "data" => $price_alert,
        ], 200);
    }
}
