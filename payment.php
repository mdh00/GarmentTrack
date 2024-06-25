<?php
//Linking the config file
include "config/DBconnection.php";
//Linking header
include "header.php";

$susscessMessage = "";
$errorMessage = "";

//insert data into database
if (isset($_POST['submit'])) {
    $fullName = $_POST["full_name"];
    $email  = $_POST["email "];
    $address = $_POST["address"];
    $cardHolderName = $_POST["name"];
    $cardNo = $_POST["card_number"];
    $expMonth = $_POST["expire_month"];
    $expYear = $_POST["expire_year"];
    $CVV = $_POST["cvv"];
    $totalAmount = $_POST["payment"];

    $sql = "INSERT INTO Payment(fullName,email,address,cardHolderName,cardNo,expMonth,expYear,CVV,totalAmount)
            VALUES('$fullName', '$email', '$address', '$cardHolderName', '$cardNo', '$expMonth', '$expYear', '$CVV', '$totalAmount')";

    //execute variable
    $result = mysqli_query($connection, $sql);
    if ($result) {
        $susscessMessage = "!!!! Successfull Payment !!!";
        header('location:payment.php');
    } else {
        $errorMessage = "!!!! Unsuccessfull Payment !!!";
        die(mysqli_error($connection));
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customize Order</title>
    <style>
        @import url("https://fonts.googleapis.com/css?family=Source+Sans+Pro");

        * {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            outline: none;
            border: none;
            text-transform: capitalize;
            transition: all .2s linear;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 25px;
            min-height: 100vh;
            background: linear-gradient(90deg, #d4e5db 60%, #d4e5db 40.1%);
        }

        .container form {
            padding: 20px;
            width: 700px;
            background: #fff;
            box-shadow: 0 5px 10px rgba(0, 0, 0, .1);
        }

        .container form .row {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }

        .payment-overview {
            position: relative;
            text-align: center;
            background: #ffffff;
            padding: 5%;
            padding-top: 5%px;
            -webkit-border-top-left-radius: 5px;
            -webkit-border-bottom-left-radius: 5px;
            -moz-border-radius-topleft: 5px;
            -moz-border-radius-bottomleft: 5px;
            border-top-left-radius: 5px;
            border-bottom-left-radius: 5px;
        }

        .product-payment {
            font-size: 26px;
            color: #5f5f5f;
        }

        .price-payment {
            font-size: 50px;
            color: #00af6c;
        }

        .container form .row .col {
            flex: 1 1 250px;
        }

        .container form .row .col .title {
            font-size: 20px;
            color: #333;
            padding-bottom: 5px;
            text-transform: uppercase;
        }

        .container form .row .col .inputBox {
            margin: 15px 0;
        }

        .container form .row .col .inputBox span {
            margin-bottom: 10px;
            display: block;
        }

        .container form .row .col .inputBox input {
            width: 100%;
            border: 1px solid #ccc;
            padding: 10px 15px;
            font-size: 15px;
            text-transform: none;
        }

        .container form .row .col .inputBox input:focus {
            border: 1px solid #000;
        }

        .container form .row .col .flex {
            display: flex;
            gap: 15px;
        }

        .container form .row .col .flex .inputBox {
            margin-top: 5px;
        }

        .container form .row .col .inputBox img {
            height: 34px;
            margin-top: 5px;
            filter: drop-shadow(0 0 1px #000);
        }

        .container form .submit-btn {
            width: 100%;
            padding: 12px;
            font-size: 17px;
            background: #457b9d;
            color: #fff;
            margin-top: 5px;
            cursor: pointer;
        }

        .container form .submit-btn:hover {
            background: #006d77;
        }

        #estimatedPrice {
            color: #1d3557;
        }
    </style>
</head>

<body>

    <div class="container">

    <?php
    if (!empty($errorMessage)) {
      echo "<center><h2>$errorMessage</h2></center>";
    }

    if (!empty($susscessMessage)) {
      echo "<center><h2>$susscessMessage</h2></center>";
    }

    ?>

        <form action="">
            <div class="row">
                <div class="col">
                    <div class="col-xs-12 col-sm-5 col-md-4 col-lg-4 col-xlg-4 payment-overview">
                        <p class="product-payment">You’re paying,</p>
                        <p id="estimatedPrice" class="price-payment"></p>

                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col">

                    <h3 class="title">billing address</h3>

                    <div class="inputBox">
                        <span>full name :</span>
                        <input type="text" placeholder="Your Name">
                    </div>
                    <div class="inputBox">
                        <span>email :</span>
                        <input type="email" placeholder="example@example.com">
                    </div>
                    <div class="inputBox">
                        <span>address :</span>
                        <input type="text" placeholder="street, city, district, province, country.">
                    </div>

                </div>

                <div class="col">

                    <h3 class="title">payment</h3>

                    <div class="inputBox">
                        <span>cards accepted :</span>
                        <img src="img/card_img.png" alt="">
                    </div>
                    <div class="inputBox">
                        <span>cardholder’s Name :</span>
                        <input type="text" placeholder="mr. Dinesh Kalhara">
                    </div>
                    <div class="inputBox">
                        <span>credit card number :</span>
                        <input type="number" placeholder="1234-1234-1234-1234">
                    </div>
                    <div class="inputBox">
                        <span>exp month :</span>
                        <input type="text" placeholder="january">
                    </div>

                    <div class="flex">
                        <div class="inputBox">
                            <span>exp year :</span>
                            <input type="number" placeholder="2028">
                        </div>
                        <div class="inputBox">
                            <span>CVV :</span>
                            <input type="text" placeholder="123">
                        </div>
                    </div>

                </div>
            </div>

            <input type="submit" value="Confirm Purchase" class="submit-btn">

        </form>

    </div>


    </div>

    <script>
        //get price from orderDisplay page
        let estimated_Price = localStorage.getItem('payment-value');
        document.getElementById("estimatedPrice").textContent = "Rs. " + estimated_Price;
    </script>
</body>

</html>


<?php
//Linking footer
include "footer.php";
?>