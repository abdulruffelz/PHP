<?php
include 'connect.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>MEDICARE</title>
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
        <h3><center><u>DOCTOR DETAILS</u></center></h3>
        <div>
            <a class="btn btn-primary btn-sm " href="http://localhost/pcu/Login/admin/admin.php#messages"><span class='glyphicon glyphicon-user' aria-hidden='true'></span>Back to Admin</a>
           
            <a href="#add" data-toggle="modal">
                <button type='button' class='btn btn-success btn-sm'><span class='glyphicon glyphicon-plus' aria-hidden='true'></span> Add Doctor</button>
            </a>     
        </div>
        <br>
        <table id="example" class="display nowrap" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>DR No.</th>
                    <th>Doctor Name</th>
                     <th>Address</th>
                    <th>Moblie No.</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                session_start();
                    $sql = "SELECT * FROM doctor";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        // output data of each row
                        $a= 1;
                        while($row = $result->fetch_assoc()) {
                            $b= $a++;
                            $i = $b;
                            $id = $row['d_id'];
                            $item_name = $row['d_name'];
                            $item_code = $row['address'];
                            $item_category = $row['d_mob'];
                            $critical_lvl = $row['d_qualification'];
                            $spl = $row['d_specialization'];


                    ?>
                <tr>
                    <td>
                        <?php echo $i; ?>
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
                       
                        <a href="#add<?php echo $id;?>" data-toggle="modal" title="View Details">
                            <button type='button' class='btn btn-success btn-sm'><span class='glyphicon glyphicon-eye-open' aria-hidden='true'></span></button>
                        </a>
                        <a href="#edit<?php echo $id;?>" data-toggle="modal" title="Edit Details">
                            <button type='button' class='btn btn-warning btn-sm'><span class='glyphicon glyphicon-edit' aria-hidden='true'></span></button>
                        </a>
                        <a href="#delete<?php echo $id;?>" data-toggle="modal" title="Delete">
                            <button type='button' class='btn btn-danger btn-sm'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></button>
                        </a>
                    </td>
                    <!--In View Modal -->
                    <div id="add<?php echo $id; ?>" class="modal fade" role="dialog">
                        <div class="modal-dialog modal-lg">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <form method="post" class="form-horizontal" role="form">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Doctor Details</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="item_name">Doctor Name:</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" id="item_name" name="item_name" placeholder="Item Name" required readonly value="<?php echo $item_name; ?>"><br> </div>
                                            <label class="control-label col-sm-2" for="item_code">Address:</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" id="item_code" name="item_code" placeholder="Item Code" required readonly value="<?php echo $item_code; ?>" autocomplete="off">
                                                <br> </div>
                                        </div>
                                        <div class="form-group">
                                             <label class="control-label col-sm-2" for="item_code">Mobile:</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" id="item_code" name="item_code" placeholder="Item Code" required readonly value="<?php echo $item_category; ?>" autocomplete="off"> <br></div>
                                            <label class="control-label col-sm-2" for="item_name">Qualification:</label>
                                            <div class="col-sm-4">
                                                <input type="text" readonly class="form-control" id="quantity" name="critical_lvl" placeholder="" value="<?php echo $critical_lvl ?>" autocomplete="off" required> <br> </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="item_name">Specialization:</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" id="item_name" name="item_name" placeholder="Item Name" required readonly value="<?php echo $spl; ?>"> <br> </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span>Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                    <!--Edit Item Modal -->
                    <div id="edit<?php echo $id; ?>" class="modal fade" role="dialog">
                        <form method="post" class="form-horizontal" role="form">
                            <div class="modal-dialog modal-lg">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Edit Details</h4>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="edit_ited_id" value="<?php echo $id; ?>">
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="item_name">Doctor Name:</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" id="item_name" name="item_name" value="<?php echo $item_name; ?>" placeholder="Name" required readonly><br> </div>
                                            <label class="control-label col-sm-2" for="item_code">Address:</label>
                                            <div class="col-sm-4">
                                                <input type="text" minlength="3" pattern="^[A-Za-z]+$" title="Text Only" class="form-control" id="item_code" name="item_code" value="<?php echo $item_code; ?>" placeholder="Address" required autofocus><br> </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="item_category">Mobile:</label>
                                            <div class="col-sm-4">
                                                <input type="text" title="Number Only" maxlength="10" minlength="10" pattern="^[0-9]+$" class="form-control" id="item_category" name="item_category" value="<?php echo $item_category; ?>" placeholder="Mobile" required><br> </div>
                                            <label class="control-label col-sm-2" for="item_category">Qualification:</label>
                                            <div class="col-sm-4">
                                                <input type="text" minlength="3" pattern="^[A-Za-z]+$" title="Text Only" class="form-control" id="item_category" name="critical_lvl" value="<?php echo $critical_lvl; ?>" placeholder="Qualification" required><br> </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="item_name">Specialization:</label>
                                            <div class="col-sm-4">
                                                <input type="text" minlength="3" pattern="^[A-Za-z]+$" title="Text Only" class="form-control" id="item_name" name="spl" value="<?php echo $spl; ?>" placeholder="Specialization" required ><br> </div>
                                    </div>
                                </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary" name="update_item"><span class="glyphicon glyphicon-edit"></span> Edit</button>
                                        <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!--Delete Modal -->
                    <div id="delete<?php echo $id; ?>" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <form method="post">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Delete</h4>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="delete_id" value="<?php echo $id; ?>">
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
                <?php
                        }
                        


                        //Update Items
                        if(isset($_POST['update_item'])){
                            $edit_ited_id = $_POST['edit_ited_id'];
                            $item_name = $_POST['item_name'];
                            $item_code = $_POST['item_code'];
                            $item_category = $_POST['item_category'];
                            $d_qualification = $_POST['critical_lvl'];
                            $spl = $_POST['spl'];
                            $sql = "UPDATE doctor SET 
                                d_name='$item_name',
                                address='$item_code',
                                d_mob='$item_category',
                                d_qualification='$d_qualification',
                                d_specialization='$spl'
                                WHERE d_id='$edit_ited_id' ";
                            if ($conn->query($sql) === TRUE) {
                                echo '<script>window.location.href="http://localhost/pcu/Login/admin/Doctor/doctors.php"</script>';
                            } else {
                                echo "Error updating record: " . $conn->error;
                            }
                        }

                        if(isset($_POST['delete'])){
                            // sql to delete a record
                            $delete_id = $_POST['delete_id'];
                            $sql = "DELETE FROM doctor WHERE d_id='$delete_id' ";
                            if ($conn->query($sql) === TRUE) {
                                    echo '<script>window.location.href="http://localhost/pcu/Login/admin/Doctor/doctors.php"</script>';
                                } 
                             else {
                                echo "Error deleting record: " . $conn->error;
                            }
                        }
                    }
                    

                    //Add Item        
                    if(isset($_POST['add_item'])){
                        $item_name = $_POST['item_name'];
                        $item_code = $_POST['item_code'];
                        $item_category = $_POST['item_category'];
                        $critical_lvl = $_POST['critical_lvl'];
                        $spl = $_POST['d_specialization'];
                        $sql = "INSERT INTO doctor (d_name,address,d_mob,d_qualification,d_specialization)VALUES ('$item_name','$item_code','$item_category','$critical_lvl','$spl')";
                        if ($conn->query($sql) === TRUE) {
                               echo '<script>
                               window.alert("Doctor Added");
                               window.location.href="http://localhost/pcu/Login/admin/Doctor/doctors.php"</script>';
                            } else {
                                echo "Error: " . $sql . "<br>" . $conn->error;
                            }
                         
                    }


