<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required',
                'string', 'email',
                'max:255',
                Rule::unique('users')->ignore($this->user->id),
            ],
            'mobile' => ['required', 'digits:11', 'regex:/07[0-9]{9}/'],
            'role' => ['nullable'],
            'sub_contractor' => ['required'],
            'vehicle_make' => ['nullable'],
            'vehicle_reg' => ['nullable'],
            'cscs_number' => ['nullable', 'digits:8'],
        ];
    }
}
