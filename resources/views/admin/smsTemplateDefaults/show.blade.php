@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.smsTemplateDefault.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.sms-template-defaults.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.smsTemplateDefault.fields.id') }}
                        </th>
                        <td>
                            {{ $smsTemplateDefault->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.smsTemplateDefault.fields.nickname') }}
                        </th>
                        <td>
                            {{ $smsTemplateDefault->nickname }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.smsTemplateDefault.fields.app_share_buyer') }}
                        </th>
                        <td>
                            {{ $smsTemplateDefault->app_share_buyer }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.smsTemplateDefault.fields.app_share_agent') }}
                        </th>
                        <td>
                            {{ $smsTemplateDefault->app_share_agent }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.smsTemplateDefault.fields.app_share_lending_officer') }}
                        </th>
                        <td>
                            {{ $smsTemplateDefault->app_share_lending_officer }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.smsTemplateDefault.fields.app_delivered_buyer') }}
                        </th>
                        <td>
                            {{ $smsTemplateDefault->app_delivered_buyer }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.smsTemplateDefault.fields.app_delivered_agent') }}
                        </th>
                        <td>
                            {{ $smsTemplateDefault->app_delivered_agent }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.smsTemplateDefault.fields.app_delivered_lending_officer') }}
                        </th>
                        <td>
                            {{ $smsTemplateDefault->app_delivered_lending_officer }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.smsTemplateDefault.fields.listing_viewed_agent') }}
                        </th>
                        <td>
                            {{ $smsTemplateDefault->listing_viewed_agent }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.smsTemplateDefault.fields.listing_viewed_lending_officer') }}
                        </th>
                        <td>
                            {{ $smsTemplateDefault->listing_viewed_lending_officer }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.smsTemplateDefault.fields.listing_shared_buyer') }}
                        </th>
                        <td>
                            {{ $smsTemplateDefault->listing_shared_buyer }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.smsTemplateDefault.fields.listing_shared_agent') }}
                        </th>
                        <td>
                            {{ $smsTemplateDefault->listing_shared_agent }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.smsTemplateDefault.fields.listing_shared_lending_officer') }}
                        </th>
                        <td>
                            {{ $smsTemplateDefault->listing_shared_lending_officer }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.smsTemplateDefault.fields.listing_favorited_agent') }}
                        </th>
                        <td>
                            {{ $smsTemplateDefault->listing_favorited_agent }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.smsTemplateDefault.fields.listing_favorited_lending_officer') }}
                        </th>
                        <td>
                            {{ $smsTemplateDefault->listing_favorited_lending_officer }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.smsTemplateDefault.fields.request_showing_agent') }}
                        </th>
                        <td>
                            {{ $smsTemplateDefault->request_showing_agent }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.smsTemplateDefault.fields.request_showing_lending_officer') }}
                        </th>
                        <td>
                            {{ $smsTemplateDefault->request_showing_lending_officer }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.smsTemplateDefault.fields.quote_request_lending_officer') }}
                        </th>
                        <td>
                            {{ $smsTemplateDefault->quote_request_lending_officer }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.smsTemplateDefault.fields.referred_lending_officer') }}
                        </th>
                        <td>
                            {{ $smsTemplateDefault->referred_lending_officer }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.smsTemplateDefault.fields.welcome_sent_from_admin_lending_officer') }}
                        </th>
                        <td>
                            {{ $smsTemplateDefault->welcome_sent_from_admin_lending_officer }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.smsTemplateDefault.fields.welcome_sent_from_admin_agent') }}
                        </th>
                        <td>
                            {{ $smsTemplateDefault->welcome_sent_from_admin_agent }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.smsTemplateDefault.fields.shared_property_alert_agent') }}
                        </th>
                        <td>
                            {{ $smsTemplateDefault->shared_property_alert_agent }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.smsTemplateDefault.fields.shared_property_alert_buyer') }}
                        </th>
                        <td>
                            {{ $smsTemplateDefault->shared_property_alert_buyer }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.smsTemplateDefault.fields.shared_property_alert_lending_officer') }}
                        </th>
                        <td>
                            {{ $smsTemplateDefault->shared_property_alert_lending_officer }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.smsTemplateDefault.fields.favorited_changed_buyer') }}
                        </th>
                        <td>
                            {{ $smsTemplateDefault->favorited_changed_buyer }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.smsTemplateDefault.fields.keyword') }}
                        </th>
                        <td>
                            {{ $smsTemplateDefault->keyword->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.smsTemplateDefault.fields.customer') }}
                        </th>
                        <td>
                            {{ $smsTemplateDefault->customer->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.smsTemplateDefault.fields.new_property_alert_buyer') }}
                        </th>
                        <td>
                            {{ $smsTemplateDefault->new_property_alert_buyer }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.smsTemplateDefault.fields.off_hours_agent') }}
                        </th>
                        <td>
                            {{ $smsTemplateDefault->off_hours_agent }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.smsTemplateDefault.fields.returning_client_agent') }}
                        </th>
                        <td>
                            {{ $smsTemplateDefault->returning_client_agent }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.smsTemplateDefault.fields.direct_registration_agent') }}
                        </th>
                        <td>
                            {{ $smsTemplateDefault->direct_registration_agent }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.smsTemplateDefault.fields.direct_registration_lending_officer') }}
                        </th>
                        <td>
                            {{ $smsTemplateDefault->direct_registration_lending_officer }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.smsTemplateDefault.fields.sms_reply_lending_officer') }}
                        </th>
                        <td>
                            {{ $smsTemplateDefault->sms_reply_lending_officer }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.smsTemplateDefault.fields.sms_reply_agent') }}
                        </th>
                        <td>
                            {{ $smsTemplateDefault->sms_reply_agent }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.smsTemplateDefault.fields.listings_new_agent') }}
                        </th>
                        <td>
                            {{ $smsTemplateDefault->listings_new_agent }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.smsTemplateDefault.fields.listings_new_lending_officer') }}
                        </th>
                        <td>
                            {{ $smsTemplateDefault->listings_new_lending_officer }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.smsTemplateDefault.fields.unreachable_client_agent') }}
                        </th>
                        <td>
                            {{ $smsTemplateDefault->unreachable_client_agent }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.sms-template-defaults.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection