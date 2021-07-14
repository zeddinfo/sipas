<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DispositionRequest extends FormRequest
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
            'memo' => 'required|string|max:255',
            'target_user_ids.*' => 'required|numeric|min:1',
        ];
    }
}
