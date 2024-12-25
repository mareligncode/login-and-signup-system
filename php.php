<?php
$fname="";
$password="";
$error="";
#create database connection
$conn=mysqli_connect("localhost","root","","dbb");
// if(!$conn){
//     die("database not connected".mysqli_error($conn));
// }
// else echo"connected";
// 
if(isset($_POST['login'])){
    $fname=mysqli_real_escape_string($conn,$_POST['fname']);
    $password=mysqli_real_escape_string($conn,$_POST['password']);
    $sql="select * from student where fname='".$fname."' and password='".$password."' limit 1 ";
    $result=mysqli_query($conn,$sql);
    if(empty($fname)){
        $error="username is mandatory";
    }
    else if(empty($password)){
        $error= "password is mandatory";
}else if(mysqli_num_rows($result)==1){
    header("location:home.php");
}
else{
    $error= "user name or password is incorrect";
}
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login system</title>
</head>
<body>
    <div class="box">
        <h1 >login here</h1>
        <div class="error">
            <?php
            echo $error;
            ?>
        </div>
        <form action="php.php" method="post">
            <input type="text" name="fname" id="#" placeholder=" enter user name">
            <input type="password" name="password" id="#" placeholder="enter password">
            <input type="submit" value="login" name="login">
            if not member?<a href="signUp.php" style="color:white; background-color:purple; font-size:20px">signUp</a>
        </form>
    </div>
    
</body>
</html>