<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .profile-info {
            margin-bottom: 20px;
        }

        .label {
            font-weight: bold;
        }

        /* Style the back button */
        .back-button {
            display: block;
            margin-top: 20px;
            text-align: center;
        }
        .image-container {
            text-align: right; /* Align the image to the right */
            position: absolute;
            top: 20px; /* Adjust the top position as needed */
            right: 20px; /* Adjust the right position as needed */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Patient Profile</h1>
        <?php
        // Include the database connection file
        include_once("../dbconn.php");

        // Check if patient_id is provided as a GET parameter
        if (isset($_GET['patient_id'])) {
            // Get the patient_id from the GET parameter
            $patient_id = $_GET['patient_id'];

            // SQL query to fetch patient details from the 'patientprofile' table
            $sql = "SELECT * FROM patientprofile WHERE patient_id = $patient_id";

            // Execute the query using the database connection from dbconn.php
            $result = $conn->query($sql);

            // Check if a patient with the given ID exists
            if ($result->num_rows > 0) {
                // Fetch patient details
                $row = $result->fetch_assoc();

                // Display patient information
                echo " <div class='image-container'><img src='images/patient/". $row["image"]."' style='width: 200px; height: 200px;'>
                </div>";
                echo "<div class='profile-info'><span class='label'>Name:</span> " . $row['name'] . "</div>";
                echo "<div class='profile-info'><span class='label'>Date of Birth:</span> " . $row['date_of_birth'] . "</div>";
                echo "<div class='profile-info'><span class='label'>Disease :</span> " . $row['disease'] . "</div>";
                echo "<div class='profile-info'><span class='label'>Lung size:</span> " . $row['lung_size'] . "</div>";
                echo "<div class='profile-info'><span class='label'> Blood type:</span> " . $row['blood_type'] . "</div>";
                ?>
                <div class='profile-info'><span class='label'>Recent Chest X-ray:</span> <a href='#' data-image='images/patient/<?php echo $row['chest_xray']; ?>' class='show-image'>Show X-ray</a></div>
                <?php
                 echo "<div class='profile-info'><span class='label'>Transplantation type:</span> " . $row['transplant_type'] . "</div>";
                echo "<div class='profile-info'><span class='label'>Admitted Hospital:</span> " . $row['hospital'] . "</div>";
               
                // Add more fields as needed

                // Back button to return to the list of patients
                echo "<a class='back-button' href='patients.php'>Back to Patient List</a>";
            } else {
                echo "<p>No patient found with the provided ID.</p>";
            }
        } else {
            echo "<p>Invalid request. Please provide a patient ID.</p>";
        }
        ?>
    </div>
    <script>
    const showImageLinks = document.querySelectorAll('.show-image');

    showImageLinks.forEach((link) => {
        link.addEventListener('click', (e) => {
            e.preventDefault();
            const imageUrl = link.getAttribute('data-image');
            window.open(imageUrl, '_blank');
        });
    });
</script>

</body>
</html>
