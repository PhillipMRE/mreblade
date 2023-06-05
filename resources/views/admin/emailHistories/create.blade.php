@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.emailHistory.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.email-histories.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="recipient_email">{{ trans('cruds.emailHistory.fields.recipient_email') }}</label>
                <input class="form-control {{ $errors->has('recipient_email') ? 'is-invalid' : '' }}" type="email" name="recipient_email" id="recipient_email" value="{{ old('recipient_email') }}">
                @if($errors->has('recipient_email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('recipient_email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.emailHistory.fields.recipient_email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="sender_email">{{ trans('cruds.emailHistory.fields.sender_email') }}</label>
                <input class="form-control {{ $errors->has('sender_email') ? 'is-invalid' : '' }}" type="email" name="sender_email" id="sender_email" value="{{ old('sender_email') }}">
                @if($errors->has('sender_email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sender_email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.emailHistory.fields.sender_email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="subject">{{ trans('cruds.emailHistory.fields.subject') }}</label>
                <input class="form-control {{ $errors->has('subject') ? 'is-invalid' : '' }}" type="text" name="subject" id="subject" value="{{ old('subject', '') }}">
                @if($errors->has('subject'))
                    <div class="invalid-feedback">
                        {{ $errors->first('subject') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.emailHistory.fields.subject_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="state">{{ trans('cruds.emailHistory.fields.state') }}</label>
                <input class="form-control {{ $errors->has('state') ? 'is-invalid' : '' }}" type="text" name="state" id="state" value="{{ old('state', '') }}">
                @if($errors->has('state'))
                    <div class="invalid-feedback">
                        {{ $errors->first('state') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.emailHistory.fields.state_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="opens">{{ trans('cruds.emailHistory.fields.opens') }}</label>
                <input class="form-control {{ $errors->has('opens') ? 'is-invalid' : '' }}" type="text" name="opens" id="opens" value="{{ old('opens', '') }}">
                @if($errors->has('opens'))
                    <div class="invalid-feedback">
                        {{ $errors->first('opens') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.emailHistory.fields.opens_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="clicks">{{ trans('cruds.emailHistory.fields.clicks') }}</label>
                <input class="form-control {{ $errors->has('clicks') ? 'is-invalid' : '' }}" type="text" name="clicks" id="clicks" value="{{ old('clicks', '') }}">
                @if($errors->has('clicks'))
                    <div class="invalid-feedback">
                        {{ $errors->first('clicks') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.emailHistory.fields.clicks_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ts">{{ trans('cruds.emailHistory.fields.ts') }}</label>
                <input class="form-control datetime {{ $errors->has('ts') ? 'is-invalid' : '' }}" type="text" name="ts" id="ts" value="{{ old('ts') }}">
                @if($errors->has('ts'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ts') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.emailHistory.fields.ts_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="customer_id">{{ trans('cruds.emailHistory.fields.customer') }}</label>
                <select class="form-control select2 {{ $errors->has('customer') ? 'is-invalid' : '' }}" name="customer_id" id="customer_id">
                    @foreach($customers as $id => $entry)
                        <option value="{{ $id }}" {{ old('customer_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('customer'))
                    <div class="invalid-feedback">
                        {{ $errors->first('customer') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.emailHistory.fields.customer_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="msg">{{ trans('cruds.emailHistory.fields.msg') }}</label>
                <textarea class="form-control {{ $errors->has('msg') ? 'is-invalid' : '' }}" name="msg" id="msg">{{ old('msg') }}</textarea>
                @if($errors->has('msg'))
                    <div class="invalid-feedback">
                        {{ $errors->first('msg') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.emailHistory.fields.msg_helper') }}</span>
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