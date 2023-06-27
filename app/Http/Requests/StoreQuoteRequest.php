<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;

class StoreQuoteRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('quote_create');
    }

    public function rules()
    {
        return [
            'purchase_price' => [
                'string',
                'nullable',
            ],
            'down_payment' => [
                'string',
                'nullable',
            ],
            'credit_score' => [
                'string',
                'nullable',
            ],
        ];
    }
}
