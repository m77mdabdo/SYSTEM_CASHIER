<style>
	.category-img {
		width: 3em;
		height: 3em;
		object-fit: cover;
		object-position: center center;
	}
</style>
<?php require_once('inc/header.php') ?>

<body class="sidebar-mini layout-fixed control-sidebar-slide-open layout-navbar-fixed sidebar-mini-md sidebar-mini-xs text-sm" style="height: auto;">
	<div class="wrapper">
		<?php require_once('inc/navigation.php') ?>

		<div class="container-fluid">
			<form action="" id="user-form">
				<div class="form-group">
					<label for="firstname" class="control-label">First Name</label>
					<input type="text" name="firstname" id="firstname" class="form-control form-control-sm rounded-0" value="<?= isset($firstname) ? $firstname : '' ?>" required />
				</div>
				<div class="form-group">
					<label for="middlename" class="control-label">Middle Name</label>
					<input type="text" name="middlename" id="middlename" class="form-control form-control-sm rounded-0" value="<?= isset($middlename) ? $middlename : '' ?>" />
				</div>
				<div class="form-group">
					<label for="lastname" class="control-label">Last Name</label>
					<input type="text" name="lastname" id="lastname" class="form-control form-control-sm rounded-0" value="<?= isset($lastname) ? $lastname : '' ?>" required />
				</div>
				<div class="form-group">
					<label for="username" class="control-label">Username</label>
					<input type="text" name="username" id="username" class="form-control form-control-sm rounded-0" value="<?= isset($username) ? $username : '' ?>" required />
				</div>
				<div class="form-group">
					<label for="password" class="control-label">Password</label>
					<input type="password" name="password" id="password" class="form-control form-control-sm rounded-0" required />
				</div>
				<div class="form-group">
					<label for="type" class="control-label">User Type</label>
					<select name="type" id="type" class="form-control form-control-sm rounded-0" required>
						<option value="1" <?= isset($type) && $type == 1 ? 'selected' : '' ?>>Admin</option>
						<option value="2" <?= isset($type) && $type == 2 ? 'selected' : '' ?>>Staff</option>
					</select>
				</div>
				<div class="form-group">
					<label for="status" class="control-label">Status</label>
					<select name="status" id="status" class="form-control form-control-sm rounded-0" required>
						<option value="1" <?= isset($status) && $status == 1 ? 'selected' : '' ?>>Active</option>
						<option value="0" <?= isset($status) && $status == 0 ? 'selected' : '' ?>>Inactive</option>
					</select>
				</div>
				<div class="form-group text-right">
					<button class="btn btn-primary btn-sm rounded-0">Save User</button>
				</div>
			</form>
		</div>
	</div>

	<script>
		$(document).ready(function () {
			$('#user-form').submit(function (e) {
				e.preventDefault();
				var _this = $(this);
				$('.err-msg').remove();
				start_loader();
				$.ajax({
					url: _base_url_ + "user/createUser",
					data: new FormData(_this[0]),
					cache: false,
					contentType: false,
					processData: false,
					method: 'POST',
					dataType: 'json',
					error: err => {
						console.log(err)
						alert_toast("An error occurred", 'error');
						end_loader();
					},
					success: function (resp) {
						if (typeof resp == 'object' && resp.status == 'success') {
							alert_toast(resp.msg, 'success')
							location.reload()
						} else if (resp.status == 'failed' && !!resp.msg) {
							var el = $('<div>')
							el.addClass("alert alert-danger err-msg").text(resp.msg)
							_this.prepend(el)
							el.show('slow')
							$("html, body").scrollTop(0);
							end_loader()
						} else {
							alert_toast("An error occurred", 'error');
							end_loader();
							console.log(resp)
						}
					}
				})
			})
		})
	</script>

	<?php require_once('inc/footer.php') ?>
</body>
</html>
