<?php

  include 'connect.php';
  
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin:Report</title>
	  <link rel="stylesheet" href="css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
	<div class="jumbotron">
		<center><h3>Report Generation</h3></center>
	<a class="btn btn-primary btn-sm " style="float: right;" href="http://localhost/pcu/Login/admin/admin.php#report">Back to Admin</a>
	</div>
	<div class="container">
	<form action="" method="POST">	
	<label>Select:</label>	
	<select name="module">	
	<option value="applicant">Applicant</option>
	<option value="patient">Patient</option>
	<option value="checkup">Checkup</option>
	<option value="medicine">Medicine</option>	
    </select> &nbsp
	<label>From Date:</label>	
	<input type="date" name="start" placeholder="start" required>&nbsp
	<label>To Date:</label>	
	<input type="date" name="end" placeholder="start" required>&nbsp
	<input class="btn btn-success" type="submit" name="submit" value="submit">
    </div>
    <?php
          
            if(isset($_POST['submit'])){

  	$mod = $_POST['module'];
  	$start = $_POST['start'];
  	$end = $_POST['end'];



    if($mod=="applicant")
    {   ?>
    	<br>
    	<div class="container">
    	<h3><center>Applicants</center></h3>
    	Date : <?php echo $start; ?> to <?php echo $end; ?>
    	<table class="table">
    	<thead>	
    		<tr>
    		<th>Sl.no</th>
    		<th>Name</th>
    		<th>Address</th>
    		<th>Mobile</th>
    		<th>Aadhar</th>
    		<th>Date</th>
            </tr>
        </thead>
        
        <tbody> 
        <?php    
    	$sql = "SELECT * FROM register WHERE a_date BETWEEN '$start' AND '$end' AND a_verify='1'";
    	$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
    	$a = 1;
    	while($row = mysqli_fetch_assoc($result)){
    		$b = $a++;
    		$id= $b;
    		$a_name = $row['a_name'];
    		$a_address = $row['a_address'];
    		$a_mob = $row['a_mob'];
    		$a_aadhar = $row['a_aadhar'];
    		$a_date = $row['a_date'];
          ?>

          <tr>
          	  <td>
          	  	<?php echo $id; ?>
          	  </td>
          	  <td>
          	  	<?php echo $a_name; ?>
          	  </td>
          	  <td>
          	  	<?php echo $a_address; ?>
          	  </td>
          	  <td>
          	  	<?php echo $a_mob; ?>
          	  </td>
          	  <td>
          	  	<?php echo $a_aadhar; ?>
          	  </td>
          	  <td>
          	  	<?php echo $a_date; ?>
          	  </td>
          </tr>
      </tbody>
  </table>
  <a class="btn btn-primary" href="" onclick="window.print();">Print</a>
</div>
        <?php	}
    	
    }

   //patient 
  
    elseif($mod=="patient")
    

    {  ?>
      <br>
    	<div class="container">
    	<h3><center>Patients</center></h3>
    	Date : <?php echo $start; ?> to <?php echo $end; ?>
    	<table class="table">
    	<thead>	
    		<tr>
    		<th>Sl.no</th>
    		<th>Name</th>
    		<th>Address</th>
    		<th>Mobile</th>
    		<th>Aadhar</th>
    		<th>Date</th>
            </tr>
        </thead>
        
        <tbody> 
        <?php    
    	$sql = "SELECT * FROM patients WHERE p_date BETWEEN '$start' AND '$end' AND p_verify='1'";
    	$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
    	if ($result->num_rows > 0) {
    	$a = 1;
    	while($row = mysqli_fetch_assoc($result)){
    		$b = $a++;
    		$id= $b;
    		$a_name = $row['p_name'];
    		$a_address = $row['p_address'];
    		$a_mob = $row['p_mob'];
    		$a_aadhar = $row['p_aadhar'];
    		$p_date = $row['p_date'];

          ?>

          <tr>
          	  <td>
          	  	<?php echo $id; ?>
          	  </td>
          	  <td>
          	  	<?php echo $a_name; ?>
          	  </td>
          	  <td>
          	  	<?php echo $a_address; ?>
          	  </td>
          	  <td>
          	  	<?php echo $a_mob; ?>
          	  </td>
          	  <td>
          	  	<?php echo $a_aadhar; ?>
          	  </td>
          	  <td>
          	  	<?php echo $p_date; ?>
          	  </td>
          </tr> 
<?php } }?>
   </tbody>
  </table>
  <a class="btn btn-primary" href="" onclick="window.print();">Print</a>
</div>


  <?php  }

  //checkup

    elseif($mod=="checkup")
    { ?>
      <br>
    	 	<div class="container">
    	<h3><center>Checkup</center></h3>
    	Date : <?php echo $start; ?> to <?php echo $end; ?>
    	<table class="table">
    	<thead>	
    		<tr>
    		<th>Sl.no</th>
    		<th>Name</th>
    		<th>Address</th>
    		<th>Mobile</th>
    		<th>Doctor</th>
    		<th>Consulted Date</th>
            </tr>
        </thead>
        
        <tbody> 
        <?php    
    	$sql = "SELECT * FROM newcheckup,patients WHERE checked_date BETWEEN '$start' AND '$end' AND p_verify='1' AND newcheckup.p_aadhar=patients.p_aadhar";
    	$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
    	if ($result->num_rows > 0) {
    	$a = 1;
    	while($row = mysqli_fetch_assoc($result)){
    		$b = $a++;
    		$id= $b;
    		$a_name = $row['p_name'];
    		$a_address = $row['p_address'];
    		$a_mob = $row['p_mob'];
    		$a_aadhar = $row['dr_name'];
    		$p_date = $row['checked_date'];

          ?>

          <tr>
          	  <td>
          	  	<?php echo $id; ?>
          	  </td>
          	  <td>
          	  	<?php echo $a_name; ?>
          	  </td>
          	  <td>
          	  	<?php echo $a_address; ?>
          	  </td>
          	  <td>
          	  	<?php echo $a_mob; ?>
          	  </td>
          	  <td>
          	  	<?php echo $a_aadhar; ?>
          	  </td>
          	  <td>
          	  	<?php echo $p_date; ?>
          	  </td>
          </tr> 
<?php } }?>
   </tbody>
  </table>
  <a class="btn btn-primary" href="" onclick="window.print();">Print</a>
</div>



   <?php }

  //medicine
 

    else{ ?>
    	 <br>
    	 	<div class="container">
    	<h3><center>Medicine</center></h3>
    	Date : <?php echo $start; ?> to <?php echo $end; ?>
    	<table class="table">
    	<thead>	
    		<tr>
    		<th>Sl.no</th>
    		<th>Name</th>
    		<th>Medicine Name</th>
    		<th>Quantity</th>
    		<th>Date</th>
            </tr>
        </thead>
        
        <tbody> 
        <?php    
    	$sql = "SELECT * FROM medicine_stock WHERE m_date BETWEEN '$start' AND '$end'";
    	$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
    	if ($result->num_rows > 0) {
    	$a = 1;
    	while($row = mysqli_fetch_assoc($result)){
    		$b = $a++;
    		$id= $b;
    		$a_name = $row['p_name'];
    		$a_address = $row['m_name'];
    		$a_mob = $row['quantity'];
    		$p_date = $row['m_date'];

          ?>

          <tr>
          	  <td>
          	  	<?php echo $id; ?>
          	  </td>
          	  <td>
          	  	<?php echo $a_name; ?>
          	  </td>
          	  <td>
          	  	<?php echo $a_address; ?>
          	  </td>
          	  <td>
          	  	<?php echo $a_mob; ?>
          	  </td>
          	  <td>
          	  	<?php echo $p_date; ?>
          	  </td>
          </tr> 
<?php } }?>
   </tbody>
  </table>
  <a class="btn btn-primary" href="" onclick="window.print();">Print</a>
</div>
<?php   }
    
    }

    ?>
</form>

</body>
</html>