@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.dokumanlar.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.dokumanlars.update", [$dokumanlar->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('dosya_adi') ? 'has-error' : '' }}">
                <label for="dosya_adi">{{ trans('cruds.dokumanlar.fields.dosya_adi') }}</label>
                <input type="text" id="dosya_adi" name="dosya_adi" class="form-control" value="{{ old('dosya_adi', isset($dokumanlar) ? $dokumanlar->dosya_adi : '') }}">
                @if($errors->has('dosya_adi'))
                    <em class="invalid-feedback">
                        {{ $errors->first('dosya_adi') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.dokumanlar.fields.dosya_adi_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('tarih') ? 'has-error' : '' }}">
                <label for="tarih">{{ trans('cruds.dokumanlar.fields.tarih') }}</label>
                <input type="text" id="tarih" name="tarih" class="form-control date" value="{{ old('tarih', isset($dokumanlar) ? $dokumanlar->tarih : '') }}">
                @if($errors->has('tarih'))
                    <em class="invalid-feedback">
                        {{ $errors->first('tarih') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.dokumanlar.fields.tarih_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('dosya') ? 'has-error' : '' }}">
                <label for="dosya">{{ trans('cruds.dokumanlar.fields.dosya') }}</label>
                <div class="needsclick dropzone" id="dosya-dropzone">

                </div>
                @if($errors->has('dosya'))
                    <em class="invalid-feedback">
                        {{ $errors->first('dosya') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.dokumanlar.fields.dosya_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('dosya_notu') ? 'has-error' : '' }}">
                <label for="dosya_notu">{{ trans('cruds.dokumanlar.fields.dosya_notu') }}</label>
                <textarea id="dosya_notu" name="dosya_notu" class="form-control ">{{ old('dosya_notu', isset($dokumanlar) ? $dokumanlar->dosya_notu : '') }}</textarea>
                @if($errors->has('dosya_notu'))
                    <em class="invalid-feedback">
                        {{ $errors->first('dosya_notu') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.dokumanlar.fields.dosya_notu_helper') }}
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
    var uploadedDosyaMap = {}
Dropzone.options.dosyaDropzone = {
    url: '{{ route('admin.dokumanlars.storeMedia') }}',
    maxFilesize: 100, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 100
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="dosya[]" value="' + response.name + '">')
      uploadedDosyaMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedDosyaMap[file.name]
      }
      $('form').find('input[name="dosya[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($dokumanlar) && $dokumanlar->dosya)
          var files =
            {!! json_encode($dokumanlar->dosya) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="dosya[]" value="' + file.file_name + '">')
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