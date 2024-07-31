<?php
	include '../config.php';
	// echo '1'; exit;
	if(isset($_POST['create'])){
		if(!isset($_POST['f_name']) || empty($_POST['f_name'])){
			echo json_encode(array('error'=>'First Name Field Empty.')); exit;
		}else if(!isset($_POST['l_name']) || empty($_POST['l_name'])){
			echo json_encode(array('error'=>'Last Name Field Empty.')); exit;
		}else if(!isset($_POST['email']) || empty($_POST['email'])){
			echo json_encode(array('error'=>'email Field Empty.')); exit;
		}else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		  	echo json_encode(array('error'=>'Please Enter Correct Email Address.')); exit;
		}else if(!isset($_POST['password']) || empty($_POST['password'])){
			echo json_encode(array('error'=>'Password Field Empty.')); exit;
		}else if(!isset($_POST['mobile']) || empty($_POST['mobile'])){
			echo json_encode(array('error'=>'Mobile Number Field Empty.')); exit;
		}else if(!isset($_POST['address']) || empty($_POST['address'])){
			echo json_encode(array('error'=>'Address Field Empty.')); exit;
		}else if(!isset($_POST['city']) || empty($_POST['city'])){
			echo json_encode(array('error'=>'City Field Empty.')); exit;
		}else{
			$db = new Database();

			$params = [
				'f_name' => $db->escapeString($_POST['f_name']),
				'l_name' => $db->escapeString($_POST['l_name']),
				'email' => $db->escapeString($_POST['email']),
				'password' => md5($db->escapeString($_POST['password'])),
				'mobile' => $db->escapeString($_POST['mobile']),
				'address' => $db->escapeString($_POST['address']),
				'city' => $db->escapeString($_POST['city'])
			];

			$db->select('user','email',null,"email = '{$params["email"]}'",null,null);
			$exist = $db->getResult();
			if(!empty($exist)){
				echo json_encode(array('error'=>'email Already Exists.')); exit;
			}else{
				$db->insert('user',$params);
				$response = $db->getResult();
				if(is_numeric($response[0])){
					session_start();
					$_SESSION["user_id"] = $response[0]; /* userid of the user */
	            	$_SESSION["username"] = $params['f_name'];
	            	$_SESSION["user_role"] = 'user'; /* for user */
					echo json_encode(array('success'=>'Registered Successfully')); exit;
				}else{
					echo json_encode(array('error'=>$response)); exit;
				}
			}
		}
	}

	if(isset($_POST['login'])){
		if(!isset($_POST['email']) || empty($_POST['email'])){
			echo json_encode(array('error'=>'email Field is Empty.')); exit;
		}elseif(!isset($_POST['password']) || empty($_POST['password'])){
			echo json_encode(array('error'=>'Passowrd Field is Empty.')); exit;
		}else{
			$db = new Database();

			$email = $db->escapeString($_POST['email']);
			$password = md5($db->escapeString($_POST['password']));
			

			$db->select('user','user_id,email,f_name,l_name,user_role',null,"email = '{$email}' AND password = '{$password}'",null,null);
			$response = $db->getResult();
			if(!empty($response)){
				if(count($response[0]) > 1){
					/* Start the session */
					if($response[0]['user_role'] == 1){
					session_start();
					/* Set session variables */
					foreach ($response as $row) {
						$_SESSION["user_id"] = $row['user_id']; /* userid of the user */
						$_SESSION["username"] = $row['f_name'];
						$_SESSION["user_role"] = 'user'; /* for user */
					}

					echo json_encode(array('success' => 'Logged In Successfully.'));
					exit;
					}else{
					echo json_encode(array('error' => 'Your account is blocked by \'Admin\''));
					exit;
					}
		            
				}else{
					echo json_encode(array('error'=>'email and Password not matched.')); exit;
				}
			}else{
				echo json_encode(array('error'=>'email and Password not matched.')); exit;
			}
		}
	}


	if(isset($_POST['user_logout'])){
	    /* Start the session */
	    session_start();
	    /* remove all session variables */
	    session_unset();
	    /* destroy the session */
	    session_destroy();

	    echo 'true'; exit;
	}

	if(isset($_POST['update'])){
		if(!isset($_POST['f_name']) || empty($_POST['f_name'])){
			echo json_encode(array('error'=>'First Name Field Empty.')); exit;
		}else if(!isset($_POST['l_name']) || empty($_POST['l_name'])){
			echo json_encode(array('error'=>'Last Name Field Empty.')); exit;
		}else if(!isset($_POST['mobile']) || empty($_POST['mobile'])){
			echo json_encode(array('error'=>'Mobile Number Field Empty.')); exit;
		}else if(!isset($_POST['address']) || empty($_POST['address'])){
			echo json_encode(array('error'=>'Address Field Empty.')); exit;
		}else if(!isset($_POST['city']) || empty($_POST['city'])){
			echo json_encode(array('error'=>'City Field Empty.')); exit;
		}else{
			$db = new Database();

			$params = [
				'f_name' => $db->escapeString($_POST['f_name']),
				'l_name' => $db->escapeString($_POST['l_name']),
				'mobile' => $db->escapeString($_POST['mobile']),
				'address' => $db->escapeString($_POST['address']),
				'city' => $db->escapeString($_POST['city'])
			];


			if(!session_id()){
				session_start();
			}
			$user_id = $_SESSION['user_id'];
			$db->update('user',$params,"user_id = '{$user_id}'");
			$response = $db->getResult();
			if(!empty($response)){
				echo json_encode(array('success'=>$response)); exit;
			}
			
		}
	}

	if(isset($_POST['modifyPass'])){
		// echo '1'; exit;
		if(!isset($_POST['old_pass']) || empty($_POST['old_pass'])){
			echo json_encode(array('error'=>'Old Passowrd field Empty')); exit;
		}elseif(!isset($_POST['new_pass']) || empty($_POST['new_pass'])){
			echo json_encode(array('error'=>'New Passowrd field Empty')); exit;
		}else{
			$db = new Database();

			$old = md5($db->escapeString($_POST['old_pass']));
			$new = md5($db->escapeString($_POST['new_pass']));

			if(!session_id()){ session_start(); }

			$user_id = $_SESSION['user_id'];

			$db->select('user','user_id',null,"user_id = '{$user_id}' AND password = '{$old}'",null,null);
			$exist = $db->getResult();

			if(!empty($exist)){
				$response = $db->update('user',array('password'=>$new),"user_id = '{$user_id}' AND password = '{$old}'");
				if(!empty($response)){
					echo json_encode(array('success'=>'success')); exit;
				}else{
					echo json_encode(array('error'=>'Password not changed.')); exit;
				}

			}else{
				echo json_encode(array('error'=>'Old Password is not matched.')); exit;
			}
		}
	}

if (isset($_POST['count']) && $_POST['count'] == 1){
	if (!session_id()) {
		session_start();
	}
	$db = new Database();
	$db->update("order_products", ['ntfcount' => 1], "product_user = " . $_SESSION['user_id'] . " AND (delivery = 1 OR delivery = 2) AND ntfcount = 0");
	echo 1;
	
}