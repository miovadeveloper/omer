<?php

namespace App\Http\Controllers\Admin;

use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class HomeController
{
    public function index()
    {
        $settings1 = [
            'chart_title'           => 'Son Eklenen Hastalar',
            'chart_type'            => 'latest_entries',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\\Hastalar',
            'group_by_field'        => 'ilk_gelis_tarihi',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'filter_days'           => '30',
            'group_by_field_format' => 'd-m-Y',
            'column_class'          => 'col-md-12',
            'entries_number'        => '5',
            'fields'                => [
                '0' => 'adi_soyadi',
                '1' => 'ilk_gelis_tarihi',
                '2' => 'gsm',
                '3' => 'e_posta',
            ],
        ];

        $settings1['data'] = $settings1['model']::latest()
            ->take($settings1['entries_number'])
            ->get();

        return view('home', compact('settings1'));
    }
}
