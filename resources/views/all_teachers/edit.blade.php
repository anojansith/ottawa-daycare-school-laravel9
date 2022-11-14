
@extends('master')

@section('content')

<div class="card">
	<div class="card-header">Edit Teacher</div>
	<div class="card-body">
		<form method="post" action="{{ route('teachers.update', $teacher->id) }}" enctype="multipart/form-data">
			@csrf
			@method('PUT')
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">Teacher Name</label>
				<div class="col-sm-10">
					<input type="text" name="teacher_name" class="form-control" value="{{ $teacher->teacher_name }}" />
				</div>
			</div>
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">Teacher Email</label>
				<div class="col-sm-10">
					<input type="text" name="teacher_email" class="form-control" value="{{ $teacher->teacher_email }}" />
				</div>
			</div>
			<div class="row mb-4">
				<label class="col-sm-2 col-label-form">Teacher Gender</label>
				<div class="col-sm-10">
					<select name="teacher_gender" class="form-control">
						<option value="Male">Male</option>
						<option value="Female">Female</option>
					</select>
				</div>
			</div>
			<div class="row mb-4">
				<label class="col-sm-2 col-label-form">Teacher Image</label>
				<div class="col-sm-10">
					<input type="file" name="teacher_image" />
					<br />
					<img src="{{ asset('images/' . $teacher->teacher_image) }}" width="100" class="img-thumbnail" />
					<input type="hidden" name="hidden_teacher_image" value="{{ $teacher->teacher_image }}" />
				</div>
			</div>
			<div class="text-center">
				<input type="hidden" name="hidden_id" value="{{ $teacher->id }}" />
				<input type="submit" class="btn btn-primary" value="Edit" />
			</div>	
		</form>
	</div>
</div>
<script>
document.getElementsByName('teacher_gender')[0].value = "{{ $teacher->teacher_gender }}";
</script>

@endsection('content')