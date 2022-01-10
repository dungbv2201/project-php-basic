<?php


function index(){
	$smt = connectDb()->prepare("
		SELECT admins.*, roles.name as role_name
		FROM admins 
		INNER JOIN roles 
		ON admins.role_id = roles.id
	");
	$smt->execute();
	$admins = $smt->fetchAll(PDO::FETCH_OBJ);

	return renderView('/admin/users/index',compact('admins'), [
		'title' => 'users'
	]);
}

function create(){
	return renderView('admin/users/create', [
		"title" => "users create",
	]);
}

function store(){
	$data = getDataRequest();
	$fails = validate([
		'first_name' => ['required'],
		'last_name' => ['required'],
		'email' => ['required', 'email'],
		'password' => ['required'],
	], $data);
	if(!$fails){
		return back();
	}
	return renderView('admin/users/create', [
		"title" => "users create",
	]);
}

function show($id){
	dd('show'.$id);
}
