<?php
//Linking the config file

//Linking header
include "header.php";

//----------------------------------------

$servername = "localhost";
$username = "root";
$password = "";
$database = "garmentTrack";

$connection = new mysqli($servername, $username, $password, $database);

if ($connection->connect_error) {
  die("Connection failed: " . $connection->connect_error);
}

$id = "";
$trackingNo = "";
$orderNo = "";
$customerName = "";
$customerAddress = "";
$customerPhoneNo = "";
$imageName = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

  if (!isset($_GET["id"])) {
    header("location: order.php");
    exit;
  }

  $id = $_GET["id"];

  $sql = "SELECT * FROM orders WHERE id=$id";
  $result = $connection->query($sql);
  $row = $result->fetch_assoc();

  if (!$row) {
    header("location: order.php");
    exit;
  }

  $trackingNo = $row["trackingNo"];
  $orderNo =  $row["orderNo"];
  $customerName =  $row["customerName"];
  $customerAddress =  $row["customerAddress"];
  $customerPhoneNo =  $row["customerPhoneNo"];
  $imageName =  $row["imageName"];
} else {

  $id = $_POST["id"];
  $trackingNo = $_POST["trackingNo"];
  $orderNo =  $_POST["orderNo"];
  $customerName =  $_POST["customerName"];
  $customerAddress =  $_POST["customerAddress"];
  $customerPhoneNo =  $_POST["customerPhoneNo"];
  $imageName =  $_POST["imageName"];

  do {
    if (empty($id) || empty($trackingNo) || empty($orderNo) || empty($customerName) || empty($customerAddress) || empty($customerPhoneNo) || empty($imageName)) {
      $errorMessage = "All the field are required!!!";
      break;
    }

    $sql = "UPDATE orders " .
      "SET trackingNo = '$trackingNo' , orderNo = '$orderNo', customerName = '$customerName', customerAddress = '$customerAddress', customerPhoneNo='$customerPhoneNo' , imageName='$imageName'" .
      "WHERE id = $id";

    $result = $connection->query($sql);

    if (!$result) {
      $errorMessage = "Invalid Query!!";
      break;
    }

    $successMessage = "Order Updated !!!";

    header("location: order.php");
    exit;
  } while (false);
}


?>



<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
  <style>
    .container {
      display: flex;
      flex-direction: column;
      font-family: 'Poppins', sans-serif;

    }

    .main {
      margin-left: auto;
      margin-right: auto;
    }
  </style>
</head>

<body>

  <div class="container">
    <!-- html page content -->



    <?php
    if (!empty($errorMessage)) {
      echo "$errorMessage";
    }

    if (!empty($susscessMessage)) {
      echo "$susscessMessage";
    }

    ?>
    <div class="main">

      <div style="background-color: black; margin-top:30px; padding:10px; text-align: center;">
        <h4 style=" color:white;">Update Order</h4>
      </div>

      <div style="
            background-color: #666699 ;
            border-color: white;
            color:white;
            margin:10px;
            display: flex;
            padding:60px;
            border-top-left-radius: 10px; border-top-right-radius: 10px;border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;
          ">
        <form method="post">
          <br>
          <input type="hidden" name="id" value="<?php echo $id; ?>" />
          <label>
            Tracking No <br>
            <input type="text" style="width: 330px;padding-right: 10px; border: 1px solid #ccc; border-radius: 4px; height: 30px; " name="trackingNo" value="<?php echo $trackingNo; ?>" readOnly />
          </label> <br><br>
          <label>
            Order No<br>
            <input type="text" style="width: 330px;padding-right: 10px; border: 1px solid #ccc; border-radius: 4px; height: 30px; " name="orderNo" value="<?php echo $orderNo; ?>" readOnly />
          </label> <br> <br>
          <label>
            Customer Name <br>
            <input type="text" style="width: 330px;padding-right: 10px; border: 1px solid #ccc; border-radius: 4px; height: 30px; " name="customerName" value="<?php echo $customerName; ?>" />
          </label> <br> <br>
          <label>
            Customer Address <br>
            <input type="text" style="width: 330px;padding-right: 10px; border: 1px solid #ccc; border-radius: 4px; height: 30px; " name="customerAddress" value="<?php echo $customerAddress; ?>" />
          </label> <br> <br>
          <label>
            Customer Phone No <br>
            <input type="number" style="width: 330px;padding-right: 10px; border: 1px solid #ccc; border-radius: 4px; height: 30px; " name="customerPhoneNo" value="<?php echo $customerPhoneNo; ?>" />
          </label> <br> <br>
          <label>
            Image <br>
            <input type="text" style="width: 330px;padding-right: 10px; border: 1px solid #ccc; border-radius: 4px; height: 30px; " name="imageName" value="<?php echo $imageName; ?>" readOnly />
          </label> <br> <br>
          <button type="submit" class="btn btn-dark">Update</button>
        </form>
      </div>

    </div>
  </div>






  <script>
    // js thiyenm methana
  </script>

</body>

</html>

<?php
//Linking footer
include "footer.php";
?>