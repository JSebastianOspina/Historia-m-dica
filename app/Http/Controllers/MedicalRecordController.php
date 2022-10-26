<?php

namespace App\Http\Controllers;

use App\Models\MedicalRecord;
use App\Http\Requests\StoreMedicalRecordRequest;
use App\Http\Requests\UpdateMedicalRecordRequest;
use Illuminate\Http\RedirectResponse;

class MedicalRecordController extends Controller
{

    public function index()
    {
        $medicalRecords = MedicalRecord::all()->toArray();
        foreach ($medicalRecords as $key => $record) {

            $medicalRecords[$key]['message'] = 'hola';
            //Turn into object
            $medicalRecords[$key] = (object)$medicalRecords[$key];
        }

        return view('MedicalRecords.index')->with(compact('medicalRecords'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreMedicalRecordRequest $request
     * @return RedirectResponse
     */
    public function store(StoreMedicalRecordRequest $request)
    {
        MedicalRecord::create($request->all());
        return redirect()->back()->with('message', 'Registro creado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\MedicalRecord $medicalRecord
     * @return \Illuminate\Http\Response
     */
    public function show(MedicalRecord $medicalRecord)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\MedicalRecord $medicalRecord
     * @return \Illuminate\Http\Response
     */
    public function edit(MedicalRecord $medicalRecord)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateMedicalRecordRequest $request
     * @param \App\Models\MedicalRecord $medicalRecord
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMedicalRecordRequest $request, MedicalRecord $medicalRecord)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\MedicalRecord $medicalRecord
     * @return \Illuminate\Http\Response
     */
    public function destroy(MedicalRecord $medicalRecord)
    {
        //
    }
}
