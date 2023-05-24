<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateClientRequest extends FormRequest
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
            'company_name' => 'required|unique:clients,company_name',
            'email' => 'required|unique:clients,email',
            'phone' => 'required',
            'company_address' => 'required',
            'company_city' => 'required',
            'company_zip' => 'required',
            'company_vat' => 'required',
            'status' => 'required'
        ];
    }
}
