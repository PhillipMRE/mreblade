<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;

class UpdateStateResidentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('state_resident_edit');
    }

    public function rules()
    {
        return [
            'state' => [
                'string',
                'nullable',
            ],
        ];
    }
}
