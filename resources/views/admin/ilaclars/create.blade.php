@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.ilaclar.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.ilaclars.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('ilac_adi') ? 'has-error' : '' }}">
                <label for="ilac_adi">{{ trans('cruds.ilaclar.fields.ilac_adi') }}</label>
                <input type="text" id="ilac_adi" name="ilac_adi" class="form-control" value="{{ old('ilac_adi', isset($ilaclar) ? $ilaclar->ilac_adi : '') }}">
                @if($errors->has('ilac_adi'))
                    <em class="invalid-feedback">
                        {{ $errors->first('ilac_adi') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.ilaclar.fields.ilac_adi_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection