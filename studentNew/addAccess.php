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
		echo 'Database not selected';
	}
if(isset($_POST['SID'])){
	$SID = $_POST['SID'];
	$MID = $_POST['MID'];

	$check = "SELECT SID,MID FROM student,machine WHERE SID = '$SID' AND MID = '$MID' " ;
	$rs = mysqli_query($conn,$check);
	$data = mysqli_fetch_array($rs, MYSQLI_NUM);
	if($data[0] > 1) {
    	
    	$query = "INSERT INTO access(S_ID,M_ID) values ('$SID','$MID')";
    	if (!mysqli_query($conn,$query))
    	{
    		echo "Error adding student";
    	}
    	else{
    		echo "Student Added to the Machine";
    	}
	}

	else{

		echo "Error";
	}
	

	// if(!mysqli_query($conn,$query))
	// {
	// 	echo 'Required';
	// }
	// else{
	// $select_query = "SELECT * FROM student ORDER BY SID ASC";
 //     $result = mysqli_query($conn, $select_query);
 //     $output .= '
 //      <table id=student_table>  
 //                    <<tr> 
 //      <br/> 
 //      <th>SID</th>
 //      <th>Firstname</th> 
 //      <th >Lastname</th>
 //      </tr>

 //     ';
 //     while($row = mysqli_fetch_array($result))
 //     {
 //      $output .= '
 //       <tr>  
 //                         <td>' . $row["SID"] . '</td>  
 //                         <td>' . $row["Firstname"] . '</td> 
 //                         <td>' . $row["Lastname"] . '</td> 
                          
 //                    </tr>
 //      ';
 //     }
 //     $output .= '</table>';

	// 	echo $output;
	
	// }

}
	
	header("refresh:5s;url=newStudent.php");


?>