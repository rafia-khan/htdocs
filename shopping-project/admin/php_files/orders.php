<?php
include 'database.php';
$db = new Database();
$order_id = $db->escapeString($_POST['order_id']);
$db->select('order_products', 'product_id,product_qty', null, "delivery = 0 AND order_id ='$order_id' ");
$result = $db->getResult();

// change order delivery status for complete
if (isset($_POST['complete'])) {
	

	for ($i = 0; $i < count($result); $i++) {

		$product_id = explode(',', $result[$i]['product_id']);
		$product_qty = explode(',', $result[$i]['product_qty']);
		for ($j = 0; $j < count($product_id); $j++) {

			$db->select('products', 'product_id,qty', null, "product_id = '$product_id[$j]'");
			$res = $db->getResult();
			// echo $res[0]['qty'] . '<br>';
			if (!empty($res)) {
				$cal = $res[0]['qty'] - $product_qty[$j];
				if ($cal < 0) {
					echo json_encode(["error" => "<b>PDR00" . $res[0]['product_id'] . "</b>... out of stock  <br> <b>Available Quantity : <b>" . $res[0]['qty'] . " </b>"]);
					exit;
				} else {
					$db->update('products', ['qty' => $cal], "product_id = '$product_id[$j]'");
				}
			}
		}
	}


	$db->update('order_products', ['delivery' => '1'], "order_id='{$order_id}'");
	$result2 = $db->getResult();
	if ($result2[0] == '1') {
		echo 'true';
		exit;
	}
}
// change order delivery status for complete

if(isset($_POST['cancel'])){
	$db->update('order_products', ['delivery' => '2'], "order_id='{$order_id}'");
	$result3 = $db->getResult();
	if ($result3) {
		echo json_encode(['success' => 'Delivery Cancelled']);
		exit;
	}
}