@extends('layouts.admin')
@section('content')
@can('lending_officer_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.lending-officers.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.lendingOfficer.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.lendingOfficer.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-LendingOfficer">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.lendingOfficer.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.lendingOfficer.fields.published') }}
                    </th>
                    <th>
                        {{ trans('cruds.lendingOfficer.fields.contact_phone') }}
                    </th>
                    <th>
                        {{ trans('cruds.lendingOfficer.fields.template') }}
                    </th>
                    <th>
                        {{ trans('cruds.lendingOfficer.fields.phone_numbers') }}
                    </th>
                    <th>
                        {{ trans('cruds.lendingOfficer.fields.phone') }}
                    </th>
                    <th>
                        {{ trans('cruds.phone.fields.phone_type') }}
                    </th>
                    <th>
                        &nbsp;
                    </th>
                </tr>
            </thead>
        </table>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('lending_officer_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.lending-officers.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
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

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.lending-officers.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'published', name: 'published' },
{ data: 'contact_phone', name: 'contact_phone' },
{ data: 'template', name: 'template' },
{ data: 'phone_numbers', name: 'phone_numbers.number' },
{ data: 'phone_number', name: 'phone.number' },
{ data: 'phone.phone_type', name: 'phone.phone_type' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-LendingOfficer').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection