<?php

include '../../config/database.php';

session_start();

if(isset($_POST['create'])){

    $title = $_POST['title'];
    $description = $_POST['description'];
    $icon = $_POST['icon'];

    if($title && $description && $icon){
        $query = "INSERT INTO services (title,description,icon) VALUES ('$title','$description','$icon')";
        mysqli_query($db,$query);
        $_SESSION['service_created'] = "new service added successfully complete";
        header("location: index.php");
    }

}

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "DELETE FROM services WHERE id='$id'";

    mysqli_query($db,$query);
    $_SESSION['service_delete'] = "service delete successfully complete";
    header("location: index.php");
}


?>