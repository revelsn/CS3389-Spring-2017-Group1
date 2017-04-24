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
		
		if(count($errors) > 0){
			$formInvalid = true;
		}
		else{
			try{
				$sql = "INSERT INTO contacts (FirstName, LastName, email, Role) VALUES(?,?,?,?)";
				$conn->prepare($sql)->execute([$_POST['firstName'], $_POST['lastName'], $_POST['email'], '2' ]);
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
								<input type="text" class="form-control" id="email" name="email" placeholder="email@email.com">
							</div>
						</div>
						
						
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<button type="submit" class="btn btn-default">remove employee</button>
							</div>
						</div>
						<div class="row">
						<div class="col-sm-12">
					<p><a href="removeEmployees.php">here</a></p>
				</div>
			</div>
					</form>
				</div>
			</div>
		</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </body>
</html>
