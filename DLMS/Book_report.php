<!DOCTYPE html>
<html>
<head>
	<title>Books report</title>
</head>
<body>
<?php
	echo("<center>");

	include'menu.php';
	include'DatabaseConnectivity.php';
	echo "<b>BOOKS REPORT<br><br><b>";
	$query='select count(ISBN) from BOOKS';
	$result=mysqli_query($connection,$query);
	if($result)
	{
		while ($row=mysqli_fetch_array($result)) 
		{
			echo "<b>LIBRARY BOOKS</b>:<font color='red'>$row[0]</font>";
		}
		
	}
	else
	{
		echo "ERROR OCCURED!".mysqli_error($connection);
	}



	$query="select count(UNIQUE_ID)from ISSUE_BOOK";
	$result=mysqli_query($connection,$query);
	if(mysqli_query($connection,$query))
	{
		while ($row=mysqli_fetch_array($result)) 

		{

			echo "<b><br>ISSUED BOOKS :<font color='red'>$row[0]</font>";
			
		}
	}
	else
	{
		echo "ERROR OCCURED!".mysqli_error($connection);	
	}

	//********COUNTING DUE BOOKS **************

	$query="select count(UNIQUE_ID)from ISSUE_BOOK WHERE DATE_OF_RETRUN < CURDATE()";
	$result=mysqli_query($connection,$query);
	if(mysqli_query($connection,$query))
	{
		while ($row=mysqli_fetch_array($result)) 

		{

			echo "<b><br>OVER DUE BOOKS :<font color='red'>$row[0]</font>";
			
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