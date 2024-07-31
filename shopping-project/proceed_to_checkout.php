<?php
include 'config.php';

session_start();
$payment_request_id = uniqid(md5(rand(1111, 9999)));
$params1 = [
    'item_number' => $_POST['product_id'],
    'txn_id' => $payment_request_id,
    'payment_gross' => $_POST['product_total'],
    'payment_status' => 'credit',
];
$params2 = [
    'product_id' => $_POST['product_id'],
    'product_qty' => $_POST['product_qty'],
    'total_amount' => $_POST['product_total'],
    'product_user' => $_SESSION['user_id'],
    'order_date' => date('Y-m-d'),

    'pay_req_id' => $payment_request_id
];

if (isset($_POST['product_id']) || !empty($_POST['product_id'])) {

    $db = new Database();
    $product_id = explode(',', $_POST['product_id']);
    $product_qty = explode(',', $_POST['product_qty']);

    for ($i = 0; $i < count($product_id); $i++) {

        // echo $product_id[$i];
        $db->select('products', 'qty,product_title', null, "product_id = '$product_id[$i]'");
        $res = $db->getResult();

        if (!empty($res)) {
            $cal = $res[0]['qty'] - $product_qty[$i];

            
            if ($cal < 0) {
                // echo $res[0]['product_title'] . ' <b>out of strok </b> Available '. $res[0]['qty'].'<br> ';
                $_SESSION['outOfStrok'] = $res[0]['product_title'] . ' <b>out of strok </b> <br> Available Quantity : <b>' . $res[0]['qty'] .'</b>';
              //  echo $_SESSION['outOfStrok'];
                header('Location: cart.php');exit;
            } else {
              //  $db->update('products', ['qty' => $cal], "product_id = '$product_id[$i]'");
                $_SESSION['outOfStrok'] = '';
                
               
            }
        }
    }
    $db->insert('payments', $params1);
    $db->insert('order_products', $params2);
    $db->getResult();

    header('Location: user_orders.php');
}





