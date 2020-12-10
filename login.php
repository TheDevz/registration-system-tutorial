<?php
$appropriateRequest = isset($_POST['login']) && count($_POST) === 3;

// echo "<pre>";
// var_dump($_POST);
// echo "</pre>";
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
							<!-- <form action="">
							<form> -->

								<div class="form-group">
									<label for="exampleInputEmail1">Email address</label>
									<input type="text"
									class="form-control <?php echo empty($email) && $appropriateRequest ? 'is-invalid' : ''; ?>"
									id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
									<?php if (empty($email)): ?>
										<div class="invalid-feedback">
											Email is required
										</div>
									<?php endif?>
									<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1">Password</label>
									<input type="password" class="form-control <?php echo empty($email) && $appropriateRequest ? 'is-invalid' : ''; ?>" id="exampleInputPassword1" name="password">
									<?php if (empty($email)): ?>
										<div class="invalid-feedback">
											Password is required
										</div>
									<?php endif?>
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
			<?php if (isset($email) || isset($password)): ?>
				<div class="row justify-content-center mt-5">
					<div class="col-6">
						<div class="card">
							<div class="card-header">
								Your input:
							</div>
							<div class="card-body">
									<p>Email: <?php echo htmlspecialchars($email); ?></p>
									<p>Password: <?php echo htmlspecialchars($password); ?></p>
							</div>
						</div>
					</div>
				</div>
			<?php endif?>

		</div>

		<!-- jQuery and Bootstrap Bundle (includes Popper) -->
		<script src="js/jquery-3.5.1.slim.min.js"></script>
		<script src="js/bootstrap.bundle.min.js" ></script>
	</body>
</html>