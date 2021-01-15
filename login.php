<?php
session_start();

require_once 'db/utils.php';
require_once 'inc/constants.php';
require 'inc/utils.php';

$tab_title = 'Sign in';
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
		$user = get_user($email, 'email');
		$validPassword = password_verify($password, $user['password']);
		
		if ($user && $validPassword) {
			$_SESSION['logged'] = true;
//			setcookie('logged', true);
			redirect(HOMEPAGE);
		} else {
			redirect(LOGIN_PAGE, ['error' => "Either not user exists or password is not valid"]);
		}
	}

}
?>

<?php include 'components/heading.php';?>

	<?php echo sanitize($_REQUEST['error'] ?? '') ?>
	<?php include 'components/login-form.php';?>

<?php include 'components/ending.php';?>
