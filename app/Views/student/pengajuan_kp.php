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
            
            <li class="sidebar-item">
                <a href="<?php echo base_url('student/logbook'); ?>" class='sidebar-link'>
                    <i class="bi bi-stack"></i>
                    <span>Logbook</span>
                </a>
            </li>
            
            <li class="sidebar-item">
                <a href="<?php echo base_url('student/pengumpulan-berkas'); ?>" class='sidebar-link'>
                    <i class="bi bi-collection-fill"></i>
                    <span>Reports</span>
                </a>
            </li>
            
            <li class="sidebar-item active has-sub">
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
        </ul>

        <li class="sidebar-item ">
            <a href="<?php echo base_url('student/logout'); ?>" class='sidebar-link'>
                <i class="bi bi-box-arrow-right"></i>
                <span>Logout</span>
            </a>
        </li>

    </div>
    <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
</div>
    </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
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
                    Data Pengajuan Kerja Praktek
                </a>
            </div>
        </div>
    </nav>
</div>
<div class="container">
    <div class="card mt-5">
        <div class="card mt-3">
            <div class="button text-center">
                <a href="../student/form-kp.html" class="btn btn-lg btn-success rounded-pill">Buat Pengajuan</a>
            </div>
        </div>
        <div class="page-content">
            <table>
                <tr>
                    <th rowspan="1">Tanggal Pengajuan</th>
                    <th rowspan="1">Keperluan</th>
                    <th rowspan="1">Status</th>
                    <th rowspan="1">Cetak Surat</th>
                </tr>
                <tr>
                    <td><?php echo htmlentities($kp['tanggal_pengajuan']) ?></td>
                    <td>Pengajuan Kerja Praktek</td>
                    <td>
                        <?php if($kp['status'] == "Pengajuan KP"){
                            echo htmlentities('DALAM PROSES');
                        }else if($kp['status'] == "KP Submission"){
                            echo htmlentities('BELUM UPLOAD BERKAS');
                        }else if($kp['status'] == "ON PROGRESS"){
                            echo htmlentities('DISETUJUI');
                        } ?>
                    </td>
                    <td>
                        <?php if($kp['status'] == "ON PROGRESS"){ ?>
                            <div type="button" class="btn btn-outline-primary block">Surat Pengantar KP</div>
                        <?php }else{
                            echo htmlentities("-");
                        } ?>
                    </td>
                </tr>
                <!-- <tr>
                    <td>31-12-2021</td>
                    <td>Pengajuan Alih Kredit</td>
                    <td>DALAM PROSES</td>
                    <td> - </td>
                </tr> -->
            </table>
        </div>
    </div>
</div>

</div>

<footer class="sticky-footer fixed-bottom ">
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
