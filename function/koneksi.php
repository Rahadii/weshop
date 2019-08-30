<?php  
	$dbhost 	= "localhost";
	$dbuser	  	= "root";
	$dbpass		= "";
	$dbname 	= "weshop";

	$db = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	
	try {
   		if ($db) {
        	//do something
    	}
   		else
    	{
        	throw new Exception('Unable to connect');
    	}
	}
		catch(Exception $e)
	{
    	echo $e->getMessage();
	}
?>