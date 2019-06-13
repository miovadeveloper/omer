@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.notlar.title') }}
    </div>

    <div class="card-body">
        <div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.notlar.fields.tarih') }}
                        </th>
                        <td>
                            {{ $notlar->tarih }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.notlar.fields.not') }}
                        </th>
                        <td>
                            {{ $notlar->not }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.notlar.fields.takip') }}
                        </th>

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
