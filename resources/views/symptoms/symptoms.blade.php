@extends('layouts.main')

@section('container')
    <h1 class="mb-3 text-center">Gejala Penyakit</h1>

    <div class="row justify-content-center mb-3">
        <div class="col-md-6">
            <form action="/symptoms">
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
                <th>Kode Gejala</th>
                <th>Nama Gejala</th>
            </tr>
        </thead>
        @foreach ($symptoms as $symp)
        <tbody>
            <tr>
                <td>{{ $symp->kd }}</td>
                <td><a href="/symptoms/{{ $symp->slug }}">{{ $symp->nama }}</a></td>
            </tr>
        </tbody>
        @endforeach
    </table>

    <div class="d-flex justify-content-end">
    {{ $symptoms->links() }}
    </div>
@endsection