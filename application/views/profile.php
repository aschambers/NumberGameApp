<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Profile</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<!-- jQuery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<script src="jquery.js"></script>
  	<script src="jquery.searchable.js"></script>
</head>
<style type="text/css">
	.heading {
		border-bottom: 3px solid black;
	}
	.adder {
		float: right;
		margin-top: 10px;
		box-shadow: 1px 2px 3px black;
	}
	.poster {
		width: 40%;
		display: inline-block;
	}
	.posttime {
		display: inline-block;
		width: 50%;
		text-align: right;
		margin-left: 50px;
	}
	.the-message {
		border: 2px solid black;
		min-height: 50px;
	}
	.small-poster {
		width: 40%;
		padding-left: 10%;
		display: inline-block;
	}
	.small-posttime {
		width: 50%;
		text-align: right;
		margin-left: 30px;
		display: inline-block;
	}
	.the-comment {
		border: 2px solid black;
		width: 90%;
		margin-left: 10%;
	}
	.input-group {
		width:81.5em;
	}
	#input-addon {
		background-color:#9CC1E2; 
		color:black; 
		font-weight:700;
	}
</style>
<body>
	<nav class="navbar heading">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="#">AlanAds</a>
			</div>
			<ul class="nav navbar-nav">
				<li class="active"><a href="/dash_home">Dashboard</a></li>
			</ul>
			<ul class="nav navbar-nav">
				<li><a href="/profile/<?= $user_info['id'] ?>">Profile</a></li>
			</ul>
			<ul class="nav navbar-nav">
				<li><a href="/edit_profile/<?= $user_info['id'] ?>">Edit Profile</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="/log_off"><span class="glyphicon glyphicon-off"></span> Log Off</a></li>
			</ul>
		</div>
	</nav>
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-12">
				<h1><?= $user_info['first_name'] . ' ' . $user_info['last_name'] ?></h1>
				<p>Registered at: <?= $user_info['created_at'] ?></p>
				<p>User ID: <?= $user_info['id'] ?></p>
				<p>Email address: <?= $user_info['email'] ?></p>
				<p>Description: <?= $user_info['description'] ?></p>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-12">
				<h1>Leave a message for <?= $user_info['first_name'] ?></h1> 
				<form action="/post_message" method="post" role="form">
					<textarea class="form-control" name="message"></textarea>
					<button type="submit" name="message_btn" class="btn btn-success adder" value="<?= $user_info['id'] ?>">Post</button>
				</form>
			</div>
		</div>
		<script>
		$(document).ready(function () {
    		(function ($) {
        		$('#filter').keyup(function () {
            		var rex = new RegExp($(this).val(), 'i');
            		$('.searchable div').hide();
            		$('.searchable div').filter(function () {
                		return rex.test($(this).text());
            		}).show();
        		})
    		}(jQuery));
		});
		</script>
		<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
	  	<link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet"/>
	  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
	  	<div style='margin-top:1em;' class="input-group"> <span id="input-addon" class="input-group-addon">Search</span>
	      	<input id="filter" type="text" class="form-control" placeholder="Search for anything to find messages and comments...">
	  	</div>
<?php	if (isset($user_messages)) { ?>
	<?php	foreach ($user_messages as $messages) { ?>
		<div class="searchable">
			<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-12">
					<h3 class="poster"><a href="/profile/<?= $messages['poster_id'] ?>"><?= $messages['first_name'] . ' ' . $messages['last_name'] ?></a></h3>
					<p class="posttime"><?= $messages['created_at'] ?></p>
					<p class="the-message"><?= $messages['message'] ?></p>
			<?php 	if (isset($user_comments)) { ?>
				<?php		foreach ($user_comments as $comments) { ?>
						<h3 class="small-poster"><small><a href="/profile/<?= $comments['commenter_id'] ?>"><?= $comments['first_name'] . ' ' . $comments['last_name'] ?></a></small></h3>
						<p class="small-posttime"><small><?= $comments['created_at'] ?></small></p>
						<p class="the-comment"><small><?= $comments['comment'] ?></small></p>
				<?php   	} ?>
			<?php	}	?>
					<form action="/post_comment" method="post" role="form">
						<textarea class="form-control" name="comment"></textarea>
						<input type="hidden" name="id_for_message" value="<?= $messages['message_id'] ?>">
						<button type="submit" name="comment_btn" class="btn btn-success adder" value="<?= $this->session->userdata('user_id') ?>">Post</button>
					</form>
				</div>
			</div>
		</div>
<?php   	} ?>
<?php	} ?>
	</div>
</body>
</html>