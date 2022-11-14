


<?php $__env->startSection('content'); ?>

<div class="card">
	<div class="card-header">Edit Teacher</div>
	<div class="card-body">
		<form method="post" action="<?php echo e(route('teachers.update', $teacher->id)); ?>" enctype="multipart/form-data">
			<?php echo csrf_field(); ?>
			<?php echo method_field('PUT'); ?>
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">Teacher Name</label>
				<div class="col-sm-10">
					<input type="text" name="teacher_name" class="form-control" value="<?php echo e($teacher->teacher_name); ?>" />
				</div>
			</div>
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">Teacher Email</label>
				<div class="col-sm-10">
					<input type="text" name="teacher_email" class="form-control" value="<?php echo e($teacher->teacher_email); ?>" />
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
					<img src="<?php echo e(asset('images/' . $teacher->teacher_image)); ?>" width="100" class="img-thumbnail" />
					<input type="hidden" name="hidden_teacher_image" value="<?php echo e($teacher->teacher_image); ?>" />
				</div>
			</div>
			<div class="text-center">
				<input type="hidden" name="hidden_id" value="<?php echo e($teacher->id); ?>" />
				<input type="submit" class="btn btn-primary" value="Edit" />
			</div>	
		</form>
	</div>
</div>
<script>
document.getElementsByName('teacher_gender')[0].value = "<?php echo e($teacher->teacher_gender); ?>";
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel9\laravel_9_crud\resources\views/all_teachers/edit.blade.php ENDPATH**/ ?>