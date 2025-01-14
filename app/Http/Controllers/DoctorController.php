<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Http\Requests\DoctorRequest;
use App\Enums\Specialty;

class DoctorController extends Controller
{


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctors = Doctor::all();
        return view('doctors.index', compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('doctors.create_or_edit', ['specialties' => Specialty::toSelectArray()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DoctorRequest $request)
    {
        $validated = $request->validated();
        Doctor::create($validated);

        return redirect()->route('doctors.index')->with('success', 'Вы успешно добавили доктора');
    }

    /**
     * Display the specified resource.
     */

    public function show(Doctor $doctor)
    {
        return view('doctors.show', ['doctor' => $doctor, 'patients' => $doctor->patients]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Doctor $doctor)
    {
        return view('doctors.create_or_edit', ['doctor' => $doctor, 'specialties' => Specialty::toSelectArray()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DoctorRequest $request, Doctor $doctor)
    {

        $validated = $request->validated();
        $doctor->update($validated);

        return redirect()->route('doctors.index')->with('success', 'Доктор успешно обновлен');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Doctor $doctor)
    {
        $doctor->delete();

        return redirect()->route('doctors.index')->with('success', 'Доктор успешно удален');
    }
}
