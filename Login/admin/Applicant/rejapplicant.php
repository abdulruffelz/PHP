<!DOCTYPE html>
<html>
<head>
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<script src="js/bootstrap.min.js"></script>
	<title>PCU-REJECTED APPLICANT</title>
</head>
<body>
 
  <h3><center><u>REJECTED APPLICANTS</u></center></h3>
  <div style="padding:15px;">
  <a class="btn btn-primary" href="http://localhost/pcu/Login/admin/admin.php#home"><span class='glyphicon glyphicon-user' aria-hidden='true'></span>Back to Admin</a> 
  </div>

  	<?php
  	include 'connect.php';
	$sql = "SELECT * FROM register WHERE a_verify='n'";
	$result = mysqli_query($conn , $sql);
	if (mysqli_num_rows($result)>0)
	{?>
	<div class="container-fluid">
	<div class="well">	
	<table class="table">
	<tr>
	<th>NAME</th>
	<th>ADDRESS</th>
	<th>WARD NUMBER</th>
	<th>MOBILE NO:</th>
	<th>E-MAIL</th>
	<th>AADHAR</th>
	<th>REASON FOR REJECT</th>
	<th>REJECTED DATE</th>
    </tr>

	<?php while ($row = mysqli_fetch_array($result)) { ?>
		<tr>
		<td><?php echo $row['a_name']; ?> </td>
		<td><?php echo $row['a_address']; ?> </td>
		<td><?php echo $row['a_wardno']; ?> </td>
		<td><?php echo $row['a_mob']; ?> </td>
		<td><?php echo $row['a_email']; ?> </td>
		<td><?php echo $row['a_aadhar']; ?> </td>
		<td><?php echo $row['comment']; ?> </td>
		<td><?php echo $row['rej_date']; ?> </td>

 <?php } ?>

  </table>

 <?php } 
  else
{ ?>
	<script>alert("No Data Available !!!");</script>

<?php
}
?>


</body>
</html>