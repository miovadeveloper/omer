@extends('layouts.admin')
@section('content')
@can('receteler_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.recetelers.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.receteler.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.receteler.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.receteler.fields.takip') }}
                        </th>
                        <th>
                            {{ trans('cruds.receteler.fields.hasta') }}
                        </th>
                        <th>
                            {{ trans('cruds.receteler.fields.receteadi') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($recetelers as $key => $receteler)
                        <tr data-entry-id="{{ $receteler->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $receteler->takip->takip_tipi ?? '' }}
                            </td>
                            <td>
                                {{ $receteler->hasta->adi_soyadi ?? '' }}
                            </td>
                            <td>
                                {{ $receteler->receteadi ?? '' }}
                            </td>
                            <td>
                                @can('receteler_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.recetelers.show', $receteler->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan
                                @can('receteler_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.recetelers.edit', $receteler->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('receteler_delete')
                                    <form action="{{ route('admin.recetelers.destroy', $receteler->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
    url: "{{ route('admin.recetelers.massDestroy') }}",
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
@can('receteler_delete')
  dtButtons.push(deleteButton)
@endcan

  $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
})

</script>
@endsection