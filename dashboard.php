<?php 
session_start();

if(!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] !== true){
    header("location: login.php");
    exit;
}
include('includes/head.php'); ?>

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
                    <h4 class="page-title mb-0 font-size-18">Dashboard</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <?php 
        include('includes/dbcon.php');

        $ref = "registered";
        $totalregistered = $database->getReference($ref)->getSnapshot()->numChildren();
        ?>

        <?php if($getdata['user_type'] != "User"){ ?>
            <div class="row">
             <div class="col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="media">
                            <div class="avatar-sm font-size-20 mr-3">
                                <span class="avatar-title bg-soft-primary text-primary rounded">
                                    <i class="mdi mdi-chart-bar"></i>
                                </span>
                            </div>
                            <div class="media-body">
                                <div class="font-size-16 mt-2">Appointments</div>
                            </div>
                        </div>
                        <h4 class="mt-4"><?php echo $totalregistered ?></h4>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    

    

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
                            <div class="font-size-16 mt-2">FAQs</div>
                        </div>
                    </div><br>
                    <div id="accordion">
                        <?php
                        $ref = "faqs";
                        $getdata = $database->getReference($ref)->getValue();
                        $i = 0;
                        if($getdata > 0)
                        {
                            foreach($getdata as $key => $row)
                            {
                                $i++; 
                                ?>

                                <div class="card mb-1 shadow-none">
                                    <div class="card-header" id="headingOne<?php echo $key; ?>">
                                        <h6 class="m-0">
                                            <a href="#collapseOne<?php echo $key; ?>" class="text-dark" data-toggle="collapse"
                                                aria-expanded="true"
                                                aria-controls="collapseOne<?php echo $key; ?>">
                                                <?php echo $row['question']; ?>
                                            </a>
                                        </h6>
                                    </div>

                                    <div id="collapseOne<?php echo $key; ?>" class="collapse" aria-labelledby="headingOne<?php echo $key; ?>" data-parent="#accordion">
                                        <div class="card-body">
                                            <?php echo $row['answer']; ?>
                                        </div>
                                    </div>
                                </div>

                            <?php }} ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- end row -->

        <div class="row">
         <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <div class="media">
                        <div class="avatar-sm font-size-20 mr-3">
                            <span class="avatar-title bg-soft-primary text-primary rounded">
                                <i class="mdi mdi-chart-bar"></i>
                            </span>
                        </div>
                        <div class="media-body">
                            <div class="font-size-16 mt-2">Lingayen Emergency Hotlines</div>
                        </div>
                    </div><br>
                    <?php
                    $ref = "hotlines";
                    $getdata = $database->getReference($ref)->getValue();
                    $i = 0;
                    if($getdata > 0)
                    {
                        foreach($getdata as $key => $row)
                        {
                            $i++; 
                            ?>
                            <p><?php echo $row['emergency'] ?></p>
                        <?php }} ?>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <div class="media">
                            <div class="avatar-sm font-size-20 mr-3">
                                <span class="avatar-title bg-soft-primary text-primary rounded">
                                    <i class="mdi mdi-chart-bar"></i>
                                </span>
                            </div>
                            <div class="media-body">
                                <div class="font-size-16 mt-2">PNP- LINGAYEN Hotlines</div>
                            </div>
                        </div>
                        <?php
                        $ref = "hotlines";
                        $getdata = $database->getReference($ref)->getValue();
                        $i = 0;
                        if($getdata > 0)
                        {
                            foreach($getdata as $key => $row)
                            {
                                $i++; 
                                ?>
                                <p><?php echo $row['pnp'] ?></p>
                            <?php }} ?>
                        </div>
                    </div>
                </div>
            </div>

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
                                <div class="font-size-16 mt-2">Announcements and Updates</div>
                            </div>
                        </div><br>
                        <?php 
                        include('includes/dbcon.php');
                        $token = '-MydqW6rypemfL5ZGaEu';
                        $ref = "posting/";
                        $getdata = $database->getReference($ref)->getChild($token)->getValue();
                        ?>
                        <p><?php echo $getdata['content']; ?></p>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="media">
                            <div class="avatar-sm font-size-20 mr-3">
                                <span class="avatar-title bg-soft-primary text-primary rounded">
                                    <i class="mdi mdi-chart-bar"></i>
                                </span>
                            </div>
                            <div class="media-body">
                                <div class="font-size-16 mt-2">Chart Updates for registered constituents for vaccination in Lingayen, Pangasinan</div>
                            </div>
                        </div>


                        <div id="chart"></div>

                    </div>
                </div>
            </div>
            <!-- end col -->
        </div>

        



    </div>
    <!-- End Page-content -->


    <?php include('includes/footer.php') ?>
    <script type="text/javascript">

        <?php 
        $vaccination1 = 0;
        $vaccination2 = 0;
        $vaccination3 = 0;
        $ref = "registered";
        $getdata = $database->getReference($ref)->getValue();
        foreach($getdata as $key => $row)
        {
            if ($row['site'] == "Maniboc Plaza") {
                $vaccination1++;  
            }
            if ($row['site'] == "Lingayen Plaza") {
                $vaccination2++;  
            }
            if ($row['site'] == "Domalandan Center") {
                $vaccination3++;  
            }
        }
        
        ?>
        var options = {
          series: [<?php echo $vaccination1; ?>, <?php echo $vaccination2; ?>, <?php echo $vaccination3; ?>],
          chart: {
              width: 380,
              type: 'pie',
          },
          labels: ['Maniboc Plaza (<?php echo $vaccination1; ?>)', 'Lingayen Plaza (<?php echo $vaccination2; ?>)', 'Domalandan Center (<?php echo $vaccination3; ?>)'],
          responsive: [{
              breakpoint: 480,
              options: {
                chart: {
                  width: 200
              },
              legend: {
                  position: 'bottom'
              }
          }
      }]
  };

  var chart = new ApexCharts(document.querySelector("#chart"), options);
  chart.render();
</script>