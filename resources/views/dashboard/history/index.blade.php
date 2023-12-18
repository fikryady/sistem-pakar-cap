@extends('dashboard.layouts.main')  

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Data Riwayat</h1>
  </div>

  @if(session()->has('success'))
  <div class="alert alert-success col-lg-6" role="alert">
    {{ session('success') }}
  </div>
  @endif    
    <div class="pull-right">
        Riwayat : {{ $histories->total() }}
    </div>

  <div class="table-responsive col-lg-10">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th class="border-2 border-dark" scope="col ">#</th>
          <th class="border-2 border-dark" scope="col">Nama</th>
          <th class="border-2 border-dark" scope="col">Alamat</th>
          <th class="border-2 border-dark" scope="col">Pekerjaan</th>
          <th class="border-2 border-dark" scope="col">Tanggal</th>
          <th class="border-2 border-dark" scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($histories as $history)
        <tr>
          <td class="border-2 border-dark">{{ $loop->iteration }}</td>
          <td class="border-2 border-dark">{{ $history->nama }}</td>
          <td class="border-2 border-dark">{{ $history->alamat }}</td>
          <td class="border-2 border-dark">{!! $history->pekerjaan !!}</td>
          <td class="border-2 border-dark">{{ $history->created_at->format('d/m/Y') }}</td>
          <td class="border-2 border-dark">
            <a href="/dashboard/histories/{{ $history->id }}" class="badge bg-info"><span data-feather="eye"></span></a>
            <form action="/dashboard/histories/{{ $history->id }}" method="post" class="d-inline">
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
      {{ $histories->links() }}
      </div>
  </div>

@endsection