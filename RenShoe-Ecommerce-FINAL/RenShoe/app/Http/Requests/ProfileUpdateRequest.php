<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        // Ensure only authenticated users can update their profile
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules()
    {
        return [
            // Profile fields validation
            'first_name'   => 'required|string|max:255',
            'last_name'    => 'required|string|max:255',
            'contact_num'  => 'required|string|max:11',
            'username'     => 'required|string|max:255|unique:users,username,' . $this->user()->id,
            'email'        => 'required|email|max:255|unique:users,email,' . $this->user()->id,

            // Address fields validation
            'street'       => 'required|string|max:255',
            'purok'        => 'nullable|string|max:255',
            'barangay'     => 'required|string|max:255',
            'city'         => 'required|string|max:255',
            'zipcode'      => 'required|numeric|min:1',
        ];
    }

    /**
     * Get custom validation messages.
     */
    public function messages()
    {
        return [
            // Profile validation messages
            'first_name.required' => 'First Name is required.',
            'last_name.required'  => 'Last Name is required.',
            'contact_num.required' => 'Contact Number is required.',
            'username.required'    => 'Username is required.',
            'email.required'       => 'Email is required.',
            'username.unique'      => 'The username has already been taken.',
            'email.unique'         => 'The email has already been taken.',

            // Address validation messages
            'street.required'      => 'Street is required.',
            'barangay.required'    => 'Barangay is required.',
            'city.required'        => 'City is required.',
            'zipcode.required'     => 'Zipcode is required.',
            'zipcode.numeric'      => 'Zipcode must be a number.',
            'zipcode.min'          => 'Zipcode must be at least 1.',
        ];
    }

    /**
     * Customize the form request response to add feedback.
     */
    public function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        // Optionally customize the failed validation response.
        parent::failedValidation($validator);
    }
}
