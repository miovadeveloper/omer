@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.takipler.title_singular') }}
    </div>

    <div class="card-body">
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
            <div class="form-group {{ $errors->has('baslangic') ? 'has-error' : '' }}">
                <label for="baslangic">{{ trans('cruds.takipler.fields.baslangic') }}</label>
                <input type="text" id="baslangic" name="baslangic" class="form-control date" value="{{ old('baslangic', isset($takipler) ? $takipler->baslangic : '') }}">
                @if($errors->has('baslangic'))
                    <em class="invalid-feedback">
                        {{ $errors->first('baslangic') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.takipler.fields.baslangic_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('bitis_tarihi') ? 'has-error' : '' }}">
                <label for="bitis_tarihi">{{ trans('cruds.takipler.fields.bitis_tarihi') }}</label>
                <input type="text" id="bitis_tarihi" name="bitis_tarihi" class="form-control date" value="{{ old('bitis_tarihi', isset($takipler) ? $takipler->bitis_tarihi : '') }}">
                @if($errors->has('bitis_tarihi'))
                    <em class="invalid-feedback">
                        {{ $errors->first('bitis_tarihi') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.takipler.fields.bitis_tarihi_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('sonuc_notu') ? 'has-error' : '' }}">
                <label for="sonuc_notu">{{ trans('cruds.takipler.fields.sonuc_notu') }}</label>
                <textarea id="sonuc_notu" name="sonuc_notu" class="form-control ">{{ old('sonuc_notu', isset($takipler) ? $takipler->sonuc_notu : '') }}</textarea>
                @if($errors->has('sonuc_notu'))
                    <em class="invalid-feedback">
                        {{ $errors->first('sonuc_notu') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.takipler.fields.sonuc_notu_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('oneri') ? 'has-error' : '' }}">
                <label for="oneri">{{ trans('cruds.takipler.fields.oneri') }}</label>
                <textarea id="oneri" name="oneri" class="form-control ">{{ old('oneri', isset($takipler) ? $takipler->oneri : '') }}</textarea>
                @if($errors->has('oneri'))
                    <em class="invalid-feedback">
                        {{ $errors->first('oneri') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.takipler.fields.oneri_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('durum') ? 'has-error' : '' }}">
                <label for="durum">{{ trans('cruds.takipler.fields.durum') }}</label>
                <input name="durum" type="hidden" value="0">
                <input value="1" type="checkbox" id="durum" name="durum" {{ (isset($takipler) && $takipler->durum) || old('durum', 0) === 1 ? 'checked' : '' }}>
                @if($errors->has('durum'))
                    <em class="invalid-feedback">
                        {{ $errors->first('durum') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.takipler.fields.durum_helper') }}
                </p>
            </div>
            <div class="form-group d-none  {{ $errors->has('tarih') ? 'has-error' : '' }}">
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
            <div class="form-group d-none  {{ $errors->has('kilo_kg') ? 'has-error' : '' }}">
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
            <div class="form-group d-none  {{ $errors->has('vki') ? 'has-error' : '' }}">
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
            <div class="form-group d-none {{ $errors->has('sat') ? 'has-error' : '' }}">
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
            <div class="form-group d-none {{ $errors->has('boy_cm') ? 'has-error' : '' }}">
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
            <div class="form-group d-none {{ $errors->has('oyku') ? 'has-error' : '' }}">
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
            <div class="form-group d-none {{ $errors->has('sat_emin') ? 'has-error' : '' }}">
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
            <div class="form-group d-none {{ $errors->has('geb_haft_duzeltildi') ? 'has-error' : '' }}">
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
            <div class="form-group d-none {{ $errors->has('bir_trimaster') ? 'has-error' : '' }}">
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
            <div class="form-group d-none {{ $errors->has('genetik_inceleme') ? 'has-error' : '' }}">
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
            <div class="form-group d-none {{ $errors->has('fetal_dna') ? 'has-error' : '' }}">
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
            <div class="form-group d-none {{ $errors->has('fat') ? 'has-error' : '' }}">
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
            <div class="form-group d-none  {{ $errors->has('iki_trimaster') ? 'has-error' : '' }}">
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
            <div class="form-group d-none {{ $errors->has('g_t_t') ? 'has-error' : '' }}">
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
</div>
@endsection
