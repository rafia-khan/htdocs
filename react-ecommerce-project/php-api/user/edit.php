<?php
error_reporting(E_ALL);
ini_set('display_errors',1);
header("Access-Control-Allow-Origin:* ");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");

$db_conn= mysqli_connect("localhost","root", "", "react-php");
if($db_conn===false)
{
  die("ERROR: Could Not Connect".mysqli_connect_error());
}


$userUpdate= json_decode(file_get_contents("php://input"));

$id= $userUpdate->id;
$name= $userUpdate->name;
$email= $userUpdate->email;
$phone= $userUpdate->phone;

$updateData= mysqli_query($db_conn, "UPDATE users SET name='$name', email='$email', phone='$phone' WHERE id='$id'  ");
if($updateData)
{
  echo json_encode(["success"=>"User Record Update Successfully"]);
  return;
} else {
    echo json_encode(["success"=>"Please Check the User Data!"]);
    return; 
}
// print_r($userUpdate); die;


?>