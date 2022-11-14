

@extends('master')

@section('content')

@if($message = Session::get('success'))

<div class="alert alert-success">
	{{ $message }}
</div>

@endif

<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col col-md-6"><b>Teacher Data</b></div>
			<div class="col col-md-6">
				<a href="{{ route('teachers.create') }}" class="btn btn-success btn-sm float-end">Add</a>
			</div>
		</div>
	</div>
	<div class="card-body">
		<table class="table table-bordered">
			<tr>
				<th>Image</th>
				<th>Name</th>
				<th>Email</th>
				<th>Gender</th>
				<th>Action</th>
			</tr>
			@if(count($teachers) > 0)

				@foreach($teachers as $teacher)

					<tr>
						<td><img src="{{ asset('images/' . $teacher->teacher_image) }}" width="75" /></td>
						<td>{{ $teacher->teacher_name }}</td>
						<td>{{ $teacher->teacher_email }}</td>
						<td>{{ $teacher->teacher_gender }}</td>
						<td>
							<form method="post" action="{{ route('teachers.destroy', $teacher->id) }}">
								@csrf
								@method('DELETE')
								<a href="{{ route('teachers.show', $teacher->id) }}" class="btn btn-primary btn-sm">View</a>
								<a href="{{ route('teachers.edit', $teacher->id) }}" class="btn btn-warning btn-sm">Edit</a>
								<input type="submit" class="btn btn-danger btn-sm" value="Delete" />
							</form>
							
						</td>
					</tr>

				@endforeach

			@else
				<tr>
					<td colspan="5" class="text-center">No Data Found</td>
				</tr>
			@endif
		</table>
		{!! $teachers->links() !!}
	</div>
</div>

@endsection
