<?php

use App\Http\Controllers\APIS\ContactUsController;
use App\Http\Controllers\APIS\ProductController;
use App\Http\Controllers\APIS\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:sanctum')->group(function () {
    Route::post("/verify-account",[UserController::class,"verifyAccount"]);
    Route::post("/reset-password",[UserController::class,"resetPassword"]);
    Route::post("/update-profile",[UserController::class,"updateProfile"]);
    Route::post("/logout",[UserController::class,"logout"]);
});
Route::post("/login",[UserController::class,"login"]);
Route::post("/register",[UserController::class,"signUp"]);
Route::post("/generate-pin-to-verify-account",[UserController::class,"generatePinToVerifyAccount"]);
Route::post("/forget-password-request",[UserController::class,"forgetPasswordRequest"]);
Route::post("/forget-password-verify-pin",[UserController::class,"forgetPasswordVerifyPin"]);
Route::post("/add-new-password",[UserController::class,"addNewPassword"]);
Route::get("/parent-categories",[ProductController::class,"parentCategories"]);
Route::get("/parent-categories-with-products",[ProductController::class,"parentCategoriesWithProducts"]);
Route::post("/section-wise-products",[ProductController::class,"sectionWiseProducts"]);
Route::post("/parent-category-wise-products",[ProductController::class,"parentCategoryWiseProducts"]);
Route::post("/category-wise-products",[ProductController::class,"categoryWiseProducts"]);
Route::post("/product-details",[ProductController::class,"productDetails"]);
Route::post("/product-search",[ProductController::class,"productSearch"]);
Route::post("/parent-categories-by-type",[ProductController::class,"parentCategoriesByType"]);
Route::post("/products-by-type",[ProductController::class,"productsByType"]);
Route::post("/save-contact-message",[ContactUsController::class,"saveContactMessage"]);
Route::post("/related-products",[ProductController::class,"relatedProducts"]);
Route::post("/subscribe-now",[ContactUsController::class,"subscribeNow"]);
