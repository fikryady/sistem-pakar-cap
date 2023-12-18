@extends('layouts.main')

@section('container')


    <article>
        <h2>Penyakit dari Gejala : {{ $symptom->nama }} ({{ $symptom->kd }} )</h2>
        Penyakit :
        @foreach ($symptom->diseases as $disease)
            <h4>{{ $disease->nama }}({{ $disease->kd }})</h4>
            <p>{!! $disease->keterangan !!}</p>
            <p>{!! $disease->pengendalian !!}</p>
    </article>
        @endforeach

        <button class="btn btn-success"><a href="/symptoms"> Back</a></button>    
@endsection