<?php

include '../../config/database.php';

session_start();

if(isset($_POST['create'])){

    $title = $_POST['title'];
    $subtitle = $_POST['subtitle'];
    $description = $_POST['description'];

    $image = $_FILES['image']['name'];
    $tmp_img = $_FILES['image']['tmp_name'];

    if($image){
        $explode = explode('.',$image);
        $extension = end($explode);
        $custom_name_img = $_SESSION['auth_id'].'-'.$title.'-'.date("d-m-Y")."." .$extension;
        $local_path = "../../public/portfolio/".$custom_name_img;

        if(move_uploaded_file($tmp_img,$local_path)){

            $query = "INSERT INTO portfolios (title,subtitle,description,image) VALUES ('$title','$subtitle','$description','$custom_name_img')";
            mysqli_query($db,$query);
            $_SESSION['port_created'] = "new portfolio added successfully complete";
            header('location: portfolio.php');
        }

    }
    // if($title && $description && $icon){
    //     $query = "INSERT INTO services (title,description,icon) VALUES ('$title','$description','$icon')";
    //     mysqli_query($db,$query);
    //     $_SESSION['service_created'] = "new service added successfully complete";
    //     header("location: index.php");
    // }

}

?>