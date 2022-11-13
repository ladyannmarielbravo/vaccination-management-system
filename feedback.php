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
                    <h4 class="page-title mb-0 font-size-18">Feedback</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <?php if($_SESSION['user_type'] == "User"){ ?>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">Feedback</h4>
                                            <form class="needs-validation" id="adduserform" novalidate>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group position-relative">
                                                            <label for="validationTooltip01">Full Name</label>
                                                            <input type="text" class="form-control" id="validationTooltip01" placeholder="Full Name" name="full_name">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group position-relative">
                                                            <label for="validationTooltip01">Contact No</label>
                                                            <input type="text" class="form-control" id="validationTooltip01" placeholder="Contact No" name="contact_no">
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group position-relative">
                                                            <label for="validationTooltip01">Email</label>
                                                            <input type="text" class="form-control" id="validationTooltip01" placeholder="Email" name="email">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group position-relative">
                                                            <label for="validationTooltip01">Message</label>
                                                            <textarea class="form-control" name="message"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button class="btn btn-primary" id="addfaq" name="adduser" type="submit">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->
                            </div>
                            <!-- end row -->

                        </div>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        <?php } ?>

        <?php if($_SESSION['user_type'] != "User"){ ?>
            <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Feedbacks</h4>

                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;" id="studentstable">

                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Contact No</th>
                                    <th>Email</th>
                                    <th>Message</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php 
                                include('includes/dbcon.php');

                                $ref = "feedbacks";
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
                                            <td><?php echo $row['message']; ?></td>
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
        <?php } ?>

        

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
                        url:"controllers/addfeedback.php",  
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
