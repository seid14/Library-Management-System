<!DOCTYPE html>
<html>
<head>
	<title>USER LIBRARY USERS</title>
</head>
<body>
	<?php
		include'menu.php';
		include'DatabaseConnectivity.php';
		
	 ?>
	 <center>
	 	<h3>LIBRARY USERS</h3>
						<table class= "table table-striped w-auto table-bordered">
						<thead>
						<?php
							$query="select * from LIBRARY_USERS ORDER BY FULL_NAME";
							$result=mysqli_query($connection,$query);
							if(mysqli_query($connection,$query))
							{
								echo "<tr >";
								echo "<th> <center>UNIQUE ID<center></th>";
								echo "<th> <center>FULL NAME</center></th>";
								echo "<th> <center>DATE OF BIRTH</center></th>";
								echo "<th> <center>PHONE NUMBER</center></th>";
								echo "<th> <center>EMAIL ADDRESS</center></th>";
								echo "<th> <center>REG DATE</center>";
								echo "<th colspan='2'> <center>ACTIONS</center>";
								echo "<th> </center>STATUS<center></th>";
								echo "</tr>";

								while ($row=mysqli_fetch_array($result))
								{	
									echo "<tr class='table-info'>";
									echo "<td>$row[0]</td>";
									echo "<td>$row[1]</td>";
									echo "<td>$row[2]</td>";
									echo "<td>$row[3]</td>";
									echo "<td>$row[4]</td>";
									echo "<td>$row[5]</td>";
									if($row[6]=='1')
									{
										echo "<td><a href='Actions.php?block=$row[0]'> BLOCK</i></td>";
										echo "<td><a href='Actions.php?del_user=$row[0]'> Delete</td>";
										echo "<td><font color='green'>ACTIVE</font></td>";
									}
									
									else
									{
										echo "<td> <a href='Actions.php?unblock=$row[0]'>UNBLOCK</td>";
										echo "<td> <font color='#858585'>Delete</td>";
										echo "<td><font color='red'>BLOCKED</font></td>";
									}
								}
								if(mysqli_num_rows($result)<=0)
								{
									echo "NO REGISTERD USERS FOUND!<br>";
								}
							}
							else
							{
								echo "FAILTURE".mysqli_error($connection);
							}
							$query='select count(USER_ID) from LIBRARY_USERS';
							$result=mysqli_query($connection,$query);
							if($result)
							{
								while ($row=mysqli_fetch_array($result)) 
								{
									echo "NUMBER OF REGISTERED USERS:<font color='red'>$row[0]</font>";
								}
								
							}
							else
							{
								echo "ERROR OCCURED!".mysqli_error($connection);
							}

						?>
						<thead>
						</table>
					
<a href="users_reg.php"><i class="fa fa-plus-square" ></i><br>NEW USER</a>
	 </center>
	 

</body>
</html>