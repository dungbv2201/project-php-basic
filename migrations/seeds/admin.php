<?php
function createRole(){
	$pdo = connectDb();
	$smt = $pdo->prepare("
		INSERT INTO roles (type, name) VALUES (1,'supper admin'), (2, 'admin')
	");
	$smt->execute();
	return $pdo->lastInsertId();
}

function adminSeed(){
	$pdo = connectDb();
	$smt = $pdo->prepare("SELECT * FROM admins where email = 'admin@gmail.com'");
	$smt->execute();
	$user = $smt->fetch(PDO::FETCH_OBJ);
	if(!empty($user)){
		return "User exist";
	}
	$roleId = createRole();
	$smt = $pdo->prepare("
		INSERT INTO admins  (first_name, last_name, email, password, role_id) VALUES (?, ?, ?, ?, ?)
	");
	$smt->execute([
		'Dũng',
		'Bùi',
		'admin@gmail.com',
		password_hash('admin123', PASSWORD_DEFAULT),
		$roleId
	]);
	return "success";
}
