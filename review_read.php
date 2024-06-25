<?php
// Linking the config file
require "config/DBconnection.php";
// Linking header
include_once "header.php";
?>



<!DOCTYPE html>
<html>

<head>
    <title>Display feedback</title>
    <style>

.container {
  display: flex;
        flex-direction: column;
        min-height: 100vh;
        font-family: 'Poppins', sans-serif;
        background-color: #d6d2d2;
        }




        #feedbackTable {
            margin: 0 auto;
            width: 80%;
            border-collapse: collapse;
        }

        #feedback th,
        #feedbackTable td {
            padding: 15px;
            border: 1px solid #ccc;
        }

        #feedbackTable th {
            background-color: #f2f2f2;
        }

        #feedbackTable tr:hover {
            background-color: #f9f9f9;
        }

        #feedbackTable td button {
            background-color: #00bcd4;
            color: #fff;
            border: none;
            padding: 8px 12px;
            cursor: pointer;
        }

        #feedbackTable td a {
            display: inline-block;
            margin-right: 5px;
        }

        #feedbackTable td a:hover {
            text-decoration: underline;
        }
        .image-size {
            width: 450px;
            height: 490px;
            max-width: 630px;
            max-height: 650px; 
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

    </style>
</head>

<body>
<div class="container">
    
    <h2 style="text-align: center;">Feedbacks</h2>
    
    <table id="feedbackTable">
       
        <th>name</th>
            <th>email</th>
            <th>rating</th>
            <th>comment</th>
            <?php
        // Fetch all measurements from the database
        $sql = "SELECT * FROM review";
        $result = $connection->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $name = $row['name'];
                $email = $row['email'];
                $rating= $row['rating'];
                $comment = $row['comment'];
               

                // Output the feedback
                echo "<tr>";
                echo "<td>$name</td>";
                echo "<td>$email</td>";
                echo "<td>$rating</td>";
                echo "<td>$comment</td>";
                echo "<td><a href='review_edit.php?id=$row[id]'><button>Edit Review</button></a>
                      <a href='review_delete.php?id=$row[id]'><button>Delete Review</button></a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No feedback found</td></tr>";
        }
        ?>
            
            
            
          
        </tr>

        </style>
        </head>
        </div>
    </body>
        </html>
    
<?php
    //Linking footer
    include "footer.php";
?>