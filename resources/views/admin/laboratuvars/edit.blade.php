@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.laboratuvar.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.laboratuvars.update", [$laboratuvar->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('tetkik_adi') ? 'has-error' : '' }}">
                <label for="tetkik_adi">{{ trans('cruds.laboratuvar.fields.tetkik_adi') }}</label>
                <input type="text" id="tetkik_adi" name="tetkik_adi" class="form-control" value="{{ old('tetkik_adi', isset($laboratuvar) ? $laboratuvar->tetkik_adi : '') }}">
                @if($errors->has('tetkik_adi'))
                    <em class="invalid-feedback">
                        {{ $errors->first('tetkik_adi') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.laboratuvar.fields.tetkik_adi_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('tetkik_detaylari') ? 'has-error' : '' }}">
                <label for="tetkik_detaylari">{{ trans('cruds.laboratuvar.fields.tetkik_detaylari') }}</label>
                <textarea id="tetkik_detaylari" name="tetkik_detaylari" class="form-control ">{{ old('tetkik_detaylari', isset($laboratuvar) ? $laboratuvar->tetkik_detaylari : '') }}</textarea>
                @if($errors->has('tetkik_detaylari'))
                    <em class="invalid-feedback">
                        {{ $errors->first('tetkik_detaylari') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.laboratuvar.fields.tetkik_detaylari_helper') }}
                </p>
            </div>
            <div class="form-group d-none{{ $errors->has('takip_id') ? 'has-error' : '' }}">
                <label for="takip">{{ trans('cruds.laboratuvar.fields.takip') }}</label>
                <select name="takip_id" id="takip" class="form-control select2">
                    @foreach($takips as $id => $takip)
                        <option value="{{ $id }}" {{ (isset($laboratuvar) && $laboratuvar->takip ? $laboratuvar->takip->id : old('takip_id')) == $id ? 'selected' : '' }}>{{ $takip }}</option>
                    @endforeach
                </select>
                @if($errors->has('takip_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('takip_id') }}
                    </em>
                @endif
            </div>
            <div class="form-group d-none {{ $errors->has('laboratuvar_dosya') ? 'has-error' : '' }}">
                <label for="laboratuvar_dosya">{{ trans('cruds.laboratuvar.fields.laboratuvar_dosya') }}</label>
                <div class="needsclick dropzone" id="laboratuvar_dosya-dropzone">

                </div>
                @if($errors->has('laboratuvar_dosya'))
                    <em class="invalid-feedback">
                        {{ $errors->first('laboratuvar_dosya') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.laboratuvar.fields.laboratuvar_dosya_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    var uploadedLaboratuvarDosyaMap = {}
Dropzone.options.laboratuvarDosyaDropzone = {
    url: '{{ route('admin.laboratuvars.storeMedia') }}',
    maxFilesize: 100, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 100
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="laboratuvar_dosya[]" value="' + response.name + '">')
      uploadedLaboratuvarDosyaMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedLaboratuvarDosyaMap[file.name]
      }
      $('form').find('input[name="laboratuvar_dosya[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($laboratuvar) && $laboratuvar->laboratuvar_dosya)
          var files =
            {!! json_encode($laboratuvar->laboratuvar_dosya) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="laboratuvar_dosya[]" value="' + file.file_name + '">')
            }
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
@stop
