<!DOCTYPE html>
<html>
<head>
	<title>LIBRARY BOOKS</title>
</head>
<body>
	<?php 
		include'menu.php';
		include'DatabaseConnectivity.php';

	?>
	<center>
		<br>
		<H4>LIBRARY BOOKS</H4></label>

						<table class="table table-striped w-auto table-bordered">
						<thead>
							
						

						<?php
							$query="SELECT * FROM BOOKS";
							$result=mysqli_query($connection,$query);
							if(mysqli_query($connection,$query))
							{
									echo "<tr>";
									echo "<th> ISBN</th>";
									echo "<th> TITILE</th>";
									echo "<th> LANGUAGE</th>";
									echo "<th> PUPLISHER</th>";
									echo "<th> PUPLICATION DATE</th>";
									echo "<th> AUTHOR</th>";
									echo "<th>STATUS </th>";
									echo "<th colspan='3'><center> ACTIONS </th></center>";

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
									if($row[7]=='1')
									{
										echo "<td> <font color='green'>Available";
										echo "<td><a href='issue_book.php?Issue_id=$row[0]'> Issue";
									}
									else
									{
										echo "<td><font color='red'> Issued";
										echo "<td><a href='Actions.php?Return=$row[0]'>Return</a></td>";

									}
									
									
									echo "<td><a href='edit.php?GetID=$row[0]'><i class='fa fa-pencil' aria-hidden='true'></i></td>";
									echo "<td><a href='delete.php?del=$row[0]'/><i class='fa fa-trash-o' aria-hidden=true'></i></td>";
									echo "</tr>";
								}
								if(mysqli_num_rows($result)>0)
								{
									//echo "RECORD AVAILABLE";
								}
								else
								{
									echo "NO DATA FOUND IN THE DATABASE<br>";
								}
							}
							else
							{
								echo "FAILTURE".myslqi_error($connection);
							}
							$query='select count(ISBN) from BOOKS where STATUS=1';
							$result=mysqli_query($connection,$query);
							if($result)
							{
								while ($row=mysqli_fetch_array($result)) 
								{
									echo "<b>Currently Available Books:</b><font color='red'>$row[0]</font>";
								}
								
							}
							else
							{
								echo "ERROR OCCURED!".mysqli_error($connection);
							}

						?>
						</thead>
						</table>
						
					
		<a href="record_books.php"><i class="fa fa-plus-square" aria-hidden="true"></i><br>ADD BOOK</a>
					<?php 
							if(isset($_SESSION['success'])&&($_SESSION['success']!=''))
							{	
								echo '<br><h4> <font color="green"</font></h4>'.$_SESSION['success'];
								unset($_SESSION['success']);
							}
							if(isset($_SESSION['failture'])&&($_SESSION['failture']!=''))
							{
								echo '<br><h4> <font color="red"</font></h4>'.$_SESSION['failture'];
								unset($_SESSION['failture']);
							}
						?>
	</center>

</body>
</html>