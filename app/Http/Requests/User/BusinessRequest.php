<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class BusinessRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        if (Auth::check()) {
            return true;
        }
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'province_id' => 'required',
            'city_id' => 'required',
            'title' => 'required',
            'business_email' => 'required|email',
            'business_no' => 'required',
            'address' => 'required',
            'business_picture' => 'sometimes|mimes:jpeg,jpg,png',
            'sub_category_id' => 'required',
            'sub_sub_category_id' => 'required'
        ];
    }
    public function messages(): array
    {
        return [
            'province_id.required' => 'Please select the province',
            'city_id.required' => 'Please select the city',
            'title.required' => 'Please provide the title',
            'business_email.required' => 'Please provide the business email',
            'business_no.required' => 'Please provide the business no',
            'address.required' => 'Please provide the address',
            'business_picture.required' => 'Please add the image',
            'business_picture.mimes' => 'Valid image type JPEG, JPG, PNG',
            'sub_category_id.required' => 'Please select category',
            'sub_sub_category_id.required' => 'Please select sub category'
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(['error' => $validator->errors()->first()], Response::HTTP_UNPROCESSABLE_ENTITY));
    }
}
