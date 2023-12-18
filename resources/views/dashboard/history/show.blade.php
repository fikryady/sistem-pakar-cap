@extends('dashboard.layouts.main')  

@php
    $symptoms = unserialize($history->symptom);
    $response = unserialize($history->response);
    $hasil = unserialize($history->hasil);
@endphp

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Riwayat > Show</h1>
  </div>

  @if(session()->has('success'))
  <div class="alert alert-success col-lg-6" role="alert">
    {{ session('success') }}
  </div>
  @endif    
  <div class="table-responsive col-lg-10" style="overflow-x:auto">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th colspan="2">Identitas</th>
                <th>Gejala</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Nama</td>
                <td>{{ $history->nama }}</td>
                <td rowspan="3">
                    <ul class="list-unstyled">
                        @foreach($symptoms as $symptom)
                            <li># {{ $symptom->nama }} ({{ $symptom->id }})</li>
                        @endforeach
                    </ul>
                </td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>{{ $history->alamat }}</td>
            </tr>
            <tr>
                <td>Pekerjaan</td>
                <td>{{ $history->pekerjaan }}</td>
            </tr>
        </tbody>
    </table>
  </div>
    <h3>Step 1</h3>
    <div class="table-responsive col-lg-10" style="overflow-x:auto">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                @foreach($response as $data)
                    <th colspan="2">Penyakit ID : {{ $data['disease_id'] }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            <tr>
                @for($i = 0; $i < count($response); $i++)
                    <td>Gejala</td>
                    <td>Bobot</td>
                @endfor
            </tr>
            @for($i = 0; $i < count($response[0]['symptom']); $i++)
                <tr>
                    @for($j = 0; $j < count($response); $j++)
                        <td>{{ $response[$j]['symptom'][$i]['symptom_id'] }}</td>
                        <td>{{ $response[$j]['symptom'][$i]['bobot'] }}</td>
                    @endfor
                </tr>
            @endfor
        </tbody>
    </table>
    </div>
    <h3>Step 2</h3>
    <div class="table-responsive col-lg-10" style="overflow-x:auto">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                @foreach($response as $data)
                    <th colspan="3">Penyakit ID : {{ $data['disease_id'] }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            <tr>
                @for($i = 0; $i < count($response); $i++)
                    <td>Atas</td>
                    <td>Bawah</td>
                    <td>Dibagi</td>
                @endfor
            </tr>
            @for($i = 0; $i < count($response[0]['symptom']); $i++)
                <tr>
                    @for($j = 0; $j < count($response); $j++)
                        <td>{{ $response[$j]['symptom'][$i]['atas'] }}</td>
                        <td>{{ $response[$j]['symptom'][$i]['bawah'] }}</td>
                        <td>{{ $response[$j]['symptom'][$i]['dibagi'] }}</td>
                    @endfor
                </tr>
            @endfor
        </tbody>
    </table>
    </div>
    <h3>Step 3</h3>
    <div class="table-responsive col-lg-10" style="overflow-x:auto">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                @foreach($response as $data)
                    <th colspan="2">Penyakit ID : {{ $data['disease_id'] }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            <tr>
                @for($i = 0; $i < count($response); $i++)
                    <td>SUM</td>
                    <td>Persen</td>
                @endfor
            </tr>

            <tr>
                @for($i = 0; $i < count($response); $i++)
                    <td>{{ $response[$i]['sum'] }}</td>
                    <td>{{ $response[$i]['persen'] }}%</td>
                @endfor
            </tr>
            
        </tbody>
    </table>
    </div>
    <h3>Step 4</h3>
    <div class="table-responsive col-lg-10" style="overflow-x:auto">
    <table class="table table-striped table-sm">
        <tbody>
            <tr>
                <td><strong>ID</strong></td>
                <td>{{ $hasil['disease_id'] }}</td>
            </tr>
            <tr>
                <td><strong>Penyakit</strong></td>
                <td>{{ $hasil['disease_nama'] }}</td>
            </tr>
            <tr>
                <td><strong>Persentase</strong></td>
                <td>{{ $hasil['persen'] }}%</td>
            </tr>
            <tr>
                <td><strong>Pengendalian</strong></td>
                <td>{!! $disease->pengendalian !!}</td>
            </tr>
        </tbody>
    </table>
    {{-- <div class="d-flex justify-content-end">
      {{ $histories->links() }}
      </div>
  </div> --}}
  <a href="/dashboard/histories" class="btn btn-success mb-3"><span data-feather="arrow-left"></span> Kembali</a>
</div>

@endsection