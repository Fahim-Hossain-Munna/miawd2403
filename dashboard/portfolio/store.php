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


if(isset($_GET['statusid'])){

    $id = $_GET['statusid'];

    $port_query = "SELECT * FROM portfolios WHERE id='$id'";
    $connectdb = mysqli_query($db,$port_query);
    $port = mysqli_fetch_assoc($connectdb);

    if($port['status'] == 'deactive'){
        $update_query = "UPDATE portfolios SET status='active' WHERE id='$id'";
        mysqli_query($db,$update_query);
        $_SESSION['port_created'] = "portfolio status update successfully complete";
        header("location: portfolio.php");
    }else{
        $update_query = "UPDATE portfolios SET status='deactive' WHERE id='$id'";
        mysqli_query($db,$update_query);
        $_SESSION['port_created'] = "portfolio status update successfully complete";
        header("location: portfolio.php");
    }


}


if(isset($_GET['deleteid'])){

    $id = $_GET['deleteid'];

    $select_port = "SELECT * FROM portfolios WHERE id='$id'";
    $connectdb = mysqli_query($db,$select_port);
    $port = mysqli_fetch_assoc($connectdb);

    if($port['image']){
        $old_img = $port['image'];
        $old_path = "../../public/portfolio/".$old_img;
        if(file_exists($old_path)){
            unlink($old_path);
        }
        $query = "DELETE FROM portfolios WHERE id='$id'";
    
        mysqli_query($db,$query);
        $_SESSION['port_created'] = "portfolio delete successfully complete";
        header("location: portfolio.php");
    }

}


if(isset($_POST['update_port'])){
if(isset($_GET['updateid'])){
    $id = $_GET['updateid'];
    $title = $_POST['title'];
    $subtitle = $_POST['subtitle'];
    $description = $_POST['description'];

    $image = $_FILES['image']['name'];
    $tmp_img = $_FILES['image']['tmp_name'];

    if($image){
        $select_port = "SELECT * FROM portfolios WHERE id='$id'";
        $connectdb = mysqli_query($db,$select_port);
        $port = mysqli_fetch_assoc($connectdb);
    
        if($port['image']){
            $old_img = $port['image'];
            $old_path = "../../public/portfolio/".$old_img;
            if(file_exists($old_path)){
                unlink($old_path);
            }
        }
        $explode = explode('.',$image);
        $extension = end($explode);
        $custom_name_img = $_SESSION['auth_id'].'-'.$title.'-'.date("d-m-Y")."." .$extension;
        $local_path = "../../public/portfolio/".$custom_name_img;

        if(move_uploaded_file($tmp_img,$local_path)){

            $query = "UPDATE portfolios SET title='$title',subtitle='$subtitle',description='$description',image='$custom_name_img' WHERE id='$id'";
            mysqli_query($db,$query);
            $_SESSION['port_created'] = "portfolio update successfully complete";
            header('location: portfolio.php');
        }

    }else{
        $query = "UPDATE portfolios SET title='$title',subtitle='$subtitle',description='$description' WHERE id='$id'";
        mysqli_query($db,$query);
        $_SESSION['port_created'] = "portfolio update successfully complete";
        header('location: portfolio.php'); 
    }
}

}


?>