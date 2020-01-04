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
                 minDate: +1 });
            });

        </script>
        
    <link rel="stylesheet" href="css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="css/responsive.bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
</head>

<body style="margin:0;">
    <div class="container">
       <div>
            <h3><center><u>CHECKUP DETAILS</u></center></h3>
             <a class="btn btn-primary" href="http://localhost/pcu/Login/applicant/patients.php" ><span class='glyphicon glyphicon-user' aria-hidden='true'></span>Back to Patients</a>   
        </div>
        <br>
        <?php 
             $p_name = $_GET['name'];
             $p_date = $_GET['checkup'];
             $p_aadhar = $_GET['p_aadhar'];
        ?>
       <h4>Name : <?php echo $p_name; ?></h4>
     <span style="color: red;"><h4>Checkup Date: <?php echo $p_date; ?><a href="#reject<?php echo $p_aadhar;?>" data-toggle="modal"><button type="submit" class="btn btn-success btn-sm" name="verify">Change Date Request</button></a>
         </h4></span>   
        <br>
        <table id="example" class="display nowrap" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Sl.No</th>
                    <th>Checked Date</th>
                    <th>Current Health Condition</th>
                    <th>Current Checkup Details</th>
                    <th>Doctor Consulted</th>
                    <th>Medicines</th>
                </tr>
            </thead>
           
            <tbody>
                <?php 
                    $p_aadhar = $_GET['aadhar'];
                    $sql = "SELECT * FROM newcheckup WHERE p_aadhar='$p_aadhar' ORDER BY checked_date DESC";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        // output data of each row
                        $a = 1;
                        while($row = $result->fetch_assoc()) {
                            $b = $a++;
                            $id = $b;
                            $item_name = $row['checked_date'];
                            $item_category = $row['curr_hlth_cond'];
                            $item_description = $row['curr_check_details']; 
                            $dr_name = $row['dr_name'];

                          

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
                    <td>
                        <?php echo $item_description; ?>
                    </td>
                    <td>
                        <?php echo $dr_name; ?>
                    </td> 
                    <td>
                      <?php $sql1="SELECT * FROM medicine JOIN medicine_stock ON medicine.m_name=medicine_stock.m_name WHERE medicine_stock.m_date='$item_name' AND p_id='$p_aadhar'";
                            $result1 = mysqli_query($conn, $sql1) or die(mysqli_error($conn));
                            while($row = mysqli_fetch_assoc($result1))
                            {

                              echo $row['m_name']; 
                              echo "<br>";
                            


                            }

                            ?>
                    </td>
                    <!--Reason -->
                    <div id="reject<?php echo $p_aadhar; ?>" class="modal fade" role="dialog">
                        <form method="post" class="form-horizontal" role="form">
                            <div class="modal-dialog modal-lg">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Change Date Request</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="item_name">Reason:</label>
                                            <div class="col-sm-8">
                                                <input type="hidden" name="aadhar" value="<?php echo $p_aadhar; ?>">
                                                <textarea class="form-control" id="remarks" name="reason" placeholder="Reason for Date Change"></textarea>
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
                   

                   
                  
                </tr>
                </div><?php
        } 
               if(isset($_POST['reject'])){
                    
                    $reason = $_POST['reason'];
                    $date = date("Y-m-d");
                    $p_aadhar = $_POST['aadhar'];
                    $sql = "UPDATE checkup SET status='$reason' , c_date='$date' WHERE p_aadhar='$p_aadhar'";
                    $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
                    if($result){
                           echo "<script>window.alert('Request Added');</script>";
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
   
 
</body>

</html>
