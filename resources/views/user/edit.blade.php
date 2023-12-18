@extends('layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Profile</h1>
  </div> 

  <div class="col-lg-8">
      <form method="post" action="/profile/{{ $user->id }}" class="mb-5" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-3">
          <label for="name" class="form-label">Nama</label>
          <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required autofocus value="{{ old('name', $user->name) }}">
          @error('name')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="hidden" name="oldImage" value="{{ $user->image }}">
            @if($user->image)
            <img src="{{ asset('storage/' . $user->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
            @else
            <img class="img-preview img-fluid mb-3 col-sm-5">
            @endif          
            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
            @error('image')
            <div class="invalid-feedback"> 
              {{ $message }}
            </div>
            @enderror
          </div>

          <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" required autofocus value="{{ old('username', $user->username) }}">
            @error('username')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
  
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required value="{{ old('email', $user->email) }}">
            @error('email')
            <div class="invalid-feedback"> 
              {{ $message }}
            </div>
            @enderror
          </div>
          

        <div class="mb-3">
          <label for="no_tlp" class="form-label">No Telepon</label>
          <input type="text" class="form-control @error('no_tlp') is-invalid @enderror" id="no_tlp" name="no_tlp" required autofocus value="{{ old('no_tlp', $user->no_tlp) }}">
          @error('no_tlp')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="alamat" class="form-label">Alamat</label>
          <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" required autofocus value="{{ old('alamat', $user->alamat) }}">
          @error('alamat')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="pekerjaan" class="form-label">Pekerjaan</label>
          <input type="text" class="form-control @error('pekerjaan') is-invalid @enderror" id="pekerjaan" name="pekerjaan" required autofocus value="{{ old('pekerjaan', $user->pekerjaan) }}">
          @error('pekerjaan')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>


        
        <button type="submit" class="btn btn-primary">Update Post</button>
      </form>
  </div>

  <script>

      document.addEventListener('trix-file-accept', function(e){
        e.preventDefault();
      })

      function previewImage(){
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
          imgPreview.src = oFREvent.target.result;
        }
      }
  </script>
@endsection