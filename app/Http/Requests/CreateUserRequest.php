<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'nip' => 'nullable|min:3|max:50',
            'name' => 'required|min:3|max:100',
            'phone_number' => 'required|min:8|max:50',
            'email' => 'required|email|unique:users|min:5|max:50',
            'password' => 'required|min:6|max:50',
            'level_id' => 'required|exists:App\Models\Level,id',
            'department_id' => 'nullable|exists:App\Models\Department,id',
        ];
    }
}
