<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;

class UpdateClientRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('client_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'nullable',
            ],
            'settings' => [
                'string',
                'nullable',
            ],
            'category' => [
                'string',
                'nullable',
            ],
            'stub' => [
                'string',
                'nullable',
            ],
            'muted' => [
                'string',
                'nullable',
            ],
            'muted_at' => [
                'date_format:'.config('panel.date_format').' '.config('panel.time_format'),
                'nullable',
            ],
            'source' => [
                'string',
                'nullable',
            ],
            'sub_source' => [
                'string',
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
