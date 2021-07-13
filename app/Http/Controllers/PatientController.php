<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use PDF;

class PatientController extends Controller
{

    public function index(Request $request)
    {
        $patients = Patient::where([
            ['P_lastName',    '!=', Null],
            [function ($query) use ($request){
                if(($term = $request -> term)){
                    $query->orWhere('P_lastName', 'LIKE', '%' . $term . '%')->get();
                }
            }]
            ])
            ->orderBy("id", "desc")
            ->paginate(15);

  
        return view('patients.index',compact('patients'))
            ->with('i', (request()->input('page', 1) - 1) * 15);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('patients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'P_firstName' => 'required',
            'P_middleName' => 'required',
            'P_lastName' => 'required',
            'P_gender' => 'required',
            'P_age' => 'required',
            'P_medHistory' => 'required',
            'P_guardian' => 'required',
            'P_lastVisit' => 'required',
            'P_status' => 'required',
            'P_contactNum' => 'required',
            'P_location' => 'required',
            'P_reasonVisit' => 'required',
            'P_amountPaid' => 'required',
            'P_visitDescription' => 'required',
        ]);
  
        Patient::create($request->all());
   
        return redirect()->route('patients.index')
                        ->with('success','Patient added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        return view('patients.show',compact('patient'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {
        return view('patients.edit',compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patient $patient)
    {
        $request->validate([
            'P_firstName' => 'required',
            'P_middleName' => 'required',
            'P_lastName' => 'required',
            'P_gender' => 'required',
            'P_age' => 'required',
            'P_medHistory' => 'required',
            'P_guardian' => 'required',
            
            'P_status' => 'required',
            'P_location' => 'required',
            'P_reasonVisit' => 'required',
            'P_amountPaid' => 'required',
            'P_visitDescription' => 'required',
        ]);
  
        $patient->update($request->all());
  
        return redirect()->route('patients.index')
                        ->with('Success','Patient updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Patient  $Patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        $patient->delete();
  
        return redirect()->route('patients.index')
                        ->with('success','Patient deleted successfully');
    }

    public function createPDF() {
$data = Patient::get()->all();
$pdf = PDF::loadview('myPDF', ['data'=>$data]);
return $pdf->stream('Patient.pdf');
  }
}