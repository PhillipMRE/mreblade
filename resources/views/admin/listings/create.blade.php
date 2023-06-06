@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.listing.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.listings.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <div class="form-check {{ $errors->has('published') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="published" value="0">
                    <input class="form-check-input" type="checkbox" name="published" id="published" value="1" {{ old('published', 0) == 1 || old('published') === null ? 'checked' : '' }}>
                    <label class="form-check-label" for="published">{{ trans('cruds.listing.fields.published') }}</label>
                </div>
                @if($errors->has('published'))
                    <div class="invalid-feedback">
                        {{ $errors->first('published') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.listing.fields.published_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="full_address">{{ trans('cruds.listing.fields.full_address') }}</label>
                <input class="form-control {{ $errors->has('full_address') ? 'is-invalid' : '' }}" type="text" name="full_address" id="full_address" value="{{ old('full_address', '') }}">
                @if($errors->has('full_address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('full_address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.listing.fields.full_address_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="street_number">{{ trans('cruds.listing.fields.street_number') }}</label>
                <input class="form-control {{ $errors->has('street_number') ? 'is-invalid' : '' }}" type="text" name="street_number" id="street_number" value="{{ old('street_number', '') }}">
                @if($errors->has('street_number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('street_number') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.listing.fields.street_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="street_name">{{ trans('cruds.listing.fields.street_name') }}</label>
                <input class="form-control {{ $errors->has('street_name') ? 'is-invalid' : '' }}" type="text" name="street_name" id="street_name" value="{{ old('street_name', '') }}">
                @if($errors->has('street_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('street_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.listing.fields.street_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="street_type">{{ trans('cruds.listing.fields.street_type') }}</label>
                <input class="form-control {{ $errors->has('street_type') ? 'is-invalid' : '' }}" type="text" name="street_type" id="street_type" value="{{ old('street_type', '') }}">
                @if($errors->has('street_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('street_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.listing.fields.street_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="street_direction">{{ trans('cruds.listing.fields.street_direction') }}</label>
                <input class="form-control {{ $errors->has('street_direction') ? 'is-invalid' : '' }}" type="text" name="street_direction" id="street_direction" value="{{ old('street_direction', '') }}">
                @if($errors->has('street_direction'))
                    <div class="invalid-feedback">
                        {{ $errors->first('street_direction') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.listing.fields.street_direction_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="unit_number">{{ trans('cruds.listing.fields.unit_number') }}</label>
                <input class="form-control {{ $errors->has('unit_number') ? 'is-invalid' : '' }}" type="text" name="unit_number" id="unit_number" value="{{ old('unit_number', '') }}">
                @if($errors->has('unit_number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('unit_number') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.listing.fields.unit_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="city">{{ trans('cruds.listing.fields.city') }}</label>
                <input class="form-control {{ $errors->has('city') ? 'is-invalid' : '' }}" type="text" name="city" id="city" value="{{ old('city', '') }}">
                @if($errors->has('city'))
                    <div class="invalid-feedback">
                        {{ $errors->first('city') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.listing.fields.city_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="state">{{ trans('cruds.listing.fields.state') }}</label>
                <input class="form-control {{ $errors->has('state') ? 'is-invalid' : '' }}" type="text" name="state" id="state" value="{{ old('state', '') }}">
                @if($errors->has('state'))
                    <div class="invalid-feedback">
                        {{ $errors->first('state') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.listing.fields.state_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="zip">{{ trans('cruds.listing.fields.zip') }}</label>
                <input class="form-control {{ $errors->has('zip') ? 'is-invalid' : '' }}" type="text" name="zip" id="zip" value="{{ old('zip', '') }}">
                @if($errors->has('zip'))
                    <div class="invalid-feedback">
                        {{ $errors->first('zip') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.listing.fields.zip_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="list_price">{{ trans('cruds.listing.fields.list_price') }}</label>
                <input class="form-control {{ $errors->has('list_price') ? 'is-invalid' : '' }}" type="text" name="list_price" id="list_price" value="{{ old('list_price', '') }}">
                @if($errors->has('list_price'))
                    <div class="invalid-feedback">
                        {{ $errors->first('list_price') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.listing.fields.list_price_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="selling_price">{{ trans('cruds.listing.fields.selling_price') }}</label>
                <input class="form-control {{ $errors->has('selling_price') ? 'is-invalid' : '' }}" type="text" name="selling_price" id="selling_price" value="{{ old('selling_price', '') }}">
                @if($errors->has('selling_price'))
                    <div class="invalid-feedback">
                        {{ $errors->first('selling_price') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.listing.fields.selling_price_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="arch_style">{{ trans('cruds.listing.fields.arch_style') }}</label>
                <input class="form-control {{ $errors->has('arch_style') ? 'is-invalid' : '' }}" type="text" name="arch_style" id="arch_style" value="{{ old('arch_style', '') }}">
                @if($errors->has('arch_style'))
                    <div class="invalid-feedback">
                        {{ $errors->first('arch_style') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.listing.fields.arch_style_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="parking_spaces">{{ trans('cruds.listing.fields.parking_spaces') }}</label>
                <input class="form-control {{ $errors->has('parking_spaces') ? 'is-invalid' : '' }}" type="text" name="parking_spaces" id="parking_spaces" value="{{ old('parking_spaces', '') }}">
                @if($errors->has('parking_spaces'))
                    <div class="invalid-feedback">
                        {{ $errors->first('parking_spaces') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.listing.fields.parking_spaces_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="public_remarks">{{ trans('cruds.listing.fields.public_remarks') }}</label>
                <textarea class="form-control {{ $errors->has('public_remarks') ? 'is-invalid' : '' }}" name="public_remarks" id="public_remarks">{{ old('public_remarks') }}</textarea>
                @if($errors->has('public_remarks'))
                    <div class="invalid-feedback">
                        {{ $errors->first('public_remarks') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.listing.fields.public_remarks_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="private_remarks">{{ trans('cruds.listing.fields.private_remarks') }}</label>
                <textarea class="form-control {{ $errors->has('private_remarks') ? 'is-invalid' : '' }}" name="private_remarks" id="private_remarks">{{ old('private_remarks') }}</textarea>
                @if($errors->has('private_remarks'))
                    <div class="invalid-feedback">
                        {{ $errors->first('private_remarks') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.listing.fields.private_remarks_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="area">{{ trans('cruds.listing.fields.area') }}</label>
                <input class="form-control {{ $errors->has('area') ? 'is-invalid' : '' }}" type="text" name="area" id="area" value="{{ old('area', '') }}">
                @if($errors->has('area'))
                    <div class="invalid-feedback">
                        {{ $errors->first('area') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.listing.fields.area_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="open_house_date">{{ trans('cruds.listing.fields.open_house_date') }}</label>
                <input class="form-control date {{ $errors->has('open_house_date') ? 'is-invalid' : '' }}" type="text" name="open_house_date" id="open_house_date" value="{{ old('open_house_date') }}">
                @if($errors->has('open_house_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('open_house_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.listing.fields.open_house_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="open_house_time">{{ trans('cruds.listing.fields.open_house_time') }}</label>
                <input class="form-control timepicker {{ $errors->has('open_house_time') ? 'is-invalid' : '' }}" type="text" name="open_house_time" id="open_house_time" value="{{ old('open_house_time') }}">
                @if($errors->has('open_house_time'))
                    <div class="invalid-feedback">
                        {{ $errors->first('open_house_time') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.listing.fields.open_house_time_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="latitude">{{ trans('cruds.listing.fields.latitude') }}</label>
                <input class="form-control {{ $errors->has('latitude') ? 'is-invalid' : '' }}" type="text" name="latitude" id="latitude" value="{{ old('latitude', '') }}">
                @if($errors->has('latitude'))
                    <div class="invalid-feedback">
                        {{ $errors->first('latitude') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.listing.fields.latitude_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="longitude">{{ trans('cruds.listing.fields.longitude') }}</label>
                <input class="form-control {{ $errors->has('longitude') ? 'is-invalid' : '' }}" type="text" name="longitude" id="longitude" value="{{ old('longitude', '') }}">
                @if($errors->has('longitude'))
                    <div class="invalid-feedback">
                        {{ $errors->first('longitude') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.listing.fields.longitude_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="elem_school">{{ trans('cruds.listing.fields.elem_school') }}</label>
                <input class="form-control {{ $errors->has('elem_school') ? 'is-invalid' : '' }}" type="text" name="elem_school" id="elem_school" value="{{ old('elem_school', '') }}">
                @if($errors->has('elem_school'))
                    <div class="invalid-feedback">
                        {{ $errors->first('elem_school') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.listing.fields.elem_school_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mid_school">{{ trans('cruds.listing.fields.mid_school') }}</label>
                <input class="form-control {{ $errors->has('mid_school') ? 'is-invalid' : '' }}" type="text" name="mid_school" id="mid_school" value="{{ old('mid_school', '') }}">
                @if($errors->has('mid_school'))
                    <div class="invalid-feedback">
                        {{ $errors->first('mid_school') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.listing.fields.mid_school_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="high_school">{{ trans('cruds.listing.fields.high_school') }}</label>
                <input class="form-control {{ $errors->has('high_school') ? 'is-invalid' : '' }}" type="text" name="high_school" id="high_school" value="{{ old('high_school', '') }}">
                @if($errors->has('high_school'))
                    <div class="invalid-feedback">
                        {{ $errors->first('high_school') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.listing.fields.high_school_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="district_school">{{ trans('cruds.listing.fields.district_school') }}</label>
                <input class="form-control {{ $errors->has('district_school') ? 'is-invalid' : '' }}" type="text" name="district_school" id="district_school" value="{{ old('district_school', '') }}">
                @if($errors->has('district_school'))
                    <div class="invalid-feedback">
                        {{ $errors->first('district_school') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.listing.fields.district_school_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="misc_school">{{ trans('cruds.listing.fields.misc_school') }}</label>
                <input class="form-control {{ $errors->has('misc_school') ? 'is-invalid' : '' }}" type="text" name="misc_school" id="misc_school" value="{{ old('misc_school', '') }}">
                @if($errors->has('misc_school'))
                    <div class="invalid-feedback">
                        {{ $errors->first('misc_school') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.listing.fields.misc_school_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="m_1">{{ trans('cruds.listing.fields.m_1') }}</label>
                <input class="form-control {{ $errors->has('m_1') ? 'is-invalid' : '' }}" type="text" name="m_1" id="m_1" value="{{ old('m_1', '') }}">
                @if($errors->has('m_1'))
                    <div class="invalid-feedback">
                        {{ $errors->first('m_1') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.listing.fields.m_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="m_2">{{ trans('cruds.listing.fields.m_2') }}</label>
                <input class="form-control {{ $errors->has('m_2') ? 'is-invalid' : '' }}" type="text" name="m_2" id="m_2" value="{{ old('m_2', '') }}">
                @if($errors->has('m_2'))
                    <div class="invalid-feedback">
                        {{ $errors->first('m_2') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.listing.fields.m_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="m_3">{{ trans('cruds.listing.fields.m_3') }}</label>
                <input class="form-control {{ $errors->has('m_3') ? 'is-invalid' : '' }}" type="text" name="m_3" id="m_3" value="{{ old('m_3', '') }}">
                @if($errors->has('m_3'))
                    <div class="invalid-feedback">
                        {{ $errors->first('m_3') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.listing.fields.m_3_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="m_4">{{ trans('cruds.listing.fields.m_4') }}</label>
                <input class="form-control {{ $errors->has('m_4') ? 'is-invalid' : '' }}" type="text" name="m_4" id="m_4" value="{{ old('m_4', '') }}">
                @if($errors->has('m_4'))
                    <div class="invalid-feedback">
                        {{ $errors->first('m_4') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.listing.fields.m_4_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="m_5">{{ trans('cruds.listing.fields.m_5') }}</label>
                <input class="form-control {{ $errors->has('m_5') ? 'is-invalid' : '' }}" type="text" name="m_5" id="m_5" value="{{ old('m_5', '') }}">
                @if($errors->has('m_5'))
                    <div class="invalid-feedback">
                        {{ $errors->first('m_5') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.listing.fields.m_5_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="m_6">{{ trans('cruds.listing.fields.m_6') }}</label>
                <input class="form-control {{ $errors->has('m_6') ? 'is-invalid' : '' }}" type="text" name="m_6" id="m_6" value="{{ old('m_6', '') }}">
                @if($errors->has('m_6'))
                    <div class="invalid-feedback">
                        {{ $errors->first('m_6') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.listing.fields.m_6_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="m_7">{{ trans('cruds.listing.fields.m_7') }}</label>
                <input class="form-control {{ $errors->has('m_7') ? 'is-invalid' : '' }}" type="text" name="m_7" id="m_7" value="{{ old('m_7', '') }}">
                @if($errors->has('m_7'))
                    <div class="invalid-feedback">
                        {{ $errors->first('m_7') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.listing.fields.m_7_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="m_8">{{ trans('cruds.listing.fields.m_8') }}</label>
                <input class="form-control {{ $errors->has('m_8') ? 'is-invalid' : '' }}" type="text" name="m_8" id="m_8" value="{{ old('m_8', '') }}">
                @if($errors->has('m_8'))
                    <div class="invalid-feedback">
                        {{ $errors->first('m_8') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.listing.fields.m_8_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="m_9">{{ trans('cruds.listing.fields.m_9') }}</label>
                <input class="form-control {{ $errors->has('m_9') ? 'is-invalid' : '' }}" type="text" name="m_9" id="m_9" value="{{ old('m_9', '') }}">
                @if($errors->has('m_9'))
                    <div class="invalid-feedback">
                        {{ $errors->first('m_9') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.listing.fields.m_9_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('f_1') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="f_1" value="0">
                    <input class="form-check-input" type="checkbox" name="f_1" id="f_1" value="1" {{ old('f_1', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="f_1">{{ trans('cruds.listing.fields.f_1') }}</label>
                </div>
                @if($errors->has('f_1'))
                    <div class="invalid-feedback">
                        {{ $errors->first('f_1') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.listing.fields.f_1_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('f_2') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="f_2" value="0">
                    <input class="form-check-input" type="checkbox" name="f_2" id="f_2" value="1" {{ old('f_2', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="f_2">{{ trans('cruds.listing.fields.f_2') }}</label>
                </div>
                @if($errors->has('f_2'))
                    <div class="invalid-feedback">
                        {{ $errors->first('f_2') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.listing.fields.f_2_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('f_3') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="f_3" value="0">
                    <input class="form-check-input" type="checkbox" name="f_3" id="f_3" value="1" {{ old('f_3', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="f_3">{{ trans('cruds.listing.fields.f_3') }}</label>
                </div>
                @if($errors->has('f_3'))
                    <div class="invalid-feedback">
                        {{ $errors->first('f_3') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.listing.fields.f_3_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('f_4') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="f_4" value="0">
                    <input class="form-check-input" type="checkbox" name="f_4" id="f_4" value="1" {{ old('f_4', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="f_4">{{ trans('cruds.listing.fields.f_4') }}</label>
                </div>
                @if($errors->has('f_4'))
                    <div class="invalid-feedback">
                        {{ $errors->first('f_4') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.listing.fields.f_4_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('f_5') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="f_5" value="0">
                    <input class="form-check-input" type="checkbox" name="f_5" id="f_5" value="1" {{ old('f_5', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="f_5">{{ trans('cruds.listing.fields.f_5') }}</label>
                </div>
                @if($errors->has('f_5'))
                    <div class="invalid-feedback">
                        {{ $errors->first('f_5') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.listing.fields.f_5_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('f_6') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="f_6" value="0">
                    <input class="form-check-input" type="checkbox" name="f_6" id="f_6" value="1" {{ old('f_6', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="f_6">{{ trans('cruds.listing.fields.f_6') }}</label>
                </div>
                @if($errors->has('f_6'))
                    <div class="invalid-feedback">
                        {{ $errors->first('f_6') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.listing.fields.f_6_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('f_7') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="f_7" value="0">
                    <input class="form-check-input" type="checkbox" name="f_7" id="f_7" value="1" {{ old('f_7', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="f_7">{{ trans('cruds.listing.fields.f_7') }}</label>
                </div>
                @if($errors->has('f_7'))
                    <div class="invalid-feedback">
                        {{ $errors->first('f_7') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.listing.fields.f_7_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('f_8') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="f_8" value="0">
                    <input class="form-check-input" type="checkbox" name="f_8" id="f_8" value="1" {{ old('f_8', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="f_8">{{ trans('cruds.listing.fields.f_8') }}</label>
                </div>
                @if($errors->has('f_8'))
                    <div class="invalid-feedback">
                        {{ $errors->first('f_8') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.listing.fields.f_8_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('f_9') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="f_9" value="0">
                    <input class="form-check-input" type="checkbox" name="f_9" id="f_9" value="1" {{ old('f_9', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="f_9">{{ trans('cruds.listing.fields.f_9') }}</label>
                </div>
                @if($errors->has('f_9'))
                    <div class="invalid-feedback">
                        {{ $errors->first('f_9') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.listing.fields.f_9_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('f_10') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="f_10" value="0">
                    <input class="form-check-input" type="checkbox" name="f_10" id="f_10" value="1" {{ old('f_10', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="f_10">{{ trans('cruds.listing.fields.f_10') }}</label>
                </div>
                @if($errors->has('f_10'))
                    <div class="invalid-feedback">
                        {{ $errors->first('f_10') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.listing.fields.f_10_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('f_11') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="f_11" value="0">
                    <input class="form-check-input" type="checkbox" name="f_11" id="f_11" value="1" {{ old('f_11', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="f_11">{{ trans('cruds.listing.fields.f_11') }}</label>
                </div>
                @if($errors->has('f_11'))
                    <div class="invalid-feedback">
                        {{ $errors->first('f_11') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.listing.fields.f_11_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('f_12') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="f_12" value="0">
                    <input class="form-check-input" type="checkbox" name="f_12" id="f_12" value="1" {{ old('f_12', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="f_12">{{ trans('cruds.listing.fields.f_12') }}</label>
                </div>
                @if($errors->has('f_12'))
                    <div class="invalid-feedback">
                        {{ $errors->first('f_12') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.listing.fields.f_12_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('f_13') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="f_13" value="0">
                    <input class="form-check-input" type="checkbox" name="f_13" id="f_13" value="1" {{ old('f_13', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="f_13">{{ trans('cruds.listing.fields.f_13') }}</label>
                </div>
                @if($errors->has('f_13'))
                    <div class="invalid-feedback">
                        {{ $errors->first('f_13') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.listing.fields.f_13_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('f_14') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="f_14" value="0">
                    <input class="form-check-input" type="checkbox" name="f_14" id="f_14" value="1" {{ old('f_14', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="f_14">{{ trans('cruds.listing.fields.f_14') }}</label>
                </div>
                @if($errors->has('f_14'))
                    <div class="invalid-feedback">
                        {{ $errors->first('f_14') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.listing.fields.f_14_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('f_15') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="f_15" value="0">
                    <input class="form-check-input" type="checkbox" name="f_15" id="f_15" value="1" {{ old('f_15', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="f_15">{{ trans('cruds.listing.fields.f_15') }}</label>
                </div>
                @if($errors->has('f_15'))
                    <div class="invalid-feedback">
                        {{ $errors->first('f_15') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.listing.fields.f_15_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('f_16') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="f_16" value="0">
                    <input class="form-check-input" type="checkbox" name="f_16" id="f_16" value="1" {{ old('f_16', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="f_16">{{ trans('cruds.listing.fields.f_16') }}</label>
                </div>
                @if($errors->has('f_16'))
                    <div class="invalid-feedback">
                        {{ $errors->first('f_16') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.listing.fields.f_16_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('f_17') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="f_17" value="0">
                    <input class="form-check-input" type="checkbox" name="f_17" id="f_17" value="1" {{ old('f_17', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="f_17">{{ trans('cruds.listing.fields.f_17') }}</label>
                </div>
                @if($errors->has('f_17'))
                    <div class="invalid-feedback">
                        {{ $errors->first('f_17') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.listing.fields.f_17_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('f_18') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="f_18" value="0">
                    <input class="form-check-input" type="checkbox" name="f_18" id="f_18" value="1" {{ old('f_18', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="f_18">{{ trans('cruds.listing.fields.f_18') }}</label>
                </div>
                @if($errors->has('f_18'))
                    <div class="invalid-feedback">
                        {{ $errors->first('f_18') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.listing.fields.f_18_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('f_19') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="f_19" value="0">
                    <input class="form-check-input" type="checkbox" name="f_19" id="f_19" value="1" {{ old('f_19', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="f_19">{{ trans('cruds.listing.fields.f_19') }}</label>
                </div>
                @if($errors->has('f_19'))
                    <div class="invalid-feedback">
                        {{ $errors->first('f_19') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.listing.fields.f_19_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('f_20') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="f_20" value="0">
                    <input class="form-check-input" type="checkbox" name="f_20" id="f_20" value="1" {{ old('f_20', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="f_20">{{ trans('cruds.listing.fields.f_20') }}</label>
                </div>
                @if($errors->has('f_20'))
                    <div class="invalid-feedback">
                        {{ $errors->first('f_20') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.listing.fields.f_20_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('f_21') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="f_21" value="0">
                    <input class="form-check-input" type="checkbox" name="f_21" id="f_21" value="1" {{ old('f_21', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="f_21">{{ trans('cruds.listing.fields.f_21') }}</label>
                </div>
                @if($errors->has('f_21'))
                    <div class="invalid-feedback">
                        {{ $errors->first('f_21') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.listing.fields.f_21_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="house_type">{{ trans('cruds.listing.fields.house_type') }}</label>
                <input class="form-control {{ $errors->has('house_type') ? 'is-invalid' : '' }}" type="text" name="house_type" id="house_type" value="{{ old('house_type', 'SF') }}">
                @if($errors->has('house_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('house_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.listing.fields.house_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="sale_rent">{{ trans('cruds.listing.fields.sale_rent') }}</label>
                <input class="form-control {{ $errors->has('sale_rent') ? 'is-invalid' : '' }}" type="text" name="sale_rent" id="sale_rent" value="{{ old('sale_rent', 'S') }}">
                @if($errors->has('sale_rent'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sale_rent') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.listing.fields.sale_rent_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ts">{{ trans('cruds.listing.fields.ts') }}</label>
                <input class="form-control datetime {{ $errors->has('ts') ? 'is-invalid' : '' }}" type="text" name="ts" id="ts" value="{{ old('ts') }}">
                @if($errors->has('ts'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ts') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.listing.fields.ts_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="add_status">{{ trans('cruds.listing.fields.add_status') }}</label>
                <input class="form-control {{ $errors->has('add_status') ? 'is-invalid' : '' }}" type="text" name="add_status" id="add_status" value="{{ old('add_status', 'NEW') }}">
                @if($errors->has('add_status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('add_status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.listing.fields.add_status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="selling_date">{{ trans('cruds.listing.fields.selling_date') }}</label>
                <input class="form-control date {{ $errors->has('selling_date') ? 'is-invalid' : '' }}" type="text" name="selling_date" id="selling_date" value="{{ old('selling_date') }}">
                @if($errors->has('selling_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('selling_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.listing.fields.selling_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="prev_price">{{ trans('cruds.listing.fields.prev_price') }}</label>
                <input class="form-control {{ $errors->has('prev_price') ? 'is-invalid' : '' }}" type="number" name="prev_price" id="prev_price" value="{{ old('prev_price', '') }}" step="0.01">
                @if($errors->has('prev_price'))
                    <div class="invalid-feedback">
                        {{ $errors->first('prev_price') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.listing.fields.prev_price_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="price_change_date">{{ trans('cruds.listing.fields.price_change_date') }}</label>
                <input class="form-control datetime {{ $errors->has('price_change_date') ? 'is-invalid' : '' }}" type="text" name="price_change_date" id="price_change_date" value="{{ old('price_change_date') }}">
                @if($errors->has('price_change_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('price_change_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.listing.fields.price_change_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="class_name">{{ trans('cruds.listing.fields.class_name') }}</label>
                <input class="form-control {{ $errors->has('class_name') ? 'is-invalid' : '' }}" type="text" name="class_name" id="class_name" value="{{ old('class_name', '') }}">
                @if($errors->has('class_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('class_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.listing.fields.class_name_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection