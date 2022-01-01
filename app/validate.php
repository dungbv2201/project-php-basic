<?php
define('MESSAGE_VALIDATE', [
	'required' => 'This filed is required',
	'max' => 'This field must be at least :max characters.'
]);

function validate($rules, $data ){
	$_SESSION['errorsValidate'] = [];
	$_SESSION['oldData'] = [];
	foreach ($rules as $key => $rule){
		foreach ($rule as  $callback){
			$agr = explode(':', $callback);
			if(count($agr) > 1){
				$invalid = call_user_func($agr[0],$data[$key] ?? null,$agr[1]);
			}else{
				$invalid = call_user_func($callback,$data[$key] ?? null, $key);
			}
			if($invalid){
				$_SESSION['errorsValidate'][$key][] = $invalid;
			}
		}
	}

	return empty($_SESSION['errorsValidate']);
}

function required($value, $arg){
	$msg = null;
	if($value != 0 || !$value){
		$msg =  MESSAGE_VALIDATE['required'];
	}
	return $msg;
}

function email($value, $arg){
	$msg = null;
	if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
		$msg = "Invalid email format";
	}
	return $msg;
}
