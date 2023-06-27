<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;

class StoreDisclaimerTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('disclaimer_type_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'nullable',
            ],
        ];
    }
}
