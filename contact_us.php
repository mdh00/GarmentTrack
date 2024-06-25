<?php
// Linking the config file
include "config/DBconnection.php";
// Linking header
include "header.php";

if (isset($_POST['submit'])) {
    // Retrieve form data
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['phone_number'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Prepare and execute the SQL statement to insert the contact into the database
    $sql = "INSERT INTO contactform (first_name, last_name, email, phone_number, subject, message) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("ssssss", $firstName, $lastName, $email, $phoneNumber, $subject, $message);

    if ($stmt->execute()) {
        header('Location: contact_us.php');
        exit();
    } else {
        die($stmt->error);
    }

    $stmt->close();
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title> Contact </title>




    <style>
        .container {

            justify-content: center;

            min-height: 100vh;
            font-family: 'Poppins', sans-serif;
            align-items: center;
            background-color: #d6d2d2;
        }


        .contact {
            position: relative;
            min-height: 100vh;
            padding: 50px 100px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;

            background-size: cover;
        }

        .contact .content {
            max-width: 800px;
            text-align: center;

        }

        .contact .content h2 {
            font-size: 36px;
            font-weight: 500;
            color: #333;
        }

        .contact .content p {
            font-weight: 300;
            color: #333;
        }

        .container2 {
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 30px;
        }

        .container2 .contactInfo {
            width: 50%;
            display: flex;
            flex-direction: column;
        }

        .container2 .contactInfo .box {
            position: relative;
            padding: 20px 0;
            display: flex;
        }

        .container2 .contactInfo .box .icon {
            min-width: 60px;
            height: 60px;
            background: white;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 50%;
            font-size: 22px;
        }

        .container2 .contactInfo .box .text {
            display: flex;
            margin-left: 20px;
            font-size: 16px;
            color: #333;
            flex-direction: column;
            font-weight: 300;
        }

        .container2 .contactInfo .box .text h3 {
            font-weight: 500;
            color: #333;
        }

        .contactForm {
            width: 40%;
            padding: 40px;
            background: #fff;
        }

        .contactForm h2 {
            font-size: 30px;
            color: #333;
            font-weight: 500;

        }

        .contactForm .inputBox {
            position: relative;
            width: 100%;
            margin-top: 10px;
        }

        .contactForm .inputBox input,
        .contactForm .inputBox button,
        .contactForm .inputBox textarea {
            width: 100%;
            padding: 5px 0;
            font-size: 16px;
            margin: 10px 0;
            border: none;
            border-bottom: 2px solid #333;
            outline: none;
            resize: none;
        }

        .contactForm .inputBox span {
            position: absolute;
            left: 0;
            padding: 5px 0;
            font-size: 16px;
            margin: 10px 0;
            pointer-events: none;
            transition: 0.5s;
            color: #333;
        }

        .contactForm .inputBox input:focus~span,
        .contactForm .inputBox input:valid~span,
        .contactForm .inputBox textarea:focus~span,
        .contactForm .inputBox textarea:valid~span {
            color: #333;
            font-size: 12px;
            transform: translateY(-20px);
        }

        .contactForm .submit {
            width: 100%;
            background: #005f73;
            color: white;
            border: none;
            cursor: pointer;
            padding: 4px;
            font-size: 18px;
            font-weight: bold;
        }

        .contactForm .submit:hover {
            background: #006d77;
        }

        @media (max-width: 991px) {
            .contact {
                padding: 50px;
            }

            .container {
                flex-direction: column;
            }

            .container .contactInfo {
                margin-bottom: 40px;
            }

            .container .contactInfo,
            .contactForm {
                width: 100%;
            }
        }
    </style>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">


</head>

<body>
    <div class="container">
        <section class="contact">
            <div class="content">
                <h2>Contact Information</h2>
                <br />
                <p>GarmentTrack is a unique website that provides a complete solution for <br />
                    managing large orders, customization, order tracking, and payments in the garment and textile industries.<br />
                    Whether you're a garment producer, retailer, or fashion enthusiast,<br />
                    our website is created to simplify processes and improve business efficiency.</p>
            </div>
            <div class="container2">
                <div class="contactInfo">
                    <div class="box">
                        <div class="icon"><i class="fas fa-phone" aria-hidden="true"></i></div>
                        <div class="text">
                            <h3>Phone Number</h3>
                            <p>011 1234567</p>
                        </div>
                    </div>

                    <div class="box">
                        <div class="icon"><i class="fas fa-envelope" aria-hidden="true"></i></div>
                        <div class="text">
                            <h3>Email</h3>
                            <p>GarmentTrack@gmail.com</p>
                        </div>
                    </div>


                    <div class="box">
                        <div class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i>
                        </div>
                        <div class="text">
                            <h3>Address</h3>
                            <p>GarmentTrack Pvt(Ltd), <br />67/B, <br />Ratmalana, <br /> Mount Lavinia.</p>
                        </div>
                    </div>
                </div>
                <div class="contactForm">
                    <form method="POST" action="">
                        <h2>Send Message</h2>
                        <div class="inputBox">
                            <input type="text" name="first_name" required="required">
                            <span>First Name</span>
                        </div>
                        <div class="inputBox">
                            <input type="text" name="last_name" required="required">
                            <span>Last Name</span>
                        </div>
                        <div class="inputBox">
                            <input type="text" name="email" required="required">
                            <span>Email</span>
                        </div>
                        <div class="inputBox">
                            <input type="text" name="phone_number" required="required">
                            <span>Phone Number</span>
                        </div>
                        <div class="inputBox">
                            <input type="text" name="subject" required="required">
                            <span>General Inquiry or Special Inquiry</span>
                        </div>
                        <div class="inputBox">
                            <textarea name="message" required="required"></textarea>
                            <span>Type your message</span>
                        </div>
                        <div class="submit">
                            <button type="submit" class="submit" name="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
    </div>
    </section>
    </div>
</body>

</html>

<?php
//Linking footer
include "footer.php";
?>