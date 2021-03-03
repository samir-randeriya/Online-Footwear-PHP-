<?php
	
	$link = mysqli_connect("localhost", "root", "", "onlinefootwear");
	
	if (!$link) 
	{
		//echo "Connection Successfully created.";
    	echo "Error: Unable to connect to MySQL." . PHP_EOL;
    	echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    	echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    	exit;
	}
	
	// $pdo = new PDO('mysql: host=localhost; port=3306; dbname=OnlineFootwear', 'root', '');

	// $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	//echo "Success: A proper connection to MySQL was made! The online_footwear database is great." . PHP_EOL;
	//echo "Host information: " . mysqli_get_host_info($link) . PHP_EOL
	
	//mysqli_close($link);
?>

