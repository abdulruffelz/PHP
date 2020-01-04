
<?php
   if(isset($_POST['id'])){

            	$a_aadhar = $_POST['id'];
            	  $sql = "SELECT * FROM register WHERE a_aadhar='$a_aadhar'";
                    $result = mysqli_query($conn, $sql);
                    $resultcheck = mysqli_num_rows($result);

                    if ($resultcheck > 0) 
                        echo  "username or aadhar number already exist";
                        
                    
            }


            ?>