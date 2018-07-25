<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConsultationRequest extends FormRequest
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
            'first_name'=>'required',
            'last_name'=>'required',
            'organization_name'=>'required',
            'address'=>'required',
            'city'=>'required',
            'state'    =>'required',
            'zip_code' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'comment' => 'required',
            'isOrganization' => 'required'
        ];
    }
}