<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	</head>
	<?PHP
	session_start();
    $_SESSION = array();
    session_destroy();
	?>
		<body>
			<div>You have been logged out. Have a nice day!</div>
	<?PHP
	include 'footer.php';?>