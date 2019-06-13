@extends('layouts.admin')
@section('content')
@can('muayane_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.muayanes.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.muayane.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.muayane.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.muayane.fields.tarih') }}
                    </th>
                    <th>
                        {{ trans('cruds.muayane.fields.randevu_tipi') }}
                    </th>
                    <th>
                        {{ trans('cruds.muayane.fields.sikayet') }}
                    </th>
                    <th>
                        {{ trans('cruds.muayane.fields.oyku') }}
                    </th>
                    <th>
                        {{ trans('cruds.muayane.fields.tani') }}
                    </th>
                    <th>
                        {{ trans('cruds.muayane.fields.istenilen_tetkikler') }}
                    </th>
                    <th>
                        {{ trans('cruds.muayane.fields.tedavi') }}
                    </th>
                    <th>
                        {{ trans('cruds.muayane.fields.sonuc') }}
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
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.muayanes.massDestroy') }}",
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

  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('muayane_delete')
  dtButtons.push(deleteButton)
@endcan

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.muayanes.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
      { data: 'tarih', name: 'tarih' },
{ data: 'randevu_tipi', name: 'randevu_tipi' },
{ data: 'sikayet', name: 'sikayet' },
{ data: 'oyku', name: 'oyku' },
{ data: 'tani', name: 'tani' },
{ data: 'istenilen_tetkikler', name: 'istenilen_tetkikler' },
{ data: 'tedavi', name: 'tedavi' },
{ data: 'sonuc', name: 'sonuc' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
  };

  $('.datatable').DataTable(dtOverrideGlobals);

});

</script>
@endsection