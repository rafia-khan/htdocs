<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type, X-Requested-With');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, DELETE, PUT');
$con = new mysqli('localhost', 'root', '', 'react-php');

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];


$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["photo"]["name"]);
$img_name = $_FILES["photo"]["tmp_name"];

if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
    $photo = $_FILES["photo"]["name"];
    $query = "update users set name='$name', email='$email', phone='$phone' where id=$id";
} else {
    $query = "update users set name='$name',  email='$email', phone='$phone' where id=$id";
}

if ($name != '') {
    $con->query($query);
    echo json_encode(['status'=>true]);
}else{
    echo json_encode(['status'=>false]);
}
?>