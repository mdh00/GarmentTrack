<?php
//Linking the config file
include "config/DBconnection.php";

if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];

    $sql= "DELETE FROM customizedProduct WHERE id=$id";
    //execute the query
    $result = mysqli_query($connection, $sql);
    if($result){
        //echo "deleted successfully";
        header('location:category.php');
    }else{
        die(mysqli_error($connection));
    }
}

?>

