<?php
$conn = mysqli_connect('localhost','root','','phptestdb');
if(isset($_POST['submit'])){
    echo "ok";

   $firstname  = $_POST["firstname"];
   $lastname  = $_POST["lastname"];
   $email     = $_POST["email"];

   
   $pictureName     = $_FILES['picture']['name'];
   $picture_tmpName = $_FILES['picture']['tmp_name'];
   $picture_upload  = 'Pictures/'.$pictureName;

   $sql = "INSERT INTO student (firstname,lastname,email,pictures) 
   values('$firstname','$lastname', '$email','$pictureName')";

   if(mysqli_query($conn, $sql) == TRUE){

    if(move_uploaded_file($picture_tmpName, $picture_upload));
    echo "Data inserted";

    header('location:view.php');

   }else{
    echo "Not insert";
   }

}

?>

<html>
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>

    <body>
        <div class = "container">
            <div class= "row">
                <div class = "col-sm-3"></div>

                    <div class="col-sm-6 border border-success pt-1 mt-4">
<center>
                <form action="insrt.php" method="POST" class="bg-success enctype="multipart/form-data" >
                    <h3>Registration Form</h3>

                                Firstname :
                                <input type="text" name="firstname"><br><br>

                                Lastname
                                <input type="text" name="lastname"><br><br>

                                Email
                                <input type="text" name="email"><br><br>

                                <label for="picture">Picture</label><br>
                                <input type="file" id="picture" name="picture" multiple><br><br>

                                <input type="submit" value="Submit" name="submit" class ="btn btn-danger">


                </form>
</center>
                         </div>

                         

                <div class ="col-sm-3"></div>
            </div>
        </div>

    </body>
</html>
