<?php
//Linking the config file
require "config/DBconnection.php";
//Linking header
include_once "header.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home Page</title>
  <link rel="stylesheet" href="./styles/carousel.css">
  <style>
    .container {
      display: flex;
      flex-direction: column;
      min-height: 100vh;
      font-family: 'Poppins', sans-serif;
    }

    h2 {

      color: black;
      font-size: 70px;
      letter-spacing: 0px;
      font-weight: bold;
    }

    .garment {
      width: 560px;
      height: 500px;
    }

    button:hover {
      background-color: #005f73;
    }

    .middle {
      display: flex;
      flex-direction: row;
      min-height: 100vh;
      font-family: 'Poppins', sans-serif;
    }

    .middle_left {
      float: left;
      width: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      background-color: #354f52;


    }

    button {
      background-color: #003049;
      color: white;
      padding: 12px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-weight: bold;

    }

    .middle_right {
      background-color: #b8c0ff;
      padding: 20px;
      float: right;
      width: 50%;
      display: flex;
      flex-direction: column;
    }

    .categorie {

      display: flex;
      flex-direction: row;
      margin-top: 30px;
    }

    .categorie_name {
      margin-right: 20px;
      margin-top: 5px;
      font-weight: bold;
    }

    .description {
      margin-top: 30px;
    }

    .move_button {
      margin-top: 30px;
    }

    #move {
      padding: 20px;
    }

    .cat_button {
      margin-right: 10px;
    }
  </style>
</head>

<body id="home">

  <div class="container">

    <!--carousel-->
    <div class="carousel-container">
      <!-- Slideshow container -->
      <div class="slideshow-container">

        <!-- Full-width images with number and caption text -->
        <div class="mySlides fade">
          <img src="./img/home/shirt.jpg" style="width:100%">
        </div>

        <div class="mySlides fade">
          <img src="./img/home/dress.jpg" style="width:100%">
        </div>

        <div class="mySlides fade">
          <img src="./img/home/pant.jpg" style="width:100%">
        </div>

        <!-- Next and previous buttons -->
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
      </div>

      <div class="middle">

        <!-- Add image -->
        <div class="middle_left">
          <img src="./img/home/newGarment.png" alt="garment1" class="garment">
        </div>

        <div class="middle_right">
          <div>
            <h2>OUR NEWLY DESIGNED GARMENTS</h2>
          </div>
          <div class="description">
            Welcome to our newly designed garments! Get ready to unleash your creativity
            and design your dream outfit. Click the "Move to Products" button below to
            explore our wide range of customizable clothing options. From trendy tops to
            stylish bottoms and chic dresses, we have something for everyone. Let's bring
            your fashion vision to life with just a click. Start customizing now and
            make a statement with your personalized style!
          </div>
          <div class="categorie">
            <div class="categorie_name">
              Categories -
            </div>

            <div>
              <a href="category.php#gents"><button class="cat_button">GENTS</button></a>
              <a href="category.php#ladies"><button class="cat_button">LADIES</button></a>
              <a href="category.php#kids"><button class="cat_button">KIDS</button></a>
            </div>
          </div>

          <div class="move_button">
            <a href="category.php"><button id="move"> Move to Products </button></a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--carousel js-->
  <script>
    let slideIndex = 1;
    let autoSlideTimeout;

    showSlides(slideIndex);

    function plusSlides(n) {
      clearTimeout(autoSlideTimeout);
      showSlides(slideIndex += n);
    }

    function showSlides(n) {
      let i;
      let slides = document.getElementsByClassName("mySlides");
      if (n > slides.length) {
        slideIndex = 1
      }
      if (n < 1) {
        slideIndex = slides.length
      }
      for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
      }
      slides[slideIndex - 1].style.display = "block";
      slideIndex++;
      if (slideIndex > slides.length) {
        slideIndex = 1
      }
      autoSlideTimeout = setTimeout(showSlides, 5000, slideIndex);
    }
  </script>
</body>
</html>

<?php
include_once "footer.php";
?>