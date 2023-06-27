<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;

class UpdateKeywordPrerenderRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('keyword_prerender_edit');
    }

    public function rules()
    {
        return [
            'url' => [
                'string',
                'nullable',
            ],
            'memento' => [
                'string',
                'nullable',
            ],
        ];
    }
}
