@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.carrier.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.carriers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.carrier.fields.id') }}
                        </th>
                        <td>
                            {{ $carrier->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.carrier.fields.carrier') }}
                        </th>
                        <td>
                            {{ $carrier->carrier }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.carrier.fields.name') }}
                        </th>
                        <td>
                            {{ $carrier->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.carrier.fields.email_to_text') }}
                        </th>
                        <td>
                            {{ $carrier->email_to_text }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.carriers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection