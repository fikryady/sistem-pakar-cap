@extends('layouts.main')

<style>
    
</style>

@php
    $symptoms = unserialize($history->symptom);
    $hasil = unserialize($history->hasil);
@endphp

@section('container')
    <div class="panel panel-success">
        <div class="panel-heading">
            Konsultasi > Result
            <div class="pull-right">
                <a target="_blank" href="/konsultasi/cetak/{{ $history->id }}" class="btn btn-warning btn-xs">Cetak</a>
            </div>
        </div>
			
        <div class="panel-body">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th colspan="2">Identitas</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Nama</td>
                        <td>{{ $history->nama }}</td>
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

            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>Gejala yang dipilih</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach($symptoms as $symptom)
                            <tr>
                                <td>{{ $no++ }}. {{ $symptom->nama }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th colspan="2">Diagnosa</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Penyakit</td>
                        <td>{{ $hasil['disease_nama'] }}</td>
                    </tr>
                    <tr>
                        <td>Persentase</td>
                        <td>{{ $hasil['persen'] }}%</td>
                    </tr>
                    <tr>
                        <td>Pengendalian</td>
                        <td>{!! $disease->pengendalian !!}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
