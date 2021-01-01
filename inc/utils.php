<?php

function redirect($url) {
	header("Location: $url");
}

function sanitize($data) {
	$data = trim($data);
	$data = stripcslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

function prettyDump($variable){
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
}