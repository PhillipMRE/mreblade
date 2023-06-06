@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.smsTemplateDefault.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.sms-template-defaults.update", [$smsTemplateDefault->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="nickname">{{ trans('cruds.smsTemplateDefault.fields.nickname') }}</label>
                <input class="form-control {{ $errors->has('nickname') ? 'is-invalid' : '' }}" type="text" name="nickname" id="nickname" value="{{ old('nickname', $smsTemplateDefault->nickname) }}">
                @if($errors->has('nickname'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nickname') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.smsTemplateDefault.fields.nickname_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="app_share_buyer">{{ trans('cruds.smsTemplateDefault.fields.app_share_buyer') }}</label>
                <textarea class="form-control {{ $errors->has('app_share_buyer') ? 'is-invalid' : '' }}" name="app_share_buyer" id="app_share_buyer">{{ old('app_share_buyer', $smsTemplateDefault->app_share_buyer) }}</textarea>
                @if($errors->has('app_share_buyer'))
                    <div class="invalid-feedback">
                        {{ $errors->first('app_share_buyer') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.smsTemplateDefault.fields.app_share_buyer_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="app_share_agent">{{ trans('cruds.smsTemplateDefault.fields.app_share_agent') }}</label>
                <textarea class="form-control {{ $errors->has('app_share_agent') ? 'is-invalid' : '' }}" name="app_share_agent" id="app_share_agent">{{ old('app_share_agent', $smsTemplateDefault->app_share_agent) }}</textarea>
                @if($errors->has('app_share_agent'))
                    <div class="invalid-feedback">
                        {{ $errors->first('app_share_agent') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.smsTemplateDefault.fields.app_share_agent_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="app_share_lending_officer">{{ trans('cruds.smsTemplateDefault.fields.app_share_lending_officer') }}</label>
                <textarea class="form-control {{ $errors->has('app_share_lending_officer') ? 'is-invalid' : '' }}" name="app_share_lending_officer" id="app_share_lending_officer">{{ old('app_share_lending_officer', $smsTemplateDefault->app_share_lending_officer) }}</textarea>
                @if($errors->has('app_share_lending_officer'))
                    <div class="invalid-feedback">
                        {{ $errors->first('app_share_lending_officer') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.smsTemplateDefault.fields.app_share_lending_officer_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="app_delivered_buyer">{{ trans('cruds.smsTemplateDefault.fields.app_delivered_buyer') }}</label>
                <textarea class="form-control {{ $errors->has('app_delivered_buyer') ? 'is-invalid' : '' }}" name="app_delivered_buyer" id="app_delivered_buyer">{{ old('app_delivered_buyer', $smsTemplateDefault->app_delivered_buyer) }}</textarea>
                @if($errors->has('app_delivered_buyer'))
                    <div class="invalid-feedback">
                        {{ $errors->first('app_delivered_buyer') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.smsTemplateDefault.fields.app_delivered_buyer_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="app_delivered_agent">{{ trans('cruds.smsTemplateDefault.fields.app_delivered_agent') }}</label>
                <textarea class="form-control {{ $errors->has('app_delivered_agent') ? 'is-invalid' : '' }}" name="app_delivered_agent" id="app_delivered_agent">{{ old('app_delivered_agent', $smsTemplateDefault->app_delivered_agent) }}</textarea>
                @if($errors->has('app_delivered_agent'))
                    <div class="invalid-feedback">
                        {{ $errors->first('app_delivered_agent') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.smsTemplateDefault.fields.app_delivered_agent_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="app_delivered_lending_officer">{{ trans('cruds.smsTemplateDefault.fields.app_delivered_lending_officer') }}</label>
                <textarea class="form-control {{ $errors->has('app_delivered_lending_officer') ? 'is-invalid' : '' }}" name="app_delivered_lending_officer" id="app_delivered_lending_officer">{{ old('app_delivered_lending_officer', $smsTemplateDefault->app_delivered_lending_officer) }}</textarea>
                @if($errors->has('app_delivered_lending_officer'))
                    <div class="invalid-feedback">
                        {{ $errors->first('app_delivered_lending_officer') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.smsTemplateDefault.fields.app_delivered_lending_officer_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="listing_viewed_agent">{{ trans('cruds.smsTemplateDefault.fields.listing_viewed_agent') }}</label>
                <textarea class="form-control {{ $errors->has('listing_viewed_agent') ? 'is-invalid' : '' }}" name="listing_viewed_agent" id="listing_viewed_agent">{{ old('listing_viewed_agent', $smsTemplateDefault->listing_viewed_agent) }}</textarea>
                @if($errors->has('listing_viewed_agent'))
                    <div class="invalid-feedback">
                        {{ $errors->first('listing_viewed_agent') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.smsTemplateDefault.fields.listing_viewed_agent_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="listing_viewed_lending_officer">{{ trans('cruds.smsTemplateDefault.fields.listing_viewed_lending_officer') }}</label>
                <textarea class="form-control {{ $errors->has('listing_viewed_lending_officer') ? 'is-invalid' : '' }}" name="listing_viewed_lending_officer" id="listing_viewed_lending_officer">{{ old('listing_viewed_lending_officer', $smsTemplateDefault->listing_viewed_lending_officer) }}</textarea>
                @if($errors->has('listing_viewed_lending_officer'))
                    <div class="invalid-feedback">
                        {{ $errors->first('listing_viewed_lending_officer') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.smsTemplateDefault.fields.listing_viewed_lending_officer_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="listing_shared_buyer">{{ trans('cruds.smsTemplateDefault.fields.listing_shared_buyer') }}</label>
                <textarea class="form-control {{ $errors->has('listing_shared_buyer') ? 'is-invalid' : '' }}" name="listing_shared_buyer" id="listing_shared_buyer">{{ old('listing_shared_buyer', $smsTemplateDefault->listing_shared_buyer) }}</textarea>
                @if($errors->has('listing_shared_buyer'))
                    <div class="invalid-feedback">
                        {{ $errors->first('listing_shared_buyer') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.smsTemplateDefault.fields.listing_shared_buyer_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="listing_shared_agent">{{ trans('cruds.smsTemplateDefault.fields.listing_shared_agent') }}</label>
                <textarea class="form-control {{ $errors->has('listing_shared_agent') ? 'is-invalid' : '' }}" name="listing_shared_agent" id="listing_shared_agent">{{ old('listing_shared_agent', $smsTemplateDefault->listing_shared_agent) }}</textarea>
                @if($errors->has('listing_shared_agent'))
                    <div class="invalid-feedback">
                        {{ $errors->first('listing_shared_agent') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.smsTemplateDefault.fields.listing_shared_agent_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="listing_shared_lending_officer">{{ trans('cruds.smsTemplateDefault.fields.listing_shared_lending_officer') }}</label>
                <textarea class="form-control {{ $errors->has('listing_shared_lending_officer') ? 'is-invalid' : '' }}" name="listing_shared_lending_officer" id="listing_shared_lending_officer">{{ old('listing_shared_lending_officer', $smsTemplateDefault->listing_shared_lending_officer) }}</textarea>
                @if($errors->has('listing_shared_lending_officer'))
                    <div class="invalid-feedback">
                        {{ $errors->first('listing_shared_lending_officer') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.smsTemplateDefault.fields.listing_shared_lending_officer_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="listing_favorited_agent">{{ trans('cruds.smsTemplateDefault.fields.listing_favorited_agent') }}</label>
                <textarea class="form-control {{ $errors->has('listing_favorited_agent') ? 'is-invalid' : '' }}" name="listing_favorited_agent" id="listing_favorited_agent">{{ old('listing_favorited_agent', $smsTemplateDefault->listing_favorited_agent) }}</textarea>
                @if($errors->has('listing_favorited_agent'))
                    <div class="invalid-feedback">
                        {{ $errors->first('listing_favorited_agent') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.smsTemplateDefault.fields.listing_favorited_agent_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="listing_favorited_lending_officer">{{ trans('cruds.smsTemplateDefault.fields.listing_favorited_lending_officer') }}</label>
                <textarea class="form-control {{ $errors->has('listing_favorited_lending_officer') ? 'is-invalid' : '' }}" name="listing_favorited_lending_officer" id="listing_favorited_lending_officer">{{ old('listing_favorited_lending_officer', $smsTemplateDefault->listing_favorited_lending_officer) }}</textarea>
                @if($errors->has('listing_favorited_lending_officer'))
                    <div class="invalid-feedback">
                        {{ $errors->first('listing_favorited_lending_officer') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.smsTemplateDefault.fields.listing_favorited_lending_officer_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="request_showing_agent">{{ trans('cruds.smsTemplateDefault.fields.request_showing_agent') }}</label>
                <textarea class="form-control {{ $errors->has('request_showing_agent') ? 'is-invalid' : '' }}" name="request_showing_agent" id="request_showing_agent">{{ old('request_showing_agent', $smsTemplateDefault->request_showing_agent) }}</textarea>
                @if($errors->has('request_showing_agent'))
                    <div class="invalid-feedback">
                        {{ $errors->first('request_showing_agent') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.smsTemplateDefault.fields.request_showing_agent_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="request_showing_lending_officer">{{ trans('cruds.smsTemplateDefault.fields.request_showing_lending_officer') }}</label>
                <textarea class="form-control {{ $errors->has('request_showing_lending_officer') ? 'is-invalid' : '' }}" name="request_showing_lending_officer" id="request_showing_lending_officer">{{ old('request_showing_lending_officer', $smsTemplateDefault->request_showing_lending_officer) }}</textarea>
                @if($errors->has('request_showing_lending_officer'))
                    <div class="invalid-feedback">
                        {{ $errors->first('request_showing_lending_officer') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.smsTemplateDefault.fields.request_showing_lending_officer_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="quote_request_lending_officer">{{ trans('cruds.smsTemplateDefault.fields.quote_request_lending_officer') }}</label>
                <textarea class="form-control {{ $errors->has('quote_request_lending_officer') ? 'is-invalid' : '' }}" name="quote_request_lending_officer" id="quote_request_lending_officer">{{ old('quote_request_lending_officer', $smsTemplateDefault->quote_request_lending_officer) }}</textarea>
                @if($errors->has('quote_request_lending_officer'))
                    <div class="invalid-feedback">
                        {{ $errors->first('quote_request_lending_officer') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.smsTemplateDefault.fields.quote_request_lending_officer_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="referred_lending_officer">{{ trans('cruds.smsTemplateDefault.fields.referred_lending_officer') }}</label>
                <textarea class="form-control {{ $errors->has('referred_lending_officer') ? 'is-invalid' : '' }}" name="referred_lending_officer" id="referred_lending_officer">{{ old('referred_lending_officer', $smsTemplateDefault->referred_lending_officer) }}</textarea>
                @if($errors->has('referred_lending_officer'))
                    <div class="invalid-feedback">
                        {{ $errors->first('referred_lending_officer') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.smsTemplateDefault.fields.referred_lending_officer_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="welcome_sent_from_admin_lending_officer">{{ trans('cruds.smsTemplateDefault.fields.welcome_sent_from_admin_lending_officer') }}</label>
                <textarea class="form-control {{ $errors->has('welcome_sent_from_admin_lending_officer') ? 'is-invalid' : '' }}" name="welcome_sent_from_admin_lending_officer" id="welcome_sent_from_admin_lending_officer">{{ old('welcome_sent_from_admin_lending_officer', $smsTemplateDefault->welcome_sent_from_admin_lending_officer) }}</textarea>
                @if($errors->has('welcome_sent_from_admin_lending_officer'))
                    <div class="invalid-feedback">
                        {{ $errors->first('welcome_sent_from_admin_lending_officer') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.smsTemplateDefault.fields.welcome_sent_from_admin_lending_officer_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="welcome_sent_from_admin_agent">{{ trans('cruds.smsTemplateDefault.fields.welcome_sent_from_admin_agent') }}</label>
                <textarea class="form-control {{ $errors->has('welcome_sent_from_admin_agent') ? 'is-invalid' : '' }}" name="welcome_sent_from_admin_agent" id="welcome_sent_from_admin_agent">{{ old('welcome_sent_from_admin_agent', $smsTemplateDefault->welcome_sent_from_admin_agent) }}</textarea>
                @if($errors->has('welcome_sent_from_admin_agent'))
                    <div class="invalid-feedback">
                        {{ $errors->first('welcome_sent_from_admin_agent') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.smsTemplateDefault.fields.welcome_sent_from_admin_agent_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="shared_property_alert_agent">{{ trans('cruds.smsTemplateDefault.fields.shared_property_alert_agent') }}</label>
                <textarea class="form-control {{ $errors->has('shared_property_alert_agent') ? 'is-invalid' : '' }}" name="shared_property_alert_agent" id="shared_property_alert_agent">{{ old('shared_property_alert_agent', $smsTemplateDefault->shared_property_alert_agent) }}</textarea>
                @if($errors->has('shared_property_alert_agent'))
                    <div class="invalid-feedback">
                        {{ $errors->first('shared_property_alert_agent') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.smsTemplateDefault.fields.shared_property_alert_agent_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="shared_property_alert_buyer">{{ trans('cruds.smsTemplateDefault.fields.shared_property_alert_buyer') }}</label>
                <textarea class="form-control {{ $errors->has('shared_property_alert_buyer') ? 'is-invalid' : '' }}" name="shared_property_alert_buyer" id="shared_property_alert_buyer">{{ old('shared_property_alert_buyer', $smsTemplateDefault->shared_property_alert_buyer) }}</textarea>
                @if($errors->has('shared_property_alert_buyer'))
                    <div class="invalid-feedback">
                        {{ $errors->first('shared_property_alert_buyer') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.smsTemplateDefault.fields.shared_property_alert_buyer_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="shared_property_alert_lending_officer">{{ trans('cruds.smsTemplateDefault.fields.shared_property_alert_lending_officer') }}</label>
                <textarea class="form-control {{ $errors->has('shared_property_alert_lending_officer') ? 'is-invalid' : '' }}" name="shared_property_alert_lending_officer" id="shared_property_alert_lending_officer">{{ old('shared_property_alert_lending_officer', $smsTemplateDefault->shared_property_alert_lending_officer) }}</textarea>
                @if($errors->has('shared_property_alert_lending_officer'))
                    <div class="invalid-feedback">
                        {{ $errors->first('shared_property_alert_lending_officer') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.smsTemplateDefault.fields.shared_property_alert_lending_officer_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="favorited_changed_buyer">{{ trans('cruds.smsTemplateDefault.fields.favorited_changed_buyer') }}</label>
                <textarea class="form-control {{ $errors->has('favorited_changed_buyer') ? 'is-invalid' : '' }}" name="favorited_changed_buyer" id="favorited_changed_buyer">{{ old('favorited_changed_buyer', $smsTemplateDefault->favorited_changed_buyer) }}</textarea>
                @if($errors->has('favorited_changed_buyer'))
                    <div class="invalid-feedback">
                        {{ $errors->first('favorited_changed_buyer') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.smsTemplateDefault.fields.favorited_changed_buyer_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="keyword_id">{{ trans('cruds.smsTemplateDefault.fields.keyword') }}</label>
                <select class="form-control select2 {{ $errors->has('keyword') ? 'is-invalid' : '' }}" name="keyword_id" id="keyword_id">
                    @foreach($keywords as $id => $entry)
                        <option value="{{ $id }}" {{ (old('keyword_id') ? old('keyword_id') : $smsTemplateDefault->keyword->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('keyword'))
                    <div class="invalid-feedback">
                        {{ $errors->first('keyword') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.smsTemplateDefault.fields.keyword_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="customer_id">{{ trans('cruds.smsTemplateDefault.fields.customer') }}</label>
                <select class="form-control select2 {{ $errors->has('customer') ? 'is-invalid' : '' }}" name="customer_id" id="customer_id">
                    @foreach($customers as $id => $entry)
                        <option value="{{ $id }}" {{ (old('customer_id') ? old('customer_id') : $smsTemplateDefault->customer->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('customer'))
                    <div class="invalid-feedback">
                        {{ $errors->first('customer') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.smsTemplateDefault.fields.customer_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="new_property_alert_buyer">{{ trans('cruds.smsTemplateDefault.fields.new_property_alert_buyer') }}</label>
                <textarea class="form-control {{ $errors->has('new_property_alert_buyer') ? 'is-invalid' : '' }}" name="new_property_alert_buyer" id="new_property_alert_buyer">{{ old('new_property_alert_buyer', $smsTemplateDefault->new_property_alert_buyer) }}</textarea>
                @if($errors->has('new_property_alert_buyer'))
                    <div class="invalid-feedback">
                        {{ $errors->first('new_property_alert_buyer') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.smsTemplateDefault.fields.new_property_alert_buyer_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="off_hours_agent">{{ trans('cruds.smsTemplateDefault.fields.off_hours_agent') }}</label>
                <textarea class="form-control {{ $errors->has('off_hours_agent') ? 'is-invalid' : '' }}" name="off_hours_agent" id="off_hours_agent">{{ old('off_hours_agent', $smsTemplateDefault->off_hours_agent) }}</textarea>
                @if($errors->has('off_hours_agent'))
                    <div class="invalid-feedback">
                        {{ $errors->first('off_hours_agent') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.smsTemplateDefault.fields.off_hours_agent_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="returning_client_agent">{{ trans('cruds.smsTemplateDefault.fields.returning_client_agent') }}</label>
                <textarea class="form-control {{ $errors->has('returning_client_agent') ? 'is-invalid' : '' }}" name="returning_client_agent" id="returning_client_agent">{{ old('returning_client_agent', $smsTemplateDefault->returning_client_agent) }}</textarea>
                @if($errors->has('returning_client_agent'))
                    <div class="invalid-feedback">
                        {{ $errors->first('returning_client_agent') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.smsTemplateDefault.fields.returning_client_agent_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="direct_registration_agent">{{ trans('cruds.smsTemplateDefault.fields.direct_registration_agent') }}</label>
                <textarea class="form-control {{ $errors->has('direct_registration_agent') ? 'is-invalid' : '' }}" name="direct_registration_agent" id="direct_registration_agent">{{ old('direct_registration_agent', $smsTemplateDefault->direct_registration_agent) }}</textarea>
                @if($errors->has('direct_registration_agent'))
                    <div class="invalid-feedback">
                        {{ $errors->first('direct_registration_agent') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.smsTemplateDefault.fields.direct_registration_agent_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="direct_registration_lending_officer">{{ trans('cruds.smsTemplateDefault.fields.direct_registration_lending_officer') }}</label>
                <textarea class="form-control {{ $errors->has('direct_registration_lending_officer') ? 'is-invalid' : '' }}" name="direct_registration_lending_officer" id="direct_registration_lending_officer">{{ old('direct_registration_lending_officer', $smsTemplateDefault->direct_registration_lending_officer) }}</textarea>
                @if($errors->has('direct_registration_lending_officer'))
                    <div class="invalid-feedback">
                        {{ $errors->first('direct_registration_lending_officer') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.smsTemplateDefault.fields.direct_registration_lending_officer_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="sms_reply_lending_officer">{{ trans('cruds.smsTemplateDefault.fields.sms_reply_lending_officer') }}</label>
                <textarea class="form-control {{ $errors->has('sms_reply_lending_officer') ? 'is-invalid' : '' }}" name="sms_reply_lending_officer" id="sms_reply_lending_officer">{{ old('sms_reply_lending_officer', $smsTemplateDefault->sms_reply_lending_officer) }}</textarea>
                @if($errors->has('sms_reply_lending_officer'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sms_reply_lending_officer') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.smsTemplateDefault.fields.sms_reply_lending_officer_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="sms_reply_agent">{{ trans('cruds.smsTemplateDefault.fields.sms_reply_agent') }}</label>
                <textarea class="form-control {{ $errors->has('sms_reply_agent') ? 'is-invalid' : '' }}" name="sms_reply_agent" id="sms_reply_agent">{{ old('sms_reply_agent', $smsTemplateDefault->sms_reply_agent) }}</textarea>
                @if($errors->has('sms_reply_agent'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sms_reply_agent') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.smsTemplateDefault.fields.sms_reply_agent_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="listings_new_agent">{{ trans('cruds.smsTemplateDefault.fields.listings_new_agent') }}</label>
                <textarea class="form-control {{ $errors->has('listings_new_agent') ? 'is-invalid' : '' }}" name="listings_new_agent" id="listings_new_agent">{{ old('listings_new_agent', $smsTemplateDefault->listings_new_agent) }}</textarea>
                @if($errors->has('listings_new_agent'))
                    <div class="invalid-feedback">
                        {{ $errors->first('listings_new_agent') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.smsTemplateDefault.fields.listings_new_agent_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="listings_new_lending_officer">{{ trans('cruds.smsTemplateDefault.fields.listings_new_lending_officer') }}</label>
                <textarea class="form-control {{ $errors->has('listings_new_lending_officer') ? 'is-invalid' : '' }}" name="listings_new_lending_officer" id="listings_new_lending_officer">{{ old('listings_new_lending_officer', $smsTemplateDefault->listings_new_lending_officer) }}</textarea>
                @if($errors->has('listings_new_lending_officer'))
                    <div class="invalid-feedback">
                        {{ $errors->first('listings_new_lending_officer') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.smsTemplateDefault.fields.listings_new_lending_officer_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="unreachable_client_agent">{{ trans('cruds.smsTemplateDefault.fields.unreachable_client_agent') }}</label>
                <textarea class="form-control {{ $errors->has('unreachable_client_agent') ? 'is-invalid' : '' }}" name="unreachable_client_agent" id="unreachable_client_agent">{{ old('unreachable_client_agent', $smsTemplateDefault->unreachable_client_agent) }}</textarea>
                @if($errors->has('unreachable_client_agent'))
                    <div class="invalid-feedback">
                        {{ $errors->first('unreachable_client_agent') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.smsTemplateDefault.fields.unreachable_client_agent_helper') }}</span>
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