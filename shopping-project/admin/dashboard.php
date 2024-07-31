<?php
// include header file
include 'header.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/custom.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,400,500,600" rel="stylesheet" type="text/css">
</head>

<body>
    <h2 class="admin-heading">Dashboard</h2>
    <div class="row">
        <div class="col-md-12">
            <?php
            $db = new Database();
            $db->select('products', 'product_id', null, 'qty < 1', null, 0);
            $qty = $db->getResult();
            if (!empty($qty)) {  ?>
                <table class="table table-bordered">
                    <thead>
                        <tr class="active">
                            <td colspan="2">OUT OF Stock</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($qty as $q) { ?>
                            <tr>
                                <td>Product Code</td>
                                <td><?php echo 'PDR00' . $q['product_id']; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php } ?>
        </div>
    </div>
    <div class="main-section">

        <div class="dashbord dashbord-dark">
            <?php
            $db = new Database();
            $db->select('user', 'COUNT(user_id) as u_count', null, null, null, 0);
            $users = $db->getResult();
            ?>
            <div class="icon-section">
                <i class="fa fa-users" aria-hidden="true"></i><br>
                <small>Users</small>
                <p><span class="count"><?php echo $users[0]['u_count']; ?></span></p>
            </div>
            <div class="detail-section">
                <a href="users.php">More Info </a>
            </div>

        </div>
        <div class="dashbord dashbord-green">
            <?php
            $db = new Database();
            $db->select('categories', 'COUNT(cat_id) as c_count', null, null, null, 0);
            $category = $db->getResult();
            ?>
            <div class="icon-section">
                <i class="fa fa-th-large" aria-hidden="true"></i>

                <br>
                <small>Categories</small>
                <p> <span class="count"><?php echo $category[0]['c_count']; ?></span></p>
            </div>
            <div class="detail-section">
                <a href="category.php">More Info </a>
            </div>

        </div>
        <div class="dashbord dashbord-orange">
            <?php
            $db = new Database();
            $db->select('sub_categories', 'COUNT(sub_cat_id) as sub_count', null, null, null, 0);
            $sub_category = $db->getResult();
            ?>
            <div class="icon-section">
                <i class="fa fa-th" aria-hidden="true"></i>
                <br>
                <small>Sub Categories</small>
                <p><span class="count"><?php echo $sub_category[0]['sub_count']; ?></span></p>
            </div>
            <div class="detail-section">
                <a href="sub_category.php">More Info </a>
            </div>
        </div>
        <div class="dashbord dashbord-blue">
            <?php
            $db = new Database();
            $db->select('brands', 'COUNT(brand_id) as b_count', null, null, null, 0);
            $brands = $db->getResult();
            ?>
            <div class="icon-section">
                <i class="fa fa-btc" aria-hidden="true"></i>
                <br>
                <small>Brands</small>
                <p><span class="count"><?php echo $brands[0]['b_count']; ?></span></p>
            </div>
            <div class="detail-section">
                <a href="brands.php">More Info </a>
            </div>
        </div>
        <div class="dashbord dashbord-red">
            <?php
            $db = new Database();
            $db->select('products', 'COUNT(product_id) as p_count', null, null, null, 0);
            $products = $db->getResult();
            ?>
            <div class="icon-section">
                <i class="fa fa-product-hunt" aria-hidden="true"></i>
                <br>
                <small>Products</small>
                <p> <span class="count"><?php echo $products[0]['p_count']; ?></span></p>
            </div>
            <div class="detail-section">
                <a href="products.php">More Info </a>
            </div>
        </div>
        <div class="dashbord dashbord-skyblue">
            <?php
            $db = new Database();
            $db->select('order_products', 'COUNT(order_id) as o_count', null, null, null, 0);
            $orders = $db->getResult();
            ?>
            <div class="icon-section">
                <i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
                <br>
                <small>Orders <sup class="badge" style="background: #e70c4a;"><?= isset($_SESSION['count']) && $_SESSION['count'] > 0 ? $_SESSION['count'] : ''; ?></sup></small>
                <p> <span class="count"><?php echo $orders[0]['o_count']; ?></span></p>
            </div>
            <div class="detail-section">
                <a href="orders.php">More Info </a>
            </div>
        </div>
    </div>
</body>

</html>
<?php
//    include footer file
include "footer.php";

?>