<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditClientRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'company_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'company_address' => 'required',
            'company_city' => 'required',
            'company_zip' => 'required',
            'company_vat' => 'required',
            'status' => 'required'
        ];
    }
}
