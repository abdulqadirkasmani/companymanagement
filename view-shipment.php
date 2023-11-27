<?php ini_set('display_errors', 0);
error_reporting(E_ERROR | E_WARNING | E_PARSE); 
$pageName = 'Shipment'; include('inc/header.php');

if(isset($_GET['id'])) {
    $shipment_id = $_GET['id'];
    $shipmentArr = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM `shipment` WHERE `id` = '$shipment_id'"));
} else {
    header('location:/shipment');
}

 ?>
        
<!--**********************************
Content body start
***********************************-->
<div class="content-body viewshipmentcss">
<div class="container-fluid pdchanges">
    <div class="row">
        <div class="col-xl-12">
            <form action="" method="post" class="shipment-details">
                <?php if(isset($_GET['id'])) { ?>
                    <input readonly="" type="hidden" name="shipping_id" value="<?php echo $_GET['id']; ?>">
                <?php } ?>
                <div class="accordion accordion-active-header">
                    <h3 class="heading">File <?php echo (isset($_GET['id'])) ? '#'.$shipmentArr['file_no'].'' : ''; ?></h3>
                    <div class="shipment-tabs">
                        <div class="tab-lists">
                            <ul>
                                <li><a href="javascript:;" class="active-tab" data-tab="consignment-tab">Consignment Information</a></li>
                                <li><a href="javascript:;" data-tab="financial-tab">Financial Information</a></li>
                                <li><a href="javascript:;" data-tab="commodity-tab">Commodity Information</a></li>
                                <li><a href="javascript:;" data-tab="documents-required-tab">Required Documents</a></li>
                                <li><a href="javascript:;" data-tab="files-status">Status & Shipping Details</a></li>
                                <!-- <li><a href="javascript:;" data-tab="shipment-charges">Shipment Charges</a></li> -->
                                <li><a href="javascript:;" data-tab="upload-documents">Documents</a></li>
                            </ul>
                        </div>
                        <div class="tab-boxes">
                            <div class="tab-box" style="display: block;" data-tab="consignment-tab">
                                <div class="accordion-item">
                                    <div class="accordion-header  rounded-lg" id="accord-9One" data-bs-toggle="collapse" data-bs-target="#collapse9One" aria-controls="collapse9One"   aria-expanded="true"  role="button">
                                        <span class="accordion-header-icon"></span>
                                    <span class="accordion-header-text"><img src="/images/img/contract.png"> Consignment Information</span>
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
                                                                <input readonly="" type="text" class="form-control pending-check" value="<?php echo ($shipmentArr['date'] != '') ? date('d-m-y', strtotime($shipmentArr['date'])) : 'Pending'; ?>" name="date" autocomplete="new-password">
                                                            </div>
                                                            <div class="mb-3 col-md-4">
                                                                <label class="form-label">BL Number</label>
                                                                <input readonly="" type="text" class="form-control" value="<?php echo $shipmentArr['bl_number']; ?>" name="bl_number" autocomplete="new-password">
                                                            </div>
                                                            <div class="mb-3 col-md-4">
                                                                <label class="form-label">BL Date</label>
                                                                <input readonly="" type="text" class="form-control pending-check" value="<?php echo ($shipmentArr['bl_date'] != '') ? date('d-m-y', strtotime($shipmentArr['bl_date'])) : 'Pending'; ?>" name="bl_date" autocomplete="new-password">
                                                            </div>
                                                        </div>
                                                        <hr>

                                                        <div class="row">
                                                            <div class="mb-3 col-md-4">
                                                                <label class="form-label">Shipment Arrival</label>
                                                                <input readonly="" type="text" class="form-control pending-check" value="<?php echo ($shipmentArr['shipment_arrival'] != '') ? date('d-m-y', strtotime($shipmentArr['shipment_arrival'])) : 'Pending'; ?>" name="shipment_arrival" autocomplete="new-password">
                                                            </div>
                                                            <div class="mb-3 col-md-4">
                                                                <label class="form-label">VIR/IGM</label>
                                                                <?php
                                                                 $curCollectorate = $shipmentArr['collectorate'];
                                                                 $collectorate = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM collectorate WHERE id = $curCollectorate"));
                                                                 $vir_txt = '';
                                                                 if($collectorate['name']) {
                                                                    $vir_txt .= $collectorate['name'];
                                                                 }
                                                                 if($shipmentArr['igm_no']) {
                                                                    $vir_txt .= '-' . $shipmentArr['igm_no'];
                                                                 }
                                                                 if($shipmentArr['igm_date']) {
                                                                    $vir_txt .= '-' . date('Y-m-d', strtotime($shipmentArr['igm_date']));
                                                                 }

                                                                  ?>
                                                                <input readonly="" type="text" class="form-control" value="<?php echo $vir_txt; ?>" name="igm_no" autocomplete="new-password">
                                                            </div>
                                                        </div>
                                                        <hr>

                                                        <div class="row">
                                                            <div class="mb-3 col-md-4">
                                                                <label class="form-label">Index Number</label>
                                                                <input readonly="" type="number" class="form-control" name="index_no" value="<?php echo $shipmentArr['index_no']; ?>" autocomplete="new-password">
                                                            </div>
                                                            <div class="mb-3 col-md-4">
                                                                <label class="form-label">Port Of Shipment</label>
                                                                <input readonly="" type="text" class="form-control" value="<?php echo $shipmentArr['shipment_port']; ?>" name="shipment_port" autocomplete="new-password">
                                                            </div>
                                                            <div class="mb-3 col-md-4">
                                                                <div class="d-flex justify-content-between align-items-center mb-1">
                                                                    <label class="form-label">Shed / Location</label>
                                                                </div>
                                                                <select disabled="" class="form-control" name="discharge_port" autocomplete="new-password">
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
                                                                </div>
                                                                <select disabled="" class="form-control" name="consignee" autocomplete="new-password">
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
                                                                </div>
                                                                <select disabled="" class="form-control" name="client" autocomplete="new-password">
                                                                    <?php $client = mysqli_query($con, "SELECT * FROM client"); 
                                                                        while($client_arr = mysqli_fetch_array($client)) {
                                                                    ?>
                                                                            <option <?php if($shipmentArr['client'] == $client_arr['id']) { echo 'selected=""'; } ?> value="<?php echo $client_arr['id'] ?>"><?php echo $client_arr['name'] ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                            <div class="mb-3 col-md-4">
                                                                <label class="form-label">Consignor Name</label>
                                                                <input readonly="" type="text" class="form-control" value="<?php echo $shipmentArr['consignor_name']; ?>" name="consignor_name" autocomplete="new-password">
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="mb-3 col-md-4">
                                                                <label class="form-label">Consignment Mode</label>
                                                                <select disabled="" class="form-control" name="shipment_mode" id="shipment_mode" autocomplete="new-password">
                                                                    <option <?php if($shipmentArr['shipment_mode'] == 'Containerized') { echo 'selected=""'; } ?>>Containerized</option>
                                                                    <option <?php if($shipmentArr['shipment_mode'] == 'Sea LCL') { echo 'selected=""'; } ?>>Sea LCL</option>
                                                                    <option <?php if($shipmentArr['shipment_mode'] == 'Air LCL') { echo 'selected=""'; } ?>>Air LCL</option>
                                                                </select>
                                                            </div>
                                                            <div class="mb-3 col-md-4">
                                                                <label class="form-label">Gross Weight KGs</label>
                                                                <input readonly="" type="number" step="any" class="form-control" name="gross_weight" value="<?php echo $shipmentArr['gross_weight']; ?>" autocomplete="new-password">
                                                            </div>
                                                            <div class="mb-3 col-md-4">
                                                                <label class="form-label">Net Weight KGs</label>
                                                                <input readonly="" type="number" step="any" class="form-control" name="net_weight" value="<?php echo $shipmentArr['net_weight']; ?>" autocomplete="new-password">
                                                            </div>
                                                        </div>
                                                        <hr>

                                                        <div class="row">
                                                            <div class="mb-3 col-md-4">
                                                                <?php
                                                                 $currentGdType = $shipmentArr['gd_type'];
                                                                 $gd_type_arr = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM gd_type WHERE id = $currentGdType")); 


                                                                $gd_txt = '';
                                                                if($collectorate['name'] != '') {
                                                                    $gd_txt .= $collectorate['name'];

                                                                }
                                                                if($gd_type_arr['name'] != '') {
                                                                    $gd_txt .= '-' . $gd_type_arr['name'];

                                                                }
                                                                if($shipmentArr['gd_number'] != '') {
                                                                    $gd_txt .= '-' . $shipmentArr['gd_number'];

                                                                }
                                                                 if($shipmentArr['gd_date'] != '') {
                                                                    $gd_txt .= '-' . date('Y-m-d', strtotime($shipmentArr['gd_date']));
                                                                 }

                                                                if($shipmentArr['gd_number']  == '') {
                                                                    $gd_txt = 'Submission of GD Pending';
                                                                }
                                                                ?>
                                                                <label class="form-label">GD</label>
                                                                <input readonly="" type="text" class="form-control" value="<?php echo $gd_txt; ?>" name="gd_number" autocomplete="new-password">
                                                            </div>
                                                            <div class="mb-3 col-md-4">
                                                                <label class="form-label">GD Status</label>
                                                                <select disabled="" class="form-control" name="gd_status" autocomplete="new-password">
                                                                    <?php $gd_status = mysqli_query($con, "SELECT * FROM gd_status"); 
                                                                        while($gd_status_arr = mysqli_fetch_array($gd_status)) {
                                                                    ?>
                                                                            <option <?php if($shipmentArr['gd_status'] == $gd_status_arr['id']) { echo 'selected=""'; } ?> value="<?php echo $gd_status_arr['id'] ?>"><?php echo $gd_status_arr['name'] ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                            
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="mb-3 col-md-4">
                                                                <label class="form-label">Party Refrence</label>
                                                                <input readonly="" type="text" style="text-transform: uppercase;" class="form-control" value="<?php echo $shipmentArr['party_refrence']; ?>" name="party_refrence" autocomplete="new-password">
                                                            </div>
                                                            <div class="mb-3 col-md-4">
                                                                <label class="form-label">Other Refrence</label>
                                                                <input readonly="" type="text" style="text-transform: uppercase;" class="form-control" value="<?php echo $shipmentArr['other_refrence']; ?>" name="other_refrence" autocomplete="new-password">
                                                            </div>
                                                            <div class="mb-3 col-md-4">
                                                                <label class="form-label">Marks</label>
                                                                <input readonly="" type="text" style="text-transform: uppercase;" class="form-control" value="<?php echo $shipmentArr['marks']; ?>" name="marks" autocomplete="new-password">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div> <!-- Consignment Information Accordion -->

                                <div class="accordion-item">
                                    <div class="accordion-header  rounded-lg" id="accord-shippingline" data-bs-toggle="collapse" data-bs-target="#collapseShippingline" aria-controls="collapseShippingline"   aria-expanded="true"  role="button">
                                        <span class="accordion-header-icon"></span>
                                    <span class="accordion-header-text"><img src="/images/img/contract.png">Shipping Line / Agent</span>
                                    <span class="accordion-header-indicator"></span>
                                    </div>
                                    <div id="collapseShippingline" class="collapse accordion__body show" aria-labelledby="accord-shippingline" data-bs-parent="#accordion-nine">
                                        <div class="accordion-body-text">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="basic-form">
                                                        <div class="row align-items-start">
                                                            <table width="100%" class="form-table">
                                                                <tr>
                                                                    <th style="width: 5%;">S.No</th>
                                                                    <th>Shipping Line / Agent</th>
                                                                    <th>Type</th>
                                                                    <th style="width: 5%;"></th>
                                                                </tr>
                                                                <tbody class="packages-tr">
                                                                    <?php 
                                                                    if($shipmentArr['shipping_line'] != '') {
                                                                        $shipping_lineArr = explode('||', $shipmentArr['shipping_line']);
                                                                        $shipping_line_typeArr = explode('||', $shipmentArr['shipping_line_type']);
                                                                        for($i = 0; $i < count($shipping_lineArr); $i++) {
                                                                            ?>
                                                                            <tr>
                                                                                <td style="width: 5%;"><?php echo ($i + 1); ?>.</td>
                                                                                <td>
                                                                                    <select disabled="" class="form-control" name="shipping_line[]" autocomplete="new-password">
                                                                                        <?php $shipping_line = mysqli_query($con, "SELECT * FROM shipping_line"); 
                                                                                            while($shipping_line_arr = mysqli_fetch_array($shipping_line)) {
                                                                                        ?>
                                                                                                <option <?php if($shipping_lineArr[$i] == $shipping_line_arr['id']) { echo 'selected=""'; } ?> value="<?php echo $shipping_line_arr['id'] ?>"><?php echo $shipping_line_arr['name'] ?></option>
                                                                                        <?php } ?>
                                                                                    </select>
                                                                                </td>
                                                                                <td>
                                                                                    <select class="form-control shippinglinetypes" name="shipping_line_type[]" autocomplete="new-password">
                                                                                        <option <?php if($shipping_line_typeArr[$i] == 'Carrier') { echo 'selected=""'; } ?>>Carrier</option>
                                                                                        <option <?php if($shipping_line_typeArr[$i] == 'Forwarder') { echo 'selected=""'; } ?>>Forwarder</option>
                                                                                    </select>
                                                                                </td>
                                                                                <td></td>
                                                                            </tr>
                                                                            <?php
                                                                        }
                                                                    } else {
                                                                     ?>
                                                                        <tr>
                                                                            <td style="width: 5%;">1.</td>
                                                                            <td>
                                                                                <select disabled="" class="form-control" name="shipping_line[]" autocomplete="new-password">
                                                                                    <?php $shipping_line = mysqli_query($con, "SELECT * FROM shipping_line"); 
                                                                                        while($shipping_line_arr = mysqli_fetch_array($shipping_line)) {
                                                                                    ?>
                                                                                            <option value="<?php echo $shipping_line_arr['id'] ?>"><?php echo $shipping_line_arr['name'] ?></option>
                                                                                    <?php } ?>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <select class="form-control shippinglinetypes" name="shipping_line_type[]" autocomplete="new-password">
                                                                                    <option>Carrier</option>
                                                                                    <option>Forwarder</option>
                                                                                </select>
                                                                            </td>
                                                                            <td style="width: 5%;"></td>
                                                                        </tr>
                                                                    <?php } ?>
                                                                </tbody>
                                                            </table>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div> <!-- Shipping Line / Agent -->


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
                                                                    <th style="width: 30%;">No. of Package</th>
                                                                    <th>Package Type</th>
                                                                    <th style="width: 5%;"></th>
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
                                                                                <td style="width: 30%;"><input readonly="" type="number" class="form-control" value="<?php echo $package_noArr[$i] ?>" name="package_no[]" autocomplete="new-password"></td>
                                                                                <td>
                                                                                    <select disabled="" class="form-control" name="package_type[]" autocomplete="new-password">
                                                                                        <?php $package_type = mysqli_query($con, "SELECT * FROM package_type"); 
                                                                                            while($package_type_arr = mysqli_fetch_array($package_type)) {
                                                                                        ?>
                                                                                                <option <?php if($package_typeArr[$i] == $package_type_arr['id']) { echo 'selected=""'; } ?> value="<?php echo $package_type_arr['id'] ?>"><?php echo $package_type_arr['name'] ?></option>
                                                                                        <?php } ?>
                                                                                    </select>
                                                                                </td>
                                                                                <td></td>
                                                                            </tr>
                                                                            <?php
                                                                        }
                                                                    } else {
                                                                     ?>
                                                                        <tr>
                                                                            <td style="width: 5%;">1.</td>
                                                                            <td style="width: 30%;"><input readonly="" type="number" class="form-control" name="package_no[]" autocomplete="new-password"></td>
                                                                            <td>
                                                                                <select disabled="" class="form-control" name="package_type[]" autocomplete="new-password">
                                                                                    <?php $package_type = mysqli_query($con, "SELECT * FROM package_type"); 
                                                                                        while($package_type_arr = mysqli_fetch_array($package_type)) {
                                                                                    ?>
                                                                                            <option value="<?php echo $package_type_arr['id'] ?>"><?php echo $package_type_arr['name'] ?></option>
                                                                                    <?php } ?>
                                                                                </select>
                                                                            </td>
                                                                            <td style="width: 5%;"></td>
                                                                        </tr>
                                                                    <?php } ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- Package Information Accordion -->
                                <?php if($shipmentArr['shipment_mode'] == 'Containerized') { ?>
                                    <div class="accordion-item">
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
                                                                                    <td><input readonly="" type="text" class="form-control" value="<?php echo $container_noArr[$i] ?>" name="container_no[]" style="text-transform: uppercase;" autocomplete="new-password"></td>
                                                                                    <td>
                                                                                        <select disabled="" class="form-control" name="container_type[]" autocomplete="new-password">
                                                                                            <?php $container_type = mysqli_query($con, "SELECT * FROM container_type"); 
                                                                                                while($container_type_arr = mysqli_fetch_array($container_type)) {
                                                                                            ?>
                                                                                                    <option <?php if($container_typeArr[$i] == $container_type_arr['id']) { echo 'selected=""'; } ?> value="<?php echo $container_type_arr['id'] ?>"><?php echo $container_type_arr['name'] ?></option>
                                                                                            <?php } ?>
                                                                                        </select>
                                                                                    </td>
                                                                                </tr>
                                                                                <?php
                                                                            }
                                                                        } else {
                                                                         ?>
                                                                        <tr>
                                                                            <td style="width: 5%;">1.</td>
                                                                            <td><input readonly="" type="text" class="form-control" name="container_no[]" autocomplete="new-password"></td>
                                                                            <td>
                                                                                <select disabled="" class="form-control" name="container_type[]" autocomplete="new-password">
                                                                                    <?php $container_type = mysqli_query($con, "SELECT * FROM container_type"); 
                                                                                        while($container_type_arr = mysqli_fetch_array($container_type)) {
                                                                                    ?>
                                                                                            <option value="<?php echo $container_type_arr['id'] ?>"><?php echo $container_type_arr['name'] ?></option>
                                                                                    <?php } ?>
                                                                                </select>
                                                                            </td>
                                                                            <td style="width: 5%;"></td>
                                                                        </tr>
                                                                        <?php } ?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- Container Information Accordion -->
                                <?php } ?>
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
                                                                </div>            
                                                                <select disabled="" class="form-control" name="currency" autocomplete="new-password">
                                                                    <?php $currency = mysqli_query($con, "SELECT * FROM currency"); 
                                                                        while($currency_arr = mysqli_fetch_array($currency)) {
                                                                    ?>
                                                                            <option <?php if($shipmentArr['currency'] == $currency_arr['id']) { echo 'selected=""'; } ?> value="<?php echo $currency_arr['id'] ?>"><?php echo $currency_arr['name'] ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                            <div class="mb-3 col-md-4">
                                                                <label class="form-label">Exchange Rate</label>
                                                                <input readonly="" type="number" step="any" class="form-control" name="exchange_rate" value="<?php echo $shipmentArr['exchange_rate']; ?>" autocomplete="new-password">
                                                            </div>
                                                            <div class="mb-3 col-md-4">
                                                                <div class="d-flex justify-content-between align-items-center mb-1">
                                                                    <label class="form-label">Delivery Term</label>
                                                                </div>            
                                                                <select disabled="" class="form-control" name="delivery_term" autocomplete="new-password">
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
                                                                </div>            
                                                                <select disabled="" class="form-control" name="bank_name" autocomplete="new-password">
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
                                                                </div>            
                                                                <select disabled="" class="form-control" name="payment_mode" autocomplete="new-password">
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
                                                                <input readonly="" type="text" class="form-control" value="<?php echo $shipmentArr['invoice_no']; ?>" name="invoice_no" autocomplete="new-password">
                                                            </div>
                                                            <div class="mb-3 col-md-4">
                                                                <label class="form-label">Invoice Date</label>
                                                                <input readonly="" type="text" class="form-control pending-check" value="<?php echo ($shipmentArr['invoice_date'] != '') ? date('d-m-y', strtotime($shipmentArr['invoice_date'])) : 'Pending'; ?>" name="invoice_date" autocomplete="new-password">
                                                            </div>
                                                            <div class="mb-3 col-md-4">
                                                                <label class="form-label">Invoice Value</label>
                                                                <input readonly="" type="number" class="form-control" name="invoice_value" value="<?php echo $shipmentArr['invoice_value']; ?>" autocomplete="new-password">
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="mb-3 col-md-4">
                                                                <label class="form-label">LC Number</label>
                                                                <input readonly="" type="text" class="form-control" value="<?php echo $shipmentArr['lc_no']; ?>" name="lc_no" autocomplete="new-password">
                                                            </div>
                                                            <div class="mb-3 col-md-4">
                                                                <label class="form-label">LC Date</label>
                                                                <input readonly="" type="text" class="form-control pending-check" value="<?php echo ($shipmentArr['lc_date'] != '') ? date('d-m-y', strtotime($shipmentArr['lc_date'])) : 'Pending'; ?>" name="lc_date" autocomplete="new-password">
                                                            </div>
                                                            <div class="mb-3 col-md-4">
                                                                <label class="form-label">LC Value</label>
                                                                <input readonly="" type="number" step="any" class="form-control" name="lc_value" value="<?php echo $shipmentArr['lc_value']; ?>" autocomplete="new-password">
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="mb-3 col-md-4">
                                                                <label class="form-label">FOB Value</label>
                                                                <input readonly="" type="number" step="any" class="form-control" name="fob" value="<?php echo $shipmentArr['fob']; ?>" autocomplete="new-password">
                                                            </div>
                                                            <div class="mb-3 col-md-4">
                                                                <label class="form-label">Freight Charges</label>
                                                                <input readonly="" type="number" step="any" class="form-control" name="freight" value="<?php echo $shipmentArr['freight']; ?>" autocomplete="new-password">
                                                            </div>
                                                            <div class="mb-3 col-md-4">
                                                                <label class="form-label">CFR Value</label>
                                                                <input readonly="" type="number" step="any" class="form-control" name="cfr" value="<?php echo $shipmentArr['cfr']; ?>" autocomplete="new-password">
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
                                                                <input readonly="" type="text" class="form-control" value="<?php echo $shipmentArr['item_description']; ?>" name="item_description" autocomplete="new-password">
                                                            </div>
                                                            <div class="mb-3 col-md-4">
                                                                <label class="form-label">Quantity</label>
                                                                <input readonly="" type="number" step="any" class="form-control" name="quantity" value="<?php echo $shipmentArr['quantity']; ?>" autocomplete="new-password">
                                                            </div>
                                                            <div class="mb-3 col-md-4">
                                                                <div class="d-flex justify-content-between align-items-center mb-1">
                                                                    <label class="form-label">Mode Of Quantity</label>
                                                                </div>            
                                                                <select disabled="" class="form-control" name="quantity_mode" autocomplete="new-password">
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
                                                                <td><input readonly="" type="text" class="form-control" value="<?php echo $shipmentArr['sea_fl_no']; ?>" name="sea_fl_no" autocomplete="new-password"></td>
                                                                <td><input readonly="" type="text" class="form-control" value="<?php echo $shipmentArr['sea_fl_value']; ?>" name="sea_fl_value" autocomplete="new-password"></td>
                                                                <td><input readonly="" type="text" class="form-control" value="<?php echo ($shipmentArr['sea_fl_approved_date'] != '') ? date('d-m-y', strtotime($shipmentArr['sea_fl_approved_date'])) : 'Pending'; ?>" name="sea_fl_approved_date" autocomplete="new-password"></td>
                                                                <td><input readonly="" type="text" class="form-control" value="<?php echo ($shipmentArr['sea_fl_expiry_date'] != '') ? date('d-m-y', strtotime($shipmentArr['sea_fl_expiry_date'])) : 'Pending'; ?>" name="sea_fl_expiry_date" autocomplete="new-password"></td>
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
                                                                <th>View</th>
                                                            </tr>
                                                                <?php
                                                                if($shipmentArr['sea_invoice_status'] != 'Not Required') { 
                                                                 ?>
                                                            <tr>
                                                                <td><strong>Invoice</strong></td>
                                                                <td>
                                                                     <select class="<?php echo $shipmentArr['sea_invoice_status']; ?>-status status-selector form-control" name="sea_invoice_status" autocomplete="new-password">
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
                                                                    <input readonly="" <?php echo $disabled; ?> type="text" class="status-checker form-control" name="sea_invoice_received_date" value="<?php echo ($shipmentArr['sea_invoice_received_date'] != '') ? date('d-m-y', strtotime($shipmentArr['sea_invoice_received_date'])) : 'Pending'; ?>" autocomplete="new-password">
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
                                                                <?php } ?>
                                                                <?php
                                                                if($shipmentArr['sea_packing_list_status'] != 'Not Required') { 
                                                                 ?>
                                                            <tr>
                                                                <td><strong>Packing List</strong></td>
                                                                <td>
                                                                     <select class="<?php echo $shipmentArr['sea_packing_list_status']; ?>-status status-selector form-control" name="sea_packing_list_status" autocomplete="new-password">
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
                                                                    <input readonly="" <?php echo $disabled; ?> type="text" class="status-checker form-control" name="sea_packing_list_received_date" value="<?php echo ($shipmentArr['sea_packing_list_received_date'] != '') ? date('d-m-y', strtotime($shipmentArr['sea_packing_list_received_date'])) : 'Pending'; ?>" autocomplete="new-password">
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
                                                                <?php } ?>
                                                                <?php
                                                                if($shipmentArr['sea_bl_original_status'] != 'Not Required') { 
                                                                 ?>
                                                            <tr>
                                                                <td><strong>BL Original</strong></td>
                                                                <td>
                                                                     <select class="<?php echo $shipmentArr['sea_bl_original_status']; ?>-status status-selector form-control" name="sea_bl_original_status" autocomplete="new-password">
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
                                                                 ?>
                                                                <td>
                                                                    <input readonly="" <?php echo $disabled; ?> type="text" class="status-checker form-control" name="sea_bl_original_received_date" value="<?php echo ($shipmentArr['sea_bl_original_received_date'] != '') ? date('d-m-y', strtotime($shipmentArr['sea_bl_original_received_date'])) : 'Pending'; ?>" autocomplete="new-password">
                                                                </td>
                                                                <td>
                                                                     <select <?php echo $disabled; ?> class="status-checker form-control" name="sea_bl_original_source" autocomplete="new-password">
                                                                        <?php $document_source = mysqli_query($con, "SELECT * FROM document_source"); 
                                                                        while($document_source_arr = mysqli_fetch_array($document_source)) {
                                                                    ?>
                                                                            <option <?php if($shipmentArr['sea_bl_original_source'] == $document_source_arr['id']) { echo 'selected=""'; } ?> value="<?php echo $document_source_arr['id'] ?>"><?php echo $document_source_arr['name'] ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <div class="d-flex align-items-center">
                                                                    <?php
                                                                        if($shipmentArr['sea_bl_original_upload'] != '') {
                                                                            ?>
                                                                            <a class="ms-1 btn btn-success" href="/uploads/<?php echo $shipmentArr['sea_bl_original_upload'] ?>" target="_blank"><i class="fa fa-eye"></i></a>
                                                                            <?php
                                                                        }
                                                                    ?>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                                <?php } ?>
                                                                <?php
                                                                if($shipmentArr['sea_bl_copy_status'] != 'Not Required') { 
                                                                 ?>
                                                            <tr>
                                                                <td><strong>BL Copy</strong></td>
                                                                <td>
                                                                     <select class="<?php echo $shipmentArr['sea_bl_copy_status']; ?>-status status-selector form-control" name="sea_bl_copy_status" autocomplete="new-password">
                                                                        <option <?php if($shipmentArr['sea_bl_copy_status'] == 'Not Required') { echo 'selected=""'; } ?>>Not Required</option>
                                                                        <option <?php if($shipmentArr['sea_bl_copy_status'] == 'Pending') { echo 'selected=""'; } ?>>Pending</option>
                                                                        <option <?php if($shipmentArr['sea_bl_copy_status'] == 'Received') { echo 'selected=""'; } ?>>Received</option>
                                                                    </select>
                                                                </td>
                                                                <?php 
                                                                $disabled = 'disabled=""';
                                                                if($shipmentArr['sea_bl_copy_status'] == 'Received') {
                                                                    $disabled = '';
                                                                }
                                                                 ?>
                                                                <td>
                                                                    <input readonly="" <?php echo $disabled; ?> type="text" class="status-checker form-control" name="sea_bl_copy_received_date" value="<?php echo ($shipmentArr['sea_bl_copy_received_date'] != '') ? date('d-m-y', strtotime($shipmentArr['sea_bl_copy_received_date'])) : 'Pending'; ?>" autocomplete="new-password">
                                                                </td>
                                                                <td>
                                                                     <select <?php echo $disabled; ?> class="status-checker form-control" name="sea_bl_copy_source" autocomplete="new-password">
                                                                        <?php $document_source = mysqli_query($con, "SELECT * FROM document_source"); 
                                                                        while($document_source_arr = mysqli_fetch_array($document_source)) {
                                                                    ?>
                                                                            <option <?php if($shipmentArr['sea_bl_copy_source'] == $document_source_arr['id']) { echo 'selected=""'; } ?> value="<?php echo $document_source_arr['id'] ?>"><?php echo $document_source_arr['name'] ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <div class="d-flex align-items-center">
                                                                    <?php
                                                                        if($shipmentArr['sea_bl_copy_upload'] != '') {
                                                                            ?>
                                                                            <a class="ms-1 btn btn-success" href="/uploads/<?php echo $shipmentArr['sea_bl_copy_upload'] ?>" target="_blank"><i class="fa fa-eye"></i></a>
                                                                            <?php
                                                                        }
                                                                    ?>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                                <?php } ?>
                                                                <?php
                                                                if($shipmentArr['sea_lc_status'] != 'Not Required') { 
                                                                 ?>
                                                            <tr>
                                                                <td><strong>L/C</strong></td>
                                                                <td>
                                                                     <select class="<?php echo $shipmentArr['sea_lc_status']; ?>-status status-selector form-control" name="sea_lc_status" autocomplete="new-password">
                                                                        <option <?php if($shipmentArr['sea_lc_status'] == 'Not Required') { echo 'selected=""'; } ?>>Not Required</option>
                                                                        <option <?php if($shipmentArr['sea_lc_status'] == 'Pending') { echo 'selected=""'; } ?>>Pending</option>
                                                                        <option <?php if($shipmentArr['sea_lc_status'] == 'Received') { echo 'selected=""'; } ?>>Received</option>
                                                                    </select>
                                                                </td>
                                                                <?php 
                                                                $disabled = 'disabled=""';
                                                                if($shipmentArr['sea_lc_status'] == 'Received') {
                                                                    $disabled = '';
                                                                }
                                                                 ?>
                                                                <td>
                                                                    <input readonly="" <?php echo $disabled; ?> type="text" class="status-checker form-control" name="sea_lc_received_date" value="<?php echo ($shipmentArr['sea_lc_received_date'] != '') ? date('d-m-y', strtotime($shipmentArr['sea_lc_received_date'])) : 'Pending'; ?>" autocomplete="new-password">
                                                                </td>
                                                                <td>
                                                                     <select <?php echo $disabled; ?> class="status-checker form-control" name="sea_lc_source" autocomplete="new-password">
                                                                        <?php $document_source = mysqli_query($con, "SELECT * FROM document_source"); 
                                                                        while($document_source_arr = mysqli_fetch_array($document_source)) {
                                                                    ?>
                                                                            <option <?php if($shipmentArr['sea_lc_source'] == $document_source_arr['id']) { echo 'selected=""'; } ?> value="<?php echo $document_source_arr['id'] ?>"><?php echo $document_source_arr['name'] ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <div class="d-flex align-items-center">
                                                                    <?php
                                                                        if($shipmentArr['sea_lc_upload'] != '') {
                                                                            ?>
                                                                            <a class="ms-1 btn btn-success" href="/uploads/<?php echo $shipmentArr['sea_lc_upload'] ?>" target="_blank"><i class="fa fa-eye"></i></a>
                                                                            <?php
                                                                        }
                                                                    ?>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                                <?php } ?>
                                                                <?php
                                                                if($shipmentArr['sea_insurance_memo_status'] != 'Not Required') { 
                                                                 ?>
                                                            <tr>
                                                                <td><strong>Insurance Memo</strong></td>
                                                                <td>
                                                                     <select class="<?php echo $shipmentArr['sea_insurance_memo_status']; ?>-status status-selector form-control" name="sea_insurance_memo_status" autocomplete="new-password">
                                                                        <option <?php if($shipmentArr['sea_insurance_memo_status'] == 'Not Required') { echo 'selected=""'; } ?>>Not Required</option>
                                                                        <option <?php if($shipmentArr['sea_insurance_memo_status'] == 'Pending') { echo 'selected=""'; } ?>>Pending</option>
                                                                        <option <?php if($shipmentArr['sea_insurance_memo_status'] == 'Received') { echo 'selected=""'; } ?>>Received</option>
                                                                    </select>
                                                                </td>
                                                                <?php 
                                                                $disabled = 'disabled=""';
                                                                if($shipmentArr['sea_insurance_memo_status'] == 'Received') {
                                                                    $disabled = '';
                                                                }
                                                                 ?>
                                                                <td>
                                                                    <input readonly="" <?php echo $disabled; ?> type="text" class="status-checker form-control" name="sea_insurance_memo_received_date" value="<?php echo ($shipmentArr['sea_insurance_memo_received_date'] != '') ? date('d-m-y', strtotime($shipmentArr['sea_insurance_memo_received_date'])) : 'Pending'; ?>" autocomplete="new-password">
                                                                </td>
                                                                <td>
                                                                     <select <?php echo $disabled; ?> class="status-checker form-control" name="sea_insurance_memo_source" autocomplete="new-password">
                                                                        <?php $document_source = mysqli_query($con, "SELECT * FROM document_source"); 
                                                                        while($document_source_arr = mysqli_fetch_array($document_source)) {
                                                                    ?>
                                                                            <option <?php if($shipmentArr['sea_insurance_memo_source'] == $document_source_arr['id']) { echo 'selected=""'; } ?> value="<?php echo $document_source_arr['id'] ?>"><?php echo $document_source_arr['name'] ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <div class="d-flex align-items-center">
                                                                    <?php
                                                                        if($shipmentArr['sea_insurance_memo_upload'] != '') {
                                                                            ?>
                                                                            <a class="ms-1 btn btn-success" href="/uploads/<?php echo $shipmentArr['sea_insurance_memo_upload'] ?>" target="_blank"><i class="fa fa-eye"></i></a>
                                                                            <?php
                                                                        }
                                                                    ?>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                                <?php } ?>
                                                                <?php
                                                                if($shipmentArr['sea_fta_status'] != 'Not Required') { 
                                                                 ?>
                                                            <tr>
                                                                <td><strong>FTA</strong></td>
                                                                <td>
                                                                     <select class="<?php echo $shipmentArr['sea_fta_status']; ?>-status status-selector form-control" name="sea_fta_status" autocomplete="new-password">
                                                                        <option <?php if($shipmentArr['sea_fta_status'] == 'Not Required') { echo 'selected=""'; } ?>>Not Required</option>
                                                                        <option <?php if($shipmentArr['sea_fta_status'] == 'Pending') { echo 'selected=""'; } ?>>Pending</option>
                                                                        <option <?php if($shipmentArr['sea_fta_status'] == 'Received') { echo 'selected=""'; } ?>>Received</option>
                                                                    </select>
                                                                </td>
                                                                <?php 
                                                                $disabled = 'disabled=""';
                                                                if($shipmentArr['sea_fta_status'] == 'Received') {
                                                                    $disabled = '';
                                                                }
                                                                 ?>
                                                                <td>
                                                                    <input readonly="" <?php echo $disabled; ?> type="text" class="status-checker form-control" name="sea_fta_received_date" value="<?php echo ($shipmentArr['sea_fta_received_date'] != '') ? date('d-m-y', strtotime($shipmentArr['sea_fta_received_date'])) : 'Pending'; ?>" autocomplete="new-password">
                                                                </td>
                                                                <td>
                                                                     <select <?php echo $disabled; ?> class="status-checker form-control" name="sea_fta_source" autocomplete="new-password">
                                                                        <?php $document_source = mysqli_query($con, "SELECT * FROM document_source"); 
                                                                        while($document_source_arr = mysqli_fetch_array($document_source)) {
                                                                    ?>
                                                                            <option <?php if($shipmentArr['sea_fta_source'] == $document_source_arr['id']) { echo 'selected=""'; } ?> value="<?php echo $document_source_arr['id'] ?>"><?php echo $document_source_arr['name'] ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <div class="d-flex align-items-center">
                                                                    <?php
                                                                        if($shipmentArr['sea_fta_upload'] != '') {
                                                                            ?>
                                                                            <a class="ms-1 btn btn-success" href="/uploads/<?php echo $shipmentArr['sea_fta_upload'] ?>" target="_blank"><i class="fa fa-eye"></i></a>
                                                                            <?php
                                                                        }
                                                                    ?>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                                <?php } ?>
                                                        </table>
                                                    </div>
                                                    <hr>
                                                    <?php
                                                    if($shipmentArr['sea_others_status'] != 'Not Required') { 
                                                     ?>
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
                                                                     <select class="<?php echo $shipmentArr['sea_others_status']; ?>-status status-selector form-control" name="sea_others_status" autocomplete="new-password">
                                                                        <option <?php if($shipmentArr['sea_others_status'] == 'Not Required') { echo 'selected=""'; } ?>>Not Required</option>
                                                                        <option <?php if($shipmentArr['sea_others_status'] == 'Pending') { echo 'selected=""'; } ?>>Pending</option>
                                                                        <option <?php if($shipmentArr['sea_others_status'] == 'Received') { echo 'selected=""'; } ?>>Received</option>
                                                                    </select>
                                                                </td>
                                                                <?php 
                                                                $disabled = 'disabled=""';
                                                                if($shipmentArr['sea_others_status'] == 'Received') {
                                                                    $disabled = '';
                                                                }
                                                                 ?>
                                                                <td>
                                                                    <input readonly="" type="text" <?php echo $disabled; ?> class="status-checker form-control" name="sea_others_details" value="<?php echo $shipmentArr['sea_others_details'] ?>" autocomplete="new-password">
                                                                </td>
                                                                <td>
                                                                    <input readonly="" type="text" <?php echo $disabled; ?> class="status-checker form-control" value="<?php echo ($shipmentArr['sea_others_date'] != '') ? date('d-m-y', strtotime($shipmentArr['sea_others_date'])) : 'Pending'; ?>" name="sea_others_date" autocomplete="new-password">
                                                                </td>
                                                                <td>
                                                                     <select <?php echo $disabled; ?> class="status-checker form-control" name="sea_others_source" autocomplete="new-password">
                                                                        <?php $document_source = mysqli_query($con, "SELECT * FROM document_source"); 
                                                                        while($document_source_arr = mysqli_fetch_array($document_source)) {
                                                                    ?>
                                                                            <option <?php if($shipmentArr['sea_others_source'] == $document_source_arr['id']) { echo 'selected=""'; } ?> value="<?php echo $document_source_arr['id'] ?>"><?php echo $document_source_arr['name'] ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <div class="d-flex align-items-center">
                                                                        <?php if($shipmentArr['sea_others_upload'] != '') { ?>
                                                                            <a class="ms-1 btn btn-success" href="/uploads/<?php echo $shipmentArr['sea_others_upload'] ?>" target="_blank"><i class="fa fa-eye"></i></a>
                                                                        <?php } ?>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <?php 
                                    $style = '';
                                    if($shipmentArr['shipment_mode'] != 'Air LCL') {
                                        $style = 'style="display: none"';
                                    } 
                                ?>
                                <div class="accordion-item air-shipment" <?php echo $style; ?>>
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
                                                                    <td><input readonly="" type="text" class="form-control" value="<?php echo $shipmentArr['air_fl_no']; ?>" name="air_fl_no" autocomplete="new-password"></td>
                                                                    <td><input readonly="" type="text" class="form-control" value="<?php echo $shipmentArr['air_fl_value']; ?>" name="air_fl_value" autocomplete="new-password"></td>
                                                                    <td><input readonly="" type="text" class="form-control" value="<?php echo ($shipmentArr['air_fl_approved_date'] != '') ? date('d-m-y', strtotime($shipmentArr['air_fl_approved_date'])) : 'Pending'; ?>" name="air_fl_approved_date" autocomplete="new-password"></td>
                                                                    <td><input readonly="" type="text" class="form-control" value="<?php echo ($shipmentArr['air_fl_expiry_date'] != '') ? date('d-m-y', strtotime($shipmentArr['air_fl_expiry_date'])) : 'Pending'; ?>" name="air_fl_expiry_date" autocomplete="new-password"></td>
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
                                                                <?php
                                                                if($shipmentArr['air_invoice_status'] != 'Not Required') { 
                                                                 ?>
                                                                <tr>
                                                                    <td><strong>Invoice</strong></td>
                                                                    <td>
                                                                         <select class="<?php echo $shipmentArr['air_invoice_status']; ?>-status status-selector form-control" name="air_invoice_status" autocomplete="new-password">
                                                                            <option <?php if($shipmentArr['air_invoice_status'] == 'Not Required') { echo 'selected=""'; } ?>>Not Required</option>
                                                                            <option <?php if($shipmentArr['air_invoice_status'] == 'Pending') { echo 'selected=""'; } ?>>Pending</option>
                                                                            <option <?php if($shipmentArr['air_invoice_status'] == 'Received') { echo 'selected=""'; } ?>>Received</option>
                                                                        </select>
                                                                    </td>
                                                                    <?php 
                                                                    $disabled = 'disabled=""';
                                                                    if($shipmentArr['air_invoice_status'] == 'Received') {
                                                                        $disabled = '';
                                                                    }
                                                                     ?>
                                                                    <td>
                                                                        <input readonly="" type="text" <?php echo $disabled; ?> class="status-checker form-control" name="air_invoice_received_date" value="<?php echo ($shipmentArr['air_invoice_received_date'] != '') ? date('d-m-y', strtotime($shipmentArr['air_invoice_received_date'])) : 'Pending'; ?>" autocomplete="new-password">
                                                                    </td>
                                                                    <td>
                                                                         <select <?php echo $disabled; ?> class="status-checker form-control" name="air_invoice_source" autocomplete="new-password">
                                                                            <?php $document_source = mysqli_query($con, "SELECT * FROM document_source"); 
                                                                        while($document_source_arr = mysqli_fetch_array($document_source)) {
                                                                    ?>
                                                                            <option <?php if($shipmentArr['air_invoice_source'] == $document_source_arr['id']) { echo 'selected=""'; } ?> value="<?php echo $document_source_arr['id'] ?>"><?php echo $document_source_arr['name'] ?></option>
                                                                        <?php } ?>
                                                                        </select>
                                                                    </td>
                                                                    <td>
                                                                        <div class="d-flex align-items-center">
                                                                            
                                                                            <?php if($shipmentArr['air_invoice_upload'] != '') {?>
                                                                                <a class="ms-1 btn btn-success" href="/uploads/<?php echo $shipmentArr['air_invoice_upload'] ?>" target="_blank"><i class="fa fa-eye"></i></a>
                                                                            <?php } ?>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <?php } ?>
                                                                <?php
                                                                if($shipmentArr['air_packing_list_status'] != 'Not Required') { 
                                                                 ?>
                                                                <tr>
                                                                    <td><strong>Packing List</strong></td>
                                                                    <td>
                                                                         <select class="<?php echo $shipmentArr['air_packing_list_status']; ?>-status status-selector form-control" name="air_packing_list_status" autocomplete="new-password">
                                                                            <option <?php if($shipmentArr['air_packing_list_status'] == 'Not Required') { echo 'selected=""'; } ?>>Not Required</option>
                                                                            <option <?php if($shipmentArr['air_packing_list_status'] == 'Pending') { echo 'selected=""'; } ?>>Pending</option>
                                                                            <option <?php if($shipmentArr['air_packing_list_status'] == 'Received') { echo 'selected=""'; } ?>>Received</option>
                                                                        </select>
                                                                    </td>
                                                                    <?php 
                                                                    $disabled = 'disabled=""';
                                                                    if($shipmentArr['air_packing_list_status'] == 'Received') {
                                                                        $disabled = '';
                                                                    }
                                                                     ?>
                                                                    <td>
                                                                        <input readonly="" type="text" <?php echo $disabled; ?> class="status-checker form-control" name="air_packing_list_received_date" value="<?php echo ($shipmentArr['air_packing_list_received_date'] != '') ? date('d-m-y', strtotime($shipmentArr['air_packing_list_received_date'])) : 'Pending'; ?>" autocomplete="new-password">
                                                                    </td>
                                                                    <td>
                                                                         <select <?php echo $disabled; ?> class="status-checker form-control" name="air_packing_list_source" autocomplete="new-password">
                                                                            <?php $document_source = mysqli_query($con, "SELECT * FROM document_source"); 
                                                                        while($document_source_arr = mysqli_fetch_array($document_source)) {
                                                                    ?>
                                                                            <option <?php if($shipmentArr['air_packing_list_source'] == $document_source_arr['id']) { echo 'selected=""'; } ?> value="<?php echo $document_source_arr['id'] ?>"><?php echo $document_source_arr['name'] ?></option>
                                                                        <?php } ?>
                                                                        </select>
                                                                    </td>
                                                                    <td>
                                                                        <div class="d-flex align-items-center">
                                                                            
                                                                            <?php if($shipmentArr['air_packing_list_upload'] != '') {?>
                                                                                <a class="ms-1 btn btn-success" href="/uploads/<?php echo $shipmentArr['air_packing_list_upload'] ?>" target="_blank"><i class="fa fa-eye"></i></a>
                                                                            <?php } ?>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <?php } ?>
                                                                <?php
                                                                if($shipmentArr['air_bank_endorsement_status'] != 'Not Required') { 
                                                                 ?>
                                                                <tr>
                                                                    <td><strong>Bank Endorsement</strong></td>
                                                                    <td>
                                                                         <select class="<?php echo $shipmentArr['air_bank_endorsement_status']; ?>-status status-selector form-control" name="air_bank_endorsement_status" autocomplete="new-password">
                                                                            <option <?php if($shipmentArr['air_bank_endorsement_status'] == 'Not Required') { echo 'selected=""'; } ?>>Not Required</option>
                                                                            <option <?php if($shipmentArr['air_bank_endorsement_status'] == 'Pending') { echo 'selected=""'; } ?>>Pending</option>
                                                                            <option <?php if($shipmentArr['air_bank_endorsement_status'] == 'Received') { echo 'selected=""'; } ?>>Received</option>
                                                                        </select>
                                                                    </td>
                                                                    <?php 
                                                                    $disabled = 'disabled=""';
                                                                    if($shipmentArr['air_bank_endorsement_status'] == 'Received') {
                                                                        $disabled = '';
                                                                    }
                                                                     ?>
                                                                    <td>
                                                                        <input readonly="" type="text" <?php echo $disabled; ?> class="status-checker form-control" name="air_bank_endorsement_received_date" value="<?php echo ($shipmentArr['air_bank_endorsement_received_date'] != '') ? date('d-m-y', strtotime($shipmentArr['air_bank_endorsement_received_date'])) : 'Pending'; ?>" autocomplete="new-password">
                                                                    </td>
                                                                    <td>
                                                                         <select <?php echo $disabled; ?> class="status-checker form-control" name="air_bank_endorsement_source" autocomplete="new-password">
                                                                            <?php $document_source = mysqli_query($con, "SELECT * FROM document_source"); 
                                                                        while($document_source_arr = mysqli_fetch_array($document_source)) {
                                                                    ?>
                                                                            <option <?php if($shipmentArr['air_bank_endorsement_source'] == $document_source_arr['id']) { echo 'selected=""'; } ?> value="<?php echo $document_source_arr['id'] ?>"><?php echo $document_source_arr['name'] ?></option>
                                                                        <?php } ?>
                                                                        </select>
                                                                    </td>
                                                                    <td>
                                                                        <div class="d-flex align-items-center">
                                                                            
                                                                            <?php if($shipmentArr['air_bank_endorsement_upload'] != '') {?>
                                                                                <a class="ms-1 btn btn-success" href="/uploads/<?php echo $shipmentArr['air_bank_endorsement_upload'] ?>" target="_blank"><i class="fa fa-eye"></i></a>
                                                                            <?php } ?>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <?php } ?>
                                                                <?php
                                                                if($shipmentArr['air_hawb_status'] != 'Not Required') { 
                                                                 ?>
                                                                <tr>
                                                                    <td><strong>HAWB</strong></td>
                                                                    <td>
                                                                         <select class="<?php echo $shipmentArr['air_hawb_status']; ?>-status status-selector form-control" name="air_hawb_status" autocomplete="new-password">
                                                                            <option <?php if($shipmentArr['air_hawb_status'] == 'Not Required') { echo 'selected=""'; } ?>>Not Required</option>
                                                                            <option <?php if($shipmentArr['air_hawb_status'] == 'Pending') { echo 'selected=""'; } ?>>Pending</option>
                                                                            <option <?php if($shipmentArr['air_hawb_status'] == 'Received') { echo 'selected=""'; } ?>>Received</option>
                                                                        </select>
                                                                    </td>
                                                                    <?php 
                                                                    $disabled = 'disabled=""';
                                                                    if($shipmentArr['air_hawb_status'] == 'Received') {
                                                                        $disabled = '';
                                                                    }
                                                                     ?>
                                                                    <td>
                                                                        <input readonly="" type="text" <?php echo $disabled; ?> class="status-checker form-control" name="air_hawb_received_date" value="<?php echo ($shipmentArr['air_hawb_received_date'] != '') ? date('d-m-y', strtotime($shipmentArr['air_hawb_received_date'])) : 'Pending'; ?>" autocomplete="new-password">
                                                                    </td>
                                                                    <td>
                                                                         <select <?php echo $disabled; ?> class="status-checker form-control" name="air_hawb_source" autocomplete="new-password">
                                                                            <?php $document_source = mysqli_query($con, "SELECT * FROM document_source"); 
                                                                        while($document_source_arr = mysqli_fetch_array($document_source)) {
                                                                    ?>
                                                                            <option <?php if($shipmentArr['air_hawb_source'] == $document_source_arr['id']) { echo 'selected=""'; } ?> value="<?php echo $document_source_arr['id'] ?>"><?php echo $document_source_arr['name'] ?></option>
                                                                        <?php } ?>
                                                                        </select>
                                                                    </td>
                                                                    <td>
                                                                        <div class="d-flex align-items-center">
                                                                            
                                                                            <?php if($shipmentArr['air_hawb_upload'] != '') {?>
                                                                                <a class="ms-1 btn btn-success" href="/uploads/<?php echo $shipmentArr['air_hawb_upload'] ?>" target="_blank"><i class="fa fa-eye"></i></a>
                                                                            <?php } ?>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <?php } ?>
                                                                <?php
                                                                if($shipmentArr['air_mawb_status'] != 'Not Required') { 
                                                                 ?>
                                                                <tr>
                                                                    <td><strong>MAWB</strong></td>
                                                                    <td>
                                                                         <select class="<?php echo $shipmentArr['air_mawb_status']; ?>-status status-selector form-control" name="air_mawb_status" autocomplete="new-password">
                                                                            <option <?php if($shipmentArr['air_mawb_status'] == 'Not Required') { echo 'selected=""'; } ?>>Not Required</option>
                                                                            <option <?php if($shipmentArr['air_mawb_status'] == 'Pending') { echo 'selected=""'; } ?>>Pending</option>
                                                                            <option <?php if($shipmentArr['air_mawb_status'] == 'Received') { echo 'selected=""'; } ?>>Received</option>
                                                                        </select>
                                                                    </td>
                                                                    <?php 
                                                                    $disabled = 'disabled=""';
                                                                    if($shipmentArr['air_mawb_status'] == 'Received') {
                                                                        $disabled = '';
                                                                    }
                                                                     ?>
                                                                    <td>
                                                                        <input readonly="" type="text" <?php echo $disabled; ?> class="status-checker form-control" name="air_mawb_received_date" value="<?php echo ($shipmentArr['air_mawb_received_date'] != '') ? date('d-m-y', strtotime($shipmentArr['air_mawb_received_date'])) : 'Pending'; ?>" autocomplete="new-password">
                                                                    </td>
                                                                    <td>
                                                                         <select <?php echo $disabled; ?> class="status-checker form-control" name="air_mawb_source" autocomplete="new-password">
                                                                            <?php $document_source = mysqli_query($con, "SELECT * FROM document_source"); 
                                                                        while($document_source_arr = mysqli_fetch_array($document_source)) {
                                                                    ?>
                                                                            <option <?php if($shipmentArr['air_mawb_source'] == $document_source_arr['id']) { echo 'selected=""'; } ?> value="<?php echo $document_source_arr['id'] ?>"><?php echo $document_source_arr['name'] ?></option>
                                                                        <?php } ?>
                                                                        </select>
                                                                    </td>
                                                                    <td>
                                                                        <div class="d-flex align-items-center">
                                                                            
                                                                            <?php if($shipmentArr['air_mawb_upload'] != '') {?>
                                                                                <a class="ms-1 btn btn-success" href="/uploads/<?php echo $shipmentArr['air_mawb_upload'] ?>" target="_blank"><i class="fa fa-eye"></i></a>
                                                                            <?php } ?>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <?php } ?>
                                                                <?php
                                                                if($shipmentArr['air_lc_status'] != 'Not Required') { 
                                                                 ?>
                                                                <tr>
                                                                    <td><strong>L/C</strong></td>
                                                                    <td>
                                                                         <select class="<?php echo $shipmentArr['air_lc_status']; ?>-status status-selector form-control" name="air_lc_status" autocomplete="new-password">
                                                                            <option <?php if($shipmentArr['air_lc_status'] == 'Not Required') { echo 'selected=""'; } ?>>Not Required</option>
                                                                            <option <?php if($shipmentArr['air_lc_status'] == 'Pending') { echo 'selected=""'; } ?>>Pending</option>
                                                                            <option <?php if($shipmentArr['air_lc_status'] == 'Received') { echo 'selected=""'; } ?>>Received</option>
                                                                        </select>
                                                                    </td>
                                                                    <?php 
                                                                    $disabled = 'disabled=""';
                                                                    if($shipmentArr['air_lc_status'] == 'Received') {
                                                                        $disabled = '';
                                                                    }
                                                                     ?>
                                                                    <td>
                                                                        <input readonly="" type="text" <?php echo $disabled; ?> class="status-checker form-control" name="air_lc_received_date" value="<?php echo ($shipmentArr['air_lc_received_date'] != '') ? date('d-m-y', strtotime($shipmentArr['air_lc_received_date'])) : 'Pending'; ?>" autocomplete="new-password">
                                                                    </td>
                                                                    <td>
                                                                         <select <?php echo $disabled; ?> class="status-checker form-control" name="air_lc_source" autocomplete="new-password">
                                                                            <?php $document_source = mysqli_query($con, "SELECT * FROM document_source"); 
                                                                        while($document_source_arr = mysqli_fetch_array($document_source)) {
                                                                    ?>
                                                                            <option <?php if($shipmentArr['air_lc_source'] == $document_source_arr['id']) { echo 'selected=""'; } ?> value="<?php echo $document_source_arr['id'] ?>"><?php echo $document_source_arr['name'] ?></option>
                                                                        <?php } ?>
                                                                        </select>
                                                                    </td>
                                                                    <td>
                                                                        <div class="d-flex align-items-center">
                                                                            
                                                                            <?php if($shipmentArr['air_lc_upload'] != '') {?>
                                                                                <a class="ms-1 btn btn-success" href="/uploads/<?php echo $shipmentArr['air_lc_upload'] ?>" target="_blank"><i class="fa fa-eye"></i></a>
                                                                            <?php } ?>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <?php } ?>
                                                                <?php
                                                                if($shipmentArr['air_insurance_memo_status'] != 'Not Required') { 
                                                                 ?>
                                                                <tr>
                                                                    <td><strong>Insurance Memo</strong></td>
                                                                    <td>
                                                                         <select class="<?php echo $shipmentArr['air_insurance_memo_status']; ?>-status status-selector form-control" name="air_insurance_memo_status" autocomplete="new-password">
                                                                            <option <?php if($shipmentArr['air_insurance_memo_status'] == 'Not Required') { echo 'selected=""'; } ?>>Not Required</option>
                                                                            <option <?php if($shipmentArr['air_insurance_memo_status'] == 'Pending') { echo 'selected=""'; } ?>>Pending</option>
                                                                            <option <?php if($shipmentArr['air_insurance_memo_status'] == 'Received') { echo 'selected=""'; } ?>>Received</option>
                                                                        </select>
                                                                    </td>
                                                                    <?php 
                                                                    $disabled = 'disabled=""';
                                                                    if($shipmentArr['air_insurance_memo_status'] == 'Received') {
                                                                        $disabled = '';
                                                                    }
                                                                     ?>
                                                                    <td>
                                                                        <input readonly="" type="text" <?php echo $disabled; ?> class="status-checker form-control" name="air_insurance_memo_received_date" value="<?php echo ($shipmentArr['air_insurance_memo_received_date'] != '') ? date('d-m-y', strtotime($shipmentArr['air_insurance_memo_received_date'])) : 'Pending'; ?>" autocomplete="new-password">
                                                                    </td>
                                                                    <td>
                                                                         <select <?php echo $disabled; ?> class="status-checker form-control" name="air_insurance_memo_source" autocomplete="new-password">
                                                                            <?php $document_source = mysqli_query($con, "SELECT * FROM document_source"); 
                                                                        while($document_source_arr = mysqli_fetch_array($document_source)) {
                                                                    ?>
                                                                            <option <?php if($shipmentArr['air_insurance_memo_source'] == $document_source_arr['id']) { echo 'selected=""'; } ?> value="<?php echo $document_source_arr['id'] ?>"><?php echo $document_source_arr['name'] ?></option>
                                                                        <?php } ?>
                                                                        </select>
                                                                    </td>
                                                                    <td>
                                                                        <div class="d-flex align-items-center">
                                                                            
                                                                            <?php if($shipmentArr['air_insurance_memo_upload'] != '') {?>
                                                                                <a class="ms-1 btn btn-success" href="/uploads/<?php echo $shipmentArr['air_insurance_memo_upload'] ?>" target="_blank"><i class="fa fa-eye"></i></a>
                                                                            <?php } ?>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <?php } ?>
                                                                <?php
                                                                if($shipmentArr['air_fta_status'] != 'Not Required') { 
                                                                 ?>
                                                                <tr>
                                                                    <td><strong>FTA</strong></td>
                                                                    <td>
                                                                         <select class="<?php echo $shipmentArr['air_fta_status']; ?>-status status-selector form-control" name="air_fta_status" autocomplete="new-password">
                                                                            <option <?php if($shipmentArr['air_fta_status'] == 'Not Required') { echo 'selected=""'; } ?>>Not Required</option>
                                                                            <option <?php if($shipmentArr['air_fta_status'] == 'Pending') { echo 'selected=""'; } ?>>Pending</option>
                                                                            <option <?php if($shipmentArr['air_fta_status'] == 'Received') { echo 'selected=""'; } ?>>Received</option>
                                                                        </select>
                                                                    </td>
                                                                    <?php 
                                                                    $disabled = 'disabled=""';
                                                                    if($shipmentArr['air_fta_status'] == 'Received') {
                                                                        $disabled = '';
                                                                    }
                                                                     ?>
                                                                    <td>
                                                                        <input readonly="" type="text" <?php echo $disabled; ?> class="status-checker form-control" name="air_fta_received_date" value="<?php echo ($shipmentArr['air_fta_received_date'] != '') ? date('d-m-y', strtotime($shipmentArr['air_fta_received_date'])) : 'Pending'; ?>" autocomplete="new-password">
                                                                    </td>
                                                                    <td>
                                                                         <select <?php echo $disabled; ?> class="status-checker form-control" name="air_fta_source" autocomplete="new-password">
                                                                            <?php $document_source = mysqli_query($con, "SELECT * FROM document_source"); 
                                                                        while($document_source_arr = mysqli_fetch_array($document_source)) {
                                                                    ?>
                                                                            <option <?php if($shipmentArr['air_fta_source'] == $document_source_arr['id']) { echo 'selected=""'; } ?> value="<?php echo $document_source_arr['id'] ?>"><?php echo $document_source_arr['name'] ?></option>
                                                                        <?php } ?>
                                                                        </select>
                                                                    </td>
                                                                    <td>
                                                                        <div class="d-flex align-items-center">
                                                                            
                                                                            <?php if($shipmentArr['air_fta_upload'] != '') {?>
                                                                                <a class="ms-1 btn btn-success" href="/uploads/<?php echo $shipmentArr['air_fta_upload'] ?>" target="_blank"><i class="fa fa-eye"></i></a>
                                                                            <?php } ?>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <?php } ?>
                                                            </table>
                                                        </div>
                                                        <hr>
                                                        <?php
                                                        if($shipmentArr['air_others_status'] != 'Not Required') { 
                                                         ?>
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
                                                                         <select class="<?php echo $shipmentArr['air_others_status']; ?>-status status-selector form-control" name="air_others_status" autocomplete="new-password">
                                                                            <option <?php if($shipmentArr['air_others_status'] == 'Not Required') { echo 'selected=""'; } ?>>Not Required</option>
                                                                            <option <?php if($shipmentArr['air_others_status'] == 'Pending') { echo 'selected=""'; } ?>>Pending</option>
                                                                            <option <?php if($shipmentArr['air_others_status'] == 'Received') { echo 'selected=""'; } ?>>Received</option>
                                                                        </select>
                                                                    </td>
                                                                    <?php 
                                                                    $disabled = 'disabled=""';
                                                                    if($shipmentArr['air_others_status'] == 'Received') {
                                                                        $disabled = '';
                                                                    }
                                                                     ?>
                                                                    <td>
                                                                        <input readonly="" type="text" <?php echo $disabled; ?> class="status-checker form-control" name="air_others_details" value="<?php echo $shipmentArr['air_others_details']; ?>" autocomplete="new-password">
                                                                    </td>
                                                                    <td>
                                                                        <input readonly="" type="text" <?php echo $disabled; ?> class="status-checker form-control" name="air_others_date" value="<?php echo ($shipmentArr['air_others_date'] != '') ? date('d-m-y', strtotime($shipmentArr['air_others_date'])) : 'Pending'; ?>" autocomplete="new-password">
                                                                    </td>
                                                                    <td>
                                                                         <select <?php echo $disabled; ?> class="status-checker form-control" name="air_others_source" autocomplete="new-password">
                                                                            <?php $document_source = mysqli_query($con, "SELECT * FROM document_source"); 
                                                                        while($document_source_arr = mysqli_fetch_array($document_source)) {
                                                                    ?>
                                                                            <option <?php if($shipmentArr['air_others_source'] == $document_source_arr['id']) { echo 'selected=""'; } ?> value="<?php echo $document_source_arr['id'] ?>"><?php echo $document_source_arr['name'] ?></option>
                                                                        <?php } ?>
                                                                        </select>
                                                                    </td>
                                                                    <td>
                                                                        <div class="d-flex align-items-center">
                                                                            
                                                                            <?php if($shipmentArr['air_others_upload'] != '') {?>
                                                                                <a class="ms-1 btn btn-success" href="/uploads/<?php echo $shipmentArr['air_others_upload'] ?>" target="_blank"><i class="fa fa-eye"></i></a>
                                                                            <?php } ?>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                        <?php } ?>
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
                                        <span class="accordion-header-text"><img src="/images/img/document.png">Files Status</span>
                                        <span class="accordion-header-indicator"></span>
                                    </div>
                                    <div id="collapse9GI" class="collapse accordion__body show" aria-labelledby="accord-9GI" data-bs-parent="#accordion-nine">
                                        <div class="accordion-body-text">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="basic-form">
                                                        <div class="row align-items-end">
                                                            <div class="mb-3 col-md-3">
                                                                <label class="form-label">Duty Demands</label>
                                                                <input readonly="" type="text" class="form-control pending-check" value="<?php echo ($shipmentArr['funds_demand_send_on'] != '') ? date('d-m-y', strtotime($shipmentArr['funds_demand_send_on'])) : 'Pending'; ?>" name="funds_demand_send_on" autocomplete="new-password">
                                                            </div>
                                                            <div class="mb-3 col-md-3">
                                                                <label class="form-label">Shipping Demand</label>
                                                                <input readonly="" type="text" class="form-control pending-check" value="<?php echo ($shipmentArr['shipping_demand'] != '') ? date('d-m-y', strtotime($shipmentArr['shipping_demand'])) : 'Pending'; ?>" name="shipping_demand" autocomplete="new-password">
                                                            </div>
                                                            <div class="mb-3 col-md-6 bill-row">
                                                                <div class="row align-items-end">
                                                                    <div class="col-md-2">
                                                                        <label class="form-label">Bill Status</label>
                                                                    </div>
                                                                    <div class="col-md-5">
                                                                        <div class="d-flex justify-content-between align-items-center mb-1">
                                                                            
                                                                        </div>
                                                                        <select disabled="" class="form-control" name="bill_status" autocomplete="new-password">
                                                                            <?php $bill_status = mysqli_query($con, "SELECT * FROM bill_status"); 
                                                                                while($bill_status_arr = mysqli_fetch_array($bill_status)) {
                                                                            ?>
                                                                                    <option <?php if($shipmentArr['bill_status'] == $bill_status_arr['id']) { echo 'selected=""'; } ?> value="<?php echo $bill_status_arr['id'] ?>"><?php echo $bill_status_arr['name'] ?></option>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-5">
                                                                        <input readonly="" type="text" class="form-control" value="<?php echo ($shipmentArr['bill_status_on'] != '') ? date('d-m-y', strtotime($shipmentArr['bill_status_on'])) : 'Pending'; ?>" name="bill_status_on" <?php if($shipmentArr['bill_status_on'] == '') { echo 'readonly=""'; } ?> autocomplete="new-password">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="mb-3 col-md-4">
                                                                <label class="form-label">D/O Collect on</label>
                                                                <input readonly="" type="text" class="form-control pending-check" value="<?php echo ($shipmentArr['do_collect_on'] != '') ? date('d-m-y', strtotime($shipmentArr['do_collect_on'])) : 'Pending'; ?>" name="do_collect_on" autocomplete="new-password">
                                                            </div>
                                                            <div class="mb-3 col-md-4">
                                                                <label class="form-label">NOC Valid Till</label>
                                                                <input readonly="" type="text" class="shipment-mode-condition form-control" value="<?php echo ($shipmentArr['noc_valid_till'] != '') ? date('d-m-y', strtotime($shipmentArr['noc_valid_till'])) : 'Pending'; ?>" name="noc_valid_till" autocomplete="new-password">
                                                            </div>
                                                            <div class="mb-3 col-md-4">
                                                                <label class="form-label">Shipment Delivered on</label>
                                                                <input readonly="" type="text" class="form-control pending-check" value="<?php echo ($shipmentArr['shipment_delivered_on'] != '') ? date('d-m-y', strtotime($shipmentArr['shipment_delivered_on'])) : 'Pending'; ?>" name="shipment_delivered_on" autocomplete="new-password">
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <?php if($shipmentArr['shipment_mode'] == 'Containerized') { ?>
                                                        <div class="row">
                                                            <div class="mb-3 col-md-4">
                                                                <label class="form-label">EIR received on</label>
                                                                <input readonly="" type="text" class="shipment-mode-condition form-control" value="<?php echo ($shipmentArr['eir_received_on'] != '') ? date('d-m-y', strtotime($shipmentArr['eir_received_on'])) : 'Pending'; ?>" name="eir_received_on" autocomplete="new-password">
                                                            </div>
                                                            <div class="mb-3 col-md-4">
                                                                <label class="form-label">Refund Case submit on</label>
                                                                <input readonly="" type="text" class="shipment-mode-condition form-control" value="<?php echo ($shipmentArr['refund_case_submit_on'] != '') ? date('d-m-y', strtotime($shipmentArr['refund_case_submit_on'])) : 'Pending'; ?>" name="refund_case_submit_on" autocomplete="new-password">
                                                            </div>
                                                            <div class="mb-3 col-md-4">
                                                                <label class="form-label">Deposit Refund on</label>
                                                                <input readonly="" type="text" class="shipment-mode-condition form-control" value="<?php echo ($shipmentArr['deposit_refund_on'] != '') ? date('d-m-y', strtotime($shipmentArr['deposit_refund_on'])) : 'Pending'; ?>" name="deposit_refund_on" autocomplete="new-password">
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="mb-3 col-md-4">
                                                                <label class="form-label">Refund Amount</label>
                                                                <input readonly="" type="number" class="shipment-mode-condition form-control" name="refund_amount" value="<?php echo $shipmentArr['refund_amount']; ?>" autocomplete="new-password">
                                                            </div>
                                                            <div class="mb-3 col-md-4">
                                                                <label class="form-label">Final Detention Amount</label>
                                                                <input readonly="" type="number" class="shipment-mode-condition form-control" name="final_detention_amount" value="<?php echo $shipmentArr['final_detention_amount']; ?>" autocomplete="new-password">
                                                            </div>
                                                            <div class="mb-3 col-md-4">
                                                                <label class="form-label">Free Days</label>
                                                                <input readonly="" type="number" class="shipment-mode-condition form-control" name="free_days" value="<?php echo $shipmentArr['free_days']; ?>" autocomplete="new-password">
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <?php } ?>
                                                        <div class="row">
                                                            <div class="mb-3 col-md-6">
                                                                <label class="form-label">Remarks</label>
                                                                <input readonly="" type="text" class="form-control" value="<?php echo $shipmentArr['file_remarks']; ?>" name="file_remarks" autocomplete="new-password">
                                                            </div>
                                                            <div class="mb-3 col-md-6">
                                                                <label class="form-label">Additional Remarks</label>
                                                                <input readonly="" type="text" class="form-control" value="<?php echo $shipmentArr['file_additional_remarks']; ?>" name="file_additional_remarks" autocomplete="new-password">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                 <div class="accordion-item">
                                    <div class="accordion-header rounded-lg" id="accord-9Four" data-bs-toggle="collapse" data-bs-target="#collapse9Four" aria-controls="collapse9Four"   aria-expanded="true"  role="button">
                                        <span class="accordion-header-icon"></span>
                                    <span class="accordion-header-text"><img src="/images/img/shipping.png">Shipment Charges</span>
                                    <span class="accordion-header-indicator"></span>
                                    </div>
                                    <div id="collapse9Four" class="collapse accordion__body show" aria-labelledby="accord-9Four" data-bs-parent="#accordion-nine">
                                    <div class="accordion-body-text">
                                        <div class="card">
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

                                                        <input readonly="" type="hidden" id="beneficiary_ids" value="<?php echo $beneficiary_ids; ?>">
                                                        <input readonly="" type="hidden" id="beneficiarys" value="<?php echo $beneficiarys; ?>">

                                                        <?php $shipping_charges_description = mysqli_query($con, "SELECT * FROM shipping_charges_description"); 
                                                            $shipping_charges_description_ids = '';
                                                            $shipping_charges_descriptions = '';
                                                            while($shipping_charges_description_arr = mysqli_fetch_array($shipping_charges_description)) {
                                                                $shipping_charges_description_ids .= $shipping_charges_description_arr['id'] . ',';
                                                                $shipping_charges_descriptions .= $shipping_charges_description_arr['name'] . ',';
                                                            } 
                                                        ?>

                                                        <input readonly="" type="hidden" id="shipping_charges_description_ids" value="<?php echo $shipping_charges_description_ids; ?>">
                                                        <input readonly="" type="hidden" id="shipping_charges_descriptions" value="<?php echo $shipping_charges_descriptions; ?>">

                                                        <table width="100%" class="form-table six-cols expense-table">
                                                            <tr>
                                                                <th style="width: 5%;">S#</th>
                                                                <th>Description</th>
                                                                <th>In Favor Of</th>
                                                                <th>Rate Valid Till</th>
                                                                <th>Beneficiary</th>
                                                                <th>Amount</th>
                                                            </tr>
                                                            <?php 
                                                            if($shipmentArr['expense_description'] != ''){
                                                                $expense_descriptionArr = explode('||', $shipmentArr['expense_description']);
                                                                $expense_in_favor_ofArr = explode('||', $shipmentArr['expense_in_favor_of']);
                                                                $expense_rate_valid_tillArr = explode('||', $shipmentArr['expense_rate_valid_till']);
                                                                $expense_beneficiaryArr = explode('||', $shipmentArr['expense_beneficiary']);
                                                                $expense_amountArr = explode('||', $shipmentArr['expense_amount']);

                                                                for($i = 0; $i < count($expense_descriptionArr); $i++){
                                                                 ?>
                                                                <tr>
                                                                    <td style="width: 5%;"><?php echo $i + 1; ?></td>
                                                                    <td>
                                                                        <select disabled="" class="form-control" name="expense_description[]" autocomplete="new-password">
                                                                            <?php 
                                                                                $shipping_charges_description = mysqli_query($con, "SELECT * FROM shipping_charges_description"); 
                                                                                while($shipping_charges_description_arr = mysqli_fetch_array($shipping_charges_description)) { ?>
                                                                                <option <?php if($expense_descriptionArr[$i] == $shipping_charges_description_arr['id']) { echo 'selected=""'; } ?> value="<?php echo $shipping_charges_description_arr['id'] ?>"><?php echo $shipping_charges_description_arr['name'] ?></option>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </td>
                                                                    <td>
                                                                        <select disabled="" class="form-control" name="expense_in_favor_of[]" autocomplete="new-password">
                                                                             <?php $shipping_line = mysqli_query($con, "SELECT * FROM shipping_line"); 
                                                                                while($shipping_line_arr = mysqli_fetch_array($shipping_line)) {
                                                                            ?>
                                                                                    <option <?php if($expense_in_favor_ofArr[$i] == $shipping_line_arr['id']) { echo 'selected=""'; } ?> value="<?php echo $shipping_line_arr['id'] ?>"><?php echo $shipping_line_arr['name'] ?></option>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </td>
                                                                    <td><input readonly="" type="text" class="form-control" value="<?php echo ($expense_rate_valid_tillArr[$i] != '') ? date('d-m-y', strtotime($expense_rate_valid_tillArr[$i])) : 'Pending'; ?>" name="expense_rate_valid_till[]" autocomplete="new-password"></td>
                                                                    <td>
                                                                        <select disabled="" class="form-control" name="expense_beneficiary[]" autocomplete="new-password">
                                                                            <?php 
                                                                                $beneficiary = mysqli_query($con, "SELECT * FROM beneficiary"); 
                                                                                while($beneficiary_arr = mysqli_fetch_array($beneficiary)) { ?>
                                                                                <option <?php if($expense_beneficiaryArr[$i] == $beneficiary_arr['id']) { echo 'selected=""'; } ?> value="<?php echo $beneficiary_arr['id'] ?>"><?php echo $beneficiary_arr['name'] ?></option>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </td>
                                                                    <td><input readonly="" type="text" class="form-control" name="expense_amount[]" value="<?php echo $expense_amountArr[$i] ?>" autocomplete="new-password"></td>
                                                                </tr>
                                                            <?php } 
                                                            }?>
                                                        </table>
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
                                    <span class="accordion-header-text"><img src="/images/img/upload.png">Upload Documents</span>
                                    <span class="accordion-header-indicator"></span>
                                    </div>
                                    <div id="collapse9Five" class="collapse accordion__body show" aria-labelledby="accord-9Five" data-bs-parent="#accordion-nine">
                                    <div class="accordion-body-text">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="basic-form">
                                                    <div class="row">
                                                        <table width="100%" class="form-table docs-table">
                                                            <tr>
                                                                <th style="width: 5%;">S#</th>
                                                                <th>Document Name</th>
                                                                <th>Remarks</th>
                                                                <th></th>
                                                                <th></th>
                                                            </tr>
                                                            <?php 
                                                                $document_nameArr = explode('||', $shipmentArr['document_name']);
                                                                $document_remarksArr = explode('||', $shipmentArr['document_remarks']);
                                                                $document_fileArr = explode(',', $shipmentArr['document_file']);

                                                                for($i = 0; $i < count($document_nameArr); $i++){
                                                             ?>
                                                                    <tr>
                                                                        <td style="width: 5%;"><?php echo $i + 1; ?></td>
                                                                        <td>

                                                                            <select disabled="" class="form-control" name="document_name[]" autocomplete="new-password">
                                                                                <?php 
                                                                                    $document_name = mysqli_query($con, "SELECT * FROM document_name"); 
                                                                                    while($document_name_arr = mysqli_fetch_array($document_name)) { ?>
                                                                                    <option <?php if($document_nameArr[$i] == $document_name_arr['id']) { echo 'selected=""'; } ?> value="<?php echo $document_name_arr['id'] ?>"><?php echo $document_name_arr['name'] ?></option>
                                                                                <?php } ?>
                                                                            </select>
                                                                        </td>
                                                                        <td><input readonly="" type="text" class="form-control" name="document_remarks[]" value="<?php echo $document_remarksArr[$i] ?>" autocomplete="new-password"></td>
                                                                        <td>
                                                                            <div class="d-flex align-items-center">
                                                                                <?php if($document_fileArr[$i] != '') { ?>
                                                                                    <a class="ms-1 btn btn-success" href="/uploads/<?php echo $document_fileArr[$i] ?>" target="_blank"><i class="fa fa-eye"></i></a>
                                                                                <?php } ?>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                            <?php } ?>
                                                        </table>
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
            </form>
        </div>
    </div>
</div>
</div>
<!--**********************************
Content body end
***********************************-->


<?php include('inc/footer.php'); ?>
<script>
    $('.date-field').datetimepicker({
        format: 'DD-MM-YYYY'
    });
    jQuery('.tab-lists a').click(function(){
        var curTab = jQuery(this).data('tab');
        jQuery('.tab-lists a').removeClass('active-tab');
        jQuery(this).addClass('active-tab');
        jQuery('.tab-box').fadeOut();
        jQuery('.tab-box[data-tab="'+curTab+'"]').fadeIn();
    })

    if(jQuery('#shipment_mode').val() == 'Sea LCL' || jQuery('#shipment_mode').val() == 'Air LCL') {
        jQuery('.shipment-mode-condition').parents('.col-md-4').remove();
    }

    jQuery('.pending-check').each(function(){
        if(jQuery(this).val() == 'Pending') {
            jQuery(this).addClass('pending-inp');
        }
    })
  </script>
