<?php


function index(){
	include_once ROOT_DIR.'/resources/views/admin/users/index.php';
}

function create(){
	dd('hello wrold');
}

function show($id){
	dd('show'.$id);
}
