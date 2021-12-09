<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Login</title>
	<link rel="stylesheet" href="<?=assets('/styles/admin/app.css') ?>">
	<link rel="stylesheet" href="<?=assets('/styles/admin/login.css') ?>">
</head>
<body>
	<section>
		<div class="login">
			<h2>Login</h2>
			<form action="">
				<div class="form-group d-block">
					<label for="">Email <span class="required">*</span></label>
					<input type="text" class="form-control" />
				</div>
				<div class="form-group d-block">
					<label for="">Password <span class="required">*</span></label>
					<input type="text" class="form-control" />
				</div>
				<div class="form-group">
					<input type="checkbox" class="" id="remember-me"/>
					<label style="margin:0;margin-left: 5px" for="remember-me">Remember me</label>
				</div>
				<button>Login</button>
			</form>
		</div>
	</section>
</body>
</html>
