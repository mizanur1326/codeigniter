<?php echo $this->include('include/header.php');?> 
<title>Edit Service</title>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
<?php echo $this->include('include/topNav.php');?>
        <!-- ============================================================== -->
        <!-- ============================================================== -->
<?php echo $this->include('include/leftNav.php');?>
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title">Edit Blog Post</h2>
                                <!-- <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus vel mauris facilisis faucibus at enim quis massa lobortis rutrum.</p> -->
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="/" class="breadcrumb-link">Dashboard</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Services</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->

                    <?php echo validation_list_errors();?>

                    <form class="row g-3" action="<?php echo site_url('blogs/update/'. $id );?>" method="post">
                                <div class="col-md-6 mb-3">
                                    <input type="text" class="form-control" name="title" value="<?php echo $title ;?>" placeholder="Service Name">
                                </div>
                                <div class="col-md-8 mb-3">
                                    <input type="text" class="form-control" style="height: 200px;" name="description" value="<?php echo $description?>" placeholder="Description">
                                </div>                                
                                <div class="col-md-8">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <button type="reset" class="btn btn-secondary">Cancel</button>
                                </div>
                            </form>
            </div>
            <!-- ============================================================== -->
            
<?php echo $this->include('include/footer.php');?>            