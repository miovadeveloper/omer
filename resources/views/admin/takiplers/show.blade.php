@extends('layouts.admin')
@section('content')



    <div class="card">
        <div class="card-body">
            <h1>  {{ $takipler->hasta->adi_soyadi ?? '' }}


                @if($takipler->takip_tipi =='jine')

                    Jinekolojik Takibi
                @endif

                @if($takipler->takip_tipi =='infe')
                    Infertilite Takibi

                @endif


                @if($takipler->takip_tipi =='gebe')

                    Gebelik Takibi




                @endif

            </h1>
            <div class="col-md-12 mb-4">

@if($takipler->takip_tipi =='gebe')

                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link @if($takipler->takip_tipi =='gebe')active @endif" data-toggle="tab" href="#ilkmuayane0" role="tab" aria-controls="ilkmuayane">
                                <i class="icon-basket-loaded"></i> İlk Muayane</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#trimesterbir01" role="tab" aria-controls="trimesterbir">
                                <i class="icon-basket-loaded"></i> Trimester1</a>
                        </li>      <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#trimesteriki02" role="tab" aria-controls="trimesteriki">
                                <i class="icon-basket-loaded"></i> Trimester2</a>
                        </li>
                        </li>      <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tarama03" role="tab" aria-controls="tarama">
                                <i class="icon-basket-loaded"></i> Tarama Testleri</a>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#laboratuvar3" role="tab" aria-controls="laboratuvar">
                                <i class="icon-pie-chart"></i> Laboratuvar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#ameliyatlar4" role="tab" aria-controls="ameliyatlar">
                                <i class="icon-pie-chart"></i> Ameliyatlar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#notlar5" role="tab" aria-controls="notlar">
                                <i class="icon-pie-chart"></i> Notlar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#dokumanlar6" role="tab" aria-controls="dokumanlar">
                                <i class="icon-pie-chart"></i> Dökümanlar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#receteler7" role="tab" aria-controls="receteler">
                                <i class="icon-pie-chart"></i> Reçeteler</a>
                        </li>
                    </ul>


    @else



                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link           @if($takipler->takip_tipi =='jine')active @endif
                        @if($takipler->takip_tipi =='infe')active @endif
                            " data-toggle="tab" href="#muayane1" role="tab" aria-controls="muayane">
                            <i class="icon-calculator"></i> Muayane</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#usg2" role="tab" aria-controls="usg">
                            <i class="icon-basket-loaded"></i> Usg</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#laboratuvar3" role="tab" aria-controls="laboratuvar">
                            <i class="icon-pie-chart"></i> Laboratuvar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#ameliyatlar4" role="tab" aria-controls="ameliyatlar">
                            <i class="icon-pie-chart"></i> Ameliyatlar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#notlar5" role="tab" aria-controls="notlar">
                            <i class="icon-pie-chart"></i> Notlar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#dokumanlar6" role="tab" aria-controls="dokumanlar">
                            <i class="icon-pie-chart"></i> Dökümanlar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#receteler7" role="tab" aria-controls="receteler">
                            <i class="icon-pie-chart"></i> Reçeteler</a>
                    </li>
                </ul>







