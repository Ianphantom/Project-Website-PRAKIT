<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRAKIT</title>
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(''); ?>/assets/css/bootstrap.css">
    
<link rel="stylesheet" href="<?php echo base_url(''); ?>/assets/vendors/iconly/bold.css">

    <link rel="stylesheet" href="<?php echo base_url(''); ?>/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="<?php echo base_url(''); ?>/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="<?php echo base_url(''); ?>/assets/css/app.css">
    <link rel="shortcut icon" href="<?php echo base_url(''); ?>/assets/images/favicon.svg" type="image/x-icon">
    <link rel="icon" type="image/png" href="<?php echo base_url(''); ?>/assets/images/logo/big-logo.png">
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
    <div class="sidebar-header">
        <div class="d-flex justify-content-between">
            <div class="logo">
                <img src="<?php echo base_url(''); ?>/assets/images/logo/logo.png" alt="prakit">
            </div>
            <div class="toggler">
                <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
            </div>
        </div>
    </div>
    <div class="sidebar-menu">
        <ul class="menu">
            <li class="sidebar-title">Menu</li>
            
            <li class="sidebar-item">
                <a href="<?php echo base_url('lecture/home'); ?>" class='sidebar-link'>
                    <i class="bi bi-grid-fill"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            
            <li class="sidebar-item">
                <a href="<?php echo base_url('lecture/mahasiswakp'); ?>" class='sidebar-link'>
                    <i class="bi bi-stack"></i>
                    <span>Mahasiswa KP</span>
                </a>
            </li>
            
            <li class="sidebar-item active">
                <a href="<?php echo base_url('lecture/penilaian-mhs'); ?>" class='sidebar-link'>
                    <i class="bi bi-collection-fill"></i>
                    <span>Surat Penilaian KP Mahasiswa</span>
                </a>
            </li>
            <li class="sidebar-item ">
                <a href="<?php echo base_url('lecture/logout'); ?>" class='sidebar-link'>
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
                <a href="../lecture/penilaian-mhs.html" class="burger-btn d-block d-xl-none">
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
                    Penilaian Kerja Praktek Mahasiswa
                </a>
            </div>
        </div>
    </nav>

<div class="container">
    <div class="card mt-5">
        <div class="card-header text-muted">
            <h4 class="card-title text-center">Update Nilai:</h4>
        </div>
        <div class="page-content py-3 px-3">
            <form id="laporanForm"  role="form" action="<?php echo base_url() ?>/lecturectl/updatingNilaiAlihKredit" method="post" enctype='multipart/form-data'>
                <div>
                    <label class="form-label"> Nama</label>
                    <input type="text" class="form-control" name="nama" disabled value="<?php echo htmlentities($dataSiswa['nama']) ?>" required>
                </div>
                <div>
                    <label class="form-label"> NRP</label>
                    <input type="text" class="form-control" name="nrp" disabled value="<?php echo htmlentities($dataSiswa['nrp']) ?>" required>
                </div>
                <br>
                <section id="input-file-browser">
                    <label class="form-label"> Total Score</label>
                    <input type="text" class="form-control" name="nilai" value="<?php echo htmlentities($dataNilai['nilai']) ?>"  required>
                </section>
                <br>
                <section id="input-file-browser">
                    <label class="form-label"> Berkas Penilaian</label>
                    <input class="form-control" type="file" name="file" id="formFile" required>
                </section>
                <br>
                <input type="submit" class="btn btn-primary ml-1">
            </form>
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
    
<script src="<?php echo base_url(''); ?>/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="<?php echo base_url(''); ?>/assets/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url(''); ?>/assets/vendors/apexcharts/apexcharts.js"></script>
<script src="<?php echo base_url(''); ?>/assets/js/pages/dashboard.js"></script>


<script src="../assets/js/main.js"></script>
</body>

</html>
