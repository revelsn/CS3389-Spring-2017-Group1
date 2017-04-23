<?php
	include 'header.php';
	$_SESSION['pageTitle'] = 'Add Item';
?>

	<?PHP
	$formHasBeenPosted = count($_POST) > 0;
	$formInvalid = false;
	
	if($formHasBeenPosted){
		//validation and DB update
		$errors = array();
		if(strlen($_POST['name']) <= 0)
			$errors[] = "Name cannot be blank";
		if($_POST['price'] <= 0)
			$errors[] = "Price must be greater than zero";
		if($_POST['stock'] < 0)
			$errors[] = "Stock cannot be less than zero";
		if(strlen($_POST['category']) <= 0)
			$errors[] = "Category cannot be blank";
		
		
		if(count($errors) > 0){
			$formInvalid = true;
		}
		else{
			try{
				$sql = "INSERT INTO inventory (name, price, stock, category) VALUES(?,?,?,?)";
				$conn->prepare($sql)->execute([$_POST['name'], $_POST['price'], $_POST['stock'], $_POST['category']]);
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
					<form class="form-horizontal" action="addItem.php" method="POST">
						<div class="form-group">
							<label for="name" class="col-sm-2 control-label">Name</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="name" name="name" placeholder="Name">
							</div>
						</div>
						<div class="form-group">
							<label for="price" class="col-sm-2 control-label">Price</label>
							<div class="col-sm-10">
								<input type="float" class="form-control" id="price" name="price" placeholder="0">
							</div>
						</div>
						<div class="form-group">
							<label for="stock" class="col-sm-2 control-label">Stock</label>
							<div class="col-sm-10">
								<input type="integer" class="form-control" id="stock" name="stock" placeholder="0">
							</div>
						</div>
						<div class="form-group">
							<label for="category" class="col-sm-2 control-label">Category</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="category" name="category" placeholder="category">
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
					<p>The item has been added, click <a href="WorkerInventoryView.php">here</a> to go back to the inventory</p>
				</div>
			</div>
		<? } ?>
		</div>
<?php include 'footer.php';?>