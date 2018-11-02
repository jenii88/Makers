<?php
	$dbServername = "localhost";
	$dbUsername = "root";
	$dbName = "testing";
	$conn = mysqli_connect($dbServername,$dbUsername,'','testing');

if(!empty($_POST))
{
	if(!$conn){
		echo 'Not connected';
	}

	if(!mysqli_select_db($conn,'testing'))
	{
		echo 'Database not selected';
	}
	$output = '';
	$ID = $_POST['ID'];
	$name = $_POST['name'];
	$equipment = $_POST['equipment'];

	$query = "INSERT INTO student (ID,Name,Equipment) VALUES ('$ID','$name','$equipment')" ;

	if(mysqli_query($conn,$query))
	{
		$output .= '<label class="text-success">Data Inserted</label>';
		//echo "Data Inserted";
	
	}
	else{
		echo "Failed";
	}

}	

  header("refresh:0.2;url=newStudent.php")


?>