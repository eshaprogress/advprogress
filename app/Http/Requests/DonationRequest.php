<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DonationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'form.first_name'=>'required',
            'form.last_name'=>'required',
            'form.address'=>'required',
            'form.city'=>'required',
            'form.state' =>'required',
            'form.zip_code' => 'required',
            'form.phone' => 'required',
            'form.email' => 'required',
            'form.amount' => 'required',
            'form.isCustom' => 'required',
            'name' => 'required',
            'cardToken' => 'required',
            'stripeToken' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'form.first_name.required'=>'First Name is required',
            'form.last_name.required'=>'Last Name is required',
            'form.address.required'=>'Address is required',
            'form.city.required'=>'City is required',
            'form.state.required' =>'State is required',
            'form.zip_code.required' => 'Zip Code is required',
            'form.phone.required' => 'Phone is required',
            'form.email.required' => 'Email is required',
            'form.amount.required' => 'Amount is required',
            'form.isCustom.required' => 'isCustom is required',
            'name.required' => 'Full Name is required',
            'cardToken.required' => 'Stripe Card Token Id is required',
            'stripeToken.required' => 'Strip Session Token Id is required'
        ];
    }
}