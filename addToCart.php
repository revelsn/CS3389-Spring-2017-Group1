<?php
	include 'header.php';
	$_SESSION['pageTitle'] = 'Add Item';
?>

	<?PHP
	$formHasBeenPosted = count($_POST) > 1;
	$formInvalid = false;
	
	if($formHasBeenPosted){
		//validation and DB update
		$errors = array();
		if($_POST['amount'] < 0)
			$errors[] = "Amount cannot be less than zero";		
		
		if(count($errors) > 0){
			$formInvalid = true;
		}
		else{
			$_SESSION['orderItems'][count($_SESSION['orderItems'])] = $_POST['name'];
			$_SESSION['orderAmounts'][count($_SESSION['orderAmounts'])] = $_POST['amount'];
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
								<input type=\"integer\" class=\"form-control\" id=\"amount\" name=\"amount\" placeholder=\"1\">"?>
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
					<p>The item has been added to your cart. Click <a href="inventory.php">here</a> to go back to the inventory or <a href="viewCart.php">here</a> to go back to your cart.</p>
				</div>
			</div>
		<? } ?>
		</div>
<?php include 'footer.php';?>