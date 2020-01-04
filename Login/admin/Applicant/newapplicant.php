<?php
include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>PCU-ADMIN</title>
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
        $(function () {
          $('[data-toggle="tooltip"]').tooltip()
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
             <a class="btn btn-primary" href="http://localhost/pcu/Login/admin/admin.php#home"><span class='glyphicon glyphicon-user' aria-hidden='true'></span>Back to Admin</a> 
        </div>
        <br>
        <table id="example" class="display nowrap" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Sl.No</th>
                    <th>Applicant Name</th>
                    <th>Address</th>
                    <th>Ward no</th>
                    <th>Mobile</th>
                    <th>Aadhar</th>
                    <th>Actions</th>
                </tr>
            </thead>
           
            <tbody>
                <?php 
                    $sql = "SELECT * FROM register WHERE a_verify='0'";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        // output data of each row
                        $a = 1;
                        while($row = $result->fetch_assoc()) {
                            $b = $a++;
                            $id = $b;
                            $item_name = $row['a_name'];
                            $item_code = $row['a_address'];
                            $item_category = $row['a_wardno'];
                            $item_description = $row['a_mob'];
                            $a_aadhar = $row['a_aadhar'];
                            $a_date = $row['a_date'];

                          

                    ?>
                <tr>
                    <td>
                        <?php echo $id; ?>
                    </td>
                    <td>
                        <?php echo $item_name; ?>
                    </td>
                    <td>
                        <?php echo $item_code; ?>
                    </td>
                    <td>
                        <?php echo $item_category; ?>
                    </td>
                    <td>
                        <?php echo $item_description; ?>
                    </td>
                    <td>
                        <?php echo $a_aadhar; ?>
                    </td>
                    <td>
                        
                        
                        <a href="#edit<?php echo $a_aadhar;?>" data-toggle="modal">
                            <button type='button' class='btn btn-info'><span class='glyphicon glyphicon-eye-open' aria-hidden='true'></span>View Details</button>
                        </a>
                    </td>

                    <!--Edit Item Modal -->
                    <div id="edit<?php echo $a_aadhar; ?>" class="modal fade" role="dialog">
                        <form method="post" class="form-horizontal" role="form">
                            <div class="modal-dialog modal-lg">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Applicant Details</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="item_name">Applicant Name:</label>
                                            <div class="col-sm-4">
                                                <input type="text" readonly class="form-control" id="item_name" name="item_name" value="<?php echo $item_name; ?>" placeholder="Name" required> <br></div>
                                            <label class="control-label col-sm-2" for="item_code">Address:</label>
                                            <div class="col-sm-4">
                                                <input type="text" readonly class="form-control" id="item_code" name="item_code" value="<?php echo $item_code; ?>" placeholder="Address" required><br> </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="item_description">Mobile No:</label>
                                            <div class="col-sm-4">
                                                <input type="text" readonly class="form-control" id="item_description" name="item_description" value="<?php echo $item_description; ?>" placeholder="Mobile" required> <br>
                                            </div>
                                            <label class="control-label col-sm-2" for="item_category">Ward No:</label>
                                            <div class="col-sm-4">
                                                <input type="text" readonly class="form-control" id="item_category" name="item_category" value="<?php echo $item_category; ?>" placeholder="Ward" required> <br> </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="control-label col-sm-2" for="item_description">Aadhar No:</label>
                                            <div class="col-sm-4">
                                                <input type="text" readonly class="form-control" id="item_description" name="a_aadhar" value="<?php echo $a_aadhar; ?>" placeholder="Aadhar" required> <br>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="item_name">Date of Request:</label>
                                            <div class="col-sm-4">
                                                <input type="text" readonly class="form-control" id="item_name" name="item_name" value="<?php echo $a_date; ?>" placeholder="Date" required> <br></div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary" name="verify"><span class="glyphicon glyphicon-ok"></span> Verify</button>
                                    <a href="#reject<?php echo $a_aadhar;?>" data-toggle="modal">
                                        <button type="button" class="btn btn-danger"><span class='glyphicon glyphicon-remove' aria-hidden='true' ></span>Reject
                                         </button>
                                    </a>
        
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </tr>
                <!--Reason -->
                    <div id="reject<?php echo $a_aadhar; ?>" class="modal fade" role="dialog">
                        <form method="post" class="form-horizontal" role="form">
                            <div class="modal-dialog modal-lg">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Enter The Reason</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="item_name">Reason:</label>
                                            <div class="col-sm-8">
                                                <input type="hidden" name="aadhar" value="<?php echo $a_aadhar; ?>">
                                                <textarea class="form-control" id="remarks" name="reason" placeholder="Reason for reject"></textarea>
                                            </div>
                                        </div>
                                    </div> 
                                     <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary" name="reject"><span class="glyphicon glyphicon-ok"></span> Save</button>      
                                     </div>
                                </div>
                            </div>
                        </form>
                    </div>        



                <?php
                        }
                        


                        //verify

                     if(isset($_POST['verify'])){
 
                              $var = $_POST['a_aadhar'];

                            $sql = "UPDATE register SET a_verify='1' WHERE a_aadhar='$var'";

                           $result = mysqli_query($conn, $sql);

                       if($result)
                          {
                       ?>
                   <script> alert("Applicant Verified");
                      location.href='http://localhost/pcu/Login/admin/Applicant/newapplicant.php';
                  </script>

                      <?php 
                          }
                       else
                           {
                             echo "not verified";
                           }

                        }

          

                        if(isset($_POST['reject'])){
                            // sql to delete a record

                              $var = $_POST['aadhar'];
                              $reason = $_POST['reason'];
                              $date = date("Y-m-d");
                              $sql = "UPDATE register SET a_verify='n',rej_date='$date' WHERE a_aadhar='$var'";
                              $sql1 = "UPDATE register SET comment='$reason' WHERE a_aadhar='$var'";
                              $result = mysqli_query($conn, $sql);
                              $result1 = mysqli_query($conn, $sql1) or die(mysqli_error($conn));

                         if($result AND $result1 == 1)
                           {   

                              echo "<script>window.alert('Request Rejected');</script>";
                              echo '<script type="text/javascript" >
                              location.href="http://localhost/pcu/Login/admin/Applicant/newapplicant.php" </script>';
       
                             
                                   }
                                     else
                                       {
                                       echo "not deleted";
                                       }
                                     }
                                  }     
                   
?>
            </tbody>
        </table>
    </div>
   
 
</body>

</html>
