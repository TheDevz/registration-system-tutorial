<?php
require 'inc/utils.php';
require 'inc/constants.php';

$errors = [];

$firstname = '';
$lastname = '';
$email = '';
$password = '';
$confirmPassword = '';

/*
Firstname string
Lastname string
Email should be email
Password should be more than 8 max 35
Confirm shoud be the same as password
 */

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	$firstname = sanitize($_POST['firstname']) ?? '';
	$lastname = sanitize($_POST['lastname']) ?? '';
	$email = sanitize($_POST['email']) ?? '';
	$password = sanitize($_POST['password']) ?? '';
	$confirmPassword = sanitize($_POST['confirmPassword']) ?? '';

	if (empty($firstname)) {
		$errors['firstname'] = 'First name' . IS_REQUIRED;
	} else if (!preg_match("/^[a-zA-Z-' ]*$/", $firstname)) {
		$errors['firstname'] = "Only letters and white space allowed";
	}
	if (empty($email)) {
		$errors['email'] = 'Email' . IS_REQUIRED;
	} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$errors['email'] = 'Email must be valid';
	}
	if (empty($password)) {
		$errors['password'] = 'Password' . IS_REQUIRED;
	} else if (strlen($password) < 8 || strlen($password) > 35) {
		$errors['password'] = 'Password should have between 8 and 20 characters';
	}

	if (empty($confirmPassword)) {
		$errors['confirmPassword'] = 'Confirmation of password' . IS_REQUIRED;
	}
	if ($password && $confirmPassword && strcmp($password, $confirmPassword) !== 0) {
		$errors['confirmPassword'] = 'Your password must match the password you created first';
	}
	if (empty($errors)) {
		redirect(HOMEPAGE . "?logged=0");
	}
}

?>
<?php include 'components/heading.php';?>

	<?php require 'components/register-form.html';?>

<?php include 'components/ending.php';?>

