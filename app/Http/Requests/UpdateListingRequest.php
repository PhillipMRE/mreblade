<?php

namespace App\Http\Requests;

use App\Models\Listing;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateListingRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('listing_edit');
    }

    public function rules()
    {
        return [
            'full_address' => [
                'string',
                'nullable',
            ],
            'street_number' => [
                'string',
                'nullable',
            ],
            'street_name' => [
                'string',
                'nullable',
            ],
            'street_type' => [
                'string',
                'nullable',
            ],
            'street_direction' => [
                'string',
                'nullable',
            ],
            'unit_number' => [
                'string',
                'nullable',
            ],
            'city' => [
                'string',
                'nullable',
            ],
            'state' => [
                'string',
                'nullable',
            ],
            'zip' => [
                'string',
                'nullable',
            ],
            'list_price' => [
                'string',
                'nullable',
            ],
            'selling_price' => [
                'string',
                'nullable',
            ],
            'arch_style' => [
                'string',
                'nullable',
            ],
            'parking_spaces' => [
                'string',
                'nullable',
            ],
            'area' => [
                'string',
                'nullable',
            ],
            'open_house_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'open_house_time' => [
                'date_format:' . config('panel.time_format'),
                'nullable',
            ],
            'latitude' => [
                'string',
                'nullable',
            ],
            'longitude' => [
                'string',
                'nullable',
            ],
            'elem_school' => [
                'string',
                'nullable',
            ],
            'mid_school' => [
                'string',
                'nullable',
            ],
            'high_school' => [
                'string',
                'nullable',
            ],
            'district_school' => [
                'string',
                'nullable',
            ],
            'misc_school' => [
                'string',
                'nullable',
            ],
            'm_1' => [
                'string',
                'nullable',
            ],
            'm_2' => [
                'string',
                'nullable',
            ],
            'm_3' => [
                'string',
                'nullable',
            ],
            'm_4' => [
                'string',
                'nullable',
            ],
            'm_5' => [
                'string',
                'nullable',
            ],
            'm_6' => [
                'string',
                'nullable',
            ],
            'm_7' => [
                'string',
                'nullable',
            ],
            'm_8' => [
                'string',
                'nullable',
            ],
            'm_9' => [
                'string',
                'nullable',
            ],
            'house_type' => [
                'string',
                'nullable',
            ],
            'sale_rent' => [
                'string',
                'nullable',
            ],
            'ts' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'add_status' => [
                'string',
                'nullable',
            ],
            'selling_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'prev_price' => [
                'numeric',
            ],
            'price_change_date' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'class_name' => [
                'string',
                'nullable',
            ],
        ];
    }
}
