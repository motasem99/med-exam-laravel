<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Clinic;
use App\Models\Patient;
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
        //
        $data = Doctor::all();
        return view('doctor.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $clinic=Clinic::all();
        $patient=Patient::all();
        return view('doctor.create',compact('clinic','patient'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validData= $request->validate([
            'doctor_name'=>'required|min:3',
            'age'=>'required',
            'clinic_id'=>'required',
            'patient_id'=>'required'
        ]);

        Doctor::create($request->all());
        return redirect('doctor');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data=Doctor::find($id);
        $clinic=Clinic::all();
        $patient=Patient::all();
        return view('doctor.edit',compact('data','clinic','patient'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validData= $request->validate([
            'doctor_name'=>'required|min:3',
            'age'=>'required',
            'clinic_id'=>'required',
            'patient_id'=>'required'
        ]);

        $data=Doctor::find($id);
        $data->update($request->all());
        return redirect('doctor');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $data=Doctor::find($id);
        $data->delete();
        return redirect('doctor');
    }
}
