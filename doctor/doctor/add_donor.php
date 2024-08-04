<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Donor</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }

        label {
            display: block;
            font-weight: bold;
            margin-top: 10px;
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

        input[type="file"] {
            padding: 5px;
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
    <form method="post" enctype="multipart/form-data">
        <label for="donorName">Donor Name:</label>
        <input type="text" id="donorName" name="donorName" required>

        <label for="dob">Date of Birth:</label>
        <input type="date" id="dob" name="dob" required>

        <label for="cod">Cause of Death:</label>
        <input type="text" id="cod" name="cod" required>

        <label for="xray">Recent Chest X-Ray:</label>
        <input type="file" id="xray" name="xray" accept="image/*" required>

        <label for="ct">Computed Tomography Scan:</label>
        <input type="file" id="ct" name="ct" accept="image/*" required>

        <label for="bronchoscopy">Bronchoscopy:</label>
        <input type="file" id="bronchoscopy" name="bronchoscopy" accept="image/*" required>

        <label for="sputum">Sputum Cultures:</label>
        <input type="text" id="sputum" name="sputum" required>

        <label for="bloodtest">Blood Test Report:</label>
        <input type="file" id="bloodtest" name="bloodtest" accept="image/*" required>

        <label for="pf">PO<sub>2</sub>/FiO<sub>2</sub> Ratio:</label>
        <input type="text" id="pf" name="pf" required>

        <label for="smoking">Cigarette Smoking History:</label>
        <input type="text" id="smoking" name="smoking" required>

        <label for="chesttrauma">Absence of Chest Trauma:</label>
        <input type="text" id="chesttrauma" name="chesttrauma" required>

        <label for="image">Photo:</label>
        <input type="file" id="image" name="image" accept="image/*" required>

        <label for="hospital">Admitted Hospital:</label>
        <input type="text" id="hospital" name="hospital" required>

        <label for="travel">Travel Duration:</label>
        <input type="text" id="travel" name="travel" required>

        <button type="submit" name="submit">Submit</button>
    </form>
</body>
</html>


                <?php
// Include the database connection file
include_once("../dbconn.php");

if (isset($_POST['submit'])) {
    // Get the donor details from the form
    $donorName = $_POST["donorName"];
    $dob = $_POST["dob"];
    $cod = $_POST["cod"];
    $sputum = $_POST["sputum"];
    $pf = $_POST["pf"];
    $smoking = $_POST["smoking"];
    $chesttrauma = $_POST["chesttrauma"];
    $hospital = $_POST["hospital"];
    $travel = $_POST["travel"];

    // File upload handling (X-Ray, CT Scan, Bronchoscopy, Blood Test, and Image)
    if (isset($_FILES["xray"]) && isset($_FILES["ct"]) && isset($_FILES["bronchoscopy"]) && isset($_FILES["bloodtest"]) && isset($_FILES["image"])) {
        $xray = $_FILES["xray"]["name"];
        $ct = $_FILES["ct"]["name"];
        $bronchoscopy = $_FILES["bronchoscopy"]["name"];
        $bloodtest = $_FILES["bloodtest"]["name"];
        $image = $_FILES["image"]["name"];

        $uploadDirectory = "images/donor/";

        // Move uploaded files to the correct directory with their original names
        move_uploaded_file($_FILES["xray"]["tmp_name"], $uploadDirectory . $xray);
        move_uploaded_file($_FILES["ct"]["tmp_name"], $uploadDirectory . $ct);
        move_uploaded_file($_FILES["bronchoscopy"]["tmp_name"], $uploadDirectory . $bronchoscopy);
        move_uploaded_file($_FILES["bloodtest"]["tmp_name"], $uploadDirectory . $bloodtest);
        move_uploaded_file($_FILES["image"]["tmp_name"], $uploadDirectory . $image);

        // SQL query to insert donor details into the 'donorprofile' table
        $sql = "INSERT INTO donorprofile (name, date_of_birth, cause_of_death, chest_xray, tomography_scan, bronchoscopy, sputum_culture, blood_test, pf_ratio, cigarette_history, chest_trauma, hospital, travel_duration, image) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        // Prepare the SQL statement
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            // Bind parameters and execute the query
            $stmt->bind_param("ssssssssssssss", $donorName, $dob, $cod, $xray, $ct, $bronchoscopy, $sputum, $bloodtest, $pf, $smoking, $chesttrauma, $hospital, $travel, $image);
            if ($stmt->execute()) {
                // Donor details inserted successfully
                echo "<script>alert('Donor added successfully!'); window.location.href = 'donors.php';</script>";
                exit; // Make sure to exit to prevent further execution
            } else {
                // Error inserting donor details
                echo "Error: " . $stmt->error;
            }

            // Close the prepared statement
            $stmt->close();
        } else {
            // Error in preparing the statement
            echo "Error: " . $conn->error;
        }
    } else {
        // Handle the case where file uploads are not set
        echo "File uploads are not set.";
    }
} else {
    // If the form was not submitted via POST, display an error message or redirect as needed
    echo "Form submission error.";
}
?>
