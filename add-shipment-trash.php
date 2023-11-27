<?php /*ini_set('display_errors', 0);
error_reporting(E_ERROR | E_WARNING | E_PARSE);*/ 
$pageName = 'Shipment'; include('inc/header.php');

if(isset($_GET['id'])) {
    $shipment_id = $_GET['id'];
    $shipmentArr = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM `shipment` WHERE `id` = '$shipment_id'"));
}

 ?>
		
<!--**********************************
Content body start
***********************************-->
<div class="content-body">
<div class="container-fluid pdchanges">
	<div class="row">
		<div class="col-xl-12">
            <form action="" method="post" class="create-shipment-form">
                <?php if(isset($_GET['id'])) { ?>
                    <input type="hidden" name="shipping_id" value="<?php echo $_GET['id']; ?>">
                <?php } ?>
                <div class="accordion accordion-active-header">
                    <h3 class="heading">File Entry</h3>
                    <div class="shipment-tabs">
                        <div class="tab-lists">
                            <ul>
                                <li><a href="javascript:;" class="active-tab" data-tab="consignment-tab">Consignment Information</a></li>
                                <li><a href="javascript:;" data-tab="financial-tab">Financial Information</a></li>
                                <li><a href="javascript:;" data-tab="commodity-tab">Commodity Information</a></li>
                                <li><a href="javascript:;" data-tab="documents-required-tab">Required Documents</a></li>
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
                                    <span class="accordion-header-text"><img src="/images/img/contract.png">Consignment Information</span>
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
                                                                <input type="text" placeholder="DD/MM/YYYY" class="date-field form-control" value="<?php echo ($shipmentArr['date'] != '') ? date('d/m/y', strtotime($shipmentArr['date'])) : ''; ?>" name="date" autocomplete="new-password">
                                                            </div>
                                                            <div class="mb-3 col-md-4">
                                                                <label class="form-label">BL Number</label>
                                                                <input type="text" class="form-control" value="<?php echo $shipmentArr['bl_number']; ?>" name="bl_number" autocomplete="new-password">
                                                            </div>
                                                            <div class="mb-3 col-md-4">
                                                                <label class="form-label">BL Date</label>
                                                                <input type="text" placeholder="DD/MM/YYYY" class="date-field form-control" value="<?php echo ($shipmentArr['bl_date'] != '') ? date('d/m/y', strtotime($shipmentArr['bl_date'])) : ''; ?>" name="bl_date" autocomplete="new-password">
                                                            </div>
                                                        </div>
                                                        <hr>

                                                        <div class="row">
                                                            <div class="mb-3 col-md-4">
                                                                <label class="form-label">VIR/IGM No.</label>
                                                                <input type="text" class="form-control" pattern="\d{4}" maxlength="4" value="<?php echo $shipmentArr['igm_no']; ?>" name="igm_no" autocomplete="new-password">
                                                            </div>
                                                            <div class="mb-3 col-md-4">
                                                                <label class="form-label">VIR/IGM Date</label>
                                                                <input type="text" placeholder="DD/MM/YYYY" class="date-field form-control" value="<?php echo ($shipmentArr['igm_date'] != '') ? date('d/m/y', strtotime($shipmentArr['igm_date'])) : ''; ?>" name="igm_date" autocomplete="new-password">
                                                            </div>
                                                            <div class="mb-3 col-md-4">
                                                                <label class="form-label">Index Number</label>
                                                                <input type="text" class="form-control" name="index_no" pattern="\d{3}" minlength="3" maxlength="3" value="<?php echo $shipmentArr['index_no']; ?>" autocomplete="new-password">
                                                            </div>
                                                        </div>
                                                        <hr>

                                                        <div class="row">
                                                            <div class="mb-3 col-md-4">
                                                                <label class="form-label">Port Of Shipment</label>
                                                                <input type="text" class="form-control" value="<?php echo $shipmentArr['shipment_port']; ?>" name="shipment_port" autocomplete="new-password">
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
                                                                            <option <?php if($shipmentArr['collectorate'] == $collectorate_arr['id']) { echo 'selected=""'; } ?> value="<?php echo $collectorate_arr['id'] ?>"><?php echo $collectorate_arr['name'] ?></option>
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
                                                                            <option <?php if($shipmentArr['discharge_port'] == $discharge_port_arr['id']) { echo 'selected=""'; } ?> value="<?php echo $discharge_port_arr['id'] ?>"><?php echo $discharge_port_arr['name'] ?></option>
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
                                                                            <option <?php if($shipmentArr['consignee'] == $client_arr['id']) { echo 'selected=""'; } ?> value="<?php echo $client_arr['id'] ?>"><?php echo $client_arr['name'] ?></option>
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
                                                                            <option <?php if($shipmentArr['client'] == $client_arr['id']) { echo 'selected=""'; } ?> value="<?php echo $client_arr['id'] ?>"><?php echo $client_arr['name'] ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                            <div class="mb-3 col-md-4">
                                                                <label class="form-label">Consignor Name</label>
                                                                <input type="text" class="form-control" value="<?php echo $shipmentArr['consignor_name']; ?>" name="consignor_name" autocomplete="new-password">
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="mb-3 col-md-4">
                                                                <label class="form-label">Consignment Mode</label>
                                                                <select class="form-control" name="shipment_mode" id="shipment_mode" autocomplete="new-password">
                                                                    <option value="">Select Consignment Mode</option>
                                                                    <option <?php if($shipmentArr['shipment_mode'] == 'Containerized') { echo 'selected=""'; } ?>>Containerized</option>
                                                                    <option <?php if($shipmentArr['shipment_mode'] == 'Sea LCL') { echo 'selected=""'; } ?>>Sea LCL</option>
                                                                    <option <?php if($shipmentArr['shipment_mode'] == 'Air LCL') { echo 'selected=""'; } ?>>Air LCL</option>
                                                                </select>
                                                            </div>
                                                            <div class="mb-3 col-md-4">
                                                                <label class="form-label">Gross Weight KGs</label>
                                                                <input type="number" step="any" class="form-control" name="gross_weight" value="<?php echo $shipmentArr['gross_weight']; ?>" autocomplete="new-password">
                                                            </div>
                                                            <div class="mb-3 col-md-4">
                                                                <label class="form-label">Net Weight KGs</label>
                                                                <input type="number" readonly step="any" class="form-control" name="net_weight" value="<?php echo $shipmentArr['net_weight']; ?>" autocomplete="new-password">
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
                                                                            <option <?php if($shipmentArr['gd_type'] == $gd_type_arr['id']) { echo 'selected=""'; } ?> value="<?php echo $gd_type_arr['id'] ?>"><?php echo $gd_type_arr['name'] ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                            
                                                            <div class="mb-3 col-md-4">
                                                                <label class="form-label">GD Number</label>
                                                                <input type="text" class="form-control" pattern="\d{6}" maxlength="6" value="<?php echo $shipmentArr['gd_number']; ?>" name="gd_number" autocomplete="new-password">
                                                            </div>
                                                            <div class="mb-3 col-md-4 gddate">
                                                                <label class="form-label">GD Date</label>
                                                                <input type="text" placeholder="DD/MM/YYYY" class="date-field form-control" value="<?php echo ($shipmentArr['gd_date'] != '') ? date('d/m/y', strtotime($shipmentArr['gd_date'])) : ''; ?>" name="gd_date" autocomplete="new-password">
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="mb-3 col-md-4">
                                                                <label class="form-label">Party Refrence</label>
                                                                <input type="text" style="text-transform: uppercase;" class="form-control" value="<?php echo $shipmentArr['party_refrence']; ?>" name="party_refrence" autocomplete="new-password">
                                                            </div>
                                                            <div class="mb-3 col-md-4">
                                                                <label class="form-label">Other Refrence</label>
                                                                <input type="text" style="text-transform: uppercase;" class="form-control" value="<?php echo $shipmentArr['other_refrence']; ?>" name="other_refrence" autocomplete="new-password">
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="mb-3 col-md-12">
                                                                <label class="form-label">Marks</label>
                                                                <input type="text" style="text-transform: uppercase;" class="form-control" value="<?php echo $shipmentArr['marks']; ?>" name="marks" autocomplete="new-password">
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
                                    <span class="accordion-header-text"><img class="bnkinfo" src="/images/img/document.png">Package Information</span>
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
                                                                    <th></th>
                                                                    <th></th>
                                                                </tr>
                                                                <tbody class="packages-tr">
                                                                    <?php 
                                                                    if($shipmentArr['package_no'] != '') {
                                                                        $package_noArr = explode('||', $shipmentArr['package_no']);
                                                                        $package_typeArr = explode('||', $shipmentArr['package_type']);
                                                                        for($i = 0; $i < count($package_noArr); $i++) {
                                                                            ?>
                                                                            <tr>
                                                                                <td style="width: 5%;"><?php echo ($i + 1); ?>.</td>
                                                                                <td><input type="number" class="form-control" value="<?php echo $package_noArr[$i] ?>" name="package_no[]" autocomplete="new-password"></td>
                                                                                <td>
                                                                                    <select class="form-control" name="package_type[]" autocomplete="new-password">
                                                                                        <?php $package_type = mysqli_query($con, "SELECT * FROM package_type"); 
                                                                                            while($package_type_arr = mysqli_fetch_array($package_type)) {
                                                                                        ?>
                                                                                                <option <?php if($package_typeArr[$i] == $package_type_arr['id']) { echo 'selected=""'; } ?> value="<?php echo $package_type_arr['id'] ?>"><?php echo $package_type_arr['name'] ?></option>
                                                                                        <?php } ?>
                                                                                    </select>
                                                                                </td>
                                                                                <?php if($i > 0) { ?>
                                                                                    <td style="width: 5%;"><a href="javascript:;" class="me-2 remove-pkg btn btn-danger btn-sm"><i class="fa fa-minus"></i></a></td>
                                                                                <?php } ?>
                                                                                <td></td>
                                                                                <td></td>
                                                                            </tr>
                                                                            <?php
                                                                        }
                                                                    } else {
                                                                     ?>
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
                                                                            <td></td>
                                                                            <td></td>
                                                                        </tr>
                                                                    <?php } ?>
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
                                <?php 
                                    $style = '';
                                    if($shipmentArr['shipment_mode'] != 'Containerized') {
                                        $style = 'style="display: none"';
                                    } 
                                ?>
                                <div class="accordion-item containerize-accordion" <?php echo $style; ?>>
                                    <div class="accordion-header rounded-lg" id="accord-9Container" data-bs-toggle="collapse" data-bs-target="#collapse9Container" aria-controls="collapse9Container"   aria-expanded="true"  role="button">
                                        <span class="accordion-header-icon"></span>
                                    <span class="accordion-header-text"><img class="bnkinfo" src="/images/img/website.png">Container Information</span>
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
                                                                    <th></th>
                                                                    <th></th>
                                                                </tr>
                                                                <tbody class="container-tr">
                                                                    <?php 
                                                                    if($shipmentArr['container_no'] != '') {
                                                                        $container_noArr = explode('||', $shipmentArr['container_no']);
                                                                        $container_typeArr = explode('||', $shipmentArr['container_type']);
                                                                        for($i = 0; $i < count($container_noArr); $i++) {
                                                                            ?>
                                                                            <tr>
                                                                                <td style="width: 5%;"><?php echo ($i + 1); ?>.</td>
                                                                                <td><input type="text" class="form-control" value="<?php echo $container_noArr[$i] ?>" name="container_no[]"  pattern="[a-zA-Z]{4}[0-9]{7}" maxlength="11" style="text-transform: uppercase;" autocomplete="new-password"></td>
                                                                                <td>
                                                                                    <select class="form-control" name="container_type[]" autocomplete="new-password">
                                                                                        <?php $container_type = mysqli_query($con, "SELECT * FROM container_type"); 
                                                                                            while($container_type_arr = mysqli_fetch_array($container_type)) {
                                                                                        ?>
                                                                                                <option <?php if($container_typeArr[$i] == $container_type_arr['id']) { echo 'selected=""'; } ?> value="<?php echo $container_type_arr['id'] ?>"><?php echo $container_type_arr['name'] ?></option>
                                                                                        <?php } ?>
                                                                                    </select>
                                                                                </td>
                                                                                <?php if($i > 0) { ?>
                                                                                    <td style="width: 5%;"><a href="javascript:;" class="me-2 remove-container btn btn-danger btn-sm"><i class="fa fa-minus"></i></a></td>
                                                                                <?php } ?>
                                                                                <td></td>
                                                                                <td></td>
                                                                            </tr>
                                                                            <?php
                                                                        }
                                                                    } else {
                                                                     ?>
                                                                    <tr>
                                                                        <td style="width: 5%;">1.</td>
                                                                        <td><input type="text" class="form-control" name="container_no[]" pattern="[a-zA-Z]{4}[0-9]{7}" maxlength="11"  style="text-transform: uppercase;" autocomplete="new-password"></td>
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
                                                                        <td></td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <?php } ?>
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
                                    <span class="accordion-header-text"><img class="bnkinfo" src="/images/img/document.png">Financial Information</span>
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
                                                                            <option <?php if($shipmentArr['currency'] == $currency_arr['id']) { echo 'selected=""'; } ?> value="<?php echo $currency_arr['id'] ?>"><?php echo $currency_arr['name'] ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                            <div class="mb-3 col-md-4">
                                                                <label class="form-label">Exchange Rate</label>
                                                                <input type="number" step="any" class="form-control" name="exchange_rate" value="<?php echo $shipmentArr['exchange_rate']; ?>" autocomplete="new-password">
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
                                                                            <option <?php if($shipmentArr['delivery_term'] == $delivery_term_arr['id']) { echo 'selected=""'; } ?> value="<?php echo $delivery_term_arr['id'] ?>"><?php echo $delivery_term_arr['name'] ?></option>
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
                                                                            <option <?php if($shipmentArr['bank_name'] == $bank_name_arr['id']) { echo 'selected=""'; } ?> value="<?php echo $bank_name_arr['id'] ?>"><?php echo $bank_name_arr['name'] ?></option>
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
                                                                            <option <?php if($shipmentArr['payment_mode'] == $payment_mode_arr['id']) { echo 'selected=""'; } ?> value="<?php echo $payment_mode_arr['id'] ?>"><?php echo $payment_mode_arr['name'] ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="mb-3 col-md-4">
                                                                <label class="form-label">Invoice No.</label>
                                                                <input type="text" class="form-control" value="<?php echo $shipmentArr['invoice_no']; ?>" name="invoice_no" autocomplete="new-password">
                                                            </div>
                                                            <div class="mb-3 col-md-4">
                                                                <label class="form-label">Invoice Date</label>
                                                                <input type="text" placeholder="DD/MM/YYYY" class="date-field form-control" value="<?php echo ($shipmentArr['invoice_date'] != '') ? date('d/m/y', strtotime($shipmentArr['invoice_date'])) : ''; ?>" name="invoice_date" autocomplete="new-password">
                                                            </div>
                                                            <div class="mb-3 col-md-4">
                                                                <label class="form-label">Invoice Value</label>
                                                                <input type="number"  step="any" class="form-control" name="invoice_value" value="<?php echo $shipmentArr['invoice_value']; ?>" autocomplete="new-password">
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="mb-3 col-md-4">
                                                                <label class="form-label">LC Number</label>
                                                                <input type="text" class="form-control" value="<?php echo $shipmentArr['lc_no']; ?>" name="lc_no" autocomplete="new-password">
                                                            </div>
                                                            <div class="mb-3 col-md-4">
                                                                <label class="form-label">LC Date</label>
                                                                <input type="text" placeholder="DD/MM/YYYY" class="date-field form-control" value="<?php echo ($shipmentArr['lc_date'] != '') ? date('d/m/y', strtotime($shipmentArr['lc_date'])) : ''; ?>" name="lc_date" autocomplete="new-password">
                                                            </div>
                                                            <div class="mb-3 col-md-4">
                                                                <label class="form-label">LC Value</label>
                                                                <input type="number" step="any" class="form-control" name="lc_value" value="<?php echo $shipmentArr['lc_value']; ?>" autocomplete="new-password">
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="mb-3 col-md-4">
                                                                <label class="form-label">FOB Value</label>
                                                                <input type="number" step="any" class="form-control" name="fob" value="<?php echo $shipmentArr['fob']; ?>" autocomplete="new-password">
                                                            </div>
                                                            <div class="mb-3 col-md-4">
                                                                <label class="form-label">Freight Charges</label>
                                                                <input type="number" step="any" class="form-control" name="freight" value="<?php echo $shipmentArr['freight']; ?>" autocomplete="new-password">
                                                            </div>
                                                            <div class="mb-3 col-md-4">
                                                                <label class="form-label">CFR Value</label>
                                                                <input type="number" step="any" class="form-control" name="cfr" value="<?php echo $shipmentArr['cfr']; ?>" autocomplete="new-password">
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
                                    <span class="accordion-header-text"><img src="/images/img/information.png">Commodity Information</span>
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
                                                                <input type="text" class="form-control" value="<?php echo $shipmentArr['item_description']; ?>" name="item_description" autocomplete="new-password">
                                                            </div>
                                                            <div class="mb-3 col-md-4">
                                                                <label class="form-label">Quantity</label>
                                                                <input type="number" step="any" class="form-control" name="quantity" value="<?php echo $shipmentArr['quantity']; ?>" autocomplete="new-password">
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
                                                                            <option <?php if($shipmentArr['quantity_mode'] == $quantity_mode_arr['id']) { echo 'selected=""'; } ?> value="<?php echo $quantity_mode_arr['id'] ?>"><?php echo $quantity_mode_arr['name'] ?></option>
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
                            </div>

                            <div class="tab-box" data-tab="documents-required-tab">
                                <?php 
                                    $style = '';
                                    if($shipmentArr['shipment_mode'] == 'Air LCL') {
                                        $style = 'style="display: none"';
                                    } 
                                ?>           
                                <div class="accordion-item sea-shipment" <?php echo $style; ?>>
                                    <div class="accordion-header rounded-lg" id="accord-9Two" data-bs-toggle="collapse" data-bs-target="#collapse9Two" aria-controls="collapse9Two"   aria-expanded="true"  role="button">
                                        <span class="accordion-header-icon"></span>
                                    <span class="accordion-header-text"><img src="/images/img/file.png">Document Required Sea LCL Shipment</span>
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
                                                                <td><input type="text" class="form-control" value="<?php echo $shipmentArr['sea_fl_no']; ?>" name="sea_fl_no" autocomplete="new-password"></td>
                                                                <td><input type="text" class="form-control" value="<?php echo $shipmentArr['sea_fl_value']; ?>" name="sea_fl_value" autocomplete="new-password"></td>
                                                                <td><input type="text" placeholder="DD/MM/YYYY" class="date-field form-control" value="<?php echo ($shipmentArr['sea_fl_approved_date'] != '') ? date('d/m/y', strtotime($shipmentArr['sea_fl_approved_date'])) : ''; ?>" name="sea_fl_approved_date" autocomplete="new-password"></td>
                                                                <td><input type="text" placeholder="DD/MM/YYYY" class="date-field form-control" value="<?php echo ($shipmentArr['sea_fl_expiry_date'] != '') ? date('d/m/y', strtotime($shipmentArr['sea_fl_expiry_date'])) : ''; ?>" name="sea_fl_expiry_date" autocomplete="new-password"></td>
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
                                                                        <option <?php if($shipmentArr['sea_invoice_status'] == 'Not Required') { echo 'selected=""'; } ?>>Not Required</option>
                                                                        <option <?php if($shipmentArr['sea_invoice_status'] == 'Pending') { echo 'selected=""'; } ?>>Pending</option>
                                                                        <option <?php if($shipmentArr['sea_invoice_status'] == 'Received') { echo 'selected=""'; } ?>>Received</option>
                                                                    </select>
                                                                </td>
                                                                <?php 
                                                                $disabled = 'disabled=""';
                                                                if($shipmentArr['sea_invoice_status'] == 'Received') {
                                                                    $disabled = '';
                                                                }
                                                                 ?>
                                                                <td>
                                                                    <input <?php echo $disabled; ?> type="text" placeholder="DD/MM/YYYY" class="status-checker date-field form-control" name="sea_invoice_received_date" value="<?php echo ($shipmentArr['sea_invoice_received_date'] != '') ? date('d/m/y', strtotime($shipmentArr['sea_invoice_received_date'])) : ''; ?>" autocomplete="new-password">
                                                                </td>
                                                                <td>
                                                                     <select <?php echo $disabled; ?> class="status-checker form-control" name="sea_invoice_source" autocomplete="new-password">
                                                                        <?php $document_source = mysqli_query($con, "SELECT * FROM document_source"); 
                                                                        while($document_source_arr = mysqli_fetch_array($document_source)) {
                                                                    ?>
                                                                            <option <?php if($shipmentArr['sea_invoice_source'] == $document_source_arr['id']) { echo 'selected=""'; } ?> value="<?php echo $document_source_arr['id'] ?>"><?php echo $document_source_arr['name'] ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <div class="d-flex align-items-center">
                                                                    <input <?php echo $disabled; ?> type="file" class="status-checker form-control" name="sea_invoice_upload" autocomplete="new-password">
                                                                    <?php
                                                                        if($shipmentArr['sea_invoice_upload'] != '') {
                                                                            ?>
                                                                            <a class="ms-1 btn btn-success" href="/uploads/<?php echo $shipmentArr['sea_invoice_upload'] ?>" target="_blank"><i class="fa fa-eye"></i></a>
                                                                            <?php
                                                                        }
                                                                    ?>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Packing List</strong></td>
                                                                <td>
                                                                     <select class="status-selector form-control" name="sea_packing_list_status" autocomplete="new-password">
                                                                        <option <?php if($shipmentArr['sea_packing_list_status'] == 'Not Required') { echo 'selected=""'; } ?>>Not Required</option>
                                                                        <option <?php if($shipmentArr['sea_packing_list_status'] == 'Pending') { echo 'selected=""'; } ?>>Pending</option>
                                                                        <option <?php if($shipmentArr['sea_packing_list_status'] == 'Received') { echo 'selected=""'; } ?>>Received</option>
                                                                    </select>
                                                                </td>
                                                                <?php 
                                                                $disabled = 'disabled=""';
                                                                if($shipmentArr['sea_packing_list_status'] == 'Received') {
                                                                    $disabled = '';
                                                                }
                                                                 ?>
                                                                <td>
                                                                    <input <?php echo $disabled; ?> type="text" placeholder="DD/MM/YYYY" class="status-checker date-field form-control" name="sea_packing_list_received_date" value="<?php echo ($shipmentArr['sea_packing_list_received_date'] != '') ? date('d/m/y', strtotime($shipmentArr['sea_packing_list_received_date'])) : ''; ?>" autocomplete="new-password">
                                                                </td>
                                                                <td>
                                                                     <select <?php echo $disabled; ?> class="status-checker form-control" name="sea_packing_list_source" autocomplete="new-password">
                                                                        <?php $document_source = mysqli_query($con, "SELECT * FROM document_source"); 
                                                                        while($document_source_arr = mysqli_fetch_array($document_source)) {
                                                                    ?>
                                                                            <option <?php if($shipmentArr['sea_packing_list_source'] == $document_source_arr['id']) { echo 'selected=""'; } ?> value="<?php echo $document_source_arr['id'] ?>"><?php echo $document_source_arr['name'] ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <div class="d-flex align-items-center">
                                                                    <input <?php echo $disabled; ?> type="file" class="status-checker form-control" name="sea_packing_list_upload" autocomplete="new-password">
                                                                    <?php
                                                                        if($shipmentArr['sea_packing_list_upload'] != '') {
                                                                            ?>
                                                                            <a class="ms-1 btn btn-success" href="/uploads/<?php echo $shipmentArr['sea_packing_list_upload'] ?>" target="_blank"><i class="fa fa-eye"></i></a>
                                                                            <?php
                                                                        }
                                                                    ?>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>BL Original</strong></td>
                                                                <td>
                                                                     <select class="status-selector form-control" name="sea_bl_original_status" autocomplete="new-password">
                                                                        <option <?php if($shipmentArr['sea_bl_original_status'] == 'Not Required') { echo 'selected=""'; } ?>>Not Required</option>
                                                                        <option <?php if($shipmentArr['sea_bl_original_status'] == 'Pending') { echo 'selected=""'; } ?>>Pending</option>
                                                                        <option <?php if($shipmentArr['sea_bl_original_status'] == 'Received') { echo 'selected=""'; } ?>>Received</option>
                                                                    </select>
                                                                </td>
                                                                <?php 
                                                                $disabled = 'disabled=""';
                                                                if($shipmentArr['sea_bl_original_status'] == 'Received') {
                                                                    $disabled = '';
                                                                }
                      