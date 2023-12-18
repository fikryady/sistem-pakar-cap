@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Rules</h1>
  </div>

  @if(session()->has('success'))
  <div class="alert alert-success col-lg-6" role="alert">
    {{ session('success') }}
  </div>
  @endif    

  <div class="table-responsive col-lg-12">
    <a href="/dashboard/rules/create" class="btn btn-primary mb-3"><span data-feather="plus-square"></span> Create new Rule</a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Kode Penyakit</th>
          <th scope="col">Kode Gejala</th>
          <th scope="col">Bobot</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($rules as $rule)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $rule->disease->kd }}</td>
          <td>{{ $rule->symptom->kd }}</td>
          <td>{{ $rule->bobot }}</td>


          <td>
              <a href="/dashboard/rules/{{ $rule->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
              <form action="/dashboard/rules/{{ $rule->id }}" method="post" class="d-inline">
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
      {{ $rules->links() }}
      </div>
  </div>

@endsection