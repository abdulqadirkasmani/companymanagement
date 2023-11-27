<?php 
// print_r($_POST);
// print_r($_FILES);
// die;
    $bl_number = (isset($_POST['bl_number'])) ? sanitise($_POST['bl_number']) : '';

    $igm_no = (isset($_POST['igm_no'])) ? sanitise($_POST['igm_no']) : '';
    $igm_date = (isset($_POST['igm_date'])) ? sanitise($_POST['igm_date']) : '';
    $index_no = (isset($_POST['index_no'])) ? sanitise($_POST['index_no']) : '';
    $shipment_port = (isset($_POST['shipment_port'])) ? sanitise($_POST['shipment_port']) : '';
    $collectorate = (isset($_POST['collectorate'])) ? sanitise($_POST['collectorate']) : '';
    $discharge_port = (isset($_POST['discharge_port'])) ? sanitise($_POST['discharge_port']) : '';
    $consignee = (isset($_POST['consignee'])) ? sanitise($_POST['consignee']) : '';
    $client = (isset($_POST['client'])) ? sanitise($_POST['client']) : '';
    $consignor_name = (isset($_POST['consignor_name'])) ? sanitise($_POST['consignor_name']) : '';
    $shipment_mode = (isset($_POST['shipment_mode'])) ? sanitise($_POST['shipment_mode']) : '';
    $gross_weight = (isset($_POST['gross_weight'])) ? sanitise($_POST['gross_weight']) : '';
    $net_weight = (isset($_POST['net_weight'])) ? sanitise($_POST['net_weight']) : '';
    $gd_type = (isset($_POST['gd_type'])) ? sanitise($_POST['gd_type']) : '';
    $gd_number = (isset($_POST['gd_number'])) ? sanitise($_POST['gd_number']) : '';
    $gd_date = (isset($_POST['gd_date'])) ? sanitise($_POST['gd_date']) : '';
    $party_refrence = (isset($_POST['party_refrence'])) ? sanitise($_POST['party_refrence']) : '';
    $other_refrence = (isset($_POST['other_refrence'])) ? sanitise($_POST['other_refrence']) : '';
    $marks = (isset($_POST['marks'])) ? sanitise($_POST['marks']) : '';

    $shipping_line = (isset($_POST['shipping_line'])) ? implode('||', $_POST['shipping_line']) : '';
    if($shipping_line != '') {
        $shipping_line = sanitise($shipping_line);
    }

    $shipping_line_type = (isset($_POST['shipping_line_type'])) ? implode('||', $_POST['shipping_line_type']) : '';
    if($shipping_line_type != '') {
        $shipping_line_type = sanitise($shipping_line_type);
    }

    $package_no = (isset($_POST['package_no'])) ? implode('||', $_POST['package_no']) : '';
    if($package_no != '') {
        $package_no = sanitise($package_no);
    }

    $package_type = (isset($_POST['package_type'])) ? implode('||', $_POST['package_type']) : '';
    if($package_type != '') {
        $package_type = sanitise($package_type);
    }

    $container_no = (isset($_POST['container_no'])) ? implode('||', $_POST['container_no']) : '';
    if($container_no != '') {
        $container_no = sanitise($container_no);
    }

    $container_type = (isset($_POST['container_type'])) ? implode('||', $_POST['container_type']) : '';
    if($container_type != '') {
        $container_type = sanitise($container_type);
    }

    $currency = (isset($_POST['currency'])) ? sanitise($_POST['currency']) : '';
    $exchange_rate = (isset($_POST['exchange_rate'])) ? sanitise($_POST['exchange_rate']) : '';
    $delivery_term = (isset($_POST['delivery_term'])) ? sanitise($_POST['delivery_term']) : '';
    $bank_name = (isset($_POST['bank_name'])) ? sanitise($_POST['bank_name']) : '';
    $payment_mode = (isset($_POST['payment_mode'])) ? sanitise($_POST['payment_mode']) : '';
    $invoice_no = (isset($_POST['invoice_no'])) ? sanitise($_POST['invoice_no']) : '';
    $invoice_date = (isset($_POST['invoice_date'])) ? sanitise($_POST['invoice_date']) : '';
    $invoice_value = (isset($_POST['invoice_value'])) ? sanitise($_POST['invoice_value']) : '';
    $lc_no = (isset($_POST['lc_no'])) ? sanitise($_POST['lc_no']) : '';
    $lc_date = (isset($_POST['lc_date'])) ? sanitise($_POST['lc_date']) : '';
    $lc_value = (isset($_POST['lc_value'])) ? sanitise($_POST['lc_value']) : '';
    $fob = (isset($_POST['fob'])) ? sanitise($_POST['fob']) : '';
    $freight = (isset($_POST['freight'])) ? sanitise($_POST['freight']) : '';
    $cfr = (isset($_POST['cfr'])) ? sanitise($_POST['cfr']) : '';
    $item_description = (isset($_POST['item_description'])) ? sanitise($_POST['item_description']) : '';
    $quantity = (isset($_POST['quantity'])) ? sanitise($_POST['quantity']) : '';
    $quantity_mode = (isset($_POST['quantity_mode'])) ? sanitise($_POST['quantity_mode']) : '';
    $sea_fl_no = (isset($_POST['sea_fl_no'])) ? sanitise($_POST['sea_fl_no']) : '';
    $sea_fl_value = (isset($_POST['sea_fl_value'])) ? sanitise($_POST['sea_fl_value']) : '';
    $sea_fl_approved_date = (isset($_POST['sea_fl_approved_date'])) ? sanitise($_POST['sea_fl_approved_date']) : '';
    $sea_fl_expiry_date = (isset($_POST['sea_fl_expiry_date'])) ? sanitise($_POST['sea_fl_expiry_date']) : '';
    $sea_invoice_status = (isset($_POST['sea_invoice_status'])) ? sanitise($_POST['sea_invoice_status']) : '';
    $sea_invoice_received_date = (isset($_POST['sea_invoice_received_date'])) ? sanitise($_POST['sea_invoice_received_date']) : '';
    $sea_invoice_source = (isset($_POST['sea_invoice_source'])) ? sanitise($_POST['sea_invoice_source']) : '';
    $sea_packing_list_status = (isset($_POST['sea_packing_list_status'])) ? sanitise($_POST['sea_packing_list_status']) : '';
    $sea_packing_list_received_date = (isset($_POST['sea_packing_list_received_date'])) ? sanitise($_POST['sea_packing_list_received_date']) : '';
    $sea_packing_list_source = (isset($_POST['sea_packing_list_source'])) ? sanitise($_POST['sea_packing_list_source']) : '';
    $sea_bl_original_status = (isset($_POST['sea_bl_original_status'])) ? sanitise($_POST['sea_bl_original_status']) : '';
    $sea_bl_original_received_date = (isset($_POST['sea_bl_original_received_date'])) ? sanitise($_POST['sea_bl_original_received_date']) : '';
    $sea_bl_original_source = (isset($_POST['sea_bl_original_source'])) ? sanitise($_POST['sea_bl_original_source']) : '';
    $sea_bl_copy_status = (isset($_POST['sea_bl_copy_status'])) ? sanitise($_POST['sea_bl_copy_status']) : '';
    $sea_bl_copy_received_date = (isset($_POST['sea_bl_copy_received_date'])) ? sanitise($_POST['sea_bl_copy_received_date']) : '';
    $sea_bl_copy_source = (isset($_POST['sea_bl_copy_source'])) ? sanitise($_POST['sea_bl_copy_source']) : '';
    $sea_lc_status = (isset($_POST['sea_lc_status'])) ? sanitise($_POST['sea_lc_status']) : '';
    $sea_lc_received_date = (isset($_POST['sea_lc_received_date'])) ? sanitise($_POST['sea_lc_received_date']) : '';
    $sea_lc_source = (isset($_POST['sea_lc_source'])) ? sanitise($_POST['sea_lc_source']) : '';
    $sea_insurance_memo_status = (isset($_POST['sea_insurance_memo_status'])) ? sanitise($_POST['sea_insurance_memo_status']) : '';
    $sea_insurance_memo_received_date = (isset($_POST['sea_insurance_memo_received_date'])) ? sanitise($_POST['sea_insurance_memo_received_date']) : '';
    $sea_insurance_memo_source = (isset($_POST['sea_insurance_memo_source'])) ? sanitise($_POST['sea_insurance_memo_source']) : '';
    $sea_fta_status = (isset($_POST['sea_fta_status'])) ? sanitise($_POST['sea_fta_status']) : '';
    $sea_fta_received_date = (isset($_POST['sea_fta_received_date'])) ? sanitise($_POST['sea_fta_received_date']) : '';
    $sea_fta_source = (isset($_POST['sea_fta_source'])) ? sanitise($_POST['sea_fta_source']) : '';
    $sea_others_status = (isset($_POST['sea_others_status'])) ? sanitise($_POST['sea_others_status']) : '';
    $sea_others_details = (isset($_POST['sea_others_details'])) ? sanitise($_POST['sea_others_details']) : '';
    $sea_others_date = (isset($_POST['sea_others_date'])) ? sanitise($_POST['sea_others_date']) : '';
    $sea_others_source = (isset($_POST['sea_others_source'])) ? sanitise($_POST['sea_others_source']) : '';

    $air_fl_no = (isset($_POST['air_fl_no'])) ? sanitise($_POST['air_fl_no']) : '';
    $air_fl_value = (isset($_POST['air_fl_value'])) ? sanitise($_POST['air_fl_value']) : '';
    $air_fl_approved_date = (isset($_POST['air_fl_approved_date'])) ? sanitise($_POST['air_fl_approved_date']) : '';
    $air_fl_expiry_date = (isset($_POST['air_fl_expiry_date'])) ? sanitise($_POST['air_fl_expiry_date']) : '';
    $air_invoice_status = (isset($_POST['air_invoice_status'])) ? sanitise($_POST['air_invoice_status']) : '';
    $air_invoice_received_date = (isset($_POST['air_invoice_received_date'])) ? sanitise($_POST['air_invoice_received_date']) : '';
    $air_invoice_source = (isset($_POST['air_invoice_source'])) ? sanitise($_POST['air_invoice_source']) : '';
    $air_packing_list_status = (isset($_POST['air_packing_list_status'])) ? sanitise($_POST['air_packing_list_status']) : '';
    $air_packing_list_received_date = (isset($_POST['air_packing_list_received_date'])) ? sanitise($_POST['air_packing_list_received_date']) : '';
    $air_packing_list_source = (isset($_POST['air_packing_list_source'])) ? sanitise($_POST['air_packing_list_source']) : '';
    $air_bank_endorsement_status = (isset($_POST['air_bank_endorsement_status'])) ? sanitise($_POST['air_bank_endorsement_status']) : '';
    $air_bank_endorsement_received_date = (isset($_POST['air_bank_endorsement_received_date'])) ? sanitise($_POST['air_bank_endorsement_received_date']) : '';
    $air_bank_endorsement_source = (isset($_POST['air_bank_endorsement_source'])) ? sanitise($_POST['air_bank_endorsement_source']) : '';
    $air_hawb_status = (isset($_POST['air_hawb_status'])) ? sanitise($_POST['air_hawb_status']) : '';
    $air_hawb_received_date = (isset($_POST['air_hawb_received_date'])) ? sanitise($_POST['air_hawb_received_date']) : '';
    $air_hawb_source = (isset($_POST['air_hawb_source'])) ? sanitise($_POST['air_hawb_source']) : '';
    $air_mawb_status = (isset($_POST['air_mawb_status'])) ? sanitise($_POST['air_mawb_status']) : '';
    $air_mawb_received_date = (isset($_POST['air_mawb_received_date'])) ? sanitise($_POST['air_mawb_received_date']) : '';
    $air_mawb_source = (isset($_POST['air_mawb_source'])) ? sanitise($_POST['air_mawb_source']) : '';
    $air_lc_status = (isset($_POST['air_lc_status'])) ? sanitise($_POST['air_lc_status']) : '';
    $air_lc_received_date = (isset($_POST['air_lc_received_date'])) ? sanitise($_POST['air_lc_received_date']) : '';
    $air_lc_source = (isset($_POST['air_lc_source'])) ? sanitise($_POST['air_lc_source']) : '';
    $air_insurance_memo_status = (isset($_POST['air_insurance_memo_status'])) ? sanitise($_POST['air_insurance_memo_status']) : '';
    $air_insurance_memo_received_date = (isset($_POST['air_insurance_memo_received_date'])) ? sanitise($_POST['air_insurance_memo_received_date']) : '';
    $air_insurance_memo_source = (isset($_POST['air_insurance_memo_source'])) ? sanitise($_POST['air_insurance_memo_source']) : '';
    $air_fta_status = (isset($_POST['air_fta_status'])) ? sanitise($_POST['air_fta_status']) : '';
    $air_fta_received_date = (isset($_POST['air_fta_received_date'])) ? sanitise($_POST['air_fta_received_date']) : '';
    $air_fta_source = (isset($_POST['air_fta_source'])) ? sanitise($_POST['air_fta_source']) : '';
    $air_others_status = (isset($_POST['air_others_status'])) ? sanitise($_POST['air_others_status']) : '';
    $air_others_details = (isset($_POST['air_others_details'])) ? sanitise($_POST['air_others_details']) : '';
    $air_others_date = (isset($_POST['air_others_date'])) ? sanitise($_POST['air_others_date']) : '';
    $air_others_source = (isset($_POST['air_others_source'])) ? sanitise($_POST['air_others_source']) : '';

    $shipment_arrival = (isset($_POST['shipment_arrival'])) ? sanitise($_POST['shipment_arrival']) : '';
    $gd_status = (isset($_POST['gd_status'])) ? sanitise($_POST['gd_status']) : '';
    $funds_demand_send_on = (isset($_POST['funds_demand_send_on'])) ? sanitise($_POST['funds_demand_send_on']) : '';
    $shipping_demand = (isset($_POST['shipping_demand'])) ? sanitise($_POST['shipping_demand']) : '';
    $do_collect_on = (isset($_POST['do_collect_on'])) ? sanitise($_POST['do_collect_on']) : '';
    $noc_valid_till = (isset($_POST['noc_valid_till'])) ? sanitise($_POST['noc_valid_till']) : '';
    $shipment_delivered_on = (isset($_POST['shipment_delivered_on'])) ? sanitise($_POST['shipment_delivered_on']) : '';
    $eir_received_on = (isset($_POST['eir_received_on'])) ? sanitise($_POST['eir_received_on']) : '';
    $refund_case_submit_on = (isset($_POST['refund_case_submit_on'])) ? sanitise($_POST['refund_case_submit_on']) : '';
    $deposit_refund_on = (isset($_POST['deposit_refund_on'])) ? sanitise($_POST['deposit_refund_on']) : '';
    $refund_amount = (isset($_POST['refund_amount'])) ? sanitise($_POST['refund_amount']) : '';
    $final_detention_amount = (isset($_POST['final_detention_amount'])) ? sanitise($_POST['final_detention_amount']) : '';
    $free_days = (isset($_POST['free_days'])) ? sanitise($_POST['free_days']) : '';
    
    $bill_status = (isset($_POST['bill_status'])) ? sanitise($_POST['bill_status']) : '';
    
    $file_remarks = (isset($_POST['file_remarks'])) ? sanitise($_POST['file_remarks']) : '';
    $file_additional_remarks = (isset($_POST['file_additional_remarks'])) ? sanitise($_POST['file_additional_remarks']) : '';

    $expense_description = (isset($_POST['expense_description'])) ? implode('||', $_POST['expense_description']) : '';
    if($expense_description != '') {
        $expense_description = sanitise($expense_description);
    }
    
    $expense_in_favor_of = (isset($_POST['expense_in_favor_of'])) ? implode('||', $_POST['expense_in_favor_of']) : '';
    if($expense_in_favor_of != '') {
        $expense_in_favor_of = sanitise($expense_in_favor_of);
    }
    
    $expense_rate_valid_till = '';
    if(isset($_POST['expense_rate_valid_till'])) {
        $expense_rate_valid_till_arr = $_POST['expense_rate_valid_till'];
        for($i = 0; $i < count($expense_rate_valid_till_arr); $i++) {
            if($expense_rate_valid_till_arr[$i] != '') {
                $expense_rate_valid_till_cur = str_replace('/', '-', $expense_rate_valid_till_arr[$i]);
                $expense_rate_valid_till_cur = date("Y-m-d", strtotime($expense_rate_valid_till_cur) );
                $expense_rate_valid_till .= $expense_rate_valid_till_cur . '||';
            }
        }
    }
    $expense_rate_valid_till = substr($expense_rate_valid_till,0, -2); 
    // $expense_rate_valid_till = (isset($_POST['expense_rate_valid_till'])) ? implode('||', $_POST['expense_rate_valid_till']) : '';
    
    $expense_beneficiary = (isset($_POST['expense_beneficiary'])) ? implode('||', $_POST['expense_beneficiary']) : '';
    if($expense_beneficiary != '') {
        $expense_beneficiary = sanitise($expense_beneficiary);
    }
    
    $expense_amount = (isset($_POST['expense_amount'])) ? implode('||', $_POST['expense_amount']) : '';
    if($expense_amount != '') {
        $expense_amount = sanitise($expense_amount);
    }
    
    $document_name = (isset($_POST['document_name'])) ? implode('||', $_POST['document_name']) : '';
    if($document_name != '') {
        $document_name = sanitise($document_name);
    }
    
    $document_remarks = (isset($_POST['document_remarks'])) ? implode('||', $_POST['document_remarks']) : '';
    if($document_remarks != '') {
        $document_remarks = sanitise($document_remarks);
    }


    $date = (isset($_POST['date'])) ? sanitise($_POST['date']) : '';
    if($date != '') {
        $date = str_replace('/', '-', $date);
        $date = date("Y-m-d", strtotime($date) );
    }
    $bl_date = (isset($_POST['date'])) ? sanitise($_POST['date']) : '';
    if($date != '') {
        $date = str_replace('/', '-', $date);
        $date = date("Y-m-d", strtotime($date) );
    }

    $gd_date = (isset($_POST['gd_date'])) ? sanitise($_POST['gd_date']) : '';
    if($gd_date != '') {
        $gd_date = str_replace('/', '-', $gd_date);
        $gd_date = date("Y-m-d", strtotime($gd_date) );
    }

    $igm_date = (isset($_POST['igm_date'])) ? sanitise($_POST['igm_date']) : '';
    if($igm_date != '') {
        $igm_date = str_replace('/', '-', $igm_date);
        $igm_date = date("Y-m-d", strtotime($igm_date) );
    }

    $invoice_date = (isset($_POST['invoice_date'])) ? sanitise($_POST['invoice_date']) : '';
    if($invoice_date != '') {
        $invoice_date = str_replace('/', '-', $invoice_date);
        $invoice_date = date("Y-m-d", strtotime($invoice_date) );
    }

    $lc_date = (isset($_POST['lc_date'])) ? sanitise($_POST['lc_date']) : '';
    if($lc_date != '') {
        $lc_date = str_replace('/', '-', $lc_date);
        $lc_date = date("Y-m-d", strtotime($lc_date) );
    }

    $sea_fl_approved_date = isset($_POST['sea_fl_approved_date']) ? sanitise($_POST['sea_fl_approved_date']) : '';
    if($sea_fl_approved_date != '') {
        $sea_fl_approved_date = str_replace('/', '-', $sea_fl_approved_date);
        $sea_fl_approved_date = date("Y-m-d", strtotime($sea_fl_approved_date) );
    }

    $sea_fl_expiry_date = isset($_POST['sea_fl_expiry_date']) ? sanitise($_POST['sea_fl_expiry_date']) : '';
    if($sea_fl_expiry_date != '') {
        $sea_fl_expiry_date = str_replace('/', '-', $sea_fl_expiry_date);
        $sea_fl_expiry_date = date("Y-m-d", strtotime($sea_fl_expiry_date) );
    }

    $sea_invoice_received_date = isset($_POST['sea_invoice_received_date']) ? sanitise($_POST['sea_invoice_received_date']) : '';
    if($sea_invoice_received_date != '') {
        $sea_invoice_received_date = str_replace('/', '-', $sea_invoice_received_date);
        $sea_invoice_received_date = date("Y-m-d", strtotime($sea_invoice_received_date) );
    }

    $sea_packing_list_received_date = isset($_POST['sea_packing_list_received_date']) ? sanitise($_POST['sea_packing_list_received_date']) : '';
    if($sea_packing_list_received_date != '') {
        $sea_packing_list_received_date = str_replace('/', '-', $sea_packing_list_received_date);
        $sea_packing_list_received_date = date("Y-m-d", strtotime($sea_packing_list_received_date) );
    }

    $sea_bl_original_received_date = isset($_POST['sea_bl_original_received_date']) ? sanitise($_POST['sea_bl_original_received_date']) : '';
    if($sea_bl_original_received_date != '') {
        $sea_bl_original_received_date = str_replace('/', '-', $sea_bl_original_received_date);
        $sea_bl_original_received_date = date("Y-m-d", strtotime($sea_bl_original_received_date) );
    }

    $sea_bl_copy_received_date = isset($_POST['sea_bl_copy_received_date']) ? sanitise($_POST['sea_bl_copy_received_date']) : '';
    if($sea_bl_copy_received_date != '') {
        $sea_bl_copy_received_date = str_replace('/', '-', $sea_bl_copy_received_date);
        $sea_bl_copy_received_date = date("Y-m-d", strtotime($sea_bl_copy_received_date) );
    }

    $sea_lc_received_date = isset($_POST['sea_lc_received_date']) ? sanitise($_POST['sea_lc_received_date']) : '';
    if($sea_lc_received_date != '') {
        $sea_lc_received_date = str_replace('/', '-', $sea_lc_received_date);
        $sea_lc_received_date = date("Y-m-d", strtotime($sea_lc_received_date) );
    }

    $sea_insurance_memo_received_date = isset($_POST['sea_insurance_memo_received_date']) ? sanitise($_POST['sea_insurance_memo_received_date']) : '';
    if($sea_insurance_memo_received_date != '') {
        $sea_insurance_memo_received_date = str_replace('/', '-', $sea_insurance_memo_received_date);
        $sea_insurance_memo_received_date = date("Y-m-d", strtotime($sea_insurance_memo_received_date) );
    }

    $sea_fta_received_date = isset($_POST['sea_fta_received_date']) ? sanitise($_POST['sea_fta_received_date']) : '';
    if($sea_fta_received_date != '') {
        $sea_fta_received_date = str_replace('/', '-', $sea_fta_received_date);
        $sea_fta_received_date = date("Y-m-d", strtotime($sea_fta_received_date) );
    }

    $sea_others_date = isset($_POST['sea_others_date']) ? sanitise($_POST['sea_others_date']) : '';
    if($sea_others_date != '') {
        $sea_others_date = str_replace('/', '-', $sea_others_date);
        $sea_others_date = date("Y-m-d", strtotime($sea_others_date) );
    }

    $air_fl_approved_date = isset($_POST['air_fl_approved_date']) ? sanitise($_POST['air_fl_approved_date']) : '';
    if($air_fl_approved_date != '') {
        $air_fl_approved_date = str_replace('/', '-', $air_fl_approved_date);
        $air_fl_approved_date = date("Y-m-d", strtotime($air_fl_approved_date) );
    }

    $air_fl_expiry_date = isset($_POST['air_fl_expiry_date']) ? sanitise($_POST['air_fl_expiry_date']) : '';
    if($air_fl_expiry_date != '') {
        $air_fl_expiry_date = str_replace('/', '-', $air_fl_expiry_date);
        $air_fl_expiry_date = date("Y-m-d", strtotime($air_fl_expiry_date) );
    }

    $air_invoice_received_date = isset($_POST['air_invoice_received_date']) ? sanitise($_POST['air_invoice_received_date']) : '';
    if($air_invoice_received_date != '') {
        $air_invoice_received_date = str_replace('/', '-', $air_invoice_received_date);
        $air_invoice_received_date = date("Y-m-d", strtotime($air_invoice_received_date) );
    }

    $air_packing_list_received_date = isset($_POST['air_packing_list_received_date']) ? sanitise($_POST['air_packing_list_received_date']) : '';
    if($air_packing_list_received_date != '') {
        $air_packing_list_received_date = str_replace('/', '-', $air_packing_list_received_date);
        $air_packing_list_received_date = date("Y-m-d", strtotime($air_packing_list_received_date) );
    }

    $air_bank_endorsement_received_date = isset($_POST['air_bank_endorsement_received_date']) ? sanitise($_POST['air_bank_endorsement_received_date']) : '';
    if($air_bank_endorsement_received_date != '') {
        $air_bank_endorsement_received_date = str_replace('/', '-', $air_bank_endorsement_received_date);
        $air_bank_endorsement_received_date = date("Y-m-d", strtotime($air_bank_endorsement_received_date) );
    }

    $air_hawb_received_date = isset($_POST['air_hawb_received_date']) ? sanitise($_POST['air_hawb_received_date']) : '';
    if($air_hawb_received_date != '') {
        $air_hawb_received_date = str_replace('/', '-', $air_hawb_received_date);
        $air_hawb_received_date = date("Y-m-d", strtotime($air_hawb_received_date) );
    }

    $air_mawb_received_date = isset($_POST['air_mawb_received_date']) ? sanitise($_POST['air_mawb_received_date']) : '';
    if($air_mawb_received_date != '') {
        $air_mawb_received_date = str_replace('/', '-', $air_mawb_received_date);
        $air_mawb_received_date = date("Y-m-d", strtotime($air_mawb_received_date) );
    }

    $air_lc_received_date = isset($_POST['air_lc_received_date']) ? sanitise($_POST['air_lc_received_date']) : '';
    if($air_lc_received_date != '') {
        $air_lc_received_date = str_replace('/', '-', $air_lc_received_date);
        $air_lc_received_date = date("Y-m-d", strtotime($air_lc_received_date) );
    }

    $air_insurance_memo_received_date = isset($_POST['air_insurance_memo_received_date']) ? sanitise($_POST['air_insurance_memo_received_date']) : '';
    if($air_insurance_memo_received_date != '') {
        $air_insurance_memo_received_date = str_replace('/', '-', $air_insurance_memo_received_date);
        $air_insurance_memo_received_date = date("Y-m-d", strtotime($air_insurance_memo_received_date) );
    }

    $air_fta_received_date = isset($_POST['air_fta_received_date']) ? sanitise($_POST['air_fta_received_date']) : '';
    if($air_fta_received_date != '') {
        $air_fta_received_date = str_replace('/', '-', $air_fta_received_date);
        $air_fta_received_date = date("Y-m-d", strtotime($air_fta_received_date) );
    }

    $air_others_date = isset($_POST['air_others_date']) ? sanitise($_POST['air_others_date']) : '';
    if($air_others_date != '') {
        $air_others_date = str_replace('/', '-', $air_others_date);
        $air_others_date = date("Y-m-d", strtotime($air_others_date) );
    }

    $vessel_arrival = (isset($_POST['vessel_arrival'])) ? sanitise($_POST['vessel_arrival']) : '';
    if($vessel_arrival != '') {
        $vessel_arrival = str_replace('/', '-', $vessel_arrival);
        $vessel_arrival = date("Y-m-d", strtotime($vessel_arrival) );
    }

    $do_collect_on = (isset($_POST['do_collect_on'])) ? sanitise($_POST['do_collect_on']) : '';
    if($do_collect_on != '') {
        $do_collect_on = str_replace('/', '-', $do_collect_on);
        $do_collect_on = date("Y-m-d", strtotime($do_collect_on) );
    }

    $shipment_delivered_on = (isset($_POST['shipment_delivered_on'])) ? sanitise($_POST['shipment_delivered_on']) : '';
    if($shipment_delivered_on != '') {
        $shipment_delivered_on = str_replace('/', '-', $shipment_delivered_on);
        $shipment_delivered_on = date("Y-m-d", strtotime($shipment_delivered_on) );
    }

    $eir_received_on = (isset($_POST['eir_received_on'])) ? sanitise($_POST['eir_received_on']) : '';
    if($eir_received_on != '') {
        $eir_received_on = str_replace('/', '-', $eir_received_on);
        $eir_received_on = date("Y-m-d", strtotime($eir_received_on) );
    }

    $refund_case_submit_on = (isset($_POST['refund_case_submit_on'])) ? sanitise($_POST['refund_case_submit_on']) : '';
    if($refund_case_submit_on != '') {
        $refund_case_submit_on = str_replace('/', '-', $refund_case_submit_on);
        $refund_case_submit_on = date("Y-m-d", strtotime($refund_case_submit_on) );
    }

    $deposit_refund_on = (isset($_POST['deposit_refund_on'])) ? sanitise($_POST['deposit_refund_on']) : '';
    if($deposit_refund_on != '') {
        $deposit_refund_on = str_replace('/', '-', $deposit_refund_on);
        $deposit_refund_on = date("Y-m-d", strtotime($deposit_refund_on) );
    }

    $noc_valid_till = (isset($_POST['noc_valid_till'])) ? sanitise($_POST['noc_valid_till']) : '';
    if($noc_valid_till != '') {
        $noc_valid_till = str_replace('/', '-', $noc_valid_till);
        $noc_valid_till = date("Y-m-d", strtotime($noc_valid_till) );
    }

    
    $bill_status_on = (isset($_POST['bill_status_on'])) ? sanitise($_POST['bill_status_on']) : '';
    if($bill_status_on != '') {
        $bill_status_on = str_replace('/', '-', $bill_status_on);
        $bill_status_on = date("Y-m-d", strtotime($bill_status_on) );
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
        if(isset($_POST['shipping_id'])){
            $shipping_id = $_POST['shipping_id'];
            mysqli_query($con, "UPDATE shipment SET sea_invoice_upload = '".$sea_invoice_upload_name."' WHERE id = $shipping_id");
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
        if(isset($_POST['shipping_id'])){
            $shipping_id = $_POST['shipping_id'];
            mysqli_query($con, "UPDATE shipment SET sea_packing_list_upload = '".$sea_packing_list_upload_name."' WHERE id = $shipping_id");
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
        if(isset($_POST['shipping_id'])){
            $shipping_id = $_POST['shipping_id'];
            mysqli_query($con, "UPDATE shipment SET sea_bl_original_upload = '".$sea_bl_original_upload_name."' WHERE id = $shipping_id");
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
        if(isset($_POST['shipping_id'])){
            $shipping_id = $_POST['shipping_id'];
            mysqli_query($con, "UPDATE shipment SET sea_bl_copy_upload = '".$sea_bl_copy_upload_name."' WHERE id = $shipping_id");
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
        if(isset($_POST['shipping_id'])){
            $shipping_id = $_POST['shipping_id'];
            mysqli_query($con, "UPDATE shipment SET sea_lc_upload = '".$sea_lc_upload_name."' WHERE id = $shipping_id");
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
        if(isset($_POST['shipping_id'])){
            $shipping_id = $_POST['shipping_id'];
            mysqli_query($con, "UPDATE shipment SET sea_insurance_memo_upload = '".$sea_insurance_memo_upload_name."' WHERE id = $shipping_id");
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
        if(isset($_POST['shipping_id'])){
            $shipping_id = $_POST['shipping_id'];
            mysqli_query($con, "UPDATE shipment SET sea_fta_upload = '".$sea_fta_upload_name."' WHERE id = $shipping_id");
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
        if(isset($_POST['shipping_id'])){
            $shipping_id = $_POST['shipping_id'];
            mysqli_query($con, "UPDATE shipment SET sea_others_upload = '".$sea_others_upload_name."' WHERE id = $shipping_id");
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
        if(isset($_POST['shipping_id'])){
            $shipping_id = $_POST['shipping_id'];
            mysqli_query($con, "UPDATE shipment SET air_invoice_upload = '".$air_invoice_upload_name."' WHERE id = $shipping_id");
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
        if(isset($_POST['shipping_id'])){
            $shipping_id = $_POST['shipping_id'];
            mysqli_query($con, "UPDATE shipment SET air_packing_list_upload = '".$air_packing_list_upload_name."' WHERE id = $shipping_id");
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
        if(isset($_POST['shipping_id'])){
            $shipping_id = $_POST['shipping_id'];
            mysqli_query($con, "UPDATE shipment SET air_bank_endorsement_upload = '".$air_bank_endorsement_upload_name."' WHERE id = $shipping_id");
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
        if(isset($_POST['shipping_id'])){
            $shipping_id = $_POST['shipping_id'];
            mysqli_query($con, "UPDATE shipment SET air_hawb_upload = '".$air_hawb_upload_name."' WHERE id = $shipping_id");
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
        if(isset($_POST['shipping_id'])){
            $shipping_id = $_POST['shipping_id'];
            mysqli_query($con, "UPDATE shipment SET air_mawb_upload = '".$air_mawb_upload_name."' WHERE id = $shipping_id");
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
        if(isset($_POST['shipping_id'])){
            $shipping_id = $_POST['shipping_id'];
            mysqli_query($con, "UPDATE shipment SET air_lc_upload = '".$air_lc_upload_name."' WHERE id = $shipping_id");
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
        if(isset($_POST['shipping_id'])){
            $shipping_id = $_POST['shipping_id'];
            mysqli_query($con, "UPDATE shipment SET air_insurance_memo_upload = '".$air_insurance_memo_upload_name."' WHERE id = $shipping_id");
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
        if(isset($_POST['shipping_id'])){
            $shipping_id = $_POST['shipping_id'];
            mysqli_query($con, "UPDATE shipment SET air_fta_upload = '".$air_fta_upload_name."' WHERE id = $shipping_id");
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
        if(isset($_POST['shipping_id'])){
            $shipping_id = $_POST['shipping_id'];
            mysqli_query($con, "UPDATE shipment SET air_others_upload = '".$air_others_upload_name."' WHERE id = $shipping_id");
        }
    }


    $document_file = $_FILES['document_file'];
    $document_file_names = '';
    for($i = 0; $i < count($document_file['name']); $i++) {
        if(!isset($_POST['shipping_id'])){
            if($document_file["name"][$i] != '') {
                $temp = explode(".", $document_file["name"][$i]);
                if($temp != '') {
                    $newfilename = rand() . $i . '.' . end($temp);
                    $document_file_names .= $newfilename . ',';
                    move_uploaded_file($document_file["tmp_name"][$i], $uploadDir . $newfilename);
                }
            } else {
                $document_file_names .= ',';
            }
        } else {
            if($document_file["name"][$i] != '') {
                $temp = explode(".", $document_file["name"][$i]);
                if($temp != '') {
                    $newfilename = rand() . $i . '.' . end($temp);
                    $document_file_names .= $newfilename . ',';
                    move_uploaded_file($document_file["tmp_name"][$i], $uploadDir . $newfilename);
                }
            } else {
                $shipping_id = $_POST['shipping_id'];
                $shipmentArr = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM shipment WHERE id = $shipping_id"));
                $document_files = explode(',', $shipmentArr['document_file']);
                $document_old_name = (isset($document_files[$i])) ? $document_files[$i] : ''; 
                $document_file_names .= $document_old_name . ',';
            }
            mysqli_query($con, "UPDATE shipment SET document_file = '".$document_file_names."' WHERE id = $shipping_id");
        }
    }
 ?>