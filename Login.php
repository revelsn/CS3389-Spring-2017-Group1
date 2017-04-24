<!DOCTYPE html>
<html>
	<header>
		<title> Wiggly Piggly::Login </title>
		<!--LoginPage-->
	</header>
	<!-- -->
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<!-- -->
	<body style="font-family:georgian;">
		<nav class="navbar navbar-transparent">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="#">Wiggly Piggly</a>
				</div>
				<ul class="nav navbar-nav">
					<li class="active"><a href="file:///C:/MAMP/htdocs/Grupo%20Uno/Home1.html">Home</a></li>
					<li><a href="file:///C:/MAMP/htdocs/Grupo%20Uno/About1.html">About Us</a></li>
					<li><a href="file:///C:/MAMP/htdocs/Grupo%20Uno/ContactInfo.html">Contact Us</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
					<li><a href="file:///C:/MAMP/htdocs/Grupo%20Uno/Login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
				</ul>
			</div>
		</nav>
		<div class="col-md-12">
		<?php
			$_SESSION['pageTitle'] = 'Login';
			include 'header.php';
		?>
			<center><img src="Wiggly.jpg" alt="Mr. Piggly"></center>
			<form class="form-horizontal" action="login_submit.php" method="post">
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<label for="inputEmail3" class="col-sm-2 control-label">Username</label>
						<div class="col-sm-10">
							<input type="text" id="username" name="username" value="" placeholder="Username" class="form-control"/>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<label for="inputPassword3" class="col-sm-2 control-label">Password</label>
						<div class="col-sm-10">
							<input type="password" id="password" name="password" placeholder="Password" class="form-control" />
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<div class="col-sm-offset-2 col-sm-10">
							<div class="checkbox">
								<label class="checkbox-inline">
								  <input type="checkbox"> Remember Me								  
								</label>
								
								<label class="radio-inline">
									<input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" checked> 
									Customer
								</label>
								<label class="radio-inline">
									<input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> 
									Administrator
								</label>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<div class="col-sm-offset-2 col-sm-10">
							<button type="submit" class="btn btn-default">Sign in</button>
						</div>
					</div>
				</div>
			</form>
		<?php include 'footer.php';?>
		</div>
	</body>
</html>