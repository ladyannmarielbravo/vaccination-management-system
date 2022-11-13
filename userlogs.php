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
                    <h4 class="page-title mb-0 font-size-18">User Logs</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">User Logs</h4>

                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                    <th>Date/Time</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php 
                                include('includes/dbcon.php');

                                $ref = "logs";
                                $getdata = $database->getReference($ref)->getValue();
                                $i = 0;
                                if($getdata > 0)
                                {
                                    foreach($getdata as $key => $row)
                                    {
                                        $i++;
                                        ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $row['name']; ?></td>
                                            <td><?php echo $row['action']; ?></td>
                                            <td><?php echo $row['datetime']; ?><button hidden type="button" class="btn btn-danger btn-sm waves-effect waves-light btndelete" id="<?php echo $key; ?>">Delete</button></td>
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


    <?php include('includes/footer.php') ?>
    <script type="text/javascript">
        $(document).on('click', '.btndelete', function(){ 
            var id = $(this).attr("id");
            var table = "logs";  
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
    </script>