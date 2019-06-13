@extends('layouts.admin')
@section('content')
@can('hastalar_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.hastalars.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.hastalar.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.hastalar.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.hastalar.fields.hasta_kategorisi') }}
                    </th>
                    <th>
                        {{ trans('cruds.hastalar.fields.adi_soyadi') }}
                    </th>
                    <th>
                        {{ trans('cruds.hastalar.fields.tc_kimlik_no') }}
                    </th>
                    <th>
                        {{ trans('cruds.hastalar.fields.ilk_gelis_tarihi') }}
                    </th>
                    <th>
                        {{ trans('cruds.hastalar.fields.dogum_tarihi') }}
                    </th>
                    <th>
                        {{ trans('cruds.hastalar.fields.telefon_ev') }}
                    </th>
                    <th>
                        {{ trans('cruds.hastalar.fields.gsm') }}
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
    url: "{{ route('admin.hastalars.massDestroy') }}",
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
@can('hastalar_delete')
  dtButtons.push(deleteButton)
@endcan

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.hastalars.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
      { data: 'hastaKategorileri.hasta_kategorisi', name: 'hasta_kategorisi.hastak' },
{ data: 'adi_soyadi', name: 'adi_soyadi' },
{ data: 'tc_kimlik_no', name: 'tc_kimlik_no' },
{ data: 'ilk_gelis_tarihi', name: 'ilk_gelis_tarihi' },
{ data: 'dogum_tarihi', name: 'dogum_tarihi' },
{ data: 'telefon_ev', name: 'telefon_ev' },
{ data: 'gsm', name: 'gsm' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
  };

  $('.datatable').DataTable(dtOverrideGlobals);

});

</script>
@endsection