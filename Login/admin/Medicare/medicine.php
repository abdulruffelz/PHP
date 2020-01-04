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
        <h3><center><u>MEDICINE STOCK DETAILS</u></center></h3>
        <div>
            <a class="btn btn-primary btn-sm " href="http://localhost/pcu/Login/admin/admin.php#settings"><span class='glyphicon glyphicon-user' aria-hidden='true'></span>Back to Admin</a>
            <a href="#add" data-toggle="modal">
                <button type='button' class='btn btn-success btn-sm'><span class='glyphicon glyphicon-plus' aria-hidden='true'></span> Add Medicine</button>
            </a>
        </div>
        <br>
        <table id="example" class="display nowrap" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Sl.No</th>
                    <th>Medicine Name</th>
                    <th>Company</th>
                    <th>Dosage</th>
                    <th>Quantity</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                session_start();
                    $sql = "SELECT * FROM medicine";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        // output data of each row
                        $a = 1;
                        while($row = $result->fetch_assoc()) {
                            $b = $a++;
                            $id = $row['m_id'];
                            $sl = $b;
                            $item_name = $row['m_name'];
                            $item_code = $row['m_cmpy'];
                            $item_category = $row['dosage'];
                            $description = $row['description'];
                            $qty = $row['quantity'];

                            if($qty == 0){
                                $alert = "<div class='alert alert-danger'>
                                <strong>$qty</strong> No Stock
                                </div>";
                            }else if(5 >= $qty){
                                $alert = "<div class='alert alert-warning'>
                                <strong>$qty</strong> Critical Level
                                </div>";
                            }else {
                                $alert = $qty;
                            }

                    ?>
                <tr>
                    <td>
                        <?php echo $sl; ?>
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
                        <?php echo $alert; ?>
                    </td>
                    <td>
                        <a href="#out<?php echo $id;?>" data-toggle="modal" title="Remove Medicine">
                            <button type='button' class='btn btn-default btn-sm'><span class='glyphicon glyphicon-minus' aria-hidden='true'></span></button>
                        </a>
                        <a href="#add<?php echo $id;?>" data-toggle="modal" title="Add Medicine">
                            <button type='button' class='btn btn-success btn-sm'><span class='glyphicon glyphicon-plus' aria-hidden='true'></span></button>
                        </a>
                        <a href="#edit<?php echo $id;?>" data-toggle="modal" title="Edit Medicine">
                            <button type='button' class='btn btn-warning btn-sm'><span class='glyphicon glyphicon-edit' aria-hidden='true'></span></button>
                        </a>
                        <a href="#delete<?php echo $id;?>" data-toggle="modal" title="Delete">
                            <button type='button' class='btn btn-danger btn-sm'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></button>
                        </a>
                    </td>
                    <!--In Stock/s Modal -->
                    <div id="add<?php echo $id; ?>" class="modal fade" role="dialog">
                        <div class="modal-dialog modal-lg">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <form method="post" class="form-horizontal" role="form">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Add Stocks</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="item_name">Item Name:</label>
                                            <div class="col-sm-3">
                                                <input type="hidden" name="add_stocks_id" value="<?php echo $id; ?>">
                                                <input type="text" class="form-control" id="item_name" name="item_name" placeholder="Item Name" required readonly value="<?php echo $item_name; ?>"> </div>
                                            <label class="control-label col-sm-2" for="item_code">Company:</label>
                                            <div class="col-sm-2">
                                                <input type="text" class="form-control" id="item_code" name="item_code" placeholder="Item Code" required readonly value="<?php echo $item_code; ?>" autocomplete="off"> </div>
                                        </div>
                                        <br>
                                        <br>
                                        <div class="form-group">
                                             <label class="control-label col-sm-2" for="item_code">Dosage:</label>
                                            <div class="col-sm-2">
                                                <input type="text" class="form-control" id="item_code" name="item_code" placeholder="Item Code" required readonly value="<?php echo $item_category; ?>" autocomplete="off"> </div>
                                            <label class="control-label col-sm-2" for="item_name">Quantity:</label>
                                            <div class="col-sm-4">
                                                <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Quantity" autocomplete="off" required min="1"> </div>
                                        </div>
                                        <br>
                                        <br>
                                        <br>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary" name="add_inventory"><span class="glyphicon glyphicon-plus"></span> Add</button>
                                        <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--Out Stocks Modal -->
                    <div id="out<?php echo $id; ?>" class="modal fade" role="dialog">
                        <div class="modal-dialog modal-lg">
                            <form method="post" class="form-horizontal" role="form">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Out Stocks</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="item_name">Item Name:</label>
                                            <div class="col-sm-2">
                                                <input type="hidden" name="minus_stocks_id" value="<?php echo $id; ?>">
                                                <input type="text" readonly class="form-control" id="item_name" name="item_name" placeholder="Item Name" required readonly value="<?php echo $item_name; ?>"> <br> </div>
                                            <label class="control-label col-sm-2" for="item_code">Company:</label>
                                            <div class="col-sm-2">
                                                <input type="text" class="form-control" id="item_code" name="item_code" placeholder="Item Code" required readonly value="<?php echo $item_code; ?>"> <br> </div>
                                            <label class="control-label col-sm-2" for="dr_no" data-toggle="tooltip">Doctor Name:</label>
                                            <div class="col-sm-2">
                                                <input type="text" minlength="3" pattern="^[A-Za-z]+$" title="Text Only" class="form-control" id="dr_no" name="dr_no" placeholder="Name" autocomplete="off" required autofocus> <br> </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="item_name">Quantity:</label>
                                            <div class="col-sm-4">
                                                <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Quantity" autocomplete="off" required max="<?php echo $qty; ?>" min="1"> </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary" name="minus_inventory"><span class="glyphicon glyphicon-plus"></span> Out</button>
                                        <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cancel</button>
                                    </div>
                                </div>
                            </form>
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
                                        <h4 class="modal-title">Edit Item</h4>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="edit_item_id" value="<?php echo $id; ?>">
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="item_name">Medicine Name:</label>
                                            <div class="col-sm-4">
                                                <input type="text" readonly class="form-control" id="item_name" name="item_name" value="<?php echo $item_name; ?>" placeholder="Medicine Name" required><br> </div>
                                            <label class="control-label col-sm-2" for="item_code">Company:</label>
                                            <div class="col-sm-4">
                                                <input type="text" minlength="3" pattern="^[A-Za-z]+$" title="Text Only" class="form-control" id="item_code" name="item_code" value="<?php echo $item_code; ?>" placeholder="Company" required autofocus><br> </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="item_category">Dosage:</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" id="item_category" name="item_category" value="<?php echo $item_category; ?>" placeholder="Dosage" required><br> </div>
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
                            $edit_item_id = $_POST['edit_item_id'];
                            $item_name = $_POST['item_name'];
                            $item_code = $_POST['item_code'];
                            $item_category = $_POST['item_category'];
                            $sql = "UPDATE medicine SET 
                                m_name='$item_name',
                                m_cmpy='$item_code',
                                dosage='$item_category'
                                WHERE m_id='$edit_item_id' ";
                            if ($conn->query($sql) === TRUE) {
                                echo '<script>window.location.href="http://localhost/pcu/Login/admin/Medicare/medicine.php"</script>';
                            } else {
                                echo "Error updating record: " . $conn->error;
                            }
                        }

                        if(isset($_POST['delete'])){
                            // sql to delete a record
                            $delete_id = $_POST['delete_id'];
                            $sql = "DELETE FROM medicine WHERE m_id='$delete_id' ";
                            if ($conn->query($sql) === TRUE) {
                                    echo '<script>window.location.href="http://localhost/pcu/Login/admin/Medicare/medicine.php"</script>';
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
                        $description = $_POST['critical_lvl'];
                        $sql = "INSERT INTO medicine (m_name,m_cmpy,dosage,quantity,description)VALUES ('$item_name','$item_code','$item_category',0,'$description')";
                        if ($conn->query($sql) === TRUE) {
                               echo '<script>
                               window.alert("Medicine Added");
                               window.location.href="http://localhost/pcu/Login/admin/Medicare/medicine.php"</script>';
                            } else {
                                echo "Error: " . $sql . "<br>" . $conn->error;
                            }
                         
                    }

                    if(isset($_POST['add_inventory'])){
                        $add_stocks_id = ($_POST['add_stocks_id']);
                        echo $add_stocks_id;
                        $quantity = ($_POST['quantity']);
                            $add_inv = "UPDATE medicine SET quantity=(quantity + '$quantity') WHERE m_id='$add_stocks_id' ";
                            if ($conn->query($add_inv) === TRUE) {
                                echo '<script>window.location.href="http://localhost/pcu/Login/admin/Medicare/medicine.php"</script>';
                            } else {
                                echo "Error updating record: " . $conn->error;
                            }
                         
                    }

                    if(isset($_POST['minus_inventory'])) {
                        $minus_stocks_id = $_POST['minus_stocks_id'];
                        $dr_no = $_POST['dr_no'];
                        $quantity = $_POST['quantity'];
                        $dat = date("Y/m/d");
                        $sql = "UPDATE medicine SET dr_no='$dr_no',m_date='$dat' WHERE m_id='$minus_stocks_id'";
                        if ($conn->query($sql) === TRUE) {
                            $add_inv = "UPDATE medicine SET quantity=(quantity - '$quantity') WHERE m_id='$minus_stocks_id' ";
                            if ($conn->query($add_inv) === TRUE) {
                             echo '<script>window.location.href="http://localhost/pcu/Login/admin/Medicare/medicine.php"</script>';
                            } else {
                                echo "Error updating record: " . $conn->error;
                            }
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
                        <h4 class="modal-title">Add Item</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="item_name">Medicine Name:</label>
                            <div class="col-sm-4">
                                <input type="text" minlength="3" pattern="^[A-Za-z]+$" title="Text Only" class="form-control" id="item_name" name="item_name" placeholder="Name" autocomplete="off" autofocus required> </div>
                            <label class="control-label col-sm-2" for="item_code">Company:</label>
                            <div class="col-sm-4">
                                <input type="text" minlength="3" pattern="^[A-Za-z]+$" title="Text Only" class="form-control" id="item_code" name="item_code" placeholder="Company" autocomplete="off" required> </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="item_category">Dosage:</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="item_category" name="item_category" placeholder="Dosage" autocomplete="off" required> </div>
                            <label class="control-label col-sm-2" for="item_critical_lvl">Description:</label>
                            <div class="col-sm-4">
                                <input type="text" minlength="3" pattern="^[A-Za-z]+$" title="Text Only" class="form-control" id="item_critical_lvl" placeholder="Description" name="critical_lvl" autocomplete="off" required> </div>
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
 
</body>

</html>
