<!DOCTYPE html>
<html>
<head>
	<title>Palliative care unit : Admin</title>
	<script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.js"></script>
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
  <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <script>
        $(document).ready(function() {
                $('#example').DataTable({});
                $(function(){
                  var hash = window.location.hash;
                  hash && $('ul.nav a[href="' + hash + '"]').tab('show');
                });
            });

        </script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
</head>
<body>
  <div class="container-fluid">
	<header class="jumbotron">
			<div class="page-header">
				<h4><center> PCU-ADMIN HOME </center></h4>     
               <div class="text-right" >
                <a class="btn btn-success"  href="">HOME</a>
                <a class="btn btn-danger" href="#logout" data-toggle="modal"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>LOGOUT</a>
               </div>
      </div>               
    </header>
  </div>
   <div class="container-fluid">
    <div class="">
<!-- Nav tabs -->
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">APPLICANT</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">PATIENT</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="messages-tab" data-toggle="tab" href="#messages" role="tab" aria-controls="messages" aria-selected="false">DOCTOR</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="settings-tab" data-toggle="tab" href="#settings" role="tab" aria-controls="settings" aria-selected="false">MEDICARE</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="report-tab" data-toggle="tab" href="#report" role="tab" aria-controls="report" aria-selected="false">REPORT</a>
  </li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
  <div style="padding-bottom: 80px;" class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab"><br>
   &nbsp; <a class="btn btn-primary btn-sm"  href="Applicant/newapplicant.php">NEW REQUESTS</a>&nbsp;
    <a class="btn btn-primary btn-sm" href="Applicant/applicant.php">APPLICANTS</a>&nbsp;
    <a class="btn btn-primary btn-sm" href="Applicant/rejapplicant.php">REJECTED</a>&nbsp;
 </div>
  <div style="padding-bottom: 80px;" class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab"><br>
     &nbsp; <a class="btn btn-primary btn-sm"  href="Patient/newpatient.php">NEW REQUESTS</a>&nbsp;
        <a class="btn btn-primary btn-sm" href="Patient/patients.php">PATIENTS</a>&nbsp;
        <a class="btn btn-primary btn-sm" href="Patient/checkup.php">ADD CHECKUP DETAILS</a>&nbsp;
        <a class="btn btn-primary btn-sm" href="Patient/rejpatient.php">REJECTED</a>
  </div>
  <div style="padding-bottom: 80px;" class="tab-pane" id="messages" role="tabpanel" aria-labelledby="messages-tab"><br>
   &nbsp; <a class="btn btn-primary btn-sm" href="Doctor/doctors.php">DOCTOR DETAILS</a>
  </div>
  <div style="padding-bottom: 80px;" class="tab-pane" id="settings" role="tabpanel" aria-labelledby="settings-tab"><br>
   &nbsp; <a class="btn btn-primary btn-sm" href="Medicare/medicine.php">MEDICINE DETAILS</a>

  </div>
  <div style="padding-bottom: 80px;" class="tab-pane" id="report" role="tabpanel" aria-labelledby="report-tab"><br>
	  &nbsp; <a class="btn btn-primary btn-sm" href="Reports/reports.php">REP0RTS</a>
 </div>
</div>
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
    </div><br>
</body>
</html>
<?php
include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>  
</head>

<body>
  <h4>&nbsp&nbspNext Checkup Dates</h4> 
  
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Sl.No</th>
                    <th>Name</th>
                    <th>Checkup Date</th>
                </tr>
            </thead>
           
            <tbody>
                <?php 
                    $dat =date('Y-m-d',strtotime("+1 day"));
                    $sql = "SELECT * FROM patients,checkup WHERE patients.p_aadhar=checkup.p_aadhar AND checked=1 AND checkup_date >='$dat'";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        // output data of each row
                        $a = 1;
                        while($row = $result->fetch_assoc()) {
                            $b = $a++;
                            $id = $b;
                            $item_name = $row['p_name'];
                            $item_category = $row['checkup_date'];

                          

                    ?>
                <tr>
                    <td>
                        <?php echo $id; ?>
                    </td>
                    <td>
                        <?php echo $item_name; ?>
                    </td>
                    <td>
                        <?php echo $item_category; ?>
                    </td>
            
                  
                </tr>
                </div><?php
        } 
        }                  
?></div>
            </tbody>
        </table>
   
 
</body>

</html>