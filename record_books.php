
<body>
	<?php
		require'menu.php';
		require 'DatabaseConnectivity.php';
	?>
	
<CENTER>	<H3>	DEGAHABUR LIBRARY<BR> BOOK RECORDING SYSTEM</H3>
	<form action="#" method="POST">
		
		ISBN:<input type="text" name="isbn" required >
		TITLE:<input type="text" name="title" required>
		LANGUAGE:<input type="text" name="language" required>
		PUPLISHER:<input type="text" name="puplisher"required>
		PUPLICATION DATE:<input type="date" name="puplication_date" required>
		AUTHOR:<input type="text" name="author" required>
		<input type="reset" name="reset" value="RESET">
		<input type="submit" name="submit" value="OK">
	</form>
	</CENTER>
<script type="text/javascript" src="script.js"></script>
<?php

	if(isset($_POST['submit']))
	{
		if(empty($_POST['isbn'])||empty($_POST['title'])||empty($_POST['language'])||empty($_POST['puplisher'])||empty($_POST['puplication_date'])||empty($_POST['author']))
		{
			echo "<center><font color='red'> Please fill all the required fields!</center>";
		}
		
		else
		{
			$isbn=$_POST['isbn'];
			$title=$_POST['title'];
			$language=$_POST['language'];
			$puplisher=$_POST['puplisher'];
			$puplication_date=$_POST['puplication_date'];
			$author=$_POST['author'];
			if($puplication_date>date("Y-m-d"))
			{
				echo "<center><font color ='red'> Publication date can not be greater than today!</center>";
			}
			else
			{
				$query="SELECT * from BOOKS where isbn='$isbn'";
				$result=mysqli_query($connection,$query);

				if(mysqli_num_rows($result)>0)
				{

					echo"<CENTER><font color='red'>This Book "."<b> <U>".$title."</U></b>"."  is already in the system!</font></CENTER>";
				}
				else
				{
					$sql="INSERT INTO BOOKS(ISBN,TITLE,LANGUAGE,PUPLISHER,PUPLICATION_DATE,AUTHOR)
					VALUES('$isbn','$title','$language','$puplisher','$puplication_date','$author')";
					$result=mysqli_query($connection,$sql);

					echo"<CENTER><font color='green'>Book "."<b> <U>".$title."</U></b>"."  Successfully Recorded!<br>Redirecting...</font></CENTER>";
					header( "refresh:1; url=Available_Books.php" );
				}

			}
			
		}

	}
?>
</body>

</html>