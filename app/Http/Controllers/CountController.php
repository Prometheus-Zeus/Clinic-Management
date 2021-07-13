<?php

namespace App\Http\Controllers;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\Employee;

class CountController extends Controller
{
    public function patients() {
        $chart = (new LarapexChart)->pieChart()
        ->addData([
            \App\Models\Patient::where('P_gender', 'LIKE', 'Male')->count(),
            \App\Models\Patient::where('P_gender', 'LIKE', 'Female')->count(),
    
        ])
        ->setColors(['#ffc63b', '#ff6384'])
        ->setLabels(['Male', 'Female']);

        $patientsCount = Patient::count();
        $doctorCount = Doctor::count();
        $employeeCount = Employee::count();

            
        return view('dashboard', compact('chart','patientsCount','doctorCount', 'employeeCount'));
    }

}