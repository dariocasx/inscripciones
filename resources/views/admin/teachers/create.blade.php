@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Ingresar profesor
    </div>

    <div class="card-body">
        <form action="{{ route("admin.teachers.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('user_id') ? 'has-error' : '' }}">
                <label for="user">Usuario*</label>
                <select name="user_id" id="user" class="form-control select2" required>
                    @foreach($users as $id => $user)
                        <option value="{{ $id }}" {{ (isset($enrollment) && $enrollment->user ? $enrollment->user->id : old('user_id')) == $id ? 'selected' : '' }}>{{ $user }}</option>
                    @endforeach
                </select>
                @if($errors->has('user_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('user_id') }}
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