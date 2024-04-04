<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomersRequest extends FormRequest
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
            'syrinx'    => 'required|string|min:3|max:250|unique:customers,syrinx',
            'name'      => 'required|string|min:3|max:250'
        ];
    }

    /**
     * Custom attribute names
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'syrinx'    => __('syrinx account number'),
            'name'      => __('account name'),
        ];
    }
}
