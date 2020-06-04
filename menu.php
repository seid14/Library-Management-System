<?php session_start();
ob_start();
?>
<!DOCTYPE html lang="en">
	<html>
		<head>
			<title>WELCOME TO DEGAHABUR PUPLIC LIBRARY MANAGEMENT SYSTEM</title>
			<meta charset="UTF-8"/>
			<meta name="viewport" content="width=device-width, initial-scale = 1.0, 
			maximum-scale=1.0, user-scalable=no"/> 
			<meta http-equiv="X-UA-Compatible" content="ie=edge" />
			<link href="https://fonts.googleapis.com/css?family=Poppins:400,500&display=swap" rel="stylesheet" />
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
			<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
      <link rel="stylesheet" href="style.css">

		</head>

		<!-- HEAD PART ENDS HERE !-->



		<!--HEADER STARTS HERE!-->
		<header>
			<div class="burger">
							
						<div class="line1"></div>
						<div class="line2"></div>
						<div class="line3"></div>
					</div>

			<div class="logo-container">
			 <p class="display-5">DPL Online Library Management System</p>
			</div>
			<nav>
				<ul class="nav-links">
					<li><a href="index.php" class="nav-link"><i class="fa fa-home"></i>Home</a>
					</li>
					<li><a href="Available_Books.php" class="nav-link">
						<i class="fa fa-book"></i>Books</a>
					</li>

					<li><a href="library_users.php" class="nav-link">
						<i class="fa fa-users" aria-hidden="true"></i>Users</a>
					</li>

					<li><a href="#" class="nav-link">
						<i class="fa fa-file" aria-hidden="true"></i>Reports<i class="fa fa-caret-down"></i></a>
						<ul>
							<li> <a href="Book_report.php"class="drop-down">Books<br> Report</a></li>
							<li> <a href="users_report.php"class="drop-down"> Users<br> Report</a></li>
							<li> <a href="#"class="drop-down"> Other <br> Report</a></li>
						</ul>
					</li>
					</li>

					<li><a href="messages.php" class="nav-link">
						<i class="fa fa-envelope" aria-hidden="true"></i>Messages</a>
					</li>

					<li><a href="#" class="nav-link">
						<i class="fa fa-bell" aria-hidden="true"></i></a>
					</li>

					<li>
						<a href="login.php" class="nav-link">
							<?php if(isset($_SESSION['active']))
							{
								echo "You're:".$_SESSION['active'];
								echo "<i class='fa fa-sign-out' aria-hidden='true'></i></a>";
								
							}
							else
							{
								header('location:login.php');
							}
							?>
						</a>

					</li>
					
				</ul>
			</nav>

		</header>

		<!---HEDER ENDS HERE!--->



		<!---BODY STARTS HERE!--->

<body>
	<script type="text/javascript" src="script.js"></script>
	<!--<script src="js/bootstrap.min.js"></script>!-->

</body>
</html>
