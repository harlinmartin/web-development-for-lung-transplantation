<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Donors</title>
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
        }

        /* Change the link color on hover */
        .link:hover {
            color: #007bff; /* Blue color on hover */
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        /* Style for the modal content */
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }

        .modal-content label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        .modal-content input[type="text"],
        .modal-content input[type="date"],
        .modal-content input[type="file"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        .modal-content input[type="file"] {
            padding: 6px;
        }

        .modal-content button[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .modal-content button[type="submit"]:hover {
            background-color: #0056b3;
        }
        .back-button {
            display: block;
            margin-top: 20px;
            text-align: center;
        }
        
    </style>
</head>
 <body style="font-family: Arial, sans-serif; background-image: url('../images/donorbg.jpg'); background-repeat: no-repeat; background-size: cover; margin: 0; padding: 0;">

    <div class="container">
        <h1>List of Donors</h1>
        <table>
            <thead>
                <tr>
                    <th>Donor ID</th>
                    <th>Donor Name</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Include the database connection file
                include_once("../dbconn.php");

                // SQL query to fetch donor_id and name from the 'donorprofile' table
                $sql = "SELECT donor_id, name FROM donorprofile";

                // Execute the query using the database connection from dbconn.php
                $result = $conn->query($sql);

                // Display donor data in the table with a link to the donor's profile
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr><td>" . $row["donor_id"] . "</td><td><a class='link' href='donorprofile.php?donor_id=" . $row["donor_id"] . "'>" . $row["name"] . "</a></td></tr>";
                    }
                } else {
                    echo "<tr><td colspan='2'>No donors found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
        
        <a href="add_donor.php"><button>Add Donors</button></a> 

       
        <a class='back-button' href='index.php'>Back to Home</a>


        <!-- JavaScript to handle the modal -->
     
    </div>
</body>
</html>
