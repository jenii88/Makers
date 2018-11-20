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
	$Firstname = $_POST['Firstname'];
	$Lastname = $_POST['Lastname'];

	$query = "INSERT INTO student (SID,Firstname,Lastname) VALUES ('$SID','$Firstname','$Lastname')" ;
	

	if(!mysqli_query($conn,$query))
	{
		echo 'Required';
	}
	else{
	$select_query = "SELECT * FROM student ORDER BY SID ASC";
     $result = mysqli_query($conn, $select_query);
     $output .= '
      <table id=student_table>  
                    <<tr> 
      <br/> 
      <th>SID</th>
      <th>Firstname</th> 
      <th >Lastname</th>
      </tr>

     ';
     while($row = mysqli_fetch_array($result))
     {
      $output .= '
       <tr>  
                         <td>' . $row["SID"] . '</td>  
                         <td>' . $row["Firstname"] . '</td> 
                         <td>' . $row["Lastname"] . '</td> 
                          
                    </tr>
      ';
     }
     $output .= '</table>';

		echo $output;
	
	}

}
	
	header("refresh:5s;url=newStudent.php");


?>