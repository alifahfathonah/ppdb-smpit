<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="Error 404">
  <meta name="author" content="Rumah AiTi">

  <title><?php echo $title; ?></title>
  <style type="text/css">
  	a{-webkit-transition: all .35s;-moz-transition: all .35s;transition: all .35s;}
  	body{background:#204044;font-family: sans-serif;}
  	section{display: table;}
  	.container{width: 400px; margin: 100px auto}
  	h2{text-align: center;margin:30px auto 50px;color: #fff;}
  	.tombol{text-align: center;}
  	.back-btn{color: #037AA8;text-transform: uppercase;font-size: 14px;padding: 6px 24px;border-width: 1px;border-style: solid;border-color: #037AA8; text-decoration: none}
  	.back-btn:hover{color: #fff; border-color: #fff}
  	.credit{text-align: center;margin-top: 100px;border-top: 1px solid #eee;padding: 10px;}
  	.credit a{color: #037AA8; text-decoration: none;}
  	.credit a:hover{color: #fff}
  	small{color: #fff}
  	@media(max-width:500px) {
  		img{width: 100%;}
  		.container{width: 100%;text-align: center;}
  	}
  </style>
</head>

<body>
    <div class="container ">
        <section class="error-wrapper text-center">
            <img alt="" src="<?php echo base_url('assets/frontend/images/404.png'); ?>">
            <h2>Oops. . . Page Not Found !</h2>
            <div class="tombol">
            	<a href="<?php echo base_url(); ?>" class="back-btn"> Kembali kehalaman Utama</a><br/>
            </div>
            <div class="credit">
            	<small>&copy; Copyright 2016. Powered by <a href="http://www.rumah-aiti.com">Rumah AITI</a></small>
            </div>
        </section>
    </div>

<!-- Placed js at the end of the document so the pages load faster -->
<script src="<?php echo base_url('assets/js/jquery-1.10.2.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/jquery-migrate-1.2.1.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/modernizr.min.js'); ?>"></script>

</body>
</html>