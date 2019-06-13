@extends('layouts.admin')
@section('content')
@can('receteitem_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.receteitems.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.receteitem.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.receteitem.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.receteitem.fields.receteadi') }}
                        </th>
                        <th>
                            {{ trans('cruds.receteitem.fields.ilac') }}
                        </th>
                        <th>
                            {{ trans('cruds.receteitem.fields.kutuadeti') }}
                        </th>
                        <th>
                            {{ trans('cruds.receteitem.fields.dbir') }}
                        </th>
                        <th>
                            {{ trans('cruds.receteitem.fields.diki') }}
                        </th>
                        <th>
                            {{ trans('cruds.receteitem.fields.zaman') }}
                        </th>
                        <th>
                            {{ trans('cruds.receteitem.fields.kullanim') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($receteitems as $key => $receteitem)
                        <tr data-entry-id="{{ $receteitem->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $receteitem->receteadi->receteadi ?? '' }}
                            </td>
                            <td>
                                {{ $receteitem->ilac->ilac_adi ?? '' }}
                            </td>
                            <td>
                                {{ App\Receteitem::KUTUADETI_SELECT[$receteitem->kutuadeti] ?? '' }}
                            </td>
                            <td>
                                {{ $receteitem->dbir ?? '' }}
                            </td>
                            <td>
                                {{ $receteitem->diki ?? '' }}
                            </td>
                            <td>
                                {{ App\Receteitem::ZAMAN_SELECT[$receteitem->zaman] ?? '' }}
                            </td>
                            <td>
                                {{ App\Receteitem::KULLANIM_SELECT[$receteitem->kullanim] ?? '' }}
                            </td>
                            <td>
                                @can('receteitem_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.receteitems.show', $receteitem->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan
                                @can('receteitem_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.receteitems.edit', $receteitem->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('receteitem_delete')
                                    <form action="{{ route('admin.receteitems.destroy', $receteitem->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
    url: "{{ route('admin.receteitems.massDestroy') }}",
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
@can('receteitem_delete')
  dtButtons.push(deleteButton)
@endcan

  $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
})

</script>
@endsection