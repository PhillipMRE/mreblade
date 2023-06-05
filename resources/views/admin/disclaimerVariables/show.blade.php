@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.disclaimerVariable.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.disclaimer-variables.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.disclaimerVariable.fields.id') }}
                        </th>
                        <td>
                            {{ $disclaimerVariable->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.disclaimerVariable.fields.name') }}
                        </th>
                        <td>
                            {{ $disclaimerVariable->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.disclaimerVariable.fields.description') }}
                        </th>
                        <td>
                            {{ $disclaimerVariable->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.disclaimerVariable.fields.path') }}
                        </th>
                        <td>
                            {{ $disclaimerVariable->path }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.disclaimerVariable.fields.interpolator') }}
                        </th>
                        <td>
                            {{ $disclaimerVariable->interpolator }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.disclaimer-variables.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection