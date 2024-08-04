<?php
session_start();
// Include the database connection script
include_once "../config/dbconnect.php";

// Check if the client_id session variable is set
if (isset($_SESSION['client_id'])) {
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
        } else {
            echo "Client not found.";
            exit; // Terminate the script if the client is not found
        }
    } else {
        echo "Error executing the query: " . $conn->error;
        exit; // Terminate the script if there's an error
    }
} else {
    echo "Session variable 'client_id' not set.";
    exit; // Terminate the script if 'client_id' is not set in the session
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit User Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
        }

        form {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="submit"] {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <h1>Edit User Profile</h1>
    <form action="updateprofile.php" method="POST" enctype="multipart/form-data">

        <input type="hidden" name="client_id" value="<?php echo $row['client_id']; ?>">

        <label for="fname">First Name:</label>
        <input type="text" id="fname" name="fname" value="<?php echo $row['first_name']; ?>"><br>

        <label for="lname">Last Name:</label>
        <input type="text" id="lname" name="lname" value="<?php echo $row['last_name']; ?>"><br>

        <label for="email">Email:</label>
        <input type="text" id="email" name="email" value="<?php echo $row['email']; ?>"><br>

        <label for="contact_number">Contact Number:</label>
        <input type="text" id="contact_number" name="contact_number" value="<?php echo $row['contactno']; ?>"><br>

        <label for="full_address">Address:</label>
        <input type="text" id="full_address" name="full_address" value="<?php echo $row['full_address']; ?>"><br>

        <label for="city">City:</label>
        <input type="text" id="city" name="city" value="<?php echo $row['city']; ?>"><br>

        <label for="zip_code">Zip Code:</label>
        <input type="text" id="zip_code" name="zip_code" value="<?php echo $row['zip_code']; ?>"><br>

        <!-- <label for="image01">Image:</label>
        <input type="file" id="image01" name="image01" ><br><br> -->

        <input type="submit" value="Update Profile">
    </form>
    
</body>
</html>