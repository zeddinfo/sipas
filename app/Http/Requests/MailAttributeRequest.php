<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class MailAttributeRequest extends FormRequest
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
            'name' => 'required|string|min:3|max:100',
            'type' => 'required|string|min:2|max:50',
            'code' => 'nullable|string|min:3|max:10',
            'color' => 'nullable|string|min:2|max:50',
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'code' => Str::upper($this->code),
            'color' => Str::upper($this->color),
        ]);
    }
}
