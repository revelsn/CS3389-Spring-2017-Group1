		<?php
			$_SESSION['pageTitle'] = 'login';
			include 'header.php';
		?>
	<!--<body style="font-family:georgian;">-->
		<!--<nav class="navbar navbar-transparent">
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
		</nav> -->
		<div class="col-md-12"> 

			<center><img src="Wiggly.jpg" alt="Mr. Piggly"></center>
			<div>A childhood picture of our founder, Nick Revels</div>
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
			<div class="col-sm-6 text-right">
					<a class='btn btn-primary' href='registration.php'><span class="glyphicon glyphicon-plus"></span>Create an account</a>
				</div>
		</div>
	<?php include 'footer.php';?>