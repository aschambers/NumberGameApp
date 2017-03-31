<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>New User</title>
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
	.inline-h {
		display: inline-block;
		width: 60%;
		margin-top: 0;
	}
	.adder {
		float: right;
		box-shadow: 1px 2px 3px black;
	}
	.errors {
		color: red;
	}
</style>
<body>
	<nav class="navbar heading">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="#">AlanAds</a>
			</div>
			<ul class="nav navbar-nav">
				<li class="active"><a href="dash_home">Dashboard</a></li>
			</ul>
			<ul class="nav navbar-nav">
				<li><a href="profile">Profile</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="log_off"><span class="glyphicon glyphicon-off"></span> Log Off</a></li>
			</ul>
		</div>
	</nav>
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-12">
				<?php
					if ($this->session->flashdata('register_errors'))
					{
						echo $this->session->flashdata('register_errors');
					}

				?>
				<h1 class="inline-h">Add a new user</h1>
				<a href="dash_home"><button class="adder btn btn-info">Return to Dashboard</button></a>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-12">
				<form action="create" method="post" role="form">
					<div class="form-group">
						<label for="e-mail">Email Address: </label>
						<input type="text" name="email" id="e-mail">
					</div>
					<div class="form-group">
						<label for="fname">First Name: </label>
						<input type="text" name="first_name" id="fname">
					</div>
					<div class="form-group">
						<label for="lname">Last Name: </label>
						<input type="text" name="last_name" id="lname">
					</div>
					<div class="form-group">
						<label for="pass">Password: </label>
						<input type="password" name="password" id="pass">
					</div>
					<div class="form-group">
						<label for="pass-conf">Password Confirmation: </label>
						<input type="password" name="passconf" id="pass-conf">
					</div>
					<button class="btn btn-success">Create</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>