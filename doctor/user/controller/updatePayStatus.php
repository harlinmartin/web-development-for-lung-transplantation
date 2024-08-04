<?php

    include_once "../config/dbconnect.php";
    $order_id=$_POST['record'];
    //echo $order_id;
    $sql = "UPDATE booking SET status='Paid' where booking_id=$order_id"; 
    $conn->query($sql);
 ?>