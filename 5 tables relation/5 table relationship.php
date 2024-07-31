<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecommarce"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// Query the view
$sql = "SELECT * FROM customer_orders";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>Customer ID</th>
                <th>Customer Name</th>
                <th>Order ID</th>
                <th>Order Date</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Supplier Name</th>
            </tr>";
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["customer_id"] . "</td>
                <td>" . $row["customer_name"] . "</td>
                <td>" . $row["order_id"] . "</td>
                <td>" . $row["order_date"] . "</td>
                <td>" . $row["product_name"] . "</td>
                <td>" . $row["quantity"] . "</td>
                <td>" . $row["supplier_name"] . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>