@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.post.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.posts.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="featured_image">{{ trans('cruds.post.fields.featured_image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('featured_image') ? 'is-invalid' : '' }}" id="featured_image-dropzone">
                </div>
                @if($errors->has('featured_image'))
                    <div class="invalid-feedback">
                        {{ $errors->first('featured_image') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.post.fields.featured_image_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="title">{{ trans('cruds.post.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', '') }}">
                @if($errors->has('title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.post.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="author_id">{{ trans('cruds.post.fields.author') }}</label>
                <select class="form-control select2 {{ $errors->has('author') ? 'is-invalid' : '' }}" name="author_id" id="author_id">
                    @foreach($authors as $id => $entry)
                        <option value="{{ $id }}" {{ old('author_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('author'))
                    <div class="invalid-feedback">
                        {{ $errors->first('author') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.post.fields.author_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('published') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="published" value="0">
                    <input class="form-check-input" type="checkbox" name="published" id="published" value="1" {{ old('published', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="published">{{ trans('cruds.post.fields.published') }}</label>
                </div>
                @if($errors->has('published'))
                    <div class="invalid-feedback">
                        {{ $errors->first('published') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.post.fields.published_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('sticky') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="sticky" value="0">
                    <input class="form-check-input" type="checkbox" name="sticky" id="sticky" value="1" {{ old('sticky', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="sticky">{{ trans('cruds.post.fields.sticky') }}</label>
                </div>
                @if($errors->has('sticky'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sticky') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.post.fields.sticky_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="content">{{ trans('cruds.post.fields.content') }}</label>
                <textarea class="form-control {{ $errors->has('content') ? 'is-invalid' : '' }}" name="content" id="content">{{ old('content') }}</textarea>
                @if($errors->has('content'))
                    <div class="invalid-feedback">
                        {{ $errors->first('content') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.post.fields.content_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="for">{{ trans('cruds.post.fields.for') }}</label>
                <input class="form-control {{ $errors->has('for') ? 'is-invalid' : '' }}" type="text" name="for" id="for" value="{{ old('for', '') }}">
                @if($errors->has('for'))
                    <div class="invalid-feedback">
                        {{ $errors->first('for') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.post.fields.for_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="slug">{{ trans('cruds.post.fields.slug') }}</label>
                <input class="form-control {{ $errors->has('slug') ? 'is-invalid' : '' }}" type="text" name="slug" id="slug" value="{{ old('slug', '') }}">
                @if($errors->has('slug'))
                    <div class="invalid-feedback">
                        {{ $errors->first('slug') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.post.fields.slug_helper') }}</span>
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
    Dropzone.options.featuredImageDropzone = {
    url: '{{ route('admin.posts.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 1800,
      height: 800
    },
    success: function (file, response) {
      $('form').find('input[name="featured_image"]').remove()
      $('form').append('<input type="hidden" name="featured_image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="featured_image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($post) && $post->featured_image)
      var file = {!! json_encode($post->featured_image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="featured_image" value="' + file.file_name + '">')
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