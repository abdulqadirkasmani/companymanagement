<?php 
$category = (isset($_POST['category'])) ? $_POST['category'] : '';
$gd_type = (isset($_POST['gd_type'])) ? $_POST['gd_type'] : '';
$shipment_type = (isset($_POST['shipment_type'])) ? $_POST['shipment_type'] : '';
$shipment_mode = (isset($_POST['shipment_mode'])) ? $_POST['shipment_mode'] : '';
$discharge_port = (isset($_POST['discharge_port'])) ? $_POST['discharge_port'] : '';
$collectorate = (isset($_POST['collectorate'])) ? $_POST['collectorate'] : '';
$b_l = (isset($_POST['b_l'])) ? $_POST['b_l'] : '';
$party_refrence = (isset($_POST['party_refrence'])) ? $_POST['party_refrence'] : '';
$other_refrence = (isset($_POST['other_refrence'])) ? $_POST['other_refrence'] : '';
$client = (isset($_POST['client'])) ? $_POST['client'] : '';
$importer = (isset($_POST['importer'])) ? $_POST['importer'] : '';
$shipping_line = (isset($_POST['shipping_line'])) ? $_POST['shipping_line'] : '';
$package_no = (isset($_POST['package_no'])) ? $_POST['package_no'] : '';
$package_type = (isset($_POST['package_type'])) ? $_POST['package_type'] : '';
$container_number = (isset($_POST['container_number'])) ? implode('||', $_POST['container_number']) : '';
$container_size_type = (isset($_POST['container_size_type'])) ? implode('||', $_POST['container_size_type']) : '';
$shipment_port = (isset($_POST['shipment_port'])) ? $_POST['shipment_port'] : '';
$quantity = (isset($_POST['quantity'])) ? $_POST['quantity'] : '';
$quantity_mode = (isset($_POST['quantity_mode'])) ? $_POST['quantity_mode'] : '';
$net_weight = (isset($_POST['net_weight'])) ? $_POST['net_weight'] : '';
$gross_weight = (isset($_POST['gross_weight'])) ? $_POST['gross_weight'] : '';
$gd_number = (isset($_POST['gd_number'])) ? $_POST['gd_number'] : '';
$index_no = (isset($_POST['index_no'])) ? $_POST['index_no'] : '';
$igm_no = (isset($_POST['igm_no'])) ? $_POST['igm_no'] : '';
$delivery_term = (isset($_POST['delivery_term'])) ? $_POST['delivery_term'] : '';
$payment_mode = (isset($_POST['payment_mode'])) ? $_POST['payment_mode'] : '';
$invoice_no = (isset($_POST['invoice_no'])) ? $_POST['invoice_no'] : '';
$currency = (isset($_POST['currency'])) ? $_POST['currency'] : '';
$exchange_rate = (isset($_POST['exchange_rate'])) ? $_POST['exchange_rate'] : '';
$payment_term = (isset($_POST['payment_term'])) ? $_POST['payment_term'] : '';
$lc_no = (isset($_POST['lc_no'])) ? $_POST['lc_no'] : '';
$lc_value = (isset($_POST['lc_value'])) ? $_POST['lc_value'] : '';
$bank_name = (isset($_POST['bank_name'])) ? $_POST['bank_name'] : '';
$gd_status = (isset($_POST['gd_status'])) ? $_POST['gd_status'] : '';
$free_days = (isset($_POST['free_days'])) ? $_POST['free_days'] : '';
$sea_fl_no = isset($_POST['sea_fl_no']) ? $_POST['sea_fl_no'] : '';
$sea_fl_value = isset($_POST['sea_fl_value']) ? $_POST['sea_fl_value'] : '';
$sea_invoice_status = isset($_POST['sea_invoice_status']) ? $_POST['sea_invoice_status'] : '';
$sea_invoice_source = isset($_POST['sea_invoice_source']) ? $_POST['sea_invoice_source'] : '';
$sea_packing_list_status = isset($_POST['sea_packing_list_status']) ? $_POST['sea_packing_list_status'] : '';
$sea_packing_list_source = isset($_POST['sea_packing_list_source']) ? $_POST['sea_packing_list_source'] : '';
$sea_bl_original_status = isset($_POST['sea_bl_original_status']) ? $_POST['sea_bl_original_status'] : '';
$sea_bl_original_source = isset($_POST['sea_bl_original_source']) ? $_POST['sea_bl_original_source'] : '';
$sea_bl_copy_status = isset($_POST['sea_bl_copy_status']) ? $_POST['sea_bl_copy_status'] : '';
$sea_bl_copy_source = isset($_POST['sea_bl_copy_source']) ? $_POST['sea_bl_copy_source'] : '';
$sea_lc_status = isset($_POST['sea_lc_status']) ? $_POST['sea_lc_status'] : '';
$sea_lc_source = isset($_POST['sea_lc_source']) ? $_POST['sea_lc_source'] : '';
$sea_insurance_memo_status = isset($_POST['sea_insurance_memo_status']) ? $_POST['sea_insurance_memo_status'] : '';
$sea_insurance_memo_source = isset($_POST['sea_insurance_memo_source']) ? $_POST['sea_insurance_memo_source'] : '';
$sea_fta_status = isset($_POST['sea_fta_status']) ? $_POST['sea_fta_status'] : '';
$sea_fta_source = isset($_POST['sea_fta_source']) ? $_POST['sea_fta_source'] : '';
$sea_others_status = isset($_POST['sea_others_status']) ? $_POST['sea_others_status'] : '';
$sea_others_details = isset($_POST['sea_others_details']) ? $_POST['sea_others_details'] : '';
$sea_others_source = isset($_POST['sea_others_source']) ? $_POST['sea_others_source'] : '';
$air_fl_no = isset($_POST['air_fl_no']) ? $_POST['air_fl_no'] : '';
$air_fl_value = isset($_POST['air_fl_value']) ? $_POST['air_fl_value'] : '';
$air_invoice_status = isset($_POST['air_invoice_status']) ? $_POST['air_invoice_status'] : '';
$air_invoice_source = isset($_POST['air_invoice_source']) ? $_POST['air_invoice_source'] : '';
$air_packing_list_status = isset($_POST['air_packing_list_status']) ? $_POST['air_packing_list_status'] : '';
$air_packing_list_source = isset($_POST['air_packing_list_source']) ? $_POST['air_packing_list_source'] : '';
$air_bank_endorsement_status = isset($_POST['air_bank_endorsement_status']) ? $_POST['air_bank_endorsement_status'] : '';
$air_bank_endorsement_source = isset($_POST['air_bank_endorsement_source']) ? $_POST['air_bank_endorsement_source'] : '';
$air_hawb_status = isset($_POST['air_hawb_status']) ? $_POST['air_hawb_status'] : '';
$air_hawb_source = isset($_POST['air_hawb_source']) ? $_POST['air_hawb_source'] : '';
$air_mawb_status = isset($_POST['air_mawb_status']) ? $_POST['air_mawb_status'] : '';
$air_mawb_source = isset($_POST['air_mawb_source']) ? $_POST['air_mawb_source'] : '';
$air_lc_status = isset($_POST['air_lc_status']) ? $_POST['air_lc_status'] : '';
$air_lc_source = isset($_POST['air_lc_source']) ? $_POST['air_lc_source'] : '';
$air_insurance_memo_status = isset($_POST['air_insurance_memo_status']) ? $_POST['air_insurance_memo_status'] : '';
$air_insurance_memo_source = isset($_POST['air_insurance_memo_source']) ? $_POST['air_insurance_memo_source'] : '';
$air_fta_status = isset($_POST['air_fta_status']) ? $_POST['air_fta_status'] : '';
$air_fta_source = isset($_POST['air_fta_source']) ? $_POST['air_fta_source'] : '';
$air_others_status = isset($_POST['air_others_status']) ? $_POST['air_others_status'] : '';
$air_others_details = isset($_POST['air_others_details']) ? $_POST['air_others_details'] : '';
$air_others_source = isset($_POST['air_others_source']) ? $_POST['air_others_source'] : '';
$expense_description = isset($_POST['expense_description']) ? implode('||', $_POST['expense_description']) : '';
$expense_in_favor_of = isset($_POST['expense_in_favor_of']) ? implode('||', $_POST['expense_in_favor_of']) : '';
$expense_amount = isset($_POST['expense_amount']) ? implode('||', $_POST['expense_amount']) : '';
$document_name = isset($_POST['document_name']) ? implode('||', $_POST['document_name']) : '';
$document_remarks = isset($_POST['document_remarks']) ? implode('||', $_POST['document_remarks']) : '';




