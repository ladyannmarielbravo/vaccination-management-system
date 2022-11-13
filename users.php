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
                    <h4 class="page-title mb-0 font-size-18">Users</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <button type="button" class="btn btn-primary btn-md waves-effect waves-light" id="" data-toggle="modal" data-target="#adduser">Add User</button><br><br>
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Users</h4>

                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;" id="studentstable">

                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Contact No</th>
                                    <th>Email</th>
                                    <th>User Type</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php 
                                include('includes/dbcon.php');

                                $ref = "users";
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
                                            <td><?php echo $row['full_name']; ?></td>
                                            <td><?php echo $row['contact_no']; ?></td>
                                            <td><?php echo $row['email']; ?></td>
                                            <td><?php echo $row['user_type']; ?></td>
                                            <td>
                                              <button type="button" class="btn btn-danger btn-sm waves-effect waves-light btndelete" id="<?php echo $key; ?>">Delete</button>
                                            </td>
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

        


    </div>
    <!-- End Page-content -->

    <!--  Add Student Modal -->
<div class="modal fade bs-example-modal-xl" id="adduser" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myExtraLargeModalLabel">Add User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-lg-12">
                    <div class="card"> 
                        <div class="card-body">
                            <h4 class="card-title">Please Fill Up The Form Below</h4>
                            <form class="needs-validation" id="adduserform" novalidate>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group position-relative">
                                            <label for="validationTooltip01">Full Name</label>
                                            <input type="text" class="form-control" id="validationTooltip01" placeholder="Full Name" name="full_name" required>
                                            <div class="valid-tooltip">
                                                Looks good!
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group position-relative">
                                            <label for="validationTooltip01">Email</label>
                                            <input type="text" class="form-control" id="validationTooltip01" placeholder="Email" name="email" required>
                                            <div class="valid-tooltip">
                                                Looks good!
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group position-relative">
                                            <label for="validationTooltip01">Contact No.</label>
                                            <input type="text" class="form-control" id="validationTooltip01" placeholder="Contact No." name="contact_no" required>
                                            <div class="valid-tooltip">
                                                Looks good!
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    
                                    <div class="col-md-4">
                                        <div class="form-group position-relative">
                                            <label for="validationTooltip01">Password</label>
                                            <input type="password" class="form-control" id="validationTooltip01" placeholder="Password" name="password" required>
                                            <div class="valid-tooltip">
                                                Looks good!
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group position-relative">
                                            <label class="control-label">User Type</label>
                                            <select class="form-control select2" id="validationTooltip05" required name="user_type">
                                                <option disabled selected value="">Select User Type</option>
                                                <?php if($getdata['user_type'] != "User"){ ?>
                                                    <option>Domalandan Center Admin</option>
			                                        <option>Lingayen Plaza Admin</option>
                                                    <option>Maniboc Plaza Admin</option>
                                                    <option>Super Admin</option>
                                                    <option>Domalandan Center Vaccinator</option>
                                                    <option>Lingayen Plaza Vaccinator</option>
                                                    <option>Maniboc Plaza Vaccinator</option>
                                                <?php } ?>
                                                <option>User</option>
                                            </select>
                                            <div class="valid-tooltip">
                                                Looks good!
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <button class="btn btn-primary" id="addstudent" name="adduser" type="submit">Add User</button>
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
                        url:"controllers/adduser.php",  
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

            $(document).on('click', '.btndelete', function(){ 
            var id = $(this).attr("id");
            var table = "users";  
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
        });
    </script>