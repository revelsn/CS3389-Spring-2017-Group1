<?php
	include 'header.php';
	$_SESSION['pageTitle'] = 'Add Item';
?>

	<?PHP
	$connectionString = "mysql:host=$host;dbname=$db;charset=$charset;port=$port";
	$opt = [
		PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
		PDO::ATTR_EMULATE_PREPARES   => false,
	];
	$conn = new PDO($connectionString, $user, $pass, $opt);
	$formHasBeenPosted = count($_POST) > 2;
	$formInvalid = false;
	
	if($formHasBeenPosted){
		//validation and DB update
		$errors = array();
		if($_POST['stock'] < 0)
			$errors[] = "Stock cannot be less than zero";		
		
		if(count($errors) > 0){
			$formInvalid = true;
		}
		else{
			try{
				$sql = "UPDATE inventory SET stock = ? WHERE name = ?";
				$conn->prepare($sql)->execute([$_POST['stock'], $_POST['name']]);
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
				<h3>Enter the amount below:</h3>
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
					<form class="form-horizontal" action="changeStock.php" method="POST">
						<div class="form-group">
							<label for="name" class="col-sm-2 control-label">Name</label>
							<div class="col-sm-offset-2 col-sm-10">
								<?echo "<input readonly type=\"text\" id=\"name\" name=\"name\" value=\"".$_POST['name']."\">
								<div>".$post['name']."</div>";?>
							</div>
						</div>
						<div class="form-group">
							<label for="name" class="col-sm-2 control-label">Amount</label>
							<div class="col-sm-10">
								<?echo "<input type=\"hidden\" id=\"beenPosted\" name=\"beenPosted\" value=\"true\">
								<input type=\"integer\" class=\"form-control\" id=\"stock\" name=\"stock\" placeholder=\"".$_POST['stock']."\">"?>
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
					<p>The stock amount has been changed, click <a href="WorkerInventoryView.php">here</a> to go back to the inventory</p>
				</div>
			</div>
		<? } ?>
		</div>
<?php include 'footer.php';?>