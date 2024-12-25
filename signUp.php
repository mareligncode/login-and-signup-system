<?php

$fname="";
$lname="";
$email= "";
$sex="";
$pass1="";
$pass2= "";
$error=array();
$congra="";
$conn=mysqli_connect("localhost","root","","dbb");
if(isset($_POST["signUp"])){
    $fname=mysqli_real_escape_string($conn,$_POST['fname']);
    $lname=mysqli_real_escape_string($conn,$_POST['lname']);
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $sex=mysqli_real_escape_string($conn,$_POST['sex']);
    $pass1=mysqli_real_escape_string($conn,$_POST['pass1']);
    $pass2=mysqli_real_escape_string($conn,$_POST['pass2']);
    if($pass1!=$pass2){
        array_push($error,"the two passwords contradict please enter exact password");
    }
    $check_query="select * from student where fname='$fname' or email='$email' limit 1  ";
$result=mysqli_query($conn,$check_query);
$user=mysqli_fetch_assoc($result);
if($user["fname"]===$fname){
    array_push($error,"username already exist");
}
else if($user["email"]===$email){
    array_push($error,"email already exist");
}
if(count($error)=== 0){
    $query = "insert into student(fname,lname,email,sex,password) values('$fname','$lname','$email','$sex','$pass1') ";
mysqli_query( $conn, $query );
$congra="you are successfully registerd please login";
}}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="signUp.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signUp system</title>
</head>
<body>
    <div class="box2">
        <h1 >signUp here</h1>
        <div class="error">
            <?php
            include "error.php";
            ?>
        </div>
        <?php
        echo $congra;

        ?>
        <form action="signUp.php" method="post">
            <input type="text" name="fname" id="#" placeholder=" enter first name" required>
            <input type="text" name="lname" id="#" placeholder=" enter last name" required>
            <input type="email" name="email" id="#" placeholder=" enter email" required>
            <lable>sex</lable>
            <input type="radio" name="sex" id="" value="male" required>male
            <input type="radio" name="sex" id="" value="female" required>female
            <input type="password" name="pass1" id="#" placeholder="enter password">
            <input type="password" name="pass2" id="#" placeholder="confirm password">
            <input type="submit" value="signUp" name="signUp">
            if already a member?<a href="php.php" style="color:white; background-color:purple; font-size:20px">login</a>
        </form>
    </div>
    
</body>
</html>