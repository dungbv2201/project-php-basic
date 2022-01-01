<?php
/**
 * @var $admins
 * */
?>

<div class="content">
	<div class="content__logo">
		<a href="/admin/users/create">
			<span class="icon">
			<ion-icon name="add-circle-outline"></ion-icon>
		</span>
		</a>
	</div>
	<div class="wrap-table">
		<div class="wrap-search">
			<div></div>
			<div class="form-control">
				<input
					id="input-search"
					type="text"
					placeholder="Search records">
			</div>
		</div>
		<table class="table">
			<thead>
			<tr>
				<th>#</th>
				<th>Full name</th>
				<th>Email</th>
				<th>Role</th>
				<th>Created at</th>
				<th style="width: 130px">Action</th>
			</tr>
			</thead>
			<tbody>
			<tr>
				<?php foreach ($admins as $key=> $admin): ?>
					<td><?= $admin->id ?></td>
					<td><?= $admin->first_name." ".$admin->last_name ?></td>
					<td><?= $admin->email ?></td>
					<td><?= $admin->role_name ?></td>
					<td><?= date_format(date_create($admin->created_at), "Y/m/d") ?></td>
					<td class="action">
						<button class="btn btn-warning">Edit</button>
						<?php if(authUser()['id'] !== $admin->id):?>
						<button class="btn btn-danger">Delete</button>
						<?php endif; ?>
					</td>
				<?php endforeach; ?>
			</tr>
			</tbody>
		</table>
	</div>
</div>
