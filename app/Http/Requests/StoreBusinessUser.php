<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBusinessUser extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {

        return [
            'email' => 'required|email:rfc,dns|unique:users,email',
            'userName' => 'required|unique:users,username',
            'DOB' => 'required',
            'gender' => 'required',
            'maritalStatus' => 'required',
            'city' => 'required',
            'postCode' => 'required',
            'phoneNo' => 'required',
            'address' => 'required',
            'country' => 'required',
            'profileImageUrl' => 'required',

        ];
    }
}
