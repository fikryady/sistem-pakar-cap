@extends('dashboard.layouts.main')

@section('container')
@can('admin')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Data User</h1>
  </div>

  @if(session()->has('success'))
  <div class="alert alert-success col-lg-8" role="alert">
    {{ session('success') }}
  </div>
  @endif    

  <div class="table-responsive col-lg-10">
    <a href="/dashboard/users/create" class="btn btn-primary mb-3"><span data-feather="plus-square"></span> Create new user</a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th class="border-2 border-dark" scope="col ">#</th>
          <th class="border-2 border-dark" scope="col">Nama</th>
          <th class="border-2 border-dark" scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($users as $user)
        <tr>
          <td class="border-2 border-dark">{{ $loop->iteration }}</td>
          <td class="border-2 border-dark">{{ $user->name }}</td>

          <td class="border-2 border-dark">
            <a href="/dashboard/users/{{ $user->id }}" class="badge bg-info"><span data-feather="eye"></span></a>
            <a href="/dashboard/users/{{ $user->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
            <form action="/dashboard/users/{{ $user->id }}" method="post" class="d-inline">
              @method('delete')
              @csrf
              <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span></button>
            </form>
        </td>
        </tr>
        @endforeach
      </tbody>
      @endcan
@endsection