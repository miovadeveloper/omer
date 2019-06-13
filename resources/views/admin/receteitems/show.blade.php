@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.receteitem.title') }}
    </div>

    <div class="card-body">
        <div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.receteitem.fields.receteadi') }}
                        </th>
                        <td>
                            {{ $receteitem->receteadi->receteadi ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.receteitem.fields.ilac') }}
                        </th>
                        <td>
                            {{ $receteitem->ilac->ilac_adi ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.receteitem.fields.kutuadeti') }}
                        </th>
                        <td>
                            {{ App\Receteitem::KUTUADETI_SELECT[$receteitem->kutuadeti] }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.receteitem.fields.dbir') }}
                        </th>
                        <td>
                            {{ $receteitem->dbir }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.receteitem.fields.diki') }}
                        </th>
                        <td>
                            {{ $receteitem->diki }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.receteitem.fields.zaman') }}
                        </th>
                        <td>
                            {{ App\Receteitem::ZAMAN_SELECT[$receteitem->zaman] }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.receteitem.fields.kullanim') }}
                        </th>
                        <td>
                            {{ App\Receteitem::KULLANIM_SELECT[$receteitem->kullanim] }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                Back
            </a>
        </div>
    </div>
</div>
@endsection