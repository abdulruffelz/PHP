<!DOCTYPE html>
<html>
<head>
	<title>PCU-REJECTED PAGE</title>
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<script src="js/bootstrap.min.js"></script>
</head>
<body>

	<h3><center><u>REJECTED PATIENTS</u></center></h3>
	<div style="padding: 15px;">
		<a class="btn btn-primary" href="http://localhost/pcu/Login/admin/admin.php#profile" ><span class='glyphicon glyphicon-user' aria-hidden='true'></span>Back to Admin</a> 
	</div>
	<?php
    include("connect.php");
    $sql = "SELECT * FROM patients,checkup WHERE patients.p_aadhar=checkup.p_aadhar AND p_verify='n'";
	$result = mysqli_query($conn , $sql);
	if (mysqli_num_rows($result)>0)
	{ ?>
	<div class="container-fluid">
	<div class="well">	
	<table class="table">
	<tr>
	<th>NAME</th>
	<th>APPLICANT NAME</th>
	<th>AGE</th>
	<th>DOB</th>
	<th>GENDER</th>
	<th>ADDRESS</th>
	<th>MOBILE</th>
	<th>LANDMARK</th>
	<th>DISEASE</th>
	<th>REJECTED DATE</th>
	<th>REASON FOR REJECT</th>
    </tr>

	<?php while ($row = mysqli_fetch_array($result)) { ?>
		<tr>
		<td><?php echo $row['p_name']; ?> </td>
        <td><?php echo $row['a_name']; ?> </td>
        <td><?php echo $row['p_age']; ?> </td>
		<td><?php echo $row['p_dob']; ?> </td>
		<td><?php echo $row['p_gender']; ?> </td>
		<td><?php echo $row['p_address']; ?> </td>
		<td><?php echo $row['p_mob']; ?> </td>
		<td><?php echo $row['p_landmark']; ?> </td>
		<td><?php echo $row['p_disease']; ?> </td>
		<td><?php echo $row['rej_date']; ?> </td>
		<td><?php echo $row['comment']; ?> </td>
        </tr>

<?php  }
}

 else
{ ?>
	<script>alert("No Data Available !!!");</script>

<?php
}

?>

</table>
</body>
</html>
