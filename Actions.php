<?php 
	include'DatabaseConnectivity.php';
			if(isset($_GET['block']))
			{
				$block=$_GET['block'];
				$QUERY="UPDATE LIBRARY_USERS SET STATUS=0 WHERE USER_ID='$block'";
				$result=mysqli_query($connection,$QUERY);
				if($result)
				{
					header('location:library_users.php');
				}
				else
				{
					echo "Error:".msyqli_error($connection);
				}
			}
			
			if(isset($_GET['unblock']))
			{
				$unblock=$_GET['unblock'];
				$QUERY="UPDATE LIBRARY_USERS SET STATUS=1 WHERE USER_ID='$unblock'";
				$result=mysqli_query($connection,$QUERY);
				if($result)
				{
					header('location:library_users.php');
					exit;
				}
				else
				{
					echo "Error:".msyqli_error($connection);
				}
			}
			if(isset($_GET['Return']))
			{
				$Return=$_GET['Return'];
				$QUERY="UPDATE BOOKS SET STATUS=1 WHERE ISBN='$Return'";
				$result=mysqli_query($connection,$QUERY);
				if($result)
				{
					header('location:Available_Books.php');
					
				}
				else
				{
					echo "Error:".msyqli_error($connection);
				}

				$QUERY="DELETE FROM ISSUE_BOOK WHERE SELECT_BOOK ='$Return'";
				$result=mysqli_query($connection,$QUERY);
				if($result)
				{
					header('location:Available_Books.php');
					exit;
				}
				else
				{
					echo "Failture".mysqli_error($connection);
				}
			}
			

			if(isset($_GET['del']))
			{
				$ISBN=$_GET['del'];
				$query="DELETE FROM BOOKS WHERE ISBN='".$ISBN."'";
				$result=mysqli_query($connection,$query);
				if($result)
				{
					header("location:Available_Books.php");
					exit;

				}
				else
				{
					echo "ERROR:".mysqli_error($connection);
				}
			}

			

			if(isset($_GET['del_user']))
			{
				$DELETE_USER=$_GET['del_user'];
				$QUERY="DELETE FROM LIBRARY_USERS WHERE USER_ID='$DELETE_USER'";
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