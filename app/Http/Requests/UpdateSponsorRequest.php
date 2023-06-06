<?php

namespace App\Http\Requests;

use App\Models\Sponsor;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSponsorRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('sponsor_edit');
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
            'callout_text' => [
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
            'layout' => [
                'string',
                'nullable',
            ],
            'customers.*' => [
                'integer',
            ],
            'customers' => [
                'array',
            ],
            'carriers.*' => [
                'integer',
            ],
            'carriers' => [
                'array',
            ],
            'phone_numbers.*' => [
                'integer',
            ],
            'phone_numbers' => [
                'array',
            ],
        ];
    }
}
