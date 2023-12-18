@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Create New User</h1>
</div> 
<div class="col-lg-8">
          <form action="/dashboard/users" method="post">
              @csrf
              <div class="mb-3">
              <label for="name">Name</label>
              <input type="text" name='name' class="form-control rounded-top @error('name')is-invalid @enderror" id="name" placeholder="Name" required value="{{ old('name') }}" autocomplete="off">
              @error('name')
              <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
              <label for="username">Username</label>
              <input type="text" name='username' class="form-control @error('username')is-invalid @enderror" id="username" placeholder="Username" required value="{{ old('username') }}" autocomplete="off">
              @error('username')
              <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
            </div>
            
            <div class="mb-3">
              <label for="email">Email address</label>
              <input type="email" name="email" class="form-control @error('email')is-invalid @enderror" id="email" placeholder="name@example.com" required value="{{ old('email') }}" autocomplete="off">
              @error('email')
              <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3">
              <label for="password">Password</label>
              <input type="password" name="password" class="form-control rounded-bottom @error('password')is-invalid @enderror" id="password" placeholder="Password" required>
              @error('password')
              <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
            </div>

          <div class="mb-3">
            <label for="no_tlp">Nomor Telefon</label>
            <input type="text" name="no_tlp" class="form-control @error('no_tlp')is-invalid @enderror" id="no_tlp" placeholder="Nomor Telefon" required value="{{ old('no_tlp') }}" autocomplete="off">
            @error('no_tlp')
            <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
          </div>
        
          <a href="/dashboard/symptoms" class="btn btn-success"><span data-feather="arrow-left"></span> Back to all Users</a>
          <button type="submit" class="btn btn-primary">Create user</button>
          </form>      
  </div>

@endsection