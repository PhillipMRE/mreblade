@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.agent.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.agents.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.agent.fields.id') }}
                        </th>
                        <td>
                            {{ $agent->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agent.fields.published') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $agent->published ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agent.fields.is_vetted') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $agent->is_vetted ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agent.fields.user_confirmed_info') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $agent->user_confirmed_info ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agent.fields.demo') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $agent->demo ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agent.fields.user') }}
                        </th>
                        <td>
                            {{ $agent->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agent.fields.display_name') }}
                        </th>
                        <td>
                            {{ $agent->display_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agent.fields.timezone') }}
                        </th>
                        <td>
                            {{ $agent->timezone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agent.fields.call_line') }}
                        </th>
                        <td>
                            {{ $agent->call_line }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agent.fields.biography') }}
                        </th>
                        <td>
                            {!! $agent->biography !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agent.fields.license') }}
                        </th>
                        <td>
                            {{ $agent->license }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agent.fields.website') }}
                        </th>
                        <td>
                            {{ $agent->website }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agent.fields.facebook') }}
                        </th>
                        <td>
                            {{ $agent->facebook }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agent.fields.youtube') }}
                        </th>
                        <td>
                            {{ $agent->youtube }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agent.fields.linkedin') }}
                        </th>
                        <td>
                            {{ $agent->linkedin }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agent.fields.twitter') }}
                        </th>
                        <td>
                            {{ $agent->twitter }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agent.fields.instagram') }}
                        </th>
                        <td>
                            {{ $agent->instagram }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agent.fields.settings') }}
                        </th>
                        <td>
                            {{ $agent->settings }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agent.fields.office') }}
                        </th>
                        <td>
                            {{ $agent->office }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agent.fields.template') }}
                        </th>
                        <td>
                            {{ $agent->template }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agent.fields.vetting_data') }}
                        </th>
                        <td>
                            {{ $agent->vetting_data }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agent.fields.phone') }}
                        </th>
                        <td>
                            @foreach($agent->phones as $key => $phone)
                                <span class="label label-info">{{ $phone->number }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.agents.index') }}">
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
            <a class="nav-link" href="#agent_clients" role="tab" data-toggle="tab">
                {{ trans('cruds.client.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="agent_clients">
            @includeIf('admin.agents.relationships.agentClients', ['clients' => $agent->agentClients])
        </div>
    </div>
</div>

@endsection