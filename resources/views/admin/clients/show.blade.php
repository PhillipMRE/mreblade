@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.client.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.clients.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.id') }}
                        </th>
                        <td>
                            {{ $client->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.name') }}
                        </th>
                        <td>
                            {{ $client->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.published') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $client->published ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.archived') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $client->archived ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.claimed') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $client->claimed ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.photo') }}
                        </th>
                        <td>
                            @if($client->photo)
                                <a href="{{ $client->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $client->photo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.agent') }}
                        </th>
                        <td>
                            {{ $client->agent->display_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.settings') }}
                        </th>
                        <td>
                            {{ $client->settings }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.category') }}
                        </th>
                        <td>
                            {{ $client->category }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.stub') }}
                        </th>
                        <td>
                            {{ $client->stub }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.muted') }}
                        </th>
                        <td>
                            {{ $client->muted }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.muted_at') }}
                        </th>
                        <td>
                            {{ $client->muted_at }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.source') }}
                        </th>
                        <td>
                            {{ $client->source }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.sub_source') }}
                        </th>
                        <td>
                            {{ $client->sub_source }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.suspended') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $client->suspended ? 'checked' : '' }}>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.clients.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection