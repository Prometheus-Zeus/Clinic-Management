<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = Doctor::oldest()->paginate(10);
  
        return view('doctors.index',compact('doctors'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('doctors.create');
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
            'd_firstname' => 'required',
            'd_middlename' => '',
            'd_lastname' => 'required',
            'd_contact' => 'required',
            'd_gender' => 'required',
            'd_specialist' => 'required',
            'd_schedule' => 'required',
            'd_rate' => 'required'
        ]);
  
        Doctor::create($request->all());
   
        return redirect()->route('doctors.index')
                        ->with('success','Doctor created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
        return view('doctors.show', compact('doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        return view('doctors.edit', compact('doctor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Doctor $doctor)
    {
        $request->validate([
            'd_firstname' => 'required',
            'd_middlename' => '',
            'd_lastname' => 'required',
            'd_contact' => 'required',
            'd_gender' => 'required',
            'd_specialist' => 'required',
            'd_schedule' => 'required',
            'd_rate' => 'required'
        ]);
  
        $doctor->update($request->all());
  
        return redirect()->route('doctors.index')
                        ->with('success','Doctor updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        $doctor->delete();
  
        return redirect()->route('doctors.index')
                        ->with('success','Doctor deleted successfully');
    }
}
