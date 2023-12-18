<?php

namespace App\Http\Controllers;

use App\Models\Disease;
use App\Models\DiseaseSymptom;
use App\Models\Symptom;
use Illuminate\Http\Request;

class DashboardRuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $rules = DiseaseSymptom::orderby('id', 'asc')->filter(request(['search', 'diseasesymptom']))->paginate(10)->withQueryString();

        // $diseases = Disease::orderBy('kd', 'asc')->get();

        return view('dashboard.rule.index', compact('rules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $diseases = Disease::orderBy('nama', 'asc')->get();
        $symptoms = Symptom::orderBy('nama', 'asc')->get();

        return view('dashboard.rule.create', compact('diseases', 'symptoms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'disease' => 'required|numeric',
            'symptom' => 'required|numeric',
            'bobot' => 'required|min:2|max:4|regex:/^[0-9\.]*$/iu',
        ]);

        $disease = Disease::findOrFail($request->input('disease'));
        $disease->symptoms()->attach($request->input('symptom'), ['bobot' => $request->input('bobot')]);


        return redirect('/dashboard/rules')->with('success', 'New rule has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DiseaseSymptom  $diseaseSymptom
     * @return \Illuminate\Http\Response
     */
    public function show(DiseaseSymptom $diseaseSymptom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DiseaseSymptom  $diseaseSymptom
     * @return \Illuminate\Http\Response
     */
    public function edit(DiseaseSymptom $diseaseSymptom, $id)
    {
        $rules = DiseaseSymptom::findOrFail($id);
        $diseases = Disease::orderBy('nama', 'asc')->get();
        $symptoms = Symptom::orderBy('nama', 'asc')->get();

        return view('dashboard.rule.edit', compact('rules', 'diseases', 'symptoms'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DiseaseSymptom  $diseaseSymptom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = DiseaseSymptom::findOrFail($id);

        $this->validate($request, [
            'disease' => 'required|numeric',
            'symptom' => 'required|numeric',
            'bobot' => 'required|min:3|max:3|regex:/^[0-9\.]*$/iu',
        ]);

        $disease = Disease::findOrFail($rules->disease_id);
        $disease->symptoms()->detach($request->input('symptom'));
        $disease->symptoms()->attach($request->input('symptom'), ['bobot' => $request->input('bobot')]);

        return redirect('/dashboard/rules')->with('success', 'New rule has been update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DiseaseSymptom  $diseaseSymptom
     * @return \Illuminate\Http\Response
     */
    public function destroy(DiseaseSymptom $diseaseSymptom)
    {
        DiseaseSymptom::destroy($diseaseSymptom->id);

        return redirect('/dashboard/rules')->with('success', 'Rule has been deleted');
    }
}