$date = (isset($_POST['date'])) ? $_POST['date'] : '';
if($date != '') {
    $date = str_replace('/', '-', $date);
    $date = date("Y-m-d", strtotime($date) );
}

$gd_date = (isset($_POST['gd_date'])) ? $_POST['gd_date'] : '';
if($gd_date != '') {
    $gd_date = str_replace('/', '-', $gd_date);
    $gd_date = date("Y-m-d", strtotime($gd_date) );
}

$igm_date = (isset($_POST['igm_date'])) ? $_POST['igm_date'] : '';
if($igm_date != '') {
    $igm_date = str_replace('/', '-', $igm_date);
    $igm_date = date("Y-m-d", strtotime($igm_date) );
}

$invoice_date = (isset($_POST['invoice_date'])) ? $_POST['invoice_date'] : '';
if($invoice_date != '') {
    $invoice_date = str_replace('/', '-', $invoice_date);
    $invoice_date = date("Y-m-d", strtotime($invoice_date) );
}

$lc_date = (isset($_POST['lc_date'])) ? $_POST['lc_date'] : '';
if($lc_date != '') {
    $lc_date = str_replace('/', '-', $lc_date);
    $lc_date = date("Y-m-d", strtotime($lc_date) );
}

$sea_fl_approved_date = isset($_POST['sea_fl_approved_date']) ? $_POST['sea_fl_approved_date'] : '';
if($sea_fl_approved_date != '') {
    $sea_fl_approved_date = str_replace('/', '-', $sea_fl_approved_date);
    $sea_fl_approved_date = date("Y-m-d", strtotime($sea_fl_approved_date) );
}

