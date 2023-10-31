<?php
	$server="localhost";
	$username="root";
	$password="";
	$db="water";
	$con=mysqli_connect($server,$username,$password,$db);
	if(!$con)
	{
		echo"Error connecting";
	}
   
?>