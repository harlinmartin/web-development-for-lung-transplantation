

  <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>iofrm</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/fontawesome-all.min.css" />
    <link rel="stylesheet" type="text/css" href="css/iofrm-style.css" />
    <link rel="stylesheet" type="text/css" href="css/iofrm-theme12.css" />
  </head>
  <body>
    <div class="form-body">
      <div class="row">
        <div class="form-holder">
          <div class="form-content">
            <div class="form-items">
              <div class="website-logo-inside">
                <a href="index.html">
                  <div class="logo">
                    <img class="logo-size" src="images/logo-light.svg" alt="" />
                  </div>
                </a>
              </div>
              <h3>Log  In </h3>
              <!-- <p>
                Access to the most powerfull tool in the entire design and web
                industry.
              </p> -->

              <div class="page-links">
                <!-- <a href="login.php" class="active">Login</a> -->
                <!-- <a href="userregister.php">Register as User</a
                ><a href="nurseregister.php">Register as Nurse</a> -->
              </div>
              <form method="post">
                <input
                  class="form-control"
                  type="email"
                  name="email"
                  placeholder="E-mail Address"
                  required
                />
                <input
                  class="form-control"
                  type="password"
                  name="pwd"
                  placeholder="Password"
                  required
                />
                <!-- <input type="submit" name="login" value="login"> -->
                <div class="form-button">
                  <button id="login" name="login" type="submit" class="ibtn">Login</button>
                  <a href="forget12.html">Forget password?</a>
                </div>
              </form>
              <div class="other-links">
                <span>Or login with</span><a href="#">Facebook</a
                ><a href="#">Google</a><a href="#">Linkedin</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>


<?php
include_once("dbconn.php");
$obj1 = new MyDatabase();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
    $email = $_POST["email"];
    $cpwd = $_POST["pwd"];
    $pwd = md5($cpwd);
  
    

    $sql = $obj1->logincheck($email, $pwd);

    if ($sql->num_rows > 0) {
        $row = $sql->fetch_assoc();

        session_start();
        $_SESSION['email'] = $email;
        $_SESSION['doctor_id'] = $row['doctor_id'];
        $_SESSION['name'] = $row['name'];

        header("Location: doctor/index.php");
       
    }
    else {
      // Password does not match, display an alert message
      echo "<script>alert('Incorrect email or password. Please try again.');</script>";
  }
 }
?>
