<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LectureLogin - PRAKIT</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/app.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/pages/auth.css">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>/assets/images/favicon.svg" type="image/x-icon">
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>/assets/images/logo/big-logo.png">
</head>

<body>
    <div id="auth">
        
<div class="row h-100">
    <div class="col-lg-5 col-12">
        <div id="auth-left">
            <div class="auth-logo">
                <a href="index.html"><img src="<?php echo base_url(); ?>/assets/images/logo/logo.png" alt="Logo"></a>
            </div>
            
            <h3 class="auth-title" style="color: whitesmoke;">Log In as Lecture</h3>
            <?php if(!empty(session()->getFlashdata('success'))){?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success! </strong><?php echo htmlentities(session()->getFlashdata('success')); ?>
                </div>
            <?php } ?>
            <?php if(!empty(session()->getFlashdata('fail'))){?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Sorry! </strong><?php echo htmlentities(session()->getFlashdata('fail')); ?>
                </div>
            <?php } ?>
            <p class="auth-subtitle mb-3">Log in with your data that you entered during registration.</p>

            <form action="<?php echo base_url() ?>/lecturectl/loggingaccount" method="post">
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="text" class="form-control form-control-xl" name="email" placeholder="Email">
                    <div class="form-control-icon">
                        <i class="bi bi-envelope"></i>
                    </div>
                </div>
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="password" class="form-control form-control-xl" name="password" placeholder="Password">
                    <div class="form-control-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                </div>
                <div class="form-check form-check-lg d-flex align-items-end">
                    <input class="form-check-input me-2" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label text-gray-600" for="flexCheckDefault">
                        Keep me logged in
                    </label>
                </div>
                <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Log in as Lecture</button>
            </form>
            <div class="text-center mt-5 text-lg fs-4">
                <p class="text-gray-600">Don't have an account? <a href="<?php echo base_url('lecture/register'); ?>" style="color: cyan; text-decoration: underline;" class="font-bold">Sign
                        up</a>.</p>
                <p><a class="font-bold" href="auth-forgot-password.html" style="color: tomato; text-decoration: underline;" >Forgot password?</a>.</p>
            </div>
        </div>
    </div>
    <div class="col-lg-7 d-none d-lg-block">
        <div id="auth-right">

        </div>
    </div>
</div>

    </div>
</body>

</html>
