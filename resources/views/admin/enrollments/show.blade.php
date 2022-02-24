@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Ver inscripción
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            ID
                        </th>
                        <td>
                            {{ $enrollment->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Usuario
                        </th>
                        <td>
                            {{ $enrollment->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Curso
                        </th>
                        <td>
                            {{ $enrollment->course->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Estado
                        </th>
                        <td>
                            {{ App\Enrollment::STATUS_RADIO[$enrollment->status] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                Volver
            </a>
        </div>


    </div>
</div>
@endsection