$sea_fl_expiry_date = isset($_POST['sea_fl_expiry_date']) ? $_POST['sea_fl_expiry_date'] : '';
if($sea_fl_expiry_date != '') {
    $sea_fl_expiry_date = str_replace('/', '-', $sea_fl_expiry_date);
    $sea_fl_expiry_date = date("Y-m-d", strtotime($sea_fl_expiry_date) );
}

$sea_invoice_received_date = isset($_POST['sea_invoice_received_date']) ? $_POST['sea_invoice_received_date'] : '';
if($sea_invoice_received_date != '') {
    $sea_invoice_received_date = str_replace('/', '-', $sea_invoice_received_date);
    $sea_invoice_received_date = date("Y-m-d", strtotime($sea_invoice_received_date) );
}

$sea_packing_list_received_date = isset($_POST['sea_packing_list_received_date']) ? $_POST['sea_packing_list_received_date'] : '';
if($sea_packing_list_received_date != '') {
    $sea_packing_list_received_date = str_replace('/', '-', $sea_packing_list_received_date);
    $sea_packing_list_received_date = date("Y-m-d", strtotime($sea_packing_list_received_date) );
}

$sea_bl_original_received_date = isset($_POST['sea_bl_original_received_date']) ? $_POST['sea_bl_original_received_date'] : '';
if($sea_bl_original_received_date != '') {
    $sea_bl_original_received_date = str_replace('/', '-', $sea_bl_original_received_date);
    $sea_bl_original_received_date = date("Y-m-d", strtotime($sea_bl_original_received_date) );
}

$sea_bl_copy_received_date = isset($_POST['sea_bl_copy_received_date']) ? $_POST['sea_bl_copy_received_date'] : '';
if($sea_bl_copy_received_date != '') {
    $sea_bl_copy_received_date = str_replace('/', '-', $sea_bl_copy_received_date);
    $sea_bl_copy_received_date = date("Y-m-d", strtotime($sea_bl_copy_received_date) );
}

$sea_lc_received_date = isset($_POST['sea_lc_received_date']) ? $_POST['sea_lc_received_date'] : '';
if($sea_lc_received_date != '') {
    $sea_lc_received_date = str_replace('/', '-', $sea_lc_received_date);
    $sea_lc_received_date = date("Y-m-d", strtotime($sea_lc_received_date) );
}

$sea_insurance_memo_received_date = isset($_POST['sea_insurance_memo_received_date']) ? $_POST['sea_insurance_memo_received_date'] : '';
if($sea_insurance_memo_received_date != '') {
    $sea_insurance_memo_received_date = str_replace('/', '-', $sea_insurance_memo_received_date);
    $sea_insurance_memo_received_date = date("Y-m-d", strtotime($sea_insurance_memo_received_date) );
}

