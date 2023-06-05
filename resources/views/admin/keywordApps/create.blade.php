@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.keywordApp.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.keyword-apps.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">{{ trans('cruds.keywordApp.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}">
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.keywordApp.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="short_name">{{ trans('cruds.keywordApp.fields.short_name') }}</label>
                <input class="form-control {{ $errors->has('short_name') ? 'is-invalid' : '' }}" type="text" name="short_name" id="short_name" value="{{ old('short_name', '') }}">
                @if($errors->has('short_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('short_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.keywordApp.fields.short_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.keywordApp.fields.description') }}</label>
                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{{ old('description') }}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.keywordApp.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="template">{{ trans('cruds.keywordApp.fields.template') }}</label>
                <textarea class="form-control {{ $errors->has('template') ? 'is-invalid' : '' }}" name="template" id="template">{{ old('template') }}</textarea>
                @if($errors->has('template'))
                    <div class="invalid-feedback">
                        {{ $errors->first('template') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.keywordApp.fields.template_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="apple_version">{{ trans('cruds.keywordApp.fields.apple_version') }}</label>
                <input class="form-control {{ $errors->has('apple_version') ? 'is-invalid' : '' }}" type="text" name="apple_version" id="apple_version" value="{{ old('apple_version', '') }}">
                @if($errors->has('apple_version'))
                    <div class="invalid-feedback">
                        {{ $errors->first('apple_version') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.keywordApp.fields.apple_version_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="google_version">{{ trans('cruds.keywordApp.fields.google_version') }}</label>
                <input class="form-control {{ $errors->has('google_version') ? 'is-invalid' : '' }}" type="text" name="google_version" id="google_version" value="{{ old('google_version', '') }}">
                @if($errors->has('google_version'))
                    <div class="invalid-feedback">
                        {{ $errors->first('google_version') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.keywordApp.fields.google_version_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="apple_mre_version">{{ trans('cruds.keywordApp.fields.apple_mre_version') }}</label>
                <input class="form-control {{ $errors->has('apple_mre_version') ? 'is-invalid' : '' }}" type="text" name="apple_mre_version" id="apple_mre_version" value="{{ old('apple_mre_version', '') }}">
                @if($errors->has('apple_mre_version'))
                    <div class="invalid-feedback">
                        {{ $errors->first('apple_mre_version') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.keywordApp.fields.apple_mre_version_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="google_mre_version">{{ trans('cruds.keywordApp.fields.google_mre_version') }}</label>
                <input class="form-control {{ $errors->has('google_mre_version') ? 'is-invalid' : '' }}" type="text" name="google_mre_version" id="google_mre_version" value="{{ old('google_mre_version', '') }}">
                @if($errors->has('google_mre_version'))
                    <div class="invalid-feedback">
                        {{ $errors->first('google_mre_version') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.keywordApp.fields.google_mre_version_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="apple">{{ trans('cruds.keywordApp.fields.apple') }}</label>
                <input class="form-control {{ $errors->has('apple') ? 'is-invalid' : '' }}" type="text" name="apple" id="apple" value="{{ old('apple', '') }}">
                @if($errors->has('apple'))
                    <div class="invalid-feedback">
                        {{ $errors->first('apple') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.keywordApp.fields.apple_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="google">{{ trans('cruds.keywordApp.fields.google') }}</label>
                <input class="form-control {{ $errors->has('google') ? 'is-invalid' : '' }}" type="text" name="google" id="google" value="{{ old('google', '') }}">
                @if($errors->has('google'))
                    <div class="invalid-feedback">
                        {{ $errors->first('google') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.keywordApp.fields.google_helper') }}</span>
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