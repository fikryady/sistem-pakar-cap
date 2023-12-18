@extends('layouts.main')

@section('container')
    <div class="panel panel-success">
        <div class="panel-heading">Konsultasi > Pilih Gejala</div>

        <div class="panel-body">
            <form action="{{ Request::is('/konsultasi/gejala') ? 'active' : '' }}" method="post">
				@csrf
				
            	<input type="hidden" name="nama" value="{{ old('nama', session('_old_input')['nama']) }}">
            	<input type="hidden" name="alamat" value="{{ old('alamat', session('_old_input')['alamat']) }}">
            	<input type="hidden" name="pekerjaan" value="{{ old('pekerjaan', session('_old_input')['pekerjaan']) }}">

				<div class="panel-body">
					<div class="form-group {{ $errors->has('symptom') ? 'has-error' : '' }}">
						<label class="control-label">Gejala</label>

						@foreach($symptoms as $symptom)
							<div class="checkbox">
								<label>
									<input type="checkbox" name="symptom[]" value="{{ $symptom->id }}">
									{{ $symptom->nama }}
								</label>
							</div>
						@endforeach
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

@push('css')
	<link href="/css/select2.min.css" rel="stylesheet">
@endpush

@push('js')
	<script src="/js/select2.min.js"></script>
	<script>
		$(document).ready(function(){
			$('#symptom').select2({
				placeholder : 'Pilih Gejala',
				allowClear: true
			});
		});		
	</script>
@endpush