$sea_fta_received_date = isset($_POST['sea_fta_received_date']) ? $_POST['sea_fta_received_date'] : '';
if($sea_fta_received_date != '') {
    $sea_fta_received_date = str_replace('/', '-', $sea_fta_received_date);
    $sea_fta_received_date = date("Y-m-d", strtotime($sea_fta_received_date) );
}

$sea_others_date = isset($_POST['sea_others_date']) ? $_POST['sea_others_date'] : '';
if($sea_others_date != '') {
    $sea_others_date = str_replace('/', '-', $sea_others_date);
    $sea_others_date = date("Y-m-d", strtotime($sea_others_date) );
}

$air_fl_approved_date = isset($_POST['air_fl_approved_date']) ? $_POST['air_fl_approved_date'] : '';
if($air_fl_approved_date != '') {
    $air_fl_approved_date = str_replace('/', '-', $air_fl_approved_date);
    $air_fl_approved_date = date("Y-m-d", strtotime($air_fl_approved_date) );
}

$air_fl_expiry_date = isset($_POST['air_fl_expiry_date']) ? $_POST['air_fl_expiry_date'] : '';
if($air_fl_expiry_date != '') {
    $air_fl_expiry_date = str_replace('/', '-', $air_fl_expiry_date);
    $air_fl_expiry_date = date("Y-m-d", strtotime($air_fl_expiry_date) );
}

$air_invoice_received_date = isset($_POST['air_invoice_received_date']) ? $_POST['air_invoice_received_date'] : '';
if($air_invoice_received_date != '') {
    $air_invoice_received_date = str_replace('/', '-', $air_invoice_received_date);
    $air_invoice_received_date = date("Y-m-d", strtotime($air_invoice_received_date) );
}

$air_packing_list_received_date = isset($_POST['air_packing_list_received_date']) ? $_POST['air_packing_list_received_date'] : '';
if($air_packing_list_received_date != '') {
    $air_packing_list_received_date = str_replace('/', '-', $air_packing_list_received_date);
    $air_packing_list_received_date = date("Y-m-d", strtotime($air_packing_list_received_date) );
}

$air_bank_endorsement_received_date = isset($_POST['air_bank_endorsement_received_date']) ? $_POST['air_bank_endorsement_received_date'] : '';
if($air_bank_endorsement_received_date != '') {
    $air_bank_endorsement_received_date = str_replace('/', '-', $air_bank_endorsement_received_date);
    $air_bank_endorsement_received_date = date("Y-m-d", strtotime($air_bank_endorsement_received_date) );
}

$air_hawb_received_date = isset($_POST['air_hawb_received_date']) ? $_POST['air_hawb_received_date'] : '';
if($air_hawb_received_date != '') {
    $air_hawb_received_date = str_replace('/', '-', $air_hawb_received_date);
    $air_hawb_received_date = date("Y-m-d", strtotime($air_hawb_received_date) );
}

$air_mawb_received_date = isset($_POST['air_mawb_received_date']) ? $_POST['air_mawb_received_date'] : '';
if($air_mawb_received_date != '') {
    $air_mawb_received_date = str_replace('/', '-', $air_mawb_received_date);
    $air_mawb_received_date = date("Y-m-d", strtotime($air_mawb_received_date) );
}

$air_lc_received_date = isset($_POST['air_lc_received_date']) ? $_POST['air_lc_received_date'] : '';
if($air_lc_received_date != '') {
    $air_lc_received_date = str_replace('/', '-', $air_lc_received_date);
    $air_lc_received_date = date("Y-m-d", strtotime($air_lc_received_date) );
}

$air_insurance_memo_received_date = isset($_POST['air_insurance_memo_received_date']) ? $_POST['air_insurance_memo_received_date'] : '';
if($air_insurance_memo_received_date != '') {
    $air_insurance_memo_received_date = str_replace('/', '-', $air_insurance_memo_received_date);
    $air_insurance_memo_received_date = date("Y-m-d", strtotime($air_insurance_memo_received_date) );
}

$air_fta_received_date = isset($_POST['air_fta_received_date']) ? $_POST['air_fta_received_date'] : '';
if($air_fta_received_date != '') {
    $air_fta_received_date = str_replace('/', '-', $air_fta_received_date);
    $air_fta_received_date = date("Y-m-d", strtotime($air_fta_received_date) );
}

