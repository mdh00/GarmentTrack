<?php
//Linking the config file
include "config/DBconnection.php";
//Linking header
include "header.php";
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customized Order Display</title>
    <style>
        .container {
            display: flex;
            flex-direction: row;
            min-height: 100vh;
            font-family: 'Poppins', sans-serif;

        }

        .leftSide {
            float: left;
            width: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #83c5be;
            flex-direction: column;

        }

        .formContainer {
            background-color: #b8c0ff;
            padding: 20px;
            float: right;
            width: 50%;
        }

        .leftSide img {
            border: 5px #52796f;
            border-radius: 5px;
            border-style: inset;
        }

        label {
            padding: 12px 12px 12px 0;
            display: inline-block;
        }

        /* Clear floats after the columns */
        .row::after {
            content: "";
            display: table;
            clear: both;
        }

        form {
            border: 2px black;
            border-style: inset;
            border-radius: 2px;
            padding: 20px;
        }

        .formTopic {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #83c5be;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- page content -->
        <div class="leftSide">
            <div class="pictureName"><label id="productNameForPicture"></label></div>
            <img id="choosedImg" width="400px">
        </div>

        <div class="formContainer">
            <div class="formTopic">
                Your Order Details
            </div>
            <?php
            //read and print the data from database
            $sql = "SELECT id,productName,size,colorCode,fabricType,description,unitPrice,quentity,estimatedPayment
                        FROM customizedProduct 
                        ORDER BY id DESC 
                        limit 1";

            //execute variable
            $result = mysqli_query($connection, $sql);
            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    //get ID value
                    $ID = $row["id"];
                    $productName = $row["productName"];
                    $size = $row["size"];
                    $colorCode = $row["colorCode"];
                    $fabricType = $row["fabricType"];
                    $description = $row["description"];
                    $unitPrice = $row["unitPrice"];
                    $quentity = $row["quentity"];
                    $estimatedPayment = $row["estimatedPayment"];
                    echo    'Product Name : ' . $productName . ' <br><br>
                                Size : ' . $size . ' <br><br>
                                Colour code : ' . $colorCode . ' <br><br>
                                Fabric Type : ' . $fabricType . ' <br><br>
                                Description of the Order : ' . $description . ' <br><br>
                                Unit Price : ' . $unitPrice . ' <br><br>
                                Quentity : ' . $quentity . ' <br><br>
                                <label style="color:#8f2d56;">Estimated Payment</label> : ' . 'Rs. ' . $estimatedPayment . ' <br><br>
                                

                                
                                <button style="background-color: #003049;
                                padding: 12px 20px;
                                border: none;
                                border-radius: 4px;
                                cursor: pointer;
                                
                                text-decoration:none;">                                
                                <a href="customizeOrderDelete.php?deleteid=' . $ID . '" style="text-decoration:none; color: white;">Delete & Move to Categories</a>
                                </button>
                                <br><br>

                                
                                <button style="background-color: #003049;
                                padding: 12px 20px;
                                border: none;
                                border-radius: 4px;
                                cursor: pointer;
                                
                                text-decoration:none;">

                                <a href="customizeOrderUpdate.php?updateid=' . $ID . '" style="text-decoration:none; color: white;">Update Details</a>
                                </button>
                                <br><br>

                                <button style="background-color: #003049;
                                padding: 12px 20px;
                                border: none;
                                border-radius: 4px;
                                cursor: pointer;
                                text-decoration:none;">

                                <a href="payment.php" style="text-decoration:none; color: white;">Confirm & Pay</a>
                                </button>';
                }
            }

            ?>


        </div>

        <script>
            //get image path from category page
            let imgPath = localStorage.getItem('img-path');
            document.getElementById("choosedImg").src = imgPath;
            //get productName from category page
            let pname = localStorage.getItem('product-name');
            document.getElementById("productNameForPicture").textContent = "Product Name - " + pname;
            //pass estimatedPrice value to payment page
            let paymentValue = "<?php echo $estimatedPayment; ?>";
            localStorage.setItem('payment-value', paymentValue);
        </script>

    </div>
</body>

</html>

<?php
//Linking footer
include "footer.php";
?>