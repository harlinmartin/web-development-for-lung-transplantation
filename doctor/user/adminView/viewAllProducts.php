<?php 
session_start();

if(isset($_SESSION['client_id']) && isset($_SESSION['email'])){
    $user_id = $_SESSION['client_id'];
    $user_em = $_SESSION['email'];
} else {
    // Redirect to the login page or handle the situation where the user is not logged in
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>User Profile</title>
  <!-- Include necessary CSS and JavaScript libraries here -->
</head>
<body>
<div>
  <h2>User Profile</h2>
  <table class="table">
    <thead>
      <tr>
        <th class="text-center">Attribute</th>
        <th class="text-center">Value</th>
      </tr>
    </thead>
    <?php
      // Check if the client_id session variable is set
      if (isset($_SESSION['client_id'])) {
        // Include the database connection script
        include_once "../config/dbconnect.php";

        // Get the client_id from the session
        $client_id = $_SESSION['client_id'];

        // SQL query to retrieve the profile of the specified client
        $sql = "SELECT c.first_name, c.last_name, u.email, c.city, c.zip_code, c.full_address, c.contactno,c.image, u.client_id
        FROM user u
        JOIN client c ON u.client_id = c.client_id
        WHERE u.client_id = $client_id";

        $result = $conn->query($sql);

        // Check if the query execution was successful
        if ($result !== false) {
          // Check if there are rows returned from the query
          if ($result->num_rows > 0) {
            // Fetch the client's profile
            $row = $result->fetch_assoc();

            // Display client profile attributes and values in the table
            echo "<tr><td>Name</td><td>" . $row["first_name"] . " " . $row["last_name"] . "</td></tr>";
            echo "<tr><td>Client ID</td><td>" . $row["client_id"] . "</td></tr>";
            echo "<tr><td>Contact Number</td><td>" . $row["contactno"] . "</td></tr>";
            echo "<tr><td>Email</td><td>" . $row["email"] . "</td></tr>";
            echo "<tr><td>Address</td><td>" . $row["full_address"] . "</td></tr>";
            echo "<tr><td>City</td><td>" . $row["city"] . "</td></tr>";
            echo "<tr><td>Zip code</td><td>" . $row["zip_code"] . "</td></tr>";
            echo "<tr><td>Image</td><td><img src='../../nursedb/uploads/user/" . $row["image"] . "' style='max-width: 150px; max-height: 150px;'></td></tr>";


          } else {
            echo "<tr><td colspan='2'>Client not found.</td></tr>";
          }
        } else {
          echo "<tr><td colspan='2'>Error executing the query: " . $conn->error . "</td></tr>";
        }

        // Close the database connection
        $conn->close();
      } else {
        echo "<tr><td colspan='2'>Session variable 'client_id' not set.</td></tr>";
      }
    ?>
  </table>
  <a href="adminView/edituserprofile.php" >Edit</a>
</div>
</body>
</html>