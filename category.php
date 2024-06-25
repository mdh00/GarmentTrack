<?php
//Linking the config file
require "config/DBconnection.php";
//Linking footer
include_once "header.php";
?>

<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;900&display=swap" rel="stylesheet">

    <style>
        body {
            background-color: #ced4da;
            font-family: 'Poppins', sans-serif;
        }

        .product {
            position: relative;
            overflow: hidden;
            padding: 20 px;

        }

        .product-category {
            padding: 0 10vw;
            font-size: 30px;
            font-weight: 300px;
            margin-bottom: 40px;
            text-transform: capitalize;
            padding-top: 25px;
            color: #343a40;
        }

        .product-container {
            padding: 0 10vw;
            display: flex;
            overflow-x: auto;
            scroll-behavior: smooth;
        }

        .product-container::-webkit-scrollbar {
            display: none;
        }

        .product-card {
            flex: 0 0 auto;
            width: 250px;
            height: 460px;
            margin-right: 40px;
        }

        .product-image {
            position: relative;
            width: 100%;
            height: 350px;
            overflow: hidden;
        }

        .product-thumb {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .card-btn {
            position: absolute;
            bottom: 10px;
            left: 50%;
            transform: translateX(-50%);
            padding: 10px;
            width: 90%;
            text-transform: capitalize;
            border: none;
            outline: none;
            background: #fff;
            border-radius: 5px;
            transition: 0.5s;
            cursor: pointer;
            opacity: 0;
        }

        .product-card:hover .card-btn {
            opacity: 1;
        }

        .card-btn:hover {
            background: #ff7d7d;
            color: #fff;
        }

        .product-info {
            width: 100%;
            height: 100px;
            padding-top: 10px;
        }

        .product-brand {
            text-transform: uppercase;
        }

        .product-short-description {
            width: 100%;
            height: 20px;
            line-height: 20px;
            overflow: hidden;
            opacity: 0.5;
            text-transform: capitalize;
            margin: 5px 0;
        }

        .price {
            font-weight: 900;
            font-size: 20px;
        }

        .pre-btn,
        .nxt-btn {
            border: none;
            width: 10vw;
            height: 100%;
            position: absolute;
            top: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(90deg, rgba(255, 255, 255, 0) 0%, #fff 100%);
            cursor: pointer;
            z-index: 8;
        }

        .pre-btn {
            left: 0;
            transform: rotate(180deg);
        }

        .nxt-btn {
            right: 0;
        }

        .pre-btn img,
        .nxt-btn img {
            opacity: 0.2;
        }

        .pre-btn:hover img,
        .nxt-btn:hover img {
            opacity: 1;
        }

        .collection-container {
            width: 100%;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            grid-gap: 10px;
        }

        .collection {
            position: relative;
        }

        .collection img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .collection p {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: #fff;
            font-size: 50px;
            text-transform: capitalize;
        }

        .collection:nth-child(3) {
            grid-column: span 2;
            margin-bottom: 10px;
        }

        .heading {
            color: #212529;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #8ecae6;
            padding: 15px;
            font-size: 30px;
            text-transform: uppercase;
        }
    </style>

</head>

<body>
    <div class="heading">Product Categories</div>

    <section class="product">

        <h2 class="product-category" id="gents">Gents</h2>
        <button class="pre-btn"><img src="img/arrow.png" alt=""></button>
        <button class="nxt-btn"><img src="img/arrow.png" alt=""></button>
        <div class="product-container">

            <div class="product-card">
                <div class="product-image">
                    <img src="img/category/gentsTshirt.jpg" class="product-thumb" alt="" id="gentsTshirt-img">
                    <button class="card-btn" id="gentsTshirt" onclick="catchID(this.id)">Customize</button>
                </div>
                <div class="product-info">
                    <h2 class="product-brand">t-shirts</h2>
                    <p class="product-short-description">Unit Price: Rs.<span id="gentsTshirt-price">4500</span></p>
                </div>
            </div>
            <div class="product-card">
                <div class="product-image">
                    <img src="img/category/gentsShirt.jpg" class="product-thumb" alt="" id="gentsShirt-img">
                    <button class="card-btn" id="gentsShirt" onclick="catchID(this.id)">Customize</button>
                </div>
                <div class="product-info">
                    <h2 class="product-brand">shirts</h2>
                    <p class="product-short-description">Unit Price: Rs.<span id="gentsShirt-price">5000</span></p>
                </div>
            </div>
            <div class="product-card">
                <div class="product-image">
                    <img src="img/category/gentsJeans.jpg" class="product-thumb" alt="" id="gentsJeans-img">
                    <button class="card-btn" id="gentsJeans" onclick="catchID(this.id)">Customize</button>
                </div>
                <div class="product-info">
                    <h2 class="product-brand">jeans</h2>
                    <p class="product-short-description">Unit Price: Rs.<span id="gentsJeans-price">6300</span></p>
                </div>
            </div>
            <div class="product-card">
                <div class="product-image">
                    <img src="img/category/gentsShort.jpg" class="product-thumb" alt="" id="gentsShort-img">
                    <button class="card-btn" id="gentsShort" onclick="catchID(this.id)">Customize</button>
                </div>
                <div class="product-info">
                    <h2 class="product-brand">shorts</h2>
                    <p class="product-short-description">Unit Price: Rs.<span id="gentsShort-price">3500</span></p>
                </div>
            </div>
            <div class="product-card">
                <div class="product-image">
                    <img src="img/category/gentsHoodie.jpg" class="product-thumb" alt="" id="gentsHoodie-img">
                    <button class="card-btn" id="gentsHoodie" onclick="catchID(this.id)">Customize</button>
                </div>
                <div class="product-info">
                    <h2 class="product-brand">hoodie</h2>
                    <p class="product-short-description">Unit Price: Rs.<span id="gentsHoodie-price">6000</span></p>
                </div>
            </div>
        </div>
    </section>


    <section class="product">
        <h2 class="product-category" id="ladies">Ladies</h2>
        <button class="pre-btn"><img src="img/arrow.png" alt=""></button>
        <button class="nxt-btn"><img src="img/arrow.png" alt=""></button>
        <div class="product-container">

            <div class="product-card">
                <div class="product-image">
                    <img src="img/category/ladiesFrog.jpg" class="product-thumb" alt="" id="ladiesFrog-img">
                    <button class="card-btn" id="ladiesFrog" onclick="catchID(this.id)">Customize</button>
                </div>
                <div class="product-info">
                    <h2 class="product-brand">frock</h2>
                    <p class="product-short-description">Unit Price: Rs.<span id="ladiesFrog-price">3100</span></p>
                </div>
            </div>
            <div class="product-card">
                <div class="product-image">
                    <img src="img/category/ladiesBlouse.jpg" class="product-thumb" alt="" id="ladiesBlouse-img">
                    <button class="card-btn" id="ladiesBlouse" onclick="catchID(this.id)">Customize</button>
                </div>
                <div class="product-info">
                    <h2 class="product-brand">blouse</h2>
                    <p class="product-short-description">Unit Price: Rs.<span id="ladiesBlouse-price">2750</span></p>
                </div>
            </div>
            <div class="product-card">
                <div class="product-image">
                    <img src="img/category/ladiesJeans.jpg" class="product-thumb" alt="" id="ladiesJeans-img">
                    <button class="card-btn" id="ladiesJeans" onclick="catchID(this.id)">Customize</button>
                </div>
                <div class="product-info">
                    <h2 class="product-brand">jeans</h2>
                    <p class="product-short-description">Unit Price: Rs.<span id="ladiesJeans-price">3950</span></p>
                </div>
            </div>
            <div class="product-card">
                <div class="product-image">
                    <img src="img/category/ladiesShorts.jpg" class="product-thumb" alt="" id="ladiesShorts-img">
                    <button class="card-btn" id="ladiesShorts" onclick="catchID(this.id)">Customize</button>
                </div>
                <div class="product-info">
                    <h2 class="product-brand">shorts</h2>
                    <p class="product-short-description">Unit Price: Rs.<span id="ladiesShorts-price">2750</span></p>
                </div>
            </div>
            <div class="product-card">
                <div class="product-image">
                    <img src="img/category/ladiesSkirt.jpg" class="product-thumb" alt="" id="ladiesSkirt-img">
                    <button class="card-btn" id="ladiesSkirt" onclick="catchID(this.id)">Customize</button>
                </div>
                <div class="product-info">
                    <h2 class="product-brand">skirts</h2>
                    <p class="product-short-description">Unit Price: Rs.<span id="ladiesSkirt-price">3150</span></p>
                </div>
            </div>
        </div>
    </section>


    <section class="product">
        <h2 class="product-category" id="kids">Kids</h2>
        <button class="pre-btn"><img src="img/arrow.png" alt=""></button>
        <button class="nxt-btn"><img src="img/arrow.png" alt=""></button>
        <div class="product-container">

            <div class="product-card">
                <div class="product-image">
                    <img src="img/category/kidsTshirt.jpg" class="product-thumb" alt="" id="kidsTshirt-img">
                    <button class="card-btn" id="kidsTshirt" onclick="catchID(this.id)">Customize</button>
                </div>
                <div class="product-info">
                    <h2 class="product-brand">tshirt</h2>
                    <p class="product-short-description">Unit Price: Rs.<span id="kidsTshirt-price">2100</span></p>
                </div>
            </div>
            <div class="product-card">
                <div class="product-image">
                    <img src="img/category/kidsShirt.jpg" class="product-thumb" alt="" id="kidsShirt-img">
                    <button class="card-btn" id="kidsShirt" onclick="catchID(this.id)">Customize</button>
                </div>
                <div class="product-info">
                    <h2 class="product-brand">shirt</h2>
                    <p class="product-short-description">Unit Price: Rs.<span id="kidsShirt-price">2500</span></p>
                </div>
            </div>
            <div class="product-card">
                <div class="product-image">
                    <img src="img/category/kidsJeans.jpg" class="product-thumb" alt="" id="kidsJeans-img">
                    <button class="card-btn" id="kidsJeans" onclick="catchID(this.id)">Customize</button>
                </div>
                <div class="product-info">
                    <h2 class="product-brand">jeans</h2>
                    <p class="product-short-description">Unit Price: Rs.<span id="kidsJeans-price">2750</span></p>
                </div>
            </div>
            <div class="product-card">
                <div class="product-image">
                    <img src="img/category/kidsShorts.jpg" class="product-thumb" alt="" id="kidsShorts-img">
                    <button class="card-btn" id="kidsShorts" onclick="catchID(this.id)">Customize</button>
                </div>
                <div class="product-info">
                    <h2 class="product-brand">shorts</h2>
                    <p class="product-short-description">Unit Price: Rs.<span id="kidsShorts-price">1950</span></p>
                </div>
            </div>
            <div class="product-card">
                <div class="product-image">
                    <img src="img/category/kidsHoodie.jpg" class="product-thumb" alt="" id="kidsHoodie-img">
                    <button class="card-btn" id="kidsHoodie" onclick="catchID(this.id)">Customize</button>
                </div>
                <div class="product-info">
                    <h2 class="product-brand">hoodie</h2>
                    <p class="product-short-description">Unit Price: Rs.<span id="kidsHoodie-price">2500</span></p>
                </div>
            </div>
        </div>
    </section>





    <script>
        const productContainers = [...document.querySelectorAll('.product-container')];
        const nxtBtn = [...document.querySelectorAll('.nxt-btn')];
        const preBtn = [...document.querySelectorAll('.pre-btn')];

        productContainers.forEach((item, i) => {
            let containerDimensions = item.getBoundingClientRect();
            let containerWidth = containerDimensions.width;

            nxtBtn[i].addEventListener('click', () => {
                item.scrollLeft += containerWidth;
            })

            preBtn[i].addEventListener('click', () => {
                item.scrollLeft -= containerWidth;
            })
        })
    </script>
    <script src="category.js"></script>

    <span id="here"></span>
</body>
<br>

</html>

<?php
include_once "footer.php";
?>