@endif

    <div class="tab-content">
        @if($takipler->takip_tipi =='gebe')
        <div class="tab-pane  @if($takipler->takip_tipi =='gebe')active @endif" id="ilkmuayane0" role="tabpanel">



            <form action="{{ route("admin.takiplers.update", [$takipler->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group d-none {{ $errors->has('takip_tipi') ? 'has-error' : '' }}">
                    <label for="takip_tipi">{{ trans('cruds.takipler.fields.takip_tipi') }}*</label>
                    <select id="takip_tipi" name="takip_tipi" class="form-control" required>
                        <option value="" disabled {{ old('takip_tipi', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                        @foreach(App\Takipler::TAKIP_TIPI_SELECT as $key => $label)
                            <option value="{{ $key }}" {{ old('takip_tipi', $takipler->takip_tipi) === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('takip_tipi'))
                        <em class="invalid-feedback">
                            {{ $errors->first('takip_tipi') }}
                        </em>
                    @endif
                </div>
                <div class="form-group d-none {{ $errors->has('hasta_id') ? 'has-error' : '' }}">
                    <label for="hasta">{{ trans('cruds.takipler.fields.hasta') }}*</label>
                    <select name="hasta_id" id="hasta" class="form-control select2" required>
                        @foreach($hastas as $id => $hasta)
                            <option value="{{ $id }}" {{ (isset($takipler) && $takipler->hasta ? $takipler->hasta->id : old('hasta_id')) == $id ? 'selected' : '' }}>{{ $hasta }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('hasta_id'))
                        <em class="invalid-feedback">
                            {{ $errors->first('hasta_id') }}
                        </em>
                    @endif
                </div>
                <div class="form-group   {{ $errors->has('tarih') ? 'has-error' : '' }}">
                    <label for="tarih">{{ trans('cruds.takipler.fields.tarih') }}</label>
                    <input type="text" id="tarih" name="tarih" class="form-control date" value="{{ old('tarih', isset($takipler) ? $takipler->tarih : '') }}">
                    @if($errors->has('tarih'))
                        <em class="invalid-feedback">
                            {{ $errors->first('tarih') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.takipler.fields.tarih_helper') }}
                    </p>
                </div>

                <div class="form-group {{ $errors->has('kilo_kg') ? 'has-error' : '' }}">
                    <label for="kilo_kg">{{ trans('cruds.takipler.fields.kilo_kg') }}</label>
                    <input type="text" id="kilo_kg" name="kilo_kg" class="form-control" value="{{ old('kilo_kg', isset($takipler) ? $takipler->kilo_kg : '') }}">
                    @if($errors->has('kilo_kg'))
                        <em class="invalid-feedback">
                            {{ $errors->first('kilo_kg') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.takipler.fields.kilo_kg_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('vki') ? 'has-error' : '' }}">
                    <label for="vki">{{ trans('cruds.takipler.fields.vki') }}</label>
                    <input type="text" id="vki" name="vki" class="form-control" value="{{ old('vki', isset($takipler) ? $takipler->vki : '') }}">
                    @if($errors->has('vki'))
                        <em class="invalid-feedback">
                            {{ $errors->first('vki') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.takipler.fields.vki_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('sat') ? 'has-error' : '' }}">
                    <label for="sat">{{ trans('cruds.takipler.fields.sat') }}</label>
                    <input type="text" id="sat" name="sat" class="form-control" value="{{ old('sat', isset($takipler) ? $takipler->sat : '') }}">
                    @if($errors->has('sat'))
                        <em class="invalid-feedback">
                            {{ $errors->first('sat') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.takipler.fields.sat_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('boy_cm') ? 'has-error' : '' }}">
                    <label for="boy_cm">{{ trans('cruds.takipler.fields.boy_cm') }}</label>
                    <input type="text" id="boy_cm" name="boy_cm" class="form-control" value="{{ old('boy_cm', isset($takipler) ? $takipler->boy_cm : '') }}">
                    @if($errors->has('boy_cm'))
                        <em class="invalid-feedback">
                            {{ $errors->first('boy_cm') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.takipler.fields.boy_cm_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('oyku') ? 'has-error' : '' }}">
                    <label for="oyku">{{ trans('cruds.takipler.fields.oyku') }}</label>
                    <textarea id="oyku" name="oyku" class="form-control ">{{ old('oyku', isset($takipler) ? $takipler->oyku : '') }}</textarea>
                    @if($errors->has('oyku'))
                        <em class="invalid-feedback">
                            {{ $errors->first('oyku') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.takipler.fields.oyku_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('sat_emin') ? 'has-error' : '' }}">
                    <label>{{ trans('cruds.takipler.fields.sat_emin') }}</label>
                    @foreach(App\Takipler::SAT_EMIN_RADIO as $key => $label)
                        <div>
                            <input id="sat_emin_{{ $key }}" name="sat_emin" type="radio" value="{{ $key }}" {{ old('sat_emin', $takipler->sat_emin) === (string)$key ? 'checked' : '' }}>
                            <label for="sat_emin_{{ $key }}">{{ $label }}</label>
                        </div>
                    @endforeach
                    @if($errors->has('sat_emin'))
                        <em class="invalid-feedback">
                            {{ $errors->first('sat_emin') }}
                        </em>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('geb_haft_duzeltildi') ? 'has-error' : '' }}">
                    <label>{{ trans('cruds.takipler.fields.geb_haft_duzeltildi') }}</label>
                    @foreach(App\Takipler::GEB_HAFT_DUZELTILDI_RADIO as $key => $label)
                        <div>
                            <input id="geb_haft_duzeltildi_{{ $key }}" name="geb_haft_duzeltildi" type="radio" value="{{ $key }}" {{ old('geb_haft_duzeltildi', $takipler->geb_haft_duzeltildi) === (string)$key ? 'checked' : '' }}>
                            <label for="geb_haft_duzeltildi_{{ $key }}">{{ $label }}</label>
                        </div>
                    @endforeach
                    @if($errors->has('geb_haft_duzeltildi'))
                        <em class="invalid-feedback">
                            {{ $errors->first('geb_haft_duzeltildi') }}
                        </em>
                    @endif
                </div>

                <div>
                    <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
                </div>
            </form>


        </div>


        <div class="tab-pane" id="trimesterbir01" role="tabpanel">

            <div style="margin-bottom: 10px;" class="row">
                <div class="col-lg-12">
                    <form class="float-sm-left mr-3" action="{{ route("admin.trimesterbirs.create") }}" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="takip_id" value="{{ $takipler->id }}">

                        <input type="submit" class="btn btn-success" value=" Trimester 1 Ekle">
                    </form>
                </div>
            </div>


            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable">
                    <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.trimesterbir.fields.tarih') }}
                        </th>
                        <th>
                            {{ trans('cruds.trimesterbir.fields.gebelik_kesesi') }}
                        </th>
                        <th>
                            {{ trans('cruds.trimesterbir.fields.yolk_kesesi') }}
                        </th>
                        <th>
                            {{ trans('cruds.trimesterbir.fields.crl') }}
                        </th>
                        <th>
                            {{ trans('cruds.trimesterbir.fields.fka_vuru_dk') }}
                        </th>
                        <th>
                            {{ trans('cruds.trimesterbir.fields.randevu_tipi') }}
                        </th>
                        <th>
                            {{ trans('cruds.trimesterbir.fields.kilo') }}
                        </th>
                        <th>
                            {{ trans('cruds.trimesterbir.fields.notlar') }}
                        </th>

                        <th>
                            &nbsp;
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($trimesterbirs as $key => $trimesterbir)
                        <tr data-entry-id="{{ $trimesterbir->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $trimesterbir->tarih ?? '' }}
                            </td>
                            <td>
                                {{ $trimesterbir->gebelik_kesesi ?? '' }}
                            </td>
                            <td>
                                {{ $trimesterbir->yolk_kesesi ?? '' }}
                            </td>
                            <td>
                                {{ $trimesterbir->crl ?? '' }}
                            </td>
                            <td>
                                {{ $trimesterbir->fka_vuru_dk ?? '' }}
                            </td>
                            <td>
                                {{ App\Trimesterbir::RANDEVU_TIPI_SELECT[$trimesterbir->randevu_tipi] ?? '' }}
                            </td>
                            <td>
                                {{ $trimesterbir->kilo ?? '' }}
                            </td>
                            <td>
                                {{ $trimesterbir->notlar ?? '' }}
                            </td>

                            <td>
                                @can('trimesterbir_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.trimesterbirs.show', $trimesterbir->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan
                                @can('trimesterbir_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.trimesterbirs.edit', $trimesterbir->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('trimesterbir_delete')
                                    <form action="{{ route('admin.trimesterbirs.destroy', $trimesterbir->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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

        <div class="tab-pane" id="trimesteriki02" role="tabpanel">
            <div style="margin-bottom: 10px;" class="row">
                <div class="col-lg-12">
                    <form class="float-sm-left mr-3" action="{{ route("admin.trimesterikiucs.create") }}" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="takip_id" value="{{ $takipler->id }}">

                        <input type="submit" class="btn btn-success" value=" Trimester 2 Ekle">
                    </form>
                </div>
            </div>
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable">
                    <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.trimesterikiuc.fields.tarih') }}
                        </th>
                        <th>
                            {{ trans('cruds.trimesterikiuc.fields.sat_ile_hafta') }}
                        </th>
                        <th>
                            {{ trans('cruds.trimesterikiuc.fields.kilo_kg') }}
                        </th>
                        <th>
                            {{ trans('cruds.trimesterikiuc.fields.usg_ile_hafta') }}
                        </th>
                        <th>
                            {{ trans('cruds.trimesterikiuc.fields.tansiyon') }}
                        </th>
                        <th>
                            {{ trans('cruds.trimesterikiuc.fields.sonuc') }}
                        </th>
                        <th>
                            {{ trans('cruds.trimesterikiuc.fields.ultrason') }}
                        </th>
                        <th>
                            {{ trans('cruds.trimesterikiuc.fields.randevu_tipi') }}
                        </th>

                        <th>
                            &nbsp;
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($trimesterikiucs as $key => $trimesterikiuc)
                        <tr data-entry-id="{{ $trimesterikiuc->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $trimesterikiuc->tarih ?? '' }}
                            </td>
                            <td>
                                {{ $trimesterikiuc->sat_ile_hafta ?? '' }}
                            </td>
                            <td>
                                {{ $trimesterikiuc->kilo_kg ?? '' }}
                            </td>
                            <td>
                                {{ $trimesterikiuc->usg_ile_hafta ?? '' }}
                            </td>
                            <td>
                                {{ $trimesterikiuc->tansiyon ?? '' }}
                            </td>
                            <td>
                                {{ $trimesterikiuc->sonuc ?? '' }}
                            </td>
                            <td>
                                {{ $trimesterikiuc->ultrason ?? '' }}
                            </td>
                            <td>
                                {{ App\Trimesterikiuc::RANDEVU_TIPI_SELECT[$trimesterikiuc->randevu_tipi] ?? '' }}
                            </td>

                            <td>
                                @can('trimesterikiuc_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.trimesterikiucs.show', $trimesterikiuc->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan
                                @can('trimesterikiuc_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.trimesterikiucs.edit', $trimesterikiuc->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('trimesterikiuc_delete')
                                    <form action="{{ route('admin.trimesterikiucs.destroy', $trimesterikiuc->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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


            <div class="tab-pane" id="tarama03" role="tabpanel">


                <form action="{{ route("admin.takiplers.update", [$takipler->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                    <div class="form-group d-none {{ $errors->has('takip_tipi') ? 'has-error' : '' }}">
                        <label for="takip_tipi">{{ trans('cruds.takipler.fields.takip_tipi') }}*</label>
                        <select id="takip_tipi" name="takip_tipi" class="form-control" required>
                            <option value="" disabled {{ old('takip_tipi', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                            @foreach(App\Takipler::TAKIP_TIPI_SELECT as $key => $label)
                                <option value="{{ $key }}" {{ old('takip_tipi', $takipler->takip_tipi) === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('takip_tipi'))
                            <em class="invalid-feedback">
                                {{ $errors->first('takip_tipi') }}
                            </em>
                        @endif
                    </div>
                    <div class="form-group d-none {{ $errors->has('hasta_id') ? 'has-error' : '' }}">
                        <label for="hasta">{{ trans('cruds.takipler.fields.hasta') }}*</label>
                        <select name="hasta_id" id="hasta" class="form-control select2" required>
                            @foreach($hastas as $id => $hasta)
                                <option value="{{ $id }}" {{ (isset($takipler) && $takipler->hasta ? $takipler->hasta->id : old('hasta_id')) == $id ? 'selected' : '' }}>{{ $hasta }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('hasta_id'))
                            <em class="invalid-feedback">
                                {{ $errors->first('hasta_id') }}
                            </em>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('bir_trimaster') ? 'has-error' : '' }}">
                        <label for="bir_trimaster">{{ trans('cruds.takipler.fields.bir_trimaster') }}</label>
                        <input type="text" id="bir_trimaster" name="bir_trimaster" class="form-control" value="{{ old('bir_trimaster', isset($takipler) ? $takipler->bir_trimaster : '') }}">
                        @if($errors->has('bir_trimaster'))
                            <em class="invalid-feedback">
                                {{ $errors->first('bir_trimaster') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.takipler.fields.bir_trimaster_helper') }}
                        </p>
                    </div>
                    <div class="form-group {{ $errors->has('genetik_inceleme') ? 'has-error' : '' }}">
                        <label for="genetik_inceleme">{{ trans('cruds.takipler.fields.genetik_inceleme') }}</label>
                        <textarea id="genetik_inceleme" name="genetik_inceleme" class="form-control ">{{ old('genetik_inceleme', isset($takipler) ? $takipler->genetik_inceleme : '') }}</textarea>
                        @if($errors->has('genetik_inceleme'))
                            <em class="invalid-feedback">
                                {{ $errors->first('genetik_inceleme') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.takipler.fields.genetik_inceleme_helper') }}
                        </p>
                    </div>
                    <div class="form-group {{ $errors->has('fetal_dna') ? 'has-error' : '' }}">
                        <label for="fetal_dna">{{ trans('cruds.takipler.fields.fetal_dna') }}</label>
                        <textarea id="fetal_dna" name="fetal_dna" class="form-control ">{{ old('fetal_dna', isset($takipler) ? $takipler->fetal_dna : '') }}</textarea>
                        @if($errors->has('fetal_dna'))
                            <em class="invalid-feedback">
                                {{ $errors->first('fetal_dna') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.takipler.fields.fetal_dna_helper') }}
                        </p>
                    </div>
                    <div class="form-group {{ $errors->has('fat') ? 'has-error' : '' }}">
                        <label for="fat">{{ trans('cruds.takipler.fields.fat') }}</label>
                        <textarea id="fat" name="fat" class="form-control ">{{ old('fat', isset($takipler) ? $takipler->fat : '') }}</textarea>
                        @if($errors->has('fat'))
                            <em class="invalid-feedback">
                                {{ $errors->first('fat') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.takipler.fields.fat_helper') }}
                        </p>
                    </div>
                    <div class="form-group {{ $errors->has('iki_trimaster') ? 'has-error' : '' }}">
                        <label for="iki_trimaster">{{ trans('cruds.takipler.fields.iki_trimaster') }}</label>
                        <input type="text" id="iki_trimaster" name="iki_trimaster" class="form-control" value="{{ old('iki_trimaster', isset($takipler) ? $takipler->iki_trimaster : '') }}">
                        @if($errors->has('iki_trimaster'))
                            <em class="invalid-feedback">
                                {{ $errors->first('iki_trimaster') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.takipler.fields.iki_trimaster_helper') }}
                        </p>
                    </div>
                    <div class="form-group {{ $errors->has('g_t_t') ? 'has-error' : '' }}">
                        <label for="g_t_t">{{ trans('cruds.takipler.fields.g_t_t') }}</label>
                        <textarea id="g_t_t" name="g_t_t" class="form-control ">{{ old('g_t_t', isset($takipler) ? $takipler->g_t_t : '') }}</textarea>
                        @if($errors->has('g_t_t'))
                            <em class="invalid-feedback">
                                {{ $errors->first('g_t_t') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.takipler.fields.g_t_t_helper') }}
                        </p>
                    </div>
                    <div>
                        <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
                    </div>
                </form>




            </div>
            @endif


        <div class="tab-pane            @if($takipler->takip_tipi =='jine')active @endif
        @if($takipler->takip_tipi =='infe')active @endif
            " id="muayane1" role="tabpanel">










            <div style="margin-bottom: 10px;" class="row">
                <div class="col-lg-12">
                    <form class="float-sm-left mr-3" action="{{ route("admin.muayanes.create") }}" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="takip_id" value="{{ $takipler->id }}">

                        <input type="submit" class="btn btn-success" value=" Muayane Ekle">
                    </form>
                </div>
            </div>




            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.muayane.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable">
                            <thead>
                            <tr>
                                <th width="10">

                                </th>
                                <th>
                                    {{ trans('cruds.muayane.fields.tarih') }}
                                </th>
                                <th>
                                    {{ trans('cruds.muayane.fields.randevu_tipi') }}
                                </th>
                                <th>
                                    {{ trans('cruds.muayane.fields.sikayet') }}
                                </th>
                                <th>
                                    {{ trans('cruds.muayane.fields.oyku') }}
                                </th>
                                <th>
                                    {{ trans('cruds.muayane.fields.tani') }}
                                </th>
                                <th>
                                    {{ trans('cruds.muayane.fields.istenilen_tetkikler') }}
                                </th>
                                <th>
                                    {{ trans('cruds.muayane.fields.tedavi') }}
                                </th>
                                <th>
                                    {{ trans('cruds.muayane.fields.sonuc') }}
                                </th>
                                <th>
                                    &nbsp;
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($muayanes as $key => $muayane)
                                <tr data-entry-id="{{ $muayane->id }}">
                                    <td>

                                    </td>
                                    <td>
                                        {{ $muayane->tarih ?? '' }}
                                    </td>
                                    <td>
                                        {{ App\Muayane::RANDEVU_TIPI_SELECT[$muayane->randevu_tipi] ?? '' }}
                                    </td>
                                    <td>
                                        {{ $muayane->sikayet ?? '' }}
                                    </td>
                                    <td>
                                        {{ $muayane->oyku ?? '' }}
                                    </td>
                                    <td>
                                        {{ $muayane->tani ?? '' }}
                                    </td>
                                    <td>
                                        {{ $muayane->istenilen_tetkikler ?? '' }}
                                    </td>
                                    <td>
                                        {{ $muayane->tedavi ?? '' }}
                                    </td>
                                    <td>
                                        {{ $muayane->sonuc ?? '' }}
                                    </td>
                                    <td>
                                        @can('muayane_show')
                                            <a class="btn btn-xs btn-primary" href="{{ route('admin.muayanes.show', $muayane->id) }}">
                                                {{ trans('global.view') }}
                                            </a>
                                        @endcan
                                        @can('muayane_edit')
                                            <a class="btn btn-xs btn-info" href="{{ route('admin.muayanes.edit', $muayane->id) }}">
                                                {{ trans('global.edit') }}
                                            </a>
                                        @endcan
                                        @can('muayane_delete')
                                            <form action="{{ route('admin.muayanes.destroy', $muayane->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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





        </div>

        <div class="tab-pane" id="usg2" role="tabpanel">






            <div style="margin-bottom: 10px;" class="row">
                <div class="col-lg-12">
                    <form class="float-sm-left mr-3" action="{{ route("admin.usgs.create") }}" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="takip_id" value="{{ $takipler->id }}">

                        <input type="submit" class="btn btn-success" value=" Usg Ekle">
                    </form>
                </div>
            </div>

            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable">
                    <thead>
                    <tr>
                        <th width="10">

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


        <div class="tab-pane" id="laboratuvar3" role="tabpanel">
            <div style="margin-bottom: 10px;" class="row">
                <div class="col-lg-12">
                    <form class="float-sm-left mr-3" action="{{ route("admin.laboratuvars.create") }}" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="takip_id" value="{{ $takipler->id }}">

                        <input type="submit" class="btn btn-success" value=" Laboratuvar Sonucu Ekle">
                    </form>
                </div>
            </div>

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



        <div class="tab-pane" id="ameliyatlar4" role="tabpanel">



            <div style="margin-bottom: 10px;" class="row">
                <div class="col-lg-12">
                    <form class="float-sm-left mr-3" action="{{ route("admin.ameliyatlars.create") }}" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="takip_id" value="{{ $takipler->id }}">

                        <input type="submit" class="btn btn-success" value=" Ameliyat Ekle">
                    </form>
                </div>
            </div>

            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable">
                    <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.ameliyatlar.fields.tarih') }}
                        </th>
                        <th>
                            {{ trans('cruds.ameliyatlar.fields.ameliyat_adi') }}
                        </th>
                        <th>
                            {{ trans('cruds.ameliyatlar.fields.ameliyat_aciklama') }}
                        </th>

                        <th>
                            &nbsp;
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($ameliyatlars as $key => $ameliyatlar)
                        <tr data-entry-id="{{ $ameliyatlar->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $ameliyatlar->tarih ?? '' }}
                            </td>
                            <td>
                                {{ $ameliyatlar->ameliyat_adi ?? '' }}
                            </td>
                            <td>
                                {{ $ameliyatlar->ameliyat_aciklama ?? '' }}
                            </td>

                            <td>
                                @can('ameliyatlar_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.ameliyatlars.show', $ameliyatlar->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan
                                @can('ameliyatlar_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.ameliyatlars.edit', $ameliyatlar->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('ameliyatlar_delete')
                                    <form action="{{ route('admin.ameliyatlars.destroy', $ameliyatlar->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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

        <div class="tab-pane" id="notlar5" role="tabpanel">

            <div style="margin-bottom: 10px;" class="row">
                <div class="col-lg-12">
                    <form class="float-sm-left mr-3" action="{{ route("admin.notlars.create") }}" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="takip_id" value="{{ $takipler->id }}">

                        <input type="submit" class="btn btn-success" value=" Not Ekle">
                    </form>
                </div>
            </div>
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable">
                    <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.notlar.fields.tarih') }}
                        </th>
                        <th>
                            {{ trans('cruds.notlar.fields.not') }}
                        </th>

                        <th>
                            &nbsp;
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($notlars as $key => $notlar)
                        <tr data-entry-id="{{ $notlar->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $notlar->tarih ?? '' }}
                            </td>
                            <td>
                                {{ $notlar->not ?? '' }}
                            </td>

                            <td>
                                @can('notlar_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.notlars.show', $notlar->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan
                                @can('notlar_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.notlars.edit', $notlar->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('notlar_delete')
                                    <form action="{{ route('admin.notlars.destroy', $notlar->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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


        <div class="tab-pane" id="dokumanlar6" role="tabpanel">

            <div style="margin-bottom: 10px;" class="row">
                <div class="col-lg-12">
                    <form class="float-sm-left mr-3" action="{{ route("admin.dokumanlars.create") }}" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="takip_id" value="{{ $takipler->id }}">

                        <input type="submit" class="btn btn-success" value=" Döküman Ekle">
                    </form>
                </div>
            </div>
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable">
                    <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.dokumanlar.fields.takip') }}
                        </th>
                        <th>
                            {{ trans('cruds.dokumanlar.fields.dosya_adi') }}
                        </th>
                        <th>
                            {{ trans('cruds.dokumanlar.fields.tarih') }}
                        </th>
                        <th>
                            {{ trans('cruds.dokumanlar.fields.dosya') }}
                        </th>
                        <th>
                            {{ trans('cruds.dokumanlar.fields.dosya_notu') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($dokumanlars as $key => $dokumanlar)
                        <tr data-entry-id="{{ $dokumanlar->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $dokumanlar->takip->takip_tipi ?? '' }}
                            </td>
                            <td>
                                {{ $dokumanlar->dosya_adi ?? '' }}
                            </td>
                            <td>
                                {{ $dokumanlar->tarih ?? '' }}
                            </td>
                            <td>
                                @if($dokumanlar->dosya)
                                    @foreach($dokumanlar->dosya as $key => $media)
                                        <a href="{{ $media->getUrl() }}" target="_blank">
                                            {{ trans('global.view_file') }}
                                        </a>
                                    @endforeach
                                @endif
                            </td>
                            <td>
                                {{ $dokumanlar->dosya_notu ?? '' }}
                            </td>
                            <td>
                                @can('dokumanlar_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.dokumanlars.show', $dokumanlar->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan
                                @can('dokumanlar_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.dokumanlars.edit', $dokumanlar->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('dokumanlar_delete')
                                    <form action="{{ route('admin.dokumanlars.destroy', $dokumanlar->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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

        </div>     <div class="tab-pane" id="receteler7" role="tabpanel">


            <div style="margin-bottom: 10px;" class="row">
                <div class="col-lg-12">
                    <form class="float-sm-left mr-3" action="{{ route("admin.recetelers.create") }}" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="takip_id" value="{{ $takipler->id }}">
                        <input type="hidden" name="hasta_id" value="{{ $takipler->hasta->id }}">


                        <input type="submit" class="btn btn-success" value=" Reçete Ekle">
                    </form>
                </div>
            </div>


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
                            Oluşturulma Tarihi
                        </th>
                        <th>
                            Düzenleme Tarihi
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
                                {{ $receteler->created_at }}
                            </td>
                            <td>
                                {{ $receteler->update_at }}
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


            </div>   </div>

@endsection
