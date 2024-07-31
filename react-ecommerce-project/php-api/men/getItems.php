<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST,Delete');
header("Access-Control-Allow-Headers: X-Requested-With");

$con=new mysqli('localhost','root','','react-php');
$data=$con->query('select * from items order by id desc')->fetch_all(MYSQLI_ASSOC);
header('Content-Type: Application/json');
echo json_encode($data);