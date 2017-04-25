		<?php
			$_SESSION['pageTitle'] = 'login';
			include 'header.php';
		?>
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
		</nav> --!>
		<!--LOGIN-->
		<?php
			//To catch and tell what the errors are while running.
			/*ini_set('display_errors', 1);
			ini_set('display_startup_errors', 1);
			error_reporting(E_ALL);*/
			
			include 'header.php';
			$_SESSION['pageTitle'] = 'Login';
			include "db_conn.php"; //DATABASE CONNECTION FILE

			/*** check if the users is already logged in ***/
			if(isset( $_SESSION['user_id'] ))
			{
				$message = 'You are logged in';
			}
			/*** check that both the username, password have been submitted ***/
			if(!isset( $_POST['username'], $_POST['password']))
			{
				$message = 'Please enter a valid username and password';
			}
			/*** check the username is the correct length ***/
			elseif (strlen( $_POST['username']) == 0)
			{
				$message = 'Invalid Username'; 
			}
			/*** check the password is the correct length ***/
			elseif (strlen( $_POST['password']) == 0)
			{
				$message = 'Invalid Password';
			}
			else
			{
				/*** if we are here the data is valid and we can pull from the database ***/
				$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
				$password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

				try
				{
					/*** prepare the select statement ***/
					$stmt = $conn->prepare("SELECT user_id, psswdHash, role FROM users WHERE email = :username");// <!--DATABASE VARIABLE AS AT THE TOP & ADD ROLE-->

					/*** bind the parameters ***/
					$stmt->bindParam(':username', $username, PDO::PARAM_STR);

					/*** execute the prepared statement ***/
					$stmt->execute();

					/*** check for a result ***/
					$result = $stmt->fetch();
					/*** if we have no result or the hashes do not agree then the login fails ***/
					/*** NOTE: SHA1 was just recently shown to have exploits by Google researchers and thus in a production enviroment you would NOT use it. However, for this project it is fine, but you would want to use SHA256 or some other hashing algorithm along with a salt ***/
					if( sha1($password) != $result['psswdHash']) //<!--USE SHA1 HASH-->
					{
						$message = 'Login Failed';
					}
					/*** if we do have a result, all is well ***/
					else
					{
						
						/*** set the session user_id variable ***/
						$_SESSION['user_id'] = $result['user_id'];//<!-- ADD ROLES-->
						$_SESSION['user_name'] = $username;
						$_SESSION['role'] = $result['role'];
						$_SESSION['orderItems'] = array();
						$_SESSION['orderAmounts'] = array();
						/*** tell the user we are logged in ***/
						$message = 'You are now logged in. Click <a href="inventory.php">here</a> to view our stuff.';
					}


				}
				catch(Exception $e)
				{
					/*** if we are here, something has gone wrong with the database ***/
					$message = 'We are unable to process your request. Please try again later';
				}
				$conn = null;
			}
		?>
			<p><?php echo $message; ?></p>
		<?php include 'footer.php';?>