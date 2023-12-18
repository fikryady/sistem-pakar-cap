@extends('layouts.main')

@section('container')
    <div class="panel panel-success">
        <div class="panel-heading">Konsultasi</div>

        <div class="panel-body">
            <form action="{{ Request::is('/konsultasi/gejala') ? 'active' : '' }}" method="get">
				<div class="panel-body">
					<div class="form-group {{ $errors->has('nama') ? 'has-error' : '' }}">
						<label>Nama</label>
						<input type="text" class="form-control" name="nama" value="{{ old('nama') }}" autocomplete="off">
					</div>

					<div class="form-group {{ $errors->has('alamat') ? 'has-error' : '' }}">
						<label>Alamat</label>
						<input type="text" class="form-control" name="alamat" value="{{ old('alamat') }}" autocomplete="off">
					</div>

					<div class="form-group {{ $errors->has('pekerjaan') ? 'has-error' : '' }}">
						<label>Pekerjaan</label>
						<input type="text" class="form-control" name="pekerjaan" value="{{ old('pekerjaan') }}" autocomplete="off">
					</div>
				</div>
				<div class="panel-footer">
					<button type="submit" class="btn btn-success">Next</button>
				</div>
			</form>

			@if($errors->all())
				@include('layouts._formError')
			@endif
        </div>
    </div>
@endsection
