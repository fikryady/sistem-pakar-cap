@extends('layouts.main')

@section('container')
<div class="card p-2 shadow-sm border-bottom-primary">
    <div class="card-header bg-white">
        <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
            {{ $user->name }}
        </h4>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-2 mb-4 mb-md-0">
                @if($user->image)
                    <img src="{{ asset('storage/' . $user->image) }}" alt="{{ $user->name }}" class="img-thumbnail rounded mb-2">
                @else
                    <img src="{{ asset('/img/defaultprofile.jpg')}}" alt="{{ $user->name }}" class="img-thumbnail rounded mb-2">
                @endif
                <a href="/profile/{{ $user->id }}/edit" class="btn btn-sm btn-block btn-primary"><i class="fa fa-edit"></i> Edit Profile</a>
            </div>
            <div class="col-md-10">
                <table class="table">
                    <tr>
                        <th width="200">Username</th>
                        <td>{{ $user->username }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <th>Nomor Telepon</th>
                        <td>{{ $user->no_tlp }}</td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>{{ $user->alamat }}</td>
                    </tr>
                    <tr>
                        <th>Pekerjaan</th>
                        <td>{{ $user->pekerjaan }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection