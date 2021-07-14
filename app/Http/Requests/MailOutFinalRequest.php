<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MailOutFinalRequest extends FormRequest
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
            'code' => 'required|min:3|max:100',
            'directory_code' => 'nullable|min:3|max:100',
            'mail_attributes.*' => 'required|numeric|min:1|max:255|exists:mail_attributes,id',
        ];
    }
}
