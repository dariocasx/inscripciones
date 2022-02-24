@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Editar permiso
    </div>

    <div class="card-body">
        <form action="{{ route("admin.permissions.update", [$permission->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label for="title">Titulo*</label>
                <input type="text" id="title" name="title" class="form-control" value="{{ old('title', isset($permission) ? $permission->title : '') }}" required>
                @if($errors->has('title'))
                    <em class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </em>
                @endif
                <p class="helper-block">
                    Ayuda
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="Guardar">
            </div>
        </form>


    </div>
</div>
@endsection