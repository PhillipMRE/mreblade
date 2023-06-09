@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.accessToken.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.access-tokens.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="ttl">{{ trans('cruds.accessToken.fields.ttl') }}</label>
                <input class="form-control {{ $errors->has('ttl') ? 'is-invalid' : '' }}" type="number" name="ttl" id="ttl" value="{{ old('ttl', '') }}" step="1">
                @if($errors->has('ttl'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ttl') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.accessToken.fields.ttl_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="user_id">{{ trans('cruds.accessToken.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id">
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.accessToken.fields.user_helper') }}</span>
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