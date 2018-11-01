<?php
	$dbServername = "localhost";
	$dbUsername = "root";
	$dbName = "testing";
	$conn = mysqli_connect($dbServername,$dbUsername,'','testing');

	if(!$conn){
		echo 'Not connected';
	}

	if(!mysqli_select_db($conn,'testing'))
	{
		echo 'Databse not selected';
	}

	$ID = $_POST['ID'];
	$Name = $_POST['name'];
	$Equipment = $_POST['equipment'];

	$query = "INSERT INTO student (ID,Name,Equipment) VALUES ('$ID','$Name','$Equipment')" ;

	if(!mysqli_query($conn,$query))
	{
		echo 'Required';
	}
	else{

		echo 'Data Inserted';
	
	}

	

	header("refresh:0.2;url=newStudent.php")


?>