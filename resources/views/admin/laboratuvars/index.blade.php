@extends('layouts.admin')
@section('content')
@can('laboratuvar_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.laboratuvars.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.laboratuvar.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.laboratuvar.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.laboratuvar.fields.tetkik_adi') }}
                        </th>
                        <th>
                            {{ trans('cruds.laboratuvar.fields.tetkik_detaylari') }}
                        </th>
                        <th>
                            {{ trans('cruds.laboratuvar.fields.takip') }}
                        </th>
                        <th>
                            {{ trans('cruds.laboratuvar.fields.laboratuvar_dosya') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($laboratuvars as $key => $laboratuvar)
                        <tr data-entry-id="{{ $laboratuvar->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $laboratuvar->tetkik_adi ?? '' }}
                            </td>
                            <td>
                                {{ $laboratuvar->tetkik_detaylari ?? '' }}
                            </td>
                            <td>
                                {{ $laboratuvar->takip->takip_tipi ?? '' }}
                            </td>
                            <td>
                                @if($laboratuvar->laboratuvar_dosya)
                                    @foreach($laboratuvar->laboratuvar_dosya as $key => $media)
                                        <a href="{{ $media->getUrl() }}" target="_blank">
                                            {{ trans('global.view_file') }}
                                        </a>
                                    @endforeach
                                @endif
                            </td>
                            <td>
                                @can('laboratuvar_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.laboratuvars.show', $laboratuvar->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan
                                @can('laboratuvar_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.laboratuvars.edit', $laboratuvar->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('laboratuvar_delete')
                                    <form action="{{ route('admin.laboratuvars.destroy', $laboratuvar->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
    url: "{{ route('admin.laboratuvars.massDestroy') }}",
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
@can('laboratuvar_delete')
  dtButtons.push(deleteButton)
@endcan

  $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
})

</script>
@endsection