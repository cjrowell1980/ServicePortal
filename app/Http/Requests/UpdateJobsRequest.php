<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateJobsRequest extends FormRequest
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
            'machine'   => 'required',
            'status'    => 'required',
            'type'      => 'required',
            'job_no'    => 'required|unique:jobs,job_no,'.$this->job->id,
            'reported'  => 'required|string',
            'job_ref'   => 'required|string',
        ];
    }
}
