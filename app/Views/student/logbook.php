<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PRAKIT</title>
        
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../assets/css/bootstrap.css">
        
    <link rel="stylesheet" href="../assets/vendors/iconly/bold.css">
    
        <link rel="stylesheet" href="../assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
        <link rel="stylesheet" href="../assets/vendors/bootstrap-icons/bootstrap-icons.css">
        <link rel="stylesheet" href="../assets/css/app.css">
        <link rel="shortcut icon" href="../assets/images/favicon.svg" type="image/x-icon">
        <link rel="icon" type="image/png" href="../assets/images/logo/big-logo.png">
    </head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
    <div class="sidebar-header">
        <div class="d-flex justify-content-between">
            <div class="logo">
                <img src="../assets/images/logo/logo.png" alt="prakit">
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
                <a href="<?php echo base_url('student/home'); ?>" class='sidebar-link'>
                    <i class="bi bi-grid-fill"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            
            <li class="sidebar-item active">
                <a href="<?php echo base_url('student/logbook'); ?>" class='sidebar-link'>
                    <i class="bi bi-stack"></i>
                    <span>Logbook</span>
                </a>
            </li>
            
            <li class="sidebar-item  has-sub ">
                <a href="<?php echo base_url('student/pengumpulan-berkas'); ?>" class='sidebar-link'>
                    <i class="bi bi-collection-fill"></i>
                    <span>Reports</span>
                </a>
                <ul class="submenu ">
                    <li class="submenu-item ">
                        <a href="<?php echo base_url('student/pengumpulan-berkas'); ?>">Pengumpulan Laporan</a>
                    </li>
                </ul>
            </li>
            
            <li class="sidebar-item has-sub">
                <a href="<?php echo base_url('student/profile'); ?>" class='sidebar-link'>
                    <i class="bi bi-person-badge-fill"></i>
                    <span>Profile</span>
                </a>
                <ul class="submenu ">
                    <li class="submenu-item ">
                        <a href="<?php echo base_url('student/profile'); ?>">Profile</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="<?php echo base_url('student/pengajuanKP'); ?>">Pengajuan KP</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="<?php echo base_url('student/dokumen'); ?>">Unduh Dokumen</a>
                    </li>
                </ul>
            </li>  
            
            <li class="sidebar-item ">
                <a href="<?php echo base_url('student/logout'); ?>" class='sidebar-link'>
                    <i class="bi bi-box-arrow-right"></i>
                    <span>Logout</span>
                </a>
            </li>
            
        </ul>
    </div>
    <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
</div>
    </div>
        <div id="main">
            <header class="mb-3">
                <a href="../student/logbook.html" class="burger-btn d-block d-xl-none">
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
                <a class="navbar-brand ms-5" href="../error-500.html">
                    Logbook
                </a>
            </div>
        </div>
    </nav>
</div>
<section id="basic-horizontal-layout">
    <form action="<?php echo base_url() ?>/studentctl/insertingLogbook" enctype='multipart/form-data' method="post">
        <?php if($error != ""){ ?>
            <?php foreach($error as $err){ ?>
                <div class="alert alert-danger text-center" role="alert">
                    <?php echo htmlentities($err); ?>
                </div>
            <?php } ?>
        <?php } ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">File Input</h4>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group row align-items-center">
                                    <div class="col-lg-4 col-md-12">
                                        <label>Tanggal</label>
                                    </div>
                                    <div class="col-lg-6 col-md-20">
                                        <div class="form-group">
                                            <input type="date" name="tanggal" id="myDate" value="yyyy-mm-dd" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row align-items-center">
                                    <div class="col-lg-4 col-md-12">
                                        <label class="col-form-label">Deskripsi Kegiatan</label>
                                    </div>
                                    <div class="col-lg-6 col-md-20">
                                        <input type="text" id="first-name" class="form-control" name="deskripsi" placeholder="Description">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-14">
                                    <div class="mb-3">
                                        <input class="form-control" type="file" name="file" id="formFile">
                                        <label for="formFile" class="form-label text-muted ">Upload Foto</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="button text-center">
            <button id="top-center" class="btn btn-outline-primary btn-block btn-lg">Submit</button>
        </div>
    </form>
</section>

<div class="container">
    <div class="card mt-5">
        <div class="page-content">
            <table>
                <tr>
                    <th rowspan="1">Tanggal</th>
                    <th rowspan="1">Deskripsi Kegiatan</th>
                    <th rowspan="1">Bukti Kegiatan</th>
                </tr>
                <?php foreach($logbook as $log){ ?>
                    <tr>
                        <td><?php echo htmlentities($log['tanggal']) ?></td>
                        <td><?php echo htmlentities($log['deskripsi_kegiatan']) ?></td>
                        <td><a target="_blank" href="<?php echo base_url('assets/logbook/'.htmlentities($log['file'])) ?>"><div type="button" class="btn btn-outline-primary block">Foto Kegiatan</div></a></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>  

</div>

<footer class="sticky-footer fixed-bottom">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
        <span>2021 &copy; Teknologi Informasi</span>
        </div>
    </div>
</footer>      

<script src="../assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="../assets/js/bootstrap.bundle.min.js"></script>
<script src="../assets/vendors/apexcharts/apexcharts.js"></script>
<script src="../assets/js/pages/dashboard.js"></script>


<script src="../assets/js/main.js"></script>
</body>

</html>
