<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;

class UpdateStateRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('state_edit');
    }

    public function rules()
    {
        return [
            'state' => [
                'string',
                'nullable',
            ],
            'abbreviation' => [
                'string',
                'nullable',
            ],
        ];
    }
}
