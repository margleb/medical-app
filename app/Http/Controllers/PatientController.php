<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatientRequest;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patients = Patient::with('doctor')->get();
        return view('patients.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $doctors = Doctor::all();
        $doctor_id = $request->input('doctor_id');
        return view('patients.create_or_edit', compact('doctors', 'doctor_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PatientRequest $request)
    {
        $validated = $request->validated();
        Patient::create($validated);

        return redirect()->route('patients.index')->with('success', 'Пациент успешно добавлен');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patient $patient)
    {
        $doctors = Doctor::all();
        return view('patients.create_or_edit', compact('patient', 'doctors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PatientRequest $request, Patient $patient)
    {
        $validated = $request->validated();
        $patient->update($validated);

        return redirect()->route('patients.index')->with('success', 'Пациент успешно обновлен');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patient $patient)
    {
        $patient->delete();

        return redirect()->route('patients.index')->with('success', 'Пациент успешно удален');
    }
}
