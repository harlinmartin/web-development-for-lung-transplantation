<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donors and Patients</title>
    <style>
        /* Center the containers horizontally on the page */
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background-repeat: no-repeat;
            background-size: cover;
        }

        /* Container styles */
        .container {
            padding: 20px;
            border: 1px solid #ccc;
            margin: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            background-color: rgba(255, 255, 255, 0.8); /* Adjust background color and opacity as needed */
            text-align: center;
        }

        /* Donors container specific styles */
        .donors-container {
            background-color: rgba(255, 255, 255, 0.8);
        }

        /* Patients container specific styles */
        .patients-container {
            background-color: #ccffcc;
        }

        /* Common style for headings */
        h2 {
            margin-top: 0;
						color: black;
        }

        /* Change text color on hover */
        .container h2:hover {
    color: blue;
}

    </style>
</head>
<body style="background-image: url('../images/bg.jpg');">
    <!-- Your content here -->

    <div class="container donors-container">
        <a href="donors.php"><h2>Donors</h2></a>
        <p>Find information about our donors here.</p>
    </div>

    <div class="container patients-container">
		<a href="patients.php"><h2>Patients</h2></a>

        <p>Discover details about our patients here.</p>
    </div>
</body>
</html>
