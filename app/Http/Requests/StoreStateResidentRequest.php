<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;

class StoreStateResidentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('state_resident_create');
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
