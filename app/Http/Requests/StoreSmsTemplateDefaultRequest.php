<?php

namespace App\Http\Requests;

use App\Models\SmsTemplateDefault;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

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
