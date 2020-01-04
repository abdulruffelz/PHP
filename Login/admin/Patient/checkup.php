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
    <script src="js/jquery-ui.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="dashboard/vendor/font-awesome/css/font-awesome.min.css">
    <script>
        $(document).ready(function() {
                $('#example').DataTable({});

            });

        </script>
    
    <script>
        
        $(document).ready(function(){
            
            $("#medicine").change(function(){

                var medicine = $("#medicine").val();


                $.post("fetch.php",{
                    mid: medicine

                }, function(data,status){

                    $("#qty").html(data);

                });

            });

        

       
         
      $("#add_medicine").click(function(){


            var data = $("#form1").serialize();
            $.ajax({
                data:data,
                method:"post",
                url:"med_add.php",
                success:function(data){
                    alert(data);
                    $("#qty").empty();
                    $("#qty1").val('');

                }

            });
        

        });

     

$('#qty1').bind('keyup', function() {
    if(allFilled()) $('#register').removeAttr('disabled');
});

function allFilled() {
    var filled = true;
    (function() {
        if($("#qty1").val() == '') filled = false;
    });
    return filled;
}
            



        $("#add_medicine").click(function(){
          
          var data = $("#form1").serialize();
            $.ajax({
                data:data,
                method:"post",
                url:"med_fetch.php",
                success:function(data){
                     
                     $("#m_name").html(data['m_name']);


                }
            });

        });


      $("#form1").submit( function(){
        return false;
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
       <div>
            <h3><center><u>TODAY CHECKUP LIST</u></center></h3>
             <a class="btn btn-primary" href="http://localhost/pcu/Login/admin/admin.php#profile" ><span class='glyphicon glyphicon-user' aria-hidden='true'></span>Back to Admin</a>
             <a class="btn btn-success" href="http://localhost/pcu/Login/admin/Patient/checkupdate.php" ><span class='glyphicon glyphicon-eye-open' aria-hidden='true'></span>Next Checkup List</a>   
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

                    $query = "SELECT *  FROM doctor";
                    $result1 = mysqli_query($conn, $query);
                    $sql = "SELECT * FROM medicine";
                    $result2 = mysqli_query($conn , $sql);
                    $date = date("Y-m-d"); 
                    $sql = "SELECT * FROM patients,checkup WHERE patients.p_aadhar=checkup.p_aadhar AND checkup_date='$date' AND checked=1";
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
                            $p_curr_check_stat = $row['p_curr_check_stat'];
                            $p_curr_hlth_cond = $row['p_curr_hlth_cond'];
                            $checkup_date = $row['checkup_date'];

                          

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

                      <a href="#view<?php echo $p_aadhar;?>" data-toggle="modal">
                            <button type='button' class='btn btn-success btn-sm'><span class='glyphicon glyphicon-plus' aria-hidden='true'></span>Add details</button>
                        </a>
                    </td>

                    <!-- edit -->
                     <div id="view<?php echo $p_aadhar; ?>" class="modal fade" role="dialog">
                        <form method="post" class="form-horizontal" role="form">
                            <div class="modal-dialog modal-lg">
                               
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Checkup Details</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                        	<input type="hidden" name="p_aadhar" value="<?php echo $p_aadhar; ?>">
                                            <label class="control-label col-sm-2" for="item_name">Patient Name:</label>
                                            <div class="col-sm-4">
                                                <input type="text" readonly class="form-control" id="p_name" name="p_name" value="<?php echo $item_name; ?>" placeholder="Name" required> <br></div>
                                                 <label class="control-label col-sm-2" for="item_code">Current Health Condition:</label>
                                            <div class="col-sm-4">
                                                <input type="text" minlength="3" pattern="^[A-Za-z]+$" title="Text Only" class="form-control" id="item_code" name="curr_hlth_cond" value="" placeholder="Current Health Condition" required autofocus><br> 
                                            </div>
                                        </div>
                                        <div class="form-group">  
                                            <label class="control-label col-sm-2" for="item_name">Current Checkup Details:</label>
                                            <div class="col-sm-4">
                                                <textarea cols="20" rows="2" minlength="3" pattern="^[A-Za-z]+$" title="Text Only" class="form-control" name="check_details" placeholder="Checkup Details" value="" required></textarea><br>
                                            </div>
                                              <label class="control-label col-sm-2" >Select doctor:</label>
                                              <div class="col-sm-4">
                                               <select class="form-control" name="doctor">
                                                <option>Select Doctor</option>
                                                    <?php while($row = mysqli_fetch_array($result1)){ ?>
                                                      <option value="<?php echo $row[1]; ?>"><?php echo $row[1]; ?></option>
                                                  <?php } ?>
                                                  </select><br>
                                              </div><br>
                                          </div> <br>
                                          <div class="form-group"> 
                                              
                                        </div> 
                                    </div>
                                    <div class="modal-footer">
                                      <a href="#medicine<?php echo $p_aadhar; echo $row[1]; ?>" data-toggle="modal">
                                        <button type='button' class='btn btn-success'><span class='glyphicon glyphicon-plus' aria-hidden='true'></span>Add medicine</button>
                                      </a>&nbsp
                                    	<button type="submit" class="btn btn-primary" name="update_item"><span class="glyphicon glyphicon-ok"></span> Save</button>
                                        <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                     <!-- Medicine -->
                     <div id="medicine<?php echo $p_aadhar; ?>" class="modal fade" role="dialog">
                        <form name="form1" id="form1" method="post" class="form-horizontal" role="form">
                            <div class="modal-dialog modal-lg">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Add Medicine</h4>
                                    </div>
                                    <div class="modal-body">     
                                        <div class="form-group">
                                            <input type="hidden" name="p_aadhar" id="p_aadhar" value="<?php echo $p_aadhar; ?>">
                                            <input type="hidden" name="d_id" value="<?php echo $row[1]; ?>">
                                            <label class="control-label col-sm-2" for="item_name">Patient Name:</label>
                                            <div class="col-sm-4">
                                                <input type="text" readonly class="form-control" id="p_name" name="p_name" value="<?php echo $item_name; ?>" placeholder="Name" required> <br></div>
                                            <label class="control-label col-sm-2" for="item_code">Landmark:</label>
                                            <div class="col-sm-4">
                                                <input type="text" readonly  class="form-control" id="p_landmark" name="p_landmark" value="<?php echo $p_landmark; ?>" placeholder="Landmark" required ><br> </div>
                                        </div>
                                        <div class="form-group">
                                              <label class="control-label col-sm-2" >Select Medicine:</label>
                                              <div class="col-sm-4">
                                               <select class="form-control" name="medicine" id="medicine" required>
                                                    
                                                    <?php while($row = mysqli_fetch_array($result2)){ ?>
                                                      <option value="<?php echo $row[1]; ?>"><?php echo $row[1]; ?></option>
                                                  <?php } ?>
                                                  </select><br>
                                              </div><br>
                                          </div>
                                          <div class="col-sm-2">
                                          <b> Maximum Quantity:<span style="color: red;" id="qty"></span></b>
                                          </div>
                                           <label class="control-label col-sm-2" for="item_name">Quantity:</label>
                                            <div class="col-sm-4">
                                            <input type="text" class="form-control" id="qty1" name="qty1" value="" required 
                                             autocomplete="off" min="1"><br>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary" id="add_medicine" name="add_medicine"><span class="glyphicon glyphicon-ok"></span> Add</button>
                                        <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cancel</button>
                                    </div>
                         
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
          	$date = date("Y-m-d");
            $p_aadhar = $_POST['p_aadhar'];
            $curr_check_details = mysqli_real_escape_string($conn,$_POST['check_details']);
            $curr_hlth_cond = mysqli_real_escape_string($conn, $_POST['curr_hlth_cond']);
            $dr_name = $_POST['doctor'];

           $sql = "INSERT into newcheckup (p_aadhar,curr_hlth_cond,curr_check_details,checked_date,dr_name) VALUES 
              ('$p_aadhar','$curr_hlth_cond','$curr_check_details','$date','$dr_name')";


             $result = mysqli_query($conn, $sql);

            $sql1 = "UPDATE checkup SET checked=0 WHERE p_aadhar='$p_aadhar'";
            
            $result1 = mysqli_query($conn, $sql1);  
           
           
            if($result)
            { ?>

               <script>alert("Added Successfully");
               location.href="http://localhost/pcu/Login/admin/Patient/checkup.php"
           </script>

            <?php   
            }
            else
            {
                echo "Coulnot Update";
            }
        }
  }      
                   
?>
            </tbody>
        </table>
    </div>
   
 
</body>

</html>


   
          
          