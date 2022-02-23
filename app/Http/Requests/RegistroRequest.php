<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistroRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'registro.title' => 'required|string',
            'registro.abstract' => 'nullable|string',
            'registro.type' => 'required|string',
            'registro.eprint_status' => 'required|string',
            'registro.id' => 'nullable|integer',
            'registro.eprintid' => 'nullable|integer',
            'registro.refereed' => 'nullable|boolean',
            'registro.official_url' => 'nullable|string',
            'registro.volume' => 'nullable|string',
            'registro.number' => 'nullable|string',
            'registro.issn' => 'nullable|string',
            'registro.isbn' => 'nullable|string',
            'registro.pagerange' => 'nullable|string',
            'registro.subjects' => 'nullable|array',
        ];
    }
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'registro.title.required' => 'A title is required',
            'registro.abstract.required' => 'An abstract is required',
        ];
    }
}
