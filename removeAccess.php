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
if(isset($_POST['SID'])){
	$SID = $_POST['SID'];
	$MID = $_POST['MID'];

	// $Name = $_POST['name'];
	// $Equipment = $_POST['equipment'];

	$query = "DELETE FROM access WHERE S_ID= $SID AND M_ID= $MID" ;

	if(mysqli_query($conn,$query))
	{
		
		echo 'Access Removed ';
	}
	else{

		echo 'All Fields Required';
	
	}

}
	
	header("refresh:0.01;url=newStudent.php");


?>