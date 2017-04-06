<?php
	include 'header.php';
	$_SESSION['pageTitle'] = 'Index Page';
?>
	<?PHP
		$connectionString = "mysql:host=$host;dbname=$db;charset=$charset;port=$port";
		$opt = [
			PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
			PDO::ATTR_EMULATE_PREPARES   => false
		];
		$conn = new PDO($connectionString, $user, $pass, $opt);
								
		try{
			$sql = "DELETE FROM inventory WHERE name = ?";
			$conn->prepare($sql)->execute([$_POST['name']]);
			echo "<div>Item deleted. Return to <a href=\"WorkerInventoryView.php\">inventory</a>?</div>";
		}
		catch(PDOException $e){
			die($e);
		}?>
<?php include 'footer.php';?>