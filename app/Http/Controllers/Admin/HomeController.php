<?php

namespace App\Http\Controllers\Admin;

use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class HomeController
{
    public function index()
    {
        $settings1 = [
            'chart_title'        => 'My Report 1',
            'chart_type'         => 'bar',
            'report_type'        => 'group_by_relationship',
            'model'              => 'App\\Models\\Reponse',
            'group_by_field'     => 'description',
            'aggregate_function' => 'count',
            'filter_field'       => 'created_at',
            'filter_period'      => 'year',
            'column_class'       => 'col-md-6',
            'entries_number'     => '5',
            'relationship_name'  => 'question',
        ];

        $chart1 = new LaravelChart($settings1);

        $settings2 = [
            'chart_title'        => 'My Report 2',
            'chart_type'         => 'line',
            'report_type'        => 'group_by_relationship',
            'model'              => 'App\\Models\\Question',
            'group_by_field'     => 'description',
            'aggregate_function' => 'count',
            'filter_field'       => 'created_at',
            'filter_period'      => 'year',
            'column_class'       => 'col-md-6',
            'entries_number'     => '5',
            'relationship_name'  => 'indicateur',
        ];

        $chart2 = new LaravelChart($settings2);

        return view('home', compact('chart1', 'chart2'));
    }
}
