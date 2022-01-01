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
			<header>
				<h2>Sign In</h2>
				<span class="invalid">
				<?= $_SESSION['loginFail'] ?? null ?>
			</span>
			</header>
			<form action="/admin/login" method="POST">
				<div class="form-group d-block">
					<label for="email">Email <span class="required">*</span></label>
					<input
						type="text"
						class="form-control"
						id="email"
						autocomplete="off"
						value="<?= old('email')?>"
						name="email"/>
					<?= renderError('email')?>
				</div>
				<div class="form-group d-block">
					<label for="password">Password <span class="required">*</span></label>
					<input
						type="password"
						id="password"
						autocomplete="off"
						name="password"
						value="<?= old('password')?>"
						class="form-control" />
					<?= renderError('password')?>
				</div>
<!--				<div class="form-group">-->
<!--					<input type="checkbox" class="" id="remember-me"name="password"/>-->
<!--					<label style="margin:0;margin-left: 5px" for="remember-me">Remember me</label>-->
<!--				</div>-->
				<button>Submit</button>
			</form>
		</div>
	</section>
</body>
</html>
<?php
	unset($_SESSION['errorsValidate']);
	unset($_SESSION['oldData']);
	unset($_SESSION['loginFail']);
?>
