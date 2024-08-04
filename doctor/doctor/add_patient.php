<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Patient</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="date"],
        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Add Patient</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="patientName">Patient Name:</label>
        <input type="text" id="patientName" name="patientName" required><br>

        <label for="dateOfBirth">Date of Birth:</label>
        <input type="date" id="dateOfBirth" name="dateOfBirth" required><br>

        <label for="disease">Disease:</label>
        <input type="text" id="disease" name="disease" required><br>

        <label for="bloodType">Blood Type:</label>
        <input type="text" id="bloodType" name="bloodType" required><br>

        <label for="lungSize">Lung Size:</label>
        <input type="text" id="lungSize" name="lungSize" required><br>

        <label for="chestXray">Chest X-Ray:</label>
        <input type="file" id="chestXray" name="chestXray" accept="image/*" required><br>

        <label for="transplantType">Transplant Type:</label>
        <input type="text" id="transplantType" name="transplantType" required><br>

        <label for="hospital">Hospital:</label>
        <input type="text" id="hospital" name="hospital" required><br>

        <label for="image">Image:</label>
        <input type="file" id="image" name="image" accept="image/*" required><br>

        <button type="submit" name="submit">Submit</button>
    </form>
</body>
</html>

<?php
// Include the database connection file
include_once("../dbconn.php");

if (isset($_POST['submit'])) {
    // Get the patient details from the form
    $patientName = $_POST["patientName"];
    $dateOfBirth = $_POST["dateOfBirth"];
    $disease = $_POST["disease"];
    $bloodType = $_POST["bloodType"];
    $lungSize = $_POST["lungSize"];
    $transplantType = $_POST["transplantType"];
    $hospital = $_POST["hospital"];

    // File upload handling (Chest X-Ray and Image)
    $chestXray = $_FILES["chestXray"]["name"];
    $image = $_FILES["image"]["name"];

    $uploadDirectory = "images/patient/";

    // Check if file uploads are successful
    if (move_uploaded_file($_FILES["chestXray"]["tmp_name"], $uploadDirectory . $chestXray) &&
        move_uploaded_file($_FILES["image"]["tmp_name"], $uploadDirectory . $image)) {

        // SQL query to insert patient details into the 'patientprofile' table
        $sql = "INSERT INTO patientprofile (name, date_of_birth, disease, blood_type, lung_size, chest_xray, transplant_type, hospital, image) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        // Prepare the SQL statement
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            // Bind parameters and execute the query
            $stmt->bind_param("sssssssss", $patientName, $dateOfBirth, $disease, $bloodType, $lungSize, $chestXray, $transplantType, $hospital, $image);
            if ($stmt->execute()) {
                // Patient details inserted successfully
                echo "<script>alert('Patient added successfully!'); window.location.href = 'patients.php';</script>";
            } else {
                // Error inserting patient details
                echo "Error: " . $stmt->error;
            }

            // Close the prepared statement
            $stmt->close();
        } else {
            // Error in preparing the statement
            echo "Error: " . $conn->error;
        }
    } else {
        // Error in file upload
        echo "Error uploading files.";
    }

    // Close the database connection
    $conn->close();
} 
?>
