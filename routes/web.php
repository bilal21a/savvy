<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductCategoriesController;
use App\Http\Controllers\ProductColorsController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProductSectionsController;
use App\Http\Controllers\ProductSubCategoriesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\WebsiteUsersController;
use Illuminate\Support\Facades\Route;

Route::get('/login',[HomeController::class,'login'])->name("login");
Route::post('/login-request',[HomeController::class,'loginRequest']);
Route::get('/forget-password',[HomeController::class,'forgetPassword']);
Route::post('/forget-password-request',[HomeController::class,'forgetPasswordRequest']);
Route::get('/verify-pin-to-forget-password',[HomeController::class,'verifyPinToForgetPassword']);
Route::post('/verify-pin-to-forget-password-request',[HomeController::class,'verifyPinToForgetPasswordRequest']);
Route::get('/add-new-password-on-forget',[HomeController::class,'addnewPassowrdOnForget']);
Route::post('/add-new-password-on-forget-request',[HomeController::class,'addnewPassowrdOnForgetRequest']);
Route::middleware('auth')->group(function () {
    Route::get('/',[HomeController::class,'dashboard']);
    Route::get('/dashboard',[HomeController::class,'dashboard']);
    Route::get('/profile',[HomeController::class,'profile']);
    Route::post('/update-user-request',[HomeController::class,'updateUserRequest']);
    Route::post('/update-user-password-request',[HomeController::class,'updateUserPasswordRequest']);
    Route::get('/logout',[HomeController::class,'logout']);
    Route::get('/users-listing',[UsersController::class,"listing"])->name("users.listing");
    Route::post('/update-user-status',[UsersController::class,"updateStatus"])->name("users.update.status");
    Route::resource('/users',UsersController::class);
    Route::get('/auth-apis',[WebsiteUsersController::class,"authApis"])->name("users.auth.apis");
    Route::get('/website-users-listing',[WebsiteUsersController::class,"listing"])->name("website.users.listing");
    Route::post('/update-website-user-status',[WebsiteUsersController::class,"updateStatus"])->name("website.users.update.status");
    Route::resource('/website-users',WebsiteUsersController::class);
    Route::get('/product-categories-listing',[ProductCategoriesController::class,"listing"])->name("product.categories.listing");
    Route::post('/product-categories-status',[ProductCategoriesController::class,"updateStatus"])->name("product.categories.update.status");
    Route::resource('/product-categories',ProductCategoriesController::class);
    Route::get('/product-sub-categories-listing',[ProductSubCategoriesController::class,"listing"])->name("product.sub.categories.listing");
    Route::post('/product-sub-categories-status',[ProductSubCategoriesController::class,"updateStatus"])->name("product.sub.categories.update.status");
    Route::resource('/product-sub-categories',ProductSubCategoriesController::class);
    Route::get('/product-sections-listing',[ProductSectionsController::class,"listing"])->name("product.sections.listing");
    Route::resource('/product-sections',ProductSectionsController::class);
    Route::get('/product-colors-listing',[ProductColorsController::class,"listing"])->name("product.colors.listing");
    Route::resource('/product-colors',ProductColorsController::class);
    Route::get('/products-listing',[ProductsController::class,"listing"])->name("products.listing");
    Route::post('/product-status',[ProductsController::class,"updateStatus"])->name("product.update.status");
    Route::post('/product-delete-image',[ProductsController::class,"productDeleteImage"])->name("product.delete.image");
    Route::resource('/products',ProductsController::class);
    Route::get('/products-apis',[ProductsController::class,"productsApis"])->name("product.apis");
    Route::get('/contact-us',[HomeController::class,"contactUs"])->name("contact.us");
    Route::get('/contact-messages-listing',[HomeController::class,"contactMessagesListing"])->name("contact.messages.listing");
    Route::get('/view-contact-message/{id}',[HomeController::class,"viewContactMessage"])->name("view.contact.message");
    Route::post('/destroy-contact-message',[HomeController::class,"destroyContactMessage"])->name("destroy.contact.message");
    Route::get('/subscribers',[HomeController::class,"subscribers"])->name("subscribers");
    Route::get('/subscribers-listing',[HomeController::class,"subscribersListing"])->name("subscribers.listing");
});
