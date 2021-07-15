<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateTenantRequest extends FormRequest
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
            'name' => "required|string|min:3|max:255|unique:tenants,name,{$id},id",
            'email' => "required|string|min:3|max:255|unique:tenants,email,{$id},id",
            'cnpj' => 'required|digits:14|unique:tenants,cnpj,{$id},id',
            'image' => 'nullable|image',
            'active' => 'required|in:Y,N',
            
            //Subscription
            'subscription' => 'nullable|date',
            'expires_at' => 'nullable|date',
            'subscription_id' => 'nullable|max:255',
            'subscription_active' => 'nullable|boolean',
            'subscription_suspended' => 'nullable|boolean',
        ];

        return $rules;
    }
}
