<!DOCTYPE html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        .card {
            z-index: 0;
            background-color: #ECEFF1;
            padding-bottom: 20px;
            margin-top: 90px;
            margin-bottom: 90px;
            border-radius: 10px;
        }

        .top {
            padding-top: 40px;
            padding-left: 13% !important;
            padding-right: 13% !important;
        }

        /*Icon progressbar*/
        #progressbar {
            margin-bottom: 30px;
            overflow: hidden;
            color: #455A64;
            padding-left: 0px;
            margin-top: 30px;
        }

        #progressbar li {
            list-style-type: none;
            font-size: 13px;
            width: 25%;
            float: left;
            position: relative;
            font-weight: 400;
        }

        #progressbar .step0:before {
            font-family: FontAwesome;
            content: "\f10c";
            color: #455A64;
        }

        #progressbar li:before {
            width: 40px;
            height: 40px;
            line-height: 45px;
            display: block;
            font-size: 20px;
            background: #C5CAE9;
            border-radius: 50%;
            margin: auto;
            padding: 0px;
        }

        /*ProgressBar connectors*/
        #progressbar li:after {
            content: '';
            width: 100%;
            height: 12px;
            background: #C5CAE9;
            position: absolute;
            left: 0;
            top: 16px;
            z-index: -1;
        }

        #progressbar li:last-child:after {
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px;
            position: absolute;
            left: -50%;
        }

        #progressbar li:nth-child(2):after,
        #progressbar li:nth-child(3):after {
            left: -50%;
        }

        #progressbar li:first-child:after {
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px;
            position: absolute;
            left: 50%;
        }

        #progressbar li:last-child:after {
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px;
        }

        #progressbar li:first-child:after {
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px;
        }

        /*Color number of the step and the connector before it*/
        #progressbar li.active:before,
        #progressbar li.active:after {
            background: #651FFF;
        }

        #progressbar li.active:before {
            font-family: FontAwesome;
            content: "\f00c";
        }
    </style>

</head>

<body>

    <?php
    include 'header.php';
    ?>









    <div style="background: linear-gradient(to bottom, white , #c0c0c0 , #808080 )">
        <br>
        <div style="background-color: black; border-top-left-radius: 10px; border-top-right-radius: 10px;border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;  width:20%; margin-left:520px">
            <h2 style="text-align: center;color:white;">All Orders</h2>
        </div>


        <?php

        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "garmentTrack";

        $connection = new mysqli($servername, $username, $password, $database);

        if ($connection->connect_error) {
            die("Connection Fails" . $connection->connect_error);
        }

        $sql = "SELECT * FROM orders";
        $result = $connection->query($sql);

        if (!$result) {
            die("Connection Error");
        }

        while ($row = $result->fetch_assoc()) {
            echo "
        <div class='card' style='width: 28rem; margin-left:50px'>
    <img class='card-img-top' src='img/$row[imageName]' alt='Card image cap' />
                <div class='card-body'>
                <h5 class='card-title'>Order Detials</h5>
                <p>Tracking No - $row[trackingNo]<br>
                    Order No - $row[orderNo]<br>
                    Customer Name - $row[customerName]<br>
                    Customer Address - $row[customerAddress]<br>
                    Customer Phone Number - $row[customerPhoneNo]<br>
                </p>
                <a href='orderEdit.php?id=$row[id]' class='btn btn-primary' style='padding:10px; margin-right:40px'>Edit</a>
                <a href='deleteOrder.php?id=$row[id]' class='btn btn-danger'  style='padding:10px; margin-right:40px'>Delete</a>
                <button id='showButton' class='btn btn-warning' style='padding:10px; margin-right:40px'>Track Order</button>
                
                </div>
            </div>
            <div id='content1' style='display: none;'>
  
            <div style='margin-top: -600px; width:55%; margin-left:550px'>
            <div class='container px-1 px-md-4 py-5 mx-auto'>
             <div class='card'>
                 <div class='row d-flex justify-content-between px-3 top'>
                     <div class='d-flex flex-column text-sm-right'>
                         <p class='mb-0'>Expected Arrival <span>01/12/19</span></p>
                     </div>
                 </div>
                 <!-- Add class 'active' to progress -->
                 <div class='row d-flex justify-content-center'>
                     <div class='col-12'>
                     <ul id='progressbar' class='text-center'>
                         <li class='active step0'>Place Order</li>
                         <li class='active step0'>Order In Progress</li>
                         <li class='active step0'>Order Shiped</li>
                         <li class='step0'>Order Delivered</li>
                     </ul>
                     </div>
                 </div>
                 
             </div>
         </div>
             </div>
                        
             </div>
            
        ";
        }
        ?>
        <div style=" margin-left:1100px">
            <button class="btn btn-info">Give a Review</button>
        </div><br>
    </div>

    <?php
    include 'footer.php';
    ?>






    <script>
        // Get the show button and the content div
        var showButton = document.getElementById("showButton");
        var contentDiv = document.getElementById("content1");

        // Add event listener to show button
        showButton.addEventListener("click", function() {
            // Toggle the display of the content div
            if (contentDiv.style.display === "none") {
                contentDiv.style.display = "block";
            } else {
                contentDiv.style.display = "none";
            }
        });
    </script>
</body>