<html>
	<head>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="../style.css"></link>
  </head>

</body>
<?php
						// include "../adminHeader.php";
            // include "../sidebar.php";
						?>
						
						
           


<section class="lawyerscard">
				<div class="container">
					<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" novalidate="novalidate" >
						
						<div class="row">
							
							<div class="col-md-4">
								<div class="form-group">
									<label for="experience">Experience</label>
									<select name="experience" class="form-control">
										<option value="" selected>Choose...</option>
										<option value="2">0</option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
										<option value="6">6</option>
										<option value="7">7</option>
										<option value="8">8</option>
										<option value="9">9</option>
										<option value="10">10</option>
										<option value=">10">>10</option>
									</select>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group ">
									<label for="speciality">Speciality</label>
									<select name="speciality" class="form-control">
										<option value="" selected>Choose...</option>
										<option value="Pediatric">Pediatric</option>
										<option value="Civil law">Mental health</option>
										<option value="Writ Jurisdiction">Travel Nurse</option>
										<option value="Company law">Orthopediac</option>
										<option value="Contract law">Cardiac</option>
										<option value="Commercial law">Gerentological</option>
										
									</select>
								</div>
							</div>
							<div class="col-md-4">
								<label for="location">Location</label>
								<select name="location" class="form-control"> 
									<option selected>Choose...</option>
									<option value="Dhaka">Dhaka</option>
									<option value="ADIMALI">ADIMALI</option>
									<option value="Sylhet">Sylhet</option>
									<option value="Barishal">Barishal</option>
									<option value="Khulna">Khulna</option>
									<option value="Mymensingh">Mymensingh</option>
									<option value="Rajshahi">Rajshahi</option>
									<option value="Rangpur"></option>
								</select>
							</div>
						</div>
						<div class="row">
							<div class="col-md-8"></div>
							<div class="col-md-4">
								<button id="button" type="submit" class="btn btn-mg btn-primary" name="submit" value="submit" style="float:right"><i class="fa fa-search"></i>&nbsp; Search Information</button>
							</div>	
						</div>
					</form>
          <hr/>
					<div class="row " >
						
						<?php
							include_once '../config/dbconnect.php';
							
							if (isset($_POST['submit'])){
								$experience=$_POST['experience'];
								$specialization=$_POST['speciality'];
								$city=$_POST['location'];
								
								 $result = mysqli_query($conn,"SELECT * FROM user inner join nurse on user.nurse_id=nurse.Nurse_id where experience='$experience'OR specialization='$specialization'OR city='$city'");
								
								while($row = mysqli_fetch_assoc($result)) {
									
								?>
								<div class="col-md-4">
									<div class="card" style="width: 18rem;">
										<img src="../../uploads/nurse/<?php echo $row["image"]; ?>" class="card-img-top cusimg img-fluid" alt="img">
										<div class="card-body">
											<h5 class="card-title"><?php echo $row["first_name"]; ?> <?php echo $row["last_name"]; ?></h5> <!--lawyers name dynamic-->
											<h6 class="card-title"><?php echo $row["specialization"]; ?></h6> <!--lawyers practice speciality dynamic-->
											<h6 class="card-title"><span><?php echo $row["experience"]; ?></span></h6> <!--lawyers practice time dynamic-->
											<?php $email = $row['email'];?>
											
											<a class="btn btn-sm btn-info" href="single_lawyer.php?email=<?php echo $email; ?>&Nurse_id=<?php echo $row["Nurse_id"];?>"><i class="fa fa-street-view"></i>&nbsp; View Full Profile</a>
										</div>
									</div>
								</div>
								<?php
                }}
						?>
					</div>
				</div>
			</div>
		</section>
		<script type="text/javascript" src="../assets/js/ajaxWork.js"></script>    
    <script type="text/javascript" src="../assets/js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
              </body>
              </html>