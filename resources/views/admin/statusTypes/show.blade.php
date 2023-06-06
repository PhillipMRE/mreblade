@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.statusType.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.status-types.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.statusType.fields.id') }}
                        </th>
                        <td>
                            {{ $statusType->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.statusType.fields.name') }}
                        </th>
                        <td>
                            {{ $statusType->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.statusType.fields.listing_status') }}
                        </th>
                        <td>
                            {{ $statusType->listing_status }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.statusType.fields.board') }}
                        </th>
                        <td>
                            {{ $statusType->board->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.status-types.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection