<?php
	include 'header.php';
	$_SESSION['pageTitle'] = 'Registration';
?>

	<?PHP
	$formHasBeenPosted = count($_POST) > 0;
	$formInvalid = false;
	
	if($formHasBeenPosted){
		//validation and DB update
		$errors = array();
		if(strlen($_POST['firstName']) <= 0)
			$errors[] = "First name cannot be blank";
		if(strlen($_POST['lastName']) <= 0)
			$errors[] = "Last name cannot be blank";
		if(strlen($_POST['email']) <= 0)
			$errors[] = "Email cannot be blank";
		if(strlen($_POST['phonenum']) <= 0)
			$errors[] = "Phone number cannot be blank";
		if(strlen($_POST['pass']) <= 0)
			$errors[] = "Password cannot be blank";
		if($_POST['role'] != 1 && $_POST['role'] != 2 && $_POST['role'] != 3)
			$errors[] = "Role must be 1, 2, or 3";
		
		
		if(count($errors) > 0){
			$formInvalid = true;
		}
		else{
			try{
				$psswdHash = sha1($_POST['pass']);
				$sql = "INSERT INTO users (FirstName, LastName, email, phone_number, role, psswdHash) VALUES(?,?,?,?,?,?)";
				$conn->prepare($sql)->execute([$_POST['firstName'], $_POST['lastName'], $_POST['email'], $_POST['phonenum'], $_POST['role'], $psswdHash]);
			}
			catch(PDOException $e){
				die($e);
			}
		}
	}
?>


		<div class="container">
		<?PHP if(!$formHasBeenPosted || $formInvalid){?>
			<div class="jumbotron">
				<h3>Enter the item's info below:</h3>
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
					<form class="form-horizontal" action="addEmployee.php" method="POST">
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
							<label for="addr1" class="col-sm-2 control-label">Phone Number</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="phonenum" name="phonenum" placeholder="(000) 000-0000">
							</div>
						</div>
						<div class="form-group">
							<label for="addr1" class="col-sm-2 control-label">Password</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="pass" name="pass" placeholder="">
							</div>
						</div>
						<div class="form-group">
							<label for="addr1" class="col-sm-2 control-label">Role: 1 for customer, 2 for employee, 3 for administrator</label>
							<div class="col-sm-10">
								<input type="number" class="form-control" id="role" name="role" placeholder="">
							</div>
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
					<p>Registered successfully, click <a href="getEmployees.php">here</a> to go back</p>
				</div>
			</div>
		<? } ?>
		</div>
<?php include 'footer.php';?>