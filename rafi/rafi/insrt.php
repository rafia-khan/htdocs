<?php
$conn = mysqli_connect('localhost', 'root', '', 'phptestdb');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    $pictureName = $_FILES['picture']['name'];
    $picture_tmpName = $_FILES['picture']['tmp_name'];
    $picture_upload = 'Pictures/' . $pictureName;

    $sql = "INSERT INTO student (firstname, lastname, email, pictures) VALUES ('$firstname', '$lastname', '$email', '$pictureName')";

    if (mysqli_query($conn, $sql) === TRUE) {
        if (move_uploaded_file($picture_tmpName, $picture_upload)) {
            header('Location: view.php');
            exit();
        } else {
            echo "Error uploading file.";
        }
    } else {
        echo "Error inserting data: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6 border border-success pt-1 mt-4">
                <center>
                    <form action="insrt.php" method="POST" enctype="multipart/form-data">
                        <h3>Registration Form</h3>

                        <label for="firstname">Firstname:</label>
                        <input type="text" id="firstname" name="firstname" required><br><br>

                        <label for="lastname">Lastname:</label>
                        <input type="text" id="lastname" name="lastname" required><br><br>

                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required><br><br>

                        <label for="picture">Picture:</label><br>
                        <input type="file" id="picture" name="picture" required><br><br>

                        <input type="submit" value="Submit" name="submit" class="btn btn-danger">
                    </form>
                </center>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>
</body>
</html>
