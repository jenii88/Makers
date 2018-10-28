<?php  


$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "makerssquad";

$conn = mysqli_connect($dbServername,$dbUsername,$dbPassword,"makerssquad");
echo "Success";
$query = "SELECT * FROM student ORDER BY ID DESC";
$result = mysqli_query($conn, $query);

 ?>  

<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
	<title>Add/Remove Students</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="student.css">

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top"> 
		<div class="container">
			<div class = "navbar-header">
				 <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        			<span class="sr-only">Toggle navigation</span>
        			<span class="icon-bar"></span>
       				 <span class="icon-bar"></span>
        			<span class="icon-bar"></span>
      			</button>
      			<a class="brand" href="#"><img src="https://media.nbcdfw.com/images/652*489/uta+university+of+texas+arlington.jpg" /></a>
				
			</div>
			<form class="navbar-form navbar-right" role="search">
  				<div class="form-group">
    			<input type="text" class="form-control" placeholder="Search">
  				</div>
  				<button type="submit" class="btn btn-default">Submit</button>
			</form>
			
		</div>
		</nav>

		 <div class="topnav">
  			<a href="#home">Home</a>
  			<a href="#student">Students</a>
  			<a href="#machine">Machines</a>
  			<a href="#History">History</a>
		</div> 


		<div class="row body1"> 
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<!-- <div class="thumbnail">  -->
				<button type="button" class="btn btn-default button1" data-toggle = "modal" data-target="#add_data_Modal">ADD </button>
			<!-- <div class="image image1"></div> -->
			</div>
			
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<!-- <div class="thumbnail"> -->
				<button type="button" class="btn btn-default button1" data-toggle = "modal" data-target="#remove_data_Modal">REMOVE</button>	
			<!-- <div class="image image2"></div>  -->
			</div>
		
		
		 </div> 
	</div>
<div class="container" style="width:1200px;">
   <div class="table-responsive">
  <div id="student_table">
     <table class="table table-bordered">
      <tr>
        
       <th width="25%">ID</th>
       <th width="50%">Student Name</th> 
       <th width="25%">Equipment</th>
      </tr>
      <!-- <?php
      // while($row = mysqli_fetch_array($result))
      {
      ?>
      <tr>
       <td><?php echo $row["name"]; ?></td>
       <td><input type="button" name="view" value="view" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs view_data" /></td>
      </tr>
      <?php
      }
      ?> -->
     </table>
    </div>
  </div>
</div>


<!-- 
	<div class="container-fluid">  --> 
    	<div class="footer"> 
  	 		<!-- <div class="jumbotron" style="margin-bottom:0">	 -->
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
    		<!-- </div> -->
			<!-- <div class="row ft-copyright pt-2 pb-2" style="padding-left: 25px;">
			<div class="col-sm-4 text-pp-crt">cpoyright 2018 All  Rights Reserved</div>
			<div class="col-sm-4 text-pp-crt-rg">Department of Information Reg No :</div>
			<div class="col-sm-4 developer">
				<a href="https://topline-tech.com" target="_blank" class="text-pp-crt">By : <b>T</b>op<b>L</b>ine</a>
			</div> -->
		</div> 
	<!--  </div>  -->

		


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
    <form method="post" id="insert_form">
     <label>Student Name</label>
     <input type="text" name="name" id="name" class="form-control" />
     <br />
     <label>Student 1000 ID</label>
     <input type="text" name="ID" id="ID" class="form-control" />
     <br />
     <label>Equipment Name</label>
     <select name="equipment" id="equipment" class="form-control">
      <option value=" "></option> 
      <option value="3D Printer">3D Printer</option>  
      <option value="Chainsaw">Chainsaw</option>
     </select>
     <br />
     
     <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />
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
     <label>Student Name</label>
     <input type="text" name="name" id="name" class="form-control" />
     <br />
     <label>Student 1000 ID</label>
     <input type="text" name="ID" id="ID" class="form-control" />
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
 $('#insert_form').on("submit", function(event){  
  event.preventDefault();  
  if($('#name').val() == "")  
  {  
   alert("Name is required");  
  }  
  else if($('#ID').val() == "")  
  {  
   alert("Student 1000 ID is required");  
  }  
  else if($('#equipment').val() == "")
  {  
   alert("Please select an Equipment");  
  }
   
  else  
  {  
   $.ajax({  
    url:"insert.php",  
    method:"POST",  
    data:$('#insert_form').serialize(),  
    beforeSend:function(){  
     $('#insert').val("Inserting");  
    },  
    success:function(data){  
     $('#insert_form')[0].reset();  
     $('#add_data_Modal').modal('hide');
     $('#student_table').html(data);   
    }  
   });  
  }  
 });

</script>

