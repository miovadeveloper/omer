@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                {{-- Widget - latest entries --}}
                <div class="{{ $settings1['column_class'] }}">
                    <h3>{{ $settings1['chart_title'] }}</h3>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                @foreach($settings1['fields'] as $field)
                                    <th>
                                        {{ ucfirst($field) }}
                                    </th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($settings1['data'] as $row)
                                <tr>
                                    @foreach($settings1['fields'] as $field)
                                        <td>
                                            {{ $row->{$field} }}
                                        </td>
                                    @endforeach
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="{{ count($settings1['fields']) }}">{{ __('No entries found') }}</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
@endsection