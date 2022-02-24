@extends('layouts.admin')
@section('content')
@can('teacher_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.teachers.create") }}">
                Agregar profesor
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        Listado de profesores
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Teacher">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            ID
                        </th>
                        <th>
                            Nombre
                        </th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($teachers as $key => $teacher)
                        <tr data-entry-id="{{ $teacher->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $teacher->id ?? '' }}
                            </td>
                            <td>
                                {{ $teacher->user->name   ?? '' }}

                            </td>


                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)


  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  $('.datatable-Teacher:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection