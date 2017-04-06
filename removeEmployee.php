<?php

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
		if(strlen($_POST['id']).is_numeric)
			$errors[] = "Id must be a valid number";
	
		
		if(count($errors) > 0){
			$formInvalid = true;
		}
		else{
			try{
				$sql = "update contacts (role = 2) where VALUES(?) = ID";
				$conn->prepare($sql)->execute([$_POST['ID']]);
			}
			catch(PDOException $e){
				die($e);
			}
		}
	}
?>


<html>
	<body>


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
					echo "<td>".$contact['ID']"</td>";
					echo "<td>".$contact['FirstName']." ".$contact['LastName']."</td>";
					echo "<td>".$contact['Email']"</td>";
					echo "<td>".$contact['Role']."</td>";
					echo "</tr>";
				}
			}
			else{
				echo "<tr><td colspan='4'>No contacts found</td></tr>";
			}
			
			
			<div class="row">
				<div class="col-sm-12">
					<form class="form-horizontal" action="removeEmployee.php" method="POST">
						<div class="form-group">
							<label for="ID" class="col-sm-2 control-label">ID</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="ID" name="ID" placeholder="00">
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
		?>
							
	</body>
</html>