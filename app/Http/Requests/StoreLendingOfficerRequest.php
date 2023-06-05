<?php

namespace App\Http\Requests;

use App\Models\LendingOfficer;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreLendingOfficerRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('lending_officer_create');
    }

    public function rules()
    {
        return [];
    }
}
