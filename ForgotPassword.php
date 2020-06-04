<!DOCTYPE html lang="en">
	<html>
		<head>
			<title>Forgot Password</title>
			<meta charset="UTF-8"/>
			<meta name="viewport" content="width=device-width, initial-scale = 1.0, 
			maximum-scale=1.0, user-scalable=no"/> 
			<meta http-equiv="X-UA-Compatible" content="ie=edge" />
			<link href="https://fonts.googleapis.com/css?family=Poppins:400,500&display=swap" rel="stylesheet" />
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
			<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
   			<link rel="stylesheet" href="style.css">
		</head>

		<header>

			<div class="logo-container">
			 <p class="display-5">DPL Management System</p>
			</div>
		</header>
		<body>

		<br><br><br>


		<section id="cover" class="min-vh-100">
    	<div id="cover-caption">
		<div class="container">
		<div class="row">
		<div class="col-xl-8 col-lg-8 col-md-8 col-sm-10 mx-auto  form p-4">
		<form class="form-horizontal" method="POST">
		<br>
		<fieldset>
		<legend><h4>Reset Password </h4></legend>			
								<div class="form-group">
									<label for="username" class="cols-sm-2 control-label">Username</label>
									<div class="cols-sm-10">
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
											<input type="text" class="form-control" name="username" id="username"  placeholder="Enter your Username"/>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="password" class="cols-sm-2 control-label">Security Question</label>
									<div class="cols-sm-10">
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
											<input type="text" class="form-control" name="security_question" id="security_question"  placeholder="Enter the secutry queston you selected when you sing up the account"/>
										</div>
									</div>

								<div class="form-group">
									<label for="password" class="cols-sm-2 control-label">Enter New Password</label>
									<div class="cols-sm-10">
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
											<input type="password" class="form-control" name="password" id="password"  placeholder="Enter your Password"/>
										</div>
									</div>

								</div>
								<div class="form-group">
									<label for="password" class="cols-sm-2 control-label">Confirm Password</label>
									<div class="cols-sm-10">
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
											<input type="password" class="form-control" name="Confirm" id="password"  placeholder="Confrim Password"/>
										</div>
									</div>
								</div>


								<div class="form-group ">
									<button type="submit" class="btn btn-info btn-lg btn-block login-button" name="submit">Change Password</button>
								</div>
								<a href="login.php">Login</a>
								<p><center>
									<font color="red"> Note: if you don't know your security question we can't help you.</font>
								</center></p>
						  </div>
						  </div>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
</div>
<?php 
	include'DatabaseConnectivity.php';
	if(isset($_POST['submit']))
	{
		$username=$_POST['username'];
		$password=$_POST['password'];
		$Confirm=$_POST['Confirm'];
		$HashedPSW=password_hash($password, PASSWORD_DEFAULT);
		$security_question=$_POST['security_question'];
		if($password!=$Confirm)
		{
			echo"<center><font color='red'> Password don not match!</font></center>";
		}
		else
		{
			$query="SELECT  * from SIGN_UP WHERE USERNAME='$username'";
			$result=mysqli_query($connection,$query);
			if($result)
			{
				if(mysqli_num_rows($result)>0)
				{
					while($rows=mysqli_fetch_array($result))
					{
						
					}

					if($security_question==$rows[3])
						{
							
							$query="UPDATE SIGN_UP SET PASSWORD='$HashedPSW' WHERE USERNAME='$username'";
							$result=mysqli_query($connection,$query);
							if($result)
							{
								echo "<center> <font color='green'> Your Password Successfully Changed!</center></font>";
							}
						}
						else
							{
								echo "<center> <font color='red'> Security question is not correct!</center></font>";
							}
				}
				else
				{
					echo "<center> <font color='red'> User not found! Enter valid Username!</center></font>";

				}
			}

			else
			{
				echo "Something went wrong!".mysqli_error($result);
			}
		}
		
	}

?>

</section>
</body>
</html>
