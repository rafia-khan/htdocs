<?php
$conn = mysqli_connect('localhost','root','','phptestdb');
if(isset($_GET['Deleteid'])){
    $deleteid = $_GET['Deleteid'];

      $sql = "DELETE FROM student WHERE id = $deleteid";
     if(mysqli_query($conn, $sql) == TRUE){

        header('location:view.php');
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
           <p> <a href="insrt.php">Add New Data</a>
           </p>

                <div class = "col-sm-3"></div>
                <p>
    
                    <div class="col-sm-6 border border-success pt-1 mt-4">
                            <h3 class ="text-center pt-2 mt-2 bg-success text-white">User Information</h3>
                        <?php
                            $sql ="SELECT * FROM student";
                           $query = mysqli_query($conn, $sql);

                           echo "<table class ='table table-success'>
                                <tr>
                                    <th>ID</th>
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>Email</th>
                                   <th>Action</th>
                                    <th>Pictures</th>

                                <tr>";
                         while($data = mysqli_fetch_assoc($query)){

                            $id = $data ['id'];
                           $firstname = $data ['firstname'];
                            $lastname = $data ['lastname'];
                             $email = $data ['email'];
                             $picture = $data['pictures'];
                              echo
                                 "<tr>
                                        <td>$id</td>
                                        <td>$firstname</td>
                                        <td>$lastname</td>
                                        <td>$email</td>
                                       
                                        <td><span class = 'btn btn-success'>
                                        <a href='edit.php?id=$id' class = 'text-white text-decoration-none'>Edit</a> 
                                        </span> 
                                        <span class ='btn btn-danger'>
                                        <a href='view.php?Deleteid=$id' class = 'text-white text-decoration-none'>Delete</a> 
                                        </span>
                                        </td>

                                        <td>
                                        <img src='Pictures/$picture' alt='User Image'width='100px' height='100px'>
                                    </td>

                                    </tr>"; 
                                             }

                                             echo "</table>";
                                             


                            
                            
                            
                        ?>
                    </div>

                         

                <div class ="col-sm-3"></div>
            </div>
        </div>

    </body>
</html>
