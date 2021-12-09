<?php

function auth(){
    if($_SESSION['auth'] ?? false){
		return true;
    }
	header('Location: /admin/login');
	return false;
}
