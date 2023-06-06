<?php

namespace App\Http\Requests;

use App\Models\Chart;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateChartRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('chart_edit');
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
