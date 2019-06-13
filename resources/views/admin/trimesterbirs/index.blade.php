@extends('layouts.admin')
@section('content')
@can('trimesterbir_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.trimesterbirs.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.trimesterbir.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.trimesterbir.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.trimesterbir.fields.tarih') }}
                        </th>
                        <th>
                            {{ trans('cruds.trimesterbir.fields.gebelik_kesesi') }}
                        </th>
                        <th>
                            {{ trans('cruds.trimesterbir.fields.yolk_kesesi') }}
                        </th>
                        <th>
                            {{ trans('cruds.trimesterbir.fields.crl') }}
                        </th>
                        <th>
                            {{ trans('cruds.trimesterbir.fields.fka_vuru_dk') }}
                        </th>
                        <th>
                            {{ trans('cruds.trimesterbir.fields.randevu_tipi') }}
                        </th>
                        <th>
                            {{ trans('cruds.trimesterbir.fields.kilo') }}
                        </th>
                        <th>
                            {{ trans('cruds.trimesterbir.fields.notlar') }}
                        </th>
                        <th>
                            {{ trans('cruds.trimesterbir.fields.takip') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($trimesterbirs as $key => $trimesterbir)
                        <tr data-entry-id="{{ $trimesterbir->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $trimesterbir->tarih ?? '' }}
                            </td>
                            <td>
                                {{ $trimesterbir->gebelik_kesesi ?? '' }}
                            </td>
                            <td>
                                {{ $trimesterbir->yolk_kesesi ?? '' }}
                            </td>
                            <td>
                                {{ $trimesterbir->crl ?? '' }}
                            </td>
                            <td>
                                {{ $trimesterbir->fka_vuru_dk ?? '' }}
                            </td>
                            <td>
                                {{ App\Trimesterbir::RANDEVU_TIPI_SELECT[$trimesterbir->randevu_tipi] ?? '' }}
                            </td>
                            <td>
                                {{ $trimesterbir->kilo ?? '' }}
                            </td>
                            <td>
                                {{ $trimesterbir->notlar ?? '' }}
                            </td>
                            <td>
                                {{ $trimesterbir->takip->takip_tipi ?? '' }}
                            </td>
                            <td>
                                @can('trimesterbir_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.trimesterbirs.show', $trimesterbir->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan
                                @can('trimesterbir_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.trimesterbirs.edit', $trimesterbir->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('trimesterbir_delete')
                                    <form action="{{ route('admin.trimesterbirs.destroy', $trimesterbir->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.trimesterbirs.massDestroy') }}",
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
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('trimesterbir_delete')
  dtButtons.push(deleteButton)
@endcan

  $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
})

</script>
@endsection