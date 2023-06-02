<?php

namespace App\Http\Controllers;

use App\Models\ProductColors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class ProductColorsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data["page_name"] = "Colors";
        $data["breadcrumb"] = '<li class="breadcrumb-item active">Colors</li>';
        return View::make("pages.product-colors.colors-listing",$data);
    }

    public function listing(){
        $colors = ProductColors::get();
        $listing = [];
        foreach ($colors as $key => $color) {
            $editColorUrl = route("product-colors.edit",$color->id);
            $listing[] = [
                $color->id,
                $color->name,
                '<label style="background-color: '.$color->color.'; color: white; text-shadow: 0 0 20px black; padding: 5px; border-radius: 5px; border: solid 1px lightgrey;">'.$color->color.'</label>',
                '<div class="btn-group"><a href="'.$editColorUrl.'" class="btn btn-sm btn-secondary">Edit</a><a onclick="deleteColor('.$color->id.')" class="btn btn-sm btn-danger">Delete</a></div>'
            ];
        }
        return response()->json([
            "data" => $listing
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data["page_name"] = "Add Color";
        $data["breadcrumb"] = '<li class="breadcrumb-item"><a href="'.url("product-colors").'">Colors</a></li><li class="breadcrumb-item active">Add Color</li>';
        return View::make("pages.product-colors.add-color",$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $color = new ProductColors();
        $color->name = $request->name;
        $color->color = $request->color;
        $color->save();
        return Redirect::to("product-colors")->with("success","Color has been added successfully.");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $color = ProductColors::find($id);
        $data["page_name"] = "Edit Color";
        $data["breadcrumb"] = '<li class="breadcrumb-item"><a href="'.url("product-colors").'">Colors</a></li><li class="breadcrumb-item active">Edit Color</li>';
        $data["color"] = $color;
        return View::make("pages.product-colors.edit-color",$data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $color = ProductColors::find($id);
        $data["page_name"] = "Edit Color";
        $data["breadcrumb"] = '<li class="breadcrumb-item"><a href="'.url("product-colors").'">Colors</a></li><li class="breadcrumb-item active">Edit Color</li>';
        $data["color"] = $color;
        return View::make("pages.product-colors.edit-color",$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $colors = ProductColors::find($id);
        $colors->name = $request->name;
        $colors->color = $request->color;
        $colors->save();
        return Redirect::to("product-colors")->with("success","Color has been updated successfully.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        ProductColors::where("id",$id)->delete();
    }
}
