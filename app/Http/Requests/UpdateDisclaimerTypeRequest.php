<?php

namespace App\Http\Requests;

use App\Models\DisclaimerType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

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
