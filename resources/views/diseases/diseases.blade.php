@extends('layouts.main')

@section('container')
<h1 class="mb-3 text-center">Halaman Penyakit</h1>

<div class="row justify-content-center mb-3">
    <div class="col-md-6">
        <form action="/diseases">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search.." name="search" value="{{ request('search') }}">
                <button class="btn btn-danger" type="submit">Search</button>
              </div>
        </form>
    </div>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Kode Penyakit</th>
            <th>Nama Penyakit</th>
        </tr>
    </thead>
    @foreach ($diseases as $disease)
    <tbody>
        <tr>
            <td>{{ $disease->kd }}</td>
            <td><a href="/diseases/{{ $disease->slug }}">{{ $disease->nama }}</a></td>
        </tr>
    </tbody>
    @endforeach
</table>

<div class="d-flex justify-content-end">
    {{ $diseases->links() }}
    </div>
@endsection