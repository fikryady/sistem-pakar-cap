@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit symptom</h1>
  </div> 

  <div class="col-lg-8">
      <form method="post" action="/dashboard/symptoms/{{ $symptom->slug }}" class="mb-5" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-3">
          <label for="kd" class="form-label">Kode Penyakit</label>
          <input type="text" class="form-control @error('kd') is-invalid @enderror" id="kd" name="kd" required autofocus value="{{ old('kd', $symptom->kd) }}" autocomplete="off">
          @error('kd')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="nama" class="form-label">Nama Penyakit</label>
          <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" required autofocus value="{{ old('nama', $symptom->nama) }}" autocomplete="off">
          @error('nama')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="slug" class="form-label">Slug</label>
          <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" required value="{{ old('slug', $symptom->slug) }}" autocomplete="off">
          @error('slug')
          <div class="invalid-feedback"> 
            {{ $message }}
          </div>
          @enderror
        </div>
        
        <a href="/dashboard/symptoms" class="btn btn-success"><span data-feather="arrow-left"></span> Back to all Symptoms</a>
        <button type="submit" class="btn btn-primary">Update Symptom</button>
      </form>
  </div>

  <script>
      const nama = document.querySelector('#nama');
      const slug = document.querySelector('#slug');

      nama.addEventListener('change', function(){
          fetch('/dashboard/symptoms/checkSlug?nama=' + nama.value)
          .then(response => response.json())
          .then(data => slug.value = data.slug)
      });

      
  </script>
@endsection