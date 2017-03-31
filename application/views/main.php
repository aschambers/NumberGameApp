<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Home Page</title>
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
	.start_btn {
		box-shadow: 1px 2px 3px black;
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
			<div class="jumbotron">
				<h1>Welcome to AlanAds</h1>
				<p>This web application will be using CodeIgniter, an MVC framework. You can sign-up and send other users messages regarding their description.</p>
				<a href="/sign"><button class="btn btn-info start_btn">Start</button></a>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12 col-md-4 col-lg-4">
				<h1>Sign-up Now</h1>
				<p>Sign-up now to start sending other users messages or post an ad in your description.</p>
			</div>
			<div class="col-sm-12 col-md-4 col-lg-4">
				<h1>Post Messages</h1>
				<p>You can send users messages regarding their ad by clicking on their name.</p>
			</div>
			<div class="col-sm-12 col-md-4 col-lg-4">
				<h1>Post Comments</h1>
				<p>You can also make comments to messages people post and start a conversation.</p>
			</div>
		</div>
	</div>
</body>
</html>