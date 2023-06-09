@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.note.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.notes.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>{{ trans('cruds.note.fields.note_type') }}</label>
                <select class="form-control {{ $errors->has('note_type') ? 'is-invalid' : '' }}" name="note_type" id="note_type">
                    <option value disabled {{ old('note_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Note::NOTE_TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('note_type', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('note_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('note_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.note.fields.note_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="note">{{ trans('cruds.note.fields.note') }}</label>
                <textarea class="form-control {{ $errors->has('note') ? 'is-invalid' : '' }}" name="note" id="note">{{ old('note') }}</textarea>
                @if($errors->has('note'))
                    <div class="invalid-feedback">
                        {{ $errors->first('note') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.note.fields.note_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="listing_id">{{ trans('cruds.note.fields.listing') }}</label>
                <select class="form-control select2 {{ $errors->has('listing') ? 'is-invalid' : '' }}" name="listing_id" id="listing_id">
                    @foreach($listings as $id => $entry)
                        <option value="{{ $id }}" {{ old('listing_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('listing'))
                    <div class="invalid-feedback">
                        {{ $errors->first('listing') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.note.fields.listing_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="client_id">{{ trans('cruds.note.fields.client') }}</label>
                <select class="form-control select2 {{ $errors->has('client') ? 'is-invalid' : '' }}" name="client_id" id="client_id">
                    @foreach($clients as $id => $entry)
                        <option value="{{ $id }}" {{ old('client_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('client'))
                    <div class="invalid-feedback">
                        {{ $errors->first('client') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.note.fields.client_helper') }}</span>
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