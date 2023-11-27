<?php ini_set('display_errors', 0);
error_reporting(E_ERROR | E_WARNING | E_PARSE); 
$pageName = 'Shipment'; include('inc/header.php');

// if(isset($_GET['id'])) {
//     $shipment_id = $_GET['id'];
//     $shipmentArr = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM `shipment` WHERE `id` = '$shipment_id'"));
//     print_r($shipmentArr);
// }

 ?>
		
		<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
			<div class="container-fluid">
				<div class="row">
					<div class="col-xl-12">
                        <form action="" method="post" class="create-shipment-form">
                            <div class="accordion accordion-active-header">
                                <h3 class="heading">File Entry</h3>
                                <div class="shipment-tabs">
                                    <div class="tab-lists">
                                        <ul>
                                            <li><a href="javascript:;" class="active-tab" data-tab="consignment-tab">Consignment Information</a></li>
                                            <li><a href="javascript:;" data-tab="financial-tab">Financial Information</a></li>
                                            <li><a href="javascript:;" data-tab="commodity-tab">Commodity Information</a></li>
                                            <li><a href="javascript:;" data-tab="files-status">Files Status</a></li>
                                            <li><a href="javascript:;" data-tab="shipment-charges">Shipment Charges</a></li>
                                            <li><a href="javascript:;" data-tab="upload-documents">Upload Documents</a></li>
                                        </ul>
                                    </div>
                                    <div class="tab-boxes">
                                        <div class="tab-box" style="display: block;" data-tab="consignment-tab">
                                            <div class="accordion-item">
                                                <div class="accordion-header  rounded-lg" id="accord-9One" data-bs-toggle="collapse" data-bs-target="#collapse9One" aria-controls="collapse9One"   aria-expanded="true"  role="button">
                                                    <span class="accordion-header-icon"></span>
                                                <span class="accordion-header-text">Consignment Information</span>
                                                <span class="accordion-header-indicator"></span>
                                                </div>
                                                <div id="collapse9One" class="collapse accordion__body show" aria-labelledby="accord-9One" data-bs-parent="#accordion-nine">
                                                    <div class="accordion-body-text">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div class="basic-form">
                                                                    <div class="row">
                                                                        <div class="mb-3 col-md-4">
                                                                            <label class="form-label">File Date</label>
                                                                            <input type="text" placeholder="DD/MM/YYYY" class="date-field form-control" name="date" autocomplete="new-password">
                                                                        </div>
                                                                        <div class="mb-3 col-md-4">
                                                                            <label class="form-label">BL Number</label>
                                                                            <input type="text" class="form-control" name="bl_number" autocomplete="new-password">
                                                                        </div>
                                                                        <div class="mb-3 col-md-4">
                                                                            <label class="form-label">BL Date</label>
                                                                            <input type="text" placeholder="DD/MM/YYYY" class="date-field form-control" name="bl_date" autocomplete="new-password">
                                                                        </div>
                                                                    </div>
                                                                    <hr>

                                                                    <div class="row">
                                                                        <div class="mb-3 col-md-4">
                                                                            <label class="form-label">VIR/IGM No.</label>
                                                                            <input type="text" class="form-control" name="igm_no" autocomplete="new-password">
                                                                        </div>
                                                                        <div class="mb-3 col-md-4">
                                                                            <label class="form-label">VIR/IGM Date</label>
                                                                            <input type="text" placeholder="DD/MM/YYYY" class="date-field form-control" name="igm_date" autocomplete="new-password">
                                                                        </div>
                                                                        <div class="mb-3 col-md-4">
                                                                            <label class="form-label">Index Number</label>
                                                                            <input type="number" class="form-control" name="index_no" autocomplete="new-password">
                                                                        </div>
                                                                    </div>
                                                                    <hr>

                                                                    <div class="row">
                                                                        <div class="mb-3 col-md-4">
                                                                            <label class="form-label">Port Of Shipment</label>
                                                                            <input type="text" class="form-control" name="shipment_port" autocomplete="new-password">
                                                                        </div>
                                                                        <div class="mb-3 col-md-4">
                                                                            <div class="d-flex justify-content-between align-items-center mb-1">
                                                                                <label class="form-label">Collectorate</label>
                                                                                <a href="javascript:;" class="badge badge-success modify-value" data-tablename="collectorate" data-htmlname="Collectorate" data-bs-toggle="modal" data-bs-target="#optionModal"><i class="fa fa-plus"></i></a>
                                                                            </div>
                                                                            <select class="form-control" name="collectorate" autocomplete="new-password">
                                                                                <?php $collectorate = mysqli_query($con, "SELECT * FROM collectorate"); 
                                                                                    while($collectorate_arr = mysqli_fetch_array($collectorate)) {
                                                                                ?>
                                                                                        <option value="<?php echo $collectorate_arr['id'] ?>"><?php echo $collectorate_arr['name'] ?></option>
                                                                                <?php } ?>
                                                                            </select>
                                                                        </div>
                                                                        <div class="mb-3 col-md-4">
                                                                            <div class="d-flex justify-content-between align-items-center mb-1">
                                                                                <label class="form-label">Shed / Location</label>
                                                                                <a href="javascript:;" class="badge badge-success modify-value" data-tablename="discharge_port" data-htmlname="Shed / Location" data-bs-toggle="modal" data-bs-target="#optionModal"><i class="fa fa-plus"></i></a>
                                                                            </div>
                                                                            <select class="form-control" name="discharge_port" autocomplete="new-password">
                                                                                <?php $discharge_port = mysqli_query($con, "SELECT * FROM discharge_port"); 
                                                                                    while($discharge_port_arr = mysqli_fetch_array($discharge_port)) {
                                                                                ?>
                                                                                        <option value="<?php echo $discharge_port_arr['id'] ?>"><?php echo $discharge_port_arr['name'] ?></option>
                                                                                <?php } ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                    <div class="row">
                                                                        <div class="mb-3 col-md-4">
                                                                            <div class="d-flex justify-content-between align-items-center mb-1">
                                                                                <label class="form-label">Consignee Name</label>
                                                                                <a href="add-client" class="badge badge-success" target="_blank"><i class="fa fa-plus"></i></a>
                                                                            </div>
                                                                            <select class="form-control" name="consignee" autocomplete="new-password">
                                                                                <?php $client = mysqli_query($con, "SELECT * FROM client"); 
                                                                                    while($client_arr = mysqli_fetch_array($client)) {
                                                                                ?>
                                                                                        <option value="<?php echo $client_arr['id'] ?>"><?php echo $client_arr['name'] ?></option>
                                                                                <?php } ?>
                                                                            </select>
                                                                        </div>
                                                                        <div class="mb-3 col-md-4">
                                                                            <div class="d-flex justify-content-between align-items-center mb-1">
                                                                                <label class="form-label">Client Name</label>
                                                                                <a href="add-client" class="badge badge-success" target="_blank"><i class="fa fa-plus"></i></a>
                                                                            </div>
                                                                            <select class="form-control" name="client" autocomplete="new-password">
                                                                                <?php $client = mysqli_query($con, "SELECT * FROM client"); 
                                                                                    while($client_arr = mysqli_fetch_array($client)) {
                                                                                ?>
                                                                                        <option value="<?php echo $client_arr['id'] ?>"><?php echo $client_arr['name'] ?></option>
                                                                                <?php } ?>
                                                                            </select>
                                                                        </div>
                                                                        <div class="mb-3 col-md-4">
                                                                            <label class="form-label">Consignor Name</label>
                                                                            <input type="text" class="form-control" name="consignor_name" autocomplete="new-password">
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                    <div class="row">
                                                                        <div class="mb-3 col-md-4">
                                                                            <label class="form-label">Consignment Mode</label>
                                                                            <select class="form-control" name="shipment_mode" id="shipment_mode" autocomplete="new-password">
                                                                                <option>Containerized</option>
                                                                                <option>Sea LCL</option>
                                                                                <option>Air LCL</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="mb-3 col-md-4">
                                                                            <label class="form-label">Gross Weight KGs</label>
                                                                            <input type="number" step="any" class="form-control" name="gross_weight" autocomplete="new-password">
                                                                        </div>
                                                                        <div class="mb-3 col-md-4">
                                                                            <label class="form-label">Net Weight KGs</label>
                                                                            <input type="number" step="any" class="form-control" name="net_weight" autocomplete="new-password">
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                    <div class="row">
                                                                        <div class="mb-3 col-md-4">
                                                                            <div class="d-flex justify-content-between align-items-center mb-1">
                                                                                <label class="form-label">GD Type</label>
                                                                                <a href="javascript:;" class="badge badge-success modify-value" data-tablename="gd_type" data-htmlname="GD Type" data-bs-toggle="modal" data-bs-target="#optionModal"><i class="fa fa-plus"></i></a>
                                                                            </div>
                                                                            <select class="form-control" name="gd_type" autocomplete="new-password">
                                                                                <?php $gd_type = mysqli_query($con, "SELECT * FROM gd_type"); 
                                                                                    while($gd_type_arr = mysqli_fetch_array($gd_type)) {
                                                                                ?>
                                                                                        <option value="<?php echo $gd_type_arr['id'] ?>"><?php echo $gd_type_arr['name'] ?></option>
                                                                                <?php } ?>
                                                                            </select>
                                                                        </div>
                                                                        
                                                                        <div class="mb-3 col-md-4">
                                                                            <label class="form-label">GD Number</label>
                                                                            <input type="text" class="form-control" name="gd_number" autocomplete="new-password">
                                                                        </div>
                                                                        <div class="mb-3 col-md-4">
                                                                            <label class="form-label">GD Date</label>
                                                                            <input type="text" placeholder="DD/MM/YYYY" class="date-field form-control" name="gd_date" autocomplete="new-password">
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                    <div class="row">
                                                                        <div class="mb-3 col-md-4">
                                                                            <label class="form-label">Party Refrence</label>
                                                                            <input type="text" style="text-transform: uppercase;" class="form-control" name="party_refrence" autocomplete="new-password">
                                                                        </div>
                                                                        <div class="mb-3 col-md-4">
                                                                            <label class="form-label">Other Refrence</label>
                                                                            <input type="text" style="text-transform: uppercase;" class="form-control" name="other_refrence" autocomplete="new-password">
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                    <div class="row">
                                                                        <div class="mb-3 col-md-12">
                                                                            <label class="form-label">Marks</label>
                                                                            <input type="text" style="text-transform: uppercase;" class="form-control" name="marks" autocomplete="new-password">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div> <!-- Consignment Information Accordion -->

                                            <div class="accordion-item">
                                                <div class="accordion-header rounded-lg" id="accord-9Pkg" data-bs-toggle="collapse" data-bs-target="#collapse9Pkg" aria-controls="collapse9Pkg"   aria-expanded="true"  role="button">
                                                    <span class="accordion-header-icon"></span>
                                                <span class="accordion-header-text">Package Information</span>
                                                <span class="accordion-header-indicator"></span>
                                                </div>
                                                <div id="collapse9Pkg" class="collapse accordion__body show" aria-labelledby="accord-9Pkg" data-bs-parent="#accordion-nine">
                                                    <div class="accordion-body-text">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div class="basic-form">
                                                                    <div class="row">
                                                                        <table width="100%" class="form-table">
                                                                            <tr>
                                                                                <th style="width: 5%;">S.No</th>
                                                                                <th>No. of Package</th>
                                                                                <th>Package Type</th>
                                                                                <th style="width: 5%;"></th>
                                                                            </tr>
                                                                            <tbody class="packages-tr">
                                                                                <tr>
                                                                                    <td style="width: 5%;">1.</td>
                                                                                    <td><input type="number" class="form-control" name="package_no[]" autocomplete="new-password"></td>
                                                                                    <td>
                                                                                        <select class="form-control" name="package_type[]" autocomplete="new-password">
                                                                                            <?php $package_type = mysqli_query($con, "SELECT * FROM package_type"); 
                                                                                                while($package_type_arr = mysqli_fetch_array($package_type)) {
                                                                                            ?>
                                                                                                    <option value="<?php echo $package_type_arr['id'] ?>"><?php echo $package_type_arr['name'] ?></option>
                                                                                            <?php } ?>
                                                                                        </select>
                                                                                    </td>
                                                                                    <td style="width: 5%;"></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                        <div class="col-md-3"><a href="javascript:;" class="btn btn-secondary add-pkg mt-2"><i class="fa fa-plus"></i> Add Package</a></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> <!-- Package Information Accordion -->

                                            <div class="accordion-item">
                                                <div class="accordion-header rounded-lg" id="accord-9Container" data-bs-toggle="collapse" data-bs-target="#collapse9Container" aria-controls="collapse9Container"   aria-expanded="true"  role="button">
                                                    <span class="accordion-header-icon"></span>
                                                <span class="accordion-header-text">Container Information</span>
                                                <span class="accordion-header-indicator"></span>
                                                </div>
                                                <div id="collapse9Container" class="collapse accordion__body show" aria-labelledby="accord-9Container" data-bs-parent="#accordion-nine">
                                                    <div class="accordion-body-text">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div class="basic-form">
                                                                    <div class="row">
                                                                        <table width="100%" class="form-table">
                                                                            <tr>
                                                                                <th style="width: 5%;">S.No</th>
                                                                                <th>Container No.</th>
                                                                                <th>Container Type</th>
                                                                                <th style="width: 5%;"></th>
                                                                            </tr>
                                                                            <tbody class="container-tr">
                                                                                <tr>
                                                                                    <td style="width: 5%;">1.</td>
                                                                                    <td><input type="text" class="form-control" name="container_no[]" autocomplete="new-password"></td>
                                                                                    <td>
                                                                                        <select class="form-control" name="container_type[]" autocomplete="new-password">
                                                                                            <?php $container_type = mysqli_query($con, "SELECT * FROM container_type"); 
                                                                                                while($container_type_arr = mysqli_fetch_array($container_type)) {
                                                                                            ?>
                                                                                                    <option value="<?php echo $container_type_arr['id'] ?>"><?php echo $container_type_arr['name'] ?></option>
                                                                                            <?php } ?>
                                                                                        </select>
                                                                                    </td>
                                                                                    <td style="width: 5%;"></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                        <div class="col-md-3"><a href="javascript:;" class="btn btn-secondary add-container mt-2"><i class="fa fa-plus"></i> Add Container</a></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> <!-- Container Information Accordion -->
                                        </div><!-- tab-box -->
                                        <div class="tab-box" data-tab="financial-tab">
                                            <div class="accordion-item">
                                                <div class="accordion-header rounded-lg" id="accord-9Financial" data-bs-toggle="collapse" data-bs-target="#collapse9Financial" aria-controls="collapse9Financial"   aria-expanded="true"  role="button">
                                                    <span class="accordion-header-icon"></span>
                                                <span class="accordion-header-text">Financial Information</span>
                                                <span class="accordion-header-indicator"></span>
                                                </div>
                                                <div id="collapse9Financial" class="collapse accordion__body show" aria-labelledby="accord-9Financial" data-bs-parent="#accordion-nine">
                                                    <div class="accordion-body-text">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div class="basic-form">
                                                                    <div class="row">
                                                                        <div class="mb-3 col-md-4">
                                                                            <div class="d-flex justify-content-between align-items-center mb-1">
                                                                                <label class="form-label">Currency</label>
                                                                                <a href="javascript:;" class="badge badge-success modify-value" data-tablename="currency" data-htmlname="Currency" data-bs-toggle="modal" data-bs-target="#optionModal"><i class="fa fa-plus"></i></a>
                                                                            </div>            
                                                                            <select class="form-control" name="currency" autocomplete="new-password">
                                                                                <?php $currency = mysqli_query($con, "SELECT * FROM currency"); 
                                                                                    while($currency_arr = mysqli_fetch_array($currency)) {
                                                                                ?>
                                                                                        <option value="<?php echo $currency_arr['id'] ?>"><?php echo $currency_arr['name'] ?></option>
                                                                                <?php } ?>
                                                                            </select>
                                                                        </div>
                                                                        <div class="mb-3 col-md-4">
                                                                            <label class="form-label">Exchange Rate</label>
                                                                            <input type="number" step="any" class="form-control" name="exchange_rate" autocomplete="new-password">
                                                                        </div>
                                                                        <div class="mb-3 col-md-4">
                                                                            <div class="d-flex justify-content-between align-items-center mb-1">
                                                                                <label class="form-label">Delivery Term</label>
                                                                                <a href="javascript:;" class="badge badge-success modify-value" data-tablename="delivery_term" data-htmlname="Delivery Term" data-bs-toggle="modal" data-bs-target="#optionModal"><i class="fa fa-plus"></i></a>
                                                                            </div>            
                                                                            <select class="form-control" name="delivery_term" autocomplete="new-password">
                                                                                <?php $delivery_term = mysqli_query($con, "SELECT * FROM delivery_term"); 
                                                                                    while($delivery_term_arr = mysqli_fetch_array($delivery_term)) {
                                                                                ?>
                                                                                        <option value="<?php echo $delivery_term_arr['id'] ?>"><?php echo $delivery_term_arr['name'] ?></option>
                                                                                <?php } ?>
                                                                            </select>
                                                                        </div> 
                                                                    </div>
                                                                    <hr>
                                                                    <div class="row">
                                                                        <div class="mb-3 col-md-4">
                                                                            <div class="d-flex justify-content-between align-items-center mb-1">
                                                                                <label class="form-label">Bank Name</label>
                                                                                <a href="javascript:;" class="badge badge-success modify-value" data-tablename="bank_name" data-htmlname="Bank Name" data-bs-toggle="modal" data-bs-target="#optionModal"><i class="fa fa-plus"></i></a>
                                                                            </div>            
                                                                            <select class="form-control" name="bank_name" autocomplete="new-password">
                                                                                <?php $bank_name = mysqli_query($con, "SELECT * FROM bank_name"); 
                                                                                    while($bank_name_arr = mysqli_fetch_array($bank_name)) {
                                                                                ?>
                                                                                        <option value="<?php echo $bank_name_arr['id'] ?>"><?php echo $bank_name_arr['name'] ?></option>
                                                                                <?php } ?>
                                                                            </select>
                                                                        </div>
                                                                        <div class="mb-3 col-md-4">
                                                                            <div class="d-flex justify-content-between align-items-center mb-1">
                                                                                <label class="form-label">Mode Of Payment</label>
                                                                                <a href="javascript:;" class="badge badge-success modify-value" data-tablename="payment_mode" data-htmlname="Mode Of Payment" data-bs-toggle="modal" data-bs-target="#optionModal"><i class="fa fa-plus"></i></a>
                                                                            </div>            
                                                                            <select class="form-control" name="payment_mode" autocomplete="new-password">
                                                                                <?php $payment_mode = mysqli_query($con, "SELECT * FROM payment_mode"); 
                                                                                    while($payment_mode_arr = mysqli_fetch_array($payment_mode)) {
                                                                                ?>
                                                                                        <option value="<?php echo $payment_mode_arr['id'] ?>"><?php echo $payment_mode_arr['name'] ?></option>
                                                                                <?php } ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                    <div class="row">
                                                                        <div class="mb-3 col-md-4">
                                                                            <label class="form-label">Invoice No.</label>
                                                                            <input type="text" class="form-control" name="invoice_no" autocomplete="new-password">
                                                                        </div>
                                                                        <div class="mb-3 col-md-4">
                                                                            <label class="form-label">Invoice Date</label>
                                                                            <input type="text" placeholder="DD/MM/YYYY" class="date-field form-control" name="invoice_date" autocomplete="new-password">
                                                                        </div>
                                                                        <div class="mb-3 col-md-4">
                                                                            <label class="form-label">Invoice Value</label>
                                                                            <input type="number" class="form-control" name="invoice_value" autocomplete="new-password">
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                    <div class="row">
                                                                        <div class="mb-3 col-md-4">
                                                                            <label class="form-label">LC Number</label>
                                                                            <input type="text" class="form-control" name="lc_no" autocomplete="new-password">
                                                                        </div>
                                                                        <div class="mb-3 col-md-4">
                                                                            <label class="form-label">LC Date</label>
                                                                            <input type="text" placeholder="DD/MM/YYYY" class="date-field form-control" name="lc_date" autocomplete="new-password">
                                                                        </div>
                                                                        <div class="mb-3 col-md-4">
                                                                            <label class="form-label">LC Value</label>
                                                                            <input type="number" step="any" class="form-control" name="lc_value" autocomplete="new-password">
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                    <div class="row">
                                                                        <div class="mb-3 col-md-4">
                                                                            <label class="form-label">FOB Value</label>
                                                                            <input type="number" step="any" class="form-control" name="fob" autocomplete="new-password">
                                                                        </div>
                                                                        <div class="mb-3 col-md-4">
                                                                            <label class="form-label">Freight Charges</label>
                                                                            <input type="number" step="any" class="form-control" name="freight" autocomplete="new-password">
                                                                        </div>
                                                                        <div class="mb-3 col-md-4">
                                                                            <label class="form-label">CFR Value</label>
                                                                            <input type="number" step="any" class="form-control" name="cfr" autocomplete="new-password">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>

                                        </div><!-- Consignment Information Accordion -->
                                        <div class="tab-box" data-tab="commodity-tab">
                                            <div class="accordion-item">
                                                <div class="accordion-header rounded-lg" id="accord-9Commodity" data-bs-toggle="collapse" data-bs-target="#collapse9Commodity" aria-controls="collapse9Commodity"   aria-expanded="true"  role="button">
                                                    <span class="accordion-header-icon"></span>
                                                <span class="accordion-header-text">Commodity Information</span>
                                                <span class="accordion-header-indicator"></span>
                                                </div>
                                                <div id="collapse9Commodity" class="collapse accordion__body show" aria-labelledby="accord-9Commodity" data-bs-parent="#accordion-nine">
                                                    <div class="accordion-body-text">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div class="basic-form">
                                                                    <div class="row align-items-end">
                                                                        <div class="mb-3 col-md-4">
                                                                            <label class="form-label">Item Description</label>
                                                                            <input type="text" class="form-control" name="item_description" autocomplete="new-password">
                                                                        </div>
                                                                        <div class="mb-3 col-md-4">
                                                                            <label class="form-label">Quantity</label>
                                                                            <input type="number" step="any" class="form-control" name="quantity" autocomplete="new-password">
                                                                        </div>
                                                                        <div class="mb-3 col-md-4">
                                                                            <div class="d-flex justify-content-between align-items-center mb-1">
                                                                                <label class="form-label">Mode Of Quantity</label>
                                                                                <a href="javascript:;" class="badge badge-success modify-value" data-tablename="quantity_mode" data-htmlname="Mode Of Quantity" data-bs-toggle="modal" data-bs-target="#optionModal"><i class="fa fa-plus"></i></a>
                                                                            </div>            
                                                                            <select class="form-control" name="quantity_mode" autocomplete="new-password">
                                                                                <?php $quantity_mode = mysqli_query($con, "SELECT * FROM quantity_mode"); 
                                                                                    while($quantity_mode_arr = mysqli_fetch_array($quantity_mode)) {
                                                                                ?>
                                                                                        <option value="<?php echo $quantity_mode_arr['id'] ?>"><?php echo $quantity_mode_arr['name'] ?></option>
                                                                                <?php } ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>                                            
                                            <div class="accordion-item sea-shipment">
                                                <div class="accordion-header rounded-lg" id="accord-9Two" data-bs-toggle="collapse" data-bs-target="#collapse9Two" aria-controls="collapse9Two"   aria-expanded="true"  role="button">
                                                    <span class="accordion-header-icon"></span>
                                                <span class="accordion-header-text">Document Required Sea LCL Shipment</span>
                                                <span class="accordion-header-indicator"></span>
                                                </div>
                                                <div id="collapse9Two" class="collapse accordion__body show" aria-labelledby="accord-9Two" data-bs-parent="#accordion-nine">
                                                <div class="accordion-body-text">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="basic-form">
                                                                <div class="row">
                                                                    <table width="100%" class="form-table">
                                                                        <tr>
                                                                            <th></th>
                                                                            <th>Number</th>
                                                                            <th>Value</th>
                                                                            <th>Approved Date</th>
                                                                            <th>Expiry Date</th>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><strong>Financial Instrument</strong></td>
                                                                            <td><input type="text" class="form-control" name="sea_fl_no" autocomplete="new-password"></td>
                                                                            <td><input type="text" class="form-control" name="sea_fl_value" autocomplete="new-password"></td>
                                                                            <td><input type="text" placeholder="DD/MM/YYYY" class="date-field form-control" name="sea_fl_approved_date" autocomplete="new-password"></td>
                                                                            <td><input type="text" placeholder="DD/MM/YYYY" class="date-field form-control" name="sea_fl_expiry_date" autocomplete="new-password"></td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                                <hr>
                                                                <div class="row">
                                                                    <table width="100%" class="form-table">
                                                                        <tr>
                                                                            <th></th>
                                                                            <th>Status</th>
                                                                            <th>Received Date</th>
                                                                            <th>Source</th>
                                                                            <th>Upload</th>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><strong>Invoice</strong></td>
                                                                            <td>
                                                                                 <select class="form-control status-selector" name="sea_invoice_status" autocomplete="new-password">
                                                                                    <option>Not Required</option>
                                                                                    <option>Pending</option>
                                                                                    <option>Received</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <input disabled="" type="text" placeholder="DD/MM/YYYY" class="status-checker date-field form-control" name="sea_invoice_received_date" autocomplete="new-password">
                                                                            </td>
                                                                            <td>
                                                                                 <select disabled="" class="status-checker form-control" name="sea_invoice_source" autocomplete="new-password">
                                                                                    <?php $document_source = mysqli_query($con, "SELECT * FROM document_source"); 
                                                                                    while($document_source_arr = mysqli_fetch_array($document_source)) {
                                                                                ?>
                                                                                        <option value="<?php echo $document_source_arr['id'] ?>"><?php echo $document_source_arr['name'] ?></option>
                                                                                    <?php } ?>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <input disabled="" type="file" class="status-checker form-control" name="sea_invoice_upload" autocomplete="new-password">
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><strong>Packing List</strong></td>
                                                                            <td>
                                                                                 <select class="status-selector form-control" name="sea_packing_list_status" autocomplete="new-password">
                                                                                    <option>Not Required</option>
                                                                                    <option>Pending</option>
                                                                                    <option>Received</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <input disabled="" type="text" placeholder="DD/MM/YYYY" class="status-checker date-field form-control" name="sea_packing_list_received_date" autocomplete="new-password">
                                                                            </td>
                                                                            <td>
                                                                                 <select disabled="" class="status-checker form-control" name="sea_packing_list_source" autocomplete="new-password">
                                                                                    <?php $document_source = mysqli_query($con, "SELECT * FROM document_source"); 
                                                                                    while($document_source_arr = mysqli_fetch_array($document_source)) {
                                                                                ?>
                                                                                        <option value="<?php echo $document_source_arr['id'] ?>"><?php echo $document_source_arr['name'] ?></option>
                                                                                    <?php } ?>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <input disabled="" type="file" class="status-checker form-control" name="sea_packing_list_upload" autocomplete="new-password">
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><strong>BL Original</strong></td>
                                                                            <td>
                                                                                 <select class="status-selector form-control" name="sea_bl_original_status" autocomplete="new-password">
                                                                                    <option>Not Required</option>
                                                                                    <option>Pending</option>
                                                                                    <option>Received</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <input disabled="" type="text" placeholder="DD/MM/YYYY" class="status-checker date-field form-control" name="sea_bl_original_received_date" autocomplete="new-password">
                                                                            </td>
                                                                            <td>
                                                                                 <select disabled="" class="status-checker form-control" name="sea_bl_original_source" autocomplete="new-password">
                                                                                    <?php $document_source = mysqli_query($con, "SELECT * FROM document_source"); 
                                                                                    while($document_source_arr = mysqli_fetch_array($document_source)) {
                                                                                ?>
                                                                                        <option value="<?php echo $document_source_arr['id'] ?>"><?php echo $document_source_arr['name'] ?></option>
                                                                                    <?php } ?>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <input disabled="" type="file" class="status-checker form-control" name="sea_bl_original_upload" autocomplete="new-password">
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><strong>BL Copy</strong></td>
                                                                            <td>
                                                                                 <select class="status-selector form-control" name="sea_bl_copy_status" autocomplete="new-password">
                                                                                    <option>Not Required</option>
                                                                                    <option>Pending</option>
                                                                                    <option>Received</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <input disabled="" type="text" placeholder="DD/MM/YYYY" class="status-checker date-field form-control" name="sea_bl_copy_received_date" autocomplete="new-password">
                                                                            </td>
                                                                            <td>
                                                                                 <select disabled="" class="status-checker form-control" name="sea_bl_copy_source" autocomplete="new-password">
                                                                                    <?php $document_source = mysqli_query($con, "SELECT * FROM document_source"); 
                                                                                    while($document_source_arr = mysqli_fetch_array($document_source)) {
                                                                                ?>
                                                                                        <option value="<?php echo $document_source_arr['id'] ?>"><?php echo $document_source_arr['name'] ?></option>
                                                                                    <?php } ?>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <input disabled="" type="file" class="status-checker form-control" name="sea_bl_copy_upload" autocomplete="new-password">
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><strong>L/C</strong></td>
                                                                            <td>
                                                                                 <select class="status-selector form-control" name="sea_lc_status" autocomplete="new-password">
                                                                                    <option>Not Required</option>
                                                                                    <option>Pending</option>
                                                                                    <option>Received</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <input disabled="" type="text" placeholder="DD/MM/YYYY" class="status-checker date-field form-control" name="sea_lc_received_date" autocomplete="new-password">
                                                                            </td>
                                                                            <td>
                                                                                 <select disabled="" class="status-checker form-control" name="sea_lc_source" autocomplete="new-password">
                                                                                    <?php $document_source = mysqli_query($con, "SELECT * FROM document_source"); 
                                                                                    while($document_source_arr = mysqli_fetch_array($document_source)) {
                                                                                ?>
                                                                                        <option value="<?php echo $document_source_arr['id'] ?>"><?php echo $document_source_arr['name'] ?></option>
                                                                                    <?php } ?>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <input disabled="" type="file" class="status-checker form-control" name="sea_lc_upload" autocomplete="new-password">
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><strong>Insurance Memo</strong></td>
                                                                            <td>
                                                                                 <select class="status-selector form-control" name="sea_insurance_memo_status" autocomplete="new-password">
                                                                                    <option>Not Required</option>
                                                                                    <option>Pending</option>
                                                                                    <option>Received</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <input disabled="" type="text" placeholder="DD/MM/YYYY" class="status-checker date-field form-control" name="sea_insurance_memo_received_date" autocomplete="new-password">
                                                                            </td>
                                                                            <td>
                                                                                 <select disabled="" class="status-checker form-control" name="sea_insurance_memo_source" autocomplete="new-password">
                                                                                    <?php $document_source = mysqli_query($con, "SELECT * FROM document_source"); 
                                                                                    while($document_source_arr = mysqli_fetch_array($document_source)) {
                                                                                ?>
                                                                                        <option value="<?php echo $document_source_arr['id'] ?>"><?php echo $document_source_arr['name'] ?></option>
                                                                                    <?php } ?>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <input disabled="" type="file" class="status-checker form-control" name="sea_insurance_memo_upload" autocomplete="new-password">
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><strong>FTA</strong></td>
                                                                            <td>
                                                                                 <select class="status-selector form-control" name="sea_fta_status" autocomplete="new-password">
                                                                                    <option>Not Required</option>
                                                                                    <option>Pending</option>
                                                                                    <option>Received</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <input disabled="" type="text" placeholder="DD/MM/YYYY" class="status-checker date-field form-control" name="sea_fta_received_date" autocomplete="new-password">
                                                                            </td>
                                                                            <td>
                                                                                 <select disabled="" class="status-checker form-control" name="sea_fta_source" autocomplete="new-password">
                                                                                    <?php $document_source = mysqli_query($con, "SELECT * FROM document_source"); 
                                                                                    while($document_source_arr = mysqli_fetch_array($document_source)) {
                                                                                ?>
                                                                                        <option value="<?php echo $document_source_arr['id'] ?>"><?php echo $document_source_arr['name'] ?></option>
                                                                                    <?php } ?>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <input disabled="" type="file" class="status-checker form-control" name="sea_fta_upload" autocomplete="new-password">
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                                <hr>
                                                                <div class="row">
                                                                    <table width="100%" class="form-table six-cols">
                                                                        <tr>
                                                                            <th></th>
                                                                            <th>Status</th>
                                                                            <th>Details</th>
                                                                            <th>Date</th>
                                                                            <th>Source</th>
                                                                            <th>Upload</th>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><strong>Others</strong></td>
                                                                            <td>
                                                                                 <select class="status-selector form-control" name="sea_others_status" autocomplete="new-password">
                                                                                    <option>Not Required</option>
                                                                                    <option>Pending</option>
                                                                                    <option>Received</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" disabled="" class="status-checker form-control" name="sea_others_details" autocomplete="new-password">
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" placeholder="DD/MM/YYYY" disabled="" class="status-checker date-field form-control" name="sea_others_date" autocomplete="new-password">
                                                                            </td>
                                                                            <td>
                                                                                 <select disabled="" class="status-checker form-control" name="sea_others_source" autocomplete="new-password">
                                                                                    <?php $document_source = mysqli_query($con, "SELECT * FROM document_source"); 
                                                                                    while($document_source_arr = mysqli_fetch_array($document_source)) {
                                                                                ?>
                                                                                        <option value="<?php echo $document_source_arr['id'] ?>"><?php echo $document_source_arr['name'] ?></option>
                                                                                    <?php } ?>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <input type="file" disabled="" class="status-checker form-control" name="sea_others_upload" autocomplete="new-password">
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item air-shipment" style="display: none;">
                                                <div class="accordion-header rounded-lg" id="accord-9Three" data-bs-toggle="collapse" data-bs-target="#collapse9Three" aria-controls="collapse9Three"   aria-expanded="true"  role="button">
                                                    <span class="accordion-header-icon"></span>
                                                <span class="accordion-header-text">Document Required Air LCL Shipment</span>
                                                <span class="accordion-header-indicator"></span>
                                                </div>
                                                <div id="collapse9Three" class="collapse accordion__body show" aria-labelledby="accord-9Three" data-bs-parent="#accordion-nine">
                                                    <div class="accordion-body-text">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div class="basic-form">
                                                                    <div class="row">
                                                                        <table width="100%" class="form-table">
                                                                            <tr>
                                                                                <th></th>
                                                                                <th>Number</th>
                                                                                <th>Value</th>
                                                                                <th>Approved Date</th>
                                                                                <th>Expiry Date</th>
                                                                            </tr>
                                                                            <tr>
                                                                                <td><strong>FI</strong></td>
                                                                                <td><input type="text" class="form-control" name="air_fl_no" autocomplete="new-password"></td>
                                                                                <td><input type="text" class="form-control" name="air_fl_value" autocomplete="new-password"></td>
                                                                                <td><input type="text" placeholder="DD/MM/YYYY" class="date-field form-control" name="air_fl_approved_date" autocomplete="new-password"></td>
                                                                                <td><input type="text" placeholder="DD/MM/YYYY" class="date-field form-control" name="air_fl_expiry_date" autocomplete="new-password"></td>
                                                                            </tr>
                                                                        </table>
                                                                    </div>
                                                                    <hr>
                                                                    <div class="row">
                                                                        <table width="100%" class="form-table">
                                                                            <tr>
                                                                                <th></th>
                                                                                <th>Status</th>
                                                                                <th>Received Date</th>
                                                                                <th>Source</th>
                                                                                <th>Upload</th>
                                                                            </tr>
                                                                            <tr>
                                                                                <td><strong>Invoice</strong></td>
                                                                                <td>
                                                                                     <select class="status-selector form-control" name="air_invoice_status" autocomplete="new-password">
                                                                                        <option>Not Required</option>
                                                                                        <option>Pending</option>
                                                                                        <option>Received</option>
                                                                                    </select>
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" placeholder="DD/MM/YYYY" disabled="" class="status-checker date-field form-control" name="air_invoice_received_date" autocomplete="new-password">
                                                                                </td>
                                                                                <td>
                                                                                     <select disabled="" class="status-checker form-control" name="air_invoice_source" autocomplete="new-password">
                                                                                        <?php $document_source = mysqli_query($con, "SELECT * FROM document_source"); 
                                                                                    while($document_source_arr = mysqli_fetch_array($document_source)) {
                                                                                ?>
                                                                                        <option value="<?php echo $document_source_arr['id'] ?>"><?php echo $document_source_arr['name'] ?></option>
                                                                                    <?php } ?>
                                                                                    </select>
                                                                                </td>
                                                                                <td>
                                                                                    <input type="file" disabled="" class="status-checker form-control" name="air_invoice_upload" autocomplete="new-password">
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td><strong>Packing List</strong></td>
                                                                                <td>
                                                                                     <select class="status-selector form-control" name="air_packing_list_status" autocomplete="new-password">
                                                                                        <option>Not Required</option>
                                                                                        <option>Pending</option>
                                                                                        <option>Received</option>
                                                                                    </select>
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" placeholder="DD/MM/YYYY" disabled="" class="status-checker date-field form-control" name="air_packing_list_received_date" autocomplete="new-password">
                                                                                </td>
                                                                                <td>
                                                                                     <select disabled="" class="status-checker form-control" name="air_packing_list_source" autocomplete="new-password">
                                                                                        <?php $document_source = mysqli_query($con, "SELECT * FROM document_source"); 
                                                                                    while($document_source_arr = mysqli_fetch_array($document_source)) {
                                                                                ?>
                                                                                        <option value="<?php echo $document_source_arr['id'] ?>"><?php echo $document_source_arr['name'] ?></option>
                                                                                    <?php } ?>
                                                                                    </select>
                                                                                </td>
                                                                                <td>
                                                                                    <input type="file" disabled="" class="status-checker form-control" name="air_packing_list_upload" autocomplete="new-password">
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td><strong>Bank Endorsement</strong></td>
                                                                                <td>
                                                                                     <select class="status-selector form-control" name="air_bank_endorsement_status" autocomplete="new-password">
                                                                                        <option>Not Required</option>
                                                                                        <option>Pending</option>
                                                                                        <option>Received</option>
                                                                                    </select>
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" placeholder="DD/MM/YYYY" disabled="" class="status-checker date-field form-control" name="air_bank_endorsement_received_date" autocomplete="new-password">
                                                                                </td>
                                                                                <td>
                                                                                     <select disabled="" class="status-checker form-control" name="air_bank_endorsement_source" autocomplete="new-password">
                                                                                        <?php $document_source = mysqli_query($con, "SELECT * FROM document_source"); 
                                                                                    while($document_source_arr = mysqli_fetch_array($document_source)) {
                                                                                ?>
                                                                                        <option value="<?php echo $document_source_arr['id'] ?>"><?php echo $document_source_arr['name'] ?></option>
                                                                                    <?php } ?>
                                                                                    </select>
                                                                                </td>
                                                                                <td>
                                                                                    <input type="file" disabled="" class="status-checker form-control" name="air_bank_endorsement_upload" autocomplete="new-password">
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td><strong>HAWB</strong></td>
                                                                                <td>
                                                                                     <select class="status-selector form-control" name="air_hawb_status" autocomplete="new-password">
                                                                                        <option>Not Required</option>
                                                                                        <option>Pending</option>
                                                                                        <option>Received</option>
                                                                                    </select>
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" placeholder="DD/MM/YYYY" disabled="" class="status-checker date-field form-control" name="air_hawb_received_date" autocomplete="new-password">
                                                                                </td>
                                                                                <td>
                                                                                     <select disabled="" class="status-checker form-control" name="air_hawb_source" autocomplete="new-password">
                                                                                        <?php $document_source = mysqli_query($con, "SELECT * FROM document_source"); 
                                                                                    while($document_source_arr = mysqli_fetch_array($document_source)) {
                                                                                ?>
                                                                                        <option value="<?php echo $document_source_arr['id'] ?>"><?php echo $document_source_arr['name'] ?></option>
                                                                                    <?php } ?>
                                                                                    </select>
                                                                                </td>
                                                                                <td>
                                                                                    <input type="file" disabled="" class="status-checker form-control" name="air_hawb_upload" autocomplete="new-password">
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td><strong>MAWB</strong></td>
                                                                                <td>
                                                                                     <select class="status-selector form-control" name="air_mawb_status" autocomplete="new-password">
                                                                                        <option>Not Required</option>
                                                                                        <option>Pending</option>
                                                                                        <option>Received</option>
                                                                                    </select>
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" placeholder="DD/MM/YYYY" disabled="" class="status-checker date-field form-control" name="air_mawb_received_date" autocomplete="new-password">
                                                                                </td>
                                                                                <td>
                                                                                     <select disabled="" class="status-checker form-control" name="air_mawb_source" autocomplete="new-password">
                                                                                        <?php $document_source = mysqli_query($con, "SELECT * FROM document_source"); 
                                                                                    while($document_source_arr = mysqli_fetch_array($document_source)) {
                                                                                ?>
                                                                                        <option value="<?php echo $document_source_arr['id'] ?>"><?php echo $document_source_arr['name'] ?></option>
                                                                                    <?php } ?>
                                                                                    </select>
                                                                                </td>
                                                                                <td>
                                                                                    <input type="file" disabled="" class="status-checker form-control" name="air_mawb_upload" autocomplete="new-password">
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td><strong>L/C</strong></td>
                                                                                <td>
                                                                                     <select class="status-selector form-control" name="air_lc_status" autocomplete="new-password">
                                                                                        <option>Not Required</option>
                                                                                        <option>Pending</option>
                                                                                        <option>Received</option>
                                                                                    </select>
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" placeholder="DD/MM/YYYY" disabled="" class="status-checker date-field form-control" name="air_lc_received_date" autocomplete="new-password">
                                                                                </td>
                                                                                <td>
                                                                                     <select disabled="" class="status-checker form-control" name="air_lc_source" autocomplete="new-password">
                                                                                        <?php $document_source = mysqli_query($con, "SELECT * FROM document_source"); 
                                                                                    while($document_source_arr = mysqli_fetch_array($document_source)) {
                                                                                ?>
                                                                                        <option value="<?php echo $document_source_arr['id'] ?>"><?php echo $document_source_arr['name'] ?></option>
                                                                                    <?php } ?>
                                                                                    </select>
                                                                                </td>
                                                                                <td>
                                                                                    <input type="file" disabled="" class="status-checker form-control" name="air_lc_upload" autocomplete="new-password">
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td><strong>Insurance Memo</strong></td>
                                                                                <td>
                                                                                     <select class="status-selector form-control" name="air_insurance_memo_status" autocomplete="new-password">
                                                                                        <option>Not Required</option>
                                                                                        <option>Pending</option>
                                                                                        <option>Received</option>
                                                                                    </select>
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" placeholder="DD/MM/YYYY" disabled="" class="status-checker date-field form-control" name="air_insurance_memo_received_date" autocomplete="new-password">
                                                                                </td>
                                                                                <td>
                                                                                     <select disabled="" class="status-checker form-control" name="air_insurance_memo_source" autocomplete="new-password">
                                                                                        <?php $document_source = mysqli_query($con, "SELECT * FROM document_source"); 
                                                                                    while($document_source_arr = mysqli_fetch_array($document_source)) {
                                                                                ?>
                                                                                        <option value="<?php echo $document_source_arr['id'] ?>"><?php echo $document_source_arr['name'] ?></option>
                                                                                    <?php } ?>
                                                                                    </select>
                                                                                </td>
                                                                                <td>
                                                                                    <input type="file" disabled="" class="status-checker form-control" name="air_insurance_memo_upload" autocomplete="new-password">
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td><strong>FTA</strong></td>
                                                                                <td>
                                                                                     <select class="status-selector form-control" name="air_fta_status" autocomplete="new-password">
                                                                                        <option>Not Required</option>
                                                                                        <option>Pending</option>
                                                                                        <option>Received</option>
                                                                                    </select>
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" placeholder="DD/MM/YYYY" disabled="" class="status-checker date-field form-control" name="air_fta_received_date" autocomplete="new-password">
                                                                                </td>
                                                                                <td>
                                                                                     <select disabled="" class="status-checker form-control" name="air_fta_source" autocomplete="new-password">
                                                                                        <?php $document_source = mysqli_query($con, "SELECT * FROM document_source"); 
                                                                                    while($document_source_arr = mysqli_fetch_array($document_source)) {
                                                                                ?>
                                                                                        <option value="<?php echo $document_source_arr['id'] ?>"><?php echo $document_source_arr['name'] ?></option>
                                                                                    <?php } ?>
                                                                                    </select>
                                                                                </td>
                                                                                <td>
                                                                                    <input type="file" disabled="" class="status-checker form-control" name="air_fta_upload" autocomplete="new-password">
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </div>
                                                                    <hr>
                                                                    <div class="row">
                                                                        <table width="100%" class="form-table six-cols">
                                                                            <tr>
                                                                                <th></th>
                                                                                <th>Status</th>
                                                                                <th>Details</th>
                                                                                <th>Date</th>
                                                                                <th>Source</th>
                                                                                <th>Upload</th>
                                                                            </tr>
                                                                            <tr>
                                                                                <td><strong>Others</strong></td>
                                                                                <td>
                                                                                     <select class="status-selector form-control" name="air_others_status" autocomplete="new-password">
                                                                                        <option>Not Required</option>
                                                                                        <option>Pending</option>
                                                                                        <option>Received</option>
                                                                                    </select>
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" disabled="" class="status-checker form-control" name="air_others_details" autocomplete="new-password">
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" placeholder="DD/MM/YYYY" disabled="" class="status-checker date-field form-control" name="air_others_date" autocomplete="new-password">
                                                                                </td>
                                                                                <td>
                                                                                     <select disabled="" class="status-checker form-control" name="air_others_source" autocomplete="new-password">
                                                                                        <?php $document_source = mysqli_query($con, "SELECT * FROM document_source"); 
                                                                                    while($document_source_arr = mysqli_fetch_array($document_source)) {
                                                                                ?>
                                                                                        <option value="<?php echo $document_source_arr['id'] ?>"><?php echo $document_source_arr['name'] ?></option>
                                                                                    <?php } ?>
                                                                                    </select>
                                                                                </td>
                                                                                <td>
                                                                                    <input type="file" disabled="" class="status-checker form-control" name="air_others_upload" autocomplete="new-password">
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-box" data-tab="files-status">
                                            <div class="accordion-item">
                                                <div class="accordion-header rounded-lg" id="accord-9GI" data-bs-toggle="collapse" data-bs-target="#collapse9GI" aria-controls="collapse9GI"   aria-expanded="true"  role="button">
                                                    <span class="accordion-header-icon"></span>
                                                    <span class="accordion-header-text">Files Status</span>
                                                    <span class="accordion-header-indicator"></span>
                                                </div>
                                                <div id="collapse9GI" class="collapse accordion__body show" aria-labelledby="accord-9GI" data-bs-parent="#accordion-nine">
                                                    <div class="accordion-body-text">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div class="basic-form">
                                                                    <div class="row">
                                                                        <div class="mb-3 col-md-4">
                                                                            <label class="form-label">Shipment Arrival</label>
                                                                            <input type="text" placeholder="DD/MM/YYYY" class="date-field form-control" name="shipment_arrival" autocomplete="new-password">
                                                                        </div>
                                                                        <div class="mb-3 col-md-4">
                                                                            <div class="d-flex justify-content-between align-items-center mb-1">
                                                                                <label class="form-label">GD Status</label>
                                                                                <a href="javascript:;" class="badge badge-success modify-value" data-tablename="gd_status" data-htmlname="GD Status" data-bs-toggle="modal" data-bs-target="#optionModal"><i class="fa fa-plus"></i></a>
                                                                            </div>            
                                                                            <select class="form-control" name="gd_status" autocomplete="new-password">
                                                                                <?php $gd_status = mysqli_query($con, "SELECT * FROM gd_status"); 
                                                                                    while($gd_status_arr = mysqli_fetch_array($gd_status)) {
                                                                                ?>
                                                                                        <option value="<?php echo $gd_status_arr['id'] ?>"><?php echo $gd_status_arr['name'] ?></option>
                                                                                <?php } ?>
                                                                            </select>
                                                                        </div>
                                                                        <div class="mb-3 col-md-4">
                                                                            <label class="form-label">Funds Demand Send on</label>
                                                                            <input type="text" placeholder="DD/MM/YYYY" class="date-field form-control" name="funds_demand_send_on" autocomplete="new-password">
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                    <div class="row">
                                                                        <div class="mb-3 col-md-4">
                                                                            <label class="form-label">D/O Collect on</label>
                                                                            <input type="text" placeholder="DD/MM/YYYY" class="date-field form-control" name="do_collect_on" autocomplete="new-password">
                                                                        </div>
                                                                        <div class="mb-3 col-md-4">
                                                                            <label class="form-label">NOC Valid Till</label>
                                                                            <input type="text" placeholder="DD/MM/YYYY" class="date-field form-control" name="noc_valid_till" autocomplete="new-password">
                                                                        </div>
                                                                        <div class="mb-3 col-md-4">
                                                                            <label class="form-label">Shipment Delivered on</label>
                                                                            <input type="text" placeholder="DD/MM/YYYY" class="date-field form-control" name="shipment_delivered_on" autocomplete="new-password">
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                    <div class="row">
                                                                        <div class="mb-3 col-md-4">
                                                                            <label class="form-label">EIR received on</label>
                                                                            <input type="text" placeholder="DD/MM/YYYY" class="date-field form-control" name="eir_received_on" autocomplete="new-password">
                                                                        </div>
                                                                        <div class="mb-3 col-md-4">
                                                                            <label class="form-label">Refund Case submit on</label>
                                                                            <input type="text" placeholder="DD/MM/YYYY" class="date-field form-control" name="refund_case_submit_on" autocomplete="new-password">
                                                                        </div>
                                                                        <div class="mb-3 col-md-4">
                                                                            <label class="form-label">Deposit Refund on</label>
                                                                            <input type="text" placeholder="DD/MM/YYYY" class="date-field form-control" name="deposit_refund_on" autocomplete="new-password">
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                    <div class="row">
                                                                        <div class="mb-3 col-md-4">
                                                                            <label class="form-label">Refund Amount</label>
                                                                            <input type="number" class="form-control" name="refund_amount" autocomplete="new-password">
                                                                        </div>
                                                                        <div class="mb-3 col-md-4">
                                                                            <label class="form-label">Final Detention Amount</label>
                                                                            <input type="number" class="form-control" name="final_detention_amount" autocomplete="new-password">
                                                                        </div>
                                                                        <div class="mb-3 col-md-4">
                                                                            <label class="form-label">Free Days</label>
                                                                            <input type="number" class="form-control" name="free_days" autocomplete="new-password">
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                    <div class="row align-items-end">
                                                                        <div class="mb-3 col-md-4">
                                                                            <div class="d-flex justify-content-between align-items-center mb-1">
                                                                                <label class="form-label">Shipping Line</label>
                                                                                <a href="javascript:;" class="badge badge-success modify-value" data-tablename="shipping_line" data-htmlname="Shipping Line" data-bs-toggle="modal" data-bs-target="#optionModal"><i class="fa fa-plus"></i></a>
                                                                            </div>
                                                                            <select class="form-control" name="shipping_line" autocomplete="new-password">
                                                                                <?php $shipping_line = mysqli_query($con, "SELECT * FROM shipping_line"); 
                                                                                    while($shipping_line_arr = mysqli_fetch_array($shipping_line)) {
                                                                                ?>
                                                                                        <option value="<?php echo $shipping_line_arr['id'] ?>"><?php echo $shipping_line_arr['name'] ?></option>
                                                                                <?php } ?>
                                                                            </select>
                                                                        </div>
                                                                        <div class="mb-3 col-md-8 bill-row">
                                                                            <div class="row align-items-end">
                                                                                <div class="col-md-2">
                                                                                    <label class="form-label">Bill Status</label>
                                                                                </div>
                                                                                <div class="col-md-5">
                                                                                    <div class="d-flex justify-content-between align-items-center mb-1">
                                                                                        <label class="form-label">Bill Status</label>
                                                                                        <a href="javascript:;" class="badge badge-success modify-value" data-tablename="bill_status" data-htmlname="Bill Status" data-bs-toggle="modal" data-bs-target="#optionModal"><i class="fa fa-plus"></i></a>
                                                                                    </div>
                                                                                    <select class="form-control" name="bill_status" autocomplete="new-password">
                                                                                        <?php $bill_status = mysqli_query($con, "SELECT * FROM bill_status"); 
                                                                                            while($bill_status_arr = mysqli_fetch_array($bill_status)) {
                                                                                        ?>
                                                                                                <option value="<?php echo $bill_status_arr['id'] ?>"><?php echo $bill_status_arr['name'] ?></option>
                                                                                        <?php } ?>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-md-5">
                                                                                    <div class="d-flex justify-content-end">
                                                                                        <div class="form-check custom-checkbox mb-3 checkbox-success check-lg">
                                                                                            <input type="checkbox" class="form-check-input" checked id="billDate" required>
                                                                                            <label class="form-check-label" for="customCheckBox8"></label>
                                                                                        </div>
                                                                                    </div>
                                                                                    <input type="text" placeholder="DD/MM/YYYY" class="date-field form-control" name="bill_status_on" autocomplete="new-password">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                    <div class="row">
                                                                        <div class="mb-3 col-md-6">
                                                                            <label class="form-label">Remarks</label>
                                                                            <input type="text" class="form-control" name="file_remarks" autocomplete="new-password">
                                                                        </div>
                                                                        <div class="mb-3 col-md-6">
                                                                            <label class="form-label">Additional Remarks</label>
                                                                            <input type="text" class="form-control" name="file_additional_remarks" autocomplete="new-password">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        
                                        <div class="tab-box" data-tab="shipment-charges">
                                            <div class="accordion-item">
                                                <div class="accordion-header rounded-lg" id="accord-9Four" data-bs-toggle="collapse" data-bs-target="#collapse9Four" aria-controls="collapse9Four"   aria-expanded="true"  role="button">
                                                    <span class="accordion-header-icon"></span>
                                                <span class="accordion-header-text">Shipment Charges</span>
                                                <span class="accordion-header-indicator"></span>
                                                </div>
                                                <div id="collapse9Four" class="collapse accordion__body show" aria-labelledby="accord-9Four" data-bs-parent="#accordion-nine">
                                                <div class="accordion-body-text">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h4 class="card-title">Shipping Charges</h4>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="basic-form">
                                                                <div class="row">
                                                                    <?php $beneficiary = mysqli_query($con, "SELECT * FROM beneficiary"); 
                                                                        $beneficiary_ids = '';
                                                                        $beneficiarys = '';
                                                                        while($beneficiary_arr = mysqli_fetch_array($beneficiary)) {
                                                                            $beneficiary_ids .= $beneficiary_arr['id'] . ',';
                                                                            $beneficiarys .= $beneficiary_arr['name'] . ',';
                                                                        } 
                                                                    ?>

                                                                    <input type="hidden" id="beneficiary_ids" value="<?php echo $beneficiary_ids; ?>">
                                                                    <input type="hidden" id="beneficiarys" value="<?php echo $beneficiarys; ?>">

                                                                    <?php $shipping_charges_description = mysqli_query($con, "SELECT * FROM shipping_charges_description"); 
                                                                        $shipping_charges_description_ids = '';
                                                                        $shipping_charges_descriptions = '';
                                                                        while($shipping_charges_description_arr = mysqli_fetch_array($shipping_charges_description)) {
                                                                            $shipping_charges_description_ids .= $shipping_charges_description_arr['id'] . ',';
                                                                            $shipping_charges_descriptions .= $shipping_charges_description_arr['name'] . ',';
                                                                        } 
                                                                    ?>

                                                                    <input type="hidden" id="shipping_charges_description_ids" value="<?php echo $shipping_charges_description_ids; ?>">
                                                                    <input type="hidden" id="shipping_charges_descriptions" value="<?php echo $shipping_charges_descriptions; ?>">

                                                                    <table width="100%" class="form-table six-cols expense-table">
                                                                        <tr>
                                                                            <th style="width: 5%;">Add/Remove</th>
                                                                            <th style="width: 5%;">S#</th>
                                                                            <th>Description</th>
                                                                            <th>In Favor Of</th>
                                                                            <th>Rate Valid Till</th>
                                                                            <th>Beneficiary</th>
                                                                            <th>Amount</th>
                                                                        </tr>
                                                                    </table>
                                                                    <div class="col-md-3"><a href="javascript:;" class="btn btn-secondary add-expense mt-2">Add Expense</a></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-box" data-tab="upload-documents">
                                            <div class="accordion-item">
                                                <div class="accordion-header rounded-lg" id="accord-9Five" data-bs-toggle="collapse" data-bs-target="#collapse9Five" aria-controls="collapse9Five"   aria-expanded="true"  role="button">
                                                    <span class="accordion-header-icon"></span>
                                                <span class="accordion-header-text">Upload Documents</span>
                                                <span class="accordion-header-indicator"></span>
                                                </div>
                                                <div id="collapse9Five" class="collapse accordion__body show" aria-labelledby="accord-9Five" data-bs-parent="#accordion-nine">
                                                <div class="accordion-body-text">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="basic-form">
                                                                <div class="row">
                                                                    <?php $document_name = mysqli_query($con, "SELECT * FROM document_name"); 
                                                                        $document_name_ids = '';
                                                                        $document_names = '';
                                                                        while($document_name_arr = mysqli_fetch_array($document_name)) {
                                                                            $document_name_ids .= $document_name_arr['id'] . ',';
                                                                            $document_names .= $document_name_arr['name'] . ',';
                                                                        } 
                                                                    ?>

                                                                    <input type="hidden" id="document_name_ids" value="<?php echo $document_name_ids; ?>">
                                                                    <input type="hidden" id="document_names" value="<?php echo $document_names; ?>">


                                                                    <table width="100%" class="form-table docs-table">
                                                                        <tr>
                                                                            <th style="width: 5%;">S#</th>
                                                                            <th>Document Name</th>
                                                                            <th>Remarks</th>
                                                                            <th></th>
                                                                            <th></th>
                                                                        </tr>

                                                                    </table>
                                                                    <div class="col-md-3"><a href="javascript:;" class="btn btn-secondary add-docs mt-2">Add Document</a></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- tab-boxes -->
                                </div><!-- shipment-tabs -->
                            </div>

                            <div class="row">
                                <div class="mb-3 col-md-3 offset-md-9 text-end">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </form>
					</div>
				</div>
			</div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->

         <!-- Modal -->
        <div class="modal fade" id="optionModal">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <form action="" class="add-options">
                        <div class="modal-header">
                            <h5 class="modal-title">Add <span class="purpose-html">x</span></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal">
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="table_name" id="table_name">
                            <input type="text" class="form-control" name="option_name" id="option_name" placeholder="Add Option">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

