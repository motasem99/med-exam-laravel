<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Clinic;
use App\Models\Doctor;
use App\Models\Patient;


class ClinicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Clinic::all();
        return view('clinic.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $doctor=Doctor::all();
        return view('clinic.create',compact('doctor'));
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
            'clinic_name'=>'required|min:3',
            'doctor_id'=>'required',
        ]);

        Clinic::create($request->all());
        return redirect('clinic');
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
        $data=Clinic::find($id);
        $doctor=Doctor::all();
        return view('clinic.edit',compact('data','doctor'));
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
            'clinic_name'=>'required|min:3',
            'doctor_id'=>'required',
        ]);

        $data=Clinic::find($id);
        $data->update($request->all());
        return redirect('clinic');
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
        $data=Clinic::find($id);
        $data->delete();
        return redirect('clinic');
    }
}
