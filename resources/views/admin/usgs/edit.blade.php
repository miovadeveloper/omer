@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.usg.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.usgs.update", [$usg->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('takip_id') ? 'has-error' : '' }}">
                <label for="takip">{{ trans('cruds.usg.fields.takip') }}</label>
                <select name="takip_id" id="takip" class="form-control select2">
                    @foreach($takips as $id => $takip)
                        <option value="{{ $id }}" {{ (isset($usg) && $usg->takip ? $usg->takip->id : old('takip_id')) == $id ? 'selected' : '' }}>{{ $takip }}</option>
                    @endforeach
                </select>
                @if($errors->has('takip_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('takip_id') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('tarih') ? 'has-error' : '' }}">
                <label for="tarih">{{ trans('cruds.usg.fields.tarih') }}</label>
                <input type="text" id="tarih" name="tarih" class="form-control date" value="{{ old('tarih', isset($usg) ? $usg->tarih : '') }}">
                @if($errors->has('tarih'))
                    <em class="invalid-feedback">
                        {{ $errors->first('tarih') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.usg.fields.tarih_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('sag_over') ? 'has-error' : '' }}">
                <label for="sag_over">{{ trans('cruds.usg.fields.sag_over') }}</label>
                <input type="text" id="sag_over" name="sag_over" class="form-control" value="{{ old('sag_over', isset($usg) ? $usg->sag_over : '') }}">
                @if($errors->has('sag_over'))
                    <em class="invalid-feedback">
                        {{ $errors->first('sag_over') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.usg.fields.sag_over_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('sol_over') ? 'has-error' : '' }}">
                <label for="sol_over">{{ trans('cruds.usg.fields.sol_over') }}</label>
                <input type="text" id="sol_over" name="sol_over" class="form-control" value="{{ old('sol_over', isset($usg) ? $usg->sol_over : '') }}">
                @if($errors->has('sol_over'))
                    <em class="invalid-feedback">
                        {{ $errors->first('sol_over') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.usg.fields.sol_over_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('uterus') ? 'has-error' : '' }}">
                <label for="uterus">{{ trans('cruds.usg.fields.uterus') }}</label>
                <input type="text" id="uterus" name="uterus" class="form-control" value="{{ old('uterus', isset($usg) ? $usg->uterus : '') }}">
                @if($errors->has('uterus'))
                    <em class="invalid-feedback">
                        {{ $errors->first('uterus') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.usg.fields.uterus_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('usg_tipi') ? 'has-error' : '' }}">
                <label>{{ trans('cruds.usg.fields.usg_tipi') }}</label>
                @foreach(App\Usg::USG_TIPI_RADIO as $key => $label)
                    <div>
                        <input id="usg_tipi_{{ $key }}" name="usg_tipi" type="radio" value="{{ $key }}" {{ old('usg_tipi', $usg->usg_tipi) === (string)$key ? 'checked' : '' }}>
                        <label for="usg_tipi_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('usg_tipi'))
                    <em class="invalid-feedback">
                        {{ $errors->first('usg_tipi') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('not') ? 'has-error' : '' }}">
                <label for="not">{{ trans('cruds.usg.fields.not') }}</label>
                <textarea id="not" name="not" class="form-control ">{{ old('not', isset($usg) ? $usg->not : '') }}</textarea>
                @if($errors->has('not'))
                    <em class="invalid-feedback">
                        {{ $errors->first('not') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.usg.fields.not_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection