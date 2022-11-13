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

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Add Person Information</h4>
                        <form action="controllers/insert.php" method="POST">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group position-relative">
                                        <label for="validationTooltip01">Date</label>
                                        <input type="date" class="form-control" id="validationTooltip01" placeholder="Date" name="date">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group position-relative">
                                        <label for="validationTooltip01">Time</label>
                                        <input type="time" class="form-control" id="validationTooltip01" placeholder="Time" name="time">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group position-relative">
                                        <label for="validationTooltip01">Site</label>
                                        <select class="form-control select2 year" id="validationTooltip05" required name="site">
                                            <option disabled selected value="">Select Site</option>
                                            <option>Domalandan Center</option>
                                            <option>Lingayen Plaza</option>
                                            <option>Maniboc Plaza</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group position-relative">
                                        <label for="validationTooltip01">Category</label>
                                        <select class="form-control select2 year" id="validationTooltip05" required name="category">
                                            <option disabled selected value="">Select Category</option>
                                            <option>A1: Frontline</option>
                                            <option>A2: Senior citizens aged 60 years old and above</option>
                                            <option>A3: Persons with comorbidities not otherwise included in the preceding categories</option>
                                            <option>A4: Frontline personnel in essential sectors, including uniformed personnel and those in working sectors identified by the IATF as essential during ECQ</option>
                                            <option>A5: Indigent populations not otherwise included in the preceding categories</option>
                                            <option>B1: Teachers, social workers</option>
                                            <option>B2: Other government workers</option>
                                            <option>B4: Socio-demographic groups at significantly higher risk other than senior citizens and indigent people</option>
                                            <option>B5: Overseas Filipino Workers</option>
                                            <option>B6: Other remaining workforce</option>
                                            <option>C: Rest of the Filipino population not otherwise included in the above groups</option>

                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group position-relative">
                                        <label for="validationTooltip01">ID Number</label>
                                        <input type="text" class="form-control" id="validationTooltip01" placeholder="ID Number" name="id">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group position-relative">
                                        <label for="validationTooltip01">Age</label>
                                        <input type="text" class="form-control" id="validationTooltip01" placeholder="Age" name="age">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group position-relative">
                                        <label for="validationTooltip01">Name</label>
                                        <input type="text" class="form-control" id="validationTooltip01" placeholder="Name" name="name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group position-relative">
                                        <label for="validationTooltip01">Status</label>
                                        <input type="text" class="form-control" id="validationTooltip01" placeholder="Status" name="gender">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group position-relative">
                                        <label for="validationTooltip01">Date of Birth</label>
                                        <input type="text" class="form-control" id="validationTooltip01" placeholder="Date of Birth" name="birthday">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group position-relative">
                                        <label for="validationTooltip01">Address</label>
                                        <input type="text" class="form-control" id="validationTooltip01" placeholder="Address" name="address">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group position-relative">
                                        <label for="validationTooltip01">Contact No.</label>
                                        <input type="text" class="form-control" id="validationTooltip01" placeholder="Contact No." name="contact">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group position-relative">
                                        <label for="validationTooltip01">Email Address</label>
                                        <input type="text" class="form-control" id="validationTooltip01" placeholder="Email Address" name="email">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group position-relative">
                                        <label for="validationTooltip01">Reference Number</label>
                                        <input type="text" class="form-control" id="refno" placeholder="Reference Number" name="reference" value="<?php echo(rand()); ?>">
                                    </div>
                                </div>
                            </div>





                            <button type="submit" name="save_push_data" class="btn btn-info btn-block">Insert Data</button>
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
    <script type="text/javascript">
        $(document).ready(function() {
            $("#adduserform").on("submit", function(event){
                event.preventDefault();
                var form = $("#adduserform");
                var formValues= $(this).serialize();
                if (form[0].checkValidity() === false) {
                    event.stopPropagation();
                }
                else
                {

                    $.ajax({
                        url:"controllers/insert.php",  
                        method:"POST",  
                        data:formValues,  
                        success:function(data)  
                        {  
                            if (data == "success") {
                                Swal.fire({
                                  type: 'success',
                                  title: 'Successfully Added!',
                                  showConfirmButton: true,
                                  allowOutsideClick: false,
                                  onClose: () => {
                                    location.reload();
                                }
                            })
                            }
                            if (data == "error") {
                                Swal.fire({
                                  type: 'error',
                                  title: 'Email Taken!',
                                  showConfirmButton: true,
                                  allowOutsideClick: false,
                                  
                              })
                            }

                        }
                    });
                }
            });
        
            let x = Math.floor((Math.random() * 10000000000000) + 1);
document.getElementById("refno").innerHTML = x;
     
    </script>