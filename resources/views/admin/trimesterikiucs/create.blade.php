@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.trimesterikiuc.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.trimesterikiucs.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('tarih') ? 'has-error' : '' }}">
                <label for="tarih">{{ trans('cruds.trimesterikiuc.fields.tarih') }}</label>
                <input type="text" id="tarih" name="tarih" class="form-control date" value="{{ old('tarih', isset($trimesterikiuc) ? $trimesterikiuc->tarih : '') }}">
                @if($errors->has('tarih'))
                    <em class="invalid-feedback">
                        {{ $errors->first('tarih') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.trimesterikiuc.fields.tarih_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('sat_ile_hafta') ? 'has-error' : '' }}">
                <label for="sat_ile_hafta">{{ trans('cruds.trimesterikiuc.fields.sat_ile_hafta') }}</label>
                <input type="text" id="sat_ile_hafta" name="sat_ile_hafta" class="form-control" value="{{ old('sat_ile_hafta', isset($trimesterikiuc) ? $trimesterikiuc->sat_ile_hafta : '') }}">
                @if($errors->has('sat_ile_hafta'))
                    <em class="invalid-feedback">
                        {{ $errors->first('sat_ile_hafta') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.trimesterikiuc.fields.sat_ile_hafta_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('sat_ile_gun') ? 'has-error' : '' }}">
                <label for="sat_ile_gun">{{ trans('cruds.trimesterikiuc.fields.sat_ile_gun') }}</label>
                <input type="text" id="sat_ile_gun" name="sat_ile_gun" class="form-control" value="{{ old('sat_ile_gun', isset($trimesterikiuc) ? $trimesterikiuc->sat_ile_gun : '') }}">
                @if($errors->has('sat_ile_gun'))
                    <em class="invalid-feedback">
                        {{ $errors->first('sat_ile_gun') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.trimesterikiuc.fields.sat_ile_gun_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('kilo_kg') ? 'has-error' : '' }}">
                <label for="kilo_kg">{{ trans('cruds.trimesterikiuc.fields.kilo_kg') }}</label>
                <input type="text" id="kilo_kg" name="kilo_kg" class="form-control" value="{{ old('kilo_kg', isset($trimesterikiuc) ? $trimesterikiuc->kilo_kg : '') }}">
                @if($errors->has('kilo_kg'))
                    <em class="invalid-feedback">
                        {{ $errors->first('kilo_kg') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.trimesterikiuc.fields.kilo_kg_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('icd_kodu') ? 'has-error' : '' }}">
                <label for="icd_kodu">{{ trans('cruds.trimesterikiuc.fields.icd_kodu') }}</label>
                <input type="text" id="icd_kodu" name="icd_kodu" class="form-control" value="{{ old('icd_kodu', isset($trimesterikiuc) ? $trimesterikiuc->icd_kodu : '') }}">
                @if($errors->has('icd_kodu'))
                    <em class="invalid-feedback">
                        {{ $errors->first('icd_kodu') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.trimesterikiuc.fields.icd_kodu_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('usg_ile_hafta') ? 'has-error' : '' }}">
                <label for="usg_ile_hafta">{{ trans('cruds.trimesterikiuc.fields.usg_ile_hafta') }}</label>
                <input type="text" id="usg_ile_hafta" name="usg_ile_hafta" class="form-control" value="{{ old('usg_ile_hafta', isset($trimesterikiuc) ? $trimesterikiuc->usg_ile_hafta : '') }}">
                @if($errors->has('usg_ile_hafta'))
                    <em class="invalid-feedback">
                        {{ $errors->first('usg_ile_hafta') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.trimesterikiuc.fields.usg_ile_hafta_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('usg_ile_gun') ? 'has-error' : '' }}">
                <label for="usg_ile_gun">{{ trans('cruds.trimesterikiuc.fields.usg_ile_gun') }}</label>
                <input type="text" id="usg_ile_gun" name="usg_ile_gun" class="form-control" value="{{ old('usg_ile_gun', isset($trimesterikiuc) ? $trimesterikiuc->usg_ile_gun : '') }}">
                @if($errors->has('usg_ile_gun'))
                    <em class="invalid-feedback">
                        {{ $errors->first('usg_ile_gun') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.trimesterikiuc.fields.usg_ile_gun_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('tansiyon') ? 'has-error' : '' }}">
                <label for="tansiyon">{{ trans('cruds.trimesterikiuc.fields.tansiyon') }}</label>
                <input type="text" id="tansiyon" name="tansiyon" class="form-control" value="{{ old('tansiyon', isset($trimesterikiuc) ? $trimesterikiuc->tansiyon : '') }}">
                @if($errors->has('tansiyon'))
                    <em class="invalid-feedback">
                        {{ $errors->first('tansiyon') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.trimesterikiuc.fields.tansiyon_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('odem') ? 'has-error' : '' }}">
                <label for="odem">{{ trans('cruds.trimesterikiuc.fields.odem') }}</label>
                <input type="text" id="odem" name="odem" class="form-control" value="{{ old('odem', isset($trimesterikiuc) ? $trimesterikiuc->odem : '') }}">
                @if($errors->has('odem'))
                    <em class="invalid-feedback">
                        {{ $errors->first('odem') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.trimesterikiuc.fields.odem_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('sonuc') ? 'has-error' : '' }}">
                <label for="sonuc">{{ trans('cruds.trimesterikiuc.fields.sonuc') }}</label>
                <input type="text" id="sonuc" name="sonuc" class="form-control" value="{{ old('sonuc', isset($trimesterikiuc) ? $trimesterikiuc->sonuc : '') }}">
                @if($errors->has('sonuc'))
                    <em class="invalid-feedback">
                        {{ $errors->first('sonuc') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.trimesterikiuc.fields.sonuc_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('uterin_arter') ? 'has-error' : '' }}">
                <label for="uterin_arter">{{ trans('cruds.trimesterikiuc.fields.uterin_arter') }}</label>
                <input type="text" id="uterin_arter" name="uterin_arter" class="form-control" value="{{ old('uterin_arter', isset($trimesterikiuc) ? $trimesterikiuc->uterin_arter : '') }}">
                @if($errors->has('uterin_arter'))
                    <em class="invalid-feedback">
                        {{ $errors->first('uterin_arter') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.trimesterikiuc.fields.uterin_arter_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('servikal_kanal') ? 'has-error' : '' }}">
                <label for="servikal_kanal">{{ trans('cruds.trimesterikiuc.fields.servikal_kanal') }}</label>
                <input type="text" id="servikal_kanal" name="servikal_kanal" class="form-control" value="{{ old('servikal_kanal', isset($trimesterikiuc) ? $trimesterikiuc->servikal_kanal : '') }}">
                @if($errors->has('servikal_kanal'))
                    <em class="invalid-feedback">
                        {{ $errors->first('servikal_kanal') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.trimesterikiuc.fields.servikal_kanal_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('yakinma') ? 'has-error' : '' }}">
                <label for="yakinma">{{ trans('cruds.trimesterikiuc.fields.yakinma') }}</label>
                <input type="text" id="yakinma" name="yakinma" class="form-control" value="{{ old('yakinma', isset($trimesterikiuc) ? $trimesterikiuc->yakinma : '') }}">
                @if($errors->has('yakinma'))
                    <em class="invalid-feedback">
                        {{ $errors->first('yakinma') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.trimesterikiuc.fields.yakinma_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('ultrason') ? 'has-error' : '' }}">
                <label for="ultrason">{{ trans('cruds.trimesterikiuc.fields.ultrason') }}</label>
                <input type="text" id="ultrason" name="ultrason" class="form-control" value="{{ old('ultrason', isset($trimesterikiuc) ? $trimesterikiuc->ultrason : '') }}">
                @if($errors->has('ultrason'))
                    <em class="invalid-feedback">
                        {{ $errors->first('ultrason') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.trimesterikiuc.fields.ultrason_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('randevu_tipi') ? 'has-error' : '' }}">
                <label for="randevu_tipi">{{ trans('cruds.trimesterikiuc.fields.randevu_tipi') }}</label>
                <select id="randevu_tipi" name="randevu_tipi" class="form-control">
                    <option value="" disabled {{ old('randevu_tipi', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Trimesterikiuc::RANDEVU_TIPI_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('randevu_tipi', null) === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('randevu_tipi'))
                    <em class="invalid-feedback">
                        {{ $errors->first('randevu_tipi') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('takip_id') ? 'has-error' : '' }}">
                <label for="takip">{{ trans('cruds.trimesterikiuc.fields.takip') }}</label>
                <select name="takip_id" id="takip" class="form-control select2">
                    @foreach($takips as $id => $takip)
                        <option value="{{ $id }}" {{ (isset($trimesterikiuc) && $trimesterikiuc->takip ? $trimesterikiuc->takip->id : old('takip_id')) == $id ? 'selected' : '' }}>{{ $takip }}</option>
                    @endforeach
                </select>
                @if($errors->has('takip_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('takip_id') }}
                    </em>
                @endif
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection