<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;

class StoreEmailHistoryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('email_history_create');
    }

    public function rules()
    {
        return [
            'subject' => [
                'string',
                'nullable',
            ],
            'state' => [
                'string',
                'nullable',
            ],
            'opens' => [
                'string',
                'nullable',
            ],
            'clicks' => [
                'string',
                'nullable',
            ],
            'ts' => [
                'date_format:'.config('panel.date_format').' '.config('panel.time_format'),
                'nullable',
            ],
        ];
    }
}
