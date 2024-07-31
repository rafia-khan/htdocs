<?php
session_start ();

if(isset($_POST["btnlogin"])){
    $username=$_POST["txtusername"];
    $passeord=$_POST["txtpass"];

    if ($username=="Admin" && $password="1234"){
        $_SESSION["sname"]=$username;
    }
    else{
        $msg="Username and password are not same!!";
    }


}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>log in</title>
</head>
<body>
    <form action="#" method="POST">

    <div>
        Username
        <input type="text" name="txtusername">
    </div><br>

    <div>
        Password
        <input type="text" name="txtpass">
    </div><br>

    <input type="submit" name="btnlogin" value="Log in">
    </form>
</body>
</html>