<?php  


$dbServername = "localhost";
$dbUsername = "root";


$conn = mysqli_connect($dbServername,$dbUsername,'','testing');
$query = "SELECT * FROM student ORDER BY ID DESC";
$result = mysqli_query($conn, $query);

 ?>  

<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
	<title>Add/Remove Students</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.18.0/jquery.validate.min.js" ></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="student.css">




</head>
<body>

	<header>
    <img src="https://www.uta.edu/_templates/_images/responsive/uta-logo-main.png" >
  </header>
		

		 <div class="topnav">
  			<a href="#home">Home</a>
  			<a href="#student">Students</a>
  			<a href="#machine">Machines</a>
  			<a href="#History">History</a>
		</div> 

<br/>

  <div>
  <button type="button" class="btn btn-default " data-toggle = "modal" data-target="#add_data_Modal">ADD STUDENT </button>
   <button type="button" class="btn btn-default " data-toggle = "modal" data-target="#remove_data_Modal">REMOVE STUDENT</button> 
</div>
  <table >
      <!-- <button type="button" class="btn btn-default " data-toggle = "modal" data-target="#add_data_Modal">ADD STUDENT </button>
      <button type="button" class="btn btn-default " data-toggle = "modal" data-target="#remove_data_Modal">REMOVE STUDENT</button> -->  
      <tr> 
      <br/> 
      <th>ID</th>
      <th>Student Name</th> 
      <th >Equipment</th>
      </tr>
      <?php
      $select_sql = "SELECT ID,Name,Equipment from student";
      $result = $conn-> query($select_sql);
      if($result-> num_rows > 0){
        while($row = $result-> fetch_assoc())
      
        {
          echo
            "<tr>
            <td>". $row["ID"] ."</td>
            <td>". $row["Name"] ."</td>
            <td>". $row["Equipment"] ."</td> 
            </tr>";
        }
        echo "</table>";
        }
      else{
        echo "0 result";
       }
      ?>
     </table>



<!-- 
	<div class="container-fluid">  --> 
    	<div class="footer"> 
        		<div class="col-sm-4 text-center">
        			<br />
           		 <p><a href="#" class="about">About Us</a></p>
            
            
           		 </div>
            	<div class="col-sm-4 text-center border-left">
          
              	<br />
               	<a href="#" class="about">Staff Login</a>
           		</div>
           		<div class="col-sm-4 col-xs-12 text-center border-left">
            		<h5 class="ft-text-title">Follow Us:</h5>
            		<div class="pspt-dtls">
                		<a href="#" class="about">FACEBOOK | </a>
               			 <a href="#" class="about">TWITTER | </a>
                		<a href="#" class="about">INSTAGRAM</a>
               			 <br><br><br><br><br><br><br>
            		</div>
       			 </div>
    	
		</div> 
</body>
</html>


<div id="add_data_Modal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">ADD STUDENT</h4>
   </div>
   <div class="modal-body">
    <form action="newInsert.php" method="post" id="insert_form">
      <label>Student 1000 ID</label>
     <input type="text" name="ID" id="ID" class="form-control" />
     <br />
     <label>Student Name</label>
     <input type="text" name="name" id="name" class="form-control" />
     <br />
     <label>Equipment Name</label>
     <select name="equipment" id="equipment" class="form-control">
      <option value=" "></option> 
      <option value="3D Printer">3D Printer</option>  
      <option value="Chainsaw">Chainsaw</option>
     </select>
     <br />
     
     <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />
     <span id="error_message" class="text-danger"></span>  
     <span id="success_message" class="text-success"></span>
    </form>
   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
   </div>
  </div>
 </div>
</div>

<div id="remove_data_Modal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">REMOVE STUDENT</h4>
   </div>
   <div class="modal-body">
    <form method="post" id="remove_form">
    <label>Student 1000 ID</label>
     <input type="text" name="ID" id="ID" class="form-control" />
     <br />
     <label>Student Name</label>
     <input type="text" name="name" id="name" class="form-control" />
     <br />
     <label>Equipment Name</label>
     <select name="equipment" id="equipment" class="form-control">
      <option value=" "></option> 
      <option value="3D Printer">3D Printer</option>  
      <option value="Chainsaw">Chainsaw</option>
     </select>
     <br />
     
     <input type="submit" name="remove" id="remove" value="Remove" class="btn btn-success" />
    </form>
   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
   </div>
  </div>
 </div>
</div>



<script>  
$(document).ready(function(){
   $('#insert_form').on("submit",function(event){ 
    event.preventDefault();  
                                  
  if($('#ID').val() == "")  
  {  
   alert("Student ID is required");  
  }  
  else if($('#name').val() == '')  
  {  
   alert("Student name is required");  
  }  
  else if($('#equipment').val() == '')
  {  
   alert("Equipmentis required");  
  }
   
  else  
  {
    
   $.ajax({  
      url:"newInsert.php",  
      method:"POST",  
      data:=$('#insert_form').serialize(), 
      beforeSend:function(){  
     $('#insert').val("Inserting");  
    }, 
      success:function(data){  
     $('#insert_form').trigger("reset");
      $('#add_data_Modal').modal('hide');  
    //  $('#success_message').fadeIn().html(data);  
    // setTimeout(function(){  
    //       $('#success_message').fadeOut("Slow");  
    // }, 2000);  
    }  
   });  
  }  
 });
});

</script> 

