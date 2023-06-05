@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.keywordPrerender.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.keyword-prerenders.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.keywordPrerender.fields.id') }}
                        </th>
                        <td>
                            {{ $keywordPrerender->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.keywordPrerender.fields.url') }}
                        </th>
                        <td>
                            {{ $keywordPrerender->url }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.keywordPrerender.fields.memento') }}
                        </th>
                        <td>
                            {{ $keywordPrerender->memento }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.keywordPrerender.fields.keyword') }}
                        </th>
                        <td>
                            {{ $keywordPrerender->keyword->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.keyword-prerenders.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection