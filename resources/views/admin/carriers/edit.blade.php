@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.carrier.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.carriers.update", [$carrier->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="carrier">{{ trans('cruds.carrier.fields.carrier') }}</label>
                <input class="form-control {{ $errors->has('carrier') ? 'is-invalid' : '' }}" type="text" name="carrier" id="carrier" value="{{ old('carrier', $carrier->carrier) }}">
                @if($errors->has('carrier'))
                    <div class="invalid-feedback">
                        {{ $errors->first('carrier') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.carrier.fields.carrier_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="name">{{ trans('cruds.carrier.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $carrier->name) }}">
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.carrier.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="email_to_text">{{ trans('cruds.carrier.fields.email_to_text') }}</label>
                <textarea class="form-control {{ $errors->has('email_to_text') ? 'is-invalid' : '' }}" name="email_to_text" id="email_to_text">{{ old('email_to_text', $carrier->email_to_text) }}</textarea>
                @if($errors->has('email_to_text'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email_to_text') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.carrier.fields.email_to_text_helper') }}</span>
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