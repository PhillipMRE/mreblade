<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;

class UpdateAgentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('agent_edit');
    }

    public function rules()
    {
        return [
            'display_name' => [
                'string',
                'nullable',
            ],
            'timezone' => [
                'string',
                'nullable',
            ],
            'license' => [
                'string',
                'nullable',
            ],
            'website' => [
                'string',
                'nullable',
            ],
            'facebook' => [
                'string',
                'nullable',
            ],
            'youtube' => [
                'string',
                'nullable',
            ],
            'linkedin' => [
                'string',
                'nullable',
            ],
            'twitter' => [
                'string',
                'nullable',
            ],
            'instagram' => [
                'string',
                'nullable',
            ],
            'settings' => [
                'string',
                'nullable',
            ],
            'office' => [
                'string',
                'nullable',
            ],
            'vetting_data' => [
                'date_format:'.config('panel.date_format'),
                'nullable',
            ],
            'phones.*' => [
                'integer',
            ],
            'phones' => [
                'array',
            ],
            'callout_text' => [
                'string',
                'nullable',
            ],
        ];
    }
}
