@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.board.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.boards.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.board.fields.id') }}
                        </th>
                        <td>
                            {{ $board->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.board.fields.published') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $board->published ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.board.fields.name') }}
                        </th>
                        <td>
                            {{ $board->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.board.fields.source') }}
                        </th>
                        <td>
                            {{ $board->source }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.board.fields.description') }}
                        </th>
                        <td>
                            {{ $board->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.board.fields.show_courtesy') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $board->show_courtesy ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.board.fields.prominent_courtesy_of') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $board->prominent_courtesy_of ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.board.fields.disclaimer') }}
                        </th>
                        <td>
                            {{ $board->disclaimer }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.board.fields.state') }}
                        </th>
                        <td>
                            {{ $board->state }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.board.fields.general_area') }}
                        </th>
                        <td>
                            {{ $board->general_area }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.board.fields.agent_roster') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $board->agent_roster ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.board.fields.sold_data') }}
                        </th>
                        <td>
                            {{ $board->sold_data }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.board.fields.strict_customer') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $board->strict_customer ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.board.fields.expand_courtesy_by_default') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $board->expand_courtesy_by_default ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.board.fields.include_office_name_on_listing') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $board->include_office_name_on_listing ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.board.fields.include_agent_name_on_listing') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $board->include_agent_name_on_listing ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.board.fields.show_tooltip_on_non_mls_data') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $board->show_tooltip_on_non_mls_data ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.board.fields.hide_days_on_market') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $board->hide_days_on_market ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.board.fields.zoom') }}
                        </th>
                        <td>
                            {{ $board->zoom }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.board.fields.latitude') }}
                        </th>
                        <td>
                            {{ $board->latitude }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.board.fields.longitude') }}
                        </th>
                        <td>
                            {{ $board->longitude }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.board.fields.last_sync_at') }}
                        </th>
                        <td>
                            {{ $board->last_sync_at }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.board.fields.private_note') }}
                        </th>
                        <td>
                            {{ $board->private_note }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.board.fields.public_note') }}
                        </th>
                        <td>
                            {!! $board->public_note !!}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.boards.index') }}">
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
            <a class="nav-link" href="#board_state_residents" role="tab" data-toggle="tab">
                {{ trans('cruds.stateResident.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="board_state_residents">
            @includeIf('admin.boards.relationships.boardStateResidents', ['stateResidents' => $board->boardStateResidents])
        </div>
    </div>
</div>

@endsection