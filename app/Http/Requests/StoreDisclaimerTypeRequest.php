<?php

namespace App\Http\Requests;

use App\Models\DisclaimerType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

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
