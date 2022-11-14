
@extends('master')

@section('content')

<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col col-md-6"><b>Teacher Details</b></div>
			<div class="col col-md-6">
				<a href="{{ route('teachers.index') }}" class="btn btn-primary btn-sm float-end">View All</a>
			</div>
		</div>
	</div>
	<div class="card-body">
		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Teacher Name</b></label>
			<div class="col-sm-10">
				{{ $teacher->teacher_name }}
			</div>
		</div>
		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Teacher Email</b></label>
			<div class="col-sm-10">
				{{ $teacher->teacher_email }}
			</div>
		</div>
		<div class="row mb-4">
			<label class="col-sm-2 col-label-form"><b>Teacher Gender</b></label>
			<div class="col-sm-10">
				{{ $teacher->teacher_gender }}
			</div>
		</div>
		<div class="row mb-4">
			<label class="col-sm-2 col-label-form"><b>Teacher Image</b></label>
			<div class="col-sm-10">
				<img src="{{ asset('images/' .  $teacher->teacher_image) }}" width="200" class="img-thumbnail" />
			</div>
		</div>
	</div>
</div>

@endsection('content')
