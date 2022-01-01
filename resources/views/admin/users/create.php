<div class="content">
	<div class="wrap-table">
		<form action="/admin/users/store" method="post">
			<div class="form-group">
				<div class="col-2">
					<label for="first-name">First Name <span class="required">*</span></label>
				</div>
				<div class="col-5">
					<input
						type="text"
						class="form-control"
						id="first-name"
						value="<?= old('first_name')?>"
					>
				</div>
			</div>
			<div class="form-group">
				<div class="col-2">
					<label>Last Name <span class="required">*</span></label>
				</div>
				<div class="col-5">
					<input type="text" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<div class="col-2">
					<label>Email <span class="required">*</span></label>
				</div>
				<div class="col-5">
					<input type="text" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<div class="col-2">
					<label>Password <span class="required">*</span></label>
				</div>
				<div class="col-5">
					<input type="text" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<div class="col-2">
				</div>
				<button class="btn btn-primary">submit</button>
			</div>
		</form>
	</div>
</div>
