<?php session_start(); include('../connection.php');
function sanitise($string){
  $string = strip_tags($string); // Remove HTML
  $string = htmlspecialchars($string); // Convert characters
  $string = trim(rtrim(ltrim($string))); // Remove spaces
  return $string;
}
$returnArr = [];


if($_POST['reason'] == 'create-user') {
	$fullname = $_POST['fullname'];
	$sign_email = $_POST['sign_email'];
	$sign_password = md5($_POST['sign_password']);
	$roles = 'manager';

  $selectUser = mysqli_query($con, "SELECT * FROM `users` WHERE email = '".$sign_email."'");
	if(mysqli_num_rows($selectUser) > 0) {
		$returnArr = [
			'error' => 'yes', 
			'message' => 'User Already Exist!',
		];	
	} else {
	  mysqli_query($con, "INSERT INTO `users`(`name`, `email`, `password`, `roles`) VALUES ('".$fullname."', '".$sign_email."', '".$sign_password."', '".$roles."')");
	 	$returnArr = [
			'error' => 'no', 
			'message' => 'User Created!',
		];
	}
	echo json_encode($returnArr);
}
if($_POST['reason'] == 'delete_user') {
	$user_id = $_POST['user_id'];
	$deleteUser = mysqli_query($con, "DELETE FROM `users` WHERE id = '".$user_id."'");
	$returnArr = [
		'error' => 'no', 
		'message' => 'Deleted Successfully!',
	];
	echo json_encode($returnArr);
}
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

if($_POST['reason'] == 'delete_shipment') {
	$shipment_id = $_POST['shipment_id'];
	$delete = mysqli_query($con, "DELETE FROM `shipment` WHERE id = '".$shipment_id."'");
	$returnArr = [
		'error' => 'no', 
		'message' => 'Shipment Deleted Successfully!',
	];
	echo json_encode($returnArr);
}

