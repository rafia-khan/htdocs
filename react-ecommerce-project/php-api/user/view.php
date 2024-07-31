<?php
header("Access-Control-Allow-Origin:* ");
header("Access-Control-Allow-Headers:* ");
header("Access-Control-Allow-Methods:* ");

$connect = mysqli_connect("localhost", "root","", "react-php");

$query = "SELECT * FROM users ORDER BY id DESC";
$mysqli =mysqli_query($connect,$query);
$json_data =array();
while($row = mysqli_fetch_assoc($mysqli))
{ 
    $json_data[]=$row;
}
echo json_encode(['phpresult'=>$json_data]);



?>