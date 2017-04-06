<?PHP

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
	$formHasBeenPosted = count($_POST) > 0;
	$formInvalid = false;
	
	if($formHasBeenPosted){
		//validation and DB update
		$errors = array();
		
		
		if(count($errors) > 0){
			$formInvalid = true;
		}
		else{
			try{
				$sql = "INSERT INTO contacts (FirstName, LastName, Email, Role) VALUES(?,?,?,?)";
				$conn->prepare($sql)->execute([$_POST['firstName'], $_POST['lastName'], $_POST['Email'], '2']);
			}
			catch(PDOException $e){
				die($e);
			}
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Employees</title>

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
		<?PHP if(!$formHasBeenPosted || $formInvalid){?>
			<div class="jumbotron">
				<h3>Enter the contact's info below:</h3>
			</div>
			<?PHP
				if($formInvalid){
					echo '<div class="row"><div class="col-sm-12">';
					foreach($errors as $error){
						echo '<div class="alert alert-danger" role="alert">'.$error."</div>";
					}
					echo "</div></div>";
				}
			?>
			<div class="row">
				<div class="col-sm-12">
					<form class="form-horizontal" action="addContact.php" method="POST">
						<div class="form-group">
							<label for="firstName" class="col-sm-2 control-label">First Name</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name">
							</div>
						</div>
						<div class="form-group">
							<label for="lastName" class="col-sm-2 control-label">Last Name</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name">
							</div>
						</div>
						<div class="form-group">
							<label for="addr1" class="col-sm-2 control-label">Email</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="Email" name="Email" placeholder="Email@email.com">
							</div>
						</div>				
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<button type="submit" class="btn btn-default">Submit</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		<? }else{?>
			<div class="row">
				<div class="col-sm-12">
					<p>The contact has been added, click <a href="getEmployees.php">here</a> to go back to the employee list</p>
				</div>
			</div>
		<? } ?>
		</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </body>
</html>

