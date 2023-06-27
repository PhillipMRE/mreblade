<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;

class UpdateDisclaimerTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('disclaimer_type_edit');
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
