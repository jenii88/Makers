<?php


	$ID2 = $_POST['ID'];
	$name2 = $_POST['name'];
	$equipment2 = $_POST['equipment'];


	$dbServername = "localhost";
	$dbUsername = "root";
	$dbName = "testing";
	$conn = mysqli_connect($dbServername,$dbUsername,'','testing');


	if(!$conn){
		echo 'Not connected';
	}

	if(!mysqli_select_db($conn,'testing'))
	{
		echo 'Database not selected';
	}
	
	
	if(isset($_POST['ID'])){

	 $query = "DELETE FROM student (ID,Name,Equipment) WHERE ('$ID2','$name2','$equipment2')" ;

	 if (($ID2 != NULL) && (strlen($name2) != 0) && (strlen($equipment2) != 0))
	{
		mysqli_query($conn,$query);
		
		
	}

 
}
 header("refresh:1;url=newStudent.php");
?>