<!DOCTYPE html>
<html>
<head>
	<title>Studetn Sign up page</title>
</head>
<body>
	<?php 
		include'menu.php';
		include'DatabaseConnectivity.php';
	 ?>
	 <center>
	 <form method="POST">
	 	<h4>
		 		<label> Student Sign up</label>
	 	</h4>
	 	ID<input type="text" name="unique_id" required>
	 	FULL NAME<input type="text" name="full_name" required>
	 	DATE OF BIRTH<input type="date" name="dob" required>
	 	PHONE NUMBER<input type="number" name="phone_number" required>
	 	EMAIL <input type="email" name="email" required>
	 	<input type="submit" name="submit" value="SIG UP">

	 </form>	


	<?php 
		if(isset($_POST['submit']))
		{
			$unique_id=$_POST['unique_id'];
			$full_name=$_POST['full_name'];
			$dob=$_POST['dob'];
			$phone_number=$_POST['phone_number'];
			$email=$_POST['email'];
			$QUERY="select * from STUDENT where STUDENT_ID='$unique_id'";
			$result=mysqli_query($connection,$QUERY);
			if($result)
			{
				if(mysqli_num_rows($result)>0)
				{
					echo "<font color='red'> THIS USER ALREADY EXISTS</font>";
				}
				else
				{
					$QUERY="INSERT INTO STUDENT VALUES('$unique_id','$full_name','$dob','$phone_number','$email')";
					$result=mysqli_query($connection,$QUERY);
					if($result)
					{
						echo "<font color='green'>User Successfully Regsistred. Your Uniquie Id is <b>$unique_id</b></font>";
					}
					else
					{
						echo "Error:".mysqli_error($connection);
					}
				}
			}
			else
				echo "Error:".mysqli_error($connection);
		}

	 ?>
</center>
</body>
</html>