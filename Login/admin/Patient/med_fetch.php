<?php
     include 'connect.php';



            $p_id = $_POST['p_aadhar'];
            $date = date("Y-m-d");
            $sql1="SELECT * FROM medicine_stock WHERE m_date='$date' AND p_id='$p_id'";
            $res =  mysqli_query($conn, $sql1);
           while($row = mysqli_fetch_assoc($res))
             {
                echo $row['m_name'];
                echo $row['quantity'];  
             }

             
         
 ?>       