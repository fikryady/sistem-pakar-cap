@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Data Gejala</h1>
  </div>

  @if(session()->has('success'))
  <div class="alert alert-success col-lg-6" role="alert">
    {{ session('success') }}
  </div>
  @endif    

  <div class="table-responsive col-lg-9">
    <a href="/dashboard/symptoms/create" class="btn btn-primary mb-3"><span data-feather="plus-square"></span> Create new symptom</a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Kode</th>
          <th scope="col">Nama</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($symptoms as $symptom)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $symptom->kd }}</td>
          <td>{{ $symptom->nama }}</td>
          <td>
            
              <a href="/dashboard/symptoms/{{ $symptom->slug }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
              <form action="/dashboard/symptoms/{{ $symptom->slug }}" method="post" class="d-inline">
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
      {{ $symptoms->links() }}
      </div>
  </div>

@endsection