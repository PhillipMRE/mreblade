<?php

namespace App\Http\Requests;

use App\Models\ListingPocket;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyListingPocketRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('listing_pocket_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:listing_pockets,id',
        ];
    }
}
