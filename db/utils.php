<?php
require_once 'inc/constants.php';

function store_user($user_details){
	$current_db_data = get_db();
	$current_db_data['users'][] = $user_details;
	
	if (user_exists($user_details, $current_db_data['users'])) {
		$error_msg = "User with such email exists";
		redirect(REGISTRATION_PAGE, ['error' => $error_msg]);
		exit;
		return false;
	}
	
	return set_db($current_db_data);
}

function user_exists($user_details, $users){
	foreach ($users as $key => $user) {
		if ($user['email'] === $user_details['email']) {
			return true;
		}
	}
	return false;
}

function set_db($db_data){
	try {
		set_json(DB_PATH, $db_data);
		return true;
	} catch (Exception $e) {
		return false;
	}
}

function set_json($path, $data){
	$json_data_string = json_encode($data, JSON_PRETTY_PRINT);
	file_put_contents($path, $json_data_string);
}

function get_db(){
    return json_decode(file_get_contents(DB_PATH), true);
}