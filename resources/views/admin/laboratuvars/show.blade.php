@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.laboratuvar.title') }}
    </div>

    <div class="card-body">
        <div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.laboratuvar.fields.tetkik_adi') }}
                        </th>
                        <td>
                            {{ $laboratuvar->tetkik_adi }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.laboratuvar.fields.tetkik_detaylari') }}
                        </th>
                        <td>
                            {!! $laboratuvar->tetkik_detaylari !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.laboratuvar.fields.takip') }}
                        </th>
                        <td>
                            {{ $laboratuvar->takip->takip_tipi ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.laboratuvar.fields.laboratuvar_dosya') }}
                        </th>
                        <td>
                            {{ $laboratuvar->laboratuvar_dosya }}
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