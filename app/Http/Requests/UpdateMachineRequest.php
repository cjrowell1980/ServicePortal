<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMachineRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'customer'  => 'required',
            'stock'     => 'required|string|max:250|unique:machine,stock,'.$this->machine->id,
            'make'      => 'required|string|min:2|max:250',
            'model'     => 'required|string|min:2|max:250',
            'serial'    => 'required|string|min:2|max:250|unique:machine,serial,'.$this->machine->id,
            'yom'       => 'required|digits:4|integer|min:1900|max:'.(date('Y')+1),
        ];
    }
}
