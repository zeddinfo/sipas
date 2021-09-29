<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MailInRequest extends FormRequest
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
            'code' => 'required|min:3|max:100',
            'instance' => 'required|min:3|max:255',
            'mail_attributes.*' => 'required|numeric|min:1|max:2000|exists:mail_attributes,id',
            'mail_created_at' => 'required|date',
            'mail_received_at' => 'nullable|date',
            'file' => 'required|file|mimes:pdf,doc,docx,jpeg,jpg,png|max:5120',
        ];
    }
}
