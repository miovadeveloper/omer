@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.usg.title') }}
    </div>

    <div class="card-body">
        <div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.usg.fields.takip') }}
                        </th>
                        <td>
                            {{ $usg->takip->takip_tipi ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.usg.fields.tarih') }}
                        </th>
                        <td>
                            {{ $usg->tarih }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.usg.fields.sag_over') }}
                        </th>
                        <td>
                            {{ $usg->sag_over }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.usg.fields.sol_over') }}
                        </th>
                        <td>
                            {{ $usg->sol_over }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.usg.fields.uterus') }}
                        </th>
                        <td>
                            {{ $usg->uterus }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.usg.fields.usg_tipi') }}
                        </th>
                        <td>
                            {{ $usg->usg_tipi }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.usg.fields.not') }}
                        </th>
                        <td>
                            {!! $usg->not !!}
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
