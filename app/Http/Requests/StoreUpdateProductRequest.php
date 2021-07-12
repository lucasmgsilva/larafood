<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateProductRequest extends FormRequest
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
        $id = $this->segment(3);
        
        $rules = [
            'title' => 'required|string|min:3|max:255|unique:products,title,{$id},id',
            'description' => 'required|string|min:3|max:255',
            'image' => 'required|image',
            'price' => 'regex:/^\d+(\.\d{1,2})?$/'
        ];

        if ($this->method() == 'PUT'){
            $rules['image'] = 'nullable|image';
        }

        return $rules;
    }
}
