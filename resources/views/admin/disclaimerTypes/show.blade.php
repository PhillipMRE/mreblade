@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.disclaimerType.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.disclaimer-types.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.disclaimerType.fields.id') }}
                        </th>
                        <td>
                            {{ $disclaimerType->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.disclaimerType.fields.name') }}
                        </th>
                        <td>
                            {{ $disclaimerType->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.disclaimerType.fields.description') }}
                        </th>
                        <td>
                            {{ $disclaimerType->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.disclaimerType.fields.content') }}
                        </th>
                        <td>
                            {!! $disclaimerType->content !!}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.disclaimer-types.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection