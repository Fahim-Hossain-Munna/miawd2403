<?php
include '../../config/database.php';
session_start();

$id = $_SESSION['auth_id'];

if(isset($_POST['name_ubtn'])){
    $name = $_POST['name'];

    if($name){
        $query = "UPDATE users SET name='$name' WHERE id='$id'";
        mysqli_query($db,$query);
        $_SESSION['auth_name'] = "$name";
        $_SESSION['name_update'] = "name successfully updated!";
        header('location: profile.php');
    }
}


if(isset($_POST['pass_ubtn'])){
    $old_pass = $_POST['old_pass'];
    $new_pass = $_POST['new_pass'];
    $con_pass = $_POST['con_pass'];

    if($old_pass && $new_pass && $con_pass){
        $encrypt_old = sha1($old_pass);
        $old_pass_query = "SELECT COUNT(*) AS result FROM `users` WHERE id='$id' AND password='$encrypt_old'";
        $connect = mysqli_query($db,$old_pass_query);
        $result = mysqli_fetch_assoc($connect)['result'];

        if($result == 1){
            if($new_pass == $con_pass){
                $encrypt = sha1($new_pass);
                $query = "UPDATE users SET password='$encrypt' WHERE id='$id'";

                mysqli_query($db,$query);
                $_SESSION['pass_update'] = "password successfully updated!!";
                header('location: profile.php');
            }


        }else{
            $_SESSION['pass_error'] = "your given old password doesn't match with our records!!";
            header('location: profile.php');
        }


    }else{
        $_SESSION['pass_error'] = "please fill a all field !!";
        header('location: profile.php');
    }

    // if($name){
    //     $query = "UPDATE users SET name='$name' WHERE id='$id'";
    //     mysqli_query($db,$query);
    //     $_SESSION['auth_name'] = "$name";
    //     $_SESSION['name_update'] = "name successfully updated!";
    //     header('location: profile.php');
    // }
}


if(isset($_POST['image_ubtn'])){
    $image = $_FILES['image']['name'];
    $tmp_img = $_FILES['image']['tmp_name'];

    if($image){
        $explode = explode('.',$image);
        $extension = end($explode);
        $custom_name_img = $_SESSION['auth_id'].'-'.$_SESSION['auth_name'].'-'.date("d-m-Y")."." .$extension;
        $local_path = "../../public/profile/".$custom_name_img;

        if(move_uploaded_file($tmp_img,$local_path)){
            $query = "UPDATE users SET image='$custom_name_img' WHERE id='$id'";
            mysqli_query($db,$query);
            header('location: profile.php');
        }

    }

}


?>