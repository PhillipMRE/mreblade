<?php

namespace App\Http\Requests;

use App\Models\LendingOfficer;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateLendingOfficerRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('lending_officer_edit');
    }

    public function rules()
    {
        return [
            'display_name' => [
                'string',
                'nullable',
            ],
            'notify_phone' => [
                'string',
                'nullable',
            ],
            'contact_phone' => [
                'string',
                'nullable',
            ],
            'timezone' => [
                'string',
                'nullable',
            ],
            'call_line' => [
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
            'hubspot' => [
                'string',
                'nullable',
            ],
            'welcome_sent' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
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
