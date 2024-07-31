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

$method = $_SERVER['REQUEST_METHOD'];
//echo "test----".$method; die;
switch($method)
{
   case "GET": 
    $path= explode('/', $_SERVER['REQUEST_URI']);

    if(isset($path[4]) && is_numeric($path[4]))
    {
      $json_array= array();
      $userid= $path[4];
      
      $getuserrow= mysqli_query($db_conn, "SELECT * FROM users WHERE userid='$userid' ");
      while($userrow= mysqli_fetch_array($getuserrow))
      {
       $json_array['rowUserdata']= array('id'=>$userrow['userid'],'name'=>$userrow['name'], 'email'=>$userrow['email'], 'phone'=>$userrow['phone'],);
      }
      echo json_encode($json_array['rowUserdata']);
      return;

    } else { 

    $alluser= mysqli_query($db_conn, "SELECT * FROM users"); 
    if(mysqli_num_rows($alluser) > 0)
    {
      while($row= mysqli_fetch_array($alluser))
      {
       $json_array["userdata"][]= array("id"=>$row['id'], "name"=>$row["name"], "email"=>$row["email"], "phone"=>$row["phone"]);
      }
      echo json_encode($json_array["userdata"]);
      return;
    } else {
        echo json_encode(["result"=>"Please check the Data"]); 
        return;
    }
  }   
    break;

    case "POST":
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
        break;
    
         case "PUT":
          $userUpdate= json_decode(file_get_contents("php://input"));

           $userid= $userUpdate->id;
           $name= $userUpdate->name;
           $email= $userUpdate->email;
           $phone= $userUpdate->phone;

           $updateData= mysqli_query($db_conn, "UPDATE users SET name='$name', email='$email', phone='$phone' WHERE id='$userid'  ");
           
           if($updateData)
           {
             echo json_encode(["success"=>"User Record Update Successfully"]);
             return;
           } else {
               echo json_encode(["success"=>"Please Check the User Data!"]);
               return; 
           }
         // print_r($userUpdate); die;
          break;

          case "DELETE":
            $path= explode('/', $_SERVER["REQUEST_URI"]);
            //echo "message userid------".$path[4]; die;
            $result= mysqli_query($db_conn, "DELETE FROM users WHERE userid= '$path[4]' ");
            if($result)
            {
              echo json_encode(["success"=>"User Record Deleted Successfully"]);
              return;
            } else {
              echo json_encode(["Please Check the User Data!"]);
              return;
            }

          break;         

}


?>