<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    protected $user;
    public function __construct($id)
    {
        $this->user = $id;
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
            "name" => "required|min:4",
            "email" => [
                'required', 'email',
                Rule::unique('users')->ignore($this->user)
            ],
            "password" => "nullable|min:4",
            'password_confirmation' => 'nullable|min:4',
        ];
    }
}
