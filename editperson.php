<?php 
session_start();

if(!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] !== true){
    header("location: login.php");
    exit;
}
 ?>
<?php include('includes/head.php') ?>

<?php include('includes/header.php') ?>

<?php include('includes/sidebar.php') ?>

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">

    <div class="page-content">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="page-title mb-0 font-size-18">Barangay Vaccinated People</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <?php 
        include('includes/dbcon.php');
        $token = $_GET['token'];
        $ref = "registered/";
        $getdata = $database->getReference($ref)->getChild($token)->getValue();
        ?>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Edit Person Information</h4>
                        <form action="controllers/edit.php" method="POST">
                            <div class="row">
                                <input type="hidden" name="ref_token" value="<?php echo $token; ?>">
                                <div class="col-md-6">
                                    <div class="form-group position-relative">
                                        <label for="validationTooltip01">Date</label>
                                        <input type="text" class="form-control" id="validationTooltip01" placeholder="Date" name="date" value="<?php echo $getdata['date']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group position-relative">
                                        <label for="validationTooltip01">Time</label>
                                        <input type="text" class="form-control" id="validationTooltip01" placeholder="Time" name="time" value="<?php echo $getdata['time']; ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group position-relative">
                                        <label for="validationTooltip01">Site</label>
                                        <input type="text" class="form-control" id="validationTooltip01" placeholder="Site" name="site" value="<?php echo $getdata['site']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group position-relative">
                                        <label for="validationTooltip01">Category</label>
                                        <input type="text" class="form-control" id="validationTooltip01" placeholder="Category" name="category" value="<?php echo $getdata['category']; ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group position-relative">
                                        <label for="validationTooltip01">ID Number</label>
                                        <input type="text" class="form-control" id="validationTooltip01" placeholder="ID Number" name="id" value="<?php echo $getdata['id']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group position-relative">
                                        <label for="validationTooltip01">Age</label>
                                        <input type="text" class="form-control" id="validationTooltip01" placeholder="Age" name="age" value="<?php echo $getdata['age']; ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group position-relative">
                                        <label for="validationTooltip01">Name</label>
                                        <input type="text" class="form-control" id="validationTooltip01" placeholder="Name" name="name" value="<?php echo $getdata['name']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group position-relative">
                                        <label for="validationTooltip01">Gender</label>
                                        <input type="text" class="form-control" id="validationTooltip01" placeholder="Gender" name="gender" value="<?php echo $getdata['gender']; ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group position-relative">
                                        <label for="validationTooltip01">Date of Birth</label>
                                        <input type="text" class="form-control" id="validationTooltip01" placeholder="Date of Birth" name="birthday" value="<?php echo $getdata['birthday']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group position-relative">
                                        <label for="validationTooltip01">Address</label>
                                        <input type="text" class="form-control" id="validationTooltip01" placeholder="Address" name="address" value="<?php echo $getdata['address']; ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group position-relative">
                                        <label for="validationTooltip01">Contact No.</label>
                                        <input type="text" class="form-control" id="validationTooltip01" placeholder="Contact No." name="contact" value="<?php echo $getdata['contact']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group position-relative">
                                        <label for="validationTooltip01">Email Address</label>
                                        <input type="text" class="form-control" id="validationTooltip01" placeholder="Email Address" name="email" value="<?php echo $getdata['email']; ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group position-relative">
                                        <label for="validationTooltip01">Reference Number</label>
                                        <input type="text" class="form-control" id="validationTooltip01" placeholder="Reference Number" name="reference" value="<?php echo $getdata['reference']; ?>">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" name="update_data" class="btn btn-info btn-block">Update Data</button>
                            <hr>
                        </form>

                    </div>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->

    </div>
    <!-- End Page-content -->

    <?php include('includes/footer.php') ?>