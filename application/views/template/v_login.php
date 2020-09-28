<?php if(!defined('BASEPATH')) exit('No direct script access allowed') ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>RAW Architecture | Admin</title>
    
    <link rel="shortcut icon" href="<?php echo base_url('static/favicon.ico') ?>">

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url('static/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url('static/vendor/metisMenu/metisMenu.min.css') ?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url('static/dist/css/sb-admin-2.css') ?>" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url('static/vendor/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Login</h3>
                    </div>
                    <div class="panel-body">
                        <?php
                        if(isset($_SESSION['notify'])){
                            echo '<div class="alert alert-'.$_SESSION['notify']['type'].' alert-dismissable">'.$_SESSION['notify']['message'].'</div>';
                            unset($_SESSION['notify']);
                        }            
                        ?>
                        <form role="form" action="<?php echo site_url('process/user/login') ?>" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input required="" class="form-control" placeholder="Username" name="uname" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input required="" class="form-control" placeholder="Password" name="pswd" type="password">
                                </div>
                                <!-- <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div> -->
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" value="Login" class="btn btn-lg btn-success btn-block">
                                <!-- <a href="index.html" class="btn btn-lg btn-success btn-block">Login</a> -->
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="<?php echo base_url('static/vendor/jquery/jquery.min.js') ?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url('static/vendor/bootstrap/js/bootstrap.min.js') ?>"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url('static/vendor/metisMenu/metisMenu.min.js') ?>"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url('static/dist/js/sb-admin-2.js') ?>"></script>

</body>

</html>