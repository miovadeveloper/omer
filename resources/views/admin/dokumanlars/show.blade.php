@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.dokumanlar.title') }}
    </div>

    <div class="card-body">
        <div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.dokumanlar.fields.takip') }}
                        </th>
                        <td>
                            {{ $dokumanlar->takip->takip_tipi ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dokumanlar.fields.dosya_adi') }}
                        </th>
                        <td>
                            {{ $dokumanlar->dosya_adi }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dokumanlar.fields.tarih') }}
                        </th>
                        <td>
                            {{ $dokumanlar->tarih }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dokumanlar.fields.dosya') }}
                        </th>
                        <td>
                            {{ $dokumanlar->dosya }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dokumanlar.fields.dosya_notu') }}
                        </th>
                        <td>
                            {!! $dokumanlar->dosya_notu !!}
                        </td>
                    </tr>
                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                Back
            </a>
        </div>
    </div>
</div>
@endsection