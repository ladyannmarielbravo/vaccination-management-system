<?php 
session_start();
if(isset($_SESSION["logged_in"])){
    header("location: dashboard.php");
    exit;
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title> Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/logo-ling.png">

    <!-- Sweet Alert-->
    <link href="assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

</head>

<body>

    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="bg-login text-center">
                            <div class="bg-login-overlay"></div>
                            <div class="position-relative">
                                <h5 class="text-white font-size-20">Welcome Back!</h5>
                                <p class="text-white-50 mb-0">Sign in</p>
                                <a href="" class="logo logo-admin mt-4">
                                    <img src="assets/images/logo-ling.png" alt="" height="75">
                                </a>
                            </div>
                        </div>
                        <div class="card-body pt-5">
                            <div class="p-2">
                                <form class="form-horizontal"  action="controllers/login.php" method="post">
                                    <div class="form-group">
                                        <label for="username">Email</label>
                                        <input type="text" class="form-control" id="username" name="email" placeholder="Enter Email">
                                    </div>

                                    <div class="form-group">
                                        <label for="userpassword">Password</label>
                                        <input type="password" class="form-control" name="password" id="password" placeholder="Enter password">
                                    </div>
                                    

                                    

                                    <div class="mt-3">
                                        <button class="btn btn-primary btn-block waves-effect waves-light btnlogin" type="submit" name="login">Log In</button>
                                    </div>


                                    <div class="mt-4 text-center">
                                        <a type="button" data-toggle="modal" data-target="#adduser" class="text-muted"><i class="mdi mdi-lock mr-1"></i>Register</a>
                                    </div>

                                    
                                </form>
                            </div>

                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <p>© 2021</p>
                    </div>

                    <!--  Add Student Modal -->
                    <div class="modal fade bs-example-modal-xl" id="adduser" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title mt-0" id="myExtraLargeModalLabel">Register</h5>
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
                                                                <input type="text" class="form-control" id="validationTooltip01" placeholder="Email" name="emaill" required>
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
                                                                <input type="password" class="form-control" id="validationTooltip01" placeholder="Password" name="passwordd" required>
                                                                <div class="valid-tooltip">
                                                                    Looks good!
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group position-relative">
                                                                <label class="control-label">User Type</label>
                                                                <select class="form-control select2" id="validationTooltip05" required name="user_type">
                                                                    
                                                                    <option selected>User</option>
                                                                </select>
                                                                <div class="valid-tooltip">
                                                                    Looks good!
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <button class="btn btn-primary" id="addstudent" name="adduser" type="submit">Register</button>
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

                </div>
            </div>
        </div>
    </div>

    <?php include('includes/footer.php') ?>

</body>


</html>
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
                        url:"controllers/register.php",  
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


        $("#loginform").on("submit", function(event){
            event.preventDefault();
            var form = $("#loginform");
            var formValues= $(this).serialize();
            if (form[0].checkValidity() === false) {
                event.stopPropagation();
            }
            else
            {
                $.ajax({
                    url:"controllers/login.php",  
                    method:"POST",  
                    data:formValues,  
                    success:function(data)  
                    {  
                        if (data == "success") {
                            Swal.fire({
                              type: 'success',
                              title: 'Successfully Logged in!',
                              showConfirmButton: true,
                              allowOutsideClick: false,
                              onClose: () => {
                                window.location.href = "dashboard.php";
                            }
                        })
                        }
                        if(data == "error"){
                            Swal.fire({
                              type: 'error',
                              title: "There's already a schedule for this subject!",
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
    });
</script>