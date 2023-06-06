<?php

namespace App\Http\Requests;

use App\Models\StateResident;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateStateResidentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('state_resident_edit');
    }

    public function rules()
    {
        return [
            'state' => [
                'string',
                'nullable',
            ],
        ];
    }
}
