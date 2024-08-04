<?php
// Include the database connection script
include_once "../config/dbconnect.php";

if (isset($_GET['client_id'])) {
    $client_id = $_GET['client_id'];

    // SQL query to retrieve the image URL based on the client_id
    $sql = "SELECT image FROM client WHERE client_id = $client_id";
    
    $result = $conn->query($sql);

    if ($result !== false && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $imageURL = $row["image"];
        
        // Display the image
        header("Content-type: image/jpeg"); // Adjust content-type based on your image type
        echo file_get_contents($imageURL);
        exit();
    } else {
        echo "Image not found.";
    }
} else {
    echo "Invalid request.";
}

// Close the database connection
$conn->close();
?>
