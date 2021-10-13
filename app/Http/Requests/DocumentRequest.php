<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocumentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'format' => ' required',
            'language' => 'required',
            'registro_id' => 'required',
            'license' => 'required',
            'main' => 'required',
            'filename' => 'required',
            'filesize' => 'required',
            'hash' => 'required',
            'url' => 'required',
            'docid' => 'required',
            'eprintid' => 'required',
            'security' => 'required',
            'pos' => 'required',
            'license' => 'required'
        ];
    }
}
