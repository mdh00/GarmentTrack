<?php
// Linking the config file
require "config/DBconnection.php";
// Linking header
include_once "header.php";

if (isset($_POST['submit-button'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $rating = $_POST['rating'];
  $comment = $_POST['comment'];

  $sql = "INSERT INTO review (name, email, rating, comment) VALUES (?, ?, ?, ?)";
  $stmt = $connection->prepare($sql);
  $stmt->bind_param("ssis", $name, $email, $rating, $comment);

  if ($stmt->execute()) {
      header('location: review_read.php');
      exit();
  } else {
      die($stmt->error);
  }

  $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Reviews</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <style>
    /* Styles for the container */
    .container {
      max-width: 800px;
      margin: 0 auto;
      padding: 20px;
      font-family: Arial, sans-serif;
    }

    .container1 {
      position:relative;
      left: -200px;
      padding: 20px;
      width: 500px;
      bottom: 10px;
    }

    .container2 {
      position:relative;
      left: -250px;
      border: 1px solid #ccc;
      border-radius: 5px;
      padding: 20px;
      background-color: rgb(30, 196, 208);
      width: 400px;
      bottom: 25px;
    }
    h1{
    }

    /* Styles for the reviews */
    .stars {
      font-size: 20px;
    }

    .text {
      margin-top: 0;
    }

    /* Styles for the feedback form */
    .container3 {
      position: absolute;
      max-width: 810px;
      margin: 0 auto;
      padding: 50px;
      font-family: Arial, sans-serif;
      background-color: #b8c0ff;
      left: 700px;
      bottom: 0px;
    }
   
    form h1 {
      font-size: 20px;
      margin-bottom: 10px;
    }

    label {
      display: block;
      margin-bottom: 5px;
    }

    input,
    select,
    textarea {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
      margin-bottom: 10px;
      font-size: 16px;
    }

    textarea {
      resize: vertical;
    }

    button {
      background-color: #4CAF50;
      color: white;
      padding: 12px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
    }

    button:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>
  <div class="container">
  <div id="reviews-container">
    <form action="" method="post" class="container3">
      
      <h1>Feedback</h1>
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" required>

      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required>

      <label for="rating">Rating:</label>
      <select id="rating" name="rating" required>
        <option value="">Select rating</option>
        <option value="5">5 stars</option>
        <option value="4">4 stars</option>
        <option value="3">3 stars</option>
        <option value="2">2 stars</option>
        <option value="1">1 star</option>
      </select>

      <label for="comment">Comment:</label>
      <textarea id="comment" name="comment" rows="4" cols="50" required></textarea>

      <button type="submit" id="submit-button" name="submit-button">Submit Review</button>
  
    </form></div>

    <div class="container1">
      <h1>Latest Reviews</h1>
    </div>

    <div class="container2">
      <h3>Emily Johnson</h3>
      <div class="stars">★★★★★</div>
      <p class="text"> "I absolutely love this dress! The fabric is incredibly soft and comfortable to wear. The fit is perfect, and the stitching is impeccable. The design is also very stylish and versatile. Highly recommended!"</p>
    </div><br>

    <div class="container2">
      <h3>Michael Brown</h3>
      <div class="stars">★★★★★</div>
      <p class="text"> "I recently purchased this T-shirt, and I am quite satisfied with the quality. The fabric is soft, and the stitching is excellent. However, I wish the sizing options were more accurate as the shirt turned out to be slightly smaller than expected."</p>
    </div><br>

    <div class="container2">
      <h3>Sarah Wilson</h3>
      <div class="stars">★★★★★</div>
      <p class="text"> "The trousers look great, and the design is fashionable."</p>
    </div><br>

    <div class="container2">
      <h3>Jane Doe</h3>
      <div class="stars">★★★★☆</div>
      <p class="text"> "The hoodies are beautiful and fit well. The fabric is of good quality, and the colors are vibrant."</p>
    </div><br>
    </div>

<?php
    // Linking footer
    include "footer.php";
  ?>
</body>
</html>