@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.client.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.clients.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <div class="form-check {{ $errors->has('published') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="published" value="0">
                    <input class="form-check-input" type="checkbox" name="published" id="published" value="1" {{ old('published', 0) == 1 || old('published') === null ? 'checked' : '' }}>
                    <label class="form-check-label" for="published">{{ trans('cruds.client.fields.published') }}</label>
                </div>
                @if($errors->has('published'))
                    <div class="invalid-feedback">
                        {{ $errors->first('published') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.published_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('archived') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="archived" value="0">
                    <input class="form-check-input" type="checkbox" name="archived" id="archived" value="1" {{ old('archived', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="archived">{{ trans('cruds.client.fields.archived') }}</label>
                </div>
                @if($errors->has('archived'))
                    <div class="invalid-feedback">
                        {{ $errors->first('archived') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.archived_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('claimed') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="claimed" value="0">
                    <input class="form-check-input" type="checkbox" name="claimed" id="claimed" value="1" {{ old('claimed', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="claimed">{{ trans('cruds.client.fields.claimed') }}</label>
                </div>
                @if($errors->has('claimed'))
                    <div class="invalid-feedback">
                        {{ $errors->first('claimed') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.claimed_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('suspended') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="suspended" value="0">
                    <input class="form-check-input" type="checkbox" name="suspended" id="suspended" value="1" {{ old('suspended', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="suspended">{{ trans('cruds.client.fields.suspended') }}</label>
                </div>
                @if($errors->has('suspended'))
                    <div class="invalid-feedback">
                        {{ $errors->first('suspended') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.suspended_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="name">{{ trans('cruds.client.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}">
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="photo">{{ trans('cruds.client.fields.photo') }}</label>
                <div class="needsclick dropzone {{ $errors->has('photo') ? 'is-invalid' : '' }}" id="photo-dropzone">
                </div>
                @if($errors->has('photo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('photo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.photo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="agent_id">{{ trans('cruds.client.fields.agent') }}</label>
                <select class="form-control select2 {{ $errors->has('agent') ? 'is-invalid' : '' }}" name="agent_id" id="agent_id">
                    @foreach($agents as $id => $entry)
                        <option value="{{ $id }}" {{ old('agent_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('agent'))
                    <div class="invalid-feedback">
                        {{ $errors->first('agent') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.agent_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="settings">{{ trans('cruds.client.fields.settings') }}</label>
                <input class="form-control {{ $errors->has('settings') ? 'is-invalid' : '' }}" type="text" name="settings" id="settings" value="{{ old('settings', '') }}">
                @if($errors->has('settings'))
                    <div class="invalid-feedback">
                        {{ $errors->first('settings') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.settings_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="category">{{ trans('cruds.client.fields.category') }}</label>
                <input class="form-control {{ $errors->has('category') ? 'is-invalid' : '' }}" type="text" name="category" id="category" value="{{ old('category', '') }}">
                @if($errors->has('category'))
                    <div class="invalid-feedback">
                        {{ $errors->first('category') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.category_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="stub">{{ trans('cruds.client.fields.stub') }}</label>
                <input class="form-control {{ $errors->has('stub') ? 'is-invalid' : '' }}" type="text" name="stub" id="stub" value="{{ old('stub', '') }}">
                @if($errors->has('stub'))
                    <div class="invalid-feedback">
                        {{ $errors->first('stub') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.stub_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="muted">{{ trans('cruds.client.fields.muted') }}</label>
                <input class="form-control {{ $errors->has('muted') ? 'is-invalid' : '' }}" type="text" name="muted" id="muted" value="{{ old('muted', '') }}">
                @if($errors->has('muted'))
                    <div class="invalid-feedback">
                        {{ $errors->first('muted') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.muted_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="muted_at">{{ trans('cruds.client.fields.muted_at') }}</label>
                <input class="form-control datetime {{ $errors->has('muted_at') ? 'is-invalid' : '' }}" type="text" name="muted_at" id="muted_at" value="{{ old('muted_at') }}">
                @if($errors->has('muted_at'))
                    <div class="invalid-feedback">
                        {{ $errors->first('muted_at') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.muted_at_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="source">{{ trans('cruds.client.fields.source') }}</label>
                <input class="form-control {{ $errors->has('source') ? 'is-invalid' : '' }}" type="text" name="source" id="source" value="{{ old('source', '') }}">
                @if($errors->has('source'))
                    <div class="invalid-feedback">
                        {{ $errors->first('source') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.source_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="sub_source">{{ trans('cruds.client.fields.sub_source') }}</label>
                <input class="form-control {{ $errors->has('sub_source') ? 'is-invalid' : '' }}" type="text" name="sub_source" id="sub_source" value="{{ old('sub_source', '') }}">
                @if($errors->has('sub_source'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sub_source') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.sub_source_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="phone_numbers">{{ trans('cruds.client.fields.phone_numbers') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('phone_numbers') ? 'is-invalid' : '' }}" name="phone_numbers[]" id="phone_numbers" multiple>
                    @foreach($phone_numbers as $id => $phone_number)
                        <option value="{{ $id }}" {{ in_array($id, old('phone_numbers', [])) ? 'selected' : '' }}>{{ $phone_number }}</option>
                    @endforeach
                </select>
                @if($errors->has('phone_numbers'))
                    <div class="invalid-feedback">
                        {{ $errors->first('phone_numbers') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.phone_numbers_helper') }}</span>
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

@section('scripts')
<script>
    Dropzone.options.photoDropzone = {
    url: '{{ route('admin.clients.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 1200,
      height: 1200
    },
    success: function (file, response) {
      $('form').find('input[name="photo"]').remove()
      $('form').append('<input type="hidden" name="photo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="photo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($client) && $client->photo)
      var file = {!! json_encode($client->photo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="photo" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}

</script>
@endsection