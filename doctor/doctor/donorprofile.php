<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donor Profile</title>
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

        /* Style for the image containers */
        .image-container {
            text-align: right; /* Align the image to the right */
            position: absolute;
            top: 20px; /* Adjust the top position as needed */
            right: 20px; /* Adjust the right position as needed */
        }

        /* Style for the displayed image */
        .image-container img {
            max-width: 300px;
            max-height: 300px;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }

        form {
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 8px;
        }

        input[type="text"],
        input[type="date"],
        input[type="file"] {
            padding: 8px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        input[type="file"] {
            padding: 6px;
        }

        button[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
   
        <h1>Donor Profile</h1>
        <?php
        // Include the database connection file
        include_once("../dbconn.php");

        // Check if donor_id is provided as a GET parameter
        if (isset($_GET['donor_id'])) {
            // Get the donor_id from the GET parameter
            $donor_id = $_GET['donor_id'];

            // SQL query to fetch donor details from the 'donorprofile' table
            $sql = "SELECT * FROM donorprofile WHERE donor_id = $donor_id";

            // Execute the query using the database connection from dbconn.php
            $result = $conn->query($sql);

            // Check if a donor with the given ID exists
            if ($result->num_rows > 0) {
                // Fetch donor details
                $row = $result->fetch_assoc();
               echo " <div class='image-container'><img src='images/donor/". $row["image"]."' style='width: 200px; height: 200px;'>
                   </div>";
                // Display donor information
                echo "<div class='profile-info'><span class='label'>Name:</span> " . $row['name'] . "</div>";
                echo "<div class='profile-info'><span class='label'>Date of Birth:</span> " . $row['date_of_birth'] . "</div>";
                
              ?>
               
                <div class='profile-info'><span class='label'>Recent Chest X-ray:</span> <a href='#' data-image='images/donor/<?php echo $row['chest_xray']; ?>' class='show-image'>Show X-ray</a></div>
                <div class='profile-info'><span class='label'>Computed tomography scan:</span> <a href='#' data-image='images/donor/<?php echo $row['tomography_scan']; ?>' class='show-image'>Show CT Scan</a></div>
                <div class='profile-info'><span class='label'>Bronchoscopy:</span> <a href='#' data-image='images/donor/<?php echo $row['bronchoscopy']; ?>' class='show-image'>Show Bronchoscopy</a></div>
                <div class='profile-info'><span class='label'>Bloodtest Report:</span> <a href='#' data-image='images/donor/<?php echo $row['blood_test']; ?>' class='show-image'>Show Bloodtest Report</a></div>

                
              <?php
               echo "<div class='profile-info'><span class='label'>Sputum cultureS :</span> " . $row['sputum_culture'] . "</div>";
               echo "<div class='profile-info'><span class='label'>PO<sub>2</sub>/FiO<sub>2</sub>:</span> " . $row['pf_ratio'] . "</div>";
               echo "<div class='profile-info'><span class='label'>Cigarette smoking history:</span> " . $row['cigarette_history'] . "</div>";
               echo "<div class='profile-info'><span class='label'>Absence of chest trauma:</span> " . $row['chest_trauma'] . "</div>";
               echo "<div class='profile-info'><span class='label'>Admitted Hospital:</span> " . $row['hospital'] . "</div>";
               echo "<div class='profile-info'><span class='label'>Travel duration:</span> " . $row['travel_duration'] . "</div>";
                // Back button to return to the list of donors
                echo "<a class='back-button' href='donors.php'>Back to Donor List</a>";
            } else {
                echo "<p>No donor found with the provided ID.</p>";
            }
        } else {
            echo "<p>Invalid request. Please provide a donor ID.</p>";
        }
        ?>
    </div>

    <!-- JavaScript to toggle image visibility -->
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
