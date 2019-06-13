@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.hastalar.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.hastalars.update", [$hastalar->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="col-sm-12"> <h3>Hasta Genel Bilgiler
                </h3></div>
            <hr>
            <div class="form-group {{ $errors->has('hasta_kategorisi_id') ? 'has-error' : '' }}">
                <label for="hasta_kategorisi">{{ trans('cruds.hastalar.fields.hasta_kategorisi') }}</label>
                <select name="hasta_kategorisi_id" id="hasta_kategorisi" class="form-control select2">
                    @foreach($hasta_kategorisis as $id => $hasta_kategorisi)
                        <option value="{{ $id }}" {{ (isset($hastalar) && $hastalar->hasta_kategorisi ? $hastalar->hasta_kategorisi->id : old('hasta_kategorisi_id')) == $id ? 'selected' : '' }}>{{ $hasta_kategorisi }}</option>
                    @endforeach
                </select>
                @if($errors->has('hasta_kategorisi_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('hasta_kategorisi_id') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('adi_soyadi') ? 'has-error' : '' }}">
                <label for="adi_soyadi">{{ trans('cruds.hastalar.fields.adi_soyadi') }}</label>
                <input type="text" id="adi_soyadi" name="adi_soyadi" class="form-control" value="{{ old('adi_soyadi', isset($hastalar) ? $hastalar->adi_soyadi : '') }}">
                @if($errors->has('adi_soyadi'))
                    <em class="invalid-feedback">
                        {{ $errors->first('adi_soyadi') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.hastalar.fields.adi_soyadi_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('tc_kimlik_no') ? 'has-error' : '' }}">
                <label for="tc_kimlik_no">{{ trans('cruds.hastalar.fields.tc_kimlik_no') }}</label>
                <input type="text" id="tc_kimlik_no" name="tc_kimlik_no" class="form-control" value="{{ old('tc_kimlik_no', isset($hastalar) ? $hastalar->tc_kimlik_no : '') }}">
                @if($errors->has('tc_kimlik_no'))
                    <em class="invalid-feedback">
                        {{ $errors->first('tc_kimlik_no') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.hastalar.fields.tc_kimlik_no_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('ilk_gelis_tarihi') ? 'has-error' : '' }}">
                <label for="ilk_gelis_tarihi">{{ trans('cruds.hastalar.fields.ilk_gelis_tarihi') }}</label>
                <input type="text" id="ilk_gelis_tarihi" name="ilk_gelis_tarihi" class="form-control date" value="{{ old('ilk_gelis_tarihi', isset($hastalar) ? $hastalar->ilk_gelis_tarihi : '') }}">
                @if($errors->has('ilk_gelis_tarihi'))
                    <em class="invalid-feedback">
                        {{ $errors->first('ilk_gelis_tarihi') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.hastalar.fields.ilk_gelis_tarihi_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('dogum_tarihi') ? 'has-error' : '' }}">
                <label for="dogum_tarihi">{{ trans('cruds.hastalar.fields.dogum_tarihi') }}</label>
                <input type="text" id="dogum_tarihi" name="dogum_tarihi" class="form-control date" value="{{ old('dogum_tarihi', isset($hastalar) ? $hastalar->dogum_tarihi : '') }}">
                @if($errors->has('dogum_tarihi'))
                    <em class="invalid-feedback">
                        {{ $errors->first('dogum_tarihi') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.hastalar.fields.dogum_tarihi_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('telefon_ev') ? 'has-error' : '' }}">
                <label for="telefon_ev">{{ trans('cruds.hastalar.fields.telefon_ev') }}</label>
                <input type="number" id="telefon_ev" name="telefon_ev" class="form-control" value="{{ old('telefon_ev', isset($hastalar) ? $hastalar->telefon_ev : '') }}" step="1">
                @if($errors->has('telefon_ev'))
                    <em class="invalid-feedback">
                        {{ $errors->first('telefon_ev') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.hastalar.fields.telefon_ev_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('gsm') ? 'has-error' : '' }}">
                <label for="gsm">{{ trans('cruds.hastalar.fields.gsm') }}</label>
                <input type="number" id="gsm" name="gsm" class="form-control" value="{{ old('gsm', isset($hastalar) ? $hastalar->gsm : '') }}" step="1">
                @if($errors->has('gsm'))
                    <em class="invalid-feedback">
                        {{ $errors->first('gsm') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.hastalar.fields.gsm_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('e_posta') ? 'has-error' : '' }}">
                <label for="e_posta">{{ trans('cruds.hastalar.fields.e_posta') }}</label>
                <input type="text" id="e_posta" name="e_posta" class="form-control" value="{{ old('e_posta', isset($hastalar) ? $hastalar->e_posta : '') }}">
                @if($errors->has('e_posta'))
                    <em class="invalid-feedback">
                        {{ $errors->first('e_posta') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.hastalar.fields.e_posta_helper') }}
                </p>
            </div>

            <div class="col-sm-12"> <h3>Hasta Detay Bilgiler
                    <hr></h3></div>
            <div class="form-group {{ $errors->has('meslek') ? 'has-error' : '' }}">
                <label for="meslek">{{ trans('cruds.hastalar.fields.meslek') }}</label>
                <input type="text" id="meslek" name="meslek" class="form-control" value="{{ old('meslek', isset($hastalar) ? $hastalar->meslek : '') }}">
                @if($errors->has('meslek'))
                    <em class="invalid-feedback">
                        {{ $errors->first('meslek') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.hastalar.fields.meslek_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('dogum_yeri') ? 'has-error' : '' }}">
                <label for="dogum_yeri">{{ trans('cruds.hastalar.fields.dogum_yeri') }}</label>
                <input type="text" id="dogum_yeri" name="dogum_yeri" class="form-control" value="{{ old('dogum_yeri', isset($hastalar) ? $hastalar->dogum_yeri : '') }}">
                @if($errors->has('dogum_yeri'))
                    <em class="invalid-feedback">
                        {{ $errors->first('dogum_yeri') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.hastalar.fields.dogum_yeri_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('kan_grubu') ? 'has-error' : '' }}">
                <label for="kan_grubu">{{ trans('cruds.hastalar.fields.kan_grubu') }}</label>
                <select id="kan_grubu" name="kan_grubu" class="form-control">
                    <option value="" disabled {{ old('kan_grubu', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Hastalar::KAN_GRUBU_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('kan_grubu', $hastalar->kan_grubu) === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('kan_grubu'))
                    <em class="invalid-feedback">
                        {{ $errors->first('kan_grubu') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('referans') ? 'has-error' : '' }}">
                <label for="referans">{{ trans('cruds.hastalar.fields.referans') }}</label>
                <input type="text" id="referans" name="referans" class="form-control" value="{{ old('referans', isset($hastalar) ? $hastalar->referans : '') }}">
                @if($errors->has('referans'))
                    <em class="invalid-feedback">
                        {{ $errors->first('referans') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.hastalar.fields.referans_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('sosyal_guvence') ? 'has-error' : '' }}">
                <label for="sosyal_guvence">{{ trans('cruds.hastalar.fields.sosyal_guvence') }}</label>
                <select id="sosyal_guvence" name="sosyal_guvence" class="form-control">
                    <option value="" disabled {{ old('sosyal_guvence', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Hastalar::SOSYAL_GUVENCE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('sosyal_guvence', $hastalar->sosyal_guvence) === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('sosyal_guvence'))
                    <em class="invalid-feedback">
                        {{ $errors->first('sosyal_guvence') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('ozel_sigorta') ? 'has-error' : '' }}">
                <label for="ozel_sigorta">{{ trans('cruds.hastalar.fields.ozel_sigorta') }}</label>
                <select id="ozel_sigorta" name="ozel_sigorta" class="form-control">
                    <option value="" disabled {{ old('ozel_sigorta', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Hastalar::OZEL_SIGORTA_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('ozel_sigorta', $hastalar->ozel_sigorta) === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('ozel_sigorta'))
                    <em class="invalid-feedback">
                        {{ $errors->first('ozel_sigorta') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('medeni_durum') ? 'has-error' : '' }}">
                <label for="medeni_durum">{{ trans('cruds.hastalar.fields.medeni_durum') }}</label>
                <select id="medeni_durum" name="medeni_durum" class="form-control">
                    <option value="" disabled {{ old('medeni_durum', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Hastalar::MEDENI_DURUM_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('medeni_durum', $hastalar->medeni_durum) === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('medeni_durum'))
                    <em class="invalid-feedback">
                        {{ $errors->first('medeni_durum') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('adres') ? 'has-error' : '' }}">
                <label for="adres">{{ trans('cruds.hastalar.fields.adres') }}</label>
                <textarea id="adres" name="adres" class="form-control ">{{ old('adres', isset($hastalar) ? $hastalar->adres : '') }}</textarea>
                @if($errors->has('adres'))
                    <em class="invalid-feedback">
                        {{ $errors->first('adres') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.hastalar.fields.adres_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('sehir') ? 'has-error' : '' }}">
                <label for="sehir">{{ trans('cruds.hastalar.fields.sehir') }}</label>
                <select id="sehir" name="sehir" class="form-control">
                    <option value="" disabled {{ old('sehir', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Hastalar::SEHIR_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('sehir', $hastalar->sehir) === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('sehir'))
                    <em class="invalid-feedback">
                        {{ $errors->first('sehir') }}
                    </em>
                @endif
            </div>
            <div class="col-sm-12"> <h3>Eşinin Bilgileri
                    <hr></h3></div>
            <div class="form-group {{ $errors->has('esinin_adi_soyadi') ? 'has-error' : '' }}">
                <label for="esinin_adi_soyadi">{{ trans('cruds.hastalar.fields.esinin_adi_soyadi') }}</label>
                <input type="text" id="esinin_adi_soyadi" name="esinin_adi_soyadi" class="form-control" value="{{ old('esinin_adi_soyadi', isset($hastalar) ? $hastalar->esinin_adi_soyadi : '') }}">
                @if($errors->has('esinin_adi_soyadi'))
                    <em class="invalid-feedback">
                        {{ $errors->first('esinin_adi_soyadi') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.hastalar.fields.esinin_adi_soyadi_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('esinin_dogum_tarihi') ? 'has-error' : '' }}">
                <label for="esinin_dogum_tarihi">{{ trans('cruds.hastalar.fields.esinin_dogum_tarihi') }}</label>
                <input type="text" id="esinin_dogum_tarihi" name="esinin_dogum_tarihi" class="form-control" value="{{ old('esinin_dogum_tarihi', isset($hastalar) ? $hastalar->esinin_dogum_tarihi : '') }}">
                @if($errors->has('esinin_dogum_tarihi'))
                    <em class="invalid-feedback">
                        {{ $errors->first('esinin_dogum_tarihi') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.hastalar.fields.esinin_dogum_tarihi_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('esinin_dogum_yeri') ? 'has-error' : '' }}">
                <label for="esinin_dogum_yeri">{{ trans('cruds.hastalar.fields.esinin_dogum_yeri') }}</label>
                <input type="text" id="esinin_dogum_yeri" name="esinin_dogum_yeri" class="form-control" value="{{ old('esinin_dogum_yeri', isset($hastalar) ? $hastalar->esinin_dogum_yeri : '') }}">
                @if($errors->has('esinin_dogum_yeri'))
                    <em class="invalid-feedback">
                        {{ $errors->first('esinin_dogum_yeri') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.hastalar.fields.esinin_dogum_yeri_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('esinin_meslegi') ? 'has-error' : '' }}">
                <label for="esinin_meslegi">{{ trans('cruds.hastalar.fields.esinin_meslegi') }}</label>
                <input type="text" id="esinin_meslegi" name="esinin_meslegi" class="form-control" value="{{ old('esinin_meslegi', isset($hastalar) ? $hastalar->esinin_meslegi : '') }}">
                @if($errors->has('esinin_meslegi'))
                    <em class="invalid-feedback">
                        {{ $errors->first('esinin_meslegi') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.hastalar.fields.esinin_meslegi_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('esinin_kan_grubu') ? 'has-error' : '' }}">
                <label for="esinin_kan_grubu">{{ trans('cruds.hastalar.fields.esinin_kan_grubu') }}</label>
                <select id="esinin_kan_grubu" name="esinin_kan_grubu" class="form-control">
                    <option value="" disabled {{ old('esinin_kan_grubu', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Hastalar::ESININ_KAN_GRUBU_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('esinin_kan_grubu', $hastalar->esinin_kan_grubu) === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('esinin_kan_grubu'))
                    <em class="invalid-feedback">
                        {{ $errors->first('esinin_kan_grubu') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('esinin_sosyal_guvence') ? 'has-error' : '' }}">
                <label for="esinin_sosyal_guvence">{{ trans('cruds.hastalar.fields.esinin_sosyal_guvence') }}</label>
                <select id="esinin_sosyal_guvence" name="esinin_sosyal_guvence" class="form-control">
                    <option value="" disabled {{ old('esinin_sosyal_guvence', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Hastalar::ESININ_SOSYAL_GUVENCE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('esinin_sosyal_guvence', $hastalar->esinin_sosyal_guvence) === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('esinin_sosyal_guvence'))
                    <em class="invalid-feedback">
                        {{ $errors->first('esinin_sosyal_guvence') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('esinin_telefonu') ? 'has-error' : '' }}">
                <label for="esinin_telefonu">{{ trans('cruds.hastalar.fields.esinin_telefonu') }}</label>
                <input type="number" id="esinin_telefonu" name="esinin_telefonu" class="form-control" value="{{ old('esinin_telefonu', isset($hastalar) ? $hastalar->esinin_telefonu : '') }}" step="1">
                @if($errors->has('esinin_telefonu'))
                    <em class="invalid-feedback">
                        {{ $errors->first('esinin_telefonu') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.hastalar.fields.esinin_telefonu_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('esinin_eposta') ? 'has-error' : '' }}">
                <label for="esinin_eposta">{{ trans('cruds.hastalar.fields.esinin_eposta') }}</label>
                <input type="text" id="esinin_eposta" name="esinin_eposta" class="form-control" value="{{ old('esinin_eposta', isset($hastalar) ? $hastalar->esinin_eposta : '') }}">
                @if($errors->has('esinin_eposta'))
                    <em class="invalid-feedback">
                        {{ $errors->first('esinin_eposta') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.hastalar.fields.esinin_eposta_helper') }}
                </p>
            </div>
            <div class="col-sm-12"> <h3>Özgeçmiş Bilgileri
                    <hr></h3></div>
            <div class="form-group {{ $errors->has('virgo') ? 'has-error' : '' }}">
                <label>{{ trans('cruds.hastalar.fields.virgo') }}</label>
                @foreach(App\Hastalar::VIRGO_RADIO as $key => $label)
                    <div>
                        <input id="virgo_{{ $key }}" name="virgo" type="radio" value="{{ $key }}" {{ old('virgo', $hastalar->virgo) === (string)$key ? 'checked' : '' }}>
                        <label for="virgo_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('virgo'))
                    <em class="invalid-feedback">
                        {{ $errors->first('virgo') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('pms') ? 'has-error' : '' }}">
                <label>{{ trans('cruds.hastalar.fields.pms') }}</label>
                @foreach(App\Hastalar::PMS_RADIO as $key => $label)
                    <div>
                        <input id="pms_{{ $key }}" name="pms" type="radio" value="{{ $key }}" {{ old('pms', $hastalar->pms) === (string)$key ? 'checked' : '' }}>
                        <label for="pms_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('pms'))
                    <em class="invalid-feedback">
                        {{ $errors->first('pms') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('dismenore') ? 'has-error' : '' }}">
                <label>{{ trans('cruds.hastalar.fields.dismenore') }}</label>
                @foreach(App\Hastalar::DISMENORE_RADIO as $key => $label)
                    <div>
                        <input id="dismenore_{{ $key }}" name="dismenore" type="radio" value="{{ $key }}" {{ old('dismenore', $hastalar->dismenore) === (string)$key ? 'checked' : '' }}>
                        <label for="dismenore_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('dismenore'))
                    <em class="invalid-feedback">
                        {{ $errors->first('dismenore') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('akraba_evliligi') ? 'has-error' : '' }}">
                <label>{{ trans('cruds.hastalar.fields.akraba_evliligi') }}</label>
                @foreach(App\Hastalar::AKRABA_EVLILIGI_RADIO as $key => $label)
                    <div>
                        <input id="akraba_evliligi_{{ $key }}" name="akraba_evliligi" type="radio" value="{{ $key }}" {{ old('akraba_evliligi', $hastalar->akraba_evliligi) === (string)$key ? 'checked' : '' }}>
                        <label for="akraba_evliligi_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('akraba_evliligi'))
                    <em class="invalid-feedback">
                        {{ $errors->first('akraba_evliligi') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('derecesi') ? 'has-error' : '' }}">
                <label for="derecesi">{{ trans('cruds.hastalar.fields.derecesi') }}</label>
                <input type="text" id="derecesi" name="derecesi" class="form-control" value="{{ old('derecesi', isset($hastalar) ? $hastalar->derecesi : '') }}">
                @if($errors->has('derecesi'))
                    <em class="invalid-feedback">
                        {{ $errors->first('derecesi') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.hastalar.fields.derecesi_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('jinekolojik_anomali') ? 'has-error' : '' }}">
                <label for="jinekolojik_anomali">{{ trans('cruds.hastalar.fields.jinekolojik_anomali') }}</label>
                <input type="text" id="jinekolojik_anomali" name="jinekolojik_anomali" class="form-control" value="{{ old('jinekolojik_anomali', isset($hastalar) ? $hastalar->jinekolojik_anomali : '') }}">
                @if($errors->has('jinekolojik_anomali'))
                    <em class="invalid-feedback">
                        {{ $errors->first('jinekolojik_anomali') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.hastalar.fields.jinekolojik_anomali_helper') }}
                </p>
            </div>
            <div class="col-sm-12"> <h3>Özgeçmiş Siklus Düzeni
                    <hr></h3></div>
            <div class="form-group {{ $errors->has('menars_yasi') ? 'has-error' : '' }}">
                <label for="menars_yasi">{{ trans('cruds.hastalar.fields.menars_yasi') }}</label>
                <input type="number" id="menars_yasi" name="menars_yasi" class="form-control" value="{{ old('menars_yasi', isset($hastalar) ? $hastalar->menars_yasi : '') }}" step="1">
                @if($errors->has('menars_yasi'))
                    <em class="invalid-feedback">
                        {{ $errors->first('menars_yasi') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.hastalar.fields.menars_yasi_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('gun') ? 'has-error' : '' }}">
                <label for="gun">{{ trans('cruds.hastalar.fields.gun') }}</label>
                <input type="number" id="gun" name="gun" class="form-control" value="{{ old('gun', isset($hastalar) ? $hastalar->gun : '') }}" step="1">
                @if($errors->has('gun'))
                    <em class="invalid-feedback">
                        {{ $errors->first('gun') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.hastalar.fields.gun_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('sure') ? 'has-error' : '' }}">
                <label for="sure">{{ trans('cruds.hastalar.fields.sure') }}</label>
                <input type="number" id="sure" name="sure" class="form-control" value="{{ old('sure', isset($hastalar) ? $hastalar->sure : '') }}" step="1">
                @if($errors->has('sure'))
                    <em class="invalid-feedback">
                        {{ $errors->first('sure') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.hastalar.fields.sure_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('miktar') ? 'has-error' : '' }}">
                <label for="miktar">{{ trans('cruds.hastalar.fields.miktar') }}</label>
                <input type="number" id="miktar" name="miktar" class="form-control" value="{{ old('miktar', isset($hastalar) ? $hastalar->miktar : '') }}" step="1">
                @if($errors->has('miktar'))
                    <em class="invalid-feedback">
                        {{ $errors->first('miktar') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.hastalar.fields.miktar_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('gebelik') ? 'has-error' : '' }}">
                <label for="gebelik">{{ trans('cruds.hastalar.fields.gebelik') }}</label>
                <input type="text" id="gebelik" name="gebelik" class="form-control" value="{{ old('gebelik', isset($hastalar) ? $hastalar->gebelik : '') }}">
                @if($errors->has('gebelik'))
                    <em class="invalid-feedback">
                        {{ $errors->first('gebelik') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.hastalar.fields.gebelik_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('dogum') ? 'has-error' : '' }}">
                <label for="dogum">{{ trans('cruds.hastalar.fields.dogum') }}</label>
                <input type="text" id="dogum" name="dogum" class="form-control" value="{{ old('dogum', isset($hastalar) ? $hastalar->dogum : '') }}">
                @if($errors->has('dogum'))
                    <em class="invalid-feedback">
                        {{ $errors->first('dogum') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.hastalar.fields.dogum_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('dusuk') ? 'has-error' : '' }}">
                <label for="dusuk">{{ trans('cruds.hastalar.fields.dusuk') }}</label>
                <input type="text" id="dusuk" name="dusuk" class="form-control" value="{{ old('dusuk', isset($hastalar) ? $hastalar->dusuk : '') }}">
                @if($errors->has('dusuk'))
                    <em class="invalid-feedback">
                        {{ $errors->first('dusuk') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.hastalar.fields.dusuk_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('kurtaj') ? 'has-error' : '' }}">
                <label for="kurtaj">{{ trans('cruds.hastalar.fields.kurtaj') }}</label>
                <input type="text" id="kurtaj" name="kurtaj" class="form-control" value="{{ old('kurtaj', isset($hastalar) ? $hastalar->kurtaj : '') }}">
                @if($errors->has('kurtaj'))
                    <em class="invalid-feedback">
                        {{ $errors->first('kurtaj') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.hastalar.fields.kurtaj_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('yasayan') ? 'has-error' : '' }}">
                <label for="yasayan">{{ trans('cruds.hastalar.fields.yasayan') }}</label>
                <input type="text" id="yasayan" name="yasayan" class="form-control" value="{{ old('yasayan', isset($hastalar) ? $hastalar->yasayan : '') }}">
                @if($errors->has('yasayan'))
                    <em class="invalid-feedback">
                        {{ $errors->first('yasayan') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.hastalar.fields.yasayan_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('dis_gebelik') ? 'has-error' : '' }}">
                <label for="dis_gebelik">{{ trans('cruds.hastalar.fields.dis_gebelik') }}</label>
                <input type="text" id="dis_gebelik" name="dis_gebelik" class="form-control" value="{{ old('dis_gebelik', isset($hastalar) ? $hastalar->dis_gebelik : '') }}">
                @if($errors->has('dis_gebelik'))
                    <em class="invalid-feedback">
                        {{ $errors->first('dis_gebelik') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.hastalar.fields.dis_gebelik_helper') }}
                </p>
            </div>
            <div class="col-sm-12"> <h3>Özgeçmiş Detayları ve Alışkanlıklar
                    <hr></h3></div>
            <div class="form-group {{ $errors->has('hastaliklar') ? 'has-error' : '' }}">
                <label for="hastaliklar">{{ trans('cruds.hastalar.fields.hastaliklar') }}</label>
                <input type="text" id="hastaliklar" name="hastaliklar" class="form-control" value="{{ old('hastaliklar', isset($hastalar) ? $hastalar->hastaliklar : '') }}">
                @if($errors->has('hastaliklar'))
                    <em class="invalid-feedback">
                        {{ $errors->first('hastaliklar') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.hastalar.fields.hastaliklar_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('operasyonlar') ? 'has-error' : '' }}">
                <label for="operasyonlar">{{ trans('cruds.hastalar.fields.operasyonlar') }}</label>
                <input type="text" id="operasyonlar" name="operasyonlar" class="form-control" value="{{ old('operasyonlar', isset($hastalar) ? $hastalar->operasyonlar : '') }}">
                @if($errors->has('operasyonlar'))
                    <em class="invalid-feedback">
                        {{ $errors->first('operasyonlar') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.hastalar.fields.operasyonlar_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('allerji') ? 'has-error' : '' }}">
                <label for="allerji">{{ trans('cruds.hastalar.fields.allerji') }}</label>
                <input type="text" id="allerji" name="allerji" class="form-control" value="{{ old('allerji', isset($hastalar) ? $hastalar->allerji : '') }}">
                @if($errors->has('allerji'))
                    <em class="invalid-feedback">
                        {{ $errors->first('allerji') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.hastalar.fields.allerji_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('alkol') ? 'has-error' : '' }}">
                <label for="alkol">{{ trans('cruds.hastalar.fields.alkol') }}</label>
                <select id="alkol" name="alkol" class="form-control">
                    <option value="" disabled {{ old('alkol', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Hastalar::ALKOL_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('alkol', $hastalar->alkol) === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('alkol'))
                    <em class="invalid-feedback">
                        {{ $errors->first('alkol') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('sigara') ? 'has-error' : '' }}">
                <label for="sigara">{{ trans('cruds.hastalar.fields.sigara') }}</label>
                <select id="sigara" name="sigara" class="form-control">
                    <option value="" disabled {{ old('sigara', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Hastalar::SIGARA_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('sigara', $hastalar->sigara) === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('sigara'))
                    <em class="invalid-feedback">
                        {{ $errors->first('sigara') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('ilaclar') ? 'has-error' : '' }}">
                <label for="ilaclar">{{ trans('cruds.hastalar.fields.ilaclar') }}</label>
                <input type="text" id="ilaclar" name="ilaclar" class="form-control" value="{{ old('ilaclar', isset($hastalar) ? $hastalar->ilaclar : '') }}">
                @if($errors->has('ilaclar'))
                    <em class="invalid-feedback">
                        {{ $errors->first('ilaclar') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.hastalar.fields.ilaclar_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('ozgecmis_ve_soygecmis_notlari') ? 'has-error' : '' }}">
                <label for="ozgecmis_ve_soygecmis_notlari">{{ trans('cruds.hastalar.fields.ozgecmis_ve_soygecmis_notlari') }}</label>
                <textarea id="ozgecmis_ve_soygecmis_notlari" name="ozgecmis_ve_soygecmis_notlari" class="form-control ">{{ old('ozgecmis_ve_soygecmis_notlari', isset($hastalar) ? $hastalar->ozgecmis_ve_soygecmis_notlari : '') }}</textarea>
                @if($errors->has('ozgecmis_ve_soygecmis_notlari'))
                    <em class="invalid-feedback">
                        {{ $errors->first('ozgecmis_ve_soygecmis_notlari') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.hastalar.fields.ozgecmis_ve_soygecmis_notlari_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('uyarilar') ? 'has-error' : '' }}">
                <label for="uyarilar">{{ trans('cruds.hastalar.fields.uyarilar') }}</label>
                <textarea id="uyarilar" name="uyarilar" class="form-control ">{{ old('uyarilar', isset($hastalar) ? $hastalar->uyarilar : '') }}</textarea>
                @if($errors->has('uyarilar'))
                    <em class="invalid-feedback">
                        {{ $errors->first('uyarilar') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.hastalar.fields.uyarilar_helper') }}
                </p>
            </div>

            <div class="col-sm-12"> <h3>Eşinin Özgeçmiş Detayları ve Alışkanlıkları
                    <hr></h3></div>
            <div class="form-group {{ $errors->has('esinin_hastaliklar') ? 'has-error' : '' }}">
                <label for="esinin_hastaliklar">{{ trans('cruds.hastalar.fields.esinin_hastaliklar') }}</label>
                <input type="text" id="esinin_hastaliklar" name="esinin_hastaliklar" class="form-control" value="{{ old('esinin_hastaliklar', isset($hastalar) ? $hastalar->esinin_hastaliklar : '') }}">
                @if($errors->has('esinin_hastaliklar'))
                    <em class="invalid-feedback">
                        {{ $errors->first('esinin_hastaliklar') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.hastalar.fields.esinin_hastaliklar_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('esinin_operasyonlar') ? 'has-error' : '' }}">
                <label for="esinin_operasyonlar">{{ trans('cruds.hastalar.fields.esinin_operasyonlar') }}</label>
                <input type="text" id="esinin_operasyonlar" name="esinin_operasyonlar" class="form-control" value="{{ old('esinin_operasyonlar', isset($hastalar) ? $hastalar->esinin_operasyonlar : '') }}">
                @if($errors->has('esinin_operasyonlar'))
                    <em class="invalid-feedback">
                        {{ $errors->first('esinin_operasyonlar') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.hastalar.fields.esinin_operasyonlar_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('esinin_allerjileri') ? 'has-error' : '' }}">
                <label for="esinin_allerjileri">{{ trans('cruds.hastalar.fields.esinin_allerjileri') }}</label>
                <input type="text" id="esinin_allerjileri" name="esinin_allerjileri" class="form-control" value="{{ old('esinin_allerjileri', isset($hastalar) ? $hastalar->esinin_allerjileri : '') }}">
                @if($errors->has('esinin_allerjileri'))
                    <em class="invalid-feedback">
                        {{ $errors->first('esinin_allerjileri') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.hastalar.fields.esinin_allerjileri_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('esinin_alkol_kullanimi') ? 'has-error' : '' }}">
                <label for="esinin_alkol_kullanimi">{{ trans('cruds.hastalar.fields.esinin_alkol_kullanimi') }}</label>
                <select id="esinin_alkol_kullanimi" name="esinin_alkol_kullanimi" class="form-control">
                    <option value="" disabled {{ old('esinin_alkol_kullanimi', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Hastalar::ESININ_ALKOL_KULLANIMI_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('esinin_alkol_kullanimi', $hastalar->esinin_alkol_kullanimi) === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('esinin_alkol_kullanimi'))
                    <em class="invalid-feedback">
                        {{ $errors->first('esinin_alkol_kullanimi') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('esinin_sigara_kullanimi') ? 'has-error' : '' }}">
                <label for="esinin_sigara_kullanimi">{{ trans('cruds.hastalar.fields.esinin_sigara_kullanimi') }}</label>
                <select id="esinin_sigara_kullanimi" name="esinin_sigara_kullanimi" class="form-control">
                    <option value="" disabled {{ old('esinin_sigara_kullanimi', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Hastalar::ESININ_SIGARA_KULLANIMI_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('esinin_sigara_kullanimi', $hastalar->esinin_sigara_kullanimi) === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('esinin_sigara_kullanimi'))
                    <em class="invalid-feedback">
                        {{ $errors->first('esinin_sigara_kullanimi') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('esinin_ozgecmis_ve_soygecmis_notlari') ? 'has-error' : '' }}">
                <label for="esinin_ozgecmis_ve_soygecmis_notlari">{{ trans('cruds.hastalar.fields.esinin_ozgecmis_ve_soygecmis_notlari') }}</label>
                <textarea id="esinin_ozgecmis_ve_soygecmis_notlari" name="esinin_ozgecmis_ve_soygecmis_notlari" class="form-control ">{{ old('esinin_ozgecmis_ve_soygecmis_notlari', isset($hastalar) ? $hastalar->esinin_ozgecmis_ve_soygecmis_notlari : '') }}</textarea>
                @if($errors->has('esinin_ozgecmis_ve_soygecmis_notlari'))
                    <em class="invalid-feedback">
                        {{ $errors->first('esinin_ozgecmis_ve_soygecmis_notlari') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.hastalar.fields.esinin_ozgecmis_ve_soygecmis_notlari_helper') }}
                </p>
            </div>

            <div class="col-sm-12"> <h3>Hasta Faturalama Bilgileri
                    <hr></h3></div>
            <div class="form-group {{ $errors->has('unvan') ? 'has-error' : '' }}">
                <label for="unvan">{{ trans('cruds.hastalar.fields.unvan') }}</label>
                <input type="text" id="unvan" name="unvan" class="form-control" value="{{ old('unvan', isset($hastalar) ? $hastalar->unvan : '') }}">
                @if($errors->has('unvan'))
                    <em class="invalid-feedback">
                        {{ $errors->first('unvan') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.hastalar.fields.unvan_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('vergi_dairesi') ? 'has-error' : '' }}">
                <label for="vergi_dairesi">{{ trans('cruds.hastalar.fields.vergi_dairesi') }}</label>
                <input type="text" id="vergi_dairesi" name="vergi_dairesi" class="form-control" value="{{ old('vergi_dairesi', isset($hastalar) ? $hastalar->vergi_dairesi : '') }}">
                @if($errors->has('vergi_dairesi'))
                    <em class="invalid-feedback">
                        {{ $errors->first('vergi_dairesi') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.hastalar.fields.vergi_dairesi_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('vergi_no') ? 'has-error' : '' }}">
                <label for="vergi_no">{{ trans('cruds.hastalar.fields.vergi_no') }}</label>
                <input type="text" id="vergi_no" name="vergi_no" class="form-control" value="{{ old('vergi_no', isset($hastalar) ? $hastalar->vergi_no : '') }}">
                @if($errors->has('vergi_no'))
                    <em class="invalid-feedback">
                        {{ $errors->first('vergi_no') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.hastalar.fields.vergi_no_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('fatura_adresi') ? 'has-error' : '' }}">
                <label for="fatura_adresi">{{ trans('cruds.hastalar.fields.fatura_adresi') }}</label>
                <textarea id="fatura_adresi" name="fatura_adresi" class="form-control ">{{ old('fatura_adresi', isset($hastalar) ? $hastalar->fatura_adresi : '') }}</textarea>
                @if($errors->has('fatura_adresi'))
                    <em class="invalid-feedback">
                        {{ $errors->first('fatura_adresi') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.hastalar.fields.fatura_adresi_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('hasta_genel') ? 'has-error' : '' }}">
                <label for="hasta_genel">{{ trans('cruds.hastalar.fields.hasta_genel') }}</label>
                <textarea id="hasta_genel" name="hasta_genel" class="form-control ckeditor">{{ old('hasta_genel', isset($hastalar) ? $hastalar->hasta_genel : '') }}</textarea>
                @if($errors->has('hasta_genel'))
                    <em class="invalid-feedback">
                        {{ $errors->first('hasta_genel') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.hastalar.fields.hasta_genel_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('hasta_cocuk') ? 'has-error' : '' }}">
                <label for="hasta_cocuk">{{ trans('cruds.hastalar.fields.hasta_cocuk') }}</label>
                <textarea id="hasta_cocuk" name="hasta_cocuk" class="form-control ckeditor">{{ old('hasta_cocuk', isset($hastalar) ? $hastalar->hasta_cocuk : '') }}</textarea>
                @if($errors->has('hasta_cocuk'))
                    <em class="invalid-feedback">
                        {{ $errors->first('hasta_cocuk') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.hastalar.fields.hasta_cocuk_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection
