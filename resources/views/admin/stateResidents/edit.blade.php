@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.stateResident.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.state-residents.update", [$stateResident->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="state">{{ trans('cruds.stateResident.fields.state') }}</label>
                <input class="form-control {{ $errors->has('state') ? 'is-invalid' : '' }}" type="text" name="state" id="state" value="{{ old('state', $stateResident->state) }}">
                @if($errors->has('state'))
                    <div class="invalid-feedback">
                        {{ $errors->first('state') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.stateResident.fields.state_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="board_id">{{ trans('cruds.stateResident.fields.board') }}</label>
                <select class="form-control select2 {{ $errors->has('board') ? 'is-invalid' : '' }}" name="board_id" id="board_id">
                    @foreach($boards as $id => $entry)
                        <option value="{{ $id }}" {{ (old('board_id') ? old('board_id') : $stateResident->board->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('board'))
                    <div class="invalid-feedback">
                        {{ $errors->first('board') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.stateResident.fields.board_helper') }}</span>
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