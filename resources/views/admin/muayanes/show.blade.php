@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.muayane.title') }}
    </div>

    <div class="card-body">
        <div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.muayane.fields.tarih') }}
                        </th>
                        <td>
                            {{ $muayane->tarih }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.muayane.fields.sat') }}
                        </th>
                        <td>
                            {{ $muayane->sat }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.muayane.fields.kilo_kg') }}
                        </th>
                        <td>
                            {{ $muayane->kilo_kg }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.muayane.fields.boy_cm') }}
                        </th>
                        <td>
                            {{ $muayane->boy_cm }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.muayane.fields.vki') }}
                        </th>
                        <td>
                            {{ $muayane->vki }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.muayane.fields.randevu_tipi') }}
                        </th>
                        <td>
                            {{ $muayane->randevu_tipi }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.muayane.fields.icd_kodu') }}
                        </th>
                        <td>
                            {{ $muayane->icd_kodu }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.muayane.fields.sikayet') }}
                        </th>
                        <td>
                            {!! $muayane->sikayet !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.muayane.fields.oyku') }}
                        </th>
                        <td>
                            {!! $muayane->oyku !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.muayane.fields.jinekolojik_muayene') }}
                        </th>
                        <td>
                            {!! $muayane->jinekolojik_muayene !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.muayane.fields.tani') }}
                        </th>
                        <td>
                            {!! $muayane->tani !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.muayane.fields.istenilen_tetkikler') }}
                        </th>
                        <td>
                            {{ $muayane->istenilen_tetkikler }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.muayane.fields.tedavi') }}
                        </th>
                        <td>
                            {!! $muayane->tedavi !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.muayane.fields.sonuc') }}
                        </th>
                        <td>
                            {!! $muayane->sonuc !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.muayane.fields.smear_notlari') }}
                        </th>
                        <td>
                            {{ $muayane->smear_notlari }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.muayane.fields.usg_tipi') }}
                        </th>
                        <td>
                            {{ $muayane->usg_tipi }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.muayane.fields.sag_over') }}
                        </th>
                        <td>
                            {{ $muayane->sag_over }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.muayane.fields.sol_over') }}
                        </th>
                        <td>
                            {{ $muayane->sol_over }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.muayane.fields.uterus') }}
                        </th>
                        <td>
                            {{ $muayane->uterus }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.muayane.fields.usg_notu') }}
                        </th>
                        <td>
                            {{ $muayane->usg_notu }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.muayane.fields.diger_notlar') }}
                        </th>
                        <td>
                            {{ $muayane->diger_notlar }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.muayane.fields.takip') }}
                        </th>
                        <td>
                            {{ $muayane->takip->takip_tipi ?? '' }}
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
