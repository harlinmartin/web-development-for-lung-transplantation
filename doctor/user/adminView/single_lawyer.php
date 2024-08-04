<?php
session_start();

include_once '../config/dbconnect.php';

if (isset($_GET['email'])) {
    $mail = $_GET['email'];
    $result = mysqli_query($conn, "SELECT * FROM USER INNER JOIN nurse ON user.nurse_id=nurse.Nurse_id WHERE email='$mail'");

    if ($row = mysqli_fetch_assoc($result)) {
        $nurse_id = $row['Nurse_id'];
?>
<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<!-- Bootstrap CSS -->
		<!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous"> -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
		<link rel="stylesheet" href="css/all.css">
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/media.css">
		<title></title>
		<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
        margin: 0;
        padding: 0;
    }

    .container {
        margin-top: 20px;
    }

    .sideprofile {
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }

    .profile_img {
        max-width: 100%;
        height: auto;
        border-radius: 50%;
    }

    .profile-info {
        margin-top: 20px;
    }

    .infogroup {
        margin-bottom: 10px;
    }

    label {
        font-weight: bold;
    }

    .mainprofile {
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }

    .mainprofile textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 3px;
    }

    .submit-button {
        margin-top: 10px;
        background-color: #333;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 3px;
        cursor: pointer;
    }

    .submit-button:hover {
        background-color: #555;
    }

    footer {
        background-color: #28a745;
        color: #fff;
        text-align: center;
        padding: 10px;
    }
</style>

	</head>
	<body>
	
			
		<section class="bg-light">
			<div class="container">
				<div class="row">
					<?php
						
						include_once '../config/dbconnect.php';
						// $conn = connect();
						
						// $result = mysqli_query($conn,"SELECT * FROM user,nurse WHERE user.u_id=nurse.Nurse_id  AND user.u_id='" . $_GET['u_id'] . "'");
						$mail=$_GET['email'];
						$result = mysqli_query($conn,"SELECT * FROM user inner join nurse on user.nurse_id=nurse.Nurse_id  where email='$mail'");
						// $result = mysqli_query($conn,"SELECT * FROM nurse where user.nurse_id=nurse.Nurse_id);
						
						while($row = mysqli_fetch_array($result)) {
					?>
						
						<div class="col-md-3">
							<div class="sideprofile">
							
						  <img src="../../uploads/nurse/<?php echo $row["image"]; ?>" class="img-fluid profile_img" style="max-width: 150px; max-height: 150px;">

							
								<h2><?php echo $row["first_name"]; ?> <?php echo $row["last_name"]; ?></h2>
								<h4><?php echo $row["specialization"]; ?></h4>
								<hr>
							</div>
						</div>
						<div class="col-md-9">
							<div class="mainprofile">
								<div class="infogroup row">
									<div class="col-md-4">
										<label for="email"><b>Contact number :</b></label>
									</div>
									<div class="col-md-8">
										<p><?php echo $row["contact_number"]; ?></p>
									</div>
								</div>
								<div class="infogroup row">
									<div class="col-md-4">
										<label for="email"><b>Email :</b></label>
									</div>
									<div class="col-md-8">
										<p><?php echo $row["email"]; ?></p>
									</div>
								</div>
								<div class="infogroup row">
									<div class="col-md-4">
										<label for="email"><b>Education :</b></label>
									</div>
									<div class="col-md-8">
										<p><?php echo $row["university_college"]; ?></p>
								
										<p><?php echo $row["passing_year"]; ?></p>
									</div>
								</div>
								<div class="infogroup row">
									<div class="col-md-4">
										<label for="email"><b>Address:</b></label>
									</div>
									<div class="col-md-8">
										<p><?php echo $row["full_address"]; ?></p>
										<p><?php echo $row["city"]; ?></p>
										<p><?php echo $row["zip_code"]; ?></p>
									</div>
								</div>
								<div class="infogroup row">
									<div class="col-md-4">
										<label for="email"><b>Practising length :</b></label>
									</div>
									<div class="col-md-8">
										<p><?php echo $row["experience"]; ?></p>
									</div>
								</div>
								<!-- <div class="infogroup row">
									<div class="col-md-4">
										<label for="email"><b>Type of case handles:</b></label>
									</div>
									<div class="col-md-8">
										<p><?php echo $row["case_handle"]; ?></p>
										
									</div>
								</div>   -->
								
								<form action="save_booking.php" method="post">
									<div class="row">
										<div class="col-md-3">
											Book for appointment
										</div>
							
										
                                    
										<label for="date">Choose a date:</label>
										<input type="date" id="date" name="date" required>

										<script>
											// JavaScript code to set the minimum date to today
											var today = new Date();
											var dd = String(today.getDate()).padStart(2, '0');
											var mm = String(today.getMonth() + 1).padStart(2, '0'); // January is 0!
											var yyyy = today.getFullYear();

											today = yyyy + '-' + mm + '-' + dd;
											document.getElementById('date').setAttribute('min', today);
										</script>
										<div class="col-md-3">
											<textarea name="description" id="" cols="20" rows="4" placeholder="write description if any"></textarea>
										</div>
										<?php
						
						include_once '../config/dbconnect.php';
						
					
						// $conn = connect();
						
						// $result = mysqli_query($conn,"SELECT * FROM user,nurse WHERE user.u_id=nurse.Nurse_id  AND user.u_id='" . $_GET['u_id'] . "'");
						$mail=$_GET['email'];
						$result = mysqli_query($conn,"SELECT * FROM user inner join nurse on user.nurse_id=nurse.Nurse_id  where email='$mail'");
						// $result = mysqli_query($conn,"SELECT * FROM nurse where user.nurse_id=nurse.Nurse_id);
						
						$row = mysqli_fetch_array($result)
					?>
										
										<input type="hidden" name="Nurse_id"  value="<?php echo $row['Nurse_id']; ?>">
										<?php
						
						include_once '../config/dbconnect.php';
						
						
						// $conn = connect();
						
						// $result = mysqli_query($conn,"SELECT * FROM user,nurse WHERE user.u_id=nurse.Nurse_id  AND user.u_id='" . $_GET['u_id'] . "'");
						
						// $result = mysqli_query($conn,"SELECT * FROM client where client_id='13' ");
						
						// $result = mysqli_query($conn,"SELECT * FROM nurse where user.nurse_id=nurse.Nurse_id);
						
						$row = mysqli_fetch_array($result)
						?>
						     <input type="hidden" name="client_id" value="<?php echo $_SESSION['client_id'];?>">
                 <input type="submit" value="submit">

					 <!-- <input type="hidden" name="client_id"  value=" ?>"
						
										< <input type="submit" value="submit"> 
											
												
												<!- <input name="post" type="submit" class="btn btn-block btn-info" value="Request booking" /> -->
												
										</div>
									</div>
								</form>
								
							</div>
						</div>
						<?php
						}
					?>
				</div>
			</div>
		</section>
		
		<footer class="bg-success py-3">
			<div class="container">
			<div class="row">
			<div class="col">
			<!-- <h5>All rights reserved 2020</h5> -->
			</div>
			</div>
			</div>
			</footer>
			<!-- Optional JavaScript -->
			<!-- jQuery -->
			
			<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
			<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
			</body>
			</html>	
			<?php
    } else {
        echo "nurse not found.";
    }
} else {
    echo "Invalid email parameter.";
}
?>					