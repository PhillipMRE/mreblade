@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.keyword.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.keywords.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.keyword.fields.id') }}
                        </th>
                        <td>
                            {{ $keyword->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.keyword.fields.name') }}
                        </th>
                        <td>
                            {{ $keyword->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.keyword.fields.template') }}
                        </th>
                        <td>
                            {{ $keyword->template }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.keyword.fields.map') }}
                        </th>
                        <td>
                            {{ $keyword->map }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.keyword.fields.house_types') }}
                        </th>
                        <td>
                            {{ $keyword->house_types }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.keyword.fields.status_types') }}
                        </th>
                        <td>
                            {{ $keyword->status_types }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.keyword.fields.shortcode') }}
                        </th>
                        <td>
                            {{ $keyword->shortcode }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.keyword.fields.listing_settings') }}
                        </th>
                        <td>
                            {{ $keyword->listing_settings }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.keyword.fields.sponsor_only') }}
                        </th>
                        <td>
                            {{ $keyword->sponsor_only }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.keyword.fields.agents') }}
                        </th>
                        <td>
                            @foreach($keyword->agents as $key => $agents)
                                <span class="label label-info">{{ $agents->display_name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.keyword.fields.customer') }}
                        </th>
                        <td>
                            {{ $keyword->customer->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.keyword.fields.show_solds') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $keyword->show_solds ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.keyword.fields.use_version_5') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $keyword->use_version_5 ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.keyword.fields.active') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $keyword->active ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.keyword.fields.listhub') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $keyword->listhub ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.keyword.fields.lending_officer') }}
                        </th>
                        <td>
                            {{ $keyword->lending_officer->display_name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.keywords.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection