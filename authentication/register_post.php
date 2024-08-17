<?php

require "../config/database.php";
session_start();

if(isset($_POST['submit_btn'])){
    
    $name = $_POST['name'];
    $name_regex = '/^(?! $)[a-zA-Z ]*$/';
    $email = $_POST['email'];
    $password = $_POST['password'];
    $c_password = $_POST['c_password'];
    $email_regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
    $password_regex_length = '/^(?=\S{8,})/';
    $password_regex_uppercase = '/^(?=\S*[A-Z])/';
    $password_regex_lowercase = '/^(?=\S*[a-z])/';
    $password_regex_number = '/^(?=\S*[\d])/';
    $password_regex_special = '/^(?=\S*[\W])/';
    $flag = false;


    if(!$name){
       $_SESSION['name_error'] = "Name Field is Required!!";
       $flag = true;
       header("location: register.php");
    }else{
        $_SESSION['old_name'] = $name;
        header("location: register.php");
    }
    if(!preg_match($name_regex,$name)){
        $_SESSION['name_error'] = "we can't use any numarical character!!";
        $flag = true;
        header("location: register.php"); 
    }else{
        $_SESSION['old_name'] = $name;
        header("location: register.php");
    }


    if(!$email){
        $_SESSION['email_error'] = "E-mail Field is Required!!";
        $flag = true;
        header("location: register.php");
    }else if(!preg_match($email_regex,$email)){
        $_SESSION['email_error'] = "invalid email provide!!";
        $flag = true;
        header("location: register.php");
    }else{
        $_SESSION['old_email'] = $email;
        header("location: register.php");
    }

    if(!$password){
        $_SESSION['password_error'] = "Password Field is Required!!";
        $flag = true;
        header("location: register.php");
    }else if(!preg_match($password_regex_length,$password)){
        $_SESSION['password_error'] = "Password must be minimum 8 characters length!!";
        $flag = true;
        header("location: register.php");
    }else if(!preg_match($password_regex_uppercase,$password)){
        $_SESSION['password_error'] = "Password must be at least one uppercase letter!!";
        $flag = true;
        header("location: register.php");
    }else if(!preg_match($password_regex_lowercase,$password)){
        $_SESSION['password_error'] = "Password must be at least one lowercase letter!!";
        $flag = true;
        header("location: register.php");
    }else if(!preg_match($password_regex_number,$password)){
        $_SESSION['password_error'] = "Password must be at least one number!!";
        $flag = true;
        header("location: register.php");
    }else if(!preg_match($password_regex_special,$password)){
        $_SESSION['password_error'] = "Password must be have one special character!!";
        $flag = true;
        header("location: register.php");
    }else{
        $_SESSION['old_password'] = $password;
        header("location: register.php");
    }


    if(!$c_password){
        $_SESSION['c_password_error'] = "Confirm Password Field is Required!!";
        $flag = true;
        header("location: register.php");
    }else if($c_password != $password){
        $_SESSION['c_password_error'] = "confirm password credential doesn't match!!";
        $flag = true;
        header("location: register.php");
    }


    if($flag){
        echo "kharap";
    }else{
       $encrypt_pass = sha1($password);
       $createQuery = "INSERT INTO users (name,email,password) VALUES ('$name','$email','$encrypt_pass')";
       mysqli_query($db,$createQuery);

       $_SESSION['register_success'] = "registration Complete!!";
       $_SESSION['register_email'] = "$email";
       $_SESSION['register_password'] = "$password";
       header("location: login.php");


    }





}







?>