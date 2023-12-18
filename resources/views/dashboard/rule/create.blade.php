@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create New Rule</h1>
  </div> 

  <div class="col-lg-8">
      <form method="post" action="/dashboard/rules" class="mb-5" enctype="multipart/form-data"> 
        @csrf
        <div class="mb-3">
        <input type="hidden" name="disease" value="{{ request('disease') }}">
    
            <div class="form-group {{ $errors->has('disease') ? 'has-error' : '' }}">
              <label>Penyakit</label>
              <select name="disease" class="form-select">
                <option value="">--pilih--</option>
                @foreach($diseases as $data)
                  @if(request('disease') == $data->id)
                    <option value="{{ $data->id }}" selected>{{ Str::title($data->kd) }}</option>
                  @else
                    <option value="{{ $data->id }}">{{ Str::title($data->kd) }}</option>
                  @endif
                @endforeach
              </select>
            </div>
        </div>
         <div class="form-group {{ $errors->has('symptom') ? 'has-error' : '' }}">
              <label>Gejala</label>
              <select name="symptom" class="form-select">
                <option value="">--pilih--</option>
                @foreach($symptoms as $data)
                  @if(old('symptom') == $data->kd)
                    <option value="{{ $data->id }}" selected>{{ Str::title($data->kd) }}</option>
                  @else
                    <option value="{{ $data->id }}">{{ Str::title($data->kd) }}</option>
                  @endif
                @endforeach
              </select>
            </div>
        <div class="mb-3">
          <label for="bobot" class="form-label">Bobot</label>
          <input type="text" class="form-control @error('bobot') is-invalid @enderror" id="bobot" name="bobot" required value="{{ old('bobot') }}">
          @error('bobot')
          <div class="invalid-feedback"> 
            {{ $message }}
          </div>
          @enderror
        </div>
        
        <a href="/dashboard/rules" class="btn btn-success"><span data-feather="arrow-left"></span> Back to all rules</a>
        <button type="submit" class="btn btn-primary">Create Rule</button>
      </form>
  </div>

@endsection