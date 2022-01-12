<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRAKIT</title>
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/bootstrap.css">
    
<link rel="stylesheet" href="<?php echo base_url() ?>/assets/vendors/iconly/bold.css">

    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/app.css">
    <link rel="shortcut icon" href="<?php echo base_url() ?>/assets/images/favicon.svg" type="image/x-icon">
    <link rel="icon" type="image/png" href="<?php echo base_url() ?>/assets/images/logo/big-logo.png">
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
    <div class="sidebar-header">
        <div class="d-flex justify-content-between">
            <div class="logo">
                <img src="<?php echo base_url() ?>/assets/images/logo/logo.png" alt="prakit">
            </div>
            <div class="toggler">
                <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
            </div>
        </div>
    </div>
    <div class="sidebar-menu">
        <ul class="menu">
            <li class="sidebar-title">Menu</li>
            
            <li class="sidebar-item ">
                <a href="<?php echo base_url('external/home') ?>" class='sidebar-link'>
                    <i class="bi bi-grid-fill"></i>
                    <span>Dashboard</span>
                </a>
            </li>
        </ul>
    </div>
    <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
</div>
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="../External/index.html" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            

            <div>
                <nav class="navbar navbar-light">
                    <div class="container d-block">
                        <div class="logo">
                            <a onclick="goBack()"><i class="bi bi-chevron-left"></i></a> 
                            <script>
                                function goBack() {
                                    window.history.back();
                                }
                            </script>
                            <a class="navbar-brand ms-5" href="#">
                                Lowongan Kerja Praktek
                            </a>
                        </div>
                    </div>
                </nav>
    <div class="container">
        <div class="card mt-5">
            <div class="card-header text-muted">
                <h5 class="card-title"><?php echo htmlentities($lowongan['nama_perusahaan']) ?></h5>
                <h4><?php echo htmlentities($lowongan['posisi_kp']) ?></h4>
                <body>
                    <p>
                        <b>Requirement :</b>
                        <ol>
                        <?php foreach ($persyaratan as $e) : ?>
                            <li><?php echo htmlentities($e['persyaratan']) ?></li>
                        <?php endforeach ?>
                        </ol>
                        <b>Berkas :</b>
                        <ol>
                            <?php foreach ($berkas as $e) : ?>
                                <li><?php echo htmlentities($e['berkas']) ?></li>
                            <?php endforeach ?>
                        </ol>
                    </p>
                </body>
            </div>
            <div class="page-content">
        
            </div>
        </div>
    </div> 
    

<div class="container">
    <link href="<?php echo base_url() ?>/assets/dataTables/datatables.min.css">
</div>
        <footer class="sticky-footer">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                <span>2021 &copy; Teknologi Informasi</span>
                </div>
            </div>
        </footer>   
    
<script src="<?php echo base_url() ?>/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="<?php echo base_url() ?>/assets/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url() ?>/assets/vendors/apexcharts/apexcharts.js"></script>
<script src="<?php echo base_url() ?>/assets/js/pages/dashboard.js"></script>
<script src="<?php echo base_url() ?>/assets/dataTables/datatables.min.js"></script>

<script src="<?php echo base_url() ?>/assets/js/main.js"></script>
</body>

</html>