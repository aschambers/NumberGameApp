<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Signin Page</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<!-- jQuery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<style type="text/css">
	.heading {
		border-bottom: 3px solid black;
	}
	.sign-form {
		margin-bottom: 10px;
	}
	.errors {
		color: red;
	}
</style>
<body>
	<nav class="navbar heading">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="home">AlanAds</a>
			</div>
			<ul class="nav navbar-nav">
				<li class="active"><a href="home">Home</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="sign"><span class="glyphicon glyphicon-user"></span> Sign In</a></li>
			</ul>
		</div>
	</nav>
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-12">
				<?php
					if ($this->session->flashdata('wrong_info') == true)
					{
						echo $this->session->flashdata('wrong_info');
					}
				?>
				<h1>Sign In</h1>
				<form class="sign-form" action="sign_in" method="post" role="form">
					<div class="form-group">
						<label for="e-add">Email Address:</label>
						<input type="text" name="email" id="e-add">
					</div>
					<div class="form-group">
						<label for="pass">Password:</label>
						<input type="password" name="password" id="pass">
					</div>
					<button class="btn btn-success">Sign In</button>
				</form>
				<a href="add">Don't have an account? Register.</a>
			</div>
		</div>
	</div>
</body>
</html>