<!DOCTYPE html>
<html>
<head>
	<title>Messages</title>
</head>
<body>
	<?php 
		include'menu.php';
		include'DatabaseConnectivity.php';
	 ?>


	<div class="row no-gutters">
		<div class="col no-gutters">
			<div class="left-side">
				<?php 
					echo "<b>Communicate with other Admins<br></b>";
					$query="SELECT * from SIGN_UP WHERE USERNAME!='".$_SESSION['active']."'";
					$result=mysqli_query($connection,$query);
					if($result)
					{
						if(mysqli_num_rows($result)>0)
						{
							while($rows=mysqli_fetch_array($result))
							{
								echo "<a href='messages.php?receiver=$rows[1]'>$rows[0]</a><br>";
								//echo "<i class='fa fa-comment-o'</i>";
								echo "<br>";
								//echo "$rows[4]<br>";
							}
						}
						else
						{
							echo "No Users Found!";
						}
					}
				 ?>
		</div>
	</div>
	<div class="col no-gutters">
			<div class="right-side">

				<?php
				echo "<center>";
					if(isset($_GET['receiver']))
					{
						$sender=$_SESSION['active'];
						$receiver=$_GET['receiver'];
					}
					if(!empty($receiver))
					{
						$receiver=$_GET['receiver'];
						echo "<br>";
						echo"Chatting with:&nbsp &nbsp<b>".$receiver."</b><br>";
						//echo "$sender<br>";
						$query="select * from messages where msg_from='".$_SESSION['active']."'and msg_to='".$receiver."'";
							$result=mysqli_query($connection,$query);
							if($result)
							{
								if(mysqli_num_rows($result)>0)
								{
									while ($rows=mysqli_fetch_array($result))
									 {
								
										echo "<b>$rows[1]</b>&nbsp&nbsp&nbsp&nbsp".$rows[4].'<br>';
										//echo "<body style='background-color: #455a64;'>";
										echo "<div class='chat_bg'>";
										echo "$rows[3]<br>";
										echo "<br>";
										echo "</div>";

									}

								}
								else
								{
									echo "Start new Conversation";
								}


								echo"<form method='POST'>";
								echo"<input type='text' name='message' id='message' placeholder='Write a message...'' required>";
								echo "<center>";
								echo"<input type='submit' name='send' value='send'>";
								echo "</center>";
								echo"</form>";

								if(isset($_POST['message']))
								{
									$sender=$_SESSION['active'];
									$receiver=$_GET['receiver'];
									$message=$_POST['message'];
								
									$query="INSERT INTO messages(msg_from,msg_to,message) values('$sender','$receiver','$message')";
									$result=mysqli_query($connection,$query);
									if($result)
									{
										//echo "<br><font color='green'>sent</font>";
									}
									else
									{
										echo "<br><font color='red'>not sent<br></font>".mysqli_error($connection);
									}
								}
						}
					}
					echo "</center>";
				 ?>
			</div>
		</div>
	</div>
	
<!---
	<section class="admins">
		</section>
-->	
		
	
	<center>
	<div class="message">
		
		
	</div>
	
</center>
</body>
</html>


