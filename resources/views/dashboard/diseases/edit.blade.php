@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Disease</h1>
  </div> 

  <div class="col-lg-8">
      <form method="post" action="/dashboard/diseases/{{ $disease->slug }}" class="mb-5" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-3">
          <label for="kd" class="form-label">Kode Penyakit</label>
          <input type="text" class="form-control @error('kd') is-invalid @enderror" id="kd" name="kd" required autofocus value="{{ old('kd', $disease->kd) }}" autocomplete="off">
          @error('kd')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="nama" class="form-label">Nama Penyakit</label>
          <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" required autofocus value="{{ old('nama', $disease->nama) }}" autocomplete="off">
          @error('nama')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="slug" class="form-label">Slug</label>
          <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" required value="{{ old('slug', $disease->slug) }}" autocomplete="off">
          @error('slug')
          <div class="invalid-feedback"> 
            {{ $message }}
          </div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="image" class="form-label">Image</label>
          <input type="hidden" name="oldImage" value="{{ $disease->image }}">
          @if($disease->image)
          <img src="{{ asset('storage/' . $disease->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
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
          <label for="keterangan" class="form-label">Keterangan</label>
          @error('keterangan')
          <p class="text-danger">{{ $message }}</p>
          @enderror
          <input id="keterangan" type="hidden" name="keterangan" value="{{ old('keterangan', $disease->keterangan) }}" autocomplete="off">
          <trix-editor input="keterangan"></trix-editor>
        </div>

        <div class="mb-3">
          <label for="pengendalian" class="form-label">Pengendalian</label>
          @error('pengendalian')
          <p class="text-danger">{{ $message }}</p>
          @enderror
          <input id="pengendalian" type="hidden" name="pengendalian" value="{{ old('pengendalian', $disease->pengendalian) }}" autocomplete="off">
          <trix-editor input="pengendalian"></trix-editor>
        </div>
        <div class="mb-3">
          <label for="probabilitas" class="form-label">Nilai Probabilitas</label>
          <input type="decimal" class="form-control @error('probabilitas') is-invalid @enderror" id="probabilitas" name="probabilitas" required autofocus value="{{ old('probabilitas', $disease->probabilitas) }}" autocomplete="off">
          @error('probabilitas')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        
        <a href="/dashboard/diseases" class="btn btn-success"><span data-feather="arrow-left"></span> Back to all Diseases</a>
        <button type="submit" class="btn btn-primary">Update Disease</button>
      </form>
  </div>

  <script>
      const nama = document.querySelector('#nama');
      const slug = document.querySelector('#slug');

      nama.addEventListener('change', function(){
          fetch('/dashboard/diseases/checkSlug?nama=' + nama.value)
          .then(response => response.json())
          .then(data => slug.value = data.slug)
      });

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