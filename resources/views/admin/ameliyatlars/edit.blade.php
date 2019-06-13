@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.ameliyatlar.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.ameliyatlars.update", [$ameliyatlar->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('tarih') ? 'has-error' : '' }}">
                <label for="tarih">{{ trans('cruds.ameliyatlar.fields.tarih') }}</label>
                <input type="text" id="tarih" name="tarih" class="form-control date" value="{{ old('tarih', isset($ameliyatlar) ? $ameliyatlar->tarih : '') }}">
                @if($errors->has('tarih'))
                    <em class="invalid-feedback">
                        {{ $errors->first('tarih') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.ameliyatlar.fields.tarih_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('ameliyat_adi') ? 'has-error' : '' }}">
                <label for="ameliyat_adi">{{ trans('cruds.ameliyatlar.fields.ameliyat_adi') }}</label>
                <input type="text" id="ameliyat_adi" name="ameliyat_adi" class="form-control" value="{{ old('ameliyat_adi', isset($ameliyatlar) ? $ameliyatlar->ameliyat_adi : '') }}">
                @if($errors->has('ameliyat_adi'))
                    <em class="invalid-feedback">
                        {{ $errors->first('ameliyat_adi') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.ameliyatlar.fields.ameliyat_adi_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('ameliyat_aciklama') ? 'has-error' : '' }}">
                <label for="ameliyat_aciklama">{{ trans('cruds.ameliyatlar.fields.ameliyat_aciklama') }}</label>
                <textarea id="ameliyat_aciklama" name="ameliyat_aciklama" class="form-control ">{{ old('ameliyat_aciklama', isset($ameliyatlar) ? $ameliyatlar->ameliyat_aciklama : '') }}</textarea>
                @if($errors->has('ameliyat_aciklama'))
                    <em class="invalid-feedback">
                        {{ $errors->first('ameliyat_aciklama') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.ameliyatlar.fields.ameliyat_aciklama_helper') }}
                </p>
            </div>
            <div class="form-group d-none {{ $errors->has('takip_id') ? 'has-error' : '' }}">
                <label for="takip">{{ trans('cruds.ameliyatlar.fields.takip') }}</label>
                <select name="takip_id" id="takip" class="form-control select2">
                    @foreach($takips as $id => $takip)
                        <option value="{{ $id }}" {{ (isset($ameliyatlar) && $ameliyatlar->takip ? $ameliyatlar->takip->id : old('takip_id')) == $id ? 'selected' : '' }}>{{ $takip }}</option>
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
