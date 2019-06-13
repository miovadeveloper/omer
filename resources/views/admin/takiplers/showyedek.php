@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.takipler.title') }}
    </div>

    <div class="card-body">
        <div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.takipler.fields.takip_tipi') }}
                        </th>
                        <td>
                            {{ $takipler->takip_tipi }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.takipler.fields.hasta') }}
                        </th>
                        <td>
                            {{ $takipler->hasta->adi_soyadi ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.takipler.fields.baslangic') }}
                        </th>
                        <td>
                            {{ $takipler->baslangic }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.takipler.fields.bitis_tarihi') }}
                        </th>
                        <td>
                            {{ $takipler->bitis_tarihi }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.takipler.fields.sonuc_notu') }}
                        </th>
                        <td>
                            {!! $takipler->sonuc_notu !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.takipler.fields.oneri') }}
                        </th>
                        <td>
                            {!! $takipler->oneri !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.takipler.fields.durum') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled {{ $takipler->durum ? "checked" : "" }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.takipler.fields.tarih') }}
                        </th>
                        <td>
                            {{ $takipler->tarih }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.takipler.fields.kilo_kg') }}
                        </th>
                        <td>
                            {{ $takipler->kilo_kg }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.takipler.fields.vki') }}
                        </th>
                        <td>
                            {{ $takipler->vki }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.takipler.fields.sat') }}
                        </th>
                        <td>
                            {{ $takipler->sat }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.takipler.fields.boy_cm') }}
                        </th>
                        <td>
                            {{ $takipler->boy_cm }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.takipler.fields.oyku') }}
                        </th>
                        <td>
                            {!! $takipler->oyku !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.takipler.fields.sat_emin') }}
                        </th>
                        <td>
                            {{ $takipler->sat_emin }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.takipler.fields.geb_haft_duzeltildi') }}
                        </th>
                        <td>
                            {{ $takipler->geb_haft_duzeltildi }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.takipler.fields.bir_trimaster') }}
                        </th>
                        <td>
                            {{ $takipler->bir_trimaster }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.takipler.fields.genetik_inceleme') }}
                        </th>
                        <td>
                            {!! $takipler->genetik_inceleme !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.takipler.fields.fetal_dna') }}
                        </th>
                        <td>
                            {!! $takipler->fetal_dna !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.takipler.fields.fat') }}
                        </th>
                        <td>
                            {!! $takipler->fat !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.takipler.fields.iki_trimaster') }}
                        </th>
                        <td>
                            {{ $takipler->iki_trimaster }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.takipler.fields.g_t_t') }}
                        </th>
                        <td>
                            {!! $takipler->g_t_t !!}
                        </td>
                    </tr>
                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                Back
            </a>
            @can('takipler_edit')
                <a class="btn btn-xs btn-info" href="{{ route('admin.takiplers.edit', $takipler->id) }}">
                    {{ trans('global.edit') }}
                </a>
            @endcan
            @can('takipler_delete')
                <form action="{{ route('admin.takiplers.destroy', $takipler->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                </form>
            @endcan
        </div>
    </div>
</div>
@endsection
