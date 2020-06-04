<!DOCTYPE html>
<html>
<head>
	<title>Users Report</title>
</head>
<body>
	<?php
	echo("<center>");

	include'menu.php';
	include'DatabaseConnectivity.php';
	$query='select count(USER_ID) from LIBRARY_USERS';
	$result=mysqli_query($connection,$query);
	if($result)
	{
		while ($row=mysqli_fetch_array($result)) 
		{
			echo "<b>TOTAL USERS:  <font color='red'>$row[0]</font></b>";
		}
		
	}
	else
	{
		echo "ERROR OCCURED!".mysqli_error($connection);
	}



	$query="select count(USER_ID)from LIBRARY_USERS WHERE STATUS='1'";
	$result=mysqli_query($connection,$query);
	if(mysqli_query($connection,$query))
	{
		while ($row=mysqli_fetch_array($result)) 

		{

			echo "<b><br>ACTIVE USERS:  <font color='red'>$row[0]</font></b>";
			
		}
	}
	else
	{
		echo "ERROR OCCURED!".mysqli_error($connection);	
	}

	$query="select count(USER_ID)from LIBRARY_USERS WHERE STATUS='0'";
	$result=mysqli_query($connection,$query);
	if(mysqli_query($connection,$query))
	{
		while ($row=mysqli_fetch_array($result)) 

		{

			echo "<b><br>BLOCKED USERS:  <font color='red'>$row[0]</font></b>";
			
		}
	}
	else
	{
		echo "ERROR OCCURED!".mysqli_error($connection);	
	}

	
	echo "</center>";
?>
</body>
</html>