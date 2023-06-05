@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.keywordPrerender.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.keyword-prerenders.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="url">{{ trans('cruds.keywordPrerender.fields.url') }}</label>
                <input class="form-control {{ $errors->has('url') ? 'is-invalid' : '' }}" type="text" name="url" id="url" value="{{ old('url', '') }}">
                @if($errors->has('url'))
                    <div class="invalid-feedback">
                        {{ $errors->first('url') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.keywordPrerender.fields.url_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="memento">{{ trans('cruds.keywordPrerender.fields.memento') }}</label>
                <input class="form-control {{ $errors->has('memento') ? 'is-invalid' : '' }}" type="text" name="memento" id="memento" value="{{ old('memento', '') }}">
                @if($errors->has('memento'))
                    <div class="invalid-feedback">
                        {{ $errors->first('memento') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.keywordPrerender.fields.memento_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="keyword_id">{{ trans('cruds.keywordPrerender.fields.keyword') }}</label>
                <select class="form-control select2 {{ $errors->has('keyword') ? 'is-invalid' : '' }}" name="keyword_id" id="keyword_id">
                    @foreach($keywords as $id => $entry)
                        <option value="{{ $id }}" {{ old('keyword_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('keyword'))
                    <div class="invalid-feedback">
                        {{ $errors->first('keyword') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.keywordPrerender.fields.keyword_helper') }}</span>
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