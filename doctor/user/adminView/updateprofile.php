<?php
// Include the database connection script
include_once "../config/dbconnect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the user's client_id from the form
    $client_id = $_POST['client_id'];

    // Sanitize and validate the data (you should add proper validation here)
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $contact_number = $_POST['contact_number'];
    $full_address = $_POST['full_address'];
    $city = $_POST['city'];
    $zip_code = $_POST['zip_code'];

    // Perform SQL update queries to update the user's profile in the database
    $updateUserQuery = "UPDATE user SET
        email = '$email'
        WHERE client_id = $client_id";

    $updateClientQuery = "UPDATE client SET
        first_name = '$fname',
        last_name = '$lname',
        full_address = '$full_address',
        city = '$city',
        zip_code = '$zip_code',
        contactno = '$contact_number'
        WHERE client_id = $client_id";

    // Execute the update queries
    if ($conn->query($updateUserQuery) === TRUE && $conn->query($updateClientQuery) === TRUE) {
        // Display a JavaScript alert
        echo '<script>alert("Profile updated successfully!");</script>';
    } else {
        echo "Error updating profile: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
}

// Redirect to the desired page
echo '<script>window.location.href = "../index.php";</script>';
?>