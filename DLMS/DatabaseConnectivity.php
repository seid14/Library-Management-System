<?php
		//<-------------- DECLARING DATABASE CONNECTION VARIABLES AND SELECTING DATABASE TO OPERATE UPON-------------->


		$serverName = "127.0.0.1";
		$userName = "root";
		$password = "3230kkll";

		$connection = mysqli_connect($serverName, $userName, $password);

		if(!$connection)
		{
			die("Connection Failed ".mysqli_connect_error());
		}







		// <------------- SELECTING CORRECT DATABASE FOR PERFORMING QUERY ------------->




		mysqli_select_db($connection, 'DLMS');
		
?>