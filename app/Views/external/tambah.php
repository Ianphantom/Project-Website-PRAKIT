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
    <?php if($error != ""){ ?>
        <?php foreach($error as $err){ ?>
            <div class="alert alert-danger text-center" role="alert">
                <?php echo htmlentities($err); ?>
            </div>
        <?php } ?>
    <?php } ?>
        <div class="card mt-5">
            <div class="container">  
                <br />  
                <br />  
                <h2 align="left">Tambah info lowongan KP</h2>  
                <div class="form-group">  
                     <form id="lowonganForm"  role="form" action="<?php echo base_url() ?>/externalctl/insertingLowongan" method="post" enctype='multipart/form-data'>  
                          <div class="table-responsive"> 
                                <section id="input-file-browser">
                                    <label class="form-label"> Nama Perusahaan</label>
                                    <input type="text" class="form-control" name="perusahaan" required>
                                </section> 
                                <section id="input-file-browser">
                                    <label class="form-label"> Alamat Perusahaan</label>
                                    <input type="text" class="form-control" name="alamat" required>
                                </section>
                                <section id="input-file-browser">
                                    <label class="form-label"> Contact Person</label>
                                    <input type="text" class="form-control" placeholder="Ian : 053119400008 | Felix : iafelix22 (id_line)" name="contact" required>
                                </section>  
                                <section id="input-file-browser">
                                    <label class="form-label"> Posisi KP</label>
                                    <input type="text" class="form-control" name="posisi" required>
                                </section> 
                                <section id="input-file-browser">
                                    <label class="form-label"> Poster/pamflet</label>
                                    <input class="form-control" type="file" name="file" id="formFile" required>
                                </section>
                                <br>
                                <section>
                                    <label class="form-label"> Persyaratan</label>
                                    <table class="table table-bordered" id="dynamic_field">  
                                        <tr>  
                                             <td><input type="text" name="name[]" placeholder="Masukkan Persyaratan" class="form-control name_list" /></td>  
                                             <td><button type="button" name="add" id="add" class="btn btn-primary">Tambah Persyaratan</button></td>  
                                        </tr>  
                                    </table>  
                                </section>
                                <section>
                                    <label class="form-label"> Berkas</label>
                                    <table class="table table-bordered" id="dynamic_field2">  
                                        <tr>  
                                             <td><input type="text" name="berkas[]" placeholder="Masukkan Berkas" class="form-control name_list" /></td>  
                                             <td><button type="button" name="addBerkas" id="addBerkas" class="btn btn-primary">Tambah Berkas</button></td>  
                                        </tr>  
                                    </table>  
                                </section>
                               <input type="submit" name="submit" id="submit" class="btn btn-primary" value="Submit" />  
                          </div>  
                     </form>  
                </div>  
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="../assets/js/main.js"></script>
    <script>  
        $(document).ready(function(){  
             var i=1;  
             $('#add').click(function(){  
                  i++;  
                  $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="name[]" placeholder="Masukkan Persyaratan" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
             });  
             $(document).on('click', '.btn_remove', function(){  
                  var button_id = $(this).attr("id");   
                  $('#row'+button_id+'').remove();  
             });  

             var j=1;  
             $('#addBerkas').click(function(){  
                  i++;  
                  $('#dynamic_field2').append('<tr id="row2'+i+'"><td><input type="text" name="berkas[]" placeholder="Masukkan Berkas" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove2">X</button></td></tr>');  
             });  
             $(document).on('click', '.btn_remove2', function(){  
                  var button_id = $(this).attr("id");   
                  $('#row2'+button_id+'').remove();  
             });  
        });  
        </script>
</body>

</html>





