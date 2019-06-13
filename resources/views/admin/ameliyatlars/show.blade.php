@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.ameliyatlar.title') }}
    </div>

    <div class="card-body">
        <div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.ameliyatlar.fields.tarih') }}
                        </th>
                        <td>
                            {{ $ameliyatlar->tarih }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ameliyatlar.fields.ameliyat_adi') }}
                        </th>
                        <td>
                            {{ $ameliyatlar->ameliyat_adi }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ameliyatlar.fields.ameliyat_aciklama') }}
                        </th>
                        <td>
                            {!! $ameliyatlar->ameliyat_aciklama !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ameliyatlar.fields.takip') }}
                        </th>
                        <td>
                            {{ $ameliyatlar->takip->takip_tipi ?? '' }}
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