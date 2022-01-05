<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengajuan KP</title>
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    
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
            
            <li class="sidebar-item ">
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
                <ul class="submenu active">
                    <li class="submenu-item ">
                        <a href="<?php echo base_url('student/pengumpulan-berkas'); ?>">Pengumpulan Laporan</a>
                    </li>
                </ul>
            </li>
            
            <li class="sidebar-item has-sub">
                <a href="../student/profile.html" class='sidebar-link'>
                    <i class="bi bi-person-badge-fill"></i>
                    <span>Profile</span>
                </a>
                <ul class="submenu ">
                    <li class="submenu-item ">
                        <a href="../student/profile.html">Profile</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="../student/pengajuan_kp.html">Pengajuan KP</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="../student/dokumen.html">Unduh Dokumen</a>
                    </li>
                </ul>
            </li>    
        </ul>
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

<div class="page-heading">
    <nav class="navbar navbar-light">
        <div class="inline"> 
            <div class="logo">
                <a onclick="goBack()"><i class="bi bi-chevron-left"></i></a> 
                <script>
                    function goBack() {
                        window.history.back();
                    }
                </script>
                <a class="navbar-brand ms-5" href="../error-500.html">
                    Pengumpulan Berkas Akhir KP
                </a>
            </div>
        </div>
    </nav>
</div>
<?php if($error != ""){ ?>
    <?php foreach($error as $err){ ?>
        <div class="alert alert-danger text-center" role="alert">
            <?php echo htmlentities($err); ?>
        </div>
    <?php } ?>
<?php } ?>

<form id="laporanForm"  role="form" action="<?php echo base_url() ?>/studentctl/insertingLaporan" enctype='multipart/form-data' method="post">
    <div>
        <label class="form-label"> Nama Lengkap</label>
        <input type="text" name="nama" disabled value="<?php echo htmlentities($whoAmI['nama']) ?>" class="form-control" required>
    </div>
        
    <div>
        <label class="form-label"> NRP</label>
        <input type="text" class="form-control" name="nrp" disabled value="<?php echo htmlentities($whoAmI['nrp']) ?>"  required>
    </div>
        
    <div>
        <label class="form-label"> Nama Dosen Wali</label>
        <input type="text" class="form-control" name="doswal" disabled value="<?php echo htmlentities($dosen['nama']) ?>" required>
    </div>
        
    <div>
        <label class="form-label"> Nama Berkas</label>
        <input type="text" class="form-control" name="namaBerkas" required>
    </div>
    <div>
        <label class="form-label"> Keterangan</label>
        <textarea class="form-control" name="keterangan" required></textarea>
    </div>
    <br>
    <section id="input-file-browser">
        <input class="form-control" type="file" name="file" id="formFile" required>
    </section>
    <br>
    <input type="submit" class="btn btn-primary ml-1">
</form>

<!-- <div class="page-content">
    <div class="container">
        <div class="button text-center">
        <button type="button" class="btn btn-lg btn-success rounded-pill" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"> Upload Berkas </button>
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <form id="laporanForm"  role="form" action="<?php echo base_url() ?>/studentctl/insertingLaporan" enctype='multipart/form-data' method="post">
                            <div class="modal-header">
                                <h3 class="modal-title" id="exampleModalCenterTitle">Upload Laporan Akhir KP</h3>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <i data-feather="x"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div>
                                    <label class="form-label"> Nama Lengkap</label>
                                    <input type="text" name="nama" disabled value="<?php echo htmlentities($whoAmI['nama']) ?>" class="form-control" required>
                                </div>
                                    
                                <div>
                                    <label class="form-label"> NRP</label>
                                    <input type="text" class="form-control" name="nrp" disabled value="<?php echo htmlentities($whoAmI['nrp']) ?>"  required>
                                </div>
                                    
                                <div>
                                    <label class="form-label"> Nama Dosen Wali</label>
                                    <input type="text" class="form-control" name="doswal" disabled value="<?php echo htmlentities($dosen['nama']) ?>" required>
                                </div>
                                    
                                <div>
                                    <label class="form-label"> Nama Berkas</label>
                                    <input type="text" class="form-control" name="namaBerkas" required>
                                </div>
                                <div>
                                    <label class="form-label"> Keterangan</label>
                                    <textarea class="form-control" name="keterangan" required></textarea>
                                </div>
                                <br>
                                <section id="input-file-browser">
                                    <input class="form-control" type="file" name="file" id="formFile" required>
                                </section>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                    <i class="bx bx-x d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Close</span>
                                </button>
                                <input type="submit" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->

<footer class="sticky-footer fixed-bottom">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
        <span>2021 &copy; Teknologi Informasi</span>
        </div>
    </div>
</footer>
<script src="../assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="../assets/js/bootstrap.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="../assets/js/main.js"></script>
</body>

</html>





