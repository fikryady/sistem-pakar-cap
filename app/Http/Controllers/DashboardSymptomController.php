<?php

namespace App\Http\Controllers;

use App\Models\Symptom;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardSymptomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.symptoms.index', [
            "symptoms" => Symptom::orderby('kd', 'asc')->filter(request(['search', 'symptoms']))->paginate(10)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.symptoms.create', [
            'symptoms' => Symptom::all()
        ]);
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
            'kd' => 'required|max:255',
            'nama' => 'required|unique:symptoms',
            'slug' => 'required|unique:symptoms',
        ]);

        Symptom::create($validatedData);

        return redirect('/dashboard/symptoms')->with('success', 'New symptom has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Symptom  $symptom
     * @return \Illuminate\Http\Response
     */
    public function show(Symptom $symptom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Symptom  $symptom
     * @return \Illuminate\Http\Response
     */
    public function edit(Symptom $symptom)
    {
        return view('dashboard.symptoms.edit', [
            'symptom' => $symptom,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Symptom  $symptom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Symptom $symptom)
    {
        $rules = [
            'kd' => 'required|max:255',
            'nama' => 'required',
        ];

        if ($request->slug != $symptom->slug) {
            $rules['slug'] = 'required|unique:symptoms';
        }

        $validatedData = $request->validate($rules);

        Symptom::where('id', $symptom->id)
            ->update($validatedData);

        return redirect('/dashboard/symptoms')->with('success', 'Symptom has been Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Symptom  $symptom
     * @return \Illuminate\Http\Response
     */
    public function destroy(Symptom $symptom)
    {
        Symptom::destroy($symptom->id);

        return redirect('/dashboard/symptoms')->with('success', 'Symptom has been deleted');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Disease::class, 'slug', $request->nama);
        return response()->json(['slug' => $slug]);
    }
}
