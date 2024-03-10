<?php

session_start();
include("DB_Files/db.php");
$errors=[];


if(isset($_POST['login'])){

    $sigInEmail=$_POST['email'];
    if(empty($sigInEmail)){
        $error_msg['Email2'] = "Email Address is Required";
    }
    
    $signInPassword=$_POST['password'];
        if(empty($signInPassword)){
            $error_msg['Password2'] = "Password is Required";
        }
    

    if($sigInEmail && $signInPassword){
    $signInPassword=md5($signInPassword);
    $sql="SELECT * FROM users WHERE email='".$sigInEmail."' AND password='".$signInPassword."'";
    if($user_data=$conn->query($sql)){
        if($user_data->num_rows > 0){
            $user=mysqli_fetch_assoc($user_data);
            $_SESSION['id']=$user['user_id'];
            $_SESSION['email']=$user['email'];
            $_SESSION['username']=$user['username'];
            header("Location:product-grid-sidebar-left.php");
            exit;
            //success login
        }else{
            $errors[]="Recheck Email & Password";
        }
    }else{
        $errors[]="Logging Failed";
    }
}
}
include("./user-login.php");
?>

