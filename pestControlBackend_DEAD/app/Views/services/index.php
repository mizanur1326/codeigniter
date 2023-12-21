<?php echo $this->include('include/header.php');?> 
<title><?php echo $title;?></title>
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
                                <h2 class="pageheader-title">Services List</h2>
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
                    <div class="table-responsive">
                    <?php if (session()->getFlashdata('msg')) : ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <?php echo session()->getFlashdata('msg'); ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                </div>
                            <?php endif; ?>
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Service Name</th>
                                            <th>Description</th>
                                            <th>Price</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        foreach ($items as $item) :
                                        ?>
                                            <tr>
                                                <td><?php echo $item['id'] ?></td>
                                                <td><?php echo $item['serviceName'] ?></td>
                                                <td><?php echo $item['description'] ?></td>
                                                <td><?php echo $item['price'] ?></td>
                                                <td><?php echo $item['image'] ?></td>
                                                <td>
                                                    <a href="<?php echo base_url('/services/delete/'.$item['id'])?>" class="btn btn-danger" onclick="return confirm('Are You Sure to Delete?')"><i class="fa fa-trash"></i></a>

                                                    <a href="<?php echo base_url('/services/edit/'.$item['id'])?>" class="btn btn-success"><i class="fa fa-edit"></i></a>
                                                </td>
                                            </tr>
                                        <?php
                                        endforeach;
                                        ?>
                                    </tbody>
                                 
                                </table>
                            </div>
                </div>
            </div>
            <!-- ============================================================== -->
            
<?php echo $this->include('include/footer.php');?>            