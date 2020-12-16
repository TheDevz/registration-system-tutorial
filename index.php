<?php
require 'inc/utils.php';

$logged = $_REQUEST['logged'] ?? false;

if (!$logged) {
	redirect('login.php');
}

?>

<?php include 'components/heading.php';?>

<div class="container">
	<div class="row justify-content-center">

		<div class="col-8" style="margin-top: 100px">

		  	<div class="card card-block">
		  		<h1>Welcome!</h1>
		  	</div>
		</div>
	</div>
</div>

<?php include 'components/ending.php';?>
