<?php

namespace App\Http\Requests\User\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;

class ChangePassword extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email:filter',
            'code' => 'required|size:5',
            'password' => 'required|min:4|max:15'
        ];
    }
    public function messages(): array
    {
        return [
            'email.required' => 'Please provide email',
            'email.email' => 'Email formats looks invalid',
            'code.required' => '5 charcter code is required',
            'code.size' => 'The code must be of 5 character',
            'password.required' => 'Please provide password',
            'password.min' => 'Password should contain min 4 character and maximum 15 character',
            'password.max' => 'Password should contain min 4 character and maximum 15 character',
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(['error' => $validator->errors()->first()], Response::HTTP_UNPROCESSABLE_ENTITY));
    }
}
