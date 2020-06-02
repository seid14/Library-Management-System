<!DOCTYPE html>
<html>
<head>
	<title>Edit Page</title>
</head>
<body>

	 <?php
		include'DatabaseConnectivity.php';
		include'menu.php';
		$ISBN=$_GET['GetID'];
		$query="SELECT * FROM BOOKS WHERE ISBN='$ISBN'";
		$result=mysqli_query($connection,$query);
		if(mysqli_query($connection,$query))
		{
			while ($row=mysqli_fetch_array($result))
			{	
				
					$ISBN=$row[0];
					$TITLE=$row[1];
					$LANGUAGE=$row[2];
					$PUPLISHER=$row[3];
					$puplication_date=$row[4];
					$AUTHOR=$row[5];
			}
		}
		else
		{
			echo "ERROR:".mysqli_error($connection);
		}
	?>
	


<CENTER>	
	<H3>
		DEGAHABUR LIBRARY<BR> BOOK RECORDING SYSTEM
	</H3>
	<form action="update.php?ID=<?php echo($ISBN)?>" method="POST">
		
		ISBN:<input type="text" name="isbn" required value="<?php echo($ISBN) ?>">
		TITLE:<input type="text" name="title" required value="<?php echo($TITLE) ?>">
		LANGUAGE:<input type="text" name="language" required value="<?php echo($LANGUAGE) ?>">
		PUPLISHER:<input type="text" name="puplisher"required value="<?php echo($PUPLISHER) ?>">
		PUPLICATION DATE:<input type="date" name="puplication_date" required value="<?php echo($puplication_date) ?>">
		AUTHOR:<input type="text" name="author" required value="<?php echo($AUTHOR) ?>">
		<input type="reset" name="reset" value="RESET">
		<input type="submit" name="update" value="UPDATE">
	</form>
	</CENTER>

</body>
</html>
