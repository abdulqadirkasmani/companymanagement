<?php session_start(); include('../connection.php');
function sanitise($string){
  $string = strip_tags($string); // Remove HTML
  $string = htmlspecialchars($string); // Convert characters
  $string = trim(rtrim(ltrim($string))); // Remove spaces
  return $string;
}
$returnArr = [];
if($_POST['reason'] == 'login') {
	$email = $_POST['femail'];
	$password = md5($_POST['password']);

	$selectUser = mysqli_query($con, "SELECT * FROM `users` WHERE email = '".$email."'");
	if(mysqli_num_rows($selectUser) > 0) {
		$user_arr = mysqli_fetch_array($selectUser);
		if($user_arr['password'] == $password) {
			$_SESSION['id'] = $user_arr['id'];
			$_SESSION['name'] = $user_arr['name'];
			$_SESSION['email'] = $user_arr['email'];	
			$_SESSION['role'] = $user_arr['roles'];
			$returnArr = [
				'error' => 'no', 
				'message' => 'Logged In!',
			];
		} else {
			$returnArr = [
				'error' => 'yes', 
				'message' => 'Password isn\'t matched!',
			];	
		}
	} else {
		$returnArr = [
			'error' => 'yes', 
			'message' => 'User does\'t exist!',
		];
	}
	
	echo json_encode($returnArr);
}

if($_POST['reason'] == 'delete_client') {
	$client_id = $_POST['client_id'];
	$delete = mysqli_query($con, "DELETE FROM `client` WHERE id = '".$client_id."'");
	$returnArr = [
		'error' => 'no', 
		'message' => 'Client Deleted Successfully!',
	];
	echo json_encode($returnArr);
}

if($_POST['reason'] == 'client_status') {
	$id = $_POST['id'];
    $status = $_POST['status'];
    $update = mysqli_query($con, "UPDATE client SET status = '".$status."' WHERE id = $id");
    $returnArr = [
		'error' => 'no', 
		'message' => 'Status Updated!',
	];
	echo json_encode($returnArr);
}

if($_POST['reason'] == 'create-client') {
	$name = sanitise($_POST['name']);
    $email = sanitise($_POST['email']);
    $address = sanitise($_POST['address']);
    $city = sanitise($_POST['city']);
    $phone = sanitise($_POST['phone']);
    $ntn = sanitise($_POST['ntn']);
    $str = sanitise($_POST['str']);
    $bank_name = sanitise($_POST['bank_name']);
    $account_no = sanitise($_POST['account_no']);
    $account_title = sanitise($_POST['account_title']);
    $branch_name = sanitise($_POST['branch_name']);
    $branch_code = sanitise($_POST['branch_code']);

    if(isset($_POST['id'])) {
    	$id = $_POST['id'];
	    $query = "UPDATE `client` SET `name`='".$name."',`email`='".$email."',`address`='".$address."',`city`='".$city."',`phone`='".$phone."',`ntn`='".$ntn."',`str`='".$str."',`bank_name`='".$bank_name."',`account_no`='".$account_no."',`account_title`='".$account_title."',`branch_name`='".$branch_name."',`branch_code`='".$branch_code."' WHERE id = $id";
	    $message = 'Client Updated!';
    } else {
	    $query = "INSERT INTO `client`(`name`, `email`, `address`, `city`, `phone`, `ntn`, `str`, `bank_name`, `account_no`, `account_title`, `branch_name`, `branch_code`) VALUES ('".$name."', '".$email."', '".$address."', '".$city."', '".$phone."', '".$ntn."', '".$str."', '".$bank_name."', '".$account_no."', '".$account_title."', '".$branch_name."', '".$branch_code."')";
	    $message = 'Client Created!';
    }
    
    if(mysqli_query($con, $query)) {
		$returnArr = [
			'error' => 'no', 
			'message' => $message,
		];
    } else {
		$returnArr = [
			'error' => 'yes', 
			'message' => "Error description: " . mysqli_error($con),
		];	
    }
	echo json_encode($returnArr);
}

if($_POST['reason'] == 'create-shipment') {
	print_r($_POST);
	die;
}
?>
