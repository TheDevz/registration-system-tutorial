<?php
include_once 'inc/constants.php';

function get_user($index){
    return get_users()[$index];
}

function get_user_by_property($value, $key){
	$users = get_users();

	foreach ($users as $user) {
		if ($user[$key] === $value) {
			return $user;
		}
	}

	return false;
}

function get_user_id_by_email($email){
	$users = get_users();

	for($i = 0; $i < count($users); $i++) {
	    $user = $users[$i];
		if ($user['email'] === $email) {
			return $i;
		}
	}

	return false;
}

function get_users(){
	return get_db()['users'];
}

function store_user($user_details){
	$current_db_data = get_db();
	$current_db_data['users'][] = $user_details;
	
	if (user_exists($user_details)) {
		$error_msg = "User with such email exists";
		redirect(REGISTRATION_PAGE, ['error' => $error_msg]);
		exit;
		return false;
	}
	
	return set_db($current_db_data);
}

function user_exists($user_details){
	return email_exists($user_details['email']);
}

function email_exists($email){
	$current_db_data = get_db();
	$users = $current_db_data['users'];
	foreach ($users as $key => $user) {
		if ($user['email'] === $email) {
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