@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.chart.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.charts.update", [$chart->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="tag">{{ trans('cruds.chart.fields.tag') }}</label>
                <input class="form-control {{ $errors->has('tag') ? 'is-invalid' : '' }}" type="text" name="tag" id="tag" value="{{ old('tag', $chart->tag) }}">
                @if($errors->has('tag'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tag') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.chart.fields.tag_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="label">{{ trans('cruds.chart.fields.label') }}</label>
                <input class="form-control {{ $errors->has('label') ? 'is-invalid' : '' }}" type="text" name="label" id="label" value="{{ old('label', $chart->label) }}">
                @if($errors->has('label'))
                    <div class="invalid-feedback">
                        {{ $errors->first('label') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.chart.fields.label_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="chart_model">{{ trans('cruds.chart.fields.chart_model') }}</label>
                <input class="form-control {{ $errors->has('chart_model') ? 'is-invalid' : '' }}" type="text" name="chart_model" id="chart_model" value="{{ old('chart_model', $chart->chart_model) }}">
                @if($errors->has('chart_model'))
                    <div class="invalid-feedback">
                        {{ $errors->first('chart_model') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.chart.fields.chart_model_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="client_id">{{ trans('cruds.chart.fields.client') }}</label>
                <select class="form-control select2 {{ $errors->has('client') ? 'is-invalid' : '' }}" name="client_id" id="client_id">
                    @foreach($clients as $id => $entry)
                        <option value="{{ $id }}" {{ (old('client_id') ? old('client_id') : $chart->client->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('client'))
                    <div class="invalid-feedback">
                        {{ $errors->first('client') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.chart.fields.client_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection