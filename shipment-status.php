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
							<table id="shipment_status_table" class="display table stripe">
								<thead>
									<tr>
										<th></th>
										<th>S #.</th>
										<th>File Date</th>
										<th>File #.</th>
										<th>BL No.</th>
										<th>Quantity</th>
										<th>Arrival</th>
										<th>Shipping Line</th>
										<th>Docs <br>Status</th>
										<th>Detention</th>
										<th>Refund <br>Status</th>
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
												<td><?php echo date('d-m-y', strtotime($shipments_arr['created_at'])); ?></td>
												<td><?php echo $shipments_arr['file_no']; ?></td>
												<td><?php echo $shipments_arr['bl_number']; ?></td>
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
																// echo count($container_no) . " Containers";
																
															/*	for($i = 0; $i < count($container_no); $i++) {
																	$container_type_id = $container_type[$i];
																	$container_type_arr = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM container_type WHERE id = $container_type_id"));
																	$container_type_name = $container_type_arr['name'];*/
																	?>
																<!--	<span class="font-w500 text-warning"><?php //echo $container_no[$i] . ' ' . $container_type_name; ?></span>-->
																	<?php
																//}														
															}
														}
													 ?>
													 <div class="text-success"><?php echo $shipments_arr['shipment_mode']; ?></div>
												</td>
												<td><?php echo ($shipments_arr['shipment_arrival'] != '') ? date('d-m-y', strtotime($shipments_arr['shipment_arrival'])) : '<span class="font-w500 text-danger">Not Confirm</span>'; ?></td>
												<td><?php echo $shipping_line_name; ?></td>
												
												<td><?php 
														if($consignment_mode != 'Air LCL') {
															if($shipments_arr['sea_invoice_status'] != 'Not Required') {
																if($shipments_arr['sea_invoice_status'] == 'Pending') {
																	?>
																		
																	
																	<span class="font-w500 text-danger">Invoice: Pending</span>
																<?php
																}
															}
															if($shipments_arr['sea_packing_list_status'] != 'Not Required') {
																if($shipments_arr['sea_packing_list_status'] == 'Pending') {
																?>
																	
																
																	<span class="font-w500 text-danger">Packing List: Pending</span>
																<?php
																}
															}
															if($shipments_arr['sea_bl_original_status'] != 'Not Required') {
																if($shipments_arr['sea_bl_original_status'] == 'Pending') {
																?>
																	
																
																	<span class="font-w500 text-danger">BL Original: Pending</span>
																<?php
																}
															}
															if($shipments_arr['sea_bl_copy_status'] != 'Not Required') {
																if($shipments_arr['sea_bl_copy_status'] == 'Pending') {
																?>
																	
																
																	<span class="font-w500 text-danger">BL Copy: Pending</span>
																<?php
																}
															}
															if($shipments_arr['sea_lc_status'] != 'Not Required') {
																if($shipments_arr['sea_lc_status'] == 'Pending') {
																?>
																	
																
																	<span class="font-w500 text-danger">LC: Pending</span>
																<?php
																}
															}
															if($shipments_arr['sea_insurance_memo_status'] != 'Not Required') {
																if($shipments_arr['sea_insurance_memo_status'] == 'Pending') {
																?>
																	
																
																	<span class="font-w500 text-danger">Insurance Memo: Pending</span>
																<?php
																}
															}
															if($shipments_arr['sea_fta_status'] != 'Not Required') {
																if($shipments_arr['sea_fta_status'] == 'Pending') {
																?>
																	
																
																	<span class="font-w500 text-danger">FTA: Pending</span>
																<?php
																}
															}
															if($shipments_arr['sea_others_status'] != 'Not Required') {
																if($shipments_arr['sea_others_status'] == 'Pending') {
																?>
																	
																
																	<span class="font-w500 text-danger">Others: Pending</span>
																<?php
																}
															}
														} else {

															if($shipments_arr['air_invoice_status'] != 'Not Required'){
																if($shipments_arr['air_invoice_status'] == 'Pending') {
																	?>
																		
																	
																		<span class="font-w500 text-warning">Invoice: Pending</span>
																	<?php
																}
															}
															if($shipments_arr['air_packing_list_status'] != 'Not Required'){
																if($shipments_arr['air_packing_list_status'] == 'Pending') {
																?>
																	
																
																		<span class="font-w500 text-warning">Packing List: Pending</span>
																	<?php
																}
															}
															if($shipments_arr['air_bank_endorsement_status'] != 'Not Required'){
																if($shipments_arr['air_bank_endorsement_status'] == 'Pending') {
																?>
																	
																
																		<span class="font-w500 text-warning">Bank Endorsement: Pending</span>
																	<?php
																}
															}
															if($shipments_arr['air_hawb_status'] != 'Not Required'){
																if($shipments_arr['air_hawb_status'] == 'Pending') {
																?>
																	
																
																		<span class="font-w500 text-warning">HAWB: Pending</span>
																	<?php
																}
															}
															if($shipments_arr['air_mawb_status'] != 'Not Required'){
																if($shipments_arr['air_mawb_status'] == 'Pending') {
																?>
																	
																
																		<span class="font-w500 text-warning">MAWB: Pending</span>
																	<?php
																}
															}
															if($shipments_arr['air_lc_status'] != 'Not Required'){
																if($shipments_arr['air_lc_status'] == 'Pending') {
																?>
																	
																
																		<span class="font-w500 text-warning">LC: Pending</span>
																	<?php
																}
															}
															if($shipments_arr['air_insurance_memo_status'] != 'Not Required'){
																if($shipments_arr['air_insurance_memo_status'] == 'Pending') {
																?>
																	
																
																		<span class="font-w500 text-warning">Insurance Memo: Pending</span>
																	<?php
																}
															}
															if($shipments_arr['air_fta_status'] != 'Not Required'){
																if($shipments_arr['air_fta_status'] == 'Pending') {
																?>
																	
																
																		<span class="font-w500 text-warning">FTA: Pending</span>
																	<?php
																}
															}
															if($shipments_arr['air_others_status'] != 'Not Required'){
																if($shipments_arr['air_others_status'] == 'Pending') {
																?>
																	
																
																		<span class="font-w500 text-warning">Others: Pending</span>
																	<?php
																}
															}

														}?>
													</td>
													<td>
														<span class="font-w500 text-warning">Adv Rent: Rs. <?php
																			$expense_amount = explode('||', $shipments_arr['expense_amount']);
																			$expenses = 0;
																			for($i = 0; $i < count($expense_amount); $i++) {
																				$expenses += $expense_amount[$i];
																			}
																		 echo $expenses; ?></span>
														<br>
														<span class="font-w500 text-dark">Final Det: Rs. <?php echo ($shipments_arr['final_detention_amount'] != '') ? $shipments_arr['final_detention_amount'] : 0; ?></span>
													</td>
													<td>
														<?php if($shipments_arr['deposit_refund_on'] != '') {
																			$deposit_refund_on = '<span class="font-w500 text-success">'. date('d-m-y', strtotime($shipments_arr['deposit_refund_on'])) .'</span>';
																		} else {
																			$deposit_refund_on = '<span class="font-w500 text-danger">Pending</span>';
																		} 
																		echo $deposit_refund_on;
															?></td>
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
<script src="js/shipment-status.js"></script>
