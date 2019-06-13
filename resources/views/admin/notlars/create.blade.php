@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.notlar.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.notlars.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group d-none {{ $errors->has('tarih') ? 'has-error' : '' }}">
                <label for="tarih">{{ trans('cruds.notlar.fields.tarih') }}</label>
                <input type="text" id="tarih" name="tarih" class="form-control date" value="{{ old('tarih', isset($notlar) ? $notlar->tarih : '') }}">
                @if($errors->has('tarih'))
                    <em class="invalid-feedback">
                        {{ $errors->first('tarih') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.notlar.fields.tarih_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('not') ? 'has-error' : '' }}">
                <label for="not">{{ trans('cruds.notlar.fields.not') }}</label>
                <input type="textarea" id="not" name="not" class="form-control" value="{{ old('not', isset($notlar) ? $notlar->not : '') }}">
                @if($errors->has('not'))
                    <em class="invalid-feedback">
                        {{ $errors->first('not') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.notlar.fields.not_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('takip_id') ? 'has-error' : '' }}">
                <label for="takip">{{ trans('cruds.notlar.fields.takip') }}*</label>
                <select name="takip_id" id="takip" class="form-control select2" required>
                    @foreach($takips as $id => $takip)
                        <option value="{{ $id }}" {{ (isset($notlar) && $notlar->takip ? $notlar->takip->id : old('takip_id')) == $id ? 'selected' : '' }}>{{ $takip }}</option>
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
