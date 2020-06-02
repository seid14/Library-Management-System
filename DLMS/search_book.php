<!DOCTYPE html>
<html>
<head>
	<title>Search Book</title>
</head>
<body>

	<?php
		require'menu.php';
		require'DatabaseConnectivity.php';
	?>

	<center>
		<form action="#" method="POST">
		<H3>SEARCH A BOOK YOU WANT </H3>
		ENTER ISBN or TITLE:<input type="text" name="search" placeholder="00123123 or Physics" required>
		
	
		<input type="submit" value="OK" name="submit">
		</form>

	<?php

		echo "<table border='1' cellpadding='5' cellspacing='0'";
		if(isset($_POST['submit']))
		{	
			$search=$_POST['search'];
			$query="SELECT * FROM BOOKS where ISBN='$search'";
			$result=mysqli_query($connection,$query);

			echo "<tr>";
				echo "<th> ISBN</th>";
				echo "<th> TITILE</th>";
				echo "<th> LANGUAGE</th>";
				echo "<th> PUPLISHER</th>";
				echo "<th> PUPLICATION DATE</th>";
				echo "<th> AUTHOR</th>";
				echo "</tr>";
			while ($row=mysqli_fetch_array($result))
			{	
				echo "<tr>";
				echo "<td>$row[0]</td>";
				echo "<td>$row[1]</td>";
				echo "<td>$row[2]</td>";
				echo "<td>$row[3]</td>";
				echo "<td>$row[4]</td>";
				echo "<td>$row[5]</td>";
				echo "</tr>";
			}

			if(mysqli_num_rows($result)>0)
			{
				echo " ";
			}
			else
			{
				echo "<br><font color ='red'> BOOK WITH ISBN <u><b> $search</b></u> IS NOT AVAILABLE</font>";
			}
		}
			echo "</center>";
	?>	
	</center>	
</body>
</html>