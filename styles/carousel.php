<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="../styles/carousel.css">

</head>

<body id="home"><div class="carousel-container">

<!--header-->
<?php
	include 'header.php';
?>

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
<br>

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
        if (n > slides.length) { slideIndex = 1 }
        if (n < 1) { slideIndex = slides.length }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slides[slideIndex - 1].style.display = "block";
        slideIndex++;
        if (slideIndex > slides.length) { slideIndex = 1 }
        autoSlideTimeout = setTimeout(showSlides, 5000, slideIndex);
    }
</script>


    <h2>OUR NEWLY </h2> <h2>DESIGNED GARMENTS</h2>

<!--garments photos-->
<div style="position: relative;">
  <img src="./img/home/p1.jpg" alt="garment1" class="image-size" style="top: 200px; left: 400px;">
  <!--<img src="./img/home/p2.jpg" alt="garment2" class="image-size" style="position: absolute; top: 350px; left: 300px;">
  <img src="./img/home/p3.jpg" alt="garment3" class="image-size" style="position: absolute; top: 100px; left: 100px;">-->
  <img src="./img/home/p4.jpg" alt="garment3" class="image-size" style="top: 390px; left: 150px;">
</div>


<!--move to products button-->
<a href="#" class="big-button">
    <i class="fa fa-plus"></i> Move to Products
  </a>

<br>
</body>
</html>