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
            
            <li class="sidebar-item active">
                <a href="<?php echo base_url('admin/home'); ?>" class='sidebar-link'>
                    <i class="bi bi-grid-fill"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            
            <li class="sidebar-item">
                <a href="<?php echo base_url('admin/suratpengajuanmahasiswa'); ?>" class='sidebar-link'>
                    <i class="bi bi-stack"></i>
                    <span>Mahasiswa KP</span>
                </a>
            </li>
            <li class="sidebar-item ">
                <a href="<?php echo base_url('admin/logout'); ?>" class='sidebar-link'>
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
                <a href="../lecture/all-mahasiswa.html" class="burger-btn d-block d-xl-none">
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
                                Mahasiswa KP
                            </a>
                        </div>
                    </div>
                </nav>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" style="text-align: center;" placeholder="Search data" aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <button type="submit" class="btn btn-primary">Search</button>
                  </div>

    <div class="container">
        <div class="card mt-5">
            <div class="page-content">
                <table>
                    <tr>
                        <th rowspan="1">No.</th>
                        <th rowspan="1">Nama</th>
                        <th rowspan="1">NRP</th>
                        <th rowspan="1">Dosen Wali</th>
                        <th rowspan="1">Status (Melakukan pengajuan/Sudah Mendapatkan Surat Pengantar/Berkas sudah Lengkap)</th>
                        <th rowspan="1">Berkas Akhir</th>
                    </tr>
                    <?php
                        $i = 0;  
                        foreach ($data1 as $e) : $i++;?>
                        <tr>
                            <td><?php echo htmlentities($i) ?></td>
                            <td><?php echo htmlentities($e->nama_siswa) ?></td>
                            <td><?php echo htmlentities($e->nrp) ?></td>
                            <td><?php echo htmlentities($e->nama_dosen) ?></td>
                            <td>
                                <?php 
                                    if($e->status == "KP Submission" || $e->status == "Pengajuan KP"){
                                        echo "Melakukan pengajuan";
                                    }else if($e->status == "ON PROGRESS"){
                                        echo "Sudah Mendapatkan Surat Pengantar";
                                    }else if($e->status == "FINISHED"){
                                        echo "Berkas Sudah Lengkap";
                                    }
                                ?>
                            </td>
                            <td>
                                <?php 
                                    if($e->status == "FINISHED"){ ?>
                                        <a type="button" href="#" class="btn btn-outline-primary block">Show</a>  
                                <?php }else{
                                    echo "-";
                                } ?>
                            </td>
                        </tr>
                    <?php endforeach ?>
                    <?php
                        $i = 0;  
                        foreach ($data2 as $e) : $i++;?>
                        <tr>
                            <td><?php echo htmlentities($i) ?></td>
                            <td><?php echo htmlentities($e->nama_siswa) ?></td>
                            <td><?php echo htmlentities($e->nrp) ?></td>
                            <td><?php echo htmlentities($e->nama_dosen) ?></td>
                            <td>
                                <?php 
                                    if($e->status_kp == "KP Submission" || $e->status_kp == "Pengajuan KP"){
                                        echo "Melakukan pengajuan";
                                    }else if($e->status_kp == "ON PROGRESS"){
                                        echo "Sudah Mendapatkan Surat Pengantar";
                                    }else if($e->status_kp == "FINISHED"){
                                        echo "Berkas Sudah Lengkap";
                                    }
                                ?>
                            </td>
                            <td>
                                <?php 
                                    if($e->status_kp == "FINISHED"){ ?>
                                        <a type="button" href="#" class="btn btn-outline-primary block">Show</a>  
                                <?php }else{
                                    echo "-";
                                } ?>
                            </td>
                        </tr>
                    <?php endforeach ?>
                    <!-- <tr>
                        <td>2</td>
                        <td>Desya</td>
                        <td>05311840000046</td>
                        <td>M. Husni</td>
                        <td>Sudah Mendapatkan surat pengantar</td>
                        <td>
                            <a type="button" href="../ITAdmin/berkas.html" class="btn btn-outline-primary block">Show</a>
                        </td>
                    </tr> -->
                </table>
            </div>
        </div>
    </div> 
    

<div class="container">
    <link href="../assets/dataTables/datatables.min.css">
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
<script src="../assets/dataTables/datatables.min.js"></script>

<script src="../assets/js/main.js"></script>
</body>

</html>