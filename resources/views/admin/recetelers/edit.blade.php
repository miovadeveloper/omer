@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.receteler.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.recetelers.update", [$receteler->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group d-none {{ $errors->has('takip_id') ? 'has-error' : '' }}">
                <label for="takip">{{ trans('cruds.receteler.fields.takip') }}</label>
                <select name="takip_id" id="takip" class="form-control select2">
                    @foreach($takips as $id => $takip)
                        <option value="{{ $id }}" {{ (isset($receteler) && $receteler->takip ? $receteler->takip->id : old('takip_id')) == $id ? 'selected' : '' }}>{{ $takip }}</option>
                    @endforeach
                </select>
                @if($errors->has('takip_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('takip_id') }}
                    </em>
                @endif
            </div>
            <div class="form-group d-none {{ $errors->has('hasta_id') ? 'has-error' : '' }}">
                <label for="hasta">{{ trans('cruds.receteler.fields.hasta') }}</label>
                <select name="hasta_id" id="hasta" class="form-control select2">
                    @foreach($hastas as $id => $hasta)
                        <option value="{{ $id }}" {{ (isset($receteler) && $receteler->hasta ? $receteler->hasta->id : old('hasta_id')) == $id ? 'selected' : '' }}>{{ $hasta }}</option>
                    @endforeach
                </select>
                @if($errors->has('hasta_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('hasta_id') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('receteadi') ? 'has-error' : '' }}">
                <label for="receteadi">{{ trans('cruds.receteler.fields.receteadi') }}</label>
                <input type="text" id="receteadi" name="receteadi" class="form-control" value="{{ old('receteadi', isset($receteler) ? $receteler->receteadi : '') }}">
                @if($errors->has('receteadi'))
                    <em class="invalid-feedback">
                        {{ $errors->first('receteadi') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.receteler.fields.receteadi_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="İlaç ekle">
            </div>
        </form>
    </div>
</div>
@endsection
