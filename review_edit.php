<?php
// Linking the config file
require "config/DBconnection.php";
// Linking header
include_once "header.php";

$feedbackId = $_GET['id'];

// Prepare and execute the SQL statement to retrieve the feedback data
$sql = "SELECT * FROM review WHERE id = ?";
$stmt = $connection->prepare($sql);
$stmt->bind_param("i", $feedbackId);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    // Fetch the feedback data
    $row = $result->fetch_assoc();

    // Display the feedback form pre-filled with the data
    




    echo "<form method='post'>";
    echo "<input type='hidden' name='id' value='{$row['id']}'>";
    echo "<label for='name'>Name:</label>";
    echo "<input type='text' id='name' name='name' value='{$row['name']}' required>";
    echo "<br>";
    echo "<label for='email'>Email:</label>";
    echo "<input type='email' id='email' name='email' value='{$row['email']}' required>";
    echo "<br>";
    echo "<label for='rating'>Rating:</label>";
    echo "<input type='number' id='rating' name='rating' value='{$row['rating']}' required>";
    echo "<br>";
    echo "<label for='comment'>Comment:</label>";
    echo "<textarea id='comment' name='comment' rows='4' cols='50' required>{$row['comment']}</textarea>";
    echo "<br>";
    echo "<button type='submit' name='update-feedback-button'>Update Review</button>";
    echo "</form>";
} else {
    echo "Feedback not found";
}

if (isset($_POST['update-feedback-button'])) {
    // Get the updated feedback values from the form
    $feedbackId = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $rating = $_POST['rating'];
    $comment = $_POST['comment'];

    // Prepare and execute the SQL statement to update the feedback
    $sql = "UPDATE review SET name = ?, email = ?, rating = ?, comment = ? WHERE id = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("ssisi", $name, $email, $rating, $comment, $feedbackId);

    if ($stmt->execute()) {
        echo "Feedback updated successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>

<?php
    // Linking footer
    include "footer.php";
?>
