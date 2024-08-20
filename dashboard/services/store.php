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


if(isset($_GET['fahim'])){
    $id = $_GET['fahim'];

    $select_query = "SELECT * FROM services WHERE id='$id'";
    $connect = mysqli_query($db,$select_query);
    $service = mysqli_fetch_assoc($connect);

    if($service['status'] == 'deactive'){
        $update_query = "UPDATE services SET status='active' WHERE id='$id'";
        mysqli_query($db,$update_query);
        $_SESSION['service_status'] = "service status update successfully complete";
        header("location: index.php");
    }else{
        $update_query = "UPDATE services SET status='deactive' WHERE id='$id'";
        mysqli_query($db,$update_query);
        $_SESSION['service_created'] = "service status update successfully complete";
        header("location: index.php");
    }

}


if(isset($_POST['update'])){
    if(isset($_GET['edit_id'])){
        $id = $_GET['edit_id'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $icon = $_POST['icon'];

        $update_query = "UPDATE services SET title='$title',description='$description',icon='$icon' WHERE id='$id'";
        mysqli_query($db,$update_query);
        $_SESSION['service_status'] = "service update successfully complete";
        header("location: index.php");
    }
}


?>