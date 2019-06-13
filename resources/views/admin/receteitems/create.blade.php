@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.receteitem.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.receteitems.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('receteadi_id') ? 'has-error' : '' }}">
                <label for="receteadi">{{ trans('cruds.receteitem.fields.receteadi') }}</label>
                <select name="receteadi_id" id="receteadi" class="form-control select2">
                    @foreach($receteadis as $id => $receteadi)
                        <option value="{{ $id }}" {{ (isset($receteitem) && $receteitem->receteadi ? $receteitem->receteadi->id : old('receteadi_id')) == $id ? 'selected' : '' }}>{{ $receteadi }}</option>
                    @endforeach
                </select>
                @if($errors->has('receteadi_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('receteadi_id') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('ilac_id') ? 'has-error' : '' }}">
                <label for="ilac">{{ trans('cruds.receteitem.fields.ilac') }}</label>
                <select name="ilac_id" id="ilac" class="form-control select2">
                    @foreach($ilacs as $id => $ilac)
                        <option value="{{ $id }}" {{ (isset($receteitem) && $receteitem->ilac ? $receteitem->ilac->id : old('ilac_id')) == $id ? 'selected' : '' }}>{{ $ilac }}</option>
                    @endforeach
                </select>
                @if($errors->has('ilac_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('ilac_id') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('kutuadeti') ? 'has-error' : '' }}">
                <label for="kutuadeti">{{ trans('cruds.receteitem.fields.kutuadeti') }}</label>
                <select id="kutuadeti" name="kutuadeti" class="form-control">
                    <option value="" disabled {{ old('kutuadeti', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Receteitem::KUTUADETI_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('kutuadeti', null) === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('kutuadeti'))
                    <em class="invalid-feedback">
                        {{ $errors->first('kutuadeti') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('dbir') ? 'has-error' : '' }}">
                <label for="dbir">{{ trans('cruds.receteitem.fields.dbir') }}</label>
                <input type="text" id="dbir" name="dbir" class="form-control" value="{{ old('dbir', isset($receteitem) ? $receteitem->dbir : '') }}">
                @if($errors->has('dbir'))
                    <em class="invalid-feedback">
                        {{ $errors->first('dbir') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.receteitem.fields.dbir_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('diki') ? 'has-error' : '' }}">
                <label for="diki">{{ trans('cruds.receteitem.fields.diki') }}</label>
                <input type="text" id="diki" name="diki" class="form-control" value="{{ old('diki', isset($receteitem) ? $receteitem->diki : '') }}">
                @if($errors->has('diki'))
                    <em class="invalid-feedback">
                        {{ $errors->first('diki') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.receteitem.fields.diki_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('zaman') ? 'has-error' : '' }}">
                <label for="zaman">{{ trans('cruds.receteitem.fields.zaman') }}</label>
                <select id="zaman" name="zaman" class="form-control">
                    <option value="" disabled {{ old('zaman', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Receteitem::ZAMAN_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('zaman', null) === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('zaman'))
                    <em class="invalid-feedback">
                        {{ $errors->first('zaman') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('kullanim') ? 'has-error' : '' }}">
                <label for="kullanim">{{ trans('cruds.receteitem.fields.kullanim') }}</label>
                <select id="kullanim" name="kullanim" class="form-control">
                    <option value="" disabled {{ old('kullanim', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Receteitem::KULLANIM_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('kullanim', null) === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('kullanim'))
                    <em class="invalid-feedback">
                        {{ $errors->first('kullanim') }}
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