@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Editar Curso
    </div>

    <div class="card-body">
        <form action="{{ route("admin.courses.update", [$course->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">Nombre *</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($course) ? $course->name : '') }}" required>
                @if($errors->has('name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.course.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                <label for="description">Descripcion</label>
                <textarea id="description" name="description" class="form-control ">{{ old('description', isset($course) ? $course->description : '') }}</textarea>
                @if($errors->has('description'))
                    <em class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </em>
                @endif
                <p class="helper-block">
                    Descripcion
                </p>
            </div>
            <div class="form-group {{ $errors->has('teachers') ? 'has-error' : '' }}">
                <label for="teachers">Profesor
                    <span class="btn btn-info btn-xs select-all">Seleccionar todo</span>
                    <span class="btn btn-info btn-xs deselect-all">Deseleccionar todo</span></label>
                <select name="teachers[]" id="teachers" class="form-control select2" multiple="multiple">
                    @foreach($teachers as $id => $teachers)
                        <option value="{{ $teachers->user->id }}" {{ (in_array($id, old('teachers', [])) || isset($course) && $course->teachers->contains($id)) ? 'selected' : '' }}>{{ $teachers->user->name }}</option>
                    @endforeach
                </select>
                @if($errors->has('teachers'))
                    <em class="invalid-feedback">
                        {{ $errors->first('teachers') }}
                    </em>
                @endif
                <p class="helper-block">

                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="Guardar">
            </div>
        </form>


    </div>
</div>
@endsection

@section('scripts')
<script>
    Dropzone.options.photoDropzone = {
    url: '{{ route('admin.courses.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
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
@if(isset($course) && $course->photo)
      var file = {!! json_encode($course->photo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, '{{ $course->photo->getUrl('thumb') }}')
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
@stop