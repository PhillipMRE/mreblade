@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.keywordApp.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.keyword-apps.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.keywordApp.fields.id') }}
                        </th>
                        <td>
                            {{ $keywordApp->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.keywordApp.fields.name') }}
                        </th>
                        <td>
                            {{ $keywordApp->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.keywordApp.fields.short_name') }}
                        </th>
                        <td>
                            {{ $keywordApp->short_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.keywordApp.fields.description') }}
                        </th>
                        <td>
                            {{ $keywordApp->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.keywordApp.fields.template') }}
                        </th>
                        <td>
                            {{ $keywordApp->template }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.keywordApp.fields.apple_version') }}
                        </th>
                        <td>
                            {{ $keywordApp->apple_version }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.keywordApp.fields.google_version') }}
                        </th>
                        <td>
                            {{ $keywordApp->google_version }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.keywordApp.fields.apple_mre_version') }}
                        </th>
                        <td>
                            {{ $keywordApp->apple_mre_version }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.keywordApp.fields.google_mre_version') }}
                        </th>
                        <td>
                            {{ $keywordApp->google_mre_version }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.keywordApp.fields.apple') }}
                        </th>
                        <td>
                            {{ $keywordApp->apple }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.keywordApp.fields.google') }}
                        </th>
                        <td>
                            {{ $keywordApp->google }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.keyword-apps.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection