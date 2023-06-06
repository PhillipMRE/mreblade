@can('chart_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.charts.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.chart.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.chart.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-clientCharts">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.chart.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.chart.fields.tag') }}
                        </th>
                        <th>
                            {{ trans('cruds.chart.fields.label') }}
                        </th>
                        <th>
                            {{ trans('cruds.chart.fields.chart_model') }}
                        </th>
                        <th>
                            {{ trans('cruds.chart.fields.client') }}
                        </th>
                        <th>
                            {{ trans('cruds.client.fields.name') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($charts as $key => $chart)
                        <tr data-entry-id="{{ $chart->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $chart->id ?? '' }}
                            </td>
                            <td>
                                {{ $chart->tag ?? '' }}
                            </td>
                            <td>
                                {{ $chart->label ?? '' }}
                            </td>
                            <td>
                                {{ $chart->chart_model ?? '' }}
                            </td>
                            <td>
                                {{ $chart->client->name ?? '' }}
                            </td>
                            <td>
                                {{ $chart->client->name ?? '' }}
                            </td>
                            <td>
                                @can('chart_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.charts.show', $chart->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('chart_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.charts.edit', $chart->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('chart_delete')
                                    <form action="{{ route('admin.charts.destroy', $chart->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('chart_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.charts.massDestroy') }}",
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
  let table = $('.datatable-clientCharts:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection