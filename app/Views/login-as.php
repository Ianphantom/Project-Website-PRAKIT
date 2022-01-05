<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - PRAKIT</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/vendors/bootstrap-icons/bootstrap-icons.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/app.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/pages/auth.css'); ?>">
    <link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.svg'); ?>" type="image/x-icon">
    <link rel="icon" type="image/png" href="<?php echo base_url('assets/images/logo/big-logo.png'); ?>">
</head>

<body>
    <div id="auth">
        
<div class="row h-100">
    <div class="col-lg-5 col-12">
        <div id="auth-left">
            <h2 class="auth-title">Log in as</h2>
            <p class="auth-subtitle mb-3">Choose your role to login!</p>

            <form action="<?php echo base_url() ?>/lecture/login">        
                <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Log in as Lecture</button>
            </form>

            <form action="<?php echo base_url() ?>/student/login">        
                <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Log in as Student</button>
            </form>
        </div>
    </div>
    <div class="col-lg-7 d-none d-lg-block">
        <div id="auth-right">
    </div>
</div>
</body>

</html>
