<!DOCTYPE html lang="en">
	<html>
		<head>
			<title>Log in</title>
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

	<body class="login">
		<br><br><br>
		<section id="cover" class="min-vh-100">
    	<div id="cover-caption">
		<div class="container">
		<div class="row">
		<div class="col-xl-8 col-lg-8 col-md-8 col-sm-10 mx-auto  form p-4">
		<form class="form-horizontal" method="POST">
		<br>
		<fieldset>
		<legend>Admin Log in  </legend>			
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
									<label for="password" class="cols-sm-2 control-label">Password</label>
									<div class="cols-sm-10">
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
											<input type="password" class="form-control" name="password" id="password"  placeholder="Enter your Password"/>
										</div>
									</div>
								</div>

								<div class="form-group ">
									<button type="submit" class="btn btn-info btn-lg btn-block login-button" name="submit">Login</button>
								</div>
								</form>	
						
								<div class="container">
								  <div class="row">
								    <div class="col-sm-8"><a href="signup.php">Create New  Account</div>
								    <div class="col-sm-4"><a href="ForgotPassword.php">Forgot Password</div>
								  </div>
								  </div>
								</div>

		 </fieldset>
		</div>
		</div>
		</div>
		</div>

		<?php
			session_start();
			include'DatabaseConnectivity.php';
			if(isset($_POST['submit']))
			{
				if(empty($_POST['username'])||empty($_POST['password']))
				{
					echo '<script type="text/javascript">';
					echo ' alert("Please fill all the  required fields!")';
					echo '</script>';
					exit();
				}

				else
				{
					$username=$_POST['username'];
					$password=$_POST['password'];

					//QUERY

					$QUERY="SELECT * FROM SIGN_UP WHERE USERNAME='$username'";
					$RESULT=mysqli_query($connection,$QUERY);
					if($RESULT)
					{

						if(mysqli_num_rows($RESULT)>0)
						{
							$row=mysqli_fetch_array($RESULT);
							$password_hashed=$row['PASSWORD'];
							if(password_verify($password, $password_hashed))
							{
								header('location:index.php');
								$_SESSION['active']="$username";
							}
							else
							{
								
								echo "<center><h4><font color='red'>Password is Incorrect!</font></font></h4></center>";
								
							}
					
						}
						
						else
						{
							echo "<center><h4 classs='bg-primary'><font color='red'>Username is Invalid!</font></h4></center>";
						}
					}
					else
					{
					echo "Erro:".mysqli_error($connection);
					}
				}
			}
		?>
</body>
	
<!---Footer begin here!--->
<footer>
		<center>
			<section class="copyright">
				
				Copyright &copy Degahabur Public Library 2019 -	
				<?php echo date("Y")?>
			</section>
</footer>
</html>
