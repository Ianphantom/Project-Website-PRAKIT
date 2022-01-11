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
    <div class="container">
        <div class="card mt-5">
            <div class="button text-center">
                <button type="button" class="btn btn-primary ml-1" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"> Upload Berkas </button>
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalCenterTitle">Tambahkan Info KP</h5>
                                    <button type="button" class="close" data-bs-dismiss="modal"
                                        aria-label="Close">
                                        <i data-feather="x"></i>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            <div>
                                                <label class="form-label">Nama Perusahaan</label>
                                                <input type="text" class="form-control" required>
                                            </div>
                                            
                                            <div>
                                                <label class="form-label">Alamat Perusahaan</label>
                                                <input type="text" class="form-control" required>
                                            </div>
                                            
                                            <div>
                                                <label class="form-label">CP</label>
                                                <input type="text" class="form-control" required>
                                            </div>
                                            
                                            <div>
                                                <label class="form-label">Posisi KP</label>
                                                <textarea class="form-control" required></textarea>
                                            </div>
                                            <div>
                                                <label class="form-label">Persyaratan</label>
                                                <textarea class="form-control" required></textarea>
                                            </div>
                                        </form>
                                        <label class="form-label">Input Pmflet/Logo</label>
                                        <section id="input-file-browser">
                                            <input class="form-control" type="file" id="formFile" required>
                                        </section>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light-secondary"
                                            data-bs-dismiss="modal">
                                                <i class="bx bx-x d-block d-sm-none"></i>
                                                <span class="d-none d-sm-block">Close</span>
                                        </button>
                                        <button type="submit" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                                            <i class="bx bx-check d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Submit</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>     

<div class="row">
    <div class="col-sm-6">
        <div class="card">
        <div class="card-body">
            <h3 class="card-title">PT Telkom</h3>
            <p class="card-text">Membutuhkan mahasiswa KP di bagian web developer</p>
            <a href="../External/detail.html" class="btn btn-primary">Tampilkan Detail</a>
        </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card">
        <div class="card-body">
            <h3 class="card-title">Microsoft</h3>
            <p class="card-text">Membutuhkan mahasiswa KP di bagian web developer</p>
            <a href="../External/detail.html" class="btn btn-primary">Tampilkan Detail</a>
        </div>
        </div>
    </div>
</div>

<div class="button text-center">
    <a href="profile.html" class="btn btn-lg btn-success rounded-pill">Submit</a>
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





