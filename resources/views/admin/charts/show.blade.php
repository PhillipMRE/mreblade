@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.chart.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.charts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.chart.fields.id') }}
                        </th>
                        <td>
                            {{ $chart->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.chart.fields.tag') }}
                        </th>
                        <td>
                            {{ $chart->tag }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.chart.fields.label') }}
                        </th>
                        <td>
                            {{ $chart->label }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.chart.fields.chart_model') }}
                        </th>
                        <td>
                            {{ $chart->chart_model }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.chart.fields.client') }}
                        </th>
                        <td>
                            {{ $chart->client->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.charts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection