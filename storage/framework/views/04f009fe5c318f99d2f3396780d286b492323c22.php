


<?php $__env->startSection('content'); ?>

<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col col-md-6"><b>Teacher Details</b></div>
			<div class="col col-md-6">
				<a href="<?php echo e(route('teachers.index')); ?>" class="btn btn-primary btn-sm float-end">View All</a>
			</div>
		</div>
	</div>
	<div class="card-body">
		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Teacher Name</b></label>
			<div class="col-sm-10">
				<?php echo e($teacher->teacher_name); ?>

			</div>
		</div>
		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Teacher Email</b></label>
			<div class="col-sm-10">
				<?php echo e($teacher->teacher_email); ?>

			</div>
		</div>
		<div class="row mb-4">
			<label class="col-sm-2 col-label-form"><b>Teacher Gender</b></label>
			<div class="col-sm-10">
				<?php echo e($teacher->teacher_gender); ?>

			</div>
		</div>
		<div class="row mb-4">
			<label class="col-sm-2 col-label-form"><b>Teacher Image</b></label>
			<div class="col-sm-10">
				<img src="<?php echo e(asset('images/' .  $teacher->teacher_image)); ?>" width="200" class="img-thumbnail" />
			</div>
		</div>
	</div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel9\laravel_9_crud\resources\views/all_teachers/show.blade.php ENDPATH**/ ?>