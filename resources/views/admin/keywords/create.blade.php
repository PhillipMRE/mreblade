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
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection