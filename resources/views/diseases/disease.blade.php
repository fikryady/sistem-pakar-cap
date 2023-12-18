@extends('layouts.main')

@section('container')

<h1 class="mb-3">Penyakit : {{ $disease->nama }}</h1>
<dl class="row">
<style>sd{align-items: flex-start;}</style>
  @if($disease->image)
  <div style="max-height: 350px; overflow:hidden">
     <img src="{{ asset('storage/' . $disease->image) }}" alt="{{ $disease->name }}" class="img-fluid mt-3">
  </div>
 @else
     <img src="https://source.unsplash.com/1200x400?Arowana" alt="{{ $disease->name }}" class="img-fluid mt-3">
 @endif
    <dt class="col-sm-3">Kode Peyakit</dt>
    <dd class="col-sm-9">{{ $disease->kd }}</dd>
  
    <dt class="col-sm-3">Keterangan</dt>
    <dd class="col-sm-9">{!! $disease->keterangan !!}</dd>
    
    <dt class="col-sm-3">Gejalanya</dt>
    <dd class="col-sm-9">
    @foreach ($disease->symptoms as $symp)
    <li>{{ $symp->nama }}</li>
    @endforeach
    </dd>
  
    <dt class="col-sm-3 text-truncate">Pengendalian</dt>
    <dd class="col-sm-9">{!! $disease->pengendalian !!}</dd>
  </dl>
       
  <button class="btn btn-success mb-lg-4"><a href="/diseases"> Back</a></button>  
@endsection