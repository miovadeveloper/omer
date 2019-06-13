@extends('layouts.admin')
@section('content')

<div class="card">


    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.receteler.title') }}
    </div>


    <div class="card-body">

            <table class="table table-bordered table-striped">
                <tbody>
                <tr>
                    <th>
                        {{ trans('cruds.receteler.fields.takip') }}
                    </th>
                    <td>
                        {{ $receteler->takip->takip_tipi ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('cruds.receteler.fields.hasta') }}
                    </th>
                    <td>
                        {{ $receteler->hasta->adi_soyadi ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('cruds.receteler.fields.receteadi') }}
                    </th>
                    <td>
                        {{ $receteler->receteadi }}
                    </td>
                </tr>
                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                Back
            </a>
        </div>

    <button class="btn btn-success  col-md-2 m-2" type="button" data-toggle="modal" data-target="#largeModal">İlaç Ekle</button>

    <div class="table-responsive p-3">
        <table class=" table table-bordered table-striped table-hover datatable"  >
            <thead>
            <tr>
                <th width="10">

                </th>

                <th>
                    {{ trans('cruds.receteitem.fields.ilac') }}
                </th>
                <th>
                    {{ trans('cruds.receteitem.fields.kutuadeti') }}
                </th>
                <th>
                    Doz
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
                        {{ $receteitem->ilac->ilac_adi ?? '' }}
                    </td>
                    <td>
                        {{ App\Receteitem::KUTUADETI_SELECT[$receteitem->kutuadeti] ?? '' }}
                    </td>
                    <td>
                        {{ $receteitem->dbir ?? '' }} x    {{ $receteitem->diki ?? '' }}


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
<div>
</div>



    <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Modal title</h4>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">


                    <form action="{{ route("admin.receteitems.store") }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group d-none {{ $errors->has('receteadi_id') ? 'has-error' : '' }}">
                            <label for="receteadi">{{ trans('cruds.receteitem.fields.receteadi') }}</label>
                            <select name="receteadi_id" id="receteadi" class="form-control select2">
                                    <option value="{{ $receteler->id }}" >{{ $receteler->id }}</option>
                            </select>
                            @if($errors->has('receteadi_id'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('receteadi_id') }}
                                </em>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('ilac_id') ? 'has-error' : '' }}">
                            <label for="ilac">{{ trans('cruds.receteitem.fields.ilac') }}</label>
                            <select name="ilac_id" id="ilac" class="form-control select2">
                                @foreach($ilacs as $id => $ilac)
                                    <option value="{{ $id }}" {{ (isset($receteitem) && $receteitem->ilac ? $receteitem->ilac->id : old('ilac_id')) == $id ? 'selected' : '' }}>{{ $ilac }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('ilac_id'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('ilac_id') }}
                                </em>
                            @endif
                        </div>

                        <div class="row">

                            <div class="form-group col-4 {{ $errors->has('kutuadeti') ? 'has-error' : '' }}">
                                <label for="kutuadeti">{{ trans('cruds.receteitem.fields.kutuadeti') }}</label>
                                <select id="kutuadeti" name="kutuadeti" class="form-control">
                                    <option value="" disabled {{ old('kutuadeti', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                    @foreach(App\Receteitem::KUTUADETI_SELECT as $key => $label)
                                        <option value="{{ $key }}" {{ old('kutuadeti', null) === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('kutuadeti'))
                                    <em class="invalid-feedback">
                                        {{ $errors->first('kutuadeti') }}
                                    </em>
                                @endif
                            </div>
                            <label class="m-lg-2 col-2" >Kullanım Tarifi</label>

                            <div class="form-group col-2 {{ $errors->has('dbir') ? 'has-error' : '' }}">
                            <input type="text" id="dbir" name="dbir" class="form-control" value="{{ old('dbir', isset($receteitem) ? $receteitem->dbir : '') }}">
                            @if($errors->has('dbir'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('dbir') }}
                                </em>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.receteitem.fields.dbir_helper') }}
                            </p>
                        </div>
x
                        <div class="form-group col-2 {{ $errors->has('diki') ? 'has-error' : '' }}">
                            <input type="text" id="diki" name="diki" class="form-control" value="{{ old('diki', isset($receteitem) ? $receteitem->diki : '') }}">
                            @if($errors->has('diki'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('diki') }}
                                </em>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.receteitem.fields.diki_helper') }}
                            </p>
                        </div>

                        </div>
                        <div class="row">

                        <div class="form-group col-6{{ $errors->has('zaman') ? 'has-error' : '' }}">
                            <label for="zaman">{{ trans('cruds.receteitem.fields.zaman') }}</label>
                            <select id="zaman" name="zaman" class="form-control">
                                <option value="" disabled {{ old('zaman', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Receteitem::ZAMAN_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('zaman', null) === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('zaman'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('zaman') }}
                                </em>
                            @endif
                        </div>
                        <div class="form-group col-6 {{ $errors->has('kullanim') ? 'has-error' : '' }}">
                            <label for="kullanim">{{ trans('cruds.receteitem.fields.kullanim') }}</label>
                            <select id="kullanim" name="kullanim" class="form-control">
                                <option value="" disabled {{ old('kullanim', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Receteitem::KULLANIM_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('kullanim', null) === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('kullanim'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('kullanim') }}
                                </em>
                            @endif
                        </div>
                        </div>
                        <div>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
                </div>
                    </form>
                </div>
            </div>
            <!-- /.modal-content-->
        </div>
        <!-- /.modal-dialog-->
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
        $(document).ready(function() {
            $('#test').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'print',
                        customize: function ( win ) {
                            $(win.document.body)
                                .css( 'font-size', '100pt' )
                                .prepend(
                                    '<img src="http://datatables.net/media/images/logo-fade.png" style="position:absolute; top:0; left:0;" />'
                                );

                            $(win.document.body).find( 'table' )
                                .addClass( 'compact' )
                                .css( 'font-size', 'inherit' );
                        }
                    }
                ]
            } );
        } );

    </script>
@endsection


