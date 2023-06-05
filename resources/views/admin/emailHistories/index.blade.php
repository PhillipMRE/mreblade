@extends('layouts.admin')
@section('content')
@can('email_history_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.email-histories.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.emailHistory.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.emailHistory.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-EmailHistory">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.emailHistory.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.emailHistory.fields.recipient_email') }}
                    </th>
                    <th>
                        {{ trans('cruds.emailHistory.fields.sender_email') }}
                    </th>
                    <th>
                        {{ trans('cruds.emailHistory.fields.subject') }}
                    </th>
                    <th>
                        {{ trans('cruds.emailHistory.fields.state') }}
                    </th>
                    <th>
                        {{ trans('cruds.emailHistory.fields.opens') }}
                    </th>
                    <th>
                        {{ trans('cruds.emailHistory.fields.clicks') }}
                    </th>
                    <th>
                        {{ trans('cruds.emailHistory.fields.customer') }}
                    </th>
                    <th>
                        {{ trans('cruds.customer.fields.name') }}
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
@can('email_history_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.email-histories.massDestroy') }}",
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
    ajax: "{{ route('admin.email-histories.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'recipient_email', name: 'recipient_email' },
{ data: 'sender_email', name: 'sender_email' },
{ data: 'subject', name: 'subject' },
{ data: 'state', name: 'state' },
{ data: 'opens', name: 'opens' },
{ data: 'clicks', name: 'clicks' },
{ data: 'customer_active', name: 'customer.active' },
{ data: 'customer.name', name: 'customer.name' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-EmailHistory').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection