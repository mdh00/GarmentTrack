<?php
//Linking the config file
include "config/DBconnection.php";
//Linking header
include "header.php";

//get the id
$ID = $_GET['updateid'];
$sql = "SELECT * FROM customizedProduct WHERE id=$ID";
//execute
$result = mysqli_query($connection, $sql);
//get row data
$row = mysqli_fetch_assoc($result);
//assigning column datas to new variables that got from row
$colorCode = $row['colorCode'];
$fabricType = $row['fabricType'];
$description = $row['description'];
$quentity = $row['quentity'];

//insert data into database
if (isset($_POST['submit'])) {
    $productName = $_POST["product_name"];
    $size = $_POST["size"];
    $colorCode = $_POST["color"];
    $fabricType = $_POST["fabricType"];
    $description = $_POST["orderDescribe"];
    $unitPrice = $_POST["unit_price"];
    $quentity = $_POST["quentity"];

    //calculate estimated payment
    $estimatedPayment = (int)$quentity * (int)$unitPrice;

    $sql = "UPDATE customizedProduct SET 
        id='$ID',
        productName='$productName',
        size='$size',
        colorCode='$colorCode',
        fabricType='$fabricType',
        description='$description',
        unitPrice='$unitPrice',
        quentity='$quentity',
        estimatedPayment='$estimatedPayment' 
        WHERE id=$ID";

    //execute variable
    $result = mysqli_query($connection, $sql);
    if ($result) {
        //echo "updated successfully";
        header('location:customizeOrderDisplay.php');
    } else {
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
    <title>Update Order Details</title>
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
            display: flex;
            align-items: center;
            justify-content: center;

        }

        .leftSide img {
            border: 5px #52796f;
            border-radius: 5px;
            border-style: inset;
        }

        /* for form design */
        input[type=text],
        .row select,
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: vertical;
        }

        label {
            padding: 12px 12px 12px 0;
            display: inline-block;
        }

        button[type=submit] {
            background-color: #003049;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }

        .columnOne {
            float: left;
            width: 32%;
            margin-top: 6px;
        }

        .columnTwo {
            float: left;
            width: 68%;
            margin-top: 6px;
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

            <form method="post">
                <div class="formTopic">Update Order Details</div>

                <div class="row">
                    <div class="columnOne">
                        <label>Product Name :</label>
                    </div>
                    <div class="columnTwo">
                        <label id="productName"></label>
                        <input type="hidden" id="productNameHidden" name="product_name">

                    </div>
                </div>

                <div class="row">
                    <div class="columnOne">
                        <label>Size :</label>
                    </div>
                    <div class="columnTwo">
                        <input type="radio" name="size" value="small" id="small" required><label for="small">S</label>
                        <input type="radio" name="size" value="medium" id="medium"><label for="medium">M</label>
                        <input type="radio" name="size" value="large" id="large"><label for="large">L</label>
                        <input type="radio" name="size" value="XL" id="XL"><label for="XL">XL</label>
                        <span onclick="window.location ='customMeasurement.php';"><input type="radio" name="size" value="Custom Measurement" id="custom" required><label for="custom">Custom</label></span>
                    </div>
                </div>

                <div class="row">
                    <div class="columnOne">
                        <label>Colour Code :</label>
                    </div>
                    <div class="columnTwo">
                        <input type="text" name="color" required autocomplete="off" value=<?php echo $colorCode; ?>>
                    </div>
                </div>

                <div class="row">
                    <div class="columnOne">
                        <label>Fabric Type :</label>
                    </div>
                    <div class="columnTwo">
                        <select name="fabricType">
                            <option value="Cotton">Cotton</option>
                            <option value="Polyester">Polyester</option>
                            <option value="Linen">Linen</option>
                            <option value="Denim">Denim</option>
                        </select>

                    </div>
                </div>

                <div class="row">
                    <div class="columnOne">
                        <label>Upload Sample Image :</label>
                    </div>
                    <div class="columnTwo">
                        <input type="file" accept="image/*">

                    </div>
                </div>

                <div class="row">
                    <div class="columnOne">
                        <label>Describe about Order :</label>
                    </div>
                    <div class="columnTwo">
                        <textarea name="orderDescribe" id="" cols="30" rows="5" required><?php echo $description; ?></textarea>

                    </div>
                </div>

                <div class="row">
                    <div class="columnOne">
                        <label>Unit Price :</label>
                    </div>
                    <div class="columnTwo">
                        <label id="unitPrice"></label>
                        <input type="hidden" id="priceHidden" name="unit_price">
                    </div>
                </div>

                <div class="row">
                    <div class="columnOne">
                        <label>Quentity :</label>
                    </div>
                    <div class="columnTwo">
                        <input type="text" name="quentity" required autocomplete="off" value=<?php echo $quentity; ?>>
                    </div>
                </div>

                <button type="submit" name="submit">Update</button>

            </form>

        </div>


        <script>
            //get image path from category page
            let imgPath = localStorage.getItem('img-path');
            document.getElementById("choosedImg").src = imgPath;
            //get price from category page
            let price = localStorage.getItem('unit-price');
            document.getElementById("unitPrice").textContent = "Rs." + price;
            document.getElementById("priceHidden").value = price;
            //get productName from category page
            let pname = localStorage.getItem('product-name');
            document.getElementById("productName").textContent = pname;
            document.getElementById("productNameForPicture").textContent = "Product Name - " + pname;
            document.getElementById("productNameHidden").value = pname;
        </script>

    </div>
</body>

</html>

<?php
//Linking footer
include "footer.php";
?>