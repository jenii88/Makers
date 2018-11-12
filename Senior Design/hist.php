<!DOCTYPE html>
<html>

<meta charset="UTF-8">
<meta name="viewport" "content="width=device-width, "initial-scale=1"> <!--make the website work on all devices and screen res -->
<link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css"> <!--take care of all styling needs and browser differences -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="student.css"> <!--- link for design of website --->

<head>
  <style>

  .w3-btn {width:150px;}

  table#table2 {
    width:70%;
    margin-left:2%;
    margin-right:5%;
  }



	</style>

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


  <!--- header & design for website starts here --->


  		 <div class="topnav">
    			<a href="#home">Home</a>
    			<a href="#student">Students</a>
    			<a href="#machine">Machines</a>
    			<a href="#History">History</a>
  		</div>

<!--- header &design for website ends here --->

<!--- table 1 ----->
<?php

//connect to SQLiteDatabase


$conn = mysqli_connect("localhost", "root", "Kimilkai88", "makerssquad");

if(!$conn) {
  echo "Error: Unable to connect to MySQL." . PHP_EOL;
  echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
  echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
  exit;
}
#echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
#echo "Host information: " . mysqli_get_host_info($conn) . PHP_EOL;


$sql = "SELECT * FROM Tool";
$result = $conn->query($sql);
?>
<!-- table starts here -->
<div class ="container" style="overflow-y:auto;">
<table class = "w3-table-all w3-centered w3-hoverable">
  <thead>
    <tr class="w3-hover-orange">
      <th>ID</th>
      <th>Name</th>
      <th>Lab</th>
      <th>Expand</th>
    </tr>
  </thead>
  <tbody>
      <?php
        // output data of each row
        $no=0;
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$row["Tool_ID"]."</td>";
            $idArray=array($row["Tool_ID"]);
            echo "<td>".$row["Toolname"]."</td>";
            echo "<td> ".$row["lab"]."</td><td>";
            ?>
            <div class="w3-container">
              <p><button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-black w3-round-xlarge"> Expand</button></p>
            </div>

            </td>

            <?php
            $no++;
            "</tr>";
        }?>


  </tbody>
</tbody>
</table>
</div>

<!-- Modal -->
<div id="id01" class="w3-modal w3-animate-opacity">
  <div class="w3-modal-content w3-card-4">
    <header class="w3-container w3-blue">
      <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-large w3-display-topright">&times;</span>
        <h4 class="modal-title"><center>Student Record</center></h4>
      </header>
      <div class="w3-container">
        <p>

          <?php
          $sql2 = "SELECT h.Timestamp, v.User_ID, u.Firstname FROM User u
                    LEFT JOIN History h ON u.User_ID=h.User_ID
                    LEFT JOIN Verify v ON v.User_ID=u.User_ID
                    WHERE h.TOOL_ID=1";

          $result2 = $conn->query($sql2) or die ($conn->error);
           ?>
           <div class ="container">
           <table id="table2" class = "w3-table-all w3-centered w3-hoverable">
             <thead>
               <tr class="w3-hover-orange">
                 <th>UserID</th>
                 <th>Name</th>
                 <th>Time Log</th>
               </tr>
             </thead>
             <tbody>
               <?php
               while($row2 = $result2->fetch_assoc()){
                 echo "<tr>
                 <td>".$row2["User_ID"]."</td>
                 <td>".$row2["Firstname"]."</td>
                 <td>";if ($row2["Timestamp"]==NULL) {
                        echo "Currently in use.";
                      }else {
                        echo $row2["Timestamp"]."</td></tr>";
                      }
               }
               ?>
             </tbody>
           </table>
         </div>
             </p>
      </div>
    </div>
  </div>

<?php
mysqli_close($conn);
?>


</body>
</html>
