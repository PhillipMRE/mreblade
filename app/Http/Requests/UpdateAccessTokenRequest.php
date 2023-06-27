<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;

class UpdateAccessTokenRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('access_token_edit');
    }

    public function rules()
    {
        return [
            'ttl' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
