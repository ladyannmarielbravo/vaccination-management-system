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
                    <h4 class="page-title mb-0 font-size-18">About Us</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-md-6 col-xl-3">

                <!-- Simple card -->
                <div class="card">
                    <img class="card-img-top img-fluid" src="images/about1.jpeg" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title mt-0">Lady Ann Mariel Bravo</h4>
                        <p class="card-text">3BSIT-01</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">

                <!-- Simple card -->
                <div class="card">
                    <img class="card-img-top img-fluid" src="images/about2.jpeg" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title mt-0">Lilibeth Cruz</h4>
                        <p class="card-text">3BSIT-01</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">

                <!-- Simple card -->
                <div class="card">
                    <img class="card-img-top img-fluid" src="images/about3.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title mt-0">Jim Michael Enrico</h4>
                        <p class="card-text">3BSIT-01</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">

                <!-- Simple card -->
                <div class="card">
                    <img class="card-img-top img-fluid" src="images/about4.jpeg" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title mt-0">Rogine Marlou De Vera</h4>
                        <p class="card-text">UP-FB1-BSIT4-TUT4</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">

                <!-- Simple card -->
                <div class="card">
                    <img class="card-img-top img-fluid" src="images/about5.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title mt-0">Edrien Picar</h4>
                        <p class="card-text">UP-FB1-BSIT4-TUT4</p>
                    </div>
                </div>
            </div>
        </div>

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
                        url:"controllers/userpost.php",  
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
