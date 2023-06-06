@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.board.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.boards.update", [$board->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <div class="form-check {{ $errors->has('published') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="published" value="0">
                    <input class="form-check-input" type="checkbox" name="published" id="published" value="1" {{ $board->published || old('published', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="published">{{ trans('cruds.board.fields.published') }}</label>
                </div>
                @if($errors->has('published'))
                    <div class="invalid-feedback">
                        {{ $errors->first('published') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.board.fields.published_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="name">{{ trans('cruds.board.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $board->name) }}">
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.board.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="source">{{ trans('cruds.board.fields.source') }}</label>
                <input class="form-control {{ $errors->has('source') ? 'is-invalid' : '' }}" type="text" name="source" id="source" value="{{ old('source', $board->source) }}">
                @if($errors->has('source'))
                    <div class="invalid-feedback">
                        {{ $errors->first('source') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.board.fields.source_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.board.fields.description') }}</label>
                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{{ old('description', $board->description) }}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.board.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('show_courtesy') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="show_courtesy" value="0">
                    <input class="form-check-input" type="checkbox" name="show_courtesy" id="show_courtesy" value="1" {{ $board->show_courtesy || old('show_courtesy', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="show_courtesy">{{ trans('cruds.board.fields.show_courtesy') }}</label>
                </div>
                @if($errors->has('show_courtesy'))
                    <div class="invalid-feedback">
                        {{ $errors->first('show_courtesy') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.board.fields.show_courtesy_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('prominent_courtesy_of') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="prominent_courtesy_of" value="0">
                    <input class="form-check-input" type="checkbox" name="prominent_courtesy_of" id="prominent_courtesy_of" value="1" {{ $board->prominent_courtesy_of || old('prominent_courtesy_of', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="prominent_courtesy_of">{{ trans('cruds.board.fields.prominent_courtesy_of') }}</label>
                </div>
                @if($errors->has('prominent_courtesy_of'))
                    <div class="invalid-feedback">
                        {{ $errors->first('prominent_courtesy_of') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.board.fields.prominent_courtesy_of_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="disclaimer">{{ trans('cruds.board.fields.disclaimer') }}</label>
                <textarea class="form-control {{ $errors->has('disclaimer') ? 'is-invalid' : '' }}" name="disclaimer" id="disclaimer">{{ old('disclaimer', $board->disclaimer) }}</textarea>
                @if($errors->has('disclaimer'))
                    <div class="invalid-feedback">
                        {{ $errors->first('disclaimer') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.board.fields.disclaimer_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="state">{{ trans('cruds.board.fields.state') }}</label>
                <input class="form-control {{ $errors->has('state') ? 'is-invalid' : '' }}" type="text" name="state" id="state" value="{{ old('state', $board->state) }}">
                @if($errors->has('state'))
                    <div class="invalid-feedback">
                        {{ $errors->first('state') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.board.fields.state_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="general_area">{{ trans('cruds.board.fields.general_area') }}</label>
                <textarea class="form-control {{ $errors->has('general_area') ? 'is-invalid' : '' }}" name="general_area" id="general_area">{{ old('general_area', $board->general_area) }}</textarea>
                @if($errors->has('general_area'))
                    <div class="invalid-feedback">
                        {{ $errors->first('general_area') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.board.fields.general_area_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('agent_roster') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="agent_roster" value="0">
                    <input class="form-check-input" type="checkbox" name="agent_roster" id="agent_roster" value="1" {{ $board->agent_roster || old('agent_roster', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="agent_roster">{{ trans('cruds.board.fields.agent_roster') }}</label>
                </div>
                @if($errors->has('agent_roster'))
                    <div class="invalid-feedback">
                        {{ $errors->first('agent_roster') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.board.fields.agent_roster_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="sold_data">{{ trans('cruds.board.fields.sold_data') }}</label>
                <textarea class="form-control {{ $errors->has('sold_data') ? 'is-invalid' : '' }}" name="sold_data" id="sold_data">{{ old('sold_data', $board->sold_data) }}</textarea>
                @if($errors->has('sold_data'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sold_data') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.board.fields.sold_data_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('strict_customer') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="strict_customer" value="0">
                    <input class="form-check-input" type="checkbox" name="strict_customer" id="strict_customer" value="1" {{ $board->strict_customer || old('strict_customer', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="strict_customer">{{ trans('cruds.board.fields.strict_customer') }}</label>
                </div>
                @if($errors->has('strict_customer'))
                    <div class="invalid-feedback">
                        {{ $errors->first('strict_customer') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.board.fields.strict_customer_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('expand_courtesy_by_default') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="expand_courtesy_by_default" value="0">
                    <input class="form-check-input" type="checkbox" name="expand_courtesy_by_default" id="expand_courtesy_by_default" value="1" {{ $board->expand_courtesy_by_default || old('expand_courtesy_by_default', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="expand_courtesy_by_default">{{ trans('cruds.board.fields.expand_courtesy_by_default') }}</label>
                </div>
                @if($errors->has('expand_courtesy_by_default'))
                    <div class="invalid-feedback">
                        {{ $errors->first('expand_courtesy_by_default') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.board.fields.expand_courtesy_by_default_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('include_office_name_on_listing') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="include_office_name_on_listing" value="0">
                    <input class="form-check-input" type="checkbox" name="include_office_name_on_listing" id="include_office_name_on_listing" value="1" {{ $board->include_office_name_on_listing || old('include_office_name_on_listing', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="include_office_name_on_listing">{{ trans('cruds.board.fields.include_office_name_on_listing') }}</label>
                </div>
                @if($errors->has('include_office_name_on_listing'))
                    <div class="invalid-feedback">
                        {{ $errors->first('include_office_name_on_listing') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.board.fields.include_office_name_on_listing_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('include_agent_name_on_listing') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="include_agent_name_on_listing" value="0">
                    <input class="form-check-input" type="checkbox" name="include_agent_name_on_listing" id="include_agent_name_on_listing" value="1" {{ $board->include_agent_name_on_listing || old('include_agent_name_on_listing', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="include_agent_name_on_listing">{{ trans('cruds.board.fields.include_agent_name_on_listing') }}</label>
                </div>
                @if($errors->has('include_agent_name_on_listing'))
                    <div class="invalid-feedback">
                        {{ $errors->first('include_agent_name_on_listing') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.board.fields.include_agent_name_on_listing_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('show_tooltip_on_non_mls_data') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="show_tooltip_on_non_mls_data" value="0">
                    <input class="form-check-input" type="checkbox" name="show_tooltip_on_non_mls_data" id="show_tooltip_on_non_mls_data" value="1" {{ $board->show_tooltip_on_non_mls_data || old('show_tooltip_on_non_mls_data', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="show_tooltip_on_non_mls_data">{{ trans('cruds.board.fields.show_tooltip_on_non_mls_data') }}</label>
                </div>
                @if($errors->has('show_tooltip_on_non_mls_data'))
                    <div class="invalid-feedback">
                        {{ $errors->first('show_tooltip_on_non_mls_data') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.board.fields.show_tooltip_on_non_mls_data_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('hide_days_on_market') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="hide_days_on_market" value="0">
                    <input class="form-check-input" type="checkbox" name="hide_days_on_market" id="hide_days_on_market" value="1" {{ $board->hide_days_on_market || old('hide_days_on_market', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="hide_days_on_market">{{ trans('cruds.board.fields.hide_days_on_market') }}</label>
                </div>
                @if($errors->has('hide_days_on_market'))
                    <div class="invalid-feedback">
                        {{ $errors->first('hide_days_on_market') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.board.fields.hide_days_on_market_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="zoom">{{ trans('cruds.board.fields.zoom') }}</label>
                <input class="form-control {{ $errors->has('zoom') ? 'is-invalid' : '' }}" type="text" name="zoom" id="zoom" value="{{ old('zoom', $board->zoom) }}">
                @if($errors->has('zoom'))
                    <div class="invalid-feedback">
                        {{ $errors->first('zoom') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.board.fields.zoom_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="latitude">{{ trans('cruds.board.fields.latitude') }}</label>
                <input class="form-control {{ $errors->has('latitude') ? 'is-invalid' : '' }}" type="text" name="latitude" id="latitude" value="{{ old('latitude', $board->latitude) }}">
                @if($errors->has('latitude'))
                    <div class="invalid-feedback">
                        {{ $errors->first('latitude') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.board.fields.latitude_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="longitude">{{ trans('cruds.board.fields.longitude') }}</label>
                <input class="form-control {{ $errors->has('longitude') ? 'is-invalid' : '' }}" type="text" name="longitude" id="longitude" value="{{ old('longitude', $board->longitude) }}">
                @if($errors->has('longitude'))
                    <div class="invalid-feedback">
                        {{ $errors->first('longitude') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.board.fields.longitude_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="last_sync_at">{{ trans('cruds.board.fields.last_sync_at') }}</label>
                <input class="form-control datetime {{ $errors->has('last_sync_at') ? 'is-invalid' : '' }}" type="text" name="last_sync_at" id="last_sync_at" value="{{ old('last_sync_at', $board->last_sync_at) }}">
                @if($errors->has('last_sync_at'))
                    <div class="invalid-feedback">
                        {{ $errors->first('last_sync_at') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.board.fields.last_sync_at_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="private_note">{{ trans('cruds.board.fields.private_note') }}</label>
                <textarea class="form-control {{ $errors->has('private_note') ? 'is-invalid' : '' }}" name="private_note" id="private_note">{{ old('private_note', $board->private_note) }}</textarea>
                @if($errors->has('private_note'))
                    <div class="invalid-feedback">
                        {{ $errors->first('private_note') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.board.fields.private_note_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="public_note">{{ trans('cruds.board.fields.public_note') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('public_note') ? 'is-invalid' : '' }}" name="public_note" id="public_note">{!! old('public_note', $board->public_note) !!}</textarea>
                @if($errors->has('public_note'))
                    <div class="invalid-feedback">
                        {{ $errors->first('public_note') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.board.fields.public_note_helper') }}</span>
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
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '{{ route('admin.boards.storeCKEditorImages') }}', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', '{{ $board->id ?? 0 }}');
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

@endsection