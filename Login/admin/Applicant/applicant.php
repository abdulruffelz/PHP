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
            <h3><center><u>EXISTING APPLICANTS</u></center></h3>
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
                    $sql = "SELECT * FROM register WHERE a_verify='1'";
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
                            $a_email = $row['a_email'];
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
                        <a href="#view<?php echo $a_aadhar;?>" data-toggle="modal" title="View Details">
                            <button type='button' class='btn btn-info btn-sm'><span class='glyphicon glyphicon-eye-open' aria-hidden='true'></span></button>
                        <a href="#edit<?php echo $a_aadhar;?>" data-toggle="modal" title="Edit Details">
                            <button type='button' class='btn btn-warning btn-sm'><span class='glyphicon glyphicon-edit' aria-hidden='true'></span></button>
                        </a>
                        <a href="#delete<?php echo $a_aadhar;?>" data-toggle="modal" title="Delete">
                            <button type='button' class='btn btn-danger btn-sm'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></button>
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
                                        <h4 class="modal-title">Edit Details</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="item_name">Applicant Name:</label>
                                            <div class="col-sm-4">
                                                <input type="text" readonly class="form-control" id="item_name" name="item_name" value="<?php echo $item_name; ?>" placeholder="Name" required ><br> </div>
                                            <label class="control-label col-sm-2" for="item_code">Address</label>
                                            <div class="col-sm-4">
                                                <input type="text" pattern="^[A-Za-z]+$" title="Text Only" class="form-control" id="item_code" name="item_code" value="<?php echo $item_code; ?>" placeholder="Address" required autofocus><br> </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="item_description">Mobile No</label>
                                            <div class="col-sm-4">
                                                <input type="text" maxlength="10" minlength="10" title="Number only" pattern="^[0-9]+$" class="form-control" id="item_description" name="item_description" value="<?php echo $item_description; ?>" placeholder="Mobile" required><br>
                                            </div>
                                            <label class="control-label col-sm-2" for="item_category">Ward No</label>
                                            <div class="col-sm-4">
                                                <input type="text" maxlength="3" title="Number only" pattern="^[0-9]+$" class="form-control" id="item_category" name="item_category" value="<?php echo $item_category; ?>" placeholder="Ward" required><br> </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="control-label col-sm-2" for="item_description">Aadhar No</label>
                                            <div class="col-sm-4">
                                                <input type="text" readonly class="form-control" id="item_description" name="a_aadhar" value="<?php echo $a_aadhar; ?>" placeholder="Aadhar" required><br>
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
                    <div id="delete<?php echo $a_aadhar; ?>" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <form method="post">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Delete</h4>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="a_aadhar" value="<?php echo $a_aadhar; ?>">
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
                </tr>
                <!--view-->
                 <div id="view<?php echo $a_aadhar; ?>" class="modal fade" role="dialog">
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
                                                <input type="text" readonly class="form-control" id="item_name" name="item_name" value="<?php echo $item_name; ?>" placeholder="Name" required><br> </div>
                                            <label class="control-label col-sm-2" for="item_code">Address:</label>
                                            <div class="col-sm-4">
                                                <input type="text" readonly class="form-control" id="item_code" name="item_code" value="<?php echo $item_code; ?>" placeholder="Address" required><br> </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="item_description">Mobile No:</label>
                                            <div class="col-sm-4">
                                                <input type="text" readonly class="form-control" id="item_description" name="item_description" value="<?php echo $item_description; ?>" placeholder="Mobile" required><br>
                                            </div>
                                            <label class="control-label col-sm-2" for="item_category">Ward No:</label>
                                            <div class="col-sm-4">
                                                <input type="text" readonly class="form-control" id="item_category" name="item_category" value="<?php echo $item_category; ?>" placeholder="Ward" required><br> </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="control-label col-sm-2" for="item_description">Aadhar No:</label>
                                            <div class="col-sm-4">
                                                <input type="text" readonly class="form-control" id="item_description" name="a_aadhar" value="<?php echo $a_aadhar; ?>" placeholder="Aadhar" required><br>
                                            </div>
                                            <label class="control-label col-sm-2" for="item_category">Email:</label>
                                            <div class="col-sm-4">
                                                <input type="text" readonly class="form-control" id="item_category" name="item_category" value="<?php echo $a_email; ?>" placeholder="Ward" required><br> </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="control-label col-sm-2" for="item_description">Applicant Added Date:</label>
                                            <div class="col-sm-4">
                                                <input type="text" readonly class="form-control" id="item_description" name="a_aadhar" value="<?php echo $a_date; ?>" placeholder="Aadhar" required><br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                       
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                <?php
                        }
                        


                        //Update Items
          if(isset($_POST['update_item'])){
            $a_name = mysqli_real_escape_string($conn, $_POST['item_name']);
            $a_address = mysqli_real_escape_string($conn, $_POST['item_code']);
            $a_wardno = mysqli_real_escape_string($conn, $_POST['item_category']);
            $a_mob = mysqli_real_escape_string($conn, $_POST['item_description']);
            $a_aadhar = mysqli_real_escape_string($conn,$_POST['a_aadhar']);

           $sql = "UPDATE register SET a_name='$a_name' , a_address='$a_address' , a_wardno='$a_wardno', a_mob='$a_mob' WHERE a_aadhar='$a_aadhar'";
           
            $result = mysqli_query($conn, $sql);
            if($result)
            { ?>

               <script>alert("Updated Successfully");
               location.href="http://localhost/pcu/Login/admin/Applicant/applicant.php"
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

                              $var = $_POST['a_aadhar'];
                              $sql = "DELETE FROM register WHERE a_aadhar='$var'";
                              $result = mysqli_query($conn, $sql);

                         if($result)
                           { ?>
       
                            <script>
                              location.href="http://localhost/pcu/Login/admin/Applicant/applicant.php"
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
