<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreEmployeeRequest extends FormRequest
{
    public function rules()
    {
        return [
            'e_firstname'     => [
                'string',
                'required',
            ],
            'e_middlename'    => [
     
            ],
            'e_lastname' => [
                'required',
                'string',
            ],
            'e_contact' => [
                'required',
            ],
            'e_gender' => [
                'required',
                'string',
            ],
            'roles.*'  => [
                'string',
            ],
            'e_role'    => [
                'required',
            ],
            'e_schedule' => [
                'required',
            ],
            'e_rate' => [
                'required',
                
            ],
        ];
    }

}