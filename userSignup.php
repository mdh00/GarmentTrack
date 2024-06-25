<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "garmentTrack";

//create connection 
$connection = new mysqli($servername, $username, $password, $database);

$firstName = "";
$middleName = "";
$lastName = "";
$address = "";
$email = "";
$phoneNumber = "";
$password = "";

$errorMessage = "";
$susscessMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $firstName = $_POST["firstName"];
  $middleName = $_POST["middleName"];
  $lastName = $_POST["lastName"];
  $address = $_POST["address"];
  $email = $_POST["email"];
  $phoneNumber = $_POST["phoneNumber"];
  $password = $_POST["password"];

  do {
    if (empty($firstName) || empty($middleName) || empty($lastName) || empty($address) || empty($email) || empty($phoneNumber) || empty($password)) {
      $errorMessage = "All the fields are required!!";
      break;
    }

    //add new user 
    $sql = "INSERT INTO users (firstName,middleName,lastName,address,email,phoneNumber,password)" .
      "VALUES ('$firstName','$middleName','$lastName','$address', '$email' , '$phoneNumber', '$password')";
    $result = $connection->query($sql);

    if (!$result) {
      $errorMessage = "Invalid Query";
      break;
    }

    $firstName = "";
    $middleName = "";
    $lastName = "";
    $address = "";
    $email = "";
    $phoneNumber = "";
    $password = "";

    $susscessMessage = "User Added !!";
    header('location:index.php');
  } while (false);
}
?>

<!DOCTYPE html>

<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />

</head>

<body>
  
    <br>
  <div style="background: linear-gradient(to bottom, white , #c0c0c0 , #808080 )">
    <div style="background-color: black; border-top-left-radius: 10px; border-top-right-radius: 10px;border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;  width:20%; margin-left:520px">
      <h3 style="text-align: center; color:white;">User Sign Up</h3>
    </div><br><br><br><br>
    <?php
    if (!empty($errorMessage)) {
      echo "$errorMessage";
    }

    if (!empty($susscessMessage)) {
      echo "$susscessMessage";
    }

    ?>
    <div style="width: 35%">
      <div style="background-color: #778899 ; margin-left: 40px; border-top-left-radius: 10px; border-top-right-radius: 10px;border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;">
        <br /><br />
        <h1 style="text-align: center">Garment Track</h1>
        <br />
        <p style="text-align: justify; padding-left:15px; padding-right:15px">

          Indulge in the world of fashion and explore our meticulously curated collection
          of garments. Embrace the perfect blend of timeless elegance and contemporary style
          as you browse through our wide range of clothing options. From casual classics to
          formal statement pieces, we offer a diverse selection that caters to every occasion
          and personal taste. Our garments are crafted with utmost care, ensuring superior
          quality and a flawless fit that accentuates your unique beauty. Join our community
          of fashion enthusiasts by signing up today and unlock exclusive offers and also personalized
          recommendations, and a delightful shopping experience. Discover the joy of
          expressing your individuality through our exceptional garments and elevate
          your style to new heights.
        </p>
        <br /><br />
      </div>
      <br /><br />

    </div><br><br><br><br>
    <div style="
        background-color: #666699 ;
        border-color: white;
        color:white;
        width: 50%;
        justify-content: center;
        display: flex;
        margin-left: 550px;
        margin-top: -700px;
        border-top-left-radius: 10px; border-top-right-radius: 10px;border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;
      ">
      <form method="post">
        <br>
        <label>
          Full Name <br /><br />
          <input type="text" style="padding-right: 10px; border: 1px solid #ccc; border-radius: 4px; height: 30px; width: 200px;" name="firstName" value="<?php echo $firstName; ?>" />
          <input type="text" style="padding-right: 10px; border: 1px solid #ccc; border-radius: 4px; height: 30px; width: 200px;" name="middleName" value="<?php echo $middleName; ?>" />
          <input type="text" style="padding-right: 10px; border: 1px solid #ccc; border-radius: 4px; height: 30px; width: 200px;" name="lastName" value="<?php echo $lastName; ?>"><br />
          <label style="margin-left: 60px">First Name</label>
          <label style="margin-left: 120px">Middle Name</label>
          <label style="margin-left: 110px">Last Name</label>
        </label><br /><br />
        <label>
          Address<br /><br />
          <input type="text" style="width: 600px;padding-right: 10px; border: 1px solid #ccc; border-radius: 4px; height: 30px; " name="address" value="<?php echo $address; ?>" />
        </label><br /><br />
        <label>
          Email<br /><br />
          <input type="email" style="width: 600px;padding-right: 10px; border: 1px solid #ccc; border-radius: 4px; height: 30px; " name="email" value="<?php echo $email; ?>" />
        </label><br /><br />
        <label>
          Phone Number<br /><br />
          <input type="number" style="width: 600px;padding-right: 10px; border: 1px solid #ccc; border-radius: 4px; height: 30px;" name="phoneNumber" value="<?php echo $password; ?>" />
        </label><br /><br />
        <label>
          Password<br /><br />
          <input type="password" style="width: 600px;padding-right: 10px; border: 1px solid #ccc; border-radius: 4px; height: 30px;" name="password" value="<?php echo $password; ?>" />
        </label><br /><br />
        <button type="submit" class="btn btn-dark">Sign Up</button>
        <br /><br />
      </form>
    </div>
    <br> <br>
    <div style="text-align: center; margin-left:-820px; margin-top:-60px">
      Already have an account?<br />
      <a href="index.php">sign in</a>
  </div>
</body>