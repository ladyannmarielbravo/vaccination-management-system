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
                    <h4 class="page-title mb-0 font-size-18">Vaccine Dose</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <?php if($_SESSION['user_type'] != "User"){ ?>
                    <button type="button" class="btn btn-primary btn-md waves-effect waves-light" id="" data-toggle="modal" data-target="#addstudentmodal">Add Data</button><br><br>
                <?php } ?>
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Vaccine Dose</h4>

                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;" id="studentstable">

                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>1st Dose</th>
                                    <th>2nd Dose</th>
                                    <?php if($_SESSION['user_type'] != "User"){ ?>
                                        <th>Action</th>
                                    <?php } ?>
                                </tr>
                            </thead>

                            <tbody>
                                <?php 
                                include('includes/dbcon.php');

                                $ref = "vaccines";
                                $getdata = $database->getReference($ref)->getValue();
                                $i = 0;
                                if($getdata > 0)
                                {
                                    foreach($getdata as $key => $row)
                                    {
                                        $i++;
                                        ?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td><?php echo $row['name']; ?></td>
                                            <td><?php echo $row['firstdose']; ?></td>
                                            <td><?php echo $row['seconddose']; ?></td>
                                            <?php if($_SESSION['user_type'] != "User"){ ?>
                                                <td>
                                                    <button type="button" class="btn btn-primary btn-sm waves-effect waves-light btnedit" id="<?php echo $key; ?>">View/Edit</button>
                                                    <button type="button" class="btn btn-danger btn-sm waves-effect waves-light btndelete" id="<?php echo $key; ?>">Delete</button>
                                                </td>
                                            <?php } ?>
                                        </tr>
                                        <?php
                                    }
                                }
                                else
                                {
                                    ?>
                                    <tr class="text-center">
                                        <td colspan="6">DATA NOT THERE IN DATABASE</td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
            <!-- end col -->

        </div>
        <!-- end row -->

        <!--  Add Student Modal -->
        <div class="modal fade bs-example-modal-xl" id="addstudentmodal" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title mt-0" id="myExtraLargeModalLabel">Add Vaccinated Person</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="col-lg-12">
                            <div class="card"> 
                                <div class="card-body">

                                    <form class="needs-validation" id="adduserform" novalidate>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group position-relative">
                                                    <label for="validationTooltip01">Name</label>
                                                    <input type="text" class="form-control" id="validationTooltip01" name="name" required>
                                                    <div class="valid-tooltip">
                                                        Looks good!
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <h4 class="card-title">1st Dose Vaccine</h4>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group position-relative">
                                                    <label for="validationTooltip01">1st Dose</label>
                                                    <input type="text" class="form-control" id="validationTooltip01"  name="firstdose" required>
                                                    <div class="valid-tooltip">
                                                        Looks good!
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group position-relative">
                                                    <label for="validationTooltip01">1st Dose Date</label>
                                                    <input type="text" class="form-control" id="validationTooltip01"  name="firstdosedate" required>
                                                    <div class="valid-tooltip">
                                                        Looks good!
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group position-relative">
                                                    <label for="validationTooltip01">1st Dose Vaccine Manufacture</label>
                                                    <input type="text" class="form-control" id="validationTooltip01" name="firstdosemanufacture" required>
                                                    <div class="valid-tooltip">
                                                        Looks good!
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group position-relative">
                                                    <label for="validationTooltip01">1st Dose Vaccine Batch No.</label>
                                                    <input type="text" class="form-control" id="validationTooltip01" name="firstdosebatch" required>
                                                    <div class="valid-tooltip">
                                                        Looks good!
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group position-relative">
                                                    <label for="validationTooltip01">1st Dose Vaccine Vaccinator Name</label>
                                                    <input type="text" class="form-control" id="validationTooltip01" name="firstdosevaccinator" required>
                                                    <div class="valid-tooltip">
                                                        Looks good!
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <h4 class="card-title">2nd Dose Vaccine</h4>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group position-relative">
                                                    <label for="validationTooltip01">2nd Dose</label>
                                                    <input type="text" class="form-control" id="validationTooltip01"  name="seconddose" required>
                                                    <div class="valid-tooltip">
                                                        Looks good!
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group position-relative">
                                                    <label for="validationTooltip01">2nd Dose Date</label>
                                                    <input type="text" class="form-control" id="validationTooltip01"  name="seconddosedate" required>
                                                    <div class="valid-tooltip">
                                                        Looks good!
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group position-relative">
                                                    <label for="validationTooltip01">2nd Dose Vaccine Manufacture</label>
                                                    <input type="text" class="form-control" id="validationTooltip01" name="seconddosemanufacture" required>
                                                    <div class="valid-tooltip">
                                                        Looks good!
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group position-relative">
                                                    <label for="validationTooltip01">2nd Dose Vaccine Batch No.</label>
                                                    <input type="text" class="form-control" id="validationTooltip01" name="seconddosebatch" required>
                                                    <div class="valid-tooltip">
                                                        Looks good!
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group position-relative">
                                                    <label for="validationTooltip01">2nd Dose Vaccine Vaccinator Name</label>
                                                    <input type="text" class="form-control" id="validationTooltip01" name="seconddosevaccinator" required>
                                                    <div class="valid-tooltip">
                                                        Looks good!
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <h4 class="card-title">Booster Dose Vaccine</h4>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group position-relative">
                                                    <label for="validationTooltip01">Booster Dose</label>
                                                    <input type="text" class="form-control" id="validationTooltip01"  name="boosterdose" required>
                                                    <div class="valid-tooltip">
                                                        Looks good!
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group position-relative">
                                                    <label for="validationTooltip01">Booster Dose Date</label>
                                                    <input type="text" class="form-control" id="validationTooltip01"  name="boosterdosedate" required>
                                                    <div class="valid-tooltip">
                                                        Looks good!
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group position-relative">
                                                    <label for="validationTooltip01">Booster Dose Vaccine Manufacture</label>
                                                    <input type="text" class="form-control" id="validationTooltip01" name="boosterdosemanufacture" required>
                                                    <div class="valid-tooltip">
                                                        Looks good!
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group position-relative">
                                                    <label for="validationTooltip01">Booster Dose Vaccine Batch No.</label>
                                                    <input type="text" class="form-control" id="validationTooltip01" name="boosterdosebatch" required>
                                                    <div class="valid-tooltip">
                                                        Looks good!
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group position-relative">
                                                    <label for="validationTooltip01">Booster Dose Vaccine Vaccinator Name</label>
                                                    <input type="text" class="form-control" id="validationTooltip01" name="boosterdosevaccinator" required>
                                                    <div class="valid-tooltip">
                                                        Looks good!
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <button class="btn btn-primary" id="addstudent" name="adduser" type="submit">Submit</button>
                                    </form>
                                </div>
                            </div>
                            <!-- end card -->
                        </div>
                        <!-- end col -->
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.End Add Student Modal -->

        <!--  Edit Subject Modal -->
        <div class="modal fade bs-example-modal-xl" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title mt-0" id="myExtraLargeModalLabel">View/Edit</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="col-lg-12">
                          <div class="card">
                              <div class="card-body">
                                  <h4 class="card-title">Please Fill Up The Form Below</h4>
                                  <form class="needs-validation" id="editform" novalidate>
                                    <div id="editcont"></div>

                                    <button class="btn btn-primary" id="btnupdatesubject" type="submit">Update</button>
                                </form>
                            </div>
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->

                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.End Edit Subject Modal -->


</div>
<!-- End Page-content -->


<!-- end main content-->

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
                    url:"controllers/adddose.php",  
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
                              title: 'Error!',
                              showConfirmButton: true,
                              allowOutsideClick: false,

                          })
                        }

                    }
                });
            }
        });

        $("#editform").on("submit", function(event){
            event.preventDefault();
            var form = $("#editform");
            var formValues= $(this).serialize();
            if (form[0].checkValidity() === false) {
                event.stopPropagation();
            }
            else
            {

                $.ajax({
                    url:"controllers/updatevacdose.php",  
                    method:"POST",  
                    data:formValues,  
                    success:function(data)  
                    {  
                        Swal.fire({
                          type: 'success',
                          title: 'Successfully Updated!',
                          showConfirmButton: true,
                          allowOutsideClick: false,
                          onClose: () => {
                            location.reload();
                        }
                    });

                        if (data == "success") {
                            Swal.fire({
                              type: 'success',
                              title: 'Successfully Updated!',
                              showConfirmButton: true,
                              allowOutsideClick: false,
                              onClose: () => {
                                location.reload();
                            }
                        })
                        }

                        if(data == "error"){
                            Swal.fire({
                              type: 'error',
                              title: 'Error!',
                              showConfirmButton: true,
                              allowOutsideClick: false,
                              onClose: () => {
                                location.reload();
                            }
                        })
                        }
                    }
                });
            }
        });

        $(document).on('click', '.btnviewstudentinfo', function(){ 
            var id = $(this).attr("id");  
            if(id != '')  
            {  
                $.ajax({  
                 url:"controllers/viewstudentinfo.php",  
                 method:"POST",  
                 data:{id:id},  
                 success:function(data){  
                  $('#studentinfocont').html(data);  
                  $('#studentinfo').modal('show');  
              }  
          });  
            }            
        });

        $(document).on('click', '.btnedit', function(){ 
            var id = $(this).attr("id");  
            if(id != '')  
            {  
                $.ajax({  
                 url:"controllers/info.php",  
                 method:"POST",  
                 data:{id:id},  
                 success:function(data){  
                  $('#editcont').html(data);  
                  $('#editmodal').modal('show');  
              }  
          });  
            }            
        });
        $(document).on('click', '.btndelete', function(){ 
            var id = $(this).attr("id");
            var table = "vaccines";  
            if(id != '')  
            {  
                $.ajax({  
                 url:"controllers/deletes.php",  
                 method:"POST",  
                 data:{id:id,table:table},  
                 success:function(data){  
                  Swal.fire({
                      type: 'success',
                      title: 'Successfully Deleted!',
                      showConfirmButton: true,
                      allowOutsideClick: false,
                      onClose: () => {
                        location.reload();
                    }
                })
              }  
          });  
            }            
        });
    });
</script>