<!DOCTYPE html>
<html>
<head>
	<title>User Register Page</title>
</head>
<body>
	<?php 
		include'menu.php';
		include'DatabaseConnectivity.php';
	 ?>
	 <center>
	 <form method="POST">
	 	<h4>
		 		<label>User Register</label>
	 	</h4>
	 	FULL NAME<input type="text" name="full_name" required>
	 	DATE OF BIRTH<input type="date" name="dob" required>
	 	PHONE NUMBER<input type="number" name="phone_number" required>
	 	EMAIL <input type="email" name="email" required>
	 	<input type="submit" name="submit" value="REGISTER">

	 </form>	


	<?php 
		if(isset($_POST['submit']))
		{
			$name=$_POST['full_name'];
			$dob=$_POST['dob'];
			//$lname="Seid";
			$dob=substr($dob, 8,	10);
			$n=substr($name,0,2);
			$m=date("m");
			$y=date("y");
			$r=rand(10,100);
			$dash="-";


			$unique_id=$n.$m.$y.$dash.$r.$dash.$dob;
			$full_name=$_POST['full_name'];
			$dob=$_POST['dob'];
			$phone_number=$_POST['phone_number'];
			$email=$_POST['email'];
			$QUERY="select * from LIBRARY_USERS where USER_ID='$unique_id'";
			$result=mysqli_query($connection,$QUERY);
			if($result)
			{
				if(mysqli_num_rows($result)>0)
				{
					echo "<font color='red'> THIS USER ALREADY EXISTS</font>";
				}
				else if ($dob>=date('Y-m-d'))
				 {
					echo "<font color='red'>Date of birth cant't be equal to or greater than the current date!!</font>";
				}
				else
				{
					$QUERY="INSERT INTO LIBRARY_USERS(USER_ID,FULL_NAME,DATE_OF_BIRTH,PHONE_NUMBER,EMAIL_ID) VALUES('$unique_id','$full_name','$dob','$phone_number','$email')";
					$result=mysqli_query($connection,$QUERY);
					
					if($result)
					{
						echo "<font color='green'>User Successfully Regsistred. Your Uniquie Id is <b>$unique_id</b>
						<br>Redirecting...</font>";
						header('refresh:5;library_users.php');
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