<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Patients</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #333;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f0f0f0;
        }

        /* Style the link initially */
        .link {
            color: #000; /* Black color initially */
            text-decoration: none;
            transition: color 0.3s; /* Smooth color transition */
        }

        /* Change the link color on hover */
        .link:hover {
            color: #007bff; /* Blue color on hover */
        }
        .back-button {
            display: block;
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>
<body style="font-family: Arial, sans-serif; background-image: url('../images/patientbg.jpg'); background-repeat: no-repeat; background-size: cover; margin: 0; padding: 0;">
    <div class="container">
        <h1>List of Patients</h1>
        <table>
            <thead>
                <tr>
                    <th>Patient ID</th>
                    <th>Patient Name</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Include the database connection file
                include_once("../dbconn.php");

                // SQL query to fetch patient_id and patient_name from the 'patient' table
                $sql = "SELECT patient_id, name FROM patientprofile";

                // Execute the query using the database connection from dbconn.php
                $result = $conn->query($sql);

                // Display patient data in the table with a link to the patient's profile (styled on hover)
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr><td>" . $row["patient_id"] . "</td><td><a class='link' href='patientprofile.php?patient_id=" . $row["patient_id"] . "'>" . $row["name"] . "</a></td></tr>";
                    }
                } else {
                    echo "<tr><td colspan='2'>No patients found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <a href="add_patient.php"><button>Add Patients</button></a>
        <a class='back-button' href='index.php'>Back to Home</a>
    </div>
</body>
</html>
