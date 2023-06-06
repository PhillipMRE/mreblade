@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.state.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.states.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="state">{{ trans('cruds.state.fields.state') }}</label>
                <input class="form-control {{ $errors->has('state') ? 'is-invalid' : '' }}" type="text" name="state" id="state" value="{{ old('state', '') }}">
                @if($errors->has('state'))
                    <div class="invalid-feedback">
                        {{ $errors->first('state') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.state.fields.state_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="board_id">{{ trans('cruds.state.fields.board') }}</label>
                <select class="form-control select2 {{ $errors->has('board') ? 'is-invalid' : '' }}" name="board_id" id="board_id">
                    @foreach($boards as $id => $entry)
                        <option value="{{ $id }}" {{ old('board_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('board'))
                    <div class="invalid-feedback">
                        {{ $errors->first('board') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.state.fields.board_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="abbreviation">{{ trans('cruds.state.fields.abbreviation') }}</label>
                <input class="form-control {{ $errors->has('abbreviation') ? 'is-invalid' : '' }}" type="text" name="abbreviation" id="abbreviation" value="{{ old('abbreviation', '') }}">
                @if($errors->has('abbreviation'))
                    <div class="invalid-feedback">
                        {{ $errors->first('abbreviation') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.state.fields.abbreviation_helper') }}</span>
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