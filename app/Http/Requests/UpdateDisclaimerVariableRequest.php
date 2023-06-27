<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;

class UpdateDisclaimerVariableRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('disclaimer_variable_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'nullable',
            ],
            'path' => [
                'string',
                'nullable',
            ],
        ];
    }
}
