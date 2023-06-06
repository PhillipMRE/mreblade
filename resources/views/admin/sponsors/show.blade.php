@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.sponsor.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.sponsors.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.sponsor.fields.id') }}
                        </th>
                        <td>
                            {{ $sponsor->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sponsor.fields.published') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $sponsor->published ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sponsor.fields.user_confirmed_info') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $sponsor->user_confirmed_info ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sponsor.fields.can_create_keyword') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $sponsor->can_create_keyword ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sponsor.fields.client') }}
                        </th>
                        <td>
                            {{ $sponsor->client->suspended ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sponsor.fields.user') }}
                        </th>
                        <td>
                            {{ $sponsor->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sponsor.fields.display_name') }}
                        </th>
                        <td>
                            {{ $sponsor->display_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sponsor.fields.timezone') }}
                        </th>
                        <td>
                            {{ $sponsor->timezone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sponsor.fields.callout_text') }}
                        </th>
                        <td>
                            {{ $sponsor->callout_text }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sponsor.fields.biography') }}
                        </th>
                        <td>
                            {!! $sponsor->biography !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sponsor.fields.license') }}
                        </th>
                        <td>
                            {{ $sponsor->license }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sponsor.fields.website') }}
                        </th>
                        <td>
                            {{ $sponsor->website }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sponsor.fields.facebook') }}
                        </th>
                        <td>
                            {{ $sponsor->facebook }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sponsor.fields.youtube') }}
                        </th>
                        <td>
                            {{ $sponsor->youtube }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sponsor.fields.linkedin') }}
                        </th>
                        <td>
                            {{ $sponsor->linkedin }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sponsor.fields.twitter') }}
                        </th>
                        <td>
                            {{ $sponsor->twitter }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sponsor.fields.instagram') }}
                        </th>
                        <td>
                            {{ $sponsor->instagram }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sponsor.fields.settings') }}
                        </th>
                        <td>
                            {{ $sponsor->settings }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sponsor.fields.office') }}
                        </th>
                        <td>
                            {{ $sponsor->office }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sponsor.fields.template') }}
                        </th>
                        <td>
                            {{ $sponsor->template }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sponsor.fields.layout') }}
                        </th>
                        <td>
                            {{ $sponsor->layout }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sponsor.fields.customers') }}
                        </th>
                        <td>
                            @foreach($sponsor->customers as $key => $customers)
                                <span class="label label-info">{{ $customers->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sponsor.fields.carriers') }}
                        </th>
                        <td>
                            @foreach($sponsor->carriers as $key => $carriers)
                                <span class="label label-info">{{ $carriers->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sponsor.fields.phone_numbers') }}
                        </th>
                        <td>
                            @foreach($sponsor->phone_numbers as $key => $phone_numbers)
                                <span class="label label-info">{{ $phone_numbers->number }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.sponsors.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection