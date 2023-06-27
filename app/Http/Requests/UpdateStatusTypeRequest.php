<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;

class UpdateStatusTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('status_type_edit');
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
