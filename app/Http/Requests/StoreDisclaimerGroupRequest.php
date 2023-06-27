<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;

class StoreDisclaimerGroupRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('disclaimer_group_create');
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
