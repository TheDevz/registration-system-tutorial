<?php

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
		$errors['firstname'] = 'First name is required';
	} else if (!preg_match("/^[a-zA-Z-' ]*$/", $firstname)) {
		$errors['firstname'] = "Only letters and white space allowed";
	}
	if (empty($email)) {
		$errors['email'] = 'Email is required';
	} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$errors['email'] = 'Email must be valid';
	}
	if (empty($password)) {
		$errors['password'] = 'Password is required';
	} else if (strlen($password) < 8 || strlen($password) > 35) {
		$errors['password'] = 'Password should have between 8 and 20 characters';
	}

	if (empty($confirmPassword)) {
		$errors['confirmPassword'] = 'Confirmation of password is required';
	}
	if ($password && $confirmPassword && strcmp($password, $confirmPassword) !== 0) {
		$errors['confirmPassword'] = 'Your password must match the password you created first';
	}
	if (empty($errors)) {
		redirect("index.php?logged=0");
	}
}

function redirect($url) {
	header("Location: $url");
}

function sanitize($data) {
	$data = trim($data);
	$data = stripcslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

?>

<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<title>Sign up</title>
	</head>
	<body>
		<div class="container">
		 	<div class="row justify-content-center" style="margin-top: 80px">
				<div class="col-6">
					<div class="card">
						<div class="card-body">
							<h1 class="text-center">Sign up</h1>
							<form action="<?php echo sanitize($_SERVER['PHP_SELF']); ?>" method="post">
								<div class="row justify-content-center">
									<div class="col-6">
										<div class="form-group">
											<label for="firstname">Firstname</label>
											<input type="text" name="firstname"
											class="form-control <?php echo isset($errors['firstname']) ? 'is-invalid' : '' ?>" >
											<div class="invalid-feedback">
												<?php echo $errors['firstname'] ?? '' ?>
											</div>
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
											<label for="lastname">Lastname</label>
											<input type="text"  name="lastname" class="form-control <?php echo isset($errors['lastname']) ? 'is-invalid' : '' ?>">
											<div class="invalid-feedback">
												<?php echo $errors['lastname'] ?? '' ?>
											</div>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">Email address</label>
									<input type="text"
									class="form-control <?php echo isset($errors['email']) ? 'is-invalid' : '' ?>"
									id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
									<div class="invalid-feedback">
										<?php echo $errors['email'] ?? '' ?>
									</div>
									<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1">Password</label>
									<input type="password"
									class="form-control <?php echo isset($errors['password']) ? 'is-invalid' : '' ?>"
									id="exampleInputPassword1" name="password">
									<div class="invalid-feedback">
										<?php echo $errors['password'] ?? '' ?>
									</div>
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1">Confirm Password</label>
									<input type="password"
									class="form-control <?php echo isset($errors['confirmPassword']) ? 'is-invalid' : '' ?>"
									id="exampleInputPassword1" name="confirmPassword">
									<div class="invalid-feedback">
										<?php echo $errors['confirmPassword'] ?? '' ?>
									</div>
								</div>
								<button type="submit" class="btn btn-primary" name="register">Sign up</button>
							</form>
						</div>
						<div class="card-footer">
							<p>Have an account? <a href="login.php" class="link-primary">Sing in</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- jQuery and Bootstrap Bundle (includes Popper) -->
		<script src="js/jquery-3.5.1.slim.min.js"></script>
		<script src="js/bootstrap.bundle.min.js" ></script>
	</body>
</html>
