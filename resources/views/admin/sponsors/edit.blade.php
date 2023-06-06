@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.sponsor.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.sponsors.update", [$sponsor->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <div class="form-check {{ $errors->has('published') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="published" value="0">
                    <input class="form-check-input" type="checkbox" name="published" id="published" value="1" {{ $sponsor->published || old('published', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="published">{{ trans('cruds.sponsor.fields.published') }}</label>
                </div>
                @if($errors->has('published'))
                    <div class="invalid-feedback">
                        {{ $errors->first('published') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sponsor.fields.published_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('user_confirmed_info') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="user_confirmed_info" value="0">
                    <input class="form-check-input" type="checkbox" name="user_confirmed_info" id="user_confirmed_info" value="1" {{ $sponsor->user_confirmed_info || old('user_confirmed_info', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="user_confirmed_info">{{ trans('cruds.sponsor.fields.user_confirmed_info') }}</label>
                </div>
                @if($errors->has('user_confirmed_info'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user_confirmed_info') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sponsor.fields.user_confirmed_info_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('can_create_keyword') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="can_create_keyword" value="0">
                    <input class="form-check-input" type="checkbox" name="can_create_keyword" id="can_create_keyword" value="1" {{ $sponsor->can_create_keyword || old('can_create_keyword', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="can_create_keyword">{{ trans('cruds.sponsor.fields.can_create_keyword') }}</label>
                </div>
                @if($errors->has('can_create_keyword'))
                    <div class="invalid-feedback">
                        {{ $errors->first('can_create_keyword') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sponsor.fields.can_create_keyword_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="client_id">{{ trans('cruds.sponsor.fields.client') }}</label>
                <select class="form-control select2 {{ $errors->has('client') ? 'is-invalid' : '' }}" name="client_id" id="client_id">
                    @foreach($clients as $id => $entry)
                        <option value="{{ $id }}" {{ (old('client_id') ? old('client_id') : $sponsor->client->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('client'))
                    <div class="invalid-feedback">
                        {{ $errors->first('client') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sponsor.fields.client_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="user_id">{{ trans('cruds.sponsor.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id">
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $sponsor->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sponsor.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="display_name">{{ trans('cruds.sponsor.fields.display_name') }}</label>
                <input class="form-control {{ $errors->has('display_name') ? 'is-invalid' : '' }}" type="text" name="display_name" id="display_name" value="{{ old('display_name', $sponsor->display_name) }}">
                @if($errors->has('display_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('display_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sponsor.fields.display_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="timezone">{{ trans('cruds.sponsor.fields.timezone') }}</label>
                <input class="form-control {{ $errors->has('timezone') ? 'is-invalid' : '' }}" type="text" name="timezone" id="timezone" value="{{ old('timezone', $sponsor->timezone) }}">
                @if($errors->has('timezone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('timezone') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sponsor.fields.timezone_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="callout_text">{{ trans('cruds.sponsor.fields.callout_text') }}</label>
                <input class="form-control {{ $errors->has('callout_text') ? 'is-invalid' : '' }}" type="text" name="callout_text" id="callout_text" value="{{ old('callout_text', $sponsor->callout_text) }}">
                @if($errors->has('callout_text'))
                    <div class="invalid-feedback">
                        {{ $errors->first('callout_text') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sponsor.fields.callout_text_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="biography">{{ trans('cruds.sponsor.fields.biography') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('biography') ? 'is-invalid' : '' }}" name="biography" id="biography">{!! old('biography', $sponsor->biography) !!}</textarea>
                @if($errors->has('biography'))
                    <div class="invalid-feedback">
                        {{ $errors->first('biography') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sponsor.fields.biography_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="license">{{ trans('cruds.sponsor.fields.license') }}</label>
                <input class="form-control {{ $errors->has('license') ? 'is-invalid' : '' }}" type="text" name="license" id="license" value="{{ old('license', $sponsor->license) }}">
                @if($errors->has('license'))
                    <div class="invalid-feedback">
                        {{ $errors->first('license') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sponsor.fields.license_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="website">{{ trans('cruds.sponsor.fields.website') }}</label>
                <input class="form-control {{ $errors->has('website') ? 'is-invalid' : '' }}" type="text" name="website" id="website" value="{{ old('website', $sponsor->website) }}">
                @if($errors->has('website'))
                    <div class="invalid-feedback">
                        {{ $errors->first('website') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sponsor.fields.website_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="facebook">{{ trans('cruds.sponsor.fields.facebook') }}</label>
                <input class="form-control {{ $errors->has('facebook') ? 'is-invalid' : '' }}" type="text" name="facebook" id="facebook" value="{{ old('facebook', $sponsor->facebook) }}">
                @if($errors->has('facebook'))
                    <div class="invalid-feedback">
                        {{ $errors->first('facebook') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sponsor.fields.facebook_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="youtube">{{ trans('cruds.sponsor.fields.youtube') }}</label>
                <input class="form-control {{ $errors->has('youtube') ? 'is-invalid' : '' }}" type="text" name="youtube" id="youtube" value="{{ old('youtube', $sponsor->youtube) }}">
                @if($errors->has('youtube'))
                    <div class="invalid-feedback">
                        {{ $errors->first('youtube') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sponsor.fields.youtube_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="linkedin">{{ trans('cruds.sponsor.fields.linkedin') }}</label>
                <input class="form-control {{ $errors->has('linkedin') ? 'is-invalid' : '' }}" type="text" name="linkedin" id="linkedin" value="{{ old('linkedin', $sponsor->linkedin) }}">
                @if($errors->has('linkedin'))
                    <div class="invalid-feedback">
                        {{ $errors->first('linkedin') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sponsor.fields.linkedin_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="twitter">{{ trans('cruds.sponsor.fields.twitter') }}</label>
                <input class="form-control {{ $errors->has('twitter') ? 'is-invalid' : '' }}" type="text" name="twitter" id="twitter" value="{{ old('twitter', $sponsor->twitter) }}">
                @if($errors->has('twitter'))
                    <div class="invalid-feedback">
                        {{ $errors->first('twitter') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sponsor.fields.twitter_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="instagram">{{ trans('cruds.sponsor.fields.instagram') }}</label>
                <input class="form-control {{ $errors->has('instagram') ? 'is-invalid' : '' }}" type="text" name="instagram" id="instagram" value="{{ old('instagram', $sponsor->instagram) }}">
                @if($errors->has('instagram'))
                    <div class="invalid-feedback">
                        {{ $errors->first('instagram') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sponsor.fields.instagram_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="settings">{{ trans('cruds.sponsor.fields.settings') }}</label>
                <input class="form-control {{ $errors->has('settings') ? 'is-invalid' : '' }}" type="text" name="settings" id="settings" value="{{ old('settings', $sponsor->settings) }}">
                @if($errors->has('settings'))
                    <div class="invalid-feedback">
                        {{ $errors->first('settings') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sponsor.fields.settings_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="office">{{ trans('cruds.sponsor.fields.office') }}</label>
                <input class="form-control {{ $errors->has('office') ? 'is-invalid' : '' }}" type="text" name="office" id="office" value="{{ old('office', $sponsor->office) }}">
                @if($errors->has('office'))
                    <div class="invalid-feedback">
                        {{ $errors->first('office') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sponsor.fields.office_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="template">{{ trans('cruds.sponsor.fields.template') }}</label>
                <textarea class="form-control {{ $errors->has('template') ? 'is-invalid' : '' }}" name="template" id="template">{{ old('template', $sponsor->template) }}</textarea>
                @if($errors->has('template'))
                    <div class="invalid-feedback">
                        {{ $errors->first('template') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sponsor.fields.template_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="layout">{{ trans('cruds.sponsor.fields.layout') }}</label>
                <input class="form-control {{ $errors->has('layout') ? 'is-invalid' : '' }}" type="text" name="layout" id="layout" value="{{ old('layout', $sponsor->layout) }}">
                @if($errors->has('layout'))
                    <div class="invalid-feedback">
                        {{ $errors->first('layout') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sponsor.fields.layout_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="customers">{{ trans('cruds.sponsor.fields.customers') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('customers') ? 'is-invalid' : '' }}" name="customers[]" id="customers" multiple>
                    @foreach($customers as $id => $customer)
                        <option value="{{ $id }}" {{ (in_array($id, old('customers', [])) || $sponsor->customers->contains($id)) ? 'selected' : '' }}>{{ $customer }}</option>
                    @endforeach
                </select>
                @if($errors->has('customers'))
                    <div class="invalid-feedback">
                        {{ $errors->first('customers') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sponsor.fields.customers_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="carriers">{{ trans('cruds.sponsor.fields.carriers') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('carriers') ? 'is-invalid' : '' }}" name="carriers[]" id="carriers" multiple>
                    @foreach($carriers as $id => $carrier)
                        <option value="{{ $id }}" {{ (in_array($id, old('carriers', [])) || $sponsor->carriers->contains($id)) ? 'selected' : '' }}>{{ $carrier }}</option>
                    @endforeach
                </select>
                @if($errors->has('carriers'))
                    <div class="invalid-feedback">
                        {{ $errors->first('carriers') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sponsor.fields.carriers_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="phone_numbers">{{ trans('cruds.sponsor.fields.phone_numbers') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('phone_numbers') ? 'is-invalid' : '' }}" name="phone_numbers[]" id="phone_numbers" multiple>
                    @foreach($phone_numbers as $id => $phone_number)
                        <option value="{{ $id }}" {{ (in_array($id, old('phone_numbers', [])) || $sponsor->phone_numbers->contains($id)) ? 'selected' : '' }}>{{ $phone_number }}</option>
                    @endforeach
                </select>
                @if($errors->has('phone_numbers'))
                    <div class="invalid-feedback">
                        {{ $errors->first('phone_numbers') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sponsor.fields.phone_numbers_helper') }}</span>
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
                xhr.open('POST', '{{ route('admin.sponsors.storeCKEditorImages') }}', true);
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
                data.append('crud_id', '{{ $sponsor->id ?? 0 }}');
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