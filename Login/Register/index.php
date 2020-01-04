<?php

include 'connect.php';
session_start();
$_SESSION['msg'] = "";

  
         if (isset($_POST['Submit'])) {
         	
           
            $a_name = mysqli_real_escape_string($conn, $_POST['a_name']);
            $a_address = mysqli_real_escape_string($conn, $_POST['a_address']);
            $a_wardno = mysqli_real_escape_string($conn, $_POST['a_wardno']);
            $a_mob = mysqli_real_escape_string($conn, $_POST['a_mob']);
            $a_email = mysqli_real_escape_string($conn, $_POST['a_email']);
            $a_aadhar = mysqli_real_escape_string($conn,$_POST['a_aadhar']);
            $password = mysqli_real_escape_string($conn, $_POST['password']);
            $dat = date("Y/m/d");

            
     
                    $sql = "SELECT * FROM register WHERE a_aadhar='$a_aadhar'";
                    $result = mysqli_query($conn, $sql);
                    $resultcheck = mysqli_num_rows($result);

                    if ($resultcheck > 0) { ?>
                    	<script>
                          alert(" Aadhar number already exist");
                         </script> 
                        
              <?php      }
                    else
                     { 

                        $sql = " INSERT INTO register(a_name, a_address, a_wardno,a_mob,a_email,a_aadhar,a_verify,a_date,password,comment) VALUES ('$a_name', '$a_address', '$a_wardno', '$a_mob', '$a_email', '$a_aadhar','0','$dat','$password','nothing');";
                        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn)); 

                   if($result)
                    { ?>
                     <script> alert("Register Successfully"); </script>
                   <?php
                    }
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
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
 <script src="js/jquery-1.12.4.js"></script>
    <script src="js/jquery.js"></script>
<!-- //Custom Theme files -->
<!-- web font -->
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'><!--web font-->
<!-- //web font -->
	
	  <script type="text/javascript">
    function check()
    {
      if (document.getElementById('password').value ==
    document.getElementById('confirm_pass').value) {
    document.getElementById('message').style.color = '#00cc00';
    document.getElementById('message').innerHTML = 'Password matched';
  } else {
    document.getElementById('message').style.color = '#ff3300';
    document.getElementById('message').innerHTML = 'not matching...';
  }
    }
</script>
      	<script type="text/javascript">
       $(document).ready(function(){
            
            $("").keyup(function(){

                var aadhar = $("").val();


                $.post("index.php",{
                    id: aadhar

                }, function(data){

                    $("#aadhar_error").append(data);
                    

                });

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
					<a href="http://localhost/pcu/index.html" class="new">Home</a>&nbsp &nbsp 
					<a href="http://localhost/pcu/Login/index.php" class="new">Login</a>
				</div>
			</div>	
		<div class="header-main">
			<?php if(isset($_SESSION['msg'])) { ?>
			<div style="background-color: red; color:white;">
				<?php echo $_SESSION['msg']; } ?>
			</div>
			<h2><u>REGISTRATION</u></h2>
			<div class="col-md-create">
					<form name="vform" class="box" action="" method="POST" onsubmit="">

				        <label class="for">Applicant Name:</label>
						<input type="text" name="a_name" placeholder="Applicant Name" minlength="3" pattern="^[A-Z a-z]+$" title="Text Only" id="name" autocomplete="off" required>
						<div id="name_error"></div>

						<label class="for">Address:</label>
						<textarea rows="1" cols="30" name="a_address" placeholder="Address" required=""  ></textarea>


						<label>Ward Number:</label>
						<input type="text" name="a_wardno" maxlength="3" pattern="^[0-9]+$" placeholder="Ward Number" id="ward" required="" title="Number Only" autocomplete="off">
						<div id="ward_error"></div>


						<label>Mobile Number:</label>
			           <input type="text" name="a_mob" maxlength="10" minlength="10" pattern="^[0-9]+$" placeholder="Mobile" id="mob" title="Number only" autocomplete="off" required >
						<div id="mob_error"></div>


						<label>E-mail:</label>
						<input type="email" name="a_email" placeholder="E-mail" id="email" required="" autocomplete="off">
						<div id="email_error"></div>


						<label>Aadhar Number:</label>
						<input type="text" name="a_aadhar" maxlength="12" minlength="12" pattern="^[0-9]+$" placeholder="Aadhar Number" title="Number only" id="aadhar" required="" autocomplete="off">
						<div id="aadhar_error"></div>

						<label>Password:</label>
						<input type="password" name="" placeholder="Password" minlength="6" required="" id="password" onkeyup="check();">
						<div id="password_error"></div>

						<label>Confirm Password:</label>
						<input type="password" name="password" placeholder="Confirm" minlength="6" required="" id="confirm_pass" onkeyup="check();">
						<span id="message"></span>
				<input type="submit" name="Submit"  value="submit">
				
			</form>
			</div>
	 </div>			
</div>
</body>
</html>