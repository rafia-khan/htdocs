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

        $userpostdata= json_decode(file_get_contents("php://input"));
        //echo "sucess data";
        //print_r($userpostdata); die;
        $name= $userpostdata->name;
        $email= $userpostdata->email;
        $phone= $userpostdata->phone;
        $result= mysqli_query($db_conn, "INSERT INTO users (name, email, phone) 
        VALUES('$name', '$email', '$phone')");

        if($result)
        {
          echo json_encode(["success"=>"User Added Successfully"]);
          return;
        } else {
            echo json_encode(["success"=>"Please Check the User Data!"]);
            return; 
        }


?>