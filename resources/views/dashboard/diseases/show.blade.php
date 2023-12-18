@extends('dashboard.layouts.main')

@section('container')
<div class="container">
    <div class="row my-3">
        <div class="col-lg-12">
            <h1 class="mb-3">{{ $disease->nama }}</h1>

        <a href="/dashboard/diseases" class="btn btn-success"><span data-feather="arrow-left"></span> Back to all Diseases</a>
        <a href="/dashboard/diseases/{{ $disease->slug }}/edit" class="btn btn-warning"><span data-feather="edit"></span> Edit</a>
        <form action="/dashboard/diseases/{{ $disease->slug }}" method="post" class="d-inline">
            @method('delete')
            @csrf
            <button class="btn btn-danger" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span> Delete</button>
          </form>

        @if($disease->image)
        <div style="max-height: 350px; overflow:hidden">
            <img src="{{ asset('storage/' . $disease->image) }}" alt="{{ $disease->name }}" class="img-fluid mt-3">
        </div>
        @else
            <img src="https://source.unsplash.com/800x300?{{ $disease->name }}" alt="{{ $disease->name }}" class="img-fluid mt-3">
        @endif
        
        <dt class="col-sm-3">Kode Peyakit</dt>
        <dd class="col-sm-9">{{ $disease->kd }}</dd>
        
        <dt class="col-sm-3">Penyebab</dt>
        <dd class="col-sm-9">{!! $disease->keterangan !!}</dd>
        
        <dt class="col-sm-3">Gejalanya</dt>
        <dd class="col-sm-9">
            @foreach ($disease->symptoms as $symp)
            <li>{{ $symp->nama }}</li>
            @endforeach
        </dd>
        <dt class="col-sm-3 text-truncate">Slolusi</dt>
        <dd class="col-sm-9">{!! $disease->pengendalian !!}</dd>
        
        <dt class="col-sm-3">Nilai Probabilitas</dt>
        <dd class="col-sm-9">{{ $disease->probabilitas }}</dd>
      </dl>


        </div>
    </div>
</div>
@endsection