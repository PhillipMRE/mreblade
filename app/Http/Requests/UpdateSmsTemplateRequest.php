<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;

class UpdateSmsTemplateRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('sms_template_edit');
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
