<?php
// Connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'phptestdb');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Handle delete request
if (isset($_GET['Deleteid'])) {
    $deleteid = intval($_GET['Deleteid']);

    $sql = "DELETE FROM student WHERE id = $deleteid";
    if (mysqli_query($conn, $sql) === TRUE) {
        header('Location: view.php');
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Students</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <p><a href="insrt.php">Add New Data</a></p>
            <div class="col-sm-3"></div>
            <div class="col-sm-6 border border-success pt-1 mt-4">
                <h3 class="text-center pt-2 mt-2 bg-success text-white">User Information</h3>
                <?php
                $sql = "SELECT * FROM student";
                $query = mysqli_query($conn, $sql);

                if ($query && mysqli_num_rows($query) > 0) {
                    echo "<table class='table table-success'>
                            <tr>
                                <th>ID</th>
                                <th>Firstname</th>
                                <th>Lastname</th>
                                <th>Email</th>
                                <th>Action</th>
                                <th>Pictures</th>
                            </tr>";
                    while ($data = mysqli_fetch_assoc($query)) {
                        $id = htmlspecialchars($data['id']);
                        $firstname = htmlspecialchars($data['firstname']);
                        $lastname = htmlspecialchars($data['lastname']);
                        $email = htmlspecialchars($data['email']);
                        $picture = htmlspecialchars($data['pictures']);
                        echo "<tr>
                                <td>$id</td>
                                <td>$firstname</td>
                                <td>$lastname</td>
                                <td>$email</td>
                                <td>
                                    <a href='edit.php?id=$id' class='btn btn-success'>Edit</a>
                                    <a href='view.php?Deleteid=$id' class='btn btn-danger'>Delete</a>
                                </td>
                                <td><img src='Pictures/$picture' alt='User Image' width='100px' height='100px'></td>
                            </tr>";
                    }
                    echo "</table>";
                } else {
                    echo "<p>No records found</p>";
                }
                ?>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>
</body>
</html>

<?php
// Close the database connection
mysqli_close($conn);
?>
