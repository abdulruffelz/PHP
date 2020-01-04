<?php

include 'connect.php';
session_start();
$_SESSION['msg'] = "";

if (isset($_POST['submit'])) {
         	
            $a_aadhar = $_GET['a_aadhar'];
            $sql = "SELECT a_name FROM register WHERE a_aadhar='$a_aadhar'";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_assoc($result);
            $a_name = $row['a_name'];
            $p_name = mysqli_real_escape_string($conn, $_POST['p_name']);
            $p_age = mysqli_real_escape_string($conn, $_POST['p_age']);
            $p_dob = mysqli_real_escape_string($conn, $_POST['p_dob']);
            $p_gender = mysqli_real_escape_string($conn, $_POST['p_gender']);
            $p_address = mysqli_real_escape_string($conn, $_POST['p_address']);
            $p_mob = mysqli_real_escape_string($conn,$_POST['p_mob']);
            $p_aadhar = mysqli_real_escape_string($conn,$_POST['p_aadhar']);
            $p_landmark = mysqli_real_escape_string($conn,$_POST['p_landmark']);
            $p_disease = mysqli_real_escape_string($conn,$_POST['p_disease']);
            $p_curr_stat = mysqli_real_escape_string($conn,$_POST['p_curr_stat']);
            $p_curr_check_stat = mysqli_real_escape_string($conn,$_POST['p_curr_check_stat']);
            $p_curr_hlth_cond = mysqli_real_escape_string($conn,$_POST['p_curr_hlth_cond']);
            $dat = date("Y/m/d");
           
     
                    $sql = "SELECT * FROM patients WHERE p_aadhar='$p_aadhar'";
                    $result = mysqli_query($conn, $sql);
                    $resultcheck = mysqli_num_rows($result);

                    if ($resultcheck > 0) {

                        $_SESSION['msg'] = "Patient Name or Aadhar number already exist";
                        
                    }
                    else
                     { 

                        $sql = " INSERT INTO patients(p_name, p_age, p_dob, p_gender, p_address, p_mob, p_aadhar, p_verify,a_aadhar,a_name,p_date,comment) VALUES ('$p_name', '$p_age', '$p_dob', '$p_gender', '$p_address', '$p_mob', '$p_aadhar','0','$a_aadhar','$a_name', '$dat','Nothing');";

                        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn)); 


                        $sql1 = "INSERT INTO checkup(p_aadhar, p_landmark, p_disease, p_curr_stat, p_curr_check_stat, p_curr_hlth_cond,checked) VALUES ('$p_aadhar', '$p_landmark', '$p_disease','$p_curr_stat','$p_curr_check_stat', '$p_curr_hlth_cond',0)";

                        $result1 = mysqli_query($conn, $sql1) or die(mysqli_error($conn));

             

                   if($result AND $result1)
                    { ?>
                     <script> alert("Register Successfully"); </script>

                  <?php  }
                   else
                   {
                    $_SESSION['msg'] = "Register unsuccessfull";
                   }


                    }

                
            }
 ?>
            
           
<!DOCTYPE html>
<html>
<head>
<title>Register-Palliative care unit</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="css1/style.css" rel="stylesheet" type="text/css" media="all" />

<link href="css/jquery-ui.css" rel="stylesheet" type="text/css" media="all" />

<script src="js/jquery.js"></script>

<script src="js/jquery-ui.min.js"></script>

<!-- //Custom Theme files -->
<!-- web font -->
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'><!--web font-->
<!-- //web font -->
    
      <script type="text/javascript">
          $(document).ready(function() {
            var age = "";
            $('#dob').datepicker({
                onSelect: function (value,ui) {
                    var today = new Date();
                    age = today.getFullYear() - ui.selectedYear;
                    $('#age').val(age);
                },
                changeMonth: true,
                changeYear: true,
                dateFormat:'dd-mm-yy',
                maxDate:-1,
                yearRange: "1900:+nn"

            });
          });
 
  </script>
    
</head>
<body>
    <!-- main -->
    <div class="agileits-main"> 
    <div class="w3top-nav"> 
                <div class="w3top-nav-left">    
                    <h1>Palliative Care Unit</h1>
                </div>  
                <div class="w3top-nav-right" >
                    <a href="http://localhost/pcu/Login/applicant/index.php" class="new">Back to User</a>
                </div>
                <div class="clear"></div>
            </div>  
        <div class="header-main">
            <h2><u>PATIENT REGISTRATION</u></h2>
            <?php

            $c = $_SESSION['a_id'];

            ?>
            <?php if(isset($_SESSION['msg'])) { ?>
            <div style="background-color: red; color:white;">
                <?php echo $_SESSION['msg']; } ?>
            </div>
            <div class="col-md-create">
                    <form class="box" action="register.php?a_aadhar=<?php echo $c; ?>" method="POST">
                        <label>Patient Name:</label>
                        <input type="text" name="p_name" placeholder="Patient Name" minlength="3" pattern="^[A-Za-z]+$" title="Text Only" id="name" autocomplete="off" required >
                        <label>Date of Birth:</label>
                        <input type="text" id="dob" name="p_dob" placeholder="Date of Birth" required>
                        <label>Age:</label>
                        <input readonly id="age" type="text" name="p_age" placeholder="Age" required="">
                        <label>Gender:</label>
                        <input type="radio" checked="checked" name="p_gender" value="male" class="radio" required>Male
                        <input type="radio" name="p_gender" value="female" class="radio" required>Female<br><br>
                        <label>Address:</label>
                        <textarea rows="1" cols="30" name="p_address" placeholder="Address" required></textarea>
                        <label>Mobile Number:</label>
                        <input type="text" name="p_mob" placeholder="Mobile"  maxlength="10" minlength="10" pattern="^[0-9]+$" id="mob" title="Number only" autocomplete="off" required="">
                        <label>Aadhar Number:</label>
                        <input type="text" name="p_aadhar" placeholder="Aadhar" maxlength="12" minlength="12" pattern="^[0-9]+$" title="Number only" id="aadhar" autocomplete="off" required="">
                        <label>Landmark:</label>
                        <input type="text" name="p_landmark" minlength="3" pattern="^[A-Za-z]+$" title="Text Only" placeholder="Landmark" autocomplete="off" required="">
                        <label>Disease:</label>
                        <input type="text" name="p_disease" minlength="3" pattern="^[A-Za-z]+$" title="Text Only" placeholder="Disease" autocomplete="off" required="">
                        <label>Current Status:</label>
                        <input type="text" name="p_curr_stat" minlength="3" pattern="^[A-Za-z]+$" title="Text Only" placeholder="Current Status" autocomplete="off" required="">
                        <label>Current Checkup Status:</label>
                        <input type="text" name="p_curr_check_stat" minlength="3" pattern="^[A-Za-z]+$" title="Text Only" placeholder="Current Checkup Status" autocomplete="off" required="">
                        <label>Current Health Condition:</label>
                        <input type="text" name="p_curr_hlth_cond" minlength="3" pattern="^[A-Za-z]+$" title="Text Only" placeholder="Current Health Condition" autocomplete="off" required="">
                <input type="submit" name="submit"  value="submit">
                
            </form>
            </div>
                    </div>
                </div>
            </div>
</body>
</html>