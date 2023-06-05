@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.emailHistory.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.email-histories.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.emailHistory.fields.id') }}
                        </th>
                        <td>
                            {{ $emailHistory->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.emailHistory.fields.recipient_email') }}
                        </th>
                        <td>
                            {{ $emailHistory->recipient_email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.emailHistory.fields.sender_email') }}
                        </th>
                        <td>
                            {{ $emailHistory->sender_email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.emailHistory.fields.subject') }}
                        </th>
                        <td>
                            {{ $emailHistory->subject }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.emailHistory.fields.state') }}
                        </th>
                        <td>
                            {{ $emailHistory->state }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.emailHistory.fields.opens') }}
                        </th>
                        <td>
                            {{ $emailHistory->opens }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.emailHistory.fields.clicks') }}
                        </th>
                        <td>
                            {{ $emailHistory->clicks }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.emailHistory.fields.ts') }}
                        </th>
                        <td>
                            {{ $emailHistory->ts }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.emailHistory.fields.customer') }}
                        </th>
                        <td>
                            {{ $emailHistory->customer->active ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.emailHistory.fields.msg') }}
                        </th>
                        <td>
                            {{ $emailHistory->msg }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.email-histories.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection