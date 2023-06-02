<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProductSubCategoryRequest extends FormRequest
{
    protected $category;
    public function __construct($id)
    {
        $this->category = $id;
    }
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            "category_id" => "required",
            "title" => "required",
            "slug" => [
                'required',
                Rule::unique('product_sub_categories')->ignore($this->category)
            ]
        ];
    }
}
