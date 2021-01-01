<?php
require_once 'inc/constants.php';

function store_user($user_details){
	$current_db_data = get_db();
	$current_db_data['users'][] = $user_details;
	set_db($current_db_data);
}

function set_db($db_data){
	$json_data_string = json_encode($db_data, JSON_PRETTY_PRINT);
	
	file_put_contents(DB_PATH, $json_data_string);
}

function get_db(){
    return json_decode(file_get_contents(DB_PATH), true);
}