<?php include('inc/footer.php'); ?>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.min.js"></script> -->
<script>
    // jQuery('input[type="date"]').on("change", function() {
    //     this.setAttribute(
    //         "data-date",
    //         moment(this.value, "YYYY-MM-DD")
    //         .format( this.getAttribute("data-date-format") )
    //     )
    // }).trigger("change")

    $('.date-field').datetimepicker({
        format: 'DD/MM/YYYY'
    });

    jQuery('form.add-options').submit(function(e){
        e.preventDefault(); // avoid to execute the actual submit of the form.
        var table_name = jQuery('#table_name').val();
        var option_name = jQuery('#option_name').val();
        
        var formData = new FormData(this);
        formData.append("reason", "new_option");
        $.ajax({
            url: 'actions/ajax.php',
            type: 'POST',
            data: formData,
            success: function (response) {
                response = JSON.parse(response);
                var option_id = response.option_id;
                jQuery('select[name="'+table_name+'"]').append('<option value="'+option_id+'">'+option_name+'</option>');
                if(response.error == 'no') {
                    jQuery('#optionModal').modal('toggle');
                }
            },
            cache: false,
            contentType: false,
            processData: false
        }); 
    })

    jQuery('.modify-value').click(function(){
        jQuery('#option_name').val('').focus();
        var tablename = jQuery(this).data('tablename');
        var htmlname = jQuery(this).data('htmlname');

        jQuery('.purpose-html').html(htmlname);
        jQuery('[name="table_name"]').val(tablename);
    })

	jQuery('.create-shipment-form').submit(function(e){
		e.preventDefault(); // avoid to execute the actual submit of the form.
		var formData = new FormData(this);
	    formData.append("reason", "create-shipment");
	    $.ajax({
	        url: 'actions/ajax.php',
	        type: 'POST',
	        data: formData,
	        success: function (response) {
	            response = JSON.parse(response);
				if(response.error == 'no') {
					Swal.fire({
					  icon: 'success',
					  title: response.message,
					}).then((result) => {
					  window.open('/shipment', '_SELF');
					})
				}
	        },
	        cache: false,
	        contentType: false,
	        processData: false
	    });	
	})

    jQuery('.add-expense').click(function(){
        var curLength = jQuery('.expense-table tr').length;
        var selectOptions = '';
        var curSelected = jQuery('select[name="shipping_line"]').val();
        jQuery('select[name="shipping_line"] option').each(function(){
            var addAttr = '';
            if(jQuery(this).val() == curSelected) {
                addAttr = 'selected=""';
            }
            selectOptions += '<option value="'+jQuery(this).val()+'" '+addAttr+'>'+jQuery(this).html()+'</option>';
        })

        var beneficiary_ids = jQuery('#beneficiary_ids').val();
        var beneficiarys = jQuery('#beneficiarys').val();
        beneficiary_ids  = beneficiary_ids.split(',');
        beneficiarys  = beneficiarys.split(',');
        var selectbeneficiary = '<option value="">Select Beneficiary</option>';
        for(var i = 0; i < (beneficiarys.length - 1); i++) {
            selectbeneficiary += '<option value="'+beneficiary_ids[i]+'">'+beneficiarys[i]+'</option>';
        }

        var shipping_charges_description_ids = jQuery('#shipping_charges_description_ids').val();
        var shipping_charges_descriptions = jQuery('#shipping_charges_descriptions').val();
        shipping_charges_description_ids  = shipping_charges_description_ids.split(',');
        shipping_charges_descriptions  = shipping_charges_descriptions.split(',');
        var selectshipping_charges_description = '<option value="">Select Description</option>';
        for(var i = 0; i < (shipping_charges_descriptions.length - 1); i++) {
            selectshipping_charges_description += '<option value="'+shipping_charges_description_ids[i]+'">'+shipping_charges_descriptions[i]+'</option>';
        }

        
        jQuery('.expense-table').append('<tr>\
                                    <td style="width: 5%;"><a href="javascript:;" class="me-2 remove-expense btn btn-danger btn-sm"><i class="fa fa-minus"></i></a></td>\
                                    <td style="width: 5%;">'+curLength+'.</td>\
                                    <td>\
                                        <select class="form-control" name="expense_description[]" autocomplete="new-password">\
                                            '+selectshipping_charges_description+'\
                                        </select>\
                                    </td>\
                                    <td>\
                                        <select class="form-control" name="expense_in_favor_of[]" autocomplete="new-password">\
                                            '+selectOptions+'\
                                        </select>\
                                    </td>\
                                    <td><input type="text" placeholder="DD/MM/YYYY" class="date-field form-control" name="expense_rate_valid_till[]" autocomplete="new-password"></td>\
                                    <td>\
                                        <select class="form-control" name="expense_beneficiary[]" autocomplete="new-password">\
                                            '+selectbeneficiary+'\
                                        </select>\
                                    </td>\
                                    <td><input type="text" class="form-control" name="expense_amount[]" autocomplete="new-password"></td>\
                                </tr>');
        $('.date-field').datetimepicker({
            format: 'DD/MM/YYYY'
        });
    })
    jQuery(document).on('click', '.remove-expense', function(){
        jQuery(this).parents('tr').remove();
    })


    jQuery('.add-docs').click(function(){
        var curLength = jQuery('.docs-table tr').length;
        
        var document_name_ids = jQuery('#document_name_ids').val();
        var document_names = jQuery('#document_names').val();
        document_name_ids  = document_name_ids.split(',');
        document_names  = document_names.split(',');
        var selectdocument_name = '<option value="">Select Document Name</option>';
        for(var i = 0; i < (document_names.length - 1); i++) {
            selectdocument_name += '<option value="'+document_name_ids[i]+'">'+document_names[i]+'</option>';
        }

        jQuery('.docs-table').append('<tr>\
                                    <td style="width: 5%;">'+curLength+'.</td>\
                                    <td>\
                                        <select class="form-control" name="document_name[]" autocomplete="new-password">\
                                            '+selectdocument_name+'\
                                        </select>\
                                    </td>\
                                    <td><input type="text" class="form-control" name="document_remarks[]" autocomplete="new-password"></td>\
                                    <td><input type="file" class="form-control" name="document_file[]" autocomplete="new-password"></td>\
                                    <td><a href="javascript:;" class="me-2 remove-docs btn btn-danger btn-sm"><i class="fa fa-minus"></i></a></td>\
                                </tr>');
    })
    jQuery(document).on('click', '.remove-docs', function(){
        jQuery(this).parents('tr').remove();
    })

    jQuery('#shipment_mode').change(function(){
        if(jQuery(this).val() == 'Sea LCL') {
            jQuery('.air-shipment').hide();
            jQuery('.sea-shipment').show();
        } else {
            jQuery('.air-shipment').show();
            jQuery('.sea-shipment').hide();
        }
    })

    jQuery('.status-selector').change(function(){
        if(jQuery(this).val() == 'Received') {
            jQuery(this).parents('tr').find('.status-checker').removeAttr('disabled');
        } else {
            jQuery(this).parents('tr').find('.status-checker').attr('disabled', '');
        }
    })