if($_POST['reason'] == 'delete_shipment_fields') {
	$tablename = $_POST['tablename'];
	$id = $_POST['id'];
	$delete = mysqli_query($con, "DELETE FROM `".$tablename."` WHERE id = '".$id."'");
	$returnArr = [
		'error' => 'no', 
		'message' => 'Deleted Successfully!',
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
	include('shipment-fields.php');

	if(isset($_POST['shipping_id'])){
		$shipping_id = $_POST['shipping_id'];

		mysqli_query($con, "UPDATE `shipment` SET `date`='".$date."',`bl_number`='".$bl_number."',`bl_date`='".$bl_date."',`igm_no`='".$igm_no."',`igm_date`='".$igm_date."',`index_no`='".$index_no."',`shipment_port`='".$shipment_port."',`collectorate`='".$collectorate."',`discharge_port`='".$discharge_port."',`consignee`='".$consignee."',`client`='".$client."',`consignor_name`='".$consignor_name."',`shipment_mode`='".$shipment_mode."',`gross_weight`='".$gross_weight."',`net_weight`='".$net_weight."',`gd_type`='".$gd_type."',`gd_number`='".$gd_number."',`gd_date`='".$gd_date."',`party_refrence`='".$party_refrence."',`other_refrence`='".$other_refrence."',`marks`='".$marks."',`package_no`='".$package_no."',`package_type`='".$package_type."',`container_no`='".$container_no."',`container_type`='".$container_type."',`currency`='".$currency."',`exchange_rate`='".$exchange_rate."',`delivery_term`='".$delivery_term."',`bank_name`='".$bank_name."',`payment_mode`='".$payment_mode."',`invoice_no`='".$invoice_no."',`invoice_date`='".$invoice_date."',`invoice_value`='".$invoice_value."',`lc_no`='".$lc_no."',`lc_date`='".$lc_date."',`lc_value`='".$lc_value."',`fob`='".$fob."',`freight`='".$freight."',`cfr`='".$cfr."',`item_description`='".$item_description."',`quantity`='".$quantity."',`quantity_mode`='".$quantity_mode."',`sea_fl_no`='".$sea_fl_no."',`sea_fl_value`='".$sea_fl_value."',`sea_fl_approved_date`='".$sea_fl_approved_date."',`sea_fl_expiry_date`='".$sea_fl_expiry_date."',`sea_invoice_status`='".$sea_invoice_status."',`sea_invoice_received_date`='".$sea_invoice_received_date."',`sea_invoice_source`='".$sea_invoice_source."',`sea_packing_list_status`='".$sea_packing_list_status."',`sea_packing_list_received_date`='".$sea_packing_list_received_date."',`sea_packing_list_source`='".$sea_packing_list_source."',`sea_bl_original_status`='".$sea_bl_original_status."',`sea_bl_original_received_date`='".$sea_bl_original_received_date."',`sea_bl_original_source`='".$sea_bl_original_source."',`sea_bl_copy_status`='".$sea_bl_copy_status."',`sea_bl_copy_received_date`='".$sea_bl_copy_received_date."',`sea_bl_copy_source`='".$sea_bl_copy_source."',`sea_lc_status`='".$sea_lc_status."',`sea_lc_received_date`='".$sea_lc_received_date."',`sea_lc_source`='".$sea_lc_source."',`sea_insurance_memo_status`='".$sea_insurance_memo_status."',`sea_insurance_memo_received_date`='".$sea_insurance_memo_received_date."',`sea_insurance_memo_source`='".$sea_insurance_memo_source."',`sea_fta_status`='".$sea_fta_status."',`sea_fta_received_date`='".$sea_fta_received_date."',`sea_fta_source`='".$sea_fta_source."',`sea_others_status`='".$sea_others_status."',`sea_others_details`='".$sea_others_details."',`sea_others_date`='".$sea_others_date."',`sea_others_source`='".$sea_others_source."',`air_fl_no`='".$air_fl_no."',`air_fl_value`='".$air_fl_value."',`air_fl_approved_date`='".$air_fl_approved_date."',`air_fl_expiry_date`='".$air_fl_expiry_date."',`air_invoice_status`='".$air_invoice_status."',`air_invoice_received_date`='".$air_invoice_received_date."',`air_invoice_source`='".$air_invoice_source."',`air_packing_list_status`='".$air_packing_list_status."',`air_packing_list_received_date`='".$air_packing_list_received_date."',`air_packing_list_source`='".$air_packing_list_source."',`air_bank_endorsement_status`='".$air_bank_endorsement_status."',`air_bank_endorsement_received_date`='".$air_bank_endorsement_received_date."',`air_bank_endorsement_source`='".$air_bank_endorsement_source."',`air_hawb_status`='".$air_hawb_status."',`air_hawb_received_date`='".$air_hawb_received_date."',`air_hawb_source`='".$air_hawb_source."',`air_mawb_status`='".$air_mawb_status."',`air_mawb_received_date`='".$air_mawb_received_date."',`air_mawb_source`='".$air_mawb_source."',`air_lc_status`='".$air_lc_status."',`air_lc_received_date`='".$air_lc_received_date."',`air_lc_source`='".$air_lc_source."',`air_insurance_memo_status`='".$air_insurance_memo_status."',`air_insurance_memo_received_date`='".$air_insurance_memo_received_date."',`air_insurance_memo_source`='".$air_insurance_memo_source."',`air_fta_status`='".$air_fta_status."',`air_fta_received_date`='".$air_fta_received_date."',`air_fta_source`='".$air_fta_source."',`air_others_status`='".$air_others_status."',`air_others_details`='".$air_others_details."',`air_others_date`='".$air_others_date."',`air_others_source`='".$air_others_source."',`shipment_arrival`='".$shipment_arrival."',`gd_status`='".$gd_status."',`funds_demand_send_on`='".$funds_demand_send_on."',`shipping_demand`='".$shipping_demand."',`do_collect_on`='".$do_collect_on."',`noc_valid_till`='".$noc_valid_till."',`shipment_delivered_on`='".$shipment_delivered_on."',`eir_received_on`='".$eir_received_on."',`refund_case_submit_on`='".$refund_case_submit_on."',`deposit_refund_on`='".$deposit_refund_on."',`refund_amount`='".$refund_amount."',`final_detention_amount`='".$final_detention_amount."',`free_days`='".$free_days."',`shipping_line`='".$shipping_line."',`shipping_line_type`='".$shipping_line_type."',`bill_status`='".$bill_status."',`bill_status_on`='".$bill_status_on."',`file_remarks`='".$file_remarks."',`file_additional_remarks`='".$file_additional_remarks."',`expense_description`='".$expense_description."',`expense_in_favor_of`='".$expense_in_favor_of."',`expense_rate_valid_till`='".$expense_rate_valid_till."',`expense_beneficiary`='".$expense_beneficiary."',`expense_amount`='".$expense_amount."',`document_name`='".$document_name."',`document_remarks`='".$document_remarks."'  WHERE id = $shipping_id");

		$returnArr = [
			'error' => 'no', 
			'purpose' => 'update', 
			'message' => "Shipment Updated!",
		];
	} else {
		mysqli_query($con, "INSERT INTO `shipment`(`date`, `bl_number`, `bl_date`, `igm_no`, `igm_date`, `index_no`, `shipment_port`, `collectorate`, `discharge_port`, `consignee`, `client`, `consignor_name`, `shipment_mode`, `gross_weight`, `net_weight`, `gd_type`, `gd_number`, `gd_date`, `party_refrence`, `other_refrence`, `marks`, `package_no`, `package_type`, `container_no`, `container_type`, `currency`, `exchange_rate`, `delivery_term`, `bank_name`, `payment_mode`, `invoice_no`, `invoice_date`, `invoice_value`, `lc_no`, `lc_date`, `lc_value`, `fob`, `freight`, `cfr`, `item_description`, `quantity`, `quantity_mode`, `sea_fl_no`, `sea_fl_value`, `sea_fl_approved_date`, `sea_fl_expiry_date`, `sea_invoice_status`, `sea_invoice_received_date`, `sea_invoice_source`, `sea_packing_list_status`, `sea_packing_list_received_date`, `sea_packing_list_source`, `sea_bl_original_status`, `sea_bl_original_received_date`, `sea_bl_original_source`, `sea_bl_copy_status`, `sea_bl_copy_received_date`, `sea_bl_copy_source`, `sea_lc_status`, `sea_lc_received_date`, `sea_lc_source`, `sea_insurance_memo_status`, `sea_insurance_memo_received_date`, `sea_insurance_memo_source`, `sea_fta_status`, `sea_fta_received_date`, `sea_fta_source`, `sea_others_status`, `sea_others_details`, `sea_others_date`, `sea_others_source`, `air_fl_no`, `air_fl_value`, `air_fl_approved_date`, `air_fl_expiry_date`, `air_invoice_status`, `air_invoice_received_date`, `air_invoice_source`, `air_packing_list_status`, `air_packing_list_received_date`, `air_packing_list_source`, `air_bank_endorsement_status`, `air_bank_endorsement_received_date`, `air_bank_endorsement_source`, `air_hawb_status`, `air_hawb_received_date`, `air_hawb_source`, `air_mawb_status`, `air_mawb_received_date`, `air_mawb_source`, `air_lc_status`, `air_lc_received_date`, `air_lc_source`, `air_insurance_memo_status`, `air_insurance_memo_received_date`, `air_insurance_memo_source`, `air_fta_status`, `air_fta_received_date`, `air_fta_source`, `air_others_status`, `air_others_details`, `air_others_date`, `air_others_source`, `shipment_arrival`, `gd_status`, `funds_demand_send_on`, `shipping_demand`, `do_collect_on`, `noc_valid_till`, `shipment_delivered_on`, `eir_received_on`, `refund_case_submit_on`, `deposit_refund_on`, `refund_amount`, `final_detention_amount`, `free_days`, `shipping_line`, `shipping_line_type`, `bill_status`, `bill_status_on`, `file_remarks`, `file_additional_remarks`, `expense_description`, `expense_in_favor_of`, `expense_rate_valid_till`, `expense_beneficiary`, `expense_amount`, `document_name`, `document_remarks`, `sea_invoice_upload`, `sea_packing_list_upload`, `sea_bl_original_upload`, `sea_bl_copy_upload`, `sea_lc_upload`, `sea_insurance_memo_upload`, `sea_fta_upload`, `sea_others_upload`, `air_invoice_upload`, `air_packing_list_upload`, `air_bank_endorsement_upload`, `air_hawb_upload`, `air_mawb_upload`, `air_lc_upload`, `air_insurance_memo_upload`, `air_fta_upload`, `air_others_upload`, `document_file`) VALUES ('".$date."', '".$bl_number."', '".$bl_date."', '".$igm_no."', '".$igm_date."', '".$index_no."', '".$shipment_port."', '".$collectorate."', '".$discharge_port."', '".$consignee."', '".$client."', '".$consignor_name."', '".$shipment_mode."', '".$gross_weight."', '".$net_weight."', '".$gd_type."', '".$gd_number."', '".$gd_date."', '".$party_refrence."', '".$other_refrence."', '".$marks."', '".$package_no."', '".$package_type."', '".$container_no."', '".$container_type."', '".$currency."', '".$exchange_rate."', '".$delivery_term."', '".$bank_name."', '".$payment_mode."', '".$invoice_no."', '".$invoice_date."', '".$invoice_value."', '".$lc_no."', '".$lc_date."', '".$lc_value."', '".$fob."', '".$freight."', '".$cfr."', '".$item_description."', '".$quantity."', '".$quantity_mode."', '".$sea_fl_no."', '".$sea_fl_value."', '".$sea_fl_approved_date."', '".$sea_fl_expiry_date."', '".$sea_invoice_status."', '".$sea_invoice_received_date."', '".$sea_invoice_source."', '".$sea_packing_list_status."', '".$sea_packing_list_received_date."', '".$sea_packing_list_source."', '".$sea_bl_original_status."', '".$sea_bl_original_received_date."', '".$sea_bl_original_source."', '".$sea_bl_copy_status."', '".$sea_bl_copy_received_date."', '".$sea_bl_copy_source."', '".$sea_lc_status."', '".$sea_lc_received_date."', '".$sea_lc_source."', '".$sea_insurance_memo_status."', '".$sea_insurance_memo_received_date."', '".$sea_insurance_memo_source."', '".$sea_fta_status."', '".$sea_fta_received_date."', '".$sea_fta_source."', '".$sea_others_status."', '".$sea_others_details."', '".$sea_others_date."', '".$sea_others_source."', '".$air_fl_no."', '".$air_fl_value."', '".$air_fl_approved_date."', '".$air_fl_expiry_date."', '".$air_invoice_status."', '".$air_invoice_received_date."', '".$air_invoice_source."', '".$air_packing_list_status."', '".$air_packing_list_received_date."', '".$air_packing_list_source."', '".$air_bank_endorsement_status."', '".$air_bank_endorsement_received_date."', '".$air_bank_endorsement_source."', '".$air_hawb_status."', '".$air_hawb_received_date."', '".$air_hawb_source."', '".$air_mawb_status."', '".$air_mawb_received_date."', '".$air_mawb_source."', '".$air_lc_status."', '".$air_lc_received_date."', '".$air_lc_source."', '".$air_insurance_memo_status."', '".$air_insurance_memo_received_date."', '".$air_insurance_memo_source."', '".$air_fta_status."', '".$air_fta_received_date."', '".$air_fta_source."', '".$air_others_status."', '".$air_others_details."', '".$air_others_date."', '".$air_others_source."', '".$shipment_arrival."', '".$gd_status."', '".$funds_demand_send_on."', '".$shipping_demand."', '".$do_collect_on."', '".$noc_valid_till."', '".$shipment_delivered_on."', '".$eir_received_on."', '".$refund_case_submit_on."', '".$deposit_refund_on."', '".$refund_amount."', '".$final_detention_amount."', '".$free_days."', '".$shipping_line."', '".$shipping_line_type."', '".$bill_status."', '".$bill_status_on."', '".$file_remarks."', '".$file_additional_remarks."', '".$expense_description."', '".$expense_in_favor_of."', '".$expense_rate_valid_till."', '".$expense_beneficiary."', '".$expense_amount."', '".$document_name."', '".$document_remarks."', '".$sea_invoice_upload_name."', '".$sea_packing_list_upload_name."', '".$sea_bl_original_upload_name."', '".$sea_bl_copy_upload_name."', '".$sea_lc_upload_name."', '".$sea_insurance_memo_upload_name."', '".$sea_fta_upload_name."', '".$sea_others_upload_name."', '".$air_invoice_upload_name."', '".$air_packing_list_upload_name."', '".$air_bank_endorsement_upload_name."', '".$air_hawb_upload_name."', '".$air_mawb_upload_name."', '".$air_lc_upload_name."', '".$air_insurance_memo_upload_name."', '".$air_fta_upload_name."', '".$air_others_upload_name."', '".$document_file_names."')");

			$shipment_id = mysqli_insert_id($con);
			$file_no = '000' . $shipment_id;
			$updateShipment = mysqli_query($con, "UPDATE `shipment` SET `file_no` = '".$file_no."' WHERE id = $shipment_id");

			$returnArr = [
				'error' => 'no', 
				'purpose' => 'insert', 
				'message' => "Shipment Inserted!",
				'shipping_id' => $shipment_id,
			];	
	}

	echo json_encode($returnArr);
}

if($_POST['reason'] == 'new_option') {
	  $table_name = $_POST['table_name'];
    $option_name = $_POST['option_name'];
    $insertOption = mysqli_query($con, "INSERT INTO `".$table_name."`(`name`) VALUES ('".$option_name."')");
    $option_id = mysqli_insert_id($con);

    $returnArr = [
			'error' => 'no', 
			'option_id' => $option_id
		];
	echo json_encode($returnArr);
}

if($_POST['reason'] == 'view_client') {
		$client_id = $_POST['client_id'];
		$client_arr = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM client WHERE id = $client_id"));
		echo json_encode($client_arr);
}
?>
