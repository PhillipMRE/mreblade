@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.smsTemplate.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.sms-templates.update", [$smsTemplate->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="nickname">{{ trans('cruds.smsTemplate.fields.nickname') }}</label>
                <input class="form-control {{ $errors->has('nickname') ? 'is-invalid' : '' }}" type="text" name="nickname" id="nickname" value="{{ old('nickname', $smsTemplate->nickname) }}">
                @if($errors->has('nickname'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nickname') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.smsTemplate.fields.nickname_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="app_share_buyer">{{ trans('cruds.smsTemplate.fields.app_share_buyer') }}</label>
                <textarea class="form-control {{ $errors->has('app_share_buyer') ? 'is-invalid' : '' }}" name="app_share_buyer" id="app_share_buyer">{{ old('app_share_buyer', $smsTemplate->app_share_buyer) }}</textarea>
                @if($errors->has('app_share_buyer'))
                    <div class="invalid-feedback">
                        {{ $errors->first('app_share_buyer') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.smsTemplate.fields.app_share_buyer_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="app_share_agent">{{ trans('cruds.smsTemplate.fields.app_share_agent') }}</label>
                <textarea class="form-control {{ $errors->has('app_share_agent') ? 'is-invalid' : '' }}" name="app_share_agent" id="app_share_agent">{{ old('app_share_agent', $smsTemplate->app_share_agent) }}</textarea>
                @if($errors->has('app_share_agent'))
                    <div class="invalid-feedback">
                        {{ $errors->first('app_share_agent') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.smsTemplate.fields.app_share_agent_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="app_share_lending_officer">{{ trans('cruds.smsTemplate.fields.app_share_lending_officer') }}</label>
                <textarea class="form-control {{ $errors->has('app_share_lending_officer') ? 'is-invalid' : '' }}" name="app_share_lending_officer" id="app_share_lending_officer">{{ old('app_share_lending_officer', $smsTemplate->app_share_lending_officer) }}</textarea>
                @if($errors->has('app_share_lending_officer'))
                    <div class="invalid-feedback">
                        {{ $errors->first('app_share_lending_officer') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.smsTemplate.fields.app_share_lending_officer_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="app_delivered_buyer">{{ trans('cruds.smsTemplate.fields.app_delivered_buyer') }}</label>
                <textarea class="form-control {{ $errors->has('app_delivered_buyer') ? 'is-invalid' : '' }}" name="app_delivered_buyer" id="app_delivered_buyer">{{ old('app_delivered_buyer', $smsTemplate->app_delivered_buyer) }}</textarea>
                @if($errors->has('app_delivered_buyer'))
                    <div class="invalid-feedback">
                        {{ $errors->first('app_delivered_buyer') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.smsTemplate.fields.app_delivered_buyer_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="app_delivered_agent">{{ trans('cruds.smsTemplate.fields.app_delivered_agent') }}</label>
                <textarea class="form-control {{ $errors->has('app_delivered_agent') ? 'is-invalid' : '' }}" name="app_delivered_agent" id="app_delivered_agent">{{ old('app_delivered_agent', $smsTemplate->app_delivered_agent) }}</textarea>
                @if($errors->has('app_delivered_agent'))
                    <div class="invalid-feedback">
                        {{ $errors->first('app_delivered_agent') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.smsTemplate.fields.app_delivered_agent_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="app_delivered_lending_officer">{{ trans('cruds.smsTemplate.fields.app_delivered_lending_officer') }}</label>
                <textarea class="form-control {{ $errors->has('app_delivered_lending_officer') ? 'is-invalid' : '' }}" name="app_delivered_lending_officer" id="app_delivered_lending_officer">{{ old('app_delivered_lending_officer', $smsTemplate->app_delivered_lending_officer) }}</textarea>
                @if($errors->has('app_delivered_lending_officer'))
                    <div class="invalid-feedback">
                        {{ $errors->first('app_delivered_lending_officer') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.smsTemplate.fields.app_delivered_lending_officer_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="listing_viewed_agent">{{ trans('cruds.smsTemplate.fields.listing_viewed_agent') }}</label>
                <textarea class="form-control {{ $errors->has('listing_viewed_agent') ? 'is-invalid' : '' }}" name="listing_viewed_agent" id="listing_viewed_agent">{{ old('listing_viewed_agent', $smsTemplate->listing_viewed_agent) }}</textarea>
                @if($errors->has('listing_viewed_agent'))
                    <div class="invalid-feedback">
                        {{ $errors->first('listing_viewed_agent') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.smsTemplate.fields.listing_viewed_agent_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="listing_viewed_lending_officer">{{ trans('cruds.smsTemplate.fields.listing_viewed_lending_officer') }}</label>
                <textarea class="form-control {{ $errors->has('listing_viewed_lending_officer') ? 'is-invalid' : '' }}" name="listing_viewed_lending_officer" id="listing_viewed_lending_officer">{{ old('listing_viewed_lending_officer', $smsTemplate->listing_viewed_lending_officer) }}</textarea>
                @if($errors->has('listing_viewed_lending_officer'))
                    <div class="invalid-feedback">
                        {{ $errors->first('listing_viewed_lending_officer') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.smsTemplate.fields.listing_viewed_lending_officer_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="shared_property_alert_buyer">{{ trans('cruds.smsTemplate.fields.shared_property_alert_buyer') }}</label>
                <textarea class="form-control {{ $errors->has('shared_property_alert_buyer') ? 'is-invalid' : '' }}" name="shared_property_alert_buyer" id="shared_property_alert_buyer">{{ old('shared_property_alert_buyer', $smsTemplate->shared_property_alert_buyer) }}</textarea>
                @if($errors->has('shared_property_alert_buyer'))
                    <div class="invalid-feedback">
                        {{ $errors->first('shared_property_alert_buyer') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.smsTemplate.fields.shared_property_alert_buyer_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="listing_shared_buyer">{{ trans('cruds.smsTemplate.fields.listing_shared_buyer') }}</label>
                <textarea class="form-control {{ $errors->has('listing_shared_buyer') ? 'is-invalid' : '' }}" name="listing_shared_buyer" id="listing_shared_buyer">{{ old('listing_shared_buyer', $smsTemplate->listing_shared_buyer) }}</textarea>
                @if($errors->has('listing_shared_buyer'))
                    <div class="invalid-feedback">
                        {{ $errors->first('listing_shared_buyer') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.smsTemplate.fields.listing_shared_buyer_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="request_showing_agent">{{ trans('cruds.smsTemplate.fields.request_showing_agent') }}</label>
                <textarea class="form-control {{ $errors->has('request_showing_agent') ? 'is-invalid' : '' }}" name="request_showing_agent" id="request_showing_agent">{{ old('request_showing_agent', $smsTemplate->request_showing_agent) }}</textarea>
                @if($errors->has('request_showing_agent'))
                    <div class="invalid-feedback">
                        {{ $errors->first('request_showing_agent') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.smsTemplate.fields.request_showing_agent_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="quote_request_lending_officer">{{ trans('cruds.smsTemplate.fields.quote_request_lending_officer') }}</label>
                <textarea class="form-control {{ $errors->has('quote_request_lending_officer') ? 'is-invalid' : '' }}" name="quote_request_lending_officer" id="quote_request_lending_officer">{{ old('quote_request_lending_officer', $smsTemplate->quote_request_lending_officer) }}</textarea>
                @if($errors->has('quote_request_lending_officer'))
                    <div class="invalid-feedback">
                        {{ $errors->first('quote_request_lending_officer') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.smsTemplate.fields.quote_request_lending_officer_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="request_showing_lending_officer">{{ trans('cruds.smsTemplate.fields.request_showing_lending_officer') }}</label>
                <textarea class="form-control {{ $errors->has('request_showing_lending_officer') ? 'is-invalid' : '' }}" name="request_showing_lending_officer" id="request_showing_lending_officer">{{ old('request_showing_lending_officer', $smsTemplate->request_showing_lending_officer) }}</textarea>
                @if($errors->has('request_showing_lending_officer'))
                    <div class="invalid-feedback">
                        {{ $errors->first('request_showing_lending_officer') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.smsTemplate.fields.request_showing_lending_officer_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="welcome_sent_from_admin_lending_officer">{{ trans('cruds.smsTemplate.fields.welcome_sent_from_admin_lending_officer') }}</label>
                <textarea class="form-control {{ $errors->has('welcome_sent_from_admin_lending_officer') ? 'is-invalid' : '' }}" name="welcome_sent_from_admin_lending_officer" id="welcome_sent_from_admin_lending_officer">{{ old('welcome_sent_from_admin_lending_officer', $smsTemplate->welcome_sent_from_admin_lending_officer) }}</textarea>
                @if($errors->has('welcome_sent_from_admin_lending_officer'))
                    <div class="invalid-feedback">
                        {{ $errors->first('welcome_sent_from_admin_lending_officer') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.smsTemplate.fields.welcome_sent_from_admin_lending_officer_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="welcome_sent_from_admin_agent">{{ trans('cruds.smsTemplate.fields.welcome_sent_from_admin_agent') }}</label>
                <textarea class="form-control {{ $errors->has('welcome_sent_from_admin_agent') ? 'is-invalid' : '' }}" name="welcome_sent_from_admin_agent" id="welcome_sent_from_admin_agent">{{ old('welcome_sent_from_admin_agent', $smsTemplate->welcome_sent_from_admin_agent) }}</textarea>
                @if($errors->has('welcome_sent_from_admin_agent'))
                    <div class="invalid-feedback">
                        {{ $errors->first('welcome_sent_from_admin_agent') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.smsTemplate.fields.welcome_sent_from_admin_agent_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="shared_property_alert_agent">{{ trans('cruds.smsTemplate.fields.shared_property_alert_agent') }}</label>
                <textarea class="form-control {{ $errors->has('shared_property_alert_agent') ? 'is-invalid' : '' }}" name="shared_property_alert_agent" id="shared_property_alert_agent">{{ old('shared_property_alert_agent', $smsTemplate->shared_property_alert_agent) }}</textarea>
                @if($errors->has('shared_property_alert_agent'))
                    <div class="invalid-feedback">
                        {{ $errors->first('shared_property_alert_agent') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.smsTemplate.fields.shared_property_alert_agent_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="shared_property_alert_lending_officer">{{ trans('cruds.smsTemplate.fields.shared_property_alert_lending_officer') }}</label>
                <textarea class="form-control {{ $errors->has('shared_property_alert_lending_officer') ? 'is-invalid' : '' }}" name="shared_property_alert_lending_officer" id="shared_property_alert_lending_officer">{{ old('shared_property_alert_lending_officer', $smsTemplate->shared_property_alert_lending_officer) }}</textarea>
                @if($errors->has('shared_property_alert_lending_officer'))
                    <div class="invalid-feedback">
                        {{ $errors->first('shared_property_alert_lending_officer') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.smsTemplate.fields.shared_property_alert_lending_officer_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="listing_shared_agent">{{ trans('cruds.smsTemplate.fields.listing_shared_agent') }}</label>
                <textarea class="form-control {{ $errors->has('listing_shared_agent') ? 'is-invalid' : '' }}" name="listing_shared_agent" id="listing_shared_agent">{{ old('listing_shared_agent', $smsTemplate->listing_shared_agent) }}</textarea>
                @if($errors->has('listing_shared_agent'))
                    <div class="invalid-feedback">
                        {{ $errors->first('listing_shared_agent') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.smsTemplate.fields.listing_shared_agent_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="listing_shared_lending_officer">{{ trans('cruds.smsTemplate.fields.listing_shared_lending_officer') }}</label>
                <textarea class="form-control {{ $errors->has('listing_shared_lending_officer') ? 'is-invalid' : '' }}" name="listing_shared_lending_officer" id="listing_shared_lending_officer">{{ old('listing_shared_lending_officer', $smsTemplate->listing_shared_lending_officer) }}</textarea>
                @if($errors->has('listing_shared_lending_officer'))
                    <div class="invalid-feedback">
                        {{ $errors->first('listing_shared_lending_officer') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.smsTemplate.fields.listing_shared_lending_officer_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="favorited_changed_buyer">{{ trans('cruds.smsTemplate.fields.favorited_changed_buyer') }}</label>
                <textarea class="form-control {{ $errors->has('favorited_changed_buyer') ? 'is-invalid' : '' }}" name="favorited_changed_buyer" id="favorited_changed_buyer">{{ old('favorited_changed_buyer', $smsTemplate->favorited_changed_buyer) }}</textarea>
                @if($errors->has('favorited_changed_buyer'))
                    <div class="invalid-feedback">
                        {{ $errors->first('favorited_changed_buyer') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.smsTemplate.fields.favorited_changed_buyer_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="referred_lending_officer">{{ trans('cruds.smsTemplate.fields.referred_lending_officer') }}</label>
                <textarea class="form-control {{ $errors->has('referred_lending_officer') ? 'is-invalid' : '' }}" name="referred_lending_officer" id="referred_lending_officer">{{ old('referred_lending_officer', $smsTemplate->referred_lending_officer) }}</textarea>
                @if($errors->has('referred_lending_officer'))
                    <div class="invalid-feedback">
                        {{ $errors->first('referred_lending_officer') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.smsTemplate.fields.referred_lending_officer_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="keyword_id">{{ trans('cruds.smsTemplate.fields.keyword') }}</label>
                <select class="form-control select2 {{ $errors->has('keyword') ? 'is-invalid' : '' }}" name="keyword_id" id="keyword_id">
                    @foreach($keywords as $id => $entry)
                        <option value="{{ $id }}" {{ (old('keyword_id') ? old('keyword_id') : $smsTemplate->keyword->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('keyword'))
                    <div class="invalid-feedback">
                        {{ $errors->first('keyword') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.smsTemplate.fields.keyword_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="customer_id">{{ trans('cruds.smsTemplate.fields.customer') }}</label>
                <select class="form-control select2 {{ $errors->has('customer') ? 'is-invalid' : '' }}" name="customer_id" id="customer_id">
                    @foreach($customers as $id => $entry)
                        <option value="{{ $id }}" {{ (old('customer_id') ? old('customer_id') : $smsTemplate->customer->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('customer'))
                    <div class="invalid-feedback">
                        {{ $errors->first('customer') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.smsTemplate.fields.customer_helper') }}</span>
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