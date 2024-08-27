<?php

include '../../config/database.php';

if(isset($_POST['create'])){

    $title = $_POST['title'];
    $year = $_POST['year'];
    $ratio = $_POST['ratio'];


    if($title && $year && $ratio){
        if($ratio != "0"){
            $insert = "INSERT INTO educations (title,year,ratio) VALUES ('$title','$year','$ratio')";
            mysqli_query($db,$insert);
            header('location: educations.php');
        }else{
            header('location: educations.php');
        }
    }else{
        header('location: educations.php');
    }

}

?>