$air_others_date = isset($_POST['air_others_date']) ? $_POST['air_others_date'] : '';
if($air_others_date != '') {
    $air_others_date = str_replace('/', '-', $air_others_date);
    $air_others_date = date("Y-m-d", strtotime($air_others_date) );
}

$vessel_arrival = (isset($_POST['vessel_arrival'])) ? $_POST['vessel_arrival'] : '';
if($vessel_arrival != '') {
    $vessel_arrival = str_replace('/', '-', $vessel_arrival);
    $vessel_arrival = date("Y-m-d", strtotime($vessel_arrival) );
}

$do_collect_on = (isset($_POST['do_collect_on'])) ? $_POST['do_collect_on'] : '';
if($do_collect_on != '') {
    $do_collect_on = str_replace('/', '-', $do_collect_on);
    $do_collect_on = date("Y-m-d", strtotime($do_collect_on) );
}

$shipment_delivered_on = (isset($_POST['shipment_delivered_on'])) ? $_POST['shipment_delivered_on'] : '';
if($shipment_delivered_on != '') {
    $shipment_delivered_on = str_replace('/', '-', $shipment_delivered_on);
    $shipment_delivered_on = date("Y-m-d", strtotime($shipment_delivered_on) );
}

$eir_received_on = (isset($_POST['eir_received_on'])) ? $_POST['eir_received_on'] : '';
if($eir_received_on != '') {
    $eir_received_on = str_replace('/', '-', $eir_received_on);
    $eir_received_on = date("Y-m-d", strtotime($eir_received_on) );
}

$refund_case_submit_on = (isset($_POST['refund_case_submit_on'])) ? $_POST['refund_case_submit_on'] : '';
if($refund_case_submit_on != '') {
    $refund_case_submit_on = str_replace('/', '-', $refund_case_submit_on);
    $refund_case_submit_on = date("Y-m-d", strtotime($refund_case_submit_on) );
}

$deposit_refund_on = (isset($_POST['deposit_refund_on'])) ? $_POST['deposit_refund_on'] : '';
if($deposit_refund_on != '') {
    $deposit_refund_on = str_replace('/', '-', $deposit_refund_on);
    $deposit_refund_on = date("Y-m-d", strtotime($deposit_refund_on) );
}

$noc_valid_till = (isset($_POST['noc_valid_till'])) ? $_POST['noc_valid_till'] : '';
if($noc_valid_till != '') {
    $noc_valid_till = str_replace('/', '-', $noc_valid_till);
    $noc_valid_till = date("Y-m-d", strtotime($noc_valid_till) );
}

$expense_rate_valid_till = isset($_POST['expense_rate_valid_till']) ? $_POST['expense_rate_valid_till'] : '';
$expense_rate_valid_till_dates = '';
if(!empty($expense_rate_valid_till)) {
    for($till_inc = 0; $till_inc < count($expense_rate_valid_till); $till_inc)  {
        $expense_rate_valid_till_date = $expense_rate_valid_till[$till_inc];
        $expense_rate_valid_till_date = str_replace('/', '-', $expense_rate_valid_till_date);
        $expense_rate_valid_till_date = date("Y-m-d", strtotime($expense_rate_valid_till_date) );
        $expense_rate_valid_till_dates .= $expense_rate_valid_till_date . '||';
    }
}
$expense_rate_valid_till_dates = strpos($expense_rate_valid_till_dates, 0, -2);
$expense_rate_valid_till = $expense_rate_valid_till_dates;


$eir_received_file = $_FILES['eir_received_file'];
$eir_received_file_name = '';
if($eir_received_file['name'] != '') {
    $temp = explode(".", $eir_received_file["name"]);
    if($temp != '') {
        $newfilename = rand() . '.' . end($temp);
        $eir_received_file_name = $newfilename;
        move_uploaded_file($eir_received_file["tmp_name"], $uploadDir . $newfilename);
    }
}

$refund_case_submit_file = $_FILES['refund_case_submit_file'];
$refund_case_submit_file_name = '';
if($refund_case_submit_file['name'] != '') {
    $temp = explode(".", $refund_case_submit_file["name"]);
    if($temp != '') {
        $newfilename = rand() . '.' . end($temp);
        $refund_case_submit_file_name = $newfilename;
        move_uploaded_file($refund_case_submit_file["tmp_name"], $uploadDir . $newfilename);
    }
}


