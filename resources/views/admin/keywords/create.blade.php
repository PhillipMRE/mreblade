@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.keyword.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.keywords.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">{{ trans('cruds.keyword.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}">
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.keyword.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="template">{{ trans('cruds.keyword.fields.template') }}</label>
                <textarea class="form-control {{ $errors->has('template') ? 'is-invalid' : '' }}" name="template" id="template">{{ old('template') }}</textarea>
                @if($errors->has('template'))
                    <div class="invalid-feedback">
                        {{ $errors->first('template') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.keyword.fields.template_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="map">{{ trans('cruds.keyword.fields.map') }}</label>
                <textarea class="form-control {{ $errors->has('map') ? 'is-invalid' : '' }}" name="map" id="map">{{ old('map') }}</textarea>
                @if($errors->has('map'))
                    <div class="invalid-feedback">
                        {{ $errors->first('map') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.keyword.fields.map_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="house_types">{{ trans('cruds.keyword.fields.house_types') }}</label>
                <textarea class="form-control {{ $errors->has('house_types') ? 'is-invalid' : '' }}" name="house_types" id="house_types">{{ old('house_types') }}</textarea>
                @if($errors->has('house_types'))
                    <div class="invalid-feedback">
                        {{ $errors->first('house_types') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.keyword.fields.house_types_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="status_types">{{ trans('cruds.keyword.fields.status_types') }}</label>
                <textarea class="form-control {{ $errors->has('status_types') ? 'is-invalid' : '' }}" name="status_types" id="status_types">{{ old('status_types') }}</textarea>
                @if($errors->has('status_types'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status_types') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.keyword.fields.status_types_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="shortcode">{{ trans('cruds.keyword.fields.shortcode') }}</label>
                <input class="form-control {{ $errors->has('shortcode') ? 'is-invalid' : '' }}" type="text" name="shortcode" id="shortcode" value="{{ old('shortcode', '') }}">
                @if($errors->has('shortcode'))
                    <div class="invalid-feedback">
                        {{ $errors->first('shortcode') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.keyword.fields.shortcode_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="listing_settings">{{ trans('cruds.keyword.fields.listing_settings') }}</label>
                <textarea class="form-control {{ $errors->has('listing_settings') ? 'is-invalid' : '' }}" name="listing_settings" id="listing_settings">{{ old('listing_settings') }}</textarea>
                @if($errors->has('listing_settings'))
                    <div class="invalid-feedback">
                        {{ $errors->first('listing_settings') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.keyword.fields.listing_settings_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="sponsor_only">{{ trans('cruds.keyword.fields.sponsor_only') }}</label>
                <input class="form-control {{ $errors->has('sponsor_only') ? 'is-invalid' : '' }}" type="text" name="sponsor_only" id="sponsor_only" value="{{ old('sponsor_only', '') }}">
                @if($errors->has('sponsor_only'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sponsor_only') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.keyword.fields.sponsor_only_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="agents">{{ trans('cruds.keyword.fields.agents') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('agents') ? 'is-invalid' : '' }}" name="agents[]" id="agents" multiple>
                    @foreach($agents as $id => $agent)
                        <option value="{{ $id }}" {{ in_array($id, old('agents', [])) ? 'selected' : '' }}>{{ $agent }}</option>
                    @endforeach
                </select>
                @if($errors->has('agents'))
                    <div class="invalid-feedback">
                        {{ $errors->first('agents') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.keyword.fields.agents_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="customer_id">{{ trans('cruds.keyword.fields.customer') }}</label>
                <select class="form-control select2 {{ $errors->has('customer') ? 'is-invalid' : '' }}" name="customer_id" id="customer_id">
                    @foreach($customers as $id => $entry)
                        <option value="{{ $id }}" {{ old('customer_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('customer'))
                    <div class="invalid-feedback">
                        {{ $errors->first('customer') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.keyword.fields.customer_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('show_solds') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="show_solds" value="0">
                    <input class="form-check-input" type="checkbox" name="show_solds" id="show_solds" value="1" {{ old('show_solds', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="show_solds">{{ trans('cruds.keyword.fields.show_solds') }}</label>
                </div>
                @if($errors->has('show_solds'))
                    <div class="invalid-feedback">
                        {{ $errors->first('show_solds') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.keyword.fields.show_solds_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('use_version_5') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="use_version_5" value="0">
                    <input class="form-check-input" type="checkbox" name="use_version_5" id="use_version_5" value="1" {{ old('use_version_5', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="use_version_5">{{ trans('cruds.keyword.fields.use_version_5') }}</label>
                </div>
                @if($errors->has('use_version_5'))
                    <div class="invalid-feedback">
                        {{ $errors->first('use_version_5') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.keyword.fields.use_version_5_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('active') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="active" value="0">
                    <input class="form-check-input" type="checkbox" name="active" id="active" value="1" {{ old('active', 0) == 1 || old('active') === null ? 'checked' : '' }}>
                    <label class="form-check-label" for="active">{{ trans('cruds.keyword.fields.active') }}</label>
                </div>
                @if($errors->has('active'))
                    <div class="invalid-feedback">
                        {{ $errors->first('active') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.keyword.fields.active_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('listhub') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="listhub" value="0">
                    <input class="form-check-input" type="checkbox" name="listhub" id="listhub" value="1" {{ old('listhub', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="listhub">{{ trans('cruds.keyword.fields.listhub') }}</label>
                </div>
                @if($errors->has('listhub'))
                    <div class="invalid-feedback">
                        {{ $errors->first('listhub') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.keyword.fields.listhub_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="lending_officer_id">{{ trans('cruds.keyword.fields.lending_officer') }}</label>
                <select class="form-control select2 {{ $errors->has('lending_officer') ? 'is-invalid' : '' }}" name="lending_officer_id" id="lending_officer_id">
                    @foreach($lending_officers as $id => $entry)
                        <option value="{{ $id }}" {{ old('lending_officer_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('lending_officer'))
                    <div class="invalid-feedback">
                        {{ $errors->first('lending_officer') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.keyword.fields.lending_officer_helper') }}</span>
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