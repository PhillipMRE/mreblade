@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.customer.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.customers.update", [$customer->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <div class="form-check {{ $errors->has('active') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="active" value="0">
                    <input class="form-check-input" type="checkbox" name="active" id="active" value="1" {{ $customer->active || old('active', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="active">{{ trans('cruds.customer.fields.active') }}</label>
                </div>
                @if($errors->has('active'))
                    <div class="invalid-feedback">
                        {{ $errors->first('active') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.customer.fields.active_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('published') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="published" value="0">
                    <input class="form-check-input" type="checkbox" name="published" id="published" value="1" {{ $customer->published || old('published', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="published">{{ trans('cruds.customer.fields.published') }}</label>
                </div>
                @if($errors->has('published'))
                    <div class="invalid-feedback">
                        {{ $errors->first('published') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.customer.fields.published_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="lending_officer_id">{{ trans('cruds.customer.fields.lending_officer') }}</label>
                <select class="form-control select2 {{ $errors->has('lending_officer') ? 'is-invalid' : '' }}" name="lending_officer_id" id="lending_officer_id">
                    @foreach($lending_officers as $id => $entry)
                        <option value="{{ $id }}" {{ (old('lending_officer_id') ? old('lending_officer_id') : $customer->lending_officer->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('lending_officer'))
                    <div class="invalid-feedback">
                        {{ $errors->first('lending_officer') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.customer.fields.lending_officer_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="name">{{ trans('cruds.customer.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $customer->name) }}">
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.customer.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.customer.fields.description') }}</label>
                <input class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" type="text" name="description" id="description" value="{{ old('description', $customer->description) }}">
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.customer.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="rates">{{ trans('cruds.customer.fields.rates') }}</label>
                <input class="form-control {{ $errors->has('rates') ? 'is-invalid' : '' }}" type="text" name="rates" id="rates" value="{{ old('rates', $customer->rates) }}">
                @if($errors->has('rates'))
                    <div class="invalid-feedback">
                        {{ $errors->first('rates') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.customer.fields.rates_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="email">{{ trans('cruds.customer.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email', $customer->email) }}">
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.customer.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="technical_contact_email">{{ trans('cruds.customer.fields.technical_contact_email') }}</label>
                <input class="form-control {{ $errors->has('technical_contact_email') ? 'is-invalid' : '' }}" type="email" name="technical_contact_email" id="technical_contact_email" value="{{ old('technical_contact_email', $customer->technical_contact_email) }}">
                @if($errors->has('technical_contact_email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('technical_contact_email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.customer.fields.technical_contact_email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="phone">{{ trans('cruds.customer.fields.phone') }}</label>
                <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone" id="phone" value="{{ old('phone', $customer->phone) }}">
                @if($errors->has('phone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('phone') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.customer.fields.phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="license">{{ trans('cruds.customer.fields.license') }}</label>
                <input class="form-control {{ $errors->has('license') ? 'is-invalid' : '' }}" type="text" name="license" id="license" value="{{ old('license', $customer->license) }}">
                @if($errors->has('license'))
                    <div class="invalid-feedback">
                        {{ $errors->first('license') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.customer.fields.license_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="address">{{ trans('cruds.customer.fields.address') }}</label>
                <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text" name="address" id="address" value="{{ old('address', $customer->address) }}">
                @if($errors->has('address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.customer.fields.address_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="city">{{ trans('cruds.customer.fields.city') }}</label>
                <input class="form-control {{ $errors->has('city') ? 'is-invalid' : '' }}" type="text" name="city" id="city" value="{{ old('city', $customer->city) }}">
                @if($errors->has('city'))
                    <div class="invalid-feedback">
                        {{ $errors->first('city') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.customer.fields.city_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="state">{{ trans('cruds.customer.fields.state') }}</label>
                <input class="form-control {{ $errors->has('state') ? 'is-invalid' : '' }}" type="text" name="state" id="state" value="{{ old('state', $customer->state) }}">
                @if($errors->has('state'))
                    <div class="invalid-feedback">
                        {{ $errors->first('state') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.customer.fields.state_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="zip">{{ trans('cruds.customer.fields.zip') }}</label>
                <input class="form-control {{ $errors->has('zip') ? 'is-invalid' : '' }}" type="text" name="zip" id="zip" value="{{ old('zip', $customer->zip) }}">
                @if($errors->has('zip'))
                    <div class="invalid-feedback">
                        {{ $errors->first('zip') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.customer.fields.zip_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="website">{{ trans('cruds.customer.fields.website') }}</label>
                <input class="form-control {{ $errors->has('website') ? 'is-invalid' : '' }}" type="text" name="website" id="website" value="{{ old('website', $customer->website) }}">
                @if($errors->has('website'))
                    <div class="invalid-feedback">
                        {{ $errors->first('website') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.customer.fields.website_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="template">{{ trans('cruds.customer.fields.template') }}</label>
                <textarea class="form-control {{ $errors->has('template') ? 'is-invalid' : '' }}" name="template" id="template">{{ old('template', $customer->template) }}</textarea>
                @if($errors->has('template'))
                    <div class="invalid-feedback">
                        {{ $errors->first('template') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.customer.fields.template_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="level">{{ trans('cruds.customer.fields.level') }}</label>
                <input class="form-control {{ $errors->has('level') ? 'is-invalid' : '' }}" type="text" name="level" id="level" value="{{ old('level', $customer->level) }}">
                @if($errors->has('level'))
                    <div class="invalid-feedback">
                        {{ $errors->first('level') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.customer.fields.level_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="settings">{{ trans('cruds.customer.fields.settings') }}</label>
                <input class="form-control {{ $errors->has('settings') ? 'is-invalid' : '' }}" type="text" name="settings" id="settings" value="{{ old('settings', $customer->settings) }}">
                @if($errors->has('settings'))
                    <div class="invalid-feedback">
                        {{ $errors->first('settings') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.customer.fields.settings_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="disclosure">{{ trans('cruds.customer.fields.disclosure') }}</label>
                <textarea class="form-control {{ $errors->has('disclosure') ? 'is-invalid' : '' }}" name="disclosure" id="disclosure">{{ old('disclosure', $customer->disclosure) }}</textarea>
                @if($errors->has('disclosure'))
                    <div class="invalid-feedback">
                        {{ $errors->first('disclosure') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.customer.fields.disclosure_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="estimated_mortgage_disclosure">{{ trans('cruds.customer.fields.estimated_mortgage_disclosure') }}</label>
                <textarea class="form-control {{ $errors->has('estimated_mortgage_disclosure') ? 'is-invalid' : '' }}" name="estimated_mortgage_disclosure" id="estimated_mortgage_disclosure">{{ old('estimated_mortgage_disclosure', $customer->estimated_mortgage_disclosure) }}</textarea>
                @if($errors->has('estimated_mortgage_disclosure'))
                    <div class="invalid-feedback">
                        {{ $errors->first('estimated_mortgage_disclosure') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.customer.fields.estimated_mortgage_disclosure_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="hubspot">{{ trans('cruds.customer.fields.hubspot') }}</label>
                <input class="form-control {{ $errors->has('hubspot') ? 'is-invalid' : '' }}" type="text" name="hubspot" id="hubspot" value="{{ old('hubspot', $customer->hubspot) }}">
                @if($errors->has('hubspot'))
                    <div class="invalid-feedback">
                        {{ $errors->first('hubspot') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.customer.fields.hubspot_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('block_mre') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="block_mre" value="0">
                    <input class="form-check-input" type="checkbox" name="block_mre" id="block_mre" value="1" {{ $customer->block_mre || old('block_mre', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="block_mre">{{ trans('cruds.customer.fields.block_mre') }}</label>
                </div>
                @if($errors->has('block_mre'))
                    <div class="invalid-feedback">
                        {{ $errors->first('block_mre') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.customer.fields.block_mre_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="block_login_as">{{ trans('cruds.customer.fields.block_login_as') }}</label>
                <input class="form-control {{ $errors->has('block_login_as') ? 'is-invalid' : '' }}" type="number" name="block_login_as" id="block_login_as" value="{{ old('block_login_as', $customer->block_login_as) }}" step="1">
                @if($errors->has('block_login_as'))
                    <div class="invalid-feedback">
                        {{ $errors->first('block_login_as') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.customer.fields.block_login_as_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('ep') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="ep" value="0">
                    <input class="form-check-input" type="checkbox" name="ep" id="ep" value="1" {{ $customer->ep || old('ep', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="ep">{{ trans('cruds.customer.fields.ep') }}</label>
                </div>
                @if($errors->has('ep'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ep') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.customer.fields.ep_helper') }}</span>
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