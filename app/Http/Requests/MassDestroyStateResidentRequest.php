<?php

namespace App\Http\Requests;

use App\Models\StateResident;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyStateResidentRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('state_resident_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:state_residents,id',
        ];
    }
}
