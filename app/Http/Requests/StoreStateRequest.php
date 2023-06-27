<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;

class StoreStateRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('state_create');
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