?>
            </tbody>
        </table>
    </div>
    <!--Add Item Modal -->
    <div id="add" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <form method="post" class="form-horizontal" role="form">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Add Doctor</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="item_name">Doctor Name:</label>
                            <div class="col-sm-4">
                                <input type="text" minlength="3" pattern="^[A-Za-z]+$" title="Text Only" class="form-control" id="item_name" name="item_name" placeholder="Name" autocomplete="off" autofocus required> </div>
                            <label class="control-label col-sm-2" for="item_code">Address:</label>
                            <div class="col-sm-4">
                                <input type="text" minlength="3" pattern="^[A-Za-z]+$" title="Text Only" class="form-control" id="item_code" name="item_code" placeholder="Address" autocomplete="off" required> </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="item_category">Mobile:</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" maxlength="10" id="item_category" name="item_category" placeholder="Mobile" autocomplete="off" required> </div>
                            <label class="control-label col-sm-2" for="item_critical_lvl">Qualification:</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" minlength="3" pattern="^[A-Za-z]+$" title="Text Only" id="item_critical_lvl" name="critical_lvl" placeholder="Qualification" autocomplete="off" required> </div>
                        </div>
                         <div class="form-group">
                            <label class="control-label col-sm-2" for="item_name">Specialization:</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" minlength="3" pattern="^[A-Za-z]+$" title="Text Only" id="item_name" name="d_specialization" placeholder="Specialization" autocomplete="off" autofocus required> </div>
                    </div>
                </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="add_item"><span class="glyphicon glyphicon-plus"></span> Add</button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cancel</button>
                    </div>
                </form>
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
                        <a href="http://localhost/pcu/Login/admin/admin.html">
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
