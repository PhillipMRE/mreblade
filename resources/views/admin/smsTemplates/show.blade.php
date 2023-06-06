@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.smsTemplate.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.sms-templates.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.smsTemplate.fields.id') }}
                        </th>
                        <td>
                            {{ $smsTemplate->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.smsTemplate.fields.nickname') }}
                        </th>
                        <td>
                            {{ $smsTemplate->nickname }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.smsTemplate.fields.app_share_buyer') }}
                        </th>
                        <td>
                            {{ $smsTemplate->app_share_buyer }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.smsTemplate.fields.app_share_agent') }}
                        </th>
                        <td>
                            {{ $smsTemplate->app_share_agent }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.smsTemplate.fields.app_share_lending_officer') }}
                        </th>
                        <td>
                            {{ $smsTemplate->app_share_lending_officer }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.smsTemplate.fields.app_delivered_buyer') }}
                        </th>
                        <td>
                            {{ $smsTemplate->app_delivered_buyer }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.smsTemplate.fields.app_delivered_agent') }}
                        </th>
                        <td>
                            {{ $smsTemplate->app_delivered_agent }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.smsTemplate.fields.app_delivered_lending_officer') }}
                        </th>
                        <td>
                            {{ $smsTemplate->app_delivered_lending_officer }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.smsTemplate.fields.listing_viewed_agent') }}
                        </th>
                        <td>
                            {{ $smsTemplate->listing_viewed_agent }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.smsTemplate.fields.listing_viewed_lending_officer') }}
                        </th>
                        <td>
                            {{ $smsTemplate->listing_viewed_lending_officer }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.smsTemplate.fields.shared_property_alert_buyer') }}
                        </th>
                        <td>
                            {{ $smsTemplate->shared_property_alert_buyer }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.smsTemplate.fields.listing_shared_buyer') }}
                        </th>
                        <td>
                            {{ $smsTemplate->listing_shared_buyer }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.smsTemplate.fields.request_showing_agent') }}
                        </th>
                        <td>
                            {{ $smsTemplate->request_showing_agent }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.smsTemplate.fields.quote_request_lending_officer') }}
                        </th>
                        <td>
                            {{ $smsTemplate->quote_request_lending_officer }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.smsTemplate.fields.request_showing_lending_officer') }}
                        </th>
                        <td>
                            {{ $smsTemplate->request_showing_lending_officer }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.smsTemplate.fields.welcome_sent_from_admin_lending_officer') }}
                        </th>
                        <td>
                            {{ $smsTemplate->welcome_sent_from_admin_lending_officer }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.smsTemplate.fields.welcome_sent_from_admin_agent') }}
                        </th>
                        <td>
                            {{ $smsTemplate->welcome_sent_from_admin_agent }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.smsTemplate.fields.shared_property_alert_agent') }}
                        </th>
                        <td>
                            {{ $smsTemplate->shared_property_alert_agent }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.smsTemplate.fields.shared_property_alert_lending_officer') }}
                        </th>
                        <td>
                            {{ $smsTemplate->shared_property_alert_lending_officer }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.smsTemplate.fields.listing_shared_agent') }}
                        </th>
                        <td>
                            {{ $smsTemplate->listing_shared_agent }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.smsTemplate.fields.listing_shared_lending_officer') }}
                        </th>
                        <td>
                            {{ $smsTemplate->listing_shared_lending_officer }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.smsTemplate.fields.favorited_changed_buyer') }}
                        </th>
                        <td>
                            {{ $smsTemplate->favorited_changed_buyer }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.smsTemplate.fields.referred_lending_officer') }}
                        </th>
                        <td>
                            {{ $smsTemplate->referred_lending_officer }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.smsTemplate.fields.keyword') }}
                        </th>
                        <td>
                            {{ $smsTemplate->keyword->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.smsTemplate.fields.customer') }}
                        </th>
                        <td>
                            {{ $smsTemplate->customer->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.sms-templates.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection