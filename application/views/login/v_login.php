<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <title>Halaman Login</title>

    <!-- Favicons -->
    <link href="<?php echo base_url() ?>assets_login/img/grj.png" rel="icon">
    <link href="<?php echo base_url() ?>assets_login/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url() ?>assets_login/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!--external css-->
    <link href="<?php echo base_url() ?>assets_login/lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url() ?>assets_login/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets_login/css/style-responsive.css" rel="stylesheet">

    <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>
    <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
    <div id="login-page">
        <div class="container">
            <form class="form-login" method="post" action="<?= base_url('login/login_aksi'); ?>">
                <h2 class="form-login-heading">Silahkan Login</h2>
                <div class="login-wrap">
                    <input type="text" class="form-control form-control-user" id="username" name="username" autocomplete="off" autofocus placeholder="Masukan Username" <?= set_value('username'); ?>>
                    <br>

                    <div class="form-group">
                        <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">

                    </div>
                    <button class="btn btn-theme btn-block" type="submit" name="login"><i class="fa fa-lock"></i> Masuk</button>
                    <hr>
                </div>
        </div>
        <!-- Modal -->
        <!-- modal -->
        </form>
    </div>
    </div>
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url() ?>assets_login/lib/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>assets_login/lib/bootstrap/js/bootstrap.min.js"></script>
    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="<?php echo base_url() ?>assets_login/lib/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("<?php echo base_url() ?>assets_login/img/bc.jpg", {
            speed: 500
        });
    </script>
</body>

</html>