<?php

namespace App\Http\Requests;

use App\Models\Agent;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAgentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('agent_create');
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
                'date_format:' . config('panel.date_format'),
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
