<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;

class StoreKeywordAppRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('keyword_app_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'nullable',
            ],
            'short_name' => [
                'string',
                'nullable',
            ],
            'apple_version' => [
                'string',
                'nullable',
            ],
            'google_version' => [
                'string',
                'nullable',
            ],
            'apple_mre_version' => [
                'string',
                'nullable',
            ],
            'google_mre_version' => [
                'string',
                'nullable',
            ],
            'apple' => [
                'string',
                'nullable',
            ],
            'google' => [
                'string',
                'nullable',
            ],
        ];
    }
}
