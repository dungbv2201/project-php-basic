<?php


function index(){
	return renderView('admin/users/index', [
		"title" => "users",
	]);
}

function create(){
	return renderView('admin/users/create', [
		"title" => "users create",
	]);
}

function show($id){
	dd('show'.$id);
}
