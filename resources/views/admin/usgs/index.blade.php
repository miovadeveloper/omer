@extends('layouts.admin')
@section('content')
@can('usg_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.usgs.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.usg.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.usg.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.usg.fields.takip') }}
                        </th>
                        <th>
                            {{ trans('cruds.usg.fields.tarih') }}
                        </th>
                        <th>
                            {{ trans('cruds.usg.fields.sag_over') }}
                        </th>
                        <th>
                            {{ trans('cruds.usg.fields.sol_over') }}
                        </th>
                        <th>
                            {{ trans('cruds.usg.fields.uterus') }}
                        </th>
                        <th>
                            {{ trans('cruds.usg.fields.usg_tipi') }}
                        </th>
                        <th>
                            {{ trans('cruds.usg.fields.not') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($usgs as $key => $usg)
                        <tr data-entry-id="{{ $usg->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $usg->takip->takip_tipi ?? '' }}
                            </td>
                            <td>
                                {{ $usg->tarih ?? '' }}
                            </td>
                            <td>
                                {{ $usg->sag_over ?? '' }}
                            </td>
                            <td>
                                {{ $usg->sol_over ?? '' }}
                            </td>
                            <td>
                                {{ $usg->uterus ?? '' }}
                            </td>
                            <td>
                                {{ App\Usg::USG_TIPI_RADIO[$usg->usg_tipi] ?? '' }}
                            </td>
                            <td>
                                {{ $usg->not ?? '' }}
                            </td>
                            <td>
                                @can('usg_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.usgs.show', $usg->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan
                                @can('usg_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.usgs.edit', $usg->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('usg_delete')
                                    <form action="{{ route('admin.usgs.destroy', $usg->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
    url: "{{ route('admin.usgs.massDestroy') }}",
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
@can('usg_delete')
  dtButtons.push(deleteButton)
@endcan

  $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
})

</script>
@endsection