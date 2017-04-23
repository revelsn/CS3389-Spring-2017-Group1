<?php
	include 'header.php';
	$_SESSION['pageTitle'] = 'Index Page';
?>
	<?PHP
		try{
			$sql = "DELETE FROM inventory WHERE name = ?";
			$conn->prepare($sql)->execute([$_POST['name']]);
			echo "<div>Item deleted. Return to <a href=\"WorkerInventoryView.php\">inventory</a>?</div>";
		}
		catch(PDOException $e){
			die($e);
		}?>
<?php include 'footer.php';?>