<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class AccountSettingRequest extends FormRequest
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
            'nip' => 'nullable|min:3|max:100',
            'name' => 'required|min:2|max:100',
            'phone_number' => 'required|min:8|max:50',
            'email' => 'required|email|unique:users,id,' . Auth::id() . '|min:5|max:100',
            'password' => 'nullable|confirmed|min:6|max:50',
        ];
    }
}
