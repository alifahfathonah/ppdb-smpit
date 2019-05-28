<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SMP IT Bengkulu</title>

    <meta name="author" content="Rumah AITI">

    <meta name="description" content="SMP IT IQRO' Kota Bengkulu">

    <meta name="keyword" content="Kota bengkulu, SMP IT, ">
    <link rel="shortcut icon" href="<?php echo base_url('assets/backend/images/logo_aiti.png');?>" type="image/png">

    <!-- Bootstrap Core CSS -->

    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/bootstrap.min.css'); ?>" type="text/css">

    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/font-awesome/css/font-awesome.min.css'); ?>" type="text/css">

    <!-- Plugin CSS -->

    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/animate.min.css'); ?>" type="text/css">

    <!-- Custom CSS -->

    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/creative.css'); ?>" type="text/css">

    <link href="<?php echo base_url('assets/frontend/css/skdslider.css'); ?>" rel="stylesheet">

    <link href="<?php echo base_url()."assets/frontend/css/magnific-popup.css";?>" rel="stylesheet">

    <link href="<?php echo base_url()."assets/frontend/css/camera.css";?>" type="text/css" media="all" rel="stylesheet" id="camera-css">

    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/bootstrap-fileupload.min.css'); ?>" type="text/css">

    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/jquery-ui.css'); ?>" type="text/css">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <!--[if lt IE 9]>

        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js');?>"></script>

        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js');?>"></script>

    <![endif]-->
    <style>    
    #prog{ position:relative; width:400px; border: 1px solid #ddd; padding: 1px; border-radius: 3px; }
    #bar { background-color: #B4F5B4; width:0%; height:20px; border-radius: 3px; }
    #percent { text-align: center; font-weight: bold; }
    .hide{display:none;}
    </style>

</head>

<body>

    <div class="container">

        <div class="row">

            <div class="col-lg-12 wrapper">

                <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">

                    <div class="container-fluid">

                        <div class="navbar-header">

                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">

                                <span class="sr-only">Toggle navigation</span>

                                <span class="icon-bar"></span>

                                <span class="icon-bar"></span>

                                <span class="icon-bar"></span>

                            </button>

                            <a class="" href="<?php echo base_url();?>">

                                <img src="<?php echo base_url('assets/frontend/images/logo.png'); ?>">

                            </a>

                        </div>

                        <div class="collapse navbar-collapse" id="navbar">

                            <ul class="nav navbar-nav navbar-right kanan">

                                <li><a class="page-scroll" href="<?php echo base_url();?>">Home</a></li>

                                <li class="dropdown">

                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"> Profil <span class="caret"></span> </a> 

                                    <ul class="dropdown-menu">
                                        <li><a href="<?php echo base_url('home/sekolah');?>">Sekolah</a></li>
                                        <li><a href="<?php echo base_url('home/kesiswaan');?>">Kesiswaan</a></li>
                                        <li><a href="<?php echo base_url('home/kurikulum');?>">Kurikulum</a></li>
                                        <li><a href="<?php echo base_url('home/sarana');?>">Sarana Prasarana</a></li>
                                        <li><a href="<?php echo base_url('home/guru');?>">Guru</a></li>
                                        <li><a href="<?php echo base_url('home/prestasi');?>">Prestasi</a></li>
                                        <li><a href="<?php echo base_url('home/Alumni');?>">Alumni</a></li>

                                    </ul>

                                </li>

                                <li><a class="page-scroll" href="<?php echo base_url('home/kontak');?>">Kontak</a></li>

                            </ul>

                        </div>

                    </div>

                </nav>

                <?php $this->load->view($isi);?>

                <footer>

                    <div class="copyright">

                        2016 © SMP IT Kota Bengkulu by <a href="http://rumah-aiti.com">Rumah AITI</a>

                    </div>

                </footer>

            </div>

        </div>

    </div>

    <!-- jQuery -->

    <script src="<?php echo base_url('assets/frontend/js/jquery.js');?>"></script>
    <script src="<?php echo base_url('assets/frontend/js/jquery.form.min.js');?>"></script>
    <script src="<?php echo base_url('assets/frontend/js/progress_pendaftaran.js');?>"></script>

    <!-- Bootstrap Core JavaScript -->

    <script src="<?php echo base_url('assets/frontend/js/bootstrap.min.js');?>"></script>

    <script src="<?php echo base_url('assets/frontend/js/bootstrap-fileupload.min.js');?>"></script>

    <!-- Plugin JavaScript -->

    <script src="<?php echo base_url('assets/frontend/js/jquery.easing.min.js');?>"></script>

    <script src="<?php echo base_url('assets/frontend/js/wow.min.js');?>"></script>

    <!-- Custom Theme JavaScript -->

    <script src="<?php echo base_url('assets/frontend/js/creative.js');?>"></script>

    <script src="<?php echo base_url('assets/frontend/js/skdslider.min.js');?>"></script>

    <script src="<?php echo base_url()."assets/frontend/js/camera.js";?>" type="text/javascript"></script>

    <script src="<?php echo base_url()."assets/frontend/js/jquery.magnific-popup.min.js";?>"></script>

    <script src="<?php echo base_url()."assets/frontend/js/jquery-ui.js";?>"></script>
    
     <script type="text/javascript">
       $(function() {
         $( ".tanggal" ).datepicker({
            dateFormat : "yy-mm-dd",
            yearRange: "-30",
            changeMonth: true,
            changeYear: true,
             showButtonPanel: true
         });
       });
     </script>

    <script type="text/javascript">

        $(document).ready(function(){   

            //Slider

            $('#camera_wrap_1').camera();               

        });     

    </script>

    <script type="text/javascript">

    $(function(){

      $('.portfolio').magnificPopup({

        delegate: 'a',

        type: 'image',

        image: {

          cursor: null,

          titleSrc: 'title'

        },

        gallery: {

          enabled: true,

          preload: [0,1], // Will preload 0 - before current, and 1 after the current image

          navigateByImgClick: true

            }

      });

    });

    </script>

    <script type="text/javascript">

        jQuery(document).ready(function(){

            jQuery('#demo1').skdslider({delay:5000, animationSpeed: 2000,showNextPrev:true,showPlayButton:true,autoSlide:true,animationType:'fading'});

            jQuery('#demo2').skdslider({delay:5000, animationSpeed: 1000,showNextPrev:true,showPlayButton:false,autoSlide:true,animationType:'sliding'});

            jQuery('#demo3').skdslider({delay:5000, animationSpeed: 2000,showNextPrev:true,showPlayButton:true,autoSlide:true,animationType:'fading'});

            jQuery('#responsive').change(function(){

              $('#responsive_wrapper').width(jQuery(this).val());

              $(window).trigger('resize');

            });

        });

    </script>   

</body>

</html>



