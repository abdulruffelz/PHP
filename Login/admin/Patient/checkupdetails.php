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
                 changeYear: true,
                  });
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
          <?php 
             $p_name = $_GET['name'];
             $p_aadhar = $_GET['aadhar'];
             $sql = "SELECT checkup_date FROM checkup WHERE p_aadhar='$p_aadhar'";
             $result=mysqli_query($conn,$sql);
             $row = mysqli_fetch_array($result);

        ?>
       <div>
            <h3><center><u>CHECKUP DETAILS</u></center></h3>
             <a class="btn btn-primary btn-sm" href="http://localhost/pcu/Login/admin/Patient/patients.php" ><span class='glyphicon glyphicon-user' aria-hidden='true'></span>Back to Patients</a> 
             <a href="#update<?php echo $p_aadhar;?>" data-toggle="modal">
           <button type='button' class='btn btn-success btn-sm'><span class='glyphicon glyphicon-plus' aria-hidden='true'></span>Add Date</button></a>  
        </div>
        <br>   
       <div>
           <h4>Name : <?php echo $p_name; ?></h4>
           <h4>Checkup Date: <?php echo $row[0]; ?></h4>   
      </div>


            <!--checkup update -->
                     <div id="update<?php echo $p_aadhar; ?>" class="modal fade" role="dialog">
                        <form method="post" class="form-horizontal" role="form">
                            <div class="modal-dialog modal-lg">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Next Checkup Date</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                           
                                             <label class="control-label col-sm-2" for="item_name">Next Checkup Date:</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" id="datepicker" name="checkup_date" value="" placeholder="New Date" required><br> </div>
                                        </div>
                                     </div>   
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary" name="checkup_update"><span class="glyphicon glyphicon-plus"></span> Add Date</button>
                                        <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
       
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
                       <?php 
                               $sql1="SELECT * FROM medicine JOIN medicine_stock ON medicine.m_name=medicine_stock.m_name WHERE medicine_stock.m_date='$item_name' AND p_id='$p_aadhar'";
                                $result2 = mysqli_query($conn, $sql1)or die(mysqli_error($conn));
                                       while($row = mysqli_fetch_assoc($result2))
                                                { 

                                                  echo $row['m_name']; 
                                                  echo "<br>";
                              
                                                  }
                                                 ?>
                    </td>

                  </tr>

                <?php } ?>


                     
                   

                   
                 
                
                <?php
        
        }  
              // update checkup update
             if(isset($_POST['checkup_update'])){

            $checkup_date = mysqli_real_escape_string($conn,$_POST['checkup_date']);

           $sql = "UPDATE checkup SET checkup_date = '$checkup_date', checked = 1 WHERE p_aadhar='$p_aadhar'";
           
            $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
            if($result)
            { ?>

               <script>alert("Updated Successfully");
               location.href=""
           </script>

            <?php   
            }
            else
            { ?>
                 <script>alert("Not Added");
               location.href="http://localhost/pcu/Login/admin/Patient/patients.php"
           </script>
                
          <?php  }
        }
         
                   
?>

            </tbody>
        </table>
   </div>
 
</body>

</html>
