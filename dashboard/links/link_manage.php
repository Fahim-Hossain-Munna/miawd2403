<?php

include '../../config/database.php';
session_start();


if(isset($_POST['link_ubtn'])){
    $id = $_SESSION['auth_id'];
    $facebook = $_POST['facebook'];
    $instagram = $_POST['instagram'];
    $twitter = $_POST['twitter'];
    $pinterest = $_POST['pinterest'];
    
    $query = "INSERT INTO links (user_id,facebook,instagram,twitter,pinterest) VALUES ('$id','$facebook','$instagram','$twitter','$pinterest')";
    mysqli_query($db,$query);
    header('location: links.php');

}


?>