@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.lendingOfficer.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.lending-officers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.lendingOfficer.fields.id') }}
                        </th>
                        <td>
                            {{ $lendingOfficer->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.lendingOfficer.fields.published') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $lendingOfficer->published ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.lendingOfficer.fields.user') }}
                        </th>
                        <td>
                            {{ $lendingOfficer->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.lendingOfficer.fields.display_name') }}
                        </th>
                        <td>
                            {{ $lendingOfficer->display_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.lendingOfficer.fields.notify_phone') }}
                        </th>
                        <td>
                            {{ $lendingOfficer->notify_phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.lendingOfficer.fields.contact_phone') }}
                        </th>
                        <td>
                            {{ $lendingOfficer->contact_phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.lendingOfficer.fields.timezone') }}
                        </th>
                        <td>
                            {{ $lendingOfficer->timezone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.lendingOfficer.fields.biography') }}
                        </th>
                        <td>
                            {!! $lendingOfficer->biography !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.lendingOfficer.fields.license') }}
                        </th>
                        <td>
                            {{ $lendingOfficer->license }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.lendingOfficer.fields.callout_text') }}
                        </th>
                        <td>
                            {{ $lendingOfficer->callout_text }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.lendingOfficer.fields.website') }}
                        </th>
                        <td>
                            {{ $lendingOfficer->website }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.lendingOfficer.fields.facebook') }}
                        </th>
                        <td>
                            {{ $lendingOfficer->facebook }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.lendingOfficer.fields.youtube') }}
                        </th>
                        <td>
                            {{ $lendingOfficer->youtube }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.lendingOfficer.fields.linkedin') }}
                        </th>
                        <td>
                            {{ $lendingOfficer->linkedin }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.lendingOfficer.fields.twitter') }}
                        </th>
                        <td>
                            {{ $lendingOfficer->twitter }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.lendingOfficer.fields.instagram') }}
                        </th>
                        <td>
                            {{ $lendingOfficer->instagram }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.lendingOfficer.fields.settings') }}
                        </th>
                        <td>
                            {{ $lendingOfficer->settings }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.lendingOfficer.fields.office') }}
                        </th>
                        <td>
                            {{ $lendingOfficer->office }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.lendingOfficer.fields.template') }}
                        </th>
                        <td>
                            {{ $lendingOfficer->template }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.lendingOfficer.fields.user_confirmed_info') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $lendingOfficer->user_confirmed_info ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.lendingOfficer.fields.demo') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $lendingOfficer->demo ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.lendingOfficer.fields.rates') }}
                        </th>
                        <td>
                            {{ $lendingOfficer->rates }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.lendingOfficer.fields.hubspot') }}
                        </th>
                        <td>
                            {{ $lendingOfficer->hubspot }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.lendingOfficer.fields.remote') }}
                        </th>
                        <td>
                            {{ $lendingOfficer->remote }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.lendingOfficer.fields.welcome_sent') }}
                        </th>
                        <td>
                            {{ $lendingOfficer->welcome_sent }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.lendingOfficer.fields.phone_numbers') }}
                        </th>
                        <td>
                            @foreach($lendingOfficer->phone_numbers as $key => $phone_numbers)
                                <span class="label label-info">{{ $phone_numbers->number }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.lendingOfficer.fields.phone') }}
                        </th>
                        <td>
                            {{ $lendingOfficer->phone->number ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.lending-officers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#lending_officer_customers" role="tab" data-toggle="tab">
                {{ trans('cruds.customer.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="lending_officer_customers">
            @includeIf('admin.lendingOfficers.relationships.lendingOfficerCustomers', ['customers' => $lendingOfficer->lendingOfficerCustomers])
        </div>
    </div>
</div>

@endsection