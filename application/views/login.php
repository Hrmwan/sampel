<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>

        <!-- <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script> -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?= base_url('assets/login-new/css/custom.css') ?>">
        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="<?= base_url('assets/login-new/ico/favicon.png') ?>">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.0/dist/sweetalert2.min.css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.0/dist/sweetalert2.all.min.js"></script>

    </head>

    <body>
        <div class="container ">
            <div class="row">            
                <div class="login-container col-lg-4 col-md-6 col-sm-8 col-xs-12">
                     <div class="login-title text-center">
                            <h2><span>PT.  <strong>HARKOVNET INDONESIA</strong></span></h2>
                     </div>
                    <div class="login-content">
                        <div class="login-header ">
                            <h3><strong>Selamat Datang,</strong></h3>
                            <h5>Sistem cuti karyawan, gunakan cuti untuk keperluan mendesak dan gunakan dengan penuh tanggung jawab !!!</h5>
                        </div>
                        <div class="login-body">
                            <form role="form" action="<?= site_url('auth/login'); ?>" method="post" class="login-form">
                                <div class="form-group ">
                                    <div class="pos-r">                                        
                                        <input   id="form-username" type="email" name="email" placeholder="Username..." class="form-username form-control">
                                        <i class="fa fa-user"></i>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="pos-r">                                    
                                        <input id="form-password" type="password" name="password" placeholder="Password..." class="form-password form-control" >
                                        <i class="fa fa-lock"></i>                                        
                                    </div>
                                </div>
                                <div class="form-group">     
                                    <button type="submit" class="btn btn-primary form-control"><strong>Sign in</strong></button>  
                                </div>   
                                                                              
                        

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <script>
            // Check for success message
            <?php if ($this->session->flashdata('success')) : ?>
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: '<?php echo $this->session->flashdata('success'); ?>',
                    showConfirmButton: false,
                    timer: 2000 // Duration in milliseconds
                });
            <?php endif; ?>

            // Check for error message
            <?php if ($this->session->flashdata('error')) : ?>
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: '<?php echo $this->session->flashdata('error'); ?>',
                    showConfirmButton: false,
                    timer: 2000 // Duration in milliseconds
                });
            <?php endif; ?>
        </script>

    </body>

</html>
