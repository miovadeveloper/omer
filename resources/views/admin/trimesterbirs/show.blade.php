@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.trimesterbir.title') }}
    </div>

    <div class="card-body">
        <div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.trimesterbir.fields.tarih') }}
                        </th>
                        <td>
                            {{ $trimesterbir->tarih }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.trimesterbir.fields.gebelik_kesesi') }}
                        </th>
                        <td>
                            {{ $trimesterbir->gebelik_kesesi }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.trimesterbir.fields.yolk_kesesi') }}
                        </th>
                        <td>
                            {{ $trimesterbir->yolk_kesesi }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.trimesterbir.fields.mide') }}
                        </th>
                        <td>
                            {{ App\Trimesterbir::MIDE_SELECT[$trimesterbir->mide] }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.trimesterbir.fields.mesane') }}
                        </th>
                        <td>
                            {{ App\Trimesterbir::MESANE_SELECT[$trimesterbir->mesane] }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.trimesterbir.fields.icd_kodu') }}
                        </th>
                        <td>
                            {{ $trimesterbir->icd_kodu }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.trimesterbir.fields.crl_tarih') }}
                        </th>
                        <td>
                            {{ $trimesterbir->crl_tarih }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.trimesterbir.fields.crl') }}
                        </th>
                        <td>
                            {{ $trimesterbir->crl }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.trimesterbir.fields.crl_gun') }}
                        </th>
                        <td>
                            {{ $trimesterbir->crl_gun }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.trimesterbir.fields.fka_vuru_dk') }}
                        </th>
                        <td>
                            {{ $trimesterbir->fka_vuru_dk }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.trimesterbir.fields.nt') }}
                        </th>
                        <td>
                            {{ $trimesterbir->nt }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.trimesterbir.fields.nazal_kemik') }}
                        </th>
                        <td>
                            {{ $trimesterbir->nazal_kemik }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.trimesterbir.fields.randevu_tipi') }}
                        </th>
                        <td>
                            {{ App\Trimesterbir::RANDEVU_TIPI_SELECT[$trimesterbir->randevu_tipi] }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.trimesterbir.fields.ta') }}
                        </th>
                        <td>
                            {{ $trimesterbir->ta }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.trimesterbir.fields.kilo') }}
                        </th>
                        <td>
                            {{ $trimesterbir->kilo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.trimesterbir.fields.notlar') }}
                        </th>
                        <td>
                            {!! $trimesterbir->notlar !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.trimesterbir.fields.takip') }}
                        </th>
                        <td>
                            {{ $trimesterbir->takip->takip_tipi ?? '' }}
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