<?php
$appropriateRequest = isset($_POST['register']) && count($_POST) === 6;

/*
Firstname string
Lastname string
Email should be email
Password should be more than 8 max 35
Confirm shoud be the same as password
 */

$firstname = $_POST['firstname'] ?? '';
$lastname = $_POST['lastname'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';
$confirmPassword = $_POST['confirmPassword'] ?? '';

$firstnameValid = !empty($firstname) && !is_numeric($firstname);
// $emailValid = !empty($email) && filter_var(trim($email), FILTER_VALIDATE_EMAIL);
$emailValid = !empty($email) && preg_match('/^[_a-z0-9-]+(\. [_a-z0-9-]+)*@[a-z0-9-]+(\. [a-z0-9-]+)*(\.[a-z]{2,3})$/', 'test@test.com');
$passwordValid = !empty($password) && preg_match('/[0-9]{8}/', $password);
$confirmPasswordValid = !empty($confirmPassword);

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
			<!-- <?php if (count($errors) > 0): ?>
				<div class="alert alert-danger" role="alert">
				  <?php foreach ($errors as $key => $error): ?>
				  	<?php echo $error . '<br>'; ?>
				  <?php endforeach?>
				</div>
			<?php endif?>-->
		 	<div class="row justify-content-center" style="margin-top: 80px">
				<div class="col-6">
					<div class="card">
						<div class="card-body">
							<h1 class="text-center">Sign up</h1>
							<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
							<!-- <form action="">
							<form> -->
								<div class="row justify-content-center">
									<div class="col-6">
										<div class="form-group">
											<label for="firstname">Firstname</label>
											<input type="text" name="firstname"
											class="form-control <?php echo !$firstnameValid && $appropriateRequest ? 'is-invalid' : '' ?>" >
											<?php if (!$firstnameValid && $appropriateRequest): ?>
												<div class="invalid-feedback">
													Firstname is invalid
												</div>
											<?php endif?>
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
											<label for="firstname">Lastname</label>
											<input type="text"  name="lastname" class="form-control">
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">Email address</label>
									<input type="text"
									class="form-control <?php echo !$emailValid && $appropriateRequest ? 'is-invalid' : '' ?>"
									id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
									<?php if (!$emailValid && $appropriateRequest): ?>
										<div class="invalid-feedback">
											Email is invalid
										</div>
									<?php endif?>
									<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1">Password</label>
									<input type="password"
									class="form-control <?php echo !$passwordValid && $appropriateRequest ? 'is-invalid' : '' ?>"
									id="exampleInputPassword1" name="password">
									<?php if (!$passwordValid && $appropriateRequest): ?>
										<div class="invalid-feedback">
											Password is invalid
										</div>
									<?php endif?>
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1">Confirm Password</label>
									<input type="password"
									class="form-control <?php echo !$confirmPasswordValid && $appropriateRequest ? 'is-invalid' : '' ?>"
									id="exampleInputPassword1" name="confirmPassword">
									<?php if (!$confirmPasswordValid && $appropriateRequest): ?>
										<div class="invalid-feedback">
											Confirm passwords is invalid
										</div>
									<?php endif?>
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
		<?php if ($appropriateRequest): ?>
				<div class="row justify-content-center mt-5">
					<div class="col-6">
						<div class="card">
							<div class="card-header">
								Your input:
							</div>
							<div class="card-body">
									<p>Firstname: <?php echo htmlspecialchars($firstname); ?></p>
									<p>Lastname: <?php echo htmlspecialchars($lastname); ?></p>
									<p>Email: <?php echo htmlspecialchars($email); ?></p>
									<p>Password: <?php echo htmlspecialchars($password); ?></p>
									<p>Confirm password: <?php echo htmlspecialchars($confirmPassword); ?></p>
							</div>
						</div>
					</div>
				</div>
			<?php endif?>

		<!-- jQuery and Bootstrap Bundle (includes Popper) -->
		<script src="js/jquery-3.5.1.slim.min.js"></script>
		<script src="js/bootstrap.bundle.min.js" ></script>
	</body>
</html>
