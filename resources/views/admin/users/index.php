<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	<link rel="stylesheet" href="<?=assets('/styles/admin/app.css') ?>">
</head>
<body>
<div class="container">
	<aside>
		<ul class="sidebar">
			<li class="brand">
                <span class="icon">
                       <ion-icon name="git-branch"></ion-icon>
                </span>
                <span class="title">TEAM 12</span>
            </li>
			<li class="sidebar-item active">
				<span class="icon"><ion-icon name="home" /></span>
				<span class="title">Dashboard</span>
			</li class="sidebar-item">
			<li class="sidebar-item">
				<span class="icon"><ion-icon name="person" /></span>
				<span class="title">Users</span>
			</li>
			<li class="sidebar-item">
                <span class="icon"><ion-icon name="cube" /></span>
                <span class="title">Product</span>
            </li>
		</ul>
	</aside>
    <main>
        <nav class="navbar">
            <ul>
                <li class="page-title">User</li>
                <li>User</li>
                <li>User</li>
                <li>User</li>
            </ul>
        </nav>
		<div class="content">
			<div class="content__logo">
				<span class="icon">
					<ion-icon name="add-circle-outline"></ion-icon>
				</span>
			</div>
			<div class="wrap-table">
				<div class="wrap-search">
					<div><input type="text"></div>
					<div class="form-control">
						<input type="text" placeholder="Search records">
					</div>
				</div>
				<table class="table">
					<thead>
						<tr>
							<th>Name</th>
							<th>Age</th>
							<th>Gender</th>
						</tr>
					</thead>
					<tbody>
					<tr>
						<td>22</td>
						<td>22</td>
						<td>22</td>
					</tr>
					<tr>
						<td>22</td>
						<td>22</td>
						<td>22</td>
					</tr>
					<tr>
						<td>22</td>
						<td>22</td>
						<td>22</td>
					</tr>
					<tr>
						<td>22</td>
						<td>22</td>
						<td>22</td>
					</tr>
					</tbody>
				</table>
			</div>
		</div>
    </main>
</div>
<script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
</body>
</html>
