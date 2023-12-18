@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Data Penyakit</h1>
  </div>

  @if(session()->has('success'))
  <div class="alert alert-success col-lg-6" role="alert">
    {{ session('success') }}
  </div>
  @endif    

  <div class="table-responsive col-lg-10">
    <a href="/dashboard/diseases/create" class="btn btn-primary mb-3"><span data-feather="plus-square"></span> Create new disease</a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th class="border-2 border-dark" scope="col ">#</th>
          <th class="border-2 border-dark" scope="col">Kode</th>
          <th class="border-2 border-dark" scope="col">Nama</th>
          <th class="border-2 border-dark" scope="col">Keterangan</th>
          <th class="border-2 border-dark" scope="col">Pengendalian</th>
          <th class="border-2 border-dark" scope="col">Probabilitas</th>
          <th class="border-2 border-dark" scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($diseases as $disease)
        <tr>
          <td class="border-2 border-dark">{{ $loop->iteration }}</td>
          <td class="border-2 border-dark">{{ $disease->kd }}</td>
          <td class="border-2 border-dark">{{ $disease->nama }}</td>
          <td class="border-2 border-dark">{!! Str::of($disease->keterangan)->limit(20) !!}</td>
          <td class="border-2 border-dark">{!! Str::of($disease->pengendalian)->limit(20) !!}</td>
          <td class="border-2 border-dark">{{ $disease->probabilitas }}</td>
          <td class="border-2 border-dark">
            <a href="/dashboard/diseases/{{ $disease->slug }}" class="badge bg-info"><span data-feather="eye"></span></a>
            <a href="/dashboard/diseases/{{ $disease->slug }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
            <form action="/dashboard/diseases/{{ $disease->slug }}" method="post" class="d-inline">
              @method('delete')
              @csrf
              <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span></button>
            </form>
        </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <div class="d-flex justify-content-end">
      {{ $diseases->links() }}
      </div>
  </div>

@endsection