<!DOCTYPE html>
<html>
<head>
	<title>USER</title>
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery-1.11.3.min.js"></script>
    <script>
        $(document).ready(function() {
                $('#example').DataTable({});
            });

        </script>
    <link rel="stylesheet" href="css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="css/responsive.bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
</head>
<body>
    <div class="container-fluid">
	<div class="jumbotron" style="background-color: antiquewhite;">
	<h3><center>PALLIATIVE CARE UNIT</center></h3>
	<div class="text-right">
		<a class="btn btn-success" href="">HOME</a>&nbsp
        <a class="btn btn-danger" href="#logout" data-toggle="modal"><span class='glyphicon glyphicon-log-out' aria-hidden='true'></span>LOGOUT</a>   
     </div> 
	</div>
</div>
	<div class="container-fluid">
		<div class="well" style="background-color: lightsteelblue;">
	<ul>
	<li><a style="background-color: #007bff; border-color: #007bff; color: #fff;" class="btn btn-primary btn-sm" href="newpatient.php?<?php session_start(); $c=$_SESSION['a_id']; ?>">REQUEST LIST</a><br></li>
    </ul>
    <ul>
    <li><a style="background-color: #007bff; border-color: #007bff; color: #fff;" class="btn btn-primary btn-sm" href="patients.php?<?php $b = $_SESSION['a_id']; ?>">PATIENTS</a><br></li>
    </ul>
    <ul>
    <li><a  style="background-color: #007bff; border-color: #007bff; color: #fff;"  class="btn btn-primary btn-sm" href="register.php?<?php  $a = $_SESSION['a_id']; ?>">ADD NEW PATIENT</a></li>
    </ul>
   </div>
</div>
 <!--Logout Modal -->
    <div id="logout" class="modal fade" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Logout</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="delete_id" value="Logout">
                    <div class="alert alert-danger">Are you Sure you want to logout
                    </div>
                    <div class="modal-footer">
                        <a href="http://localhost/pcu/Login/index.php">
                            <button type="button" class="btn btn-danger">YES </button>
                        </a>
                        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    
</body>
</html>

