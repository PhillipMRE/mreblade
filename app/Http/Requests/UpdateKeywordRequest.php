<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;

class UpdateKeywordRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('keyword_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'nullable',
            ],
            'shortcode' => [
                'string',
                'nullable',
            ],
            'sponsor_only' => [
                'string',
                'nullable',
            ],
            'agents.*' => [
                'integer',
            ],
            'agents' => [
                'array',
            ],
        ];
    }
}