$sea_invoice_upload = $_FILES['sea_invoice_upload'];
$sea_invoice_upload_name = '';
if($sea_invoice_upload['name'] != '') {
    $temp = explode(".", $sea_invoice_upload["name"]);
    if($temp != '') {
        $newfilename = rand() . '.' . end($temp);
        $sea_invoice_upload_name = $newfilename;
        move_uploaded_file($sea_invoice_upload["tmp_name"], $uploadDir . $newfilename);
    }
}

$sea_packing_list_upload = $_FILES['sea_packing_list_upload'];
$sea_packing_list_upload_name = '';
if($sea_packing_list_upload['name'] != '') {
    $temp = explode(".", $sea_packing_list_upload["name"]);
    if($temp != '') {
        $newfilename = rand() . '.' . end($temp);
        $sea_packing_list_upload_name = $newfilename;
        move_uploaded_file($sea_packing_list_upload["tmp_name"], $uploadDir . $newfilename);
    }
}

$sea_bl_original_upload = $_FILES['sea_bl_original_upload'];
$sea_bl_original_upload_name = '';
if($sea_bl_original_upload['name'] != '') {
    $temp = explode(".", $sea_bl_original_upload["name"]);
    if($temp != '') {
        $newfilename = rand() . '.' . end($temp);
        $sea_bl_original_upload_name = $newfilename;
        move_uploaded_file($sea_bl_original_upload["tmp_name"], $uploadDir . $newfilename);
    }
}

$sea_bl_copy_upload = $_FILES['sea_bl_copy_upload'];
$sea_bl_copy_upload_name = '';
if($sea_bl_copy_upload['name'] != '') {
    $temp = explode(".", $sea_bl_copy_upload["name"]);
    if($temp != '') {
        $newfilename = rand() . '.' . end($temp);
        $sea_bl_copy_upload_name = $newfilename;
        move_uploaded_file($sea_bl_copy_upload["tmp_name"], $uploadDir . $newfilename);
    }
}

$sea_lc_upload = $_FILES['sea_lc_upload'];
$sea_lc_upload_name = '';
if($sea_lc_upload['name'] != '') {
    $temp = explode(".", $sea_lc_upload["name"]);
    if($temp != '') {
        $newfilename = rand() . '.' . end($temp);
        $sea_lc_upload_name = $newfilename;
        move_uploaded_file($sea_lc_upload["tmp_name"], $uploadDir . $newfilename);
    }
}

$sea_insurance_memo_upload = $_FILES['sea_insurance_memo_upload'];
$sea_insurance_memo_upload_name = '';
if($sea_insurance_memo_upload['name'] != '') {
    $temp = explode(".", $sea_insurance_memo_upload["name"]);
    if($temp != '') {
        $newfilename = rand() . '.' . end($temp);
        $sea_insurance_memo_upload_name = $newfilename;
        move_uploaded_file($sea_insurance_memo_upload["tmp_name"], $uploadDir . $newfilename);
    }
}

$sea_fta_upload = $_FILES['sea_fta_upload'];
$sea_fta_upload_name = '';
if($sea_fta_upload['name'] != '') {
    $temp = explode(".", $sea_fta_upload["name"]);
    if($temp != '') {
        $newfilename = rand() . '.' . end($temp);
        $sea_fta_upload_name = $newfilename;
        move_uploaded_file($sea_fta_upload["tmp_name"], $uploadDir . $newfilename);
    }
}

$sea_others_upload = $_FILES['sea_others_upload'];
$sea_others_upload_name = '';
if($sea_others_upload['name'] != '') {
    $temp = explode(".", $sea_others_upload["name"]);
    if($temp != '') {
        $newfilename = rand() . '.' . end($temp);
        $sea_others_upload_name = $newfilename;
        move_uploaded_file($sea_others_upload["tmp_name"], $uploadDir . $newfilename);
    }
}

$air_invoice_upload = $_FILES['air_invoice_upload'];
$air_invoice_upload_name = '';
if($air_invoice_upload['name'] != '') {
    $temp = explode(".", $air_invoice_upload["name"]);
    if($temp != '') {
        $newfilename = rand() . '.' . end($temp);
        $air_invoice_upload_name = $newfilename;
        move_uploaded_file($air_invoice_upload["tmp_name"], $uploadDir . $newfilename);
    }
}

