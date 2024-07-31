<!DOCTYPE html>
<html>
<head>
    <title>Manage Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: teal;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .container {
            width: 80%;
            background: #FFDCB5;
            padding: 20px;
            margin: 20px 0;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        form {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
        form div {
            width: 48%;
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }
        input[type="text"],
        input[type="email"],
        input[type="date"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            background-color: #28a745;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #218838;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .message {
            text-align: center;
            margin: 20px 0;
            color: green;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Insert Data into Tables</h2>
        <?php
        // Database connection details
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "ecommarce"; // Replace with your actual database name

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $message = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Insert data into customers table
            $customer_name = $_POST['customer_name'];
            $customer_email = $_POST['customer_email'];
            
            $stmt = $conn->prepare("INSERT INTO customers (name, email) VALUES (?, ?)");
            $stmt->bind_param("ss", $customer_name, $customer_email);
            $stmt->execute();
            $customer_id = $stmt->insert_id; // Get the last inserted customer_id
            $stmt->close();

            // Insert data into orders table
            $order_date = $_POST['order_date'];
            
            $stmt = $conn->prepare("INSERT INTO orders (order_date, customer_id) VALUES (?, ?)");
            $stmt->bind_param("si", $order_date, $customer_id);
            $stmt->execute();
            $order_id = $stmt->insert_id; // Get the last inserted order_id
            $stmt->close();

            // Insert data into suppliers table
            $supplier_name = $_POST['supplier_name'];
            $supplier_contact = $_POST['supplier_contact'];

            $stmt = $conn->prepare("INSERT INTO suppliers (supplier_name, supplier_contact) VALUES (?, ?)");
            $stmt->bind_param("ss", $supplier_name, $supplier_contact);
            $stmt->execute();
            $supplier_id = $stmt->insert_id; // Get the last inserted supplier_id
            $stmt->close();

            // Insert data into products table
            $product_name = $_POST['product_name'];

            $stmt = $conn->prepare("INSERT INTO products (product_name, supplier_id) VALUES (?, ?)");
            $stmt->bind_param("si", $product_name, $supplier_id);
            $stmt->execute();
            $product_id = $stmt->insert_id; // Get the last inserted product_id
            $stmt->close();

            // Insert data into order_items table
            $quantity = $_POST['quantity'];

            $stmt = $conn->prepare("INSERT INTO order_items (order_id, product_id, quantity) VALUES (?, ?, ?)");
            $stmt->bind_param("iii", $order_id, $product_id, $quantity);
            $stmt->execute();
            $stmt->close();

            $message = "Data inserted successfully";
        }

        // Fetch and display data from the view
        $result = $conn->query("
            SELECT 
                customer_id, customer_name, order_id, order_date, 
                product_name, quantity, supplier_name 
            FROM customer_orders
        ");
        ?>

        <?php if (!empty($message)): ?>
            <div class="message"><?php echo $message; ?></div>
        <?php endif; ?>

        <form method="post" action="">
            <div>
                <h3>Customer</h3>
                <label for="customer_name">Name:</label>
                <input type="text" id="customer_name" name="customer_name" required>
                
                <label for="customer_email">Email:</label>
                <input type="email" id="customer_email" name="customer_email" required>
            </div>

            <div>
                <h3>Order</h3>
                <label for="order_date">Order Date:</label>
                <input type="date" id="order_date" name="order_date" required>
            </div>

            <div>
                <h3>Supplier</h3>
                <label for="supplier_name">Supplier Name:</label>
                <input type="text" id="supplier_name" name="supplier_name" required>
                
                <label for="supplier_contact">Supplier Contact:</label>
                <input type="text" id="supplier_contact" name="supplier_contact" required>
            </div>

            <div>
                <h3>Product</h3>
                <label for="product_name">Product Name:</label>
                <input type="text" id="product_name" name="product_name" required>
            </div>

            <div>
                <h3>Order Items</h3>
                <label for="quantity">Quantity:</label>
                <input type="number" id="quantity" name="quantity" required>
            </div>

            <div style="width: 100%;">
                <input type="submit" value="Submit">
            </div>
        </form>

        <h2>Data from Tables</h2>
        <table>
            <tr>
                <th>Customer ID</th>
                <th>Customer Name</th>
                <th>Order ID</th>
                <th>Order Date</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Supplier Name</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["customer_id"] . "</td>";
                    echo "<td>" . $row["customer_name"] . "</td>";
                    echo "<td>" . $row["order_id"] . "</td>";
                    echo "<td>" . $row["order_date"] . "</td>";
                    echo "<td>" . $row["product_name"] . "</td>";
                    echo "<td>" . $row["quantity"] . "</td>";
                    echo "<td>" . $row["supplier_name"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='7'>No data found</td></tr>";
            }
            $conn->close();
            ?>
        </table>
    </div>
</body>
</html>
