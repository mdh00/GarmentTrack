<?php
//Linking the config file
require "config/DBconnection.php";
//Linking header
include_once "header.php";

if (isset($_POST['addMeasurement-button'])) {
    // Get the measurement values from the form
    $measurementName = $_POST['measurementName'];
    $shoulder = $_POST['Shoulder'];
    $chest = $_POST['Chest'];
    $length = $_POST['Length'];
    $sleeve = $_POST['Sleeve'];
    $hem = $_POST['Hem'];

    // Prepare and execute the SQL statement to insert the measurement into the database
    $sql = "INSERT INTO measurements (measurementName, shoulder, chest, length, sleeve, hem) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("siiiii", $measurementName, $shoulder, $chest, $length, $sleeve, $hem);


    if ($stmt->execute()) {
         // Execution successful, redirect to the measurement list page
        header('location:measurement_list.php');
    } else {
        $message = "Error: " . $stmt->error;
    }

    $stmt->close();
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Custom Size</title>
    <style>
        body {
            background-color: #ced4da;
        }
        .container {
            margin-top:-20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            font-family: 'Poppins', sans-serif;
            
        }
        
        form {
            margin-top: 20px;
        }

        fieldset {
            position:relative;
            left: -250px;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            background-color: rgb(67, 185, 225);
            width: 500px;
            
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="number"] {
            
            width: 100%;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
            margin-bottom: 10px;
        }

        button[type="submit"] {
            background-color: rgb(0, 100, 134);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }


        .image {
    position: relative;
    width: 430px;
    height: 470px;
    max-width: 630px;
    max-height: 650px;
    margin-top: 80px;
    margin-left: 100px;
    border: 5px solid rgb(0, 0, 0);
}


        .link{
            position:relative;
            font-family: 'Poppins', sans-serif;
            bottom:50px; 
            margin-left:260px;   
        }
    </style>
</head>

<body>
    <div class="container">
    <h1>Add New Custom Size</h1>
    
    <!-- measurement chart image -->
    <img src="./img/measurement.jpg" alt="measurement" class="image" style="position: absolute; top: 140px; left: 750px;">

<!-- add measurement form -->
<form id="customMeasurementForm" method="post">
<fieldset>

    <input type="hidden" id="id" name="id">

        <label for="measurementName">Custom Size Name:</label>
        <input type="text" id="measurementName" name="measurementName" required>
        <br>
        <label for="Shoulder">Shoulder(cm):</label>
        <input type="number" id="Shoulder" name="Shoulder" required>
        <br>
        <label for="Chest">Chest(cm):</label>
        <input type="number" id="Chest" name="Chest" required>
        <br>
        <label for="Length">Length(cm):</label>
        <input type="number" id="Length" name="Length" required>
        <br>
        <label for="Sleeve">Sleeve(cm):</label>
        <input type="number" id="Sleeve" name="Sleeve" required>
        <br>
        <label for="Hem">Hem(cm):</label>
        <input type="number" id="Hem" name="Hem" required>
        <br><br>
        <a href='measurement_list.php'>
            <button type="submit" name="addMeasurement-button" id="addMeasurement-button">Add Size</button>
        </a>
        <br>
        </fieldset>
    </form>
    </div></div></div>   
    <div class = "link">
    <a href='measurement_list.php' style="position:relative; color: blue; text-decoration: underline; font-style: italic; 
    font-size:13px; display: block; text-align:left;">View all custom sizes</a>
    </div></div></div>
</body>

</html>
<?php
	include_once "footer.php";
?>