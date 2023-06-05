@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.disclaimerVariable.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.disclaimer-variables.update", [$disclaimerVariable->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="name">{{ trans('cruds.disclaimerVariable.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $disclaimerVariable->name) }}">
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.disclaimerVariable.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.disclaimerVariable.fields.description') }}</label>
                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{{ old('description', $disclaimerVariable->description) }}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.disclaimerVariable.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="path">{{ trans('cruds.disclaimerVariable.fields.path') }}</label>
                <input class="form-control {{ $errors->has('path') ? 'is-invalid' : '' }}" type="text" name="path" id="path" value="{{ old('path', $disclaimerVariable->path) }}">
                @if($errors->has('path'))
                    <div class="invalid-feedback">
                        {{ $errors->first('path') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.disclaimerVariable.fields.path_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="interpolator">{{ trans('cruds.disclaimerVariable.fields.interpolator') }}</label>
                <textarea class="form-control {{ $errors->has('interpolator') ? 'is-invalid' : '' }}" name="interpolator" id="interpolator">{{ old('interpolator', $disclaimerVariable->interpolator) }}</textarea>
                @if($errors->has('interpolator'))
                    <div class="invalid-feedback">
                        {{ $errors->first('interpolator') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.disclaimerVariable.fields.interpolator_helper') }}</span>
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