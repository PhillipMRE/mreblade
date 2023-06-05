<?php

namespace App\Http\Requests;

use App\Models\KeywordPrerender;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

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
