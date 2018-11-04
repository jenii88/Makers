<?php


	$ID2 = $_POST['ID'];
	$name2 = $_POST['name'];
	$equipment2 = $_POST['equipment'];


	$dbServername = "http://192.168.64.2";
	$dbUsername = "root";
	$dbName = "testing";
	$conn = mysqli_connect("localhost",$dbUsername,'','testing');


	if(!$conn){
		echo 'Not connected';
	}

	if(!mysqli_select_db($conn,'testing'))
	{
		echo 'Database not selected';
	}
	
	
	if(isset($_POST['ID'])){

	 $query = "INSERT INTO student (ID,Name,Equipment) VALUES ('$ID2','$name2','$equipment2')" ;

	 if (($ID2 != NULL) && (strlen($name2) != 0) && (strlen($equipment2) != 0))
	{
		mysqli_query($conn,$query);
		
		
	}
	else{
		echo "Incorrect information";
	 }
	
 
}
 header("refresh:0.01;url=newStudent.php");
?>

