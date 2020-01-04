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
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <!-- Loader -->
    <link rel="stylesheet" href="css/loader.css">
    <script src="js/jquery-1.12.4.js"></script>
    <link rel="stylesheet" href="css/jquery-ui.min">
    <script src="js/jquery-ui.min"></script>

    <link rel="stylesheet" type="text/css" href="dashboard/vendor/font-awesome/css/font-awesome.min.css">
    <script>
        $(document).ready(function() {
                $('#example').DataTable({});
                $( '#datepicker' ).datepicker({ dateFormat:'yy-mm-dd',
                 minDate: +1,
                 changeMonth: true,
                  });
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
            <h3><center><u>EXISTING PATIENTS</u></center></h3>
             <a class="btn btn-primary" href="http://localhost/pcu/Login/admin/admin.php#profile" ><span class='glyphicon glyphicon-user' aria-hidden='true'></span>Back to Admin</a>   
        </div>
        <br>
        <table id="example" class="display nowrap" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Sl.No</th>
                    <th>Patient Name</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Address</th>
                    <th>Mobile</th>
                    <th>Aadhar</th>
                    <th>Actions</th>
                </tr>
            </thead>
           
            <tbody>
                <?php 
                    $sql = "SELECT * FROM patients,checkup WHERE patients.p_aadhar=checkup.p_aadhar AND p_verify='1'";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        // output data of each row
                        $a = 1;
                        while($row = $result->fetch_assoc()) {
                            $b = $a++;
                            $id = $b;
                            $item_name = $row['p_name'];
                            $item_code = $row['p_age'];
                            $item_category = $row['p_gender'];
                            $item_description = $row['p_address'];
                            $p_mob = $row['p_mob'];
                            $p_aadhar = $row['p_aadhar'];
                            $p_landmark = $row['p_landmark'];
                            $p_disease = $row['p_disease'];
                            $p_curr_stat = $row['p_curr_stat'];
                            $p_curr_check_stat = $row['p_curr_check_stat'];
                            $p_curr_hlth_cond = $row['p_curr_hlth_cond'];
                            $checkup_date = $row['checkup_date'];
                            $checked = $row['checked']; 

                          

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
                        <?php echo $p_mob; ?>
                    </td>
                    <td>
                        <?php echo $p_aadhar; ?>
                    </td>    
                    <td> 
                        <a href="#view<?php echo $p_aadhar;?>" data-toggle="modal" title="View Details">
                            <button type='button' class='btn btn-info btn-sm'><span class='glyphicon glyphicon-eye-open' aria-hidden='true'></span></button>
                         </a> 

                        <a href="#edit<?php echo $p_aadhar;?>" data-toggle="modal" title="Edit Details">
                            <button type='button' class='btn btn-warning btn-sm'><span class='glyphicon glyphicon-edit' aria-hidden='true'></span></button>
                        </a>

                        <a href="#delete<?php echo $p_aadhar;?>" data-toggle="modal" title="Delete">
                            <button type='button' class='btn btn-danger btn-sm'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></button>
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
                                        <h4 class="modal-title">Edit Details</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="item_name">Patient Name:</label>
                                            <div class="col-sm-4">
                                                <input readonly type="text"  class="form-control" id="item_name" name="item_name" value="<?php echo $item_name; ?>" placeholder="Name" required> <br> </div>
                                            <label class="control-label col-sm-2" for="item_code">Age:</label>
                                            <div class="col-sm-4">
                                                <input type="text" maxlength="3" pattern="^[0-9]+$" title="Number Only" class="form-control" id="item_code" name="item_code" value="<?php echo $item_code; ?>" placeholder="Age" required><br> </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="item_description">Gender:</label>
                                            <div class="col-sm-4">
                                                <input readonly type="text" class="form-control" id="item_description" name="item_description" value="<?php echo $item_category; ?>" placeholder="Gender" required><br>
                                            </div>
                                            <label class="control-label col-sm-2" for="item_category">Address:</label>
                                            <div class="col-sm-4">
                                                <input type="text" minlength="3" pattern="^[A-Za-z]+$" title="Text Only" class="form-control" id="item_category" name="item_category" value="<?php echo $item_description; ?>" placeholder="Address" required><br> </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="control-label col-sm-2" for="item_description">Aadhar No:</label>
                                            <div class="col-sm-4">
                                                <input type="text" readonly class="form-control" id="item_description" name="p_aadhar" value="<?php echo $p_aadhar; ?>" placeholder="Aadhar" required><br>
                                            </div>
                                             <label class="control-label col-sm-2" for="item_description">Mobile No:</label>
                                            <div class="col-sm-4">
                                                <input type="text" minlength="10" maxlength="10" pattern="^[0-9]+$" title="Number Only" class="form-control" id="item_description" name="p_mob" value="<?php echo $p_mob; ?>" placeholder="Mobile" required><br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary" name="update_item"><span class="glyphicon glyphicon-edit"></span> Update</button>
                                        <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                  
                    <!--Delete Modal -->
                    <div id="delete<?php echo $p_aadhar; ?>" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <form method="post">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Delete</h4>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="p_aadhar" value="<?php echo $p_aadhar; ?>">
                                        <div class="alert alert-danger">Are you Sure you want Delete <strong>
                                                <?php echo $item_name; ?>?</strong> </div>
                                        <div class="modal-footer">
                                            <button type="submit" name="delete" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> YES</button>
                                            <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> NO</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- view -->
                     <div id="view<?php echo $p_aadhar; ?>" class="modal fade" role="dialog">
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
                                            <label class="control-label col-sm-2" for="item_name">Patient Name:</label>
                                            <div class="col-sm-4">
                                                <input type="text" readonly class="form-control" id="item_name" name="p_name" value="<?php echo $item_name; ?>" placeholder="Name" required> <br></div>
                                            <label class="control-label col-sm-2" for="item_code">Landmark:</label>
                                            <div class="col-sm-4">
                                                <input type="text" readonly class="form-control" id="item_code" name="p_landmark" value="<?php echo $p_landmark; ?>" placeholder="Landmark" required><br> </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="item_name">Disease:</label>
                                            <div class="col-sm-4">
                                                <input type="text" readonly class="form-control" id="item_name" name="p_disease" value="<?php echo $p_disease; ?>" placeholder="Disease" required> <br> </div>
                                            <label class="control-label col-sm-2" for="item_code">Current Status:</label>
                                            <div class="col-sm-4">
                                                <input type="text" readonly class="form-control" id="item_code" name="p_curr_stat" value="<?php echo $p_curr_stat; ?>" placeholder="Current Status" required><br> </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="item_name">Current Check Status:</label>
                                            <div class="col-sm-4">
                                                <input type="text" readonly class="form-control" id="item_name" name="p_curr_check_stat" value="<?php echo $p_curr_check_stat; ?>" placeholder="Current Check Status" required><br>
                                            </div>
                                            <label class="control-label col-sm-2" for="item_code">Current Health Condition:</label>
                                            <div class="col-sm-4">
                                                <input type="text" readonly class="form-control" id="item_code" name="p_curr_hlth_cond" value="<?php echo $p_curr_hlth_cond; ?>" placeholder="Current Health Condition" required><br> 
                                            </div>
                                           
                                    </div>
                                    <div class="modal-footer">
                                 <a href="checkupdetails.php?aadhar=<?php echo $p_aadhar; ?>&&name=<?php echo $item_name; ?>">
                                         <button type='button' class='btn btn-primary'><span class='glyphicon glyphicon-eye-open' aria-hidden='true'></span>Checkup Details</button></a>
                                        <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </tr>
                <?php
                        }
                        


                        //Update Items
          if(isset($_POST['update_item'])){
            $p_age = mysqli_real_escape_string($conn, $_POST['item_code']);
            $p_address = mysqli_real_escape_string($conn, $_POST['item_category']);
            $p_mob = mysqli_real_escape_string($conn, $_POST['p_mob']);
            $p_aadhar = mysqli_real_escape_string($conn,$_POST['p_aadhar']);

           $sql = "UPDATE patients SET p_age='$p_age' , p_address = '$p_address' , p_mob = '$p_mob' WHERE p_aadhar='$p_aadhar'";
           
            $result = mysqli_query($conn, $sql);
            if($result)
            { ?>

               <script>alert("Updated Successfully");
               location.href="http://localhost/pcu/Login/admin/Patient/patients.php"
               </script>

            <?php   
            }
            else
            {
                echo "Coulnot Update";
            }
        }

                        if(isset($_POST['delete'])){
                            // sql to delete a record

                              $var = $_POST['p_aadhar'];
                              $sql = "DELETE FROM patients WHERE p_aadhar='$var'";
                              $result = mysqli_query($conn, $sql);

                         if($result)
                           { ?>
       
                            <script>
                              location.href="http://localhost/pcu/Login/admin/Patient/patients.php"
                            </script>

                                 <?php
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
