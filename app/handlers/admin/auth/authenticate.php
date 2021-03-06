<?php

function index(){
	include_once ROOT_DIR.'/resources/views/admin/auth/login.php';
}

function singIn(){
	$data = getDataRequest();
	$fails = validate([
		'email' => ['required'],
		'password' => ['required']
	], $data);
	if(!$fails){
		return back();
	}
	$smt = connectDb()->prepare("SELECT * FROM admins WHERE email = ?");
	$smt->execute([$data['email']]);
	$admin = $smt->fetch(PDO::FETCH_OBJ);

	if(password_verify($data['password'], $admin->password ?? null)){
		setSession(AUTH, [
			"user" => $admin->email,
			"fullName" => $admin->first_name.' '.$admin->last_name,
			"id" => $admin->id
		]);
		return redirect('/admin/users');
	}
	setOldData($data);
	setSession(LOGIN_FAIL, 'Email or password is not correct');
	return back();
}

function signOut(){
	if(authUser()['id']){
		session_destroy();
		return redirect('/admin/login');
	}
}
