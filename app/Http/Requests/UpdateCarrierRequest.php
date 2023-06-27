<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCarrierRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('carrier_edit');
    }

    public function rules()
    {
        return [
            'carrier' => [
                'string',
                'nullable',
            ],
            'name' => [
                'string',
                'nullable',
            ],
        ];
    }
}
