<!DOCTYPE html>
<html>
<head>
	<title>Delete</title>
</head>
<body>
	<?php 
	session_start();
	include'menu.php';
	include'DatabaseConnectivity.php';

		if(isset($_GET['del']))
		{
			$ISBN=$_GET['del'];
			$query="DELETE FROM BOOKS WHERE ISBN='".$ISBN."'";
			$result=mysqli_query($connection,$query);
			if($result)
			{
				$_SESSION['success']="Book Deleted!";
				header("location:Available_Books.php");
				

			}
			else
			{	
				$_SESSION['failture']="Book not deleted!";
				header("location:Available_Books.php");
				echo "ERROR:".mysqli_error($connection);
			}

			$DELETE_USER=$_GET['del_user'];
			$QUERY="DELETE FROM LIBRARY_USERS WHERE USER_ID='DELETE_USER'";
			$RESULT=mysqli_query($connection,$QUERY);
			if($RESULT)
			{
				header('location:library_users.php');
				exit;
			}
			else
			{
				echo "$Error:".mysqli_error($connection);
			}
		}
	?>
</body>

</html>