<!DOCTYPE html>

<html lang="en">



<head>



    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">

    <meta name="author" content="Rumah AITI">



    <title>Login - SMP IT Bengkulu</title>



    <!-- Bootstrap Core CSS -->

    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/bootstrap.min.css'); ?>" type="text/css">



    <!-- Custom Fonts -->

    <!-- <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'> -->

    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/font-awesome/css/font-awesome.min.css'); ?>" type="text/css">



    <!-- Plugin CSS -->

    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/animate.min.css'); ?>" type="text/css">



    <!-- Custom CSS -->

    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/creative.css'); ?>" type="text/css">



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

            <form action="<?php echo base_url('login/cek_login');?>" method="post">

                <div class="login text-center">

                    <h1 class="login-title">Login Admin</h1>

                    <a href="" class="login-img hvr-pulse-shrink">

                        <img src="<?php echo base_url('assets/frontend/images/logo.jpg'); ?>" style="width:200px">

                    </a>

                    <?=$this->session->flashdata('notif')?>

                    <div class="login-btn">

    			    	<div class="form-group">

                            <div class="iconic-input">

                                <i class="fa fa-user"></i>

                                <input name="username" type="text" class="form-control" placeholder="Username">

                            </div>            

                        </div>

                        <div class="form-group">

                            <div class="iconic-input">

                                <i class="fa fa-key"></i>

                                <input name="password" type="password" class="form-control" placeholder="Password">

                            </div>            

                        </div>

                        <div class="form-group">

                            <button type="submit" class="btn btn-primary btn-lg btn-block">Login</button>

                        </div>

    			    	<a href=""><i class="fa fa-chevron-left"></i> Kembali ke halaman utama</a>

    			    </div>

    		    </div>

            </form>

	    </div>

	</div>

    <!-- jQuery -->

    <!-- jQuery -->

    <script src="<?php echo base_url('assets/frontend/js/jquery.js');?>"></script>



    <!-- Bootstrap Core JavaScript -->

    <script src="<?php echo base_url('assets/frontend/js/bootstrap.min.js');?>"></script>



    <!-- Plugin JavaScript -->

    <script src="<?php echo base_url('assets/frontend/js/jquery.easing.min.js');?>"></script>

    <script src="<?php echo base_url('assets/frontend/js/wow.min.js');?>"></script>

</body>



</html>

