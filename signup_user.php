<?php

include ('include/connection.php');


if(isset($_POST['sign_up'])){

    $name=htmlentities(mysqli_real_escape_string($con, $_POST['user_name']));
    $pass=htmlentities(mysqli_real_escape_string($con, $_POST['user_pass']));
    $email=htmlentities(mysqli_real_escape_string($con, $_POST['user_email']));
    $country= htmlentities(mysqli_real_escape_string($con, $_POST['user_country']));
    $gender= htmlentities(mysqli_real_escape_string($con, $_POST['user_gender']));
    $rand=rand(1,2);


    // var_dump($_POST['user_country']);

    if($name ==''){
        echo "<script>alert('we can not verify your name')</script>";
    }
    if(strlen($pass)<3){
        echo "<script>alert('Password should be mimum 3 characters')</script>";
        exit();
    }

    $check_email="select *  from user where user_email='$email' ";

    $run_email=mysqli_query($con,$check_email);
    

    $check=mysqli_num_rows($run_email);

    

    if($check ==1){
        echo "<script>alert('Email already exhist, please try again ')</script>";
        echo "<script>window.open('signup.php','_self')</script>";
        exit();
    }

    if($rand == 1)
        $profile_pic="images/1.jpg";
    else if($rand ==2)
    $profile_pic="images/2.jpg";


    $insert="insert into user (user_name,user_pass,user_email,user_profile,user_country,user_gender)
    VALUES ('$name', '$pass','$email', '$profile_pic','$country','$gender') ";
    


    $query=mysqli_query($con, $insert);


    if($query){
        echo "<script>alert('Congrats, $name , your account has created successfully ')</script>";

        echo "<script>window.open('signin.php', '_self')</script>";
    }
    else{
        echo "<script>alert('Registration failed, please try again ')</script>";
        echo "<script>window.open('signup.php','_self')</script>";
    }
 }

?>