<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;

class StoreStatusTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('status_type_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'nullable',
            ],
            'listing_status' => [
                'string',
                'nullable',
            ],
        ];
    }
}
