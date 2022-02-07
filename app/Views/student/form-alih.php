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
            
            <li class="sidebar-item active">
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
                        <a href="<?php echo base_url('student/pengajuanAlihKredit'); ?>">Pengajuan KP</a>
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
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Pengajuan ALih Kredit</h3>
                <p class="text-subtitle text-muted">Identitas Mahasiswa</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="../student/index.html">Profile</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Identitas Mahasiswa</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <!-- Basic Horizontal form layout section start -->
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <form action="<?php echo base_url() ?>/studentctl/insertingAlihKredit" method="post" enctype='multipart/form-data'>
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Wajib Diisi :</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="form-body">
                                <!-- php error -->
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label>Nama Ketua</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group has-icon-left">
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" name="nama1" disabled value="<?php echo $user['nama'] ?>" placeholder="Name" required
                                                        id="first-name-icon">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-person"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label>NRP</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group has-icon-left">
                                                <div class="position-relative">
                                                    <input type="number" class="form-control" name="nrp1" disabled value="<?php echo $user['nrp'] ?>" placeholder="NRP" required
                                                        id="first-name-icon">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-envelope"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label>Jumlah SKS yang Telah Ditempuh</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group has-icon-left">
                                                <div class="position-relative">
                                                    <input type="number" class="form-control" name="sks1" placeholder="SKS" required>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-phone"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label>Alamat</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group has-icon-left">
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" name="alamat1" placeholder="Place" required>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-lock"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label>Nomor Telepon</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group has-icon-left">
                                                <div class="position-relative">
                                                    <input type="number" class="form-control" name="nomor1" placeholder="Mobile" required>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-phone"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label>Dosen Wali</label>
                                        </div>
                                        <div class="col-md-8">
                                            <!-- <div class="form-group has-icon-left"> -->
                                                <div class="position-relative">
                                                    <select name="doswal" id="lang" class="form-control">
                                                        <?php foreach ($lectures as $lecture){ ?>
                                                            <option value="<?php echo $lecture->id_dosen ?>"><?php echo htmlentities($lecture->nama);?></option>    
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <label class="form-label">Input Surat Pengantar Perusahaan / Penilaian Pembimbing lapangan </label>
                                        <section id="input-file-browser">
                                            <input class="form-control" type="file" name="file" id="formFile" required>
                                        </section>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Wajib Diisi :</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>Nama Perusahaan</label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group has-icon-left">
                                                    <div class="position-relative">
                                                        <input type="text" class="form-control" name="namaPerusahaan" placeholder="Name" required
                                                            id="first-name-icon">
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-person"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label>Alamat Perusahaan</label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group has-icon-left">
                                                    <div class="position-relative">
                                                        <input type="text" class="form-control" name="alamatPerusahaan" placeholder="Place" required
                                                            id="first-name-icon">
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-envelope"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label>Telepon Kantor</label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group has-icon-left">
                                                    <div class="position-relative">
                                                        <input type="number" class="form-control" name="nomorPerusahaan" placeholder="Mobile" required>
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-phone"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label>Nama Wakil Perusahaan</label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group has-icon-left">
                                                    <div class="position-relative">
                                                        <input type="text" class="form-control" name="namaWakilPerusahaan" placeholder="Name" required>
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-person"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label>Deskripsi Pekerjaan</label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group has-icon-left">
                                                    <div class="position-relative">
                                                        <input type="text" class="form-control" name="deskripsi" placeholder="Descriptions" required>
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-stack"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label>Tanggal Pelaksanaan</label>
                                            </div>
                                            <div class="col-md-3 col-6">
                                                <div class="form-group">
                                                    <input name="tanggalMulai" type="date" id="myDate" value="yyyy-mm-dd" required>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <label>Hingga</label>
                                            </div>
                                            <div class="col-md-3 col-6">
                                                <div class="form-group">
                                                    <input name="tanggalSelesai" type="date" id="myDate" value="yyyy-mm-dd">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label>Profil Singkat Perusahaan</label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group has-icon-left">
                                                    <div class="position-relative">
                                                        <input type="text" class="form-control" name="profilPerusahaan" placeholder="Descriptions" re>
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-stack"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="button text-center">
                    <input type="submit" class="btn btn-lg btn-success rounded-pill">
                </div>
            </form>
        </div>
    </section>
    <!-- // Basic Horizontal form layout section end -->
</div>

<footer class="fixed-bottom">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
        <span>2021 &copy; Teknologi Informasi</span>
        </div>
    </div>
</footer>   
        </div>
    </div>
    <script src="../assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    
    <script src="../assets/js/main.js"></script>
    <script>

        function enable(){
            document.getElementById('nama2').disabled = false;
            document.getElementById('sks2').disabled = false;
            document.getElementById('place2').disabled = false;
            document.getElementById('mobile2').disabled = false;
            document.getElementById('doswal2').disabled = false;
            document.getElementById('nrp2').disabled = false;

            document.getElementById('nama2').required = true;
            document.getElementById('sks2').required = true;
            document.getElementById('place2').required = true;
            document.getElementById('mobile2').required = true;
            document.getElementById('doswal2').required = true;
            document.getElementById('nrp2').required = true;
        }

        function disable(){
            document.getElementById('nama2').disabled = true;
            document.getElementById('sks2').disabled = true;
            document.getElementById('place2').disabled = true;
            document.getElementById('mobile2').disabled = true;
            document.getElementById('doswal2').disabled = true;
            document.getElementById('nrp2').disabled = true;

            document.getElementById('nama2').required = false;
            document.getElementById('sks2').required = false;
            document.getElementById('place2').required = false;
            document.getElementById('mobile2').required = false;
            document.getElementById('doswal2').required = false;
            document.getElementById('nrp2').required = false;
        }

        disable();

    </script>
</body>

</html>
