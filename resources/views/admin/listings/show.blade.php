@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.listing.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.listings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.listing.fields.id') }}
                        </th>
                        <td>
                            {{ $listing->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listing.fields.published') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $listing->published ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listing.fields.full_address') }}
                        </th>
                        <td>
                            {{ $listing->full_address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listing.fields.street_number') }}
                        </th>
                        <td>
                            {{ $listing->street_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listing.fields.street_name') }}
                        </th>
                        <td>
                            {{ $listing->street_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listing.fields.street_type') }}
                        </th>
                        <td>
                            {{ $listing->street_type }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listing.fields.street_direction') }}
                        </th>
                        <td>
                            {{ $listing->street_direction }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listing.fields.unit_number') }}
                        </th>
                        <td>
                            {{ $listing->unit_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listing.fields.city') }}
                        </th>
                        <td>
                            {{ $listing->city }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listing.fields.state') }}
                        </th>
                        <td>
                            {{ $listing->state }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listing.fields.zip') }}
                        </th>
                        <td>
                            {{ $listing->zip }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listing.fields.list_price') }}
                        </th>
                        <td>
                            {{ $listing->list_price }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listing.fields.selling_price') }}
                        </th>
                        <td>
                            {{ $listing->selling_price }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listing.fields.arch_style') }}
                        </th>
                        <td>
                            {{ $listing->arch_style }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listing.fields.parking_spaces') }}
                        </th>
                        <td>
                            {{ $listing->parking_spaces }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listing.fields.public_remarks') }}
                        </th>
                        <td>
                            {{ $listing->public_remarks }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listing.fields.private_remarks') }}
                        </th>
                        <td>
                            {{ $listing->private_remarks }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listing.fields.area') }}
                        </th>
                        <td>
                            {{ $listing->area }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listing.fields.open_house_date') }}
                        </th>
                        <td>
                            {{ $listing->open_house_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listing.fields.open_house_time') }}
                        </th>
                        <td>
                            {{ $listing->open_house_time }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listing.fields.latitude') }}
                        </th>
                        <td>
                            {{ $listing->latitude }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listing.fields.longitude') }}
                        </th>
                        <td>
                            {{ $listing->longitude }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listing.fields.elem_school') }}
                        </th>
                        <td>
                            {{ $listing->elem_school }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listing.fields.mid_school') }}
                        </th>
                        <td>
                            {{ $listing->mid_school }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listing.fields.high_school') }}
                        </th>
                        <td>
                            {{ $listing->high_school }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listing.fields.district_school') }}
                        </th>
                        <td>
                            {{ $listing->district_school }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listing.fields.misc_school') }}
                        </th>
                        <td>
                            {{ $listing->misc_school }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listing.fields.m_1') }}
                        </th>
                        <td>
                            {{ $listing->m_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listing.fields.m_2') }}
                        </th>
                        <td>
                            {{ $listing->m_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listing.fields.m_3') }}
                        </th>
                        <td>
                            {{ $listing->m_3 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listing.fields.m_4') }}
                        </th>
                        <td>
                            {{ $listing->m_4 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listing.fields.m_5') }}
                        </th>
                        <td>
                            {{ $listing->m_5 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listing.fields.m_6') }}
                        </th>
                        <td>
                            {{ $listing->m_6 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listing.fields.m_7') }}
                        </th>
                        <td>
                            {{ $listing->m_7 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listing.fields.m_8') }}
                        </th>
                        <td>
                            {{ $listing->m_8 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listing.fields.m_9') }}
                        </th>
                        <td>
                            {{ $listing->m_9 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listing.fields.f_1') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $listing->f_1 ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listing.fields.f_2') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $listing->f_2 ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listing.fields.f_3') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $listing->f_3 ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listing.fields.f_4') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $listing->f_4 ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listing.fields.f_5') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $listing->f_5 ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listing.fields.f_6') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $listing->f_6 ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listing.fields.f_7') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $listing->f_7 ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listing.fields.f_8') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $listing->f_8 ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listing.fields.f_9') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $listing->f_9 ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listing.fields.f_10') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $listing->f_10 ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listing.fields.f_11') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $listing->f_11 ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listing.fields.f_12') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $listing->f_12 ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listing.fields.f_13') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $listing->f_13 ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listing.fields.f_14') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $listing->f_14 ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listing.fields.f_15') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $listing->f_15 ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listing.fields.f_16') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $listing->f_16 ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listing.fields.f_17') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $listing->f_17 ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listing.fields.f_18') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $listing->f_18 ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listing.fields.f_19') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $listing->f_19 ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listing.fields.f_20') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $listing->f_20 ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listing.fields.f_21') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $listing->f_21 ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listing.fields.house_type') }}
                        </th>
                        <td>
                            {{ $listing->house_type }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listing.fields.sale_rent') }}
                        </th>
                        <td>
                            {{ $listing->sale_rent }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listing.fields.ts') }}
                        </th>
                        <td>
                            {{ $listing->ts }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listing.fields.add_status') }}
                        </th>
                        <td>
                            {{ $listing->add_status }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listing.fields.selling_date') }}
                        </th>
                        <td>
                            {{ $listing->selling_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listing.fields.prev_price') }}
                        </th>
                        <td>
                            {{ $listing->prev_price }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listing.fields.price_change_date') }}
                        </th>
                        <td>
                            {{ $listing->price_change_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.listing.fields.class_name') }}
                        </th>
                        <td>
                            {{ $listing->class_name }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.listings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection