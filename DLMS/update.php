<!DOCTYPE html>
<html>
<head>
	<title>Update </title>
</head>
<body>
	<?php 
	include'menu.php';
	include'DatabaseConnectivity.php';
	if(isset($_POST['update']))
	{
		$ISBN=$_GET['ID'];
		$title=$_POST['title'];
		$language=$_POST['language'];
		$puplisher=$_POST['puplisher'];
		$puplication_date=$_POST['puplication_date'];
		$author=$_POST['author'];

		$query="UPDATE BOOKS SET ISBN='".$ISBN."',TITLE='".$title."',LANGUAGE='".$language."',PUPLISHER='".$puplisher."',PUPLICATION_DATE='".$puplication_date."',AUTHOR='".$author."' WHERE ISBN='".$ISBN."'";
		$result=mysqli_query($connection,$query);
		if($result)
		{
			header( "location:Available_Books.php" );
		}
		else
		{
			echo "ERROR:".mysqli_error($connection);
		}


	}

	 ?>

</body>
</html>