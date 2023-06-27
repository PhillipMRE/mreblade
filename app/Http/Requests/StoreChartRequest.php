<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;

class StoreChartRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('chart_create');
    }

    public function rules()
    {
        return [
            'tag' => [
                'string',
                'nullable',
            ],
            'label' => [
                'string',
                'nullable',
            ],
            'chart_model' => [
                'string',
                'nullable',
            ],
        ];
    }
}
