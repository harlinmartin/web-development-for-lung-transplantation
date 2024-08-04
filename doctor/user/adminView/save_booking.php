<header>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>
	
	<script>
		function MySucessFn(){
			swal({
				title: "Dear User...Booking Request sent Sucessfully",
				text: "",
				type: "success",
				
				showConfirmButton: true,
			},
			window.load = function(){
				window.location='http://localhost/nursedb/user/index.php';
			});
		}
	</script>
</header>
<?php
	include_once '../config/dbconnect.php';
	
	$okFlag = TRUE;
	if($okFlag){
		
		$date = $_POST['date'];
		$description = $_POST['description'];
		 $nurse_id = $_POST['Nurse_id'];
		 $client_id = $_POST['client_id'];
		 
		
		$sql = "INSERT INTO `booking`(date, description, client_id, nurse_id, status) VALUES('$date','$description','$client_id','$nurse_id','Pending')";
		//echo $sql;exit;
		$result=mysqli_query($conn, $sql) or die(mysqli_error ($conn));
		echo "<script type= 'text/javascript'>MySucessFn();</script>";
		
	}
	
?>