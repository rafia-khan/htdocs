<?php
error_reporting(0);
$email = "tahsan123@gmail.com";
$password = md5(123456);
include '../config.php';
$db = new Database();
session_start();
$user = $_SESSION['user_id'];
// echo $user;
// $db->select('user', 'user_id,email,f_name,l_name,user_role', null, "email = '{$email}' AND password = '{$password}'", null, null);
// $db->sql('SELECT order_products.product_id,order_products.order_id,order_products.total_amount,order_products.product_qty,order_products.delivery,order_products.product_user,order_products.order_date,products.featured_image,user.f_name,user.address,user.city,payments.payment_status,GROUP_CONCAT(DISTINCT products.product_title ORDER BY products.product_id SEPARATOR "$$") as product_titles,GROUP_CONCAT(DISTINCT products.featured_image ORDER BY products.product_id) as product_images,GROUP_CONCAT(DISTINCT products.product_price ORDER BY products.product_id) as product_prices FROM order_products LEFT JOIN products ON FIND_IN_SET(products.product_id,order_products.product_id) > 0
//                      LEFT JOIN user ON order_products.product_user=user.user_id LEFT JOIN payments ON payments.txn_id = order_products.pay_req_id WHERE product_user = ' . $user . ' GROUP BY order_products.order_id ORDER BY order_products.order_id DESC');
// $result = $db->getResult();
// echo "<pre>" ;
// print_r($result);
// echo "</pre>";
// echo $_COOKIE['user_cart'];


// $db->sql("SELECT order_products.product_id,order_products.order_id,order_products.total_amount,order_products.product_qty,order_products.delivery,order_products.product_user,order_products.order_date,products.featured_image,products.featured_image,user.f_name,user.address,user.city,payments.payment_status FROM order_products LEFT JOIN products ON FIND_IN_SET(products.product_id,order_products.product_id) > 0
//                      LEFT JOIN user ON order_products.product_user=user.user_id LEFT JOIN payments ON payments.txn_id = order_products.pay_req_id GROUP BY order_products.order_id ORDER BY order_products.order_id DESC LIMIT $start,$limit");


//  $db = new Database();
$db->select('order_products', 'product_id,product_qty',null,"delivery = 0 AND order_id = 27");
$result = $db->getResult();
// echo count($result);
for ($i=0; $i < count($result) ; $i++) { 
    
    // echo "<pre>";
    // print_r($result[$i]);
    // echo "</pre>";
   




    // echo "<pre>";
    // print_r($result[$i]['product_id']);
    // echo "</pre>";
    

    $product_id = explode(',', $result[$i]['product_id']);
    $product_qty = explode(',', $result[$i]['product_qty']);


    // echo "<pre>";
    // print_r($product_id);
    // echo "</pre>";
//    echo count($product_id);
    

    for ($j = 0; $j < count($product_id); $j++) {

        // echo $product_id[$j];
    
        $db->select('products', 'qty', null, "product_id = '$product_id[$j]'");
        $res = $db->getResult();
        // echo "<pre>";
        // print_r($res);
        // echo "</pre>";
        echo $res[0]['qty'].'<br>';
        if (!empty($res)) {
            $cal = $res[0]['qty'] - $product_qty[$j];

            echo $cal . '<br>';
            
           
        }
    }


}


?>

<!-- <input type="text" value="< = $addCatProID; ?>"> -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<a href="#" id="ntfcount">abc</a>
