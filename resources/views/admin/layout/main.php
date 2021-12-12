<?php
/**
 * @var $title
 * @var $styles
 * @var $scripts
 */
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title><?= $title ?? '' ?></title>
	<link rel="stylesheet" href="<?=assets('/styles/admin/app.css') ?>">
	<?php
		foreach ($styles as $style):
	?>
		<link rel="stylesheet" href="<?=assets($style) ?>">
	<?php endforeach; ?>
</head>
<body>
<div class="container">
	<?php include_once "sidebar.php"?>
	<main>
		<?php include_once "header-menu.php"?>
		{{content}}
	</main>
</div>
<script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
<?php
foreach ($scripts as $script):
	?>
	<link rel="stylesheet" href="<?=assets($script) ?>">
<?php endforeach; ?>
</body>
</html>
