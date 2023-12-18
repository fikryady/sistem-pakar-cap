<?php

namespace App\Http\Controllers;

use App\Models\Disease;
use App\Models\History;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DashboardDiseaseController extends Controller
{



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.diseases.index', [
            "diseases" => Disease::orderby('kd', 'asc')->filter(request(['search', 'diseases']))->paginate(8)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.diseases.create', [
            'diseases' => Disease::all()
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
            'nama' => 'required|unique:diseases',
            'slug' => 'required|unique:diseases',
            'image' => 'image|file|max:1024',
            'keterangan' => 'required',
            'pengendalian' => 'required',
            'probabilitas' => 'required'
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('disease-images');
        }

        Disease::create($validatedData);

        return redirect('/dashboard/diseases')->with('success', 'New disease has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Disease  $disease
     * @return \Illuminate\Http\Response
     */
    public function show(Disease $disease)
    {
        return view('dashboard.diseases.show', [
            'disease' => $disease,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Disease  $disease
     * @return \Illuminate\Http\Response
     */
    public function edit(Disease $disease)
    {
        return view('dashboard.diseases.edit', [
            'disease' => $disease,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Disease  $disease
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Disease $disease)
    {
        $rules = [
            'kd' => 'required|max:255',
            'nama' => 'required',
            'image' => 'image|file|max:1024',
            'keterangan' => 'required',
            'pengendalian' => 'required',
            'probabilitas' => 'required'
        ];

        if ($request->slug != $disease->slug) {
            $rules['slug'] = 'required';
        }

        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('disease-images');
        }

        Disease::where('id', $disease->id)
            ->update($validatedData);

        return redirect('/dashboard/diseases')->with('success', 'Disease has been Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Disease  $disease
     * @return \Illuminate\Http\Response
     */
    public function destroy(Disease $disease)
    {
        if ($disease->image) {
            Storage::delete($disease->image);
        }

        Disease::destroy($disease->id);

        return redirect('/dashboard/diseases')->with('success', 'Disease has been deleted');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Disease::class, 'slug', $request->nama);
        return response()->json(['slug' => $slug]);
    }
}
