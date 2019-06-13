@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.hastaKategorileri.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.hasta-kategorileris.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('hastak') ? 'has-error' : '' }}">
                <label for="hastak">{{ trans('cruds.hastaKategorileri.fields.hastak') }}</label>
                <input type="text" id="hastak" name="hastak" class="form-control" value="{{ old('hastak', isset($hastaKategorileri) ? $hastaKategorileri->hastak : '') }}">
                @if($errors->has('hastak'))
                    <em class="invalid-feedback">
                        {{ $errors->first('hastak') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.hastaKategorileri.fields.hastak_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection