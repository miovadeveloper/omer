@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.trimesterikiuc.title') }}
    </div>

    <div class="card-body">
        <div>
            <table class="table table-bordered table-striped">
                <tbody>
                <tr>
                    <th>
                        {{ trans('cruds.trimesterikiuc.fields.trimestertipi') }}
                    </th>
                    <td>
                        {{ $trimesterikiuc->trimestertipi }}
                        </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.trimesterikiuc.fields.tarih') }}
                        </th>
                        <td>
                            {{ $trimesterikiuc->tarih }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.trimesterikiuc.fields.sat_ile_hafta') }}
                        </th>
                        <td>
                            {{ $trimesterikiuc->sat_ile_hafta }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.trimesterikiuc.fields.sat_ile_gun') }}
                        </th>
                        <td>
                            {{ $trimesterikiuc->sat_ile_gun }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.trimesterikiuc.fields.kilo_kg') }}
                        </th>
                        <td>
                            {{ $trimesterikiuc->kilo_kg }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.trimesterikiuc.fields.icd_kodu') }}
                        </th>
                        <td>
                            {{ $trimesterikiuc->icd_kodu }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.trimesterikiuc.fields.usg_ile_hafta') }}
                        </th>
                        <td>
                            {{ $trimesterikiuc->usg_ile_hafta }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.trimesterikiuc.fields.usg_ile_gun') }}
                        </th>
                        <td>
                            {{ $trimesterikiuc->usg_ile_gun }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.trimesterikiuc.fields.tansiyon') }}
                        </th>
                        <td>
                            {{ $trimesterikiuc->tansiyon }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.trimesterikiuc.fields.odem') }}
                        </th>
                        <td>
                            {{ $trimesterikiuc->odem }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.trimesterikiuc.fields.sonuc') }}
                        </th>
                        <td>
                            {{ $trimesterikiuc->sonuc }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.trimesterikiuc.fields.uterin_arter') }}
                        </th>
                        <td>
                            {{ $trimesterikiuc->uterin_arter }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.trimesterikiuc.fields.servikal_kanal') }}
                        </th>
                        <td>
                            {{ $trimesterikiuc->servikal_kanal }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.trimesterikiuc.fields.yakinma') }}
                        </th>
                        <td>
                            {{ $trimesterikiuc->yakinma }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.trimesterikiuc.fields.ultrason') }}
                        </th>
                        <td>
                            {{ $trimesterikiuc->ultrason }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.trimesterikiuc.fields.randevu_tipi') }}
                        </th>
                        <td>
                            {{ $trimesterikiuc->randevu_tipi }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.trimesterikiuc.fields.takip') }}
                        </th>
                        <td>
                            {{ $trimesterikiuc->takip->takip_tipi ?? '' }}
                        </td>
                    </tr>
                <tr>
                    <th>
                        {{ trans('cruds.trimesterikiuc.fields.plesanta') }}
                    </th>
                    <td>
                    {{ $trimesterikiuc->plesanta }}
                </tr>
                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                Geri Dön
            </a>
        </div>
    </div>
</div>
@endsection
