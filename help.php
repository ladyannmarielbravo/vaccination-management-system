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
                    <h4 class="page-title mb-0 font-size-18">Help</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <?php if($_SESSION['user_type'] != "User"){ ?>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">Help Content</h4>
                                            <form class="needs-validation" id="adduserform" novalidate>
                                                <?php 
                                                include('includes/dbcon.php');
                                                $token = '-MydqW6rypemfL5ZGaEu';
                                                $ref = "help/";
                                                $getdata = $database->getReference($ref)->getChild($token)->getValue();
                                                ?>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <input type="hidden" name="ref_token" value="<?php echo $token; ?>">
                                                        <div class="form-group position-relative">
                                                            <textarea class="summernote" name="content"><?php echo $getdata['content']; ?></textarea>
                                                        </div>
                                                    </div>

                                                </div>
                                                <button class="btn btn-primary" id="addfaq" name="adduser" type="submit">Update Help</button>
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

        <?php if($_SESSION['user_type'] == "User"){ ?>
            <div class="row">
             <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="media">
                            <div class="avatar-sm font-size-20 mr-3">
                                <span class="avatar-title bg-soft-primary text-primary rounded">
                                    <i class="mdi mdi-chart-bar"></i>
                                </span>
                            </div>
                            <div class="media-body">
                                <div class="font-size-16 mt-2">Help</div>
                            </div>
                        </div><br>
                        <?php 
                        include('includes/dbcon.php');
                        $token = '-MydqW6rypemfL5ZGaEu';
                        $ref = "help/";
                        $getdata = $database->getReference($ref)->getChild($token)->getValue();
                        ?>
                        <p><?php echo $getdata['content']; ?></p>
                    </div>
                </div>
            </div>
        </div>
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
                    url:"controllers/addcontent.php",  
                    method:"POST",  
                    data:formValues,  
                    success:function(data)  
                    {  
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
