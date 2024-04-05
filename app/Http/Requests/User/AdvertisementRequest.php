<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AdvertisementRequest extends FormRequest
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
            'description' => 'required',            
            'address' => 'required',
            'thumb_nail' => 'sometimes|mimes:jpeg,jpg,png',            
        ];
    }
    public function messages(): array
    {
        return [
            'province_id.required' => 'Please select the province',
            'city_id.required' => 'Please select the city',
            'title.required' => 'Please provide the title',
            'description.required' => 'Please provide the description',          
            'address.required' => 'Please provide the address',
            'thumb_nail.required' => 'Please add the image',
            'thumb_nail.mimes' => 'Valid image type JPEG, JPG, PNG'
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(['error' => $validator->errors()->first()], Response::HTTP_UNPROCESSABLE_ENTITY));
    }
}
