<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDisBonesRoleRequest extends FormRequest
{
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'dis_title' => 'required|string|max:255',
            'allowb1'=>'numeric',
            'allowb2'=>'numeric',
            'allowb3'=>'numeric',
            'deductb1'=>'numeric',
            'deductb2'=>'numeric',
            'deductb3'=>'numeric',

        ];
    }
}
