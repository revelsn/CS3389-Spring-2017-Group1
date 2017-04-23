<?PHP
	$host = 'wigglypiggly.cxvjq5halacg.us-west-2.rds.amazonaws.com';
	$db   = 'WigglyPiggly';
	$user = 'user';
	$pass = 'asldjkfashdfhkj2334123kl4h5iuhjkalhiepowq';
	$charset = 'utf8';
	$port = '3306';
	$connectionString = "mysql:host=$host;dbname=$db;charset=$charset;port=$port";
	$opt = [
		PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
		PDO::ATTR_EMULATE_PREPARES   => false,
	];
	$conn = new PDO($connectionString, $user, $pass, $opt);
?>