<style>
	#uni_modal .modal-footer {
		display: none;
	}
</style>
<div class="container-fluid">
	<dl>
		<dt class="text-muted">Full Name</dt>
		<dd class="pl-4">
			<?= $data['user']->firstname . ' ' . $data['user']->middlename . ' ' . $data['user']->lastname ?>
		</dd>

		<dt class="text-muted">Username</dt>
		<dd class="pl-4"><?= $data['user']->username ?></dd>

		<dt class="text-muted">User Type</dt>
		<dd class="pl-4">
			<?php if ($data['user']->type == 1): ?>
				<span class="badge badge-primary px-3 rounded-pill">Admin</span>
			<?php else: ?>
				<span class="badge badge-secondary px-3 rounded-pill">Staff</span>
			<?php endif; ?>
		</dd>

		<dt class="text-muted">Status</dt>
		<dd class="pl-4">
			<!-- <?php if ($data['user']->status == 1): ?>
				<span class="badge badge-success px-3 rounded-pill">Active</span>
			<?php else: ?>
				<span class="badge badge-danger px-3 rounded-pill">Inactive</span>
			<?php endif; ?> -->
		</dd>
	</dl>
</div>
<hr class="mx-n3">
<div class="text-right pt-1">
	<button class="btn btn-sm btn-flat btn-light bg-gradient-light border" type="button" data-dismiss="modal">
		<i class="fa fa-times"></i> Close
	</button>
</div>
