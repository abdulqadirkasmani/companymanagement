<?php ini_set('display_errors', 0);
error_reporting(E_ERROR | E_WARNING | E_PARSE); 
$pageName = 'Shipment'; include('inc/header.php');

?>
<div class="content-body">
<div class="container-fluid">
	<div class="row">
		<div class="col-xl-12">
			<div class="card">
			

				<div class="card-body pt-0">
					<div class="table-responsive active-projects">
						<div class="d-flex justify-content-between align-items-center">
							<div class="tbl-caption px-0 cssrwflex">
								<h3 class="heading mb-0">Shipments</h3>
									<div class="card-body pt-3">
					<?php 
					$where = '';
					if(isset($_GET)) {
						if($_GET['gd'] != '') {
							if($_GET['gd'] == 'Saved') {
								$where .= " AND gd_number = ''";
							} else {
								$where .= " AND gd_number != ''";
							}
						}

				    if($_GET['consignment_mode'] != '') {
				    	$shipment_mode = $_GET['consignment_mode'];
				    	$where .= " AND shipment_mode = '".$shipment_mode."'";
				    }
				    if($_GET['fi'] != '') {
				    	if($_GET['fi'] == 1) { // Expired
					    	$where .= " AND (sea_fl_expiry_date != '' OR air_fl_expiry_date != '')";
				    	} else {
					    	$where .= " AND (sea_fl_approved_date != '' OR air_fl_approved_date != '')";
				    	}
				    }
				    // if($_GET['documents'] != '') {
				    // 	$where .= '';
				    // }
				    if($_GET['shipment_status'] != '') {
				    	if($_GET['shipment_status'] == 0) {
					    	$where .= " AND shipment_arrival = ''";
				    	} else {
					    	$where .= " AND shipment_arrival != ''";
				    	}
				    }
				    if($_GET['do_status'] != '') {
				    	if($_GET['do_status'] == 0) {
					    	$where .= " AND do_collect_on = ''";
				    	} else {
					    	$where .= " AND do_collect_on != ''";
				    	}
				    }
				    if($_GET['noc_status'] != '') {
				    	$cur_date = date('Y-m-d');
				    	$where .= " AND noc_valid_till < '".$cur_date."' AND noc_valid_till != ''";
				    }
				    if($_GET['eir_status'] != '') {
				    	if($_GET['eir_status'] == 0) {
					    	$where .= " AND eir_received_on = ''";
				    	} else {
					    	$where .= " AND eir_received_on != ''";
				    	}
				    }
				    if($_GET['refund_case_submitted_status'] != '') {
				    	if($_GET['refund_case_submitted_status'] == 0) {
					    	$where .= " AND refund_case_submit_on = ''";
				    	} else {
					    	$where .= " AND refund_case_submit_on != ''";
				    	}
				    }
				    if($_GET['refund_deposit'] != '') {
				    	if($_GET['refund_deposit'] == 0) {
					    	$where .= " AND deposit_refund_on = ''";
				    	} else {
					    	$where .= " AND deposit_refund_on != ''";
				    	}
				    }

				    if($_GET['from'] != '') {
				    	$from = date('Y-m-d', strtotime($_GET['from']));
				    	$to = ($_GET['to'] != '') ? date('Y-m-d', strtotime($_GET['to'])) : $from;
				    	$fromNew = $from . ' 00:00:00';
				    	$toNew = $to . ' 23:59:59';
					    $where .= " AND (created_at BETWEEN '".$fromNew."' AND '".$toNew."')";
				    }
					} ?>

					<a href="javascript:;" class="btn btn-dark advance-filter"><i class="fa fa-filter"></i> Advance Filters</a>
					<?php if(isset($_GET['gd'])) { ?>
					<a href="/shipment" class="btn btn-danger"><i class="fa fa-times"></i> Clear Filter</a>
					<?php } ?>
					<div class="basic-form mt-2 filter-form" style="display: none;">
               <form action="" method="get" class="form-filter">
               	<div class="row align-items-end">
                          <div class="mb-3 col-md-3">
                              <label class="form-label">GD Status</label>
                              <select class="form-control" name="gd">
                              	<option value="">-- Select Item --</option>
                              	<option value="0">GD Saved</option>
                              	<option value="1">GD Submitted</option>
                              </select>
                          </div>
                          <div class="mb-3 col-md-3">
                              <label class="form-label">Consignment Mode</label>
                              <select class="form-control" name="consignment_mode">
                              	<option value="">-- Select Item --</option>
                              	<option value="Containerized">FCL</option>
                              	<option value="Sea LCL">Sea LCL</option>
                              	<option value="Air LCL">Air LCL</option>
                              </select>
                          </div>
                          <div class="mb-3 col-md-3">
                              <label class="form-label">FI Status</label>
                              <select class="form-control" name="fi">
                              	<option value="">-- Select Item --</option>
                              	<option value="0">FI Pending</option>
                              	<option value="1">FI Expired</option>
                              </select>
                          </div>
                          <!-- <div class="mb-3 col-md-3">
                              <label class="form-label">Original Documents</label>
                              <select class="form-control" name="documents">
                              	<option value="">-- Select Item --</option>
                              	<option value="0">Pending</option>
                              	<option value="1">Received</option>
                              </select>
                          </div> -->
                          <div class="mb-3 col-md-3">
                              <label class="form-label">Shipment Status</label>
                              <select class="form-control" name="shipment_status">
                              	<option value="">-- Select Item --</option>
                              	<option value="0">Pending</option>
                              	<option value="1">Delivered</option>
                              </select>
                          </div>
                          <div class="mb-3 col-md-3">
                              <label class="form-label">D/O Status</label>
                              <select class="form-control" name="do_status">
                              	<option value="">-- Select Item --</option>
                              	<option value="0">Pending</option>
                              	<option value="1">Collected</option>
                              </select>
                          </div>
                          <div class="mb-3 col-md-3">
                              <label class="form-label">NOC Status</label>
                              <select class="form-control" name="noc_status">
                              	<option value="">-- Select Item --</option>
                              	<option value="1">Expired</option>
                              </select>
                          </div>
                          <div class="mb-3 col-md-3">
                              <label class="form-label">EIR Status</label>
                              <select class="form-control" name="eir_status">
                              	<option value="">-- Select Item --</option>
                              	<option value="0">Pending</option>
                              	<option value="1">Received</option>
                              </select>
                          </div>
                          <div class="mb-3 col-md-3">
                              <label class="form-label">Refund Case Submitted Status</label>
                              <select class="form-control" name="refund_case_submitted_status">
                              	<option value="">-- Select Item --</option>
                              	<option value="0">Pending</option>
                              	<option value="1">Submitted</option>
                              </select>
                          </div>
                          <div class="mb-3 col-md-3">
                              <label class="form-label">Refund Deposit Status</label>
                              <select class="form-control" name="refund_deposit">
                              	<option value="">-- Select Item --</option>
                              	<option value="0">Pending</option>
                              	<option value="1">Received</option>
                              </select>
                          </div>
                          <div class="mb-3 col-md-3">
                              <label class="form-label">From</label>
                              <input type="text" class="date-field form-control" name="from">
                          </div>
                          <div class="mb-3 col-md-3">
                              <label class="form-label">To</label>
                              <input type="text" class="date-field form-control" name="to">
                          </div>
                          
                          <div class="mb-3 col-md-3 align-items-end">
                          	<button type="submit" class="btn btn-primary">Apply Filters</button>
                          </div>
                      </div>
               </form>
           </div>
				</div>
							</div>
							<a href="add-shipment" class="btn btn-primary gradientbtn"><img src="images/plus.png">Add Shipment</a>
						</div>
						<div class="table-wrapper">
							<table id="shipment_table" class="display table stripe shipment-table" style="min-width: 845px min-height: 313px;">
								<thead>
									<tr>
										<th class="text-center"></th>
										<th class="text-center">S #.</th>
										<th class="text-center">File #.</th>
										<th class="text-center">File Date</th>
										<th class="text-center">Party Ref</th>
										<th class="text-center">Party Name</th>
										<th class="text-center">Supplier Name</th>
										<th class="text-center">Invoice Value</th>
										<th class="text-center">Quantity</th>
										<th class="text-center">Item Description</th>
										<th class="text-center">GD Number</th>
										<th class="text-center">BL No.</th>
										<th class="text-center">Shipping Line</th>
										<th class="text-center">Arrival</th>
										<th class="text-center">Docs <br>Status</th>
										<th class="text-center">F.I <br>Status</th>
										<th class="text-center">Funds Demand<br> Send on</th>
										<th class="text-center">GD <br>Status</th>
										<th class="text-center">D.O <br>Status</th>
										<th class="text-center">Bill <br>Status</th>
									</tr>
								</thead>
								<tbody>
									<?php 
										$selectshipments = mysqli_query($con, "SELECT * FROM `shipment` WHERE id > 0 $where ORDER BY id DESC");
										if(mysqli_num_rows($selectshipments) > 0) {
											$sno = 1;
											while($shipments_arr = mysqli_fetch_array($selectshipments)) {
												$totalPackage = '0 Box';
												if($shipments_arr['package_no'] != '') {
													$pkg_no = explode('||', $shipments_arr['package_no']);
													$totalPackage = count($pkg_no);
													if($totalPackage > 1) {
														$totalPackage .= ' Boxes';
													} else {
														$totalPackage .= ' Box';
													}
												}

												$consignment_mode = $shipments_arr['shipment_mode'];

												$copy_docx_rcvd_on = '';
												$original_docx_rcvd_on = '';
												$fi_status = '';
												if($consignment_mode != 'Air LCL') {
													if($shipments_arr['sea_bl_copy_status'] == 'Received') {
														$copy_docx_rcvd_on = '<span class="font-w500 text-success">'. date('d-m-y', strtotime($shipments_arr['sea_bl_copy_received_date'])) .'</span>';
													} else if($shipments_arr['sea_bl_copy_status'] == 'Pending') {
														$copy_docx_rcvd_on = '<span class="font-w500 text-danger">'. $shipments_arr['sea_bl_copy_status'] .'</span>';
													}

													// if($shipments_arr['sea_bl_original_status'] == 'Received') {
													// 	$bl_no = '<span class="font-w500 text-success">'. $shipments_arr['sea_bl_original_received_date'] .'</span>';
													// } else if($shipments_arr['sea_bl_original_status'] == 'Pending') {
													// 	$bl_no = '<span class="font-w500 text-danger">'. $shipments_arr['sea_bl_original_status'] .'</span>';
													// }


													if($shipments_arr['sea_fl_approved_date'] != '') {
														$fi_status = '<span class="font-w500 text-success">'. date('d-m-y', strtotime($shipments_arr['sea_fl_approved_date'])) .'</span>';
													} else {
														$fi_status = '<span class="font-w500 text-danger">Pending</span>';
													}

												} else {
													if($shipments_arr['air_lc_status'] == 'Received') {
														$copy_docx_rcvd_on = '<span class="font-w500 text-success">'. date('d-m-y', strtotime($shipments_arr['air_lc_received_date'])) .'</span>';
													} else if($shipments_arr['air_lc_status'] == 'Pending') {
														$copy_docx_rcvd_on = '<span class="font-w500 text-danger">'. $shipments_arr['air_lc_status'] .'</span>';
													}

													// if($shipments_arr['air_hawb_status'] == 'Received') {
													// 	$bl_no = '<span class="font-w500 text-success">'. $shipments_arr['air_hawb_received_date'] .'</span>';
													// } else if($shipments_arr['air_hawb_status'] == 'Pending') {
													// 	$bl_no = '<span class="font-w500 text-danger">'. $shipments_arr['air_hawb_status'] .'</span>';
													// }

													if($shipments_arr['air_fl_approved_date'] != '') {
														$fi_status = '<span class="font-w500 text-success">'. date('d-m-y', strtotime($shipments_arr['air_fl_approved_date'])) .'</span>';
													} else {
														$fi_status = '<span class="font-w500 text-danger">Pending</span>';
													}
												}

												if($shipments_arr['shipment_arrival'] != '') {
													$shipment_arrival = '<span class="font-w500 text-success">'. date('d-m-y', strtotime($shipments_arr['shipment_arrival'])) .'</span>';
												} else {
													$shipment_arrival = '<span class="font-w500 text-danger">Pending</span>';
												}
												if($shipments_arr['funds_demand_send_on'] != '') {
													$funds_demand_send_on = '<span class="font-w500 text-success">'. $shipments_arr['funds_demand_send_on'] .'</span>';
												} else {
													$funds_demand_send_on = '<span class="font-w500 text-danger">Pending</span>';
												}
												if($shipments_arr['do_collect_on'] != '') {
													$do_collect_on = '<span class="font-w500 text-success">'. $shipments_arr['do_collect_on'] .'</span>';
												} else {
													$do_collect_on = '<span class="font-w500 text-danger">Pending</span>';
												}
												if($shipments_arr['shipment_delivered_on'] != '') {
													$shipment_delivered_on = '<span class="font-w500 text-success">'. $shipments_arr['shipment_delivered_on'] .'</span>';
												} else {
													$shipment_delivered_on = '<span class="font-w500 text-danger">Pending</span>';
												}

												$gd_status = $shipments_arr['gd_status'];
												if($gd_status != '') {
													$gd_status_arr = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM gd_status WHERE id = $gd_status"));
													$gd_status_name = $gd_status_arr['name'];
												}

												$client = $shipments_arr['client'];
												$clientArr = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM client WHERE id = $client"));
												$client_name = $clientArr['name'];

												$shipping_line = $shipments_arr['shipping_line'];
												$shipping_lineArr = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM shipping_line WHERE id = $shipping_line"));
												$shipping_line_name = $shipping_lineArr['name'];

												$bill_status = $shipments_arr['bill_status'];
												$bill_statusArr = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM bill_status WHERE id = $bill_status"));
												$bill_status_name = $bill_statusArr['name'];


												$currency = $shipments_arr['currency'];
												$currencyArr = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM currency WHERE id = $currency"));
												$currency_name = $currencyArr['name'];
										 ?>
											<tr>
												<td>
													<div class="dropdown ms-auto text-start c-pointer">
														<div class="btn-link" data-bs-toggle="dropdown">
															<svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
														</div>
														<div class="dropdown-menu dropdown-menu-end">
															<a class="dropdown-item" href="view-shipment?id=<?php echo $shipments_arr['id'] ?>">View Shipment</a>
															<a class="dropdown-item" href="add-shipment?id=<?php echo $shipments_arr['id'] ?>">Edit Shipment</a>
															<?php if($_SESSION['role'] == 'admin') { ?>
																<a class="dropdown-item delete-shipment" href="javascript:;" data-id="<?php echo $shipments_arr['id'] ?>">Delete Shipment</a>
															<?php } ?>
														</div>
													</div>
												</td>
												<td><?php echo $sno++; ?></td>
												<td><?php echo $shipments_arr['file_no']; ?></td>
												<td><?php echo date('d-m-y', strtotime($shipments_arr['created_at'])); ?></td>
												<td><?php echo $shipments_arr['party_refrence']; ?></td>
												<td><?php echo $client_name; ?></td>
												<td><?php echo $shipments_arr['consignor_name']; ?></td>
												<td><?php echo ($shipments_arr['invoice_value'] != '') ? $currency_name . ' ' . $shipments_arr['invoice_value'] : '-'; ?></td>
												<td>
													<?php 
														$package_no = explode('||', $shipments_arr['package_no']);
														$package_type = explode('||', $shipments_arr['package_type']);
														for($i = 0; $i < count($package_no); $i++) {
															$package_type_id = $package_type[$i];
															$package_type_arr = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM package_type WHERE id = $package_type_id"));
															$package_type_name = $package_type_arr['name'];
															?>
															<div class=""><?php echo $package_no[$i] . ' ' . $package_type_name; ?></div>
															<?php
														}

														if($shipments_arr['shipment_mode'] == 'Containerized') {
															if($shipments_arr['container_no'] != '') {
																$container_no = explode('||', $shipments_arr['container_no']);
																$container_type = explode('||', $shipments_arr['container_type']);
																$array_count = array_count_values($container_type);
																// print_r();
																foreach($array_count as $key => $val) {
																	$container_type_id = $key;
																	$container_type_arr = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM container_type WHERE id = $container_type_id"));
																	if($container_type_arr['name'] != '') {
																		echo $val . ' x ' . $container_type_arr['name'];
																		echo "<br>";
																	}
																}
															}
														}
													 ?>
													 <div class="text-success"><?php echo $shipments_arr['shipment_mode']; ?></div>
												</td>
												<td>
													<?php echo substr($shipments_arr['item_description'], 0, 25); 
																if(strlen($shipments_arr['item_description']) > 25) {
																	echo ' ...';
																}
															?>
												</td>
												<td>
													<?php 
                             $curCollectorate = $shipments_arr['collectorate'];
                             $collectorate = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM collectorate WHERE id = $curCollectorate"));

                             $currentGdType = $shipments_arr['gd_type'];
                             $gd_type_arr = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM gd_type WHERE id = $currentGdType")); 

                             $gd_number_txt = '';
                             if($collectorate['name'] != '') {
                             		$gd_number_txt .= $collectorate['name'];
                             }
                             if($gd_type_arr['name'] != '') {
                             		$gd_number_txt .= '-' . $gd_type_arr['name'];
                             }
                             if($shipments_arr['gd_number'] != '') {
                             		$gd_number_txt .= '-' . $shipments_arr['gd_number'];
                             }
                             if($shipments_arr['gd_date'] != '') {
                             		$gd_number_txt .= '<br>' . date('Y-m-d', strtotime($shipments_arr['gd_date']));
                             }


                             if($shipments_arr['gd_number'] == '') {
                             		$gd_number_txt = '<span class="font-w500 text-danger">Submission of<br>GD pending</span>';
                             }


															echo $gd_number_txt; 
													?>
														
												</td>
												<td><?php echo $shipments_arr['bl_number']; ?></td>
												<td><?php echo $shipping_line_name; ?></td>
												<td><?php echo ($shipments_arr['shipment_arrival'] != '') ? date('d-m-y', strtotime($shipments_arr['shipment_arrival'])) : "<span class='font-w500 text-danger'>Not Confirm</span>"; ?></td>
												<td><?php 
														if($consignment_mode != 'Air LCL') {
															if($shipments_arr['sea_invoice_status'] != 'Not Required') {
																if($shipments_arr['sea_invoice_status'] == 'Pending') {
																	?>
																		
																	
																	<span class="font-w500 badge-danger badge">I: Pending</span>
																<?php
																}
															}
															if($shipments_arr['sea_packing_list_status'] != 'Not Required') {
																if($shipments_arr['sea_packing_list_status'] == 'Pending') {
																?>
																	
																
																	<span class="font-w500 badge-danger badge">PL: Pending</span>
																<?php
																}
															}
															if($shipments_arr['sea_bl_original_status'] != 'Not Required') {
																if($shipments_arr['sea_bl_original_status'] == 'Pending') {
																?>
																	
																
																	<span class="font-w500 badge-danger badge">OBL: Pending</span>
																<?php
																}
															}
															if($shipments_arr['sea_bl_copy_status'] != 'Not Required') {
																if($shipments_arr['sea_bl_copy_status'] == 'Pending') {
																?>
																	
																
																	<span class="font-w500 badge-danger badge">CBL: Pending</span>
																<?php
																}
															}
															if($shipments_arr['sea_lc_status'] != 'Not Required') {
																if($shipments_arr['sea_lc_status'] == 'Pending') {
																?>
																	
																
																	<span class="font-w500 badge-danger badge">LC: Pending</span>
																<?php
																}
															}
															if($shipments_arr['sea_insurance_memo_status'] != 'Not Required') {
																if($shipments_arr['sea_insurance_memo_status'] == 'Pending') {
																?>
																	
																
																	<span class="font-w500 badge-danger badge">IM: Pending</span>
																<?php
																}
															}
															if($shipments_arr['sea_fta_status'] != 'Not Required') {
																if($shipments_arr['sea_fta_status'] == 'Pending') {
																?>
																	
																
																	<span class="font-w500 badge-danger badge">FTA: Pending</span>
																<?php
																}
															}
															if($shipments_arr['sea_others_status'] != 'Not Required') {
																if($shipments_arr['sea_others_status'] == 'Pending') {
																?>
																	
																
																	<span class="font-w500 badge-danger badge">O: Pending</span>
																<?php
																}
															}
														} else {

															if($shipments_arr['air_invoice_status'] != 'Not Required'){
																if($shipments_arr['air_invoice_status'] == 'Pending') {
																	?>
																		
																	
																		<span class="font-w500 badge-danger badge">I: Pending</span>
																	<?php
																}
															}
															if($shipments_arr['air_packing_list_status'] != 'Not Required'){
																if($shipments_arr['air_packing_list_status'] == 'Pending') {
																?>
																	
																
																		<span class="font-w500 badge-danger badge">PL: Pending</span>
																	<?php
																}
															}
															if($shipments_arr['air_bank_endorsement_status'] != 'Not Required'){
																if($shipments_arr['air_bank_endorsement_status'] == 'Pending') {
																?>
																	
																
																		<span class="font-w500 badge-danger badge">BE: Pending</span>
																	<?php
																}
															}
															if($shipments_arr['air_hawb_status'] != 'Not Required'){
																if($shipments_arr['air_hawb_status'] == 'Pending') {
																?>
																	
																
																		<span class="font-w500 badge-danger badge">HAWB: Pending</span>
																	<?php
																}
															}
															if($shipments_arr['air_mawb_status'] != 'Not Required'){
																if($shipments_arr['air_mawb_status'] == 'Pending') {
																?>
																	
																
																		<span class="font-w500 badge-danger badge">MAWB: Pending</span>
																	<?php
																}
															}
															if($shipments_arr['air_lc_status'] != 'Not Required'){
																if($shipments_arr['air_lc_status'] == 'Pending') {
																?>
																	
																
																		<span class="font-w500 badge-danger badge">LC: Pending</span>
																	<?php
																}
															}
															if($shipments_arr['air_insurance_memo_status'] != 'Not Required'){
																if($shipments_arr['air_insurance_memo_status'] == 'Pending') {
																?>
																	
																
																		<span class="font-w500 badge-danger badge">IM: Pending</span>
																	<?php
																}
															}
															if($shipments_arr['air_fta_status'] != 'Not Required'){
																if($shipments_arr['air_fta_status'] == 'Pending') {
																?>
																	
																
																		<span class="font-w500 badge-danger badge">FTA: Pending</span>
																	<?php
																}
															}
															if($shipments_arr['air_others_status'] != 'Not Required'){
																if($shipments_arr['air_others_status'] == 'Pending') {
																?>
																	
																
																		<span class="font-w500 badge-danger badge">O: Pending</span>
																	<?php
																}
															}

														}?>
												</td>
												<td>
													<?php if($consignment_mode != 'Air LCL') {
																if($shipments_arr['sea_fl_approved_date'] != '') {
																	?>
																	<span class="font-w500 text-success"><?php echo date('d-m-y', strtotime($shipments_arr['sea_fl_approved_date'])); ?></span>
																	<?php
																} else {
																	?>
																	<span class="font-w500 text-danger">Pending</span>
																	<?php
																}
														  } else {
														  	    if($shipments_arr['air_fl_approved_date'] != '') {
																	?>
																	<span class="font-w500 text-success"><?php echo date('d-m-y', strtotime($shipments_arr['air_fl_approved_date'])); ?></span>
																	<?php
																} else {
																	?>
																	<span class="font-w500 text-danger">Pending</span>
																	<?php
																}
														  } ?>
												</td>
												<td>
													<?php 
															if($shipments_arr['funds_demand_send_on'] != '') {
																?>
																<span class="font-w500 text-success"><?php echo date('d-m-y', strtotime($shipments_arr['funds_demand_send_on'])); ?></span>
																<?php
															} else {
																?>
																<span class="font-w500 text-danger">Pending</span>
																<?php
															}
													 ?>
												</td>
												<td><?php echo $gd_status_name; ?></td>
												<td>
													<?php 
															if($shipments_arr['do_collect_on'] != '') {
																?>
																<span class="font-w500 text-success"><?php echo date('d-m-y', strtotime($shipments_arr['do_collect_on'])); ?></span>
																<?php
															} else {
																?>
																<span class="font-w500 text-danger">Pending</span>
																<?php
															}
															if($shipments_arr['noc_valid_till'] != '') {
																?>
																<span class="font-w500 text-success"><?php echo date('d-m-y', strtotime($shipments_arr['noc_valid_till'])); ?></span>
																<?php
															} else {
																?>
																<span class="font-w500 text-danger">Pending</span>
																<?php
															}
													 ?>
												</td>
												<td><?php echo $bill_status_name . '<br>';
																	echo ($shipments_arr['bill_status_on'] != '') ? date('d-m-y', strtotime($shipments_arr['bill_status_on'])) : '<span class="font-w500 text-warning">Pending</span>'; ?></td>
											</tr>
										<?php } 
										}?>
								</tbody>
							</table>
						</div>
					</div>
					
				</div>
			</div>
			
		
		</div>
	</div>
</div>
</div>

<!--**********************************
Content body end
***********************************-->

<?php include('inc/footer.php'); ?>
<script src="js/shipment.js"></script>
