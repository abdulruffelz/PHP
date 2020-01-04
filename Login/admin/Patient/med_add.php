 <?php

 include 'connect.php';

            $m_id = $_POST['medicine'];
            $p_name = $_POST['p_name'];
            $p_id = $_POST['p_aadhar'];
            $qty = $_POST['qty1'];
            $date = date("Y-m-d");

            $sql = "INSERT into medicine_stock (m_name,p_name,p_id,quantity,m_date) values ('$m_id','$p_name','$p_id','$qty','$date')";

            $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));

            $add_inv = "UPDATE medicine SET quantity=(quantity - '$qty') WHERE m_name='$m_id'";

            $result1 = mysqli_query($conn,$add_inv) or die(mysqli_error($conn));


            if($result AND $result1)
            { 

                echo "Medicine Added";
            }
            else
            {
                echo "Not inserted";
            }
      
         ?>

