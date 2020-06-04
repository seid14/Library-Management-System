<!DOCTYPE html lang="en">
	<html>
		<head>
			<title>Signup</title>
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
			<nav>
			</nav>
		</header>

<body class="signup">
	<br>
		<section id="cover" class="min-vh-100">
    	<div id="cover-caption">
		<div class="container">
		<div class="row">
		 <div class="col-xl-6 col-lg-6 col-md-8 col-sm-10 mx-auto  form p-4">
		<form class="form-horizontal" method="POST">
		<br>
		<fieldset>
		<legend>DPL User sign up </legend>			
								<div class="form-group">
									<label for="name" class="cols-sm-2 control-label">Your Name</label>
									<div class="cols-sm-10">
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
											<input type="text" class="form-control" name="name" id="name"  placeholder="Enter your Name" required>
										</div>
									</div>
								</div>

							<!---	<div class="form-group">
									<label for="email" class="cols-sm-2 control-label">Your Email</label>
									<div class="cols-sm-10">
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
											<input type="text" class="form-control" name="email" id="email"  placeholder="Enter your Email" required />
										</div>
									</div>
								</div>
							!--->
								<div class="form-group">
									<label for="username" class="cols-sm-2 control-label">Username</label>
									<div class="cols-sm-10">
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
											<input type="text" class="form-control" name="username" id="username"  placeholder="Enter your Username" required />
										</div>
									</div>
								</div>

								<div class="form-group">
									<label for="password" class="cols-sm-2 control-label">Password</label>
									<div class="cols-sm-10">
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
											<input type="password" class="form-control" name="password" id="password"  placeholder="Enter your Password" required/>
										</div>
									</div>
								</div>

								<div class="form-group">
									<label for="confirm" class="cols-sm-2 control-label">Confirm Password</label>
									<div class="cols-sm-10">
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
											<input type="password" class="form-control" name="confirm" id="confirm"  placeholder="Confirm your Password" required />
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="confirm" class="cols-sm-2 control-label">Security Question</label>
									<div class="cols-sm-10">
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-question" aria-hidden="true"></i></span>
											<input type="text" class="form-control" name="security" id="security"  placeholder="Your childhood friend's name" required />
										</div>
									</div>
								</div>

								<div class="form-group ">
									<button type="submit" class="btn btn-info btn-lg btn-block login-button" name="submit">Register</button>
								</div>
								</form>	
								<p>
						<center>
						<font color="red"> Warning: Please keep your security question confidentially.</font>
						</center>
					</p>
						<div> Already have an account? <a href="login.php"> Login</a></div>

					</fieldset>
					
	</div>
	</div>
	</div>
	</div>



		

		<?php 
			include'DatabaseConnectivity.php';
			if(isset($_POST['submit']))
			{
				$name=$_POST['name'];
				//$email=$_POST['email'];
				$username=$_POST['username'];
				$password=$_POST['password'];
				$HashedPSW=password_hash($password, PASSWORD_DEFAULT);
				$confirm=$_POST['confirm'];
				$security_question=$_POST['security'];

				/*
				if(empty($name)||empty($username)||empty($password)||empty($confirm)||$security_question)
				{
					/*echo "<script>";
					echo "alert('Please fill all required fields!')";
					echo "string";*/
					/*echo "<center><font color='red'>Please fill all required fields!</font></center>";*/
				//}
				
				if($_POST['password']!=$confirm=$_POST['confirm'])
				{
					/*echo '<script type="text/javascript">';
					echo ' alert("Password not match. Please check your password again!")';  //not showing an alert box.
					echo '</script>';
					*/
					echo "<center><font color='red'>Password not match. Please check your password again!</font></center>";
				}
				else
				{
					$QUERY="SELECT * FROM SIGN_UP  WHERE USERNAME='$username'";
					$RESULT=mysqli_query($connection,$QUERY);
					if($RESULT)
					{
						while ( $row=mysqli_fetch_array($RESULT))
						{
							
						}
						if(mysqli_num_rows($RESULT)>0)
						{
							
							echo "<center><font color='red'>Username <b> $username</b> is not available. Choose a different one</font></center>";
						}
						else
						{
							$QUERY="INSERT INTO SIGN_UP(NAME,USERNAME,PASSWORD,SECURITY_QUESTION) VALUES('$name','$username','$HashedPSW','$security_question')";
							$RESULT=mysqli_query($connection,$QUERY);
							if($RESULT)
							{
								echo "<center><font color='green'>Registration Successfull! br <a href='login.php'> Log in </a></font></center>";
							}
							else
							{
								echo "<center><font color='red'>Error<br></font></center>".mysqli_error($connection);
							}
						}
					}
					else
					{
						echo "<center><font color='red'>Error:</font></center>".mysqli_error($connection);
					}	
				}
			
			}
		 ?>
		</center>

</body>
<footer>
		<center>
			<section class="copyright">
				
				Copyright &copy Degahabur Public Library 2019 -
				<?php echo date("Y")?>
			</section>
</footer>
</html>
