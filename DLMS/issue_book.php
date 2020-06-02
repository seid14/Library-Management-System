<!DOCTYPE html>
<html>
<head>
	<title>Issue Book</title>
</head>
<body>
	<?php
		include'DatabaseConnectivity.php';
		include'menu.php';
	?>
	<CENTER>
		<h5>Degabur Public Library <br> Book Issueing Page</h5>
		<form method="POST">
		UNIQUE ID:<select name='select_id'>
				<option  disabled selected required>Select your Unique ID</option>

				<?php
				
					$QUERY="SELECT * FROM LIBRARY_USERS WHERE STATUS!='0'";
					$result=mysqli_query($connection,$QUERY);
					if(mysqli_query($connection,$QUERY))
					{
						while($row=mysqli_fetch_array($result))
						{
							
							{
								echo "<option>".$row[0];
								echo "</option>";
							}
						}
						if(mysqli_num_rows($result)<=0)
						{
							echo "<option disabled selected> No Active users found!</option>";
						}
							
					}
					else
					{
						echo "ERROR:".myslqi_error($connection);
					}	
				?>

			</select>
		BOOK ISBN:
				<select name='select_book'>
				<option selected>
					<?php 
						$select=$_GET['Issue_id'];
						echo $select;
					 ?>
				</option>
					
				?>
			</select>
			
		ISSUEING DATE:<input type="date" name="issue_date" placeholder="2020-01-01" required value="<?php echo date("Y-m-d"); ?>" required>
		RETURNING DATE:<input type="date" name="return_date" placeholder="2020-01-15" value="<?php echo date("Y-m-d",strtotime("+1 week"))?>" required>
		<input type="reset" name="reset" value="RESET">
		<input type="submit" name="submit" value="OK">
	</form>
	</CENTER>
	<?php

	if(isset($_POST['submit']))
	{
		$unique_id=$_POST['select_id'];
		$issue_date=$_POST['issue_date'];
		$return_date=$_POST['return_date'];
		$select=$_GET['Issue_id'];
	

		//CHECKING IF THE BOOK ALREADY ISSUED!

		$QUERY="SELECT * FROM ISSUE_BOOK WHERE SELECT_BOOK='$select'";
		$result=mysqli_query($connection,$QUERY);
		if($result)
		{
			while($row=mysqli_fetch_array($result))
			{
				
			}
			if(mysqli_num_rows($result)>0)
			{
				echo "<center><font color ='red'><option> Sorry, This book has already issued to someone else!!</option></font></center>";
			}
			else
			{
				//******************INSERTING VALUES TO ISSUE_BOOK TABLE********************

				$QUERY="SELECT * FROM ISSUE_BOOK WHERE UNIQUE_ID='$unique_id'";
				$RESULT=mysqli_query($connection,$QUERY);
				if($RESULT)
				{
					while($row=mysqli_fetch_array($RESULT))
					{
						

					}

					if(mysqli_num_rows($RESULT)>0)
					{

						echo("<center><font color ='red'>This user <b>$unique_id</b> has unreturned books. Can't issue new books!</center></font>");
					}


					else
					{

						if(empty($unique_id)||empty($select)||empty($issue_date)||empty($return_date))
						{
							echo "<center><font color='red'>Please fill all required feilds.</font></center>";
						}
						elseif ()
						 {
							echo "<center><font color='red'> Book ISBN is not valid!</font></center>";
						}

						else
						{
							$QUERY="INSERT INTO ISSUE_BOOK(UNIQUE_ID,SELECT_BOOK,DATE_OF_ISSUE,DATE_OF_RETRUN)
							 VALUES(
							'$unique_id',
							'$select',
							'$issue_date',
							'$return_date')";
							$RESULT=mysqli_query($connection,$QUERY);
							if($RESULT)
							{
								echo "<center><font color='green'> BOOK WAS ISSUED TO <b>$unique_id</b> DUE DATE IS <font color='red'>$return_date</font>";
								//header('refresh:5;Available_Books.php');
								//exit;
							}
							else
							{
									echo "Erro:<br>".mysqli_query($connection);		
							}
						}
						

						//*****************CHECKING MOST ISSUED BOOKS****************
						$QUERY="UPDATE BOOKS SET NO_TIMES_ISSUED=NO_TIMES_ISSUED+1 WHERE ISBN='$select'";
						$result=mysqli_query($connection,$QUERY);
						if($result)
						{
							echo "";
						}
						else
						{
							echo "FAILTURE<br>".mysqli_error($connection);
						}	

							//*************************ISSUEING UPDATE********************************

						$QUERY="UPDATE BOOKS SET STATUS='0' WHERE ISBN='$select'";
						$result=mysqli_query($connection,$QUERY);
						if($result)
						{
							echo "";
						}
						else
						{
							echo "FAILTURE".mysqli_error($connection);
						}	
				}	}

			}
		}
	}

?>
	
</body>
</html>