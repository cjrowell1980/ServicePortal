<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVisitsRequest extends FormRequest
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

            'job'       => 'required|integer',
            'engineer'  => 'integer',
            'status'    => 'required|integer',
            'notes'     => 'required|string',
            'js'        => 'boolean',
            'ph'        => 'boolean',
            'pi'        => 'boolean',
            'ci'        => 'boolean',
            'active'    => 'boolean',
            'report'    => 'string',
        ];
    }
}
