@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.stateResident.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.state-residents.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.stateResident.fields.id') }}
                        </th>
                        <td>
                            {{ $stateResident->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.stateResident.fields.state') }}
                        </th>
                        <td>
                            {{ $stateResident->state }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.stateResident.fields.board') }}
                        </th>
                        <td>
                            {{ $stateResident->board->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.state-residents.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection