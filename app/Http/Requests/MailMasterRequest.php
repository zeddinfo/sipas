<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MailMasterRequest extends FormRequest
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
            'title' => 'required|min:3|max:255',
            'code' => 'nullable|min:3|max:25',
            'directory_code' => 'nullable|min:3|max:25',
            'instance' => 'required|min:3|max:255',
            'mail_attributes.*' => 'required|numeric|min:1|max:255|exists:mail_attributes,id',
            'mail_created_at' => 'required|date',
            'file' => 'nullable|file|mimes:pdf,doc,docx,jpeg,jpg,png|max:5120',
        ];
    }
}
