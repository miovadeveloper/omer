@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.trimesterbir.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.trimesterbirs.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('tarih') ? 'has-error' : '' }}">
                <label for="tarih">{{ trans('cruds.trimesterbir.fields.tarih') }}</label>
                <input type="text" id="tarih" name="tarih" class="form-control date" value="{{ old('tarih', isset($trimesterbir) ? $trimesterbir->tarih : '') }}">
                @if($errors->has('tarih'))
                    <em class="invalid-feedback">
                        {{ $errors->first('tarih') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.trimesterbir.fields.tarih_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('gebelik_kesesi') ? 'has-error' : '' }}">
                <label for="gebelik_kesesi">{{ trans('cruds.trimesterbir.fields.gebelik_kesesi') }}</label>
                <input type="text" id="gebelik_kesesi" name="gebelik_kesesi" class="form-control" value="{{ old('gebelik_kesesi', isset($trimesterbir) ? $trimesterbir->gebelik_kesesi : '') }}">
                @if($errors->has('gebelik_kesesi'))
                    <em class="invalid-feedback">
                        {{ $errors->first('gebelik_kesesi') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.trimesterbir.fields.gebelik_kesesi_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('yolk_kesesi') ? 'has-error' : '' }}">
                <label for="yolk_kesesi">{{ trans('cruds.trimesterbir.fields.yolk_kesesi') }}</label>
                <input type="text" id="yolk_kesesi" name="yolk_kesesi" class="form-control" value="{{ old('yolk_kesesi', isset($trimesterbir) ? $trimesterbir->yolk_kesesi : '') }}">
                @if($errors->has('yolk_kesesi'))
                    <em class="invalid-feedback">
                        {{ $errors->first('yolk_kesesi') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.trimesterbir.fields.yolk_kesesi_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('mide') ? 'has-error' : '' }}">
                <label for="mide">{{ trans('cruds.trimesterbir.fields.mide') }}</label>
                <select id="mide" name="mide" class="form-control">
                    <option value="" disabled {{ old('mide', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Trimesterbir::MIDE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('mide', null) === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('mide'))
                    <em class="invalid-feedback">
                        {{ $errors->first('mide') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('mesane') ? 'has-error' : '' }}">
                <label for="mesane">{{ trans('cruds.trimesterbir.fields.mesane') }}</label>
                <select id="mesane" name="mesane" class="form-control">
                    <option value="" disabled {{ old('mesane', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Trimesterbir::MESANE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('mesane', null) === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('mesane'))
                    <em class="invalid-feedback">
                        {{ $errors->first('mesane') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('icd_kodu') ? 'has-error' : '' }}">
                <label for="icd_kodu">{{ trans('cruds.trimesterbir.fields.icd_kodu') }}</label>
                <input type="text" id="icd_kodu" name="icd_kodu" class="form-control" value="{{ old('icd_kodu', isset($trimesterbir) ? $trimesterbir->icd_kodu : '') }}">
                @if($errors->has('icd_kodu'))
                    <em class="invalid-feedback">
                        {{ $errors->first('icd_kodu') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.trimesterbir.fields.icd_kodu_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('crl_tarih') ? 'has-error' : '' }}">
                <label for="crl_tarih">{{ trans('cruds.trimesterbir.fields.crl_tarih') }}</label>
                <input type="text" id="crl_tarih" name="crl_tarih" class="form-control date" value="{{ old('crl_tarih', isset($trimesterbir) ? $trimesterbir->crl_tarih : '') }}">
                @if($errors->has('crl_tarih'))
                    <em class="invalid-feedback">
                        {{ $errors->first('crl_tarih') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.trimesterbir.fields.crl_tarih_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('crl') ? 'has-error' : '' }}">
                <label for="crl">{{ trans('cruds.trimesterbir.fields.crl') }}</label>
                <input type="text" id="crl" name="crl" class="form-control" value="{{ old('crl', isset($trimesterbir) ? $trimesterbir->crl : '') }}">
                @if($errors->has('crl'))
                    <em class="invalid-feedback">
                        {{ $errors->first('crl') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.trimesterbir.fields.crl_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('crl_gun') ? 'has-error' : '' }}">
                <label for="crl_gun">{{ trans('cruds.trimesterbir.fields.crl_gun') }}</label>
                <input type="text" id="crl_gun" name="crl_gun" class="form-control" value="{{ old('crl_gun', isset($trimesterbir) ? $trimesterbir->crl_gun : '') }}">
                @if($errors->has('crl_gun'))
                    <em class="invalid-feedback">
                        {{ $errors->first('crl_gun') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.trimesterbir.fields.crl_gun_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('fka_vuru_dk') ? 'has-error' : '' }}">
                <label for="fka_vuru_dk">{{ trans('cruds.trimesterbir.fields.fka_vuru_dk') }}</label>
                <input type="text" id="fka_vuru_dk" name="fka_vuru_dk" class="form-control" value="{{ old('fka_vuru_dk', isset($trimesterbir) ? $trimesterbir->fka_vuru_dk : '') }}">
                @if($errors->has('fka_vuru_dk'))
                    <em class="invalid-feedback">
                        {{ $errors->first('fka_vuru_dk') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.trimesterbir.fields.fka_vuru_dk_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('nt') ? 'has-error' : '' }}">
                <label for="nt">{{ trans('cruds.trimesterbir.fields.nt') }}</label>
                <input type="text" id="nt" name="nt" class="form-control" value="{{ old('nt', isset($trimesterbir) ? $trimesterbir->nt : '') }}">
                @if($errors->has('nt'))
                    <em class="invalid-feedback">
                        {{ $errors->first('nt') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.trimesterbir.fields.nt_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('nazal_kemik') ? 'has-error' : '' }}">
                <label for="nazal_kemik">{{ trans('cruds.trimesterbir.fields.nazal_kemik') }}</label>
                <input type="text" id="nazal_kemik" name="nazal_kemik" class="form-control" value="{{ old('nazal_kemik', isset($trimesterbir) ? $trimesterbir->nazal_kemik : '') }}">
                @if($errors->has('nazal_kemik'))
                    <em class="invalid-feedback">
                        {{ $errors->first('nazal_kemik') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.trimesterbir.fields.nazal_kemik_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('randevu_tipi') ? 'has-error' : '' }}">
                <label for="randevu_tipi">{{ trans('cruds.trimesterbir.fields.randevu_tipi') }}</label>
                <select id="randevu_tipi" name="randevu_tipi" class="form-control">
                    <option value="" disabled {{ old('randevu_tipi', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Trimesterbir::RANDEVU_TIPI_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('randevu_tipi', null) === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('randevu_tipi'))
                    <em class="invalid-feedback">
                        {{ $errors->first('randevu_tipi') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('ta') ? 'has-error' : '' }}">
                <label for="ta">{{ trans('cruds.trimesterbir.fields.ta') }}</label>
                <input type="text" id="ta" name="ta" class="form-control" value="{{ old('ta', isset($trimesterbir) ? $trimesterbir->ta : '') }}">
                @if($errors->has('ta'))
                    <em class="invalid-feedback">
                        {{ $errors->first('ta') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.trimesterbir.fields.ta_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('kilo') ? 'has-error' : '' }}">
                <label for="kilo">{{ trans('cruds.trimesterbir.fields.kilo') }}</label>
                <input type="text" id="kilo" name="kilo" class="form-control" value="{{ old('kilo', isset($trimesterbir) ? $trimesterbir->kilo : '') }}">
                @if($errors->has('kilo'))
                    <em class="invalid-feedback">
                        {{ $errors->first('kilo') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.trimesterbir.fields.kilo_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('notlar') ? 'has-error' : '' }}">
                <label for="notlar">{{ trans('cruds.trimesterbir.fields.notlar') }}</label>
                <textarea id="notlar" name="notlar" class="form-control ">{{ old('notlar', isset($trimesterbir) ? $trimesterbir->notlar : '') }}</textarea>
                @if($errors->has('notlar'))
                    <em class="invalid-feedback">
                        {{ $errors->first('notlar') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.trimesterbir.fields.notlar_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('takip_id') ? 'has-error' : '' }}">
                <label for="takip">{{ trans('cruds.trimesterbir.fields.takip') }}</label>
                <select name="takip_id" id="takip" class="form-control select2">
                    @foreach($takips as $id => $takip)
                        <option value="{{ $id }}" {{ (isset($trimesterbir) && $trimesterbir->takip ? $trimesterbir->takip->id : old('takip_id')) == $id ? 'selected' : '' }}>{{ $takip }}</option>
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