<!-- <!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login Portal Berita Labusel</title>
  <link rel="shortcut icon" href="<?php echo base_url(); ?>design/login/assets/images/news.png" type="image/x-icon">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&display=swap" rel="stylesheet">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>design/login/assets/images/fav.jpg">
  <link rel="stylesheet" href="<?php echo base_url(); ?>design/login/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>design/login/assets/css/all.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>design/login/assets/css/animate.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>design/login/assets/plugins/slider/css/owl.carousel.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>design/login/assets/plugins/slider/css/owl.theme.default.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>design/login/assets/css/style.css" />
</head>

<body class="form-login-body"> 
  <div class="container">
    <div class="row">
      <div class="col-lg-10 mx-auto login-desk">
       <div class="row">
        <div class="col-md-6 loginform">
          <img src="<?php echo base_url(); ?>design/login/assets/images/bg05.jpg" alt="">
        </div>
        <div class="col-md-5 detail-box">
          <form class="form-login" action="<?php echo base_url('Auth/login'); ?>" method="POST">
            <div class="detailsh col-lg-8 col-md-10 col-sm-7 col-11 mx-auto">
              <img class="logo" src="<?php echo base_url(); ?>design/login/assets/images/news.png" alt=""> 

              <div class="row form-ro no-margin">
                <input style="border-radius: 10px;" type="text" name="username" placeholder="Username" class="form-control form-control-sm">
              </div>

              <div class="row form-ro no-margin">
                <input style="border-radius: 10px;" type="password" name="password" placeholder="Password" class="form-control form-control-sm">
              </div>

              <div class="row form-ro no-margin">
                <div class="col-12">
                  <button class="btn btn-sm btn-primary">Sign In</button>
                </div>
              </div>
              <div class="row form-ro hlio fgbh">
                <p style="color: #42BD75">
                  <?php
                  echo show_err_msg($this->session->flashdata('error_msg'));
                  ?>
                </p>
                <div class="col-md-14">
                  <p><b>Pemerintah Kabupaten Labuhanbatu Selatan</b></p>
                </div>
                
              </div>
            </div>
          </form>
        </div>
      </div>

    </div>
  </div>
</div>
</body>

<script src="<?php echo base_url(); ?>design/login/assets/js/jquery-3.2.1.min.js"></script>
<script src="<?php echo base_url(); ?>design/login/assets/js/popper.min.js"></script>
<script src="<?php echo base_url(); ?>design/login/assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>design/login/assets/plugins/scroll-fixed/jquery-scrolltofixed-min.js"></script>
<script src="<?php echo base_url(); ?>design/login/assets/plugins/slider/js/owl.carousel.min.js"></script>
<script src="<?php echo base_url(); ?>design/login/assets/js/script.js"></script>
</html> -->

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Letter - Simple Sign Up Form</title>
<!-- 

Letter Template 

https://templatemo.com/tm-510-letter



Template Re-distribution is NOT allowed.

-->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400">  <!-- Google web font "Open Sans" -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/bootstrap.min.css">
  
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/demo.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/templatemo-style.css">
  
  <script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/modernizr.custom.86080.js"></script>
    
  </head>

  <body>

      <div id="particles-js"></div>
    
      <ul class="cb-slideshow">
              <li></li>
              <li></li>
              <li></li>
              <li></li>
              <li></li>
              <li></li>
          </ul>

      <div class="container-fluid">
        <div class="row cb-slideshow-text-container ">
          <div class= "tm-content col-xl-6 col-sm-8 col-xs-8 ml-auto section">
          <header class="mb-5"><h1>Login Form</h1></header>
          <P class="mb-5">Telah memiliki akun, Silahkan login untuk melakukan upload berita.</P>
          
                    <form action="<?php echo base_url('Auth/login'); ?>" method="post" class="subscribe-form">
                      <div class="row form-section">

                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <input name="username" type="text" class="form-control" id="username" placeholder="Username" required/>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <input name="password" type="password" class="form-control" id="password" placeholder="Password" required/>
                        </div>
                        <div style="margin-top: 20px;" class="col-md-12 col-sm-12 col-xs-12">
                          <button type="submit" class="tm-btn-subscribe">Login</button>
                        </div>
                      
                      </div>
                    </form>
                    
          <!-- <div class="tm-social-icons-container text-xs-center">
                      <a href="#" class="tm-social-link"><i class="fa fa-facebook"></i></a>
                      <a href="#" class="tm-social-link"><i class="fa fa-google-plus"></i></a>
                      <a href="#" class="tm-social-link"><i class="fa fa-twitter"></i></a>
                      <a href="#" class="tm-social-link"><i class="fa fa-linkedin"></i></a>
                  </div> -->

          </div>
        </div>  
        <div class="footer-link">
          <p>Copyright © 2021 Portal Berita 
                    
                    - Design: <a href="http://diskominfo.labuhanbatuselatankab.go.id/">Diskominfo</a></p>
        </div>
      </div>  
  </body>

  <script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/particles.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/app.js"></script>
</html>