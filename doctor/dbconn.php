<?php
// session_start();
// Database configuration
define('dbHost','localhost');
define('dbUsername','root');
define('dbPassword' ,'');
define('dbName', 'donordb');
$conn = mysqli_connect(dbHost,dbUsername,dbPassword,dbName);
class MyDatabase
{
    public $con;
    function __construct()
    {
        $this->con = mysqli_connect(dbHost, dbUsername, dbPassword, dbName);
        if (mysqli_connect_errno())
        {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
    }
    // public function insertsignup($fname,$lname,$email,$pwd,$cno,$address,$city,$zipcode,$img)
    // {
    //     $ret=mysqli_query($this->con,"insert into client(first_name,last_name,contactno,full_address,city,zip_code,image) values('$fname','$lname','$cno','$address','$city','$zipcode','$img')");
    //     $cid = mysqli_insert_id($this->con);
    //     $role="client";
    //     $set=mysqli_query($this->con,"insert into user(email,password,role,client_id) values('$email','$pwd','$role','$cid')");
    // }
    function logincheck($email, $pwd) {
        $sql = "SELECT * FROM doctor WHERE email = '$email' AND password = '$pwd'";
        $result = mysqli_query($this->con,$sql);
        return $result;
    }
//     public function nursesignup($fname,$lname,$email,$pwd,$cno,$uco,$passingyear,$address,$city,$zipcode,$exp,$specialize,$img)
//     {
//         $ret=mysqli_query($this->con,"insert into nurse(first_name,last_name,contact_number,university_college,passing_year,full_address,city,zip_code,experience,specialization,image) values('$fname','$lname','$cno','$uco','$passingyear','$address','$city','$zipcode','$exp','$specialize','$img')");
//         // mysqli_query($this->con,$ret);
   
//         $nid = mysqli_insert_id($this->con);
//         $role="nurse";
//         $set=mysqli_query($this->con,"insert into user(email,password,role,nurse_id) values('$email','$pwd','$role','$nid')");
   
//  }
}




















































    
?>