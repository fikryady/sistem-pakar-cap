<?php

namespace App\Http\Controllers;

use App\Models\Disease;
use App\Models\History;
use App\Models\Symptom;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\PDF;

class KonsultasiController extends Controller
{
    public function index(Request $request)
    {
        if (!$request->all()) {
            return view('consultation.index', [
                "title" => "Konsultasi"
            ]);
        }

        $this->validate($request, [
            'nama' => 'required',
            'alamat' => 'required',
            'pekerjaan' => 'required'
        ]);

        session()->flashInput($request->all());

        return redirect()->route('consultation.gejala');
    }

    public function gejala()
    {
        if (!session('_old_input')) {
            session()->flash('danger', 'alert-danger');
            session()->flash('notifikasi', 'Maaf, silakan masukan detail identitas Anda kembali');

            return redirect()->route('index');
        }
        $symptoms = Symptom::orderBy('nama', 'asc')->get();

        return view('consultation.gejala', ["title" => "Pilih Gejala"], compact('symptoms'));
    }

    public function proses(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'alamat' => 'required',
            'pekerjaan' => 'required',
            'symptom' => 'required|min:1'
        ]);

        $symptoms = DB::table('symptoms')->whereIn('id', $request->input('symptom'))->get();

        $diseases = Disease::orderBy('id', 'asc')->get();

        $dataStep1 = $this->prosesStep1($diseases, $request);

        $response = $this->prosesStep2($dataStep1, $request);

        $hasil = collect($response)
            ->sortByDesc(function ($value, $key) {
                return $value['persen'];
            })
            ->values()
            ->first();

        $history = new History;
        $history->nama = Str::title($request->input('nama'));
        $history->alamat = Str::title($request->input('alamat'));
        $history->pekerjaan = Str::title($request->input('pekerjaan'));
        $history->symptom = serialize($symptoms);
        $history->response = serialize($response);
        $history->hasil = serialize($hasil);
        $history->save();

        return redirect()->route('consultation.result', $history->id);
    }

    public function result($id)
    {
        $history = History::findOrFail($id);

        $disease = Disease::find(unserialize($history->hasil)['disease_id']);

        return view('consultation.result', ["title" => "Konsultasi"], compact('history', 'disease'));
    }

    private function prosesStep1($diseases, Request $request)
    {
        $no = 0;
        foreach ($diseases as $disease) {
            $dataStep1[] = [
                'disease_id' => $disease->id,
                'disease_nama' => $disease->nama,
                'disease_probabilitas' => $disease->probabilitas,
                'symptom' => null,
                'sum' => null,
                'persen' => null
            ];

            $selectedSymptom = collect($request->input('symptom'))
                ->sort()
                ->values()
                ->all();

            foreach ($selectedSymptom as $symptom) {
                $rule = DB::table('disease_symptom')
                    ->select('disease_symptom.*')
                    ->where('disease_id', $disease->id)
                    ->where('symptom_id', $symptom)
                    ->first();
                $datasymptoms = DB::table('symptoms')
                    ->select('symptoms.*')
                    ->where('id', $symptom)
                    ->first();

                if ($rule) {
                    $bobot = $rule->bobot;
                } else {
                    $bobot = 0;
                }

                $dataStep1[$no]['symptom'][] = [
                    'symptom_id' => $symptom,
                    'symptom_nama' => $datasymptoms->nama,
                    'bobot' => $bobot,
                    'atas' => null,
                    'bawah' => null,
                    'dibagi' => null
                ];
            }

            $no++;
        }

        return $dataStep1;
    }

    private function prosesStep2($dataStep1, Request $request)
    {
        for ($i = 0; $i < count($dataStep1); $i++) {
            $selectedSymptom = collect($request->input('symptom'))
                ->sort()
                ->values()
                ->all();

            for ($j = 0; $j < count($selectedSymptom); $j++) {
                $dataStep1[$i]['symptom'][$j]['atas'] = $dataStep1[$i]['symptom'][$j]['bobot'] * $dataStep1[$i]['disease_probabilitas'];

                for ($k = 0; $k < count($dataStep1); $k++) {
                    $bawah[] = $dataStep1[$k]['symptom'][$j]['bobot'] * $dataStep1[$k]['disease_probabilitas'];
                }

                $dataStep1[$i]['symptom'][$j]['bawah'] = array_sum($bawah);
                unset($bawah);

                $dibagi = $dataStep1[$i]['symptom'][$j]['atas'] / $dataStep1[$i]['symptom'][$j]['bawah'];
                $dataStep1[$i]['symptom'][$j]['dibagi'] = round($dibagi, 6);
                $arrDibagi[] = $dataStep1[$i]['symptom'][$j]['dibagi'];
            }

            $dataStep1[$i]['sum'] = array_sum($arrDibagi);
            unset($arrDibagi);

            $dataStep1[$i]['persen'] = $dataStep1[$i]['sum'] * 100 / count($selectedSymptom);
        }

        return $dataStep1;
    }

    public function cetak($id)
    {
        return redirect()->route('consultation.pdf', [$id, now()]);
    }

    public function pdf($id, $now)
    {
        $history = History::findOrFail($id);
        $disease = Disease::find(unserialize($history->hasil)['disease_id']);

        $pdf = PDF::loadView('consultation.pdf', ["title" => "Konsultasi"], compact('history', 'disease'))
            ->setPaper('a4', 'potrait');

        return $pdf->stream('konsultasi-' . $now . '.pdf');
    }
}
