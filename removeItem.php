<?php
	include 'header.php';
	$_SESSION['pageTitle'] = 'Item Removal';
?>
	<?PHP
		array_splice($_SESSION['orderItems'], $_POST['key'], 1);
		array_splice($_SESSION['orderAmounts'], $_POST['key'], 1);
		echo "<div>Item removed. Click <a href=\"viewCart.php\">here</a> to return to your cart.</div>";
	?>
<?php include 'footer.php';?>