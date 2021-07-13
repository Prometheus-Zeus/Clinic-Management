<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class ChartController extends Controller
{
 public function chart (Request $request)
 {
    $chart = (new LarapexChart)->pieChart()
    ->setTitle('Patients')
    ->addData([
        \App\Models\Patient::where('P_gender', 'LIKE', 'Male')->count(),
        \App\Models\Patient::where('P_gender', 'LIKE', 'Female')->count()
    ])
    ->setColors(['#ffc63b', '#ff6384'])
    ->setLabels(['Male', 'Female']);
    

    return view('chart', compact('chart'));
 }
}
