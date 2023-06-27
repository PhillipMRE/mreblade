<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;

class StoreSmsTemplateDefaultRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('sms_template_default_create');
    }

    public function rules()
    {
        return [
            'nickname' => [
                'string',
                'nullable',
            ],
        ];
    }
}
