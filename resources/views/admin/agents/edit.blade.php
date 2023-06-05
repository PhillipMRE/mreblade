@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.agent.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.agents.update", [$agent->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <div class="form-check {{ $errors->has('published') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="published" value="0">
                    <input class="form-check-input" type="checkbox" name="published" id="published" value="1" {{ $agent->published || old('published', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="published">{{ trans('cruds.agent.fields.published') }}</label>
                </div>
                @if($errors->has('published'))
                    <div class="invalid-feedback">
                        {{ $errors->first('published') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.agent.fields.published_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="user_id">{{ trans('cruds.agent.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id">
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $agent->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.agent.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="display_name">{{ trans('cruds.agent.fields.display_name') }}</label>
                <input class="form-control {{ $errors->has('display_name') ? 'is-invalid' : '' }}" type="text" name="display_name" id="display_name" value="{{ old('display_name', $agent->display_name) }}">
                @if($errors->has('display_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('display_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.agent.fields.display_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="notify_phone">{{ trans('cruds.agent.fields.notify_phone') }}</label>
                <input class="form-control {{ $errors->has('notify_phone') ? 'is-invalid' : '' }}" type="text" name="notify_phone" id="notify_phone" value="{{ old('notify_phone', $agent->notify_phone) }}">
                @if($errors->has('notify_phone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('notify_phone') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.agent.fields.notify_phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="contact_phone">{{ trans('cruds.agent.fields.contact_phone') }}</label>
                <input class="form-control {{ $errors->has('contact_phone') ? 'is-invalid' : '' }}" type="text" name="contact_phone" id="contact_phone" value="{{ old('contact_phone', $agent->contact_phone) }}">
                @if($errors->has('contact_phone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('contact_phone') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.agent.fields.contact_phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="timezone">{{ trans('cruds.agent.fields.timezone') }}</label>
                <input class="form-control {{ $errors->has('timezone') ? 'is-invalid' : '' }}" type="text" name="timezone" id="timezone" value="{{ old('timezone', $agent->timezone) }}">
                @if($errors->has('timezone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('timezone') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.agent.fields.timezone_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="call_line">{{ trans('cruds.agent.fields.call_line') }}</label>
                <input class="form-control {{ $errors->has('call_line') ? 'is-invalid' : '' }}" type="text" name="call_line" id="call_line" value="{{ old('call_line', $agent->call_line) }}">
                @if($errors->has('call_line'))
                    <div class="invalid-feedback">
                        {{ $errors->first('call_line') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.agent.fields.call_line_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="biography">{{ trans('cruds.agent.fields.biography') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('biography') ? 'is-invalid' : '' }}" name="biography" id="biography">{!! old('biography', $agent->biography) !!}</textarea>
                @if($errors->has('biography'))
                    <div class="invalid-feedback">
                        {{ $errors->first('biography') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.agent.fields.biography_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="license">{{ trans('cruds.agent.fields.license') }}</label>
                <input class="form-control {{ $errors->has('license') ? 'is-invalid' : '' }}" type="text" name="license" id="license" value="{{ old('license', $agent->license) }}">
                @if($errors->has('license'))
                    <div class="invalid-feedback">
                        {{ $errors->first('license') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.agent.fields.license_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="website">{{ trans('cruds.agent.fields.website') }}</label>
                <input class="form-control {{ $errors->has('website') ? 'is-invalid' : '' }}" type="text" name="website" id="website" value="{{ old('website', $agent->website) }}">
                @if($errors->has('website'))
                    <div class="invalid-feedback">
                        {{ $errors->first('website') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.agent.fields.website_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="facebook">{{ trans('cruds.agent.fields.facebook') }}</label>
                <input class="form-control {{ $errors->has('facebook') ? 'is-invalid' : '' }}" type="text" name="facebook" id="facebook" value="{{ old('facebook', $agent->facebook) }}">
                @if($errors->has('facebook'))
                    <div class="invalid-feedback">
                        {{ $errors->first('facebook') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.agent.fields.facebook_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="youtube">{{ trans('cruds.agent.fields.youtube') }}</label>
                <input class="form-control {{ $errors->has('youtube') ? 'is-invalid' : '' }}" type="text" name="youtube" id="youtube" value="{{ old('youtube', $agent->youtube) }}">
                @if($errors->has('youtube'))
                    <div class="invalid-feedback">
                        {{ $errors->first('youtube') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.agent.fields.youtube_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="linkedin">{{ trans('cruds.agent.fields.linkedin') }}</label>
                <input class="form-control {{ $errors->has('linkedin') ? 'is-invalid' : '' }}" type="text" name="linkedin" id="linkedin" value="{{ old('linkedin', $agent->linkedin) }}">
                @if($errors->has('linkedin'))
                    <div class="invalid-feedback">
                        {{ $errors->first('linkedin') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.agent.fields.linkedin_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="twitter">{{ trans('cruds.agent.fields.twitter') }}</label>
                <input class="form-control {{ $errors->has('twitter') ? 'is-invalid' : '' }}" type="text" name="twitter" id="twitter" value="{{ old('twitter', $agent->twitter) }}">
                @if($errors->has('twitter'))
                    <div class="invalid-feedback">
                        {{ $errors->first('twitter') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.agent.fields.twitter_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="instagram">{{ trans('cruds.agent.fields.instagram') }}</label>
                <input class="form-control {{ $errors->has('instagram') ? 'is-invalid' : '' }}" type="text" name="instagram" id="instagram" value="{{ old('instagram', $agent->instagram) }}">
                @if($errors->has('instagram'))
                    <div class="invalid-feedback">
                        {{ $errors->first('instagram') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.agent.fields.instagram_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="settings">{{ trans('cruds.agent.fields.settings') }}</label>
                <input class="form-control {{ $errors->has('settings') ? 'is-invalid' : '' }}" type="text" name="settings" id="settings" value="{{ old('settings', $agent->settings) }}">
                @if($errors->has('settings'))
                    <div class="invalid-feedback">
                        {{ $errors->first('settings') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.agent.fields.settings_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="office">{{ trans('cruds.agent.fields.office') }}</label>
                <input class="form-control {{ $errors->has('office') ? 'is-invalid' : '' }}" type="text" name="office" id="office" value="{{ old('office', $agent->office) }}">
                @if($errors->has('office'))
                    <div class="invalid-feedback">
                        {{ $errors->first('office') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.agent.fields.office_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="template">{{ trans('cruds.agent.fields.template') }}</label>
                <textarea class="form-control {{ $errors->has('template') ? 'is-invalid' : '' }}" name="template" id="template">{{ old('template', $agent->template) }}</textarea>
                @if($errors->has('template'))
                    <div class="invalid-feedback">
                        {{ $errors->first('template') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.agent.fields.template_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('is_vetted') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="is_vetted" value="0">
                    <input class="form-check-input" type="checkbox" name="is_vetted" id="is_vetted" value="1" {{ $agent->is_vetted || old('is_vetted', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_vetted">{{ trans('cruds.agent.fields.is_vetted') }}</label>
                </div>
                @if($errors->has('is_vetted'))
                    <div class="invalid-feedback">
                        {{ $errors->first('is_vetted') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.agent.fields.is_vetted_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="vetting_data">{{ trans('cruds.agent.fields.vetting_data') }}</label>
                <input class="form-control date {{ $errors->has('vetting_data') ? 'is-invalid' : '' }}" type="text" name="vetting_data" id="vetting_data" value="{{ old('vetting_data', $agent->vetting_data) }}">
                @if($errors->has('vetting_data'))
                    <div class="invalid-feedback">
                        {{ $errors->first('vetting_data') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.agent.fields.vetting_data_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('user_confirmed_info') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="user_confirmed_info" value="0">
                    <input class="form-check-input" type="checkbox" name="user_confirmed_info" id="user_confirmed_info" value="1" {{ $agent->user_confirmed_info || old('user_confirmed_info', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="user_confirmed_info">{{ trans('cruds.agent.fields.user_confirmed_info') }}</label>
                </div>
                @if($errors->has('user_confirmed_info'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user_confirmed_info') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.agent.fields.user_confirmed_info_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('demo') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="demo" value="0">
                    <input class="form-check-input" type="checkbox" name="demo" id="demo" value="1" {{ $agent->demo || old('demo', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="demo">{{ trans('cruds.agent.fields.demo') }}</label>
                </div>
                @if($errors->has('demo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('demo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.agent.fields.demo_helper') }}</span>
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
                xhr.open('POST', '{{ route('admin.agents.storeCKEditorImages') }}', true);
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
                data.append('crud_id', '{{ $agent->id ?? 0 }}');
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