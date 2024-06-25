<?php
// Linking the config file
require "config/DBconnection.php";
// Linking header
include_once "header.php";
?>

<style>
    .container {
        margin-top: -20px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
        font-family: 'Poppins', sans-serif;
    }

    fieldset {
        position: relative;
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
    }

    .link {
        position: relative;
        font-family: 'Poppins', sans-serif;
        bottom: 50px;
        margin-left: 260px;
    }
</style>

<?php
$measurementId = $_GET['id'];

// Prepare and execute the SQL statement to retrieve the measurement data
$sql = "SELECT * FROM measurements WHERE id = ?";
$stmt = $connection->prepare($sql);
$stmt->bind_param("i", $measurementId);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    // Fetch the measurement data
    $row = $result->fetch_assoc();

    // Display the measurement form pre-filled with the data
    echo "<title>Custom Size</title>";
    echo '<div class="container">';
    echo "<h1>Update Custom Size</h1><br>";
    echo '<img src="./img/measurement.jpg" alt="measurement" class="image" style="position: absolute; top: 140px; left: 750px;">';
    echo "<fieldset>";
    echo "<form method='post'>";
    echo "<input type='hidden' name='id' value='{$row['id']}'>";
    echo "<label for='measurementName'>Measurement Name:</label>";
    echo "<input type='text' id='measurementName' name='measurementName' value='{$row['measurementName']}' required>";
    echo "<br>";
    echo "<label for='Shoulder'>Shoulder(cm):</label>";
    echo "<input type='number' id='Shoulder' name='Shoulder' value='{$row['shoulder']}' required>";
    echo "<br>";
    echo "<label for='Chest'>Chest(cm):</label>";
    echo "<input type='number' id='Chest' name='Chest' value='{$row['chest']}' required>";
    echo "<br>";
    echo "<label for='Length'>Length(cm):</label>";
    echo "<input type='number' id='Length' name='Length' value='{$row['length']}' required>";
    echo "<br>";
    echo "<label for='Sleeve'>Sleeve(cm):</label>";
    echo "<input type='number' id='Sleeve' name='Sleeve' value='{$row['sleeve']}' required>";
    echo "<br>";
    echo "<label for='Hem'>Hem(cm):</label>";
    echo "<input type='number' id='Hem' name='Hem' value='{$row['hem']}' required>";
    echo "<br>";
    echo "<br>";
    echo "<button type='submit' name='updateMeasurement-button'>Update Measurement</button>";
    echo "</form>";
    echo "</fieldset>";
    echo "</div>";
} else {
    echo "Measurement not found";
}

if (isset($_POST['updateMeasurement-button'])) {
    // Get the updated measurement values from the form
    $measurementName = $_POST['measurementName'];
    $shoulder = $_POST['Shoulder'];
    $chest = $_POST['Chest'];
    $length = $_POST['Length'];
    $sleeve = $_POST['Sleeve'];
    $hem = $_POST['Hem'];

    // Prepare and execute the SQL statement to update the measurement
    $sql = "UPDATE measurements SET measurementName = ?, shoulder = ?, chest = ?, length = ?, sleeve = ?, hem = ? WHERE id = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("siiiiii", $measurementName, $shoulder, $chest, $length, $sleeve, $hem, $measurementId);

    if ($stmt->execute()) {
    // Display success message and refresh the page to show updated values
        echo '<script>alert("Measurement updated successfully"); window.location.href = window.location.href;</script>';
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>

<div class="link">
    <a href='measurement_list.php' style="color: blue; text-decoration: underline; font-style: italic; font-size:15px;">Go back to all custom Measurements</a>
</div>

<?php
include_once "footer.php";
?>
