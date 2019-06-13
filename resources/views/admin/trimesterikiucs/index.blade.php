@extends('layouts.admin')
@section('content')
@can('trimesterikiuc_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.trimesterikiucs.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.trimesterikiuc.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.trimesterikiuc.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.trimesterikiuc.fields.tarih') }}
                        </th>
                        <th>
                            {{ trans('cruds.trimesterikiuc.fields.sat_ile_hafta') }}
                        </th>
                        <th>
                            {{ trans('cruds.trimesterikiuc.fields.kilo_kg') }}
                        </th>
                        <th>
                            {{ trans('cruds.trimesterikiuc.fields.usg_ile_hafta') }}
                        </th>
                        <th>
                            {{ trans('cruds.trimesterikiuc.fields.tansiyon') }}
                        </th>
                        <th>
                            {{ trans('cruds.trimesterikiuc.fields.sonuc') }}
                        </th>
                        <th>
                            {{ trans('cruds.trimesterikiuc.fields.ultrason') }}
                        </th>
                        <th>
                            {{ trans('cruds.trimesterikiuc.fields.randevu_tipi') }}
                        </th>
                        <th>
                            {{ trans('cruds.trimesterikiuc.fields.takip') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($trimesterikiucs as $key => $trimesterikiuc)
                        <tr data-entry-id="{{ $trimesterikiuc->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $trimesterikiuc->tarih ?? '' }}
                            </td>
                            <td>
                                {{ $trimesterikiuc->sat_ile_hafta ?? '' }}
                            </td>
                            <td>
                                {{ $trimesterikiuc->kilo_kg ?? '' }}
                            </td>
                            <td>
                                {{ $trimesterikiuc->usg_ile_hafta ?? '' }}
                            </td>
                            <td>
                                {{ $trimesterikiuc->tansiyon ?? '' }}
                            </td>
                            <td>
                                {{ $trimesterikiuc->sonuc ?? '' }}
                            </td>
                            <td>
                                {{ $trimesterikiuc->ultrason ?? '' }}
                            </td>
                            <td>
                                {{ App\Trimesterikiuc::RANDEVU_TIPI_SELECT[$trimesterikiuc->randevu_tipi] ?? '' }}
                            </td>
                            <td>
                                {{ $trimesterikiuc->takip->takip_tipi ?? '' }}
                            </td>
                            <td>
                                @can('trimesterikiuc_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.trimesterikiucs.show', $trimesterikiuc->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan
                                @can('trimesterikiuc_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.trimesterikiucs.edit', $trimesterikiuc->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('trimesterikiuc_delete')
                                    <form action="{{ route('admin.trimesterikiucs.destroy', $trimesterikiuc->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
    url: "{{ route('admin.trimesterikiucs.massDestroy') }}",
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
@can('trimesterikiuc_delete')
  dtButtons.push(deleteButton)
@endcan

  $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
})

</script>
@endsection