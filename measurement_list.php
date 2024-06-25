<?php
// Linking the config file
require "config/DBconnection.php";
// Linking header
include_once "header.php";
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
        
        #measurementTable {
            margin: 0 auto;
            width: 70%;
            border-collapse: collapse;
            align-items: center;
        }

        #measurementTable th,#measurementTable td {
            padding: 15px;
            border: 1px solid #a3e4ff;
            text-align: center;
        }

#measurementTable th {
    background-color: rgb(0, 100, 134);
    color:white;
    font-size:18px;
}

#measurementTable tr:hover {
    background-color: #eaf5fd;
}
        #measurementTable td button {
            background-color: rgb(0, 100, 134);
            color: #fff;
            border: none;
            padding: 8px 12px;
            cursor: pointer;
        }

        #measurementTable td a {
            display: inline-block;
            margin-right: 5px;
        }

        #measurementTable td a:hover {
            text-decoration: underline;
        }
        .image-size {
            width: 450px;
            height: 490px;
            max-width: 630px;
            max-height: 650px; 
            display: block;
            margin-left: auto;
            margin-right: auto;
            border: 5px solid rgb(0, 0, 0)
        }

    </style>
</head>

<body>
    <br><br>
    <div class="container">
    <!-- measurement chart image -->
    <img src="./img/measurement.jpg" alt="measurement" class="image-size" style="text-align:center; position: relevent; top: 140px; left: 750px;"><br><br>
    <h2 style="text-align: center;">All Custom Sizes</h2>
    <br>

    <!-- measurement table -->
    <table id="measurementTable">
        <tr>
            <th>Name</th>
            <th>Shoulder</th>
            <th>Chest</th>
            <th>Length</th>
            <th>Sleeve</th>
            <th>Hem</th>
            <th>Update</th>
        </tr>
        <?php
        // Fetch all measurements from the database
        $sql = "SELECT * FROM measurements";
        $result = $connection->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $measurementName = $row['measurementName'];
                $shoulder = $row['shoulder'];
                $chest = $row['chest'];
                $length = $row['length'];
                $sleeve = $row['sleeve'];
                $hem = $row['hem'];

                // Output the measurement row
                echo "<tr>";
                echo "<td>$measurementName</td>";
                echo "<td>$shoulder</td>";
                echo "<td>$chest</td>";
                echo "<td>$length</td>";
                echo "<td>$sleeve</td>";
                echo "<td>$hem</td>";
                echo "<td><a href='edit_measurement.php?id=$row[id]'><button>Edit</button></a>
                      <a href='delete_measurement.php?id=$row[id]'><button>Delete</button></a>
                      <a href='edit_measurement.php?id=$row[id]'><button>Add to product</button></a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='7'>No measurements found</td></tr>";
        }
        ?>
    </table>
    <div style="text-align: center;">
        <a href='customMeasurement.php' style="color: blue; text-decoration: underline; font-style: italic; font-size:15px;">Add a new custom size</a>
    </div> </div> <br>
    <?php
    // Linking footer
    include_once "footer.php";
    ?>
</body>

</html>