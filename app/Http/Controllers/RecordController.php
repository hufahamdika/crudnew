<?php

namespace App\Http\Controllers;

use App\Models\Record;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Record::All();
        return view('list-record', [
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create-record');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255|min:5',
            'age' => 'required|min:0',
            'gender' => 'required',
            'temperature' => 'required',
            'condition' => 'required'
        ]);
        $patient = Patient::create([
                'name' => $validatedData['name'],
                'age' => $validatedData['age'],
                'gender' => $validatedData['gender'],
            ]);

        $patient->records()->create([
            'temperature' => $validatedData['temperature'],
            'condition' => $validatedData['condition'],
        ]);

        // $id_patient = DB::table('patients')
        // ->select('id')
        // ->where('name', $validatedData['name'])
        // ->get();

        // $id_patient = Patient::select('id')->where('name', $validatedData['name'])->get();

        // Record::create([
        //     'patient_id' => $id_patient->get(),
            
        // ]);

        // $validatedData2 = $request->validate([
        //     'temperature' => 'required',
        //     'condition' => 'required'
        // ]);
        // Record::create($validatedData2);
        return redirect()->route('home')->with('tambah_data', 'Penambahan Pengguna berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Record  $record
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Record::findorfail($id);
        return view('show-record', [
            'data' => $data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Record  $record
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Record::where('id', $id)->first();
        return view('edit-record', [
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Record  $record
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            // 'name' => 'required|max:255|min:5',
            // 'age' => 'required|min:0',
            // 'gender' => 'required',
            'temperature' => 'required',
            'condition' => 'required'
        ]);

        $record = Record::findOrFail($id);
        $record->update($validatedData);
        return redirect()->route('home')->with('edit_data', 'Pengeditan Data berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Record  $record
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = Record::findOrFail($id);
        $record->delete();
		return redirect()->route('home')->with('hapus_data', 'Penghapusan data berhasil');
    }
}
