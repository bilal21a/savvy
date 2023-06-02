<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddProductSectionRequest;
use App\Http\Requests\UpdateProductSectionRequest;
use App\Models\ProductSections;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class ProductSectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data["page_name"] = "Sections";
        $data["breadcrumb"] = '<li class="breadcrumb-item active">Sections</li>';
        return View::make("pages.product-sections.sections-listing",$data);
    }

    public function listing(){
        $sections = ProductSections::get();
        $listing = [];
        foreach ($sections as $key => $section) {
            $editSectionUrl = route("product-sections.edit",$section->id);
            $listing[] = [
                $section->id,
                $section->name,
                '<div class="btn-group"><a href="'.$editSectionUrl.'" class="btn btn-sm btn-secondary">Edit</a><a onclick="deleteSection('.$section->id.')" class="btn btn-sm btn-danger">Delete</a></div>'
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
        $data["page_name"] = "Add Section";
        $data["breadcrumb"] = '<li class="breadcrumb-item"><a href="'.url("product-sections").'">Sections</a></li><li class="breadcrumb-item active">Add Section</li>';
        return View::make("pages.product-sections.add-section",$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddProductSectionRequest $request)
    {
        $sections = new ProductSections();
        $sections->name = $request->name;
        $sections->save();
        return Redirect::to("product-sections")->with("success","Section has been added successfully.");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $section = ProductSections::find($id);
        $data["page_name"] = "Edit Section";
        $data["breadcrumb"] = '<li class="breadcrumb-item"><a href="'.url("product-sections").'">Sections</a></li><li class="breadcrumb-item active">Edit Section</li>';
        $data["section"] = $section;
        return View::make("pages.product-sections.edit-section",$data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $section = ProductSections::find($id);
        $data["page_name"] = "Edit Section";
        $data["breadcrumb"] = '<li class="breadcrumb-item"><a href="'.url("product-sections").'">Sections</a></li><li class="breadcrumb-item active">Edit Section</li>';
        $data["section"] = $section;
        return View::make("pages.product-sections.edit-section",$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, (new UpdateProductSectionRequest($id))->rules());
        $sections = ProductSections::find($id);
        $sections->name = $request->name;
        $sections->save();
        return Redirect::to("product-sections")->with("success","Section has been updated successfully.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        ProductSections::where("id",$id)->delete();
    }
}
