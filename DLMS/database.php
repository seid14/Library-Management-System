 <?php

 	require'DatabaseConnectivity.php';
//****************Creating Databases ***********


		$databaseCreate = "CREATE DATABASE IF NOT EXISTS DLMS ";

		if( mysqli_query($connection, $databaseCreate))
		{

			echo " <font color='green'>DATABASE WITH ALL REQUIRED TABLES SUCCESSFULLY CREATED!!</font>";

			mysqli_select_db($connection, 'DLMS');




		//**************Creating Books Table ***********


				$Books_table = "CREATE TABLE IF NOT EXISTS BOOKS (ISBN varchar(30) PRIMARY KEY NOT NULL,
					TITLE varchar(50) NOT NULL,
					LANGUAGE varchar(50) NOT NULL,
					PUPLISHER varchar(50) NOT NULL,
					PUPLICATION_DATE date NOT NULL,
					AUTHOR varchar(50) NOT NULL)";

				$result=mysqli_query($connection, $Books_table);
				if($result)
				{
					echo " ";
				}
				else
				{
					echo "<BR>ERROR: BOOKS TABLE NOT CREATED".mysql_error($connection);
				}


        			$QUERY = "INSERT INTO BOOKS VALUES('00001',
        			'Change your habits Change your life',
        			'English','Jijiga Jet','2020-03-13','Tom Corley')";

        			if(mysqli_query($connection, $QUERY));

	        	$Issue_Book ="CREATE TABLE if not exists ISSUE_BOOK(
	        		UNIQUE_ID varchar(15) NOT NULL ,
	        		FULL_NAME varchar(50),
	        		PHONE_NUMBER BIGINT,
	        		EMAIL_ID varchar(30),
	        		DATE_OF_ISSUE date,
	        		DATE_OF_RETRUN date)";

 				$result=mysqli_query($connection,$Issue_Book);
 				if($result)
 				{
 					echo " ";
 				}
 				else
 				{
 					echo "<BR>EROOR: ISSUE_BOOK TABLE NOT CREATED".mysqli_error($connection);
 				}
 					
 			
 				$student="CREATE  TABLE IF NOT EXISTS LIBRARY_USERS(USER_ID varchar(30) NOT NULL primary key, FULL_NAME varchar(30) NOT NULL, DATE_OF_BIRTH date,PHONE_NUMBER BIGINT,EMAIL_ID varchar(20))";
 				$result=(mysqli_query($connection,$student));
 				if($result)
 					{
 						echo " ";
 					}
 				else
 				{
 					echo "<BR>ERROR:STUDENT TABLE NOT CREATED".mysqli_error($connection);
 				}
 			$faculty="CREATE  TABLE IF NOT EXISTS SIGN_UP (NAME varchar(255), EMIAL varchar(255), USERNAME varchar(255)PASSWORD varchar(255))";
 				$result=(mysqli_query($connection,$faculty));
 				if($result)
 					{
 						echo " ";
 					}
 				else
 				{
 					echo "<BR>EROOR: ".mysqli_error($connection);
 				}

 			$others="CREATE  TABLE IF NOT EXISTS ISSUE_BOOK (UNIQUE_ID varchar(10) NOT NULL primary key, SELECT_BOOK varchar(255), DATE_OF_ISSUE date,DATE_OF_RETRUN date)";
 				$result=(mysqli_query($connection,$others));
 				if($result)
 					{
 						echo " ";
 					}
 				else
 				{
 					echo "ERROR:  ".mysqli_error($connection);
 				}	
        			
		}

		else
			echo "<font color='red'>ERROR CREATING DATABASE </font>: ".mysqli_error($connection);

	mysqli_close($connection);

?>
