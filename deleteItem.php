<?php
	include 'header.php';
	$_SESSION['pageTitle'] = 'Index Page';
?>
	<?PHP
		try{
			$sql = "DELETE FROM inventory WHERE name = ?";
			$conn->prepare($sql)->execute([$_POST['name']]);
			echo "<div>Item deleted. Click <a href=\"WorkerInventoryView.php\">here</a> to return to inventory.</div>";
		}
		catch(PDOException $e){
			die($e);
		}?>
<?php include 'footer.php';?>