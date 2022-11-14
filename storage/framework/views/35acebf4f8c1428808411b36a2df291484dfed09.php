



<?php $__env->startSection('content'); ?>

<?php if($message = Session::get('success')): ?>

<div class="alert alert-success">
	<?php echo e($message); ?>

</div>

<?php endif; ?>

<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col col-md-6"><b>Teacher Data</b></div>
			<div class="col col-md-6">
				<a href="<?php echo e(route('teachers.create')); ?>" class="btn btn-success btn-sm float-end">Add</a>
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
			<?php if(count($teachers) > 0): ?>

				<?php $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

					<tr>
						<td><img src="<?php echo e(asset('images/' . $teacher->teacher_image)); ?>" width="75" /></td>
						<td><?php echo e($teacher->teacher_name); ?></td>
						<td><?php echo e($teacher->teacher_email); ?></td>
						<td><?php echo e($teacher->teacher_gender); ?></td>
						<td>
							<form method="post" action="<?php echo e(route('teachers.destroy', $teacher->id)); ?>">
								<?php echo csrf_field(); ?>
								<?php echo method_field('DELETE'); ?>
								<a href="<?php echo e(route('teachers.show', $teacher->id)); ?>" class="btn btn-primary btn-sm">View</a>
								<a href="<?php echo e(route('teachers.edit', $teacher->id)); ?>" class="btn btn-warning btn-sm">Edit</a>
								<input type="submit" class="btn btn-danger btn-sm" value="Delete" />
							</form>
							
						</td>
					</tr>

				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

			<?php else: ?>
				<tr>
					<td colspan="5" class="text-center">No Data Found</td>
				</tr>
			<?php endif; ?>
		</table>
		<?php echo $teachers->links(); ?>

	</div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel9\laravel_9_crud\resources\views/all_teachers/index.blade.php ENDPATH**/ ?>