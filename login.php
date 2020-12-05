<?php
if (isset($_POST['login']) && count($_POST) === 3) {
	$email = $_POST['email'] ?? '';
	$password = $_POST['password'] ?? '';

	if (empty($email)) {
		echo "Email is required";
	}

	if (empty($password)) {
		echo "Password is required";
	}

	// echo "Login request was made";
} else {
	echo "Simple request";
}

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
			<div class="row justify-content-center" style="margin-top: 180px">
				<div class="col-6">
					<div class="card">
						<div class="card-body">
							<h1 class="text-center">Sign in</h1>
							<form action="login.php" method="post">
							<!-- <form action="">
							<form> -->

								<div class="form-group">
									<label for="exampleInputEmail1">Email address</label>
									<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
									<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1">Password</label>
									<input type="password" class="form-control" id="exampleInputPassword1" name="password">
								</div>

								<button type="submit" class="btn btn-primary" name="login">Sign in</button>

							</form>
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