<!DOCTYPE html>
<html>
<head>
	<title>WELCOME TO DEGAHBUR LIBRARY</title>
</head>
<body id="home">
	<section class="most-used">
		<?php 
		include'menu.php';
		include'DatabaseConnectivity.php';
		echo "<center><h4><font color='white'>Trending Books</u></font></h4></center>";

		$QUERY="SELECT * FROM `BOOKS` ORDER BY `BOOKS`.`NO_TIMES_ISSUED` DESC LIMIT 5 ";
		$RESULT=mysqli_query($connection,$QUERY);
		if($RESULT)
		{	$counter=0;
			while($row=mysqli_fetch_array($RESULT))
			{
				$counter++;
				echo "<font color='white'><b>$counter.&nbsp$row[1]</b></font> <i class='fa fa-level-up'>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</i>";
				//echo "<br>";
				

			}
		}
		else
		{
			echo "Error:".mysqli_error($connection);
		}
	 ?>
		
	</section>

</body>

<footer>
		<center>
			<section class="copyright">
				
				Copyright &copy Degahabur Public Library 2019 -
				<?php echo date("Y")?>
			</section>
		</center>
</footer>
</html>