$air_packing_list_upload = $_FILES['air_packing_list_upload'];
$air_packing_list_upload_name = '';
if($air_packing_list_upload['name'] != '') {
    $temp = explode(".", $air_packing_list_upload["name"]);
    if($temp != '') {
        $newfilename = rand() . '.' . end($temp);
        $air_packing_list_upload_name = $newfilename;
        move_uploaded_file($air_packing_list_upload["tmp_name"], $uploadDir . $newfilename);
    }
}

$air_bank_endorsement_upload = $_FILES['air_bank_endorsement_upload'];
$air_bank_endorsement_upload_name = '';
if($air_bank_endorsement_upload['name'] != '') {
    $temp = explode(".", $air_bank_endorsement_upload["name"]);
    if($temp != '') {
        $newfilename = rand() . '.' . end($temp);
        $air_bank_endorsement_upload_name = $newfilename;
        move_uploaded_file($air_bank_endorsement_upload["tmp_name"], $uploadDir . $newfilename);
    }
}

$air_hawb_upload = $_FILES['air_hawb_upload'];
$air_hawb_upload_name = '';
if($air_hawb_upload['name'] != '') {
    $temp = explode(".", $air_hawb_upload["name"]);
    if($temp != '') {
        $newfilename = rand() . '.' . end($temp);
        $air_hawb_upload_name = $newfilename;
        move_uploaded_file($air_hawb_upload["tmp_name"], $uploadDir . $newfilename);
    }
}

$air_mawb_upload = $_FILES['air_mawb_upload'];
$air_mawb_upload_name = '';
if($air_mawb_upload['name'] != '') {
    $temp = explode(".", $air_mawb_upload["name"]);
    if($temp != '') {
        $newfilename = rand() . '.' . end($temp);
        $air_mawb_upload_name = $newfilename;
        move_uploaded_file($air_mawb_upload["tmp_name"], $uploadDir . $newfilename);
    }
}

$air_lc_upload = $_FILES['air_lc_upload'];
$air_lc_upload_name = '';
if($air_lc_upload['name'] != '') {
    $temp = explode(".", $air_lc_upload["name"]);
    if($temp != '') {
        $newfilename = rand() . '.' . end($temp);
        $air_lc_upload_name = $newfilename;
        move_uploaded_file($air_lc_upload["tmp_name"], $uploadDir . $newfilename);
    }
}

$air_insurance_memo_upload = $_FILES['air_insurance_memo_upload'];
$air_insurance_memo_upload_name = '';
if($air_insurance_memo_upload['name'] != '') {
    $temp = explode(".", $air_insurance_memo_upload["name"]);
    if($temp != '') {
        $newfilename = rand() . '.' . end($temp);
        $air_insurance_memo_upload_name = $newfilename;
        move_uploaded_file($air_insurance_memo_upload["tmp_name"], $uploadDir . $newfilename);
    }
}

$air_fta_upload = $_FILES['air_fta_upload'];
$air_fta_upload_name = '';
if($air_fta_upload['name'] != '') {
    $temp = explode(".", $air_fta_upload["name"]);
    if($temp != '') {
        $newfilename = rand() . '.' . end($temp);
        $air_fta_upload_name = $newfilename;
        move_uploaded_file($air_fta_upload["tmp_name"], $uploadDir . $newfilename);
    }
}

$air_others_upload = $_FILES['air_others_upload'];
$air_others_upload_name = '';
if($air_others_upload['name'] != '') {
    $temp = explode(".", $air_others_upload["name"]);
    if($temp != '') {
        $newfilename = rand() . '.' . end($temp);
        $air_others_upload_name = $newfilename;
        move_uploaded_file($air_others_upload["tmp_name"], $uploadDir . $newfilename);
    }
}


$document_file = $_FILES['document_file'];
$document_file_names = '';
for($i = 0; $i < count($document_file['name']); $i++) {
    $temp = explode(".", $document_file["name"][$i]);
    if($temp != '') {
        $newfilename = rand() . $i . '.' . end($temp);
        $document_file_names .= $newfilename . ',';
        move_uploaded_file($document_file["tmp_name"][$i], $uploadDir . $newfilename);
    }
}
 ?>