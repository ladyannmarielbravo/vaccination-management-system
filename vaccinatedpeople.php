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

                        <h4 class="card-title">Barangay Vaccinated People</h4>

                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Site</th>
                                    <th>Category</th>
                                    <th>ID</th>
                                    <th>Age</th>
                                    <th>Name</th>
                                    <?php if($_SESSION['user_type'] != "User"){ ?>
                                        <th>Action</th>
                                    <?php } ?>
                                </tr>
                            </thead>

                            <tbody>
                                <?php 
                                include('includes/dbcon.php');

                                $ref = "registered";
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
                                            <td><?php echo $row['date']; ?></td>
                                            <td><?php echo $row['time']; ?></td>
                                            <td><?php echo $row['site']; ?></td>
                                            <td><?php echo $row['category']; ?></td>
                                            <td><?php echo $row['id']; ?></td>
                                            <td><?php echo $row['age']; ?></td>
                                            <td><?php echo $row['name']; ?></td>
                                            
                                            <?php if($_SESSION['user_type'] != "User"){ ?>
                                            <td>
                                                <a href="editperson.php?token=<?php echo $key; ?>" class="btn btn-primary btn-sm">Edit</a>
                                                <a href="viewperson.php?token=<?php echo $key; ?>" class="btn btn-primary btn-sm">View</a>
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


    </div>
    <!-- End Page-content -->


    <?php include('includes/footer.php') ?>
    <script type="text/javascript">
        $(document).on('click', '.btndelete', function(){ 
            var id = $(this).attr("id");
            var table = "registered";  
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