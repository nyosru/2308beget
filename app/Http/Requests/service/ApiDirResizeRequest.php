<?php

namespace App\Http\Requests\service;

use Illuminate\Foundation\Http\FormRequest;

class ApiDirResizeRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'dir' => 'bail|string|required',
            'width' => 'nullable|integer',
        ];
    }

//    public function messages(): array
//    {
//        return [
//            'dir.required' => 'A dir is required',
////            'body.required' => 'A message is required',
//        ];
//    }

}
