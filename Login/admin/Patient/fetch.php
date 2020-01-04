 <?php
 include 'connect.php';
 session_start();

        if(isset($_POST['mid'])) {
          $m_id = $_POST['mid'];
            $sql = "SELECT quantity FROM medicine WHERE m_name='$m_id'";
            $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
            $row = mysqli_fetch_assoc($result);
            $output = $row['quantity'];
            echo $output;

          } 
        
  ?>