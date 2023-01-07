<?php
         $dbhost = 'localhost';
         $dbuser = 'root';
         $dbpass = '';
         $dbname = 'ajax_test';
         $conn = new mysqli($dbhost, $dbuser, $dbpass,$dbname);
   
  
              if ($conn->connect_error) {
               die("Connection failed: " . $conn->connect_error);
            } 
 
   $action=$_POST["action"];

  if($action=="addcomment"){
    $name=$_POST["name"];
    $payment=$_POST["payment"];
    $m_id=$_POST["m_id"];
    $p_status=$_POST["p_status"];
 
     $query="INSERT INTO `test_payment`(`id`, `name`, `payment`, `merchant_id`, `payment_status`) VALUES(NULL,'$name','$payment','$m_id','$p_status')";
	  $result = mysqli_query($conn,$query);
 
     if($result){
        echo "Your payment has been sent";
     }
     else{
        echo "Error in payment";
     }
  }
?>
  