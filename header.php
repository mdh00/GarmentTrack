<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/headerFooter.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">

</head>

<body>

    <div class="header_navbar">

        <div class="header_logo">
            <div>Garment Tracker</div>
        </div>

        <div class="header_menu-bar">
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="category.php">Products</a></li>
                <li><a href="review.php">Reviews</a></li>
                <li><a href="contact_us.php">Contact</a></li>
                <li><a href="faqs.php">FAQs</a></li>
            </ul>
        </div>

        <div class="header_last">

            <select name="User" id="select-id" class="header_select" onchange="location=this.value;">
                <option disabled selected value="0">User</option>
                <option value="home.php" id="home">Home</option>
                <option value="order.php" id="orders">My Orders</option>
            </select>

        </div>

    </div>





</body>

</html>