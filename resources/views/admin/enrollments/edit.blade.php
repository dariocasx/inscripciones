@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Editar inscripción
    </div>

    <div class="card-body">
        <form action="{{ route("admin.enrollments.update", [$enrollment->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('course_id') ? 'has-error' : '' }}">
                <label for="course">Curso*</label>
                <select name="course_id" id="course" class="form-control select2" required>
                    @foreach($courses as $id => $course)
                        <option value="{{ $id }}" {{ (isset($enrollment) && $enrollment->course ? $enrollment->course->id : old('course_id')) == $id ? 'selected' : '' }}>{{ $course }}</option>
                    @endforeach
                </select>
                @if($errors->has('course_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('course_id') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                <label>Estado*</label>
                @foreach(App\Enrollment::STATUS_RADIO as $key => $label)
                    <div>
                        <input id="status_{{ $key }}" name="status" type="radio" value="{{ $key }}" {{ old('status', $enrollment->status) === (string)$key ? 'checked' : '' }} required>
                        <label for="status_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('status'))
                    <em class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </em>
                @endif
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="Guardar">
            </div>
        </form>


    </div>
</div>
@endsection