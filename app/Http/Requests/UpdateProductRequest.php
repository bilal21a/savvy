<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProductRequest extends FormRequest
{
    protected $product;
    public function __construct($id)
    {
        $this->product = $id;
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
            "title" => "required",
            "slug" => [
                'required',
                Rule::unique('products')->ignore($this->product)
            ],
            "sub_category_id" => "required",
            "amount" => "required",
        ];
    }
}
