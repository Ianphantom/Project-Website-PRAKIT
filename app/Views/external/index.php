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
                    Info Lowongan Kerja Praktek
                </a>
            </div>
        </div>
    </nav>
</div>

<div class="page-content">
    <div>
        <div class="card mt-5">
            <div class="button text-center">
                <a type="button" class="btn btn-primary ml-1" href="<?php echo base_url('external/tambah') ?>"> Tambahkan Info Lowongan KP </a>
            </div>
        </div>     
    </div>
</div>

    <footer class="sticky-footer">
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
</body>

</html>





