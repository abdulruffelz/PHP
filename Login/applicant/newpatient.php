<?php
include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>PCU-USER PAGE</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <!-- Loader -->
    <link rel="stylesheet" href="css/loader.css">
    <script src="js/jquery-1.12.4.js"></script>
    <link rel="stylesheet" type="text/css" href="dashboard/vendor/font-awesome/css/font-awesome.min.css">
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

<body onload="myFunction()" style="margin:0;">
    <div class="container">
       <div>
            <h3><center><u>NEW REQUESTS</u></center></h3>
            <a class="btn btn-primary" href="http://localhost/pcu/Login/applicant/index.php" ><span class='glyphicon glyphicon-user' aria-hidden='true'></span>Back to User</a>   
        </div>
        <br>
        <table id="example" class="display nowrap" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Sl.No</th>
                    <th>Patient Name</th>
                    <th>Gender</th>
                    <th>Address</th>
                    <th>Mobile no</th>
                    <th>Aadhar</th>
                    <th>Actions</th>
                </tr>
            </thead>
           
            <tbody>
                <?php 
                    session_start();
	                $b = $_SESSION['a_id'];
                $sql = "SELECT * FROM patients,checkup WHERE patients.p_aadhar=checkup.p_aadhar AND p_verify='0' AND a_aadhar='$b'";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        // output data of each row
                        $a = 1;
                        while($row = $result->fetch_assoc()) {
                            $b = $a++;
                            $id = $b;
                            $p_name = $row['p_name'];
                            $p_address = $row['p_address'];
                            $p_mob = $row['p_mob'];
                            $p_aadhar = $row['p_aadhar'];
                            $p_date = $row['p_date'];
                            $p_age = $row['p_age']; 
                            $p_dob = $row['p_dob']; 
                            $p_gender = $row['p_gender'];
                            $p_landmark = $row['p_landmark'];
                            $p_disease = $row['p_disease'];
                            $p_curr_stat = $row['p_curr_stat'];
                            $p_curr_hlth_cond = $row['p_curr_hlth_cond'];
                            $p_curr_check_stat = $row['p_curr_check_stat'];    
        

       

                          

                    ?>
                <tr>
                    <td>
                        <?php echo $id; ?>
                    </td>
                    <td>
                        <?php echo $p_name; ?>
                    </td>
                    <td>
                        <?php echo $p_gender; ?>
                    </td>
                    <td>
                        <?php echo $p_address; ?>
                    </td>
                    <td>
                        <?php echo $p_mob; ?>
                    </td>
                    <td>
                        <?php echo $p_aadhar; ?>
                    </td>
                    <td>
                        
                        
                        <a href="#edit<?php echo $p_aadhar;?>" data-toggle="modal">
                            <button type='button' class='btn btn-info'><span class='glyphicon glyphicon-eye-open' aria-hidden='true'></span>View Details</button>
                        </a>
                    </td>

                    <!--Edit Item Modal -->
                    <div id="edit<?php echo $p_aadhar; ?>" class="modal fade" role="dialog">
                        <form method="post" class="form-horizontal" role="form">
                            <div class="modal-dialog modal-lg">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Patient Details</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="p_name">Patient Name:</label>
                                            <div class="col-sm-4">
                                                <input type="text" readonly class="form-control" id="p_name" name="p_name" value="<?php echo $p_name; ?>" placeholder="Name" required> <br></div>
                                            <label class="control-label col-sm-2" for="a_name">Date of Request:</label>
                                            <div class="col-sm-4">
                                                <input type="text" readonly class="form-control" id="a_name" name="a_name" value="<?php echo $p_date; ?>" placeholder="Applicant Name" required><br> </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="p_mob">Age:</label>
                                            <div class="col-sm-4">
                                                <input type="text" readonly class="form-control" id="p_mob" name="p_address" value="<?php echo $p_age; ?>" placeholder="Address" required> <br>
                                            </div>
                                            <label class="control-label col-sm-2" for="p_address">Gender:</label>
                                            <div class="col-sm-4">
                                                <input type="text" readonly class="form-control" id="p_address" name="p_address" value="<?php echo $p_gender; ?>" placeholder="Ward" required> <br> </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="control-label col-sm-2" for="p_mob">Date of birth:</label>
                                            <div class="col-sm-4">
                                                <input type="text" readonly class="form-control" id="p_mob" name="a_aadhar" value="<?php echo $p_dob; ?>" placeholder="Aadhar" required> <br>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="p_name">landmark:</label>
                                            <div class="col-sm-4">
                                                <input type="text" readonly class="form-control" id="p_name" name="p_name" value="<?php echo $p_landmark; ?>" placeholder="Date" required> <br></div>
                                        </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-2" for="p_mob">Disease:</label>
                                            <div class="col-sm-4">
                                                <input type="text" readonly class="form-control" id="p_mob" name="p_address" value="<?php echo $p_disease; ?>" placeholder="Address" required> <br>
                                            </div>
                                            <label class="control-label col-sm-2" for="p_address">Current Status:</label>
                                            <div class="col-sm-4">
                                                <input type="text" readonly class="form-control" id="p_address" name="p_address" value="<?php echo $p_curr_stat; ?>" placeholder="Ward" required> <br> </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="p_mob">Current Check Status</label>
                                            <div class="col-sm-4">
                                                <input type="text" readonly class="form-control" id="p_mob" name="p_address" value="<?php echo $p_curr_check_stat; ?>" placeholder="Address" required> <br>
                                            </div>
                                            <label class="control-label col-sm-2" for="p_address">Current Health Condition:</label>
                                            <div class="col-sm-4">
                                                <input type="text" readonly class="form-control" id="p_address" name="p_address" value="<?php echo $p_curr_hlth_cond; ?>" placeholder="Ward" required> <br> </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="hidden" name="aadhar" value="<?php echo $p_aadhar; ?>">
                                        <button type="submit" class="btn btn-danger" name="verify"><span class="glyphicon glyphicon-remove-circle"></span>Delete Request</button>
                                        <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cancel</button>  
        
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </tr>

                <?php
                        }
                        


                        //verify

                     if(isset($_POST['verify'])){
 
                              $var = $_POST['aadhar'];

                            $sql = "DELETE FROM patients WHERE p_aadhar='$var'";

                           $result = mysqli_query($conn, $sql);

                       if($result)
                          {
                       ?>
                   <script> alert("Applicant Deleted");
                      location.href='http://localhost/pcu/Login/applicant/newpatient.php';
                  </script>

                      <?php 
                          }
                       else
                           {
                             echo "not verified";
                           }

                        }
}
          
   
                   
?>
            </tbody>
        </table>
    </div>

 
</body>

</html>

