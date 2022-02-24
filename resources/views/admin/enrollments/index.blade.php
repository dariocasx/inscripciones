@extends('layouts.admin')
@section('content')
@can('enrollment_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.enrollments.create") }}">
                Agregar inscripción
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        Lista de inscriptos
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Enrollment">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            ID
                        </th>
                        <th>
                            Usuario
                        </th>
                        <th>
                            Curso
                        </th>
                        <th>
                            Estado
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($enrollments as $key => $enrollment)
                        <tr data-entry-id="{{ $enrollment->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $enrollment->id ?? '' }}
                            </td>
                            <td>
                                {{ $enrollment->user->name ?? '' }}
                            </td>
                            <td>
                                {{ $enrollment->course->name ?? '' }}
                            </td>
                            <td>
                                {{ App\Enrollment::STATUS_RADIO[$enrollment->status] ?? '' }}
                            </td>
                            <td>
                                @can('enrollment_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.enrollments.show', $enrollment->id) }}">
                                        Ver
                                    </a>
                                @endcan

                                @can('enrollment_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.enrollments.edit', $enrollment->id) }}">
                                        Editar
                                    </a>
                                @endcan

                                @can('enrollment_delete')
                                    <form action="{{ route('admin.enrollments.destroy', $enrollment->id) }}" method="POST" onsubmit="return confirm('¿Esta seguro?');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="Eliminar">
                                    </form>
                                @endcan

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
@can('enrollment_delete')
  let deleteButtonTrans = 'Eliminar seleccionados'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.enrollments.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('No hay filas seleccionadas')

        return
      }

      if (confirm('¿Esta seguro?')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  $('.datatable-Enrollment:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection