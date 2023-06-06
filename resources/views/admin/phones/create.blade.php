@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.phone.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.phones.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="number">{{ trans('cruds.phone.fields.number') }}</label>
                <input class="form-control {{ $errors->has('number') ? 'is-invalid' : '' }}" type="text" name="number" id="number" value="{{ old('number', '') }}">
                @if($errors->has('number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('number') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.phone.fields.number_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.phone.fields.phone_type') }}</label>
                <select class="form-control {{ $errors->has('phone_type') ? 'is-invalid' : '' }}" name="phone_type" id="phone_type">
                    <option value disabled {{ old('phone_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Phone::PHONE_TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('phone_type', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('phone_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('phone_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.phone.fields.phone_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="agent_id">{{ trans('cruds.phone.fields.agent') }}</label>
                <select class="form-control select2 {{ $errors->has('agent') ? 'is-invalid' : '' }}" name="agent_id" id="agent_id">
                    @foreach($agents as $id => $entry)
                        <option value="{{ $id }}" {{ old('agent_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('agent'))
                    <div class="invalid-feedback">
                        {{ $errors->first('agent') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.phone.fields.agent_helper') }}</span>
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