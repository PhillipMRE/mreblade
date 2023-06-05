@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.quote.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.quotes.update", [$quote->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="purchase_price">{{ trans('cruds.quote.fields.purchase_price') }}</label>
                <input class="form-control {{ $errors->has('purchase_price') ? 'is-invalid' : '' }}" type="text" name="purchase_price" id="purchase_price" value="{{ old('purchase_price', $quote->purchase_price) }}">
                @if($errors->has('purchase_price'))
                    <div class="invalid-feedback">
                        {{ $errors->first('purchase_price') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.quote.fields.purchase_price_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="down_payment">{{ trans('cruds.quote.fields.down_payment') }}</label>
                <input class="form-control {{ $errors->has('down_payment') ? 'is-invalid' : '' }}" type="text" name="down_payment" id="down_payment" value="{{ old('down_payment', $quote->down_payment) }}">
                @if($errors->has('down_payment'))
                    <div class="invalid-feedback">
                        {{ $errors->first('down_payment') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.quote.fields.down_payment_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="credit_score">{{ trans('cruds.quote.fields.credit_score') }}</label>
                <input class="form-control {{ $errors->has('credit_score') ? 'is-invalid' : '' }}" type="text" name="credit_score" id="credit_score" value="{{ old('credit_score', $quote->credit_score) }}">
                @if($errors->has('credit_score'))
                    <div class="invalid-feedback">
                        {{ $errors->first('credit_score') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.quote.fields.credit_score_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="client_id">{{ trans('cruds.quote.fields.client') }}</label>
                <select class="form-control select2 {{ $errors->has('client') ? 'is-invalid' : '' }}" name="client_id" id="client_id">
                    @foreach($clients as $id => $entry)
                        <option value="{{ $id }}" {{ (old('client_id') ? old('client_id') : $quote->client->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('client'))
                    <div class="invalid-feedback">
                        {{ $errors->first('client') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.quote.fields.client_helper') }}</span>
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