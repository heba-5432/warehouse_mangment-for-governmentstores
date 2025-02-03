<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFinanceDegreeRequest extends FormRequest
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
            'fin_title' => 'required|string|max:255',
           'disrole_id'=>'required',
           'fin_ser'=> 'required',
           'allow1'=>'numeric',
           'allow2'=>'numeric',
           'allow3'=>'numeric',
           'deduct1'=>'numeric',
           'deduct2'=>'numeric',
           'deduct3'=>'numeric',
        ];
    }
}
