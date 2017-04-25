<?php
	include 'header.php';
	$_SESSION['pageTitle'] = 'ripEmployee';
?>

	<?PHP
	$formHasBeenPosted = count($_POST) > 0;
	$formInvalid = false;

	if($formHasBeenPosted){
		$sql = "UPDATE users SET role = 1 WHERE id = ?";
		$conn->prepare($sql)->execute([$_POST['id']);
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
							<label for="firstName" class="col-sm-2 control-label">ID</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="ID" name="ID" placeholder="ID">
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
					<p>Removed successfully, click <a href="home.php">here</a> to go to home</p>
				</div>
			</div>
		<? } ?>
		</div>
<?php include 'footer.php';?>