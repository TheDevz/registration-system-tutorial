<?php

require 'inc/utils.php';

$errors = [];

$email = '';
$password = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	$email = sanitize($_POST['email']) ?? '';
	$password = sanitize($_POST['password']) ?? '';

	if (empty($email)) {
		$errors['email'] = 'Email is required';
	} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$errors['email'] = 'Email must be valid';
	}
	if (empty($password)) {
		$errors['password'] = 'Password is required';
	} else if (strlen($password) < 8 || strlen($password) > 35) {
		$errors['password'] = 'Password should have between 8 and 35 characters';
	}

	if (empty($errors)) {
		redirect("index.php?logged=1");
	}

}
?>

<?php include 'components/heading.php';?>

	<?php include 'components/login-form.php';?>

<?php include 'components/ending.php';?>