jQuery('.add-pkg').click(function(){
    var totalRows = Number(jQuery('.packages-tr tr').length) + 1;
    var selectOptions = '';
    jQuery('.packages-tr tr:first-child select option').each(function(){
        selectOptions += '<option value="'+jQuery(this).val()+'">'+jQuery(this).html()+'</option>';
    })
    jQuery('.packages-tr').append('<tr>\
                        <td style="width: 5%;">'+totalRows+'.</td>\
                        <td><input type="number" class="form-control" name="package_no[]" autocomplete="new-password"></td>\
                        <td>\
                            <select class="form-control" name="package_type[]" autocomplete="new-password">\
                                '+selectOptions+'\
                            </select>\
                        </td>\
                        <td style="width: 5%;"><a href="javascript:;" class="me-2 remove-pkg btn btn-danger btn-sm"><i class="fa fa-minus"></i></a></td>\
                    </tr>');
})
jQuery(document).on('click', '.remove-pkg', function(){
    jQuery(this).parents('tr').remove();
})

jQuery('.add-container').click(function(){
    var totalRows = Number(jQuery('.container-tr tr').length) + 1;
    var selectOptions = '';
    jQuery('.container-tr tr:first-child select option').each(function(){
        selectOptions += '<option value="'+jQuery(this).val()+'">'+jQuery(this).html()+'</option>';
    })
    jQuery('.container-tr').append('<tr>\
                        <td style="width: 5%;">'+totalRows+'.</td>\
                        <td><input type="text" class="form-control" name="container_no[]" autocomplete="new-password"></td>\
                        <td>\
                            <select class="form-control" name="container_type[]" autocomplete="new-password">\
                                '+selectOptions+'\
                            </select>\
                        </td>\
                        <td style="width: 5%;"><a href="javascript:;" class="me-2 remove-container btn btn-danger btn-sm"><i class="fa fa-minus"></i></a></td>\
                    </tr>');
})
jQuery(document).on('click', '.remove-container', function(){
    jQuery(this).parents('tr').remove();
})

jQuery('.tab-lists a').click(function(){
    var curTab = jQuery(this).data('tab');
    jQuery('.tab-lists a').removeClass('active-tab');
    jQuery(this).addClass('active-tab');
    jQuery('.tab-box').fadeOut();
    jQuery('.tab-box[data-tab="'+curTab+'"]').fadeIn();
})

    jQuery('#billDate').change(function(){
        if(jQuery(this).is(':checked')) {
            jQuery('input[name="bill_status_on"]').removeAttr('readonly');
        } else {
            jQuery('input[name="bill_status_on"]').attr('readonly', '').val('');
        }
    })
  </script>