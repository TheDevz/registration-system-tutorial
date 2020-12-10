<?php

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
		<title>Sign in</title>
	</head>
	<body>
		<div class="container">
			<div class="row justify-content-center" style="margin-top: 50px">
				<div class="col-6">
					<div class="card">
						<div class="card-body">
							<h1 class="text-center">Sign in</h1>
							<form action="login.php" method="post">
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
									<input type="password" class="form-control <?php echo isset($errors['password']) ? 'is-invalid' : '' ?>" id="exampleInputPassword1" name="password">
									<div class="invalid-feedback">
										<?php echo $errors['password'] ?? '' ?>
									</div>
								</div>

								<button type="submit" class="btn btn-primary" name="login">Sign in</button>

							</form>
						</div>
						<div class="card-footer">
							<p>Don't have an account? <a href="register.php" class="link-primary">Sing up</a></p>
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