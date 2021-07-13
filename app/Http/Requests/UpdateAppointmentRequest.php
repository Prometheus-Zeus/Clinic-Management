<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateAppointmentRequest extends FormRequest
{
    public function rules()
    {
        return [
            'patient'     => [
                'string',
                'required',
            ],
            'doctors.*'  => [
                'string',
            ],
            'doctor'    => [
                'required',
            ],
            'contact' => [
                'required',
            ],
            'description' => [
                'required',
            ],
            'time' => [
                'required',    
            ],
            'date' => [
                'required',
                
            ],
        ];
    }
}