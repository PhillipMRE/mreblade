@can('state_resident_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.state-residents.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.stateResident.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.stateResident.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-boardStateResidents">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.stateResident.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.stateResident.fields.state') }}
                        </th>
                        <th>
                            {{ trans('cruds.stateResident.fields.board') }}
                        </th>
                        <th>
                            {{ trans('cruds.board.fields.name') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($stateResidents as $key => $stateResident)
                        <tr data-entry-id="{{ $stateResident->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $stateResident->id ?? '' }}
                            </td>
                            <td>
                                {{ $stateResident->state ?? '' }}
                            </td>
                            <td>
                                {{ $stateResident->board->name ?? '' }}
                            </td>
                            <td>
                                {{ $stateResident->board->name ?? '' }}
                            </td>
                            <td>
                                @can('state_resident_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.state-residents.show', $stateResident->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('state_resident_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.state-residents.edit', $stateResident->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('state_resident_delete')
                                    <form action="{{ route('admin.state-residents.destroy', $stateResident->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
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

@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('state_resident_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.state-residents.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
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
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-boardStateResidents:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection