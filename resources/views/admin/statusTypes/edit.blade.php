@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.statusType.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.status-types.update", [$statusType->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="name">{{ trans('cruds.statusType.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $statusType->name) }}">
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.statusType.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="listing_status">{{ trans('cruds.statusType.fields.listing_status') }}</label>
                <input class="form-control {{ $errors->has('listing_status') ? 'is-invalid' : '' }}" type="text" name="listing_status" id="listing_status" value="{{ old('listing_status', $statusType->listing_status) }}">
                @if($errors->has('listing_status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('listing_status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.statusType.fields.listing_status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="board_id">{{ trans('cruds.statusType.fields.board') }}</label>
                <select class="form-control select2 {{ $errors->has('board') ? 'is-invalid' : '' }}" name="board_id" id="board_id">
                    @foreach($boards as $id => $entry)
                        <option value="{{ $id }}" {{ (old('board_id') ? old('board_id') : $statusType->board->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('board'))
                    <div class="invalid-feedback">
                        {{ $errors->first('board') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.statusType.fields.board_helper') }}</span>
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