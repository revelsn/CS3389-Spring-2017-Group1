<?php
	session_start(); //start the session. if there's already an exisiting session, it will be continued
	
	//re-direct to the login page if needed. We're including this file on the login page or the login_submit page, so check to make sure we're not on the login page or we'd have an infinite re-direct
	//Currently commented out for testing purposes
/* 	if(!isset($_SESSION['user_id']) && !stristr($_SERVER["PHP_SELF"], 'login'))
	{
		header("Location: login.php");
	}
	//include the database connection stuff so we don't have to duplicate it everywhere */
	include 'db_conn.php';
	

	if(.$session['Role'] != 3)
		//take to main menu
		{}
?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CS 3389 Example</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
		<div class="container">
			<div class="jumbotron"><h1>Hello!</h1></div>
			
			<div class="row">
				<div class="col-sm-6">
					Employees
				</div>
				<div class="col-sm-6 text-right">
					<a class='btn btn-primary' href='addEmployees.php'><span class="glyphicon glyphicon-plus"></span> Add an Employee</a>
				</div>
				<div class="col-sm-6 text-right">
					<a class='btn btn-primary' href='removeEmployees.php'><span class="glyphicon glyphicon-plus"></span> Remove Employee </a>	
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<table class="table-hover table-striped table">
						<thead>
							<tr>
								<th>Name</th>
								<th>Email</th>
								<th>Role</th>
							</tr>
						</thead>
						<tbody>
							<?PHP
								$host = 'localhost';
								$db   = 'cs3389';
								$user = 'cs3389';
								$pass = 'cs3389';
								$charset = 'utf8';
								$port = '8889';

								$connectionString = "mysql:host=$host;dbname=$db;charset=$charset;port=$port";
								$opt = [
									PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
									PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
									PDO::ATTR_EMULATE_PREPARES   => false,
								];
								$conn = new PDO($connectionString, $user, $pass, $opt);
								
								$data = $conn->query('SELECT * FROM contacts where role == 2')->fetchAll();
								if(count($data) > 0){
									foreach($data as $contact){
										echo "<tr>";
										echo "<td>".$contact['FirstName']." ".$contact['LastName']."</td>";
										echo "<td>".$contact['Email'].
										echo "<td>".$contact['Role']."</td>";
										echo "</tr>";
									}
								}
								else{
									echo "<tr><td colspan='4'>No contacts found</td></tr>";
								}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </body>
</html>