@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.muayane.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.muayanes.update", [$muayane->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('tarih') ? 'has-error' : '' }}">
                <label for="tarih">{{ trans('cruds.muayane.fields.tarih') }}</label>
                <input type="text" id="tarih" name="tarih" class="form-control date" value="{{ old('tarih', isset($muayane) ? $muayane->tarih : '') }}">
                @if($errors->has('tarih'))
                    <em class="invalid-feedback">
                        {{ $errors->first('tarih') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.muayane.fields.tarih_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('sat') ? 'has-error' : '' }}">
                <label for="sat">{{ trans('cruds.muayane.fields.sat') }}</label>
                <input type="text" id="sat" name="sat" class="form-control date" value="{{ old('sat', isset($muayane) ? $muayane->sat : '') }}">
                @if($errors->has('sat'))
                    <em class="invalid-feedback">
                        {{ $errors->first('sat') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.muayane.fields.sat_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('kilo_kg') ? 'has-error' : '' }}">
                <label for="kilo_kg">{{ trans('cruds.muayane.fields.kilo_kg') }}</label>
                <input type="text" id="kilo_kg" name="kilo_kg" class="form-control" value="{{ old('kilo_kg', isset($muayane) ? $muayane->kilo_kg : '') }}">
                @if($errors->has('kilo_kg'))
                    <em class="invalid-feedback">
                        {{ $errors->first('kilo_kg') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.muayane.fields.kilo_kg_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('boy_cm') ? 'has-error' : '' }}">
                <label for="boy_cm">{{ trans('cruds.muayane.fields.boy_cm') }}</label>
                <input type="text" id="boy_cm" name="boy_cm" class="form-control" value="{{ old('boy_cm', isset($muayane) ? $muayane->boy_cm : '') }}">
                @if($errors->has('boy_cm'))
                    <em class="invalid-feedback">
                        {{ $errors->first('boy_cm') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.muayane.fields.boy_cm_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('vki') ? 'has-error' : '' }}">
                <label for="vki">{{ trans('cruds.muayane.fields.vki') }}</label>
                <input type="text" id="vki" name="vki" class="form-control" value="{{ old('vki', isset($muayane) ? $muayane->vki : '') }}">
                @if($errors->has('vki'))
                    <em class="invalid-feedback">
                        {{ $errors->first('vki') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.muayane.fields.vki_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('randevu_tipi') ? 'has-error' : '' }}">
                <label for="randevu_tipi">{{ trans('cruds.muayane.fields.randevu_tipi') }}</label>
                <select id="randevu_tipi" name="randevu_tipi" class="form-control">
                    <option value="" disabled {{ old('randevu_tipi', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Muayane::RANDEVU_TIPI_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('randevu_tipi', $muayane->randevu_tipi) === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('randevu_tipi'))
                    <em class="invalid-feedback">
                        {{ $errors->first('randevu_tipi') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('icd_kodu') ? 'has-error' : '' }}">
                <label for="icd_kodu">{{ trans('cruds.muayane.fields.icd_kodu') }}</label>
                <input type="text" id="icd_kodu" name="icd_kodu" class="form-control" value="{{ old('icd_kodu', isset($muayane) ? $muayane->icd_kodu : '') }}">
                @if($errors->has('icd_kodu'))
                    <em class="invalid-feedback">
                        {{ $errors->first('icd_kodu') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.muayane.fields.icd_kodu_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('sikayet') ? 'has-error' : '' }}">
                <label for="sikayet">{{ trans('cruds.muayane.fields.sikayet') }}</label>
                <textarea id="sikayet" name="sikayet" class="form-control ">{{ old('sikayet', isset($muayane) ? $muayane->sikayet : '') }}</textarea>
                @if($errors->has('sikayet'))
                    <em class="invalid-feedback">
                        {{ $errors->first('sikayet') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.muayane.fields.sikayet_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('oyku') ? 'has-error' : '' }}">
                <label for="oyku">{{ trans('cruds.muayane.fields.oyku') }}</label>
                <textarea id="oyku" name="oyku" class="form-control ">{{ old('oyku', isset($muayane) ? $muayane->oyku : '') }}</textarea>
                @if($errors->has('oyku'))
                    <em class="invalid-feedback">
                        {{ $errors->first('oyku') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.muayane.fields.oyku_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('jinekolojik_muayene') ? 'has-error' : '' }}">
                <label for="jinekolojik_muayene">{{ trans('cruds.muayane.fields.jinekolojik_muayene') }}</label>
                <textarea id="jinekolojik_muayene" name="jinekolojik_muayene" class="form-control ">{{ old('jinekolojik_muayene', isset($muayane) ? $muayane->jinekolojik_muayene : '') }}</textarea>
                @if($errors->has('jinekolojik_muayene'))
                    <em class="invalid-feedback">
                        {{ $errors->first('jinekolojik_muayene') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.muayane.fields.jinekolojik_muayene_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('tani') ? 'has-error' : '' }}">
                <label for="tani">{{ trans('cruds.muayane.fields.tani') }}</label>
                <textarea id="tani" name="tani" class="form-control ">{{ old('tani', isset($muayane) ? $muayane->tani : '') }}</textarea>
                @if($errors->has('tani'))
                    <em class="invalid-feedback">
                        {{ $errors->first('tani') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.muayane.fields.tani_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('istenilen_tetkikler') ? 'has-error' : '' }}">
                <label for="istenilen_tetkikler">{{ trans('cruds.muayane.fields.istenilen_tetkikler') }}</label>
                <input type="text" id="istenilen_tetkikler" name="istenilen_tetkikler" class="form-control" value="{{ old('istenilen_tetkikler', isset($muayane) ? $muayane->istenilen_tetkikler : '') }}">
                @if($errors->has('istenilen_tetkikler'))
                    <em class="invalid-feedback">
                        {{ $errors->first('istenilen_tetkikler') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.muayane.fields.istenilen_tetkikler_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('tedavi') ? 'has-error' : '' }}">
                <label for="tedavi">{{ trans('cruds.muayane.fields.tedavi') }}</label>
                <textarea id="tedavi" name="tedavi" class="form-control ">{{ old('tedavi', isset($muayane) ? $muayane->tedavi : '') }}</textarea>
                @if($errors->has('tedavi'))
                    <em class="invalid-feedback">
                        {{ $errors->first('tedavi') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.muayane.fields.tedavi_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('sonuc') ? 'has-error' : '' }}">
                <label for="sonuc">{{ trans('cruds.muayane.fields.sonuc') }}</label>
                <textarea id="sonuc" name="sonuc" class="form-control ">{{ old('sonuc', isset($muayane) ? $muayane->sonuc : '') }}</textarea>
                @if($errors->has('sonuc'))
                    <em class="invalid-feedback">
                        {{ $errors->first('sonuc') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.muayane.fields.sonuc_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('smear_notlari') ? 'has-error' : '' }}">
                <label for="smear_notlari">{{ trans('cruds.muayane.fields.smear_notlari') }}</label>
                <input type="text" id="smear_notlari" name="smear_notlari" class="form-control" value="{{ old('smear_notlari', isset($muayane) ? $muayane->smear_notlari : '') }}">
                @if($errors->has('smear_notlari'))
                    <em class="invalid-feedback">
                        {{ $errors->first('smear_notlari') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.muayane.fields.smear_notlari_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('usg_tipi') ? 'has-error' : '' }}">
                <label>{{ trans('cruds.muayane.fields.usg_tipi') }}</label>
                @foreach(App\Muayane::USG_TIPI_RADIO as $key => $label)
                    <div>
                        <input id="usg_tipi_{{ $key }}" name="usg_tipi" type="radio" value="{{ $key }}" {{ old('usg_tipi', $muayane->usg_tipi) === (string)$key ? 'checked' : '' }}>
                        <label for="usg_tipi_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('usg_tipi'))
                    <em class="invalid-feedback">
                        {{ $errors->first('usg_tipi') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('sag_over') ? 'has-error' : '' }}">
                <label for="sag_over">{{ trans('cruds.muayane.fields.sag_over') }}</label>
                <input type="text" id="sag_over" name="sag_over" class="form-control" value="{{ old('sag_over', isset($muayane) ? $muayane->sag_over : '') }}">
                @if($errors->has('sag_over'))
                    <em class="invalid-feedback">
                        {{ $errors->first('sag_over') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.muayane.fields.sag_over_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('sol_over') ? 'has-error' : '' }}">
                <label for="sol_over">{{ trans('cruds.muayane.fields.sol_over') }}</label>
                <input type="text" id="sol_over" name="sol_over" class="form-control" value="{{ old('sol_over', isset($muayane) ? $muayane->sol_over : '') }}">
                @if($errors->has('sol_over'))
                    <em class="invalid-feedback">
                        {{ $errors->first('sol_over') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.muayane.fields.sol_over_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('uterus') ? 'has-error' : '' }}">
                <label for="uterus">{{ trans('cruds.muayane.fields.uterus') }}</label>
                <input type="text" id="uterus" name="uterus" class="form-control" value="{{ old('uterus', isset($muayane) ? $muayane->uterus : '') }}">
                @if($errors->has('uterus'))
                    <em class="invalid-feedback">
                        {{ $errors->first('uterus') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.muayane.fields.uterus_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('usg_notu') ? 'has-error' : '' }}">
                <label for="usg_notu">{{ trans('cruds.muayane.fields.usg_notu') }}</label>
                <input type="text" id="usg_notu" name="usg_notu" class="form-control" value="{{ old('usg_notu', isset($muayane) ? $muayane->usg_notu : '') }}">
                @if($errors->has('usg_notu'))
                    <em class="invalid-feedback">
                        {{ $errors->first('usg_notu') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.muayane.fields.usg_notu_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('diger_notlar') ? 'has-error' : '' }}">
                <label for="diger_notlar">{{ trans('cruds.muayane.fields.diger_notlar') }}</label>
                <input type="text" id="diger_notlar" name="diger_notlar" class="form-control" value="{{ old('diger_notlar', isset($muayane) ? $muayane->diger_notlar : '') }}">
                @if($errors->has('diger_notlar'))
                    <em class="invalid-feedback">
                        {{ $errors->first('diger_notlar') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.muayane.fields.diger_notlar_helper') }}
                </p>
            </div>
            <div class="form-group d-none {{ $errors->has('takip_id') ? 'has-error' : '' }}">
                <label for="takip">{{ trans('cruds.muayane.fields.takip') }}</label>
                <select name="takip_id" id="takip" class="form-control select2">
                    @foreach($takips as $id => $takip)
                        <option value="{{ $id }}" {{ (isset($muayane) && $muayane->takip ? $muayane->takip->id : old('takip_id')) == $id ? 'selected' : '' }}>{{ $takip }}</option>
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
