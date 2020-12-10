<?php
$logged = false;
if (!$logged) {
	header('Location: login.php');
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
		<title>Hello, world!</title>

	</head>
	<body>
		<div class="container">
			<div class="row justify-content-center">

				<div class="col-8" style="margin-top: 100px">

				  	<div class="card card-block">
				  		<h1>Welcome!</h1>
				  	</div>
				</div>
			</div>
		</div>
		<!-- jQuery and Bootstrap Bundle (includes Popper) -->
		<script src="js/jquery-3.5.1.slim.min.js"></script>
		<script src="js/bootstrap.bundle.min.js" ></script>
	</body>
</html>