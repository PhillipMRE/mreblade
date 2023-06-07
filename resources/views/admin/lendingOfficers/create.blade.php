@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.lendingOfficer.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.lending-officers.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <div class="form-check {{ $errors->has('published') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="published" value="0">
                    <input class="form-check-input" type="checkbox" name="published" id="published" value="1" {{ old('published', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="published">{{ trans('cruds.lendingOfficer.fields.published') }}</label>
                </div>
                @if($errors->has('published'))
                    <div class="invalid-feedback">
                        {{ $errors->first('published') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.lendingOfficer.fields.published_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="user_id">{{ trans('cruds.lendingOfficer.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id">
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.lendingOfficer.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="display_name">{{ trans('cruds.lendingOfficer.fields.display_name') }}</label>
                <input class="form-control {{ $errors->has('display_name') ? 'is-invalid' : '' }}" type="text" name="display_name" id="display_name" value="{{ old('display_name', '') }}">
                @if($errors->has('display_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('display_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.lendingOfficer.fields.display_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="notify_phone">{{ trans('cruds.lendingOfficer.fields.notify_phone') }}</label>
                <input class="form-control {{ $errors->has('notify_phone') ? 'is-invalid' : '' }}" type="text" name="notify_phone" id="notify_phone" value="{{ old('notify_phone', '') }}">
                @if($errors->has('notify_phone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('notify_phone') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.lendingOfficer.fields.notify_phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="contact_phone">{{ trans('cruds.lendingOfficer.fields.contact_phone') }}</label>
                <input class="form-control {{ $errors->has('contact_phone') ? 'is-invalid' : '' }}" type="text" name="contact_phone" id="contact_phone" value="{{ old('contact_phone', '') }}">
                @if($errors->has('contact_phone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('contact_phone') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.lendingOfficer.fields.contact_phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="timezone">{{ trans('cruds.lendingOfficer.fields.timezone') }}</label>
                <input class="form-control {{ $errors->has('timezone') ? 'is-invalid' : '' }}" type="text" name="timezone" id="timezone" value="{{ old('timezone', '') }}">
                @if($errors->has('timezone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('timezone') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.lendingOfficer.fields.timezone_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="biography">{{ trans('cruds.lendingOfficer.fields.biography') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('biography') ? 'is-invalid' : '' }}" name="biography" id="biography">{!! old('biography') !!}</textarea>
                @if($errors->has('biography'))
                    <div class="invalid-feedback">
                        {{ $errors->first('biography') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.lendingOfficer.fields.biography_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="license">{{ trans('cruds.lendingOfficer.fields.license') }}</label>
                <input class="form-control {{ $errors->has('license') ? 'is-invalid' : '' }}" type="text" name="license" id="license" value="{{ old('license', '') }}">
                @if($errors->has('license'))
                    <div class="invalid-feedback">
                        {{ $errors->first('license') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.lendingOfficer.fields.license_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="callout_text">{{ trans('cruds.lendingOfficer.fields.callout_text') }}</label>
                <input class="form-control {{ $errors->has('callout_text') ? 'is-invalid' : '' }}" type="text" name="callout_text" id="callout_text" value="{{ old('callout_text', '') }}">
                @if($errors->has('callout_text'))
                    <div class="invalid-feedback">
                        {{ $errors->first('callout_text') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.lendingOfficer.fields.callout_text_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="website">{{ trans('cruds.lendingOfficer.fields.website') }}</label>
                <input class="form-control {{ $errors->has('website') ? 'is-invalid' : '' }}" type="text" name="website" id="website" value="{{ old('website', '') }}">
                @if($errors->has('website'))
                    <div class="invalid-feedback">
                        {{ $errors->first('website') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.lendingOfficer.fields.website_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="facebook">{{ trans('cruds.lendingOfficer.fields.facebook') }}</label>
                <input class="form-control {{ $errors->has('facebook') ? 'is-invalid' : '' }}" type="text" name="facebook" id="facebook" value="{{ old('facebook', '') }}">
                @if($errors->has('facebook'))
                    <div class="invalid-feedback">
                        {{ $errors->first('facebook') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.lendingOfficer.fields.facebook_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="youtube">{{ trans('cruds.lendingOfficer.fields.youtube') }}</label>
                <input class="form-control {{ $errors->has('youtube') ? 'is-invalid' : '' }}" type="text" name="youtube" id="youtube" value="{{ old('youtube', '') }}">
                @if($errors->has('youtube'))
                    <div class="invalid-feedback">
                        {{ $errors->first('youtube') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.lendingOfficer.fields.youtube_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="linkedin">{{ trans('cruds.lendingOfficer.fields.linkedin') }}</label>
                <input class="form-control {{ $errors->has('linkedin') ? 'is-invalid' : '' }}" type="text" name="linkedin" id="linkedin" value="{{ old('linkedin', '') }}">
                @if($errors->has('linkedin'))
                    <div class="invalid-feedback">
                        {{ $errors->first('linkedin') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.lendingOfficer.fields.linkedin_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="twitter">{{ trans('cruds.lendingOfficer.fields.twitter') }}</label>
                <input class="form-control {{ $errors->has('twitter') ? 'is-invalid' : '' }}" type="text" name="twitter" id="twitter" value="{{ old('twitter', '') }}">
                @if($errors->has('twitter'))
                    <div class="invalid-feedback">
                        {{ $errors->first('twitter') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.lendingOfficer.fields.twitter_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="instagram">{{ trans('cruds.lendingOfficer.fields.instagram') }}</label>
                <input class="form-control {{ $errors->has('instagram') ? 'is-invalid' : '' }}" type="text" name="instagram" id="instagram" value="{{ old('instagram', '') }}">
                @if($errors->has('instagram'))
                    <div class="invalid-feedback">
                        {{ $errors->first('instagram') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.lendingOfficer.fields.instagram_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="settings">{{ trans('cruds.lendingOfficer.fields.settings') }}</label>
                <input class="form-control {{ $errors->has('settings') ? 'is-invalid' : '' }}" type="text" name="settings" id="settings" value="{{ old('settings', '') }}">
                @if($errors->has('settings'))
                    <div class="invalid-feedback">
                        {{ $errors->first('settings') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.lendingOfficer.fields.settings_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="office">{{ trans('cruds.lendingOfficer.fields.office') }}</label>
                <input class="form-control {{ $errors->has('office') ? 'is-invalid' : '' }}" type="text" name="office" id="office" value="{{ old('office', '') }}">
                @if($errors->has('office'))
                    <div class="invalid-feedback">
                        {{ $errors->first('office') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.lendingOfficer.fields.office_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="template">{{ trans('cruds.lendingOfficer.fields.template') }}</label>
                <textarea class="form-control {{ $errors->has('template') ? 'is-invalid' : '' }}" name="template" id="template">{{ old('template') }}</textarea>
                @if($errors->has('template'))
                    <div class="invalid-feedback">
                        {{ $errors->first('template') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.lendingOfficer.fields.template_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('user_confirmed_info') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="user_confirmed_info" value="0">
                    <input class="form-check-input" type="checkbox" name="user_confirmed_info" id="user_confirmed_info" value="1" {{ old('user_confirmed_info', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="user_confirmed_info">{{ trans('cruds.lendingOfficer.fields.user_confirmed_info') }}</label>
                </div>
                @if($errors->has('user_confirmed_info'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user_confirmed_info') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.lendingOfficer.fields.user_confirmed_info_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('demo') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="demo" value="0">
                    <input class="form-check-input" type="checkbox" name="demo" id="demo" value="1" {{ old('demo', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="demo">{{ trans('cruds.lendingOfficer.fields.demo') }}</label>
                </div>
                @if($errors->has('demo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('demo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.lendingOfficer.fields.demo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="rates">{{ trans('cruds.lendingOfficer.fields.rates') }}</label>
                <textarea class="form-control {{ $errors->has('rates') ? 'is-invalid' : '' }}" name="rates" id="rates">{{ old('rates') }}</textarea>
                @if($errors->has('rates'))
                    <div class="invalid-feedback">
                        {{ $errors->first('rates') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.lendingOfficer.fields.rates_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="hubspot">{{ trans('cruds.lendingOfficer.fields.hubspot') }}</label>
                <input class="form-control {{ $errors->has('hubspot') ? 'is-invalid' : '' }}" type="text" name="hubspot" id="hubspot" value="{{ old('hubspot', '') }}">
                @if($errors->has('hubspot'))
                    <div class="invalid-feedback">
                        {{ $errors->first('hubspot') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.lendingOfficer.fields.hubspot_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="remote">{{ trans('cruds.lendingOfficer.fields.remote') }}</label>
                <textarea class="form-control {{ $errors->has('remote') ? 'is-invalid' : '' }}" name="remote" id="remote">{{ old('remote') }}</textarea>
                @if($errors->has('remote'))
                    <div class="invalid-feedback">
                        {{ $errors->first('remote') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.lendingOfficer.fields.remote_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="welcome_sent">{{ trans('cruds.lendingOfficer.fields.welcome_sent') }}</label>
                <input class="form-control datetime {{ $errors->has('welcome_sent') ? 'is-invalid' : '' }}" type="text" name="welcome_sent" id="welcome_sent" value="{{ old('welcome_sent') }}">
                @if($errors->has('welcome_sent'))
                    <div class="invalid-feedback">
                        {{ $errors->first('welcome_sent') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.lendingOfficer.fields.welcome_sent_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="phone_numbers">{{ trans('cruds.lendingOfficer.fields.phone_numbers') }}</label>
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
                <span class="help-block">{{ trans('cruds.lendingOfficer.fields.phone_numbers_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="phone_id">{{ trans('cruds.lendingOfficer.fields.phone') }}</label>
                <select class="form-control select2 {{ $errors->has('phone') ? 'is-invalid' : '' }}" name="phone_id" id="phone_id">
                    @foreach($phones as $id => $entry)
                        <option value="{{ $id }}" {{ old('phone_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('phone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('phone') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.lendingOfficer.fields.phone_helper') }}</span>
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
                xhr.open('POST', '{{ route('admin.lending-officers.storeCKEditorImages') }}', true);
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
                data.append('crud_id', '{{ $lendingOfficer->id ?? 0